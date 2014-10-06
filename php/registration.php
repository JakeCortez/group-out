<?php
    //require the class we're going to use
    require_once("../classes/user-login.php");
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
        
        //require the class we're using
            require_once("../classes/user-login.php");
  
        //connect to mySQL
            require_once("/etc/apache2/capstone-mysql/group-out.php");
            $mysqli = Pointer::getPointer();
            
        //authenticate user 
            $newUserID = new UserID (null, $userAuthToken, $_POST["userEmail"], $userHash, 2, $userSalt);
            
        //insert user in DB
            $newUser->insert($mysqli);
        
        // mail the user
            $message = "Welcome to group out. Click http://bootcamp-coders.cnm.edu/group-out/php/activation.php?authToken=" . $newUserID->getUserAuthToken();
                mail($newUserID->getUserEmail(), "Welcome to Group Out", $message);
            
        echo "Welcome to Group Out!";
        
        } catch(mysqli_sql_exception $sqlException) {
        echo "<span class='badForm'> Exception: " . $sqlException->getMessage() "</span>";
        }
        
        ?>
        </body>
    </html>