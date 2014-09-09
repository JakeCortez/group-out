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
        
var zipTest = ^\d{5}(-\d{4})?$;
   if (!zip.Test) {
      alert("Please use a valid zip code");  
   } else {
      //zip is valid
   }
   
   // OR?
   //function checkZip(value) {
   // return (/(^\d{5}$)|(^\d{5}-\d{4}$)/).test(value);
   //};
   
//   <html xmlns="http://www.w3.org/1999/xhtml">
//<head>
   // <title>Validate US Zip Code in JavaScript</title>
    //<script type="text/javascript">
      //  function IsValidZipCode(zip) {
           // var isValid = /^[0-9]{5}(?:-[0-9]{4})?$/.test(zip);
           // if (isValid)
              //  alert('Valid ZipCode');
           // else {
             //   alert('Invalid ZipCode');
          //  }
       // }
    //</script>
//</head>

//<body>
//<form>
//<input id="txtZip" name="zip" type="text" /><br />
//<input id="Button1" type="submit" value="Validate"
//onclick="IsValidZipCode(this.form.zip.value)" />
//</form>
//</body>
//</html>
   
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

//<?php

//echo $safeEmail = htmlspecialchars($_POST["email"]);
//if (strpos($safeEmail, "@", 1)=== false) {
    
//}
//echo $safeEmail . " thanks ";
//?>
