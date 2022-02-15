<?php
include 'db.php';
session_start();
if ($_SESSION["username"])
{
$sql = 'SELECT * FROM register';  
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
 
 <th><h2>ID</h2></th>
 <th><h2>Name</h2></th>
 <th><h2>Email</h2></th>
 <th><h2>Gender</h2></th>  
 <th><h2>Mobile</h2></th>
 <th><h2>Password</h2></th>
 <th><h2>DateOfBirth</h2></th>
 <tr>
 <?php
 while($acess=mysqli_fetch_assoc($records))
 {
	 echo"<tr>";
	 
	 
	  echo"<td>".$acess['id']."</td>";
	  echo"<td>".$acess['name']."</td>";
	  echo"<td>".$acess['email']."</td>";
      echo"<td>".$acess['gender']."</td>";
	  echo"<td>".$acess['mobile']."</td>";
      echo"<td>".$acess['password']."</td>";
      echo"<td>".$acess['dob']."</td>";
	
	 
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