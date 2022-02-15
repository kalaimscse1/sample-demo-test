<?php
include 'db.php';
session_start();
if ($_SESSION["username"])
{
$sql = "SELECT * FROM blog INNER JOIN register ON register.id = blog.userid ";  
$records=mysqli_query($conn, $sql);  
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
    <br>
    <br>
<table width="100%" border ="1" cellpadding="0" cellspacing="0" bgcolor="white">
 <tr class="tb">
 
 <th><h2>Id</h2></th>
 <th><h2>Title</h2></th>
 <th><h2>Post</h2></th>
 <th><h2>User</h2></th>  
 <th><h2>CreatedAt</h2></th>
 
 <tr>
 <?php
 while($acess=mysqli_fetch_assoc($records))
 {
	echo"<tr>";
    echo"<td>".$acess['id']."</td>";
    echo"<td>".$acess['title']."</td>";
	echo"<td>".$acess['post']."</td>";
    echo"<td>".$acess['name']."</td>";
	echo"<td>".$acess['createdAt']."</td>";
	echo"</tr>";	 
 }
 ?>
 </table>
</div>
<div id="footer"></div>
</body>
</html>
<?php
}
else
echo "Invalid credentials";
?>