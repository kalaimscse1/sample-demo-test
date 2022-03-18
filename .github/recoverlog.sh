#!/bin/sh

add_debug_patch='.add-debug.patch'
del_debug_patch='.del-debug.patch'
git_work_dir="$(git rev-parse --show-toplevel)"
fake_file="$git_work_dir/.fake_file"
cur_dir="$(pwd)"

function force_stash_pop {
  git diff --binary stash@{0} | patch --binary -R -s
  # for safety comment this line
  git stash drop -q
}

if [ ! -e "$add_debug_patch" ]; then
  exit 0
fi

cd $git_work_dir
patch -s -p1 < $add_debug_patch
rm $add_debug_patch

#echo "pop unstaged stash"
force_stash_pop

cd - > /dev/null 2>&1