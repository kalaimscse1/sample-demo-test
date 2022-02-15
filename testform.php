<!DOCTYPE html>
<html>

<head>
  <title>jquery validation in php registration form - Laratutorials.com</title>
  <!-- <link rel="stylesheet" href="style.css"> -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
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
        contact: {
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
        contact: {
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

<body class="container">
  <div class="row mt-3">
    <div class="col-md-6">
      <h4 class="mb-3">jQUERY Form Validation in PHP - <a href="https://www.Laratutorials.com" target="_blank" rel="noopener noreferrer">Lara tutorials</a>
      </h4>
      <form id="form" method="post" action="insert.php">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" name="name" id="name">
        </div>
        <div class="form-group">
          <label for="email">Email Address</label>
          <input type="text" class="form-control" name="email" id="email">
        </div>
        <div class="form-group">
          <label for="contact">Contact</label>
          <input type="text" class="form-control" name="contact" id="contact">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" name="password" id="password">
        </div>
        <div class="form-group">
          <label for="gender">Gender</label>
          <input type="text" class="form-control" name="gender" id="gender">
        </div>
        <div class="form-group">
          <label for="dateofbirth">Date Of Birth</label>
          <input type="date" class="form-control" name="dateofbirth" id="dateofbirth">
        </div>
        <input type="submit" class="btn btn-primary" value="Submit" />
      </form>
    </div>
  </div>
</body>
<style>
  .error {
    color: red;
  }
</style>


</html>