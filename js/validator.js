$(document).ready(
    function () {
     $("#eventName").validate( {
        //debug: true,
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
            }
        },
        
var zipTest = \d{5}(-\d{4}?);
   if (!zip.Test) {
      alert("this is not a valid zip code");  
   } else {
      //zip is valid
   }
             //set up AJAX call -- DOESN;T WORK IF DEBUG IS ON!
             submitHandler: function(form) {
                $(form).ajaxSubmit({
                    type: "POST",
                    //url to submit to:
                    // .txt is a placeholder -- looking for PHP
                    url: "jquery-form.php",
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
