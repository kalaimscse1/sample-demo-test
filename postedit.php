<?php
include 'db.php';
session_start();
if ($_SESSION["username"])
{
    if(isset($_REQUEST["ieid"]))
    {
        $ieid=$_REQUEST["ieid"];
    
$query = mysqli_query($conn,"select * from blog where blog_id='$ieid'");
$mem=mysqli_fetch_assoc($query);
    }
$name = $_SESSION["username"];
$sqlquery = "SELECT * FROM register WHERE name='$name'";
$result = mysqli_query($conn, $sqlquery);  
$row = mysqli_fetch_assoc($result);
if (isset($_POST['add'])){
    $title = $_POST['title'];
    $post = $_POST['post'];
    $date =  date("Y-m-d");
    $id = $row["id"];
    $blog_id =$_POST["blog_id"];
    $sql = "UPDATE blog SET title='$title', post='$post', userid='$id', createdAt='$date' WHERE blog_id ='$blog_id'";
    echo $sql;
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
<form name="form" id="form" action="postedit.php" method="post">
  
    <div class="form-group">
        <input type="hidden" class="form-control"  name="blog_id" id="blog_id"  value ="<?php echo $mem["blog_id"]?>"  placeholder="Enter Title">
    </div>
    <div class="form-group">
        <input type="text" class="form-control"  name="title" id="title"  value ="<?php echo $mem["title"]?>" placeholder="Enter Title">
    </div>
    <div class="form-group">
        <input type="textarea" class="form-control" name="post" value ="<?php echo $mem["post"]?>"  id="post" placeholder="Enter Description">
    </div>
    <div class="form-group">
        <button type="submit" name="add" class="registerbtn">Update</button>
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