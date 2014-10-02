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
            
        echo "Welcome to Group-Out.  We'll keep this <br />
        email as your login until you change it on your profile";
        
        } catch(mysqli_sql_exception $sqlException) {
        echo "<span class='badForm'> Exception: " . $sqlException->getMessage() "</span>";
        }
        
        ?>
        </body>
    </html>