<?php
include 'db.php';
session_start();
if(isset($_POST['login'])){
  $email = $_POST['email'];
  $password = $_POST['psw'];
  $sql = "SELECT * FROM admin WHERE email='$email' and password = '$password'";
  $result = mysqli_query($conn, $sql);
  $row  = mysqli_fetch_assoc($result);
  $_SESSION["userid"] = $row["email"];
  $_SESSION["username"] = $row["name"];
if (isset($_SESSION["userid"]))
{
  header("location:dashboard.php");
}
else 
{
  echo "Invalid Username or Password";
  header("location:index.php");
}
}
?>
<html>
 <head>
 <link rel="stylesheet" type="text/css" href="style.css">
 </head>
<body>
<form action="index.php"  method="post">
  <div class="container">
    <h1 class="h1">Login</h1>
    <input type="text" placeholder="Enter Username" name="email" id="email" required>
    <input type="password" placeholder="Enter Password" name="psw" id="psw" required>

    <button type="submit" class="registerbtn" name="login">LogIn</button>
  </div>

  <!-- <div class="container signin">
    <p>Don't have Any Account? <a href="form.php">Register Here</a>.</p>
  </div> -->
</form>
</body>
</html>
