$(document).ready(
    function () {
     $("#eventName").validate( {
        //DEBUG MODE: stop the form from being submitted
        // care to remove after debugging!!!!
        //debug: true,
        //debug is best to check if rules worked...
        // error class: formatting of messages
        errorClass: "badForm",
        
        //rules to define how fields should be sanitized
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
                size: 5,
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
                size: "Zip Code must be five numbers long",
                required: "Please add zip code!"                
            }
            eventDate: {
                required:  "Please let us know when your event is being held!"
            }
        },
        
             //set up AJAX call -- DOESN;T WORK IF DEBUG IS ON!
            // submit Handler customizes form's -- no default behavior
             submitHandler: function(form) {
                $(form).ajaxSubmit({
                    //how do we send this data?  GET or POST?
                    type: "POST",
                    //url to submit to:
                    // .txt is a placeholder -- looking for PHP
                    // SECURITY WARNING:  browsers don't allow you to
                    //submit to an external server (to avoid cross-server
                    //attacks) you can only load from your own.  PHP
                    // will provide a safe way to get data from external
                    // servers...  next week.
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