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
<li> <a href="dashboard.php">Admin</a></li>
<li> <a href="#.php">Welcome <?php echo $_SESSION["username"]?></a></li>
<li> <a href="userlist.php">User</a></li>
<li> <a href="postlist.php">Blog</a></li>
<li> <a href="index.php">Log Out</a></li> 
</div>
<div id="container">
</div>
<div id="footer"></div>
</body>
</html>
<?php
}
else
echo "Invalid credentials";
?>


  