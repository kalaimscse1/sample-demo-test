<?php
include 'db.php';
if (isset($_POST['register'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $passwod = $_POST['psw'];
    $date = $_POST['dateofbirth'];
    $gender = $_POST['gender'];
    $mobile = $_POST['mobile'];
    $sql = "INSERT INTO register (name,email,password,dob,gender,mobile,status) VALUES ('$name','$email','$passwod','$date','$gender','$mobile',1);";
    if(mysqli_query($conn, $sql)){  
        echo "Record inserted successfully";  
       }else{  
       echo "Could not insert record: ". mysqli_error($conn);  
       }  
       session_start();
       $_SESSION["userid"] = $email;
       $_SESSION["username"] = $name;
       header("Location:dashboard.php");
}
?>