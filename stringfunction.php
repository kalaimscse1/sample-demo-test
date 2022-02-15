
<?php
include 'db.php';
session_start();
if ($_SESSION["username"])
{
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="dashboard.css">
</head>
<body>
<div id="header">
 </div>
<div id="nav">
<ul id="navul">
<li> <a href="dashboard.php">HOME</a></li>
<li> <a href="#.php">Welcome <?php echo $_SESSION["username"]?></a></li>
<li> <a href="stringfunction.php">Flames</a></li>
<li> <a href="function.php">Calc</a></li>
<li> <a href="postlist.php">Blog</a></li>
<li> <a href="index.php">LOG OUT</a></li> 
</div>
<div id="container">
	<center>
<form action="stringfunction.php" method="post">
<input type="text" name="name1" placeholder="Your Name"><br><br>
<input type="text" name="name2"placeholder="Your Crush Name"><br><br>
<input type="submit" name ="submit" value="Submit"><br>
</form>
</center>
</div>
<div id="footer"></div>
</body>
</html>
<?php
}
else
echo "Invalid credentials";
function flames ($name1,$name2)
{
$name1=str_replace(' ','',$name1);
$name2=str_replace(' ','',$name2);
if(($name1!=NULL) && ($name2!=NULL))
{
 for($i=0;$i<strlen($name1);$i++)
 {
	for($j=0;$j<strlen($name2);$j++)
	{
		if($name1[$i]==$name2[$j])
		{
			$name1[$i]='?';
			$name2[$j]='?';
		}
	}
 }
 $name1=str_replace('?','',$name1);
 $name2=str_replace('?','',$name2);
 $sum=strlen($name1)+strlen($name2);
 $flames="flames";
 $l=strlen($flames);
 $pos=0;
 while($l>1)
 {
	$pos=($sum+$pos)%$l;
	if($pos == 0)
        $pos=$l-1;  
    else
        $pos--;
	$flames[$pos] = "/"; 
    $flames= str_replace("/", "", $flames);
    
	$l=strlen($flames);
 }
 $result=strtoupper($flames);
 switch($result)
 {
	case 'F': echo "Friends"; break;
	case 'L': echo "Love"; break;
	case 'A': echo "Affection"; break;
	case 'M': echo "Marrige"; break;
	case 'E': echo "Enemy"; break;
	case 'S': echo "Sister"; break;
 }
 }
 }
if (isset($_POST['submit'])){
    $name = strtolower($_POST['name1']);
    $crush = strtolower($_POST['name2']);
	flames($name,$crush);
}
?>