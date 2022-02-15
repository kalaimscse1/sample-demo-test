<?php
include 'db.php';
if (isset($_POST['register'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $passwod = $_POST['password'];
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
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="style.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script>
  $(document).ready(function () {
    $('#form').validate({
      rules: {
        name: {
          required: true
        },
        email: {
          required: true,
          email: true
        },
        mobile: {
          required: true,
          rangelength: [10, 12],
          number: true
        },
        password: {
          required: true,
          minlength: 8
        },
        gender: {
          required: true
        },
        dateofbirth: {
            required: true
        }
      },
      messages: {
        name: 'Please enter Name.',
        email: {
          required: 'Please enter Email Address.',
          email: 'Please enter a valid Email Address.',
        },
        mobile: {
          required: 'Please enter Contact.',
          rangelength: 'Contact should be 10 digit number.'
        },
        password: {
          required: 'Please enter Password.',
          minlength: 'Password must be at least 8 characters long.',
        },
        gender: 'Please enter Gender.',
        dateofbirth:'Please enter Date of Birth.'
      },
      submitHandler: function (form) {
        form.submit();
      }
    });
  });
</script>
</head>
<body>
<form name="form" id="form" action="form.php" method="post">
    <h1 class="h1">Register</h1>
    <p class= "h1">Please fill in this form to create an account.</p>
    <div class="form-group">
        <input type="text" class="form-control"  name="name" id="name" placeholder="Enter Name">
    </div>
    <div class="form-group">
        <input type="text" class="form-control" name="email" id="email" placeholder="Enter Email">
    </div>
    <div class="form-group">
       <input type="text" class="form-control" name="mobile" id="contact" maxlength="10" placeholder="Enter Mobile">
    </div>
    <div class="form-group">
        <input type="text" class="form-control" name="gender" id="gender" placeholder="Enter Gender">
    </div>
    <div class="form-group">
        <input type="date" class="form-control" placeholder="Date Of Birth" name="dateofbirth" id="dateofbirth">
    </div>
    <div class="form-group">
        <input type="password" class="form-control" id="password" placeholder="Enter pssword" name="password">
    </div>
    <div class="form-group">
        <input type="submit" value="Register" class="registerbtn" name="register">
    </div>
    <div class="container signin">
        <p>Already have an account? <a href="index.php">Sign in</a>.</p>
</form>
</body>
</html>
