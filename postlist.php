<?php
include 'db.php';
session_start();
if ($_SESSION["username"])
{
$name = $_SESSION["username"];
$sqlquery = "SELECT * FROM register WHERE name='$name'";
$result = mysqli_query($conn, $sqlquery);  
$row = mysqli_fetch_assoc($result);
$sql = "SELECT * FROM register INNER JOIN blog ON blog.userid = register.id WHERE register.id =".$row["id"];  
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
<li> <a href="dashboard.php">HOME</a></li>
<li> <a href="#.php">Welcome <?php echo $_SESSION["username"]?></a></li>
<li> <a href="stringfunction.php">Flames</a></li>
<li> <a href="function.php">Calc</a></li>
<li> <a href="postlist.php">Blog</a></li>
<li> <a href="index.php">LOG OUT</a></li> 
</div>
<div id="container">
    <br>
    <br>
    <a href="post.php">  
       <button>Add</button>  
     </a>
    
<table width="100%" border ="1" cellpadding="0" cellspacing="0" bgcolor="white">
 <tr class="tb">
 
 <th><h2>Id</h2></th>
 <th><h2>Title</h2></th>
 <th><h2>Post</h2></th> 
 <th><h2>CreatedAt</h2></th>
 <th><h2>Edit</h2></th>
 <tr>
 <?php
 while($acess=mysqli_fetch_assoc($records))
 {
	echo"<tr>";
    ?>
     <td><?php echo $acess['blog_id'];?></td>
     <td><?php echo $acess['title'];?></td>
     <td><?php echo $acess['post'];?></td>
     <td><?php echo $acess['createdAt'];?></td>
     <td><a href="postedit.php?ieid=<?php echo $acess['blog_id']?>"><i class="fas fa-edit"></i> <img src="edit.png" height="30px" width="30px"></td>
<?php
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