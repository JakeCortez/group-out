<?php
    //require the class we're going to use
    require_once("GO_User_LogIn_Object.php");
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
        $userSalt                = bin2hex(openssl_random_pseudo_bytes(32));
    
         //hash the user's password 2048 times (128 bytes long)
        $userHash = hash_pbkdf2("sha512", $userPassword, $userSalt, 2048, 128);
        
        //require the class we're going to use
            require_once("GO_User_LogIn_Object.php");
  
        //connect to mySQL
            mysqli_report(MYSQLI_REPORT_STRICT);            
            
        //create user 
            $newUser = new User (null, $_POST["userAuthToken"], $_POST["userEmail"], $_POST["userPassword"], $_POST["userRole"], $_POST["userSalt"]);
            
        //insert user in DB
            $newUser->insert($mysqli);
            
        //clean up
            $mysquli->close();
            
        echo <<<EOF
        <p> Welcome to Group-Out!</p>
        <ul>
        <li>We'll keep your email address as: </li> 
        <li>$userEmail</li>
        <li>unless you change it on your profile.</li>
        </ul>
        
        EOF;
        } catch(mysqli_sql_exception $sqlException) {
        echo "Exception: " . $sqlException->getMessage();
        }
        
        ?>
        </body>
    </html>