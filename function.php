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
<form action="function.php" method="post">
<input type="text" name="a" placeholder ="Enter a value"><br><br>
<input type="text" name ="b" placeholder = "Enter b value"><br><br>
<button type="submit" name="Add">+</button> &nbsp&nbsp&nbsp&nbsp<button type="submit" name="Sub">-</button> &nbsp&nbsp&nbsp&nbsp<br><br>
<button type="submit" name="Mul">*</button> &nbsp&nbsp&nbsp&nbsp<button type="submit" name="Div">/</button>&nbsp&nbsp&nbsp&nbsp<br><br>
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
function add(int $a,int $b) {
    return $a+$b;
}
function sub(int $a,int $b) {
    return $a-$b;
}
function mul(int $a,int $b) {
    return $a*$b;
}
function div(int $a,int $b) {
    return $a/$b;
}
if (isset($_POST['Add']))
 echo add($_POST['a'], $_POST['b']);
if (isset($_POST['Sub']))
 echo sub($_POST['a'], $_POST['b']);  
if (isset($_POST['Mul']))
 echo mul($_POST['a'], $_POST['b']);
if (isset($_POST['Div']))
 echo div($_POST['a'], $_POST['b']);
?>
<?php
function sum(float $a, float $b) : float {
  return $a + $b;
}
 echo sum(10,20)."\n";
?>
