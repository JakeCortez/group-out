
$(document).ready(function () {
     $("#logInModalForm").validate( {
        // error class: formatting of messages
        errorClass: "badForm",
        
        //How to sanitize fields 
        rules: {
            email: {
              email: true,
              required: true
            },
            password: {
                rangelength: [8,16],
                required: true
            }
          },
        
        messages: {
            email: {
                email: "PRETTY PLEASE",
                required:  "Please enter your E-DRESS"
            },
            password: {
               rangelength: "The password must be between 8 and 16 characters",
               required: "Please submit a valid PASSWORD"
            }
        },
      //set up AJAX call 
            submitHandler: function(form) {
               $(form).ajaxSubmit({
                  type: "POST",
                  //url to submit to:
                  // .txt is a placeholder -- looking for PHP
                  url: "php/logIn.php",
                  //data to be submitted
                  data: $(form).serialize(),
                  //anonymous callback function to react to a successful query
                  success: function(ajaxOutput) {
                  //html() is jQuery's .innerHTML
                  $("#outputArea").html(ajaxOutput);
               }
            });
         }
      });
    }
);
