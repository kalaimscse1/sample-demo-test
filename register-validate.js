$('document').ready(function() {   
    /* handle form validation */  
    $("#register-form").validate({
        rules:
     {
     user_name: {
        required: true,
     minlength: 3
     },
     password: {
     required: true,
     minlength: 8,
     maxlength: 15
     },
     cpassword: {
     required: true,
     equalTo: '#password'
     },
     user_email: {
              required: true,
              email: true
              },
      },
         messages:
      {
              user_name: "please enter user name",
              password:{
                        required: "please provide a password",
                        minlength: "password at least have 8 characters"
                       },
              user_email: "please enter a valid email address",
     cpassword:{
        required: "please retype your password",
        equalTo: "password doesn't match !"
         }
         },
      submitHandler: submitForm 
         });  
      /* handle form submit */
     
  });