<?php
include 'db.php';
session_start();
if ($_SESSION["username"])
{
$name = $_SESSION["username"];
$sqlquery = "SELECT * FROM register WHERE name='$name'";
$result = mysqli_query($conn, $sqlquery);  
$row = mysqli_fetch_assoc($result);
if (isset($_POST['add'])){
    $title = $_POST['title'];
    $post = $_POST['post'];
    $date =  date("Y-m-d");
    $id = $row["id"];
    $sql = "INSERT INTO blog (title,post,userid,createdAt) VALUES ('$title','$post','$id','$date');";
    if(mysqli_query($conn, $sql)){  
        echo "Record inserted successfully";  
       }else{  
       echo "Could not insert record: ". mysqli_error($conn);  
       }  
       header("Location:postlist.php");
}
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
<form name="form" id="form" action="post.php" method="post">
  
    <div class="form-group">
        <input type="text" class="form-control"  name="title" id="title" placeholder="Enter Title">
    </div>
    <div class="form-group">
        <input type="textarea" class="form-control" name="post" id="post" placeholder="Enter Description">
    </div>
    <div class="form-group">
        <button type="submit" name="add" class="registerbtn">Add</button>
    </div>

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
?>