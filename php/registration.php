<?php
    //require the class we're going to use
    require_once("../test/GO_User_LogIn_Object.php");
?>
<!DOCTYPE html>
    <html>
        <head>
            <title>
                Form registers input from new user
            </title>
        </head> 
        <body>
        <?php
        
        try {
        //create the SALT and authentication tokens
        $userAuthToken = bin2hex(openssl_random_pseudo_bytes(16));
        $userSalt      = bin2hex(openssl_random_pseudo_bytes(32));
    
         //hash the user's password 2048 times (128 bytes long)
        $userHash = hash_pbkdf2("sha512", $_POST["password"], $userSalt, 2048, 128);
        
        //require the class we're going to use
            require_once("../test/GO_User_LogIn_Object.php");
  
        //connect to mySQL
            mysqli_report(MYSQLI_REPORT_STRICT);            
            
        //create user 
            $newUser = new User (null, $userAuthToken, $_POST["email"], $userHash, 2, $userSalt);
            
        //insert user in DB
            $newUser->insert($mysqli);
            
        //clean up
            $mysqli->close();
            
        echo "Welcome to Group-Out.  We'll keep your email address
        as $userEmail unless you change it on your profile";
        
        } catch(mysqli_sql_exception $sqlException) {
        echo "Exception: " . $sqlException->getMessage();
        }
        
        ?>
        </body>
    </html>