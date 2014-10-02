$(document).ready(function () {
     $("#registerModalForm").validate( {
        // error class: formatting of messages
        errorClass: "badForm",
        
        //How to sanitize fields 
        rules: {
            eventName: {
                required: true
            },
            eventCity: {
                required: true
            },
            eventState: {
                size: 2,
                required: true
            },
            eventZipCode: {
                size: 10,
                required: true
            },
            eventDescription: {
                required: true
            },
            eventDate: {
                required: true
            },
            email: {
              email: true,
              required: true
            },
            password: {
                rangelength: [8,16],
                required: true
             },
            confirmPassword: {
                equalTo: "#userPassword"
            }
        },
        messages: {
            eventName: {
                required: "Please share the name of the event!"
            },
            eventCity: {
                required: "Please input the name of the city where the event will be held."
            },
            eventState: {
                required: "Please submit the two-letter code of the state where the event will be held",
            },
            eventZipCode: {
                size: "Please add the event's zip code",
                required: "Zip Code Please!"                
            },
            eventDate: {
                required:  "Please let us know when your event is being held!"
            },
            email: {
                email: "PRETTY PLEASE",
                required:  "Please enter your E-DRESS"
                
            },
            password: {
               rangelength: "The password must be between 8 and 16 characters",
               required: "Please submit a valid PASSWORD"
            },
            confirmPassword:  {
               equalTo: "The Passwords don't match; please to re-enter..."
            }
        },
      //set up AJAX call 
            submitHandler: function(form) {
               $(form).ajaxSubmit({
                  type: "POST",
                  //url to submit to:
                  // .txt is a placeholder -- looking for PHP
                  url: "php/registration.php",
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

        

   
