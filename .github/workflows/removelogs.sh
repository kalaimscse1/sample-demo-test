#!/bin/sh

debug_rex='/console.log/'
debug_print_rex=$debug_rex'p'
debug_del_rex=$debug_rex' d'
add_debug_patch='.add-debug.patch'
del_debug_patch='.del-debug.patch'
git_work_dir="$(git rev-parse --show-toplevel)"
fake_file="$git_work_dir/.fake_file"
cur_dir="$(pwd)"
staged_files="$(git diff --name-only --cached | grep '.js$')"
debug_lines="$(sed -n $debug_print_rex $staged_files)"

function add_fake_file {
  touch $fake_file
  git add $fake_file
}

function clear_fake_file {
  rm $fake_file
  git rm -q $fake_file
}

if [ ! "$debug_lines" ]; then
  exit 0
fi

cd $git_work_dir

#echo "save unstaged to stash"
git stash save --keep-index -q

#echo "clone staged change to stash"
add_fake_file
git stash save -q
git stash apply -q

if [ ! "$staged_files" ]; then
  exit 0
fi

#echo "show console.log"
echo "[remove console.log]"
echo "$debug_lines"
#echo "delete console.log"
sed -i "$debug_del_rex" $staged_files

#echo "generate debug patch file"
git diff -R stash@{0} > $add_debug_patch

clear_fake_file
git add -u # for deleted file
git add $staged_files # for file new added

git stash drop -q
cd - > /dev/null 2>&1