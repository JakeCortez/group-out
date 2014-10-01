<?php
    //sanitize function so we can format errors
    //if the email has no @ character, throw an exception
try {
        if(filter_input(INPUT_POST, "userEmail", FILTER_VALIDATE_EMAIL) === false){ 
            throw(new Exception("Please enter a PROPER e-mail address"));
        }
        //if filter-input passed the email, we need to sanitize the characters
        $safeEmail = filter_input(INPUT_POST, "userEmail", FILTER_SANITIZE_EMAIL);
                
        //sanitize both passwords
        $safePassword = filter_input(INPUT_POST, "userPassword",    FILTER_SANITIZE_SPECIAL_CHARS);
        $safeConfirm  = filter_input(INPUT_POST, "confirmPassword", FILTER_SANITIZE_SPECIAL_CHARS);
        
        //ensure the passwords match
        if($safePassword !== $safeConfirm) {
            throw(new Exception("Passwords DON'T match"));
        }
        
        //passwords are safe and match  (good code)
        echo "Welcome to Group Out!<br />";
    }

        //catch the exception and format it as an error message
        catch(Exception $error) {
        echo "<span class='badForm'>" . $error->getMessage() . "</span>";   
    }

?>

<?php
    //require the class we're going to use
    require_once("../test/GO_User_LogIn_Object.php");
?>
<!DOCTYPE html>
    <html>
        <head>
            <title>
                Form allows trusted user to Log In
            </title>
        </head> 
        <body>
        <?php
        
        try {
        //create the SALT and authentication tokens
        $userAuthToken = bin2hex(openssl_random_pseudo_bytes(16));
        $userSalt      = bin2hex(openssl_random_pseudo_bytes(32));
    
         //hash the user's password 2048 times (128 bytes long)
        $userHash = hash_pbkdf2("sha512", $_POST["userPassword"], $userSalt, 2048, 128);
        
        //require the class we're going to use
            require_once("../test/GO_User_LogIn_Object.php");
  
        //connect to mySQL
            require_once("/etc/apache2/capstone-mysql/group-out.php");
            $mysqli = Pointer::getPointer();
            
        //create user 
            $newUser = new User (null, $userAuthToken, $_POST["userEmail"], $userHash, 2, $userSalt);
            
        //insert user in DB
            $newUser->insert($mysqli);
            
        //clean up
            $mysqli->close();
            
        echo "Welcome back to Group-Out.";
        
        } catch(mysqli_sql_exception $sqlException) {
        echo "Exception: " . $sqlException->getMessage();
        }
        
        ?>
        </body>
    </html>