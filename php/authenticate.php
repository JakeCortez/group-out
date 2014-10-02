<?php
    //require the class we're going to use
    require_once("../php/user-login.php");
    
    //start the session state
    session_start();
    
?>
<!DOCTYPE html>
    <html>
        <head>
            <title>
                Form allows trusted user to Log In, Sets SessionIDs
            </title>
        </head> 
        <body>
        <?php
        
        try {
         //hash the user's password 2048 times (128 bytes long)
        $userHash = hash_pbkdf2("sha512", $_POST["userPassword"], $userSalt, 2048, 128);
        
        //require the class we're going to use
            require_once("../php/user-login.php");
  
        //connect to mySQL
            require_once("/etc/apache2/capstone-mysql/group-out.php");
            $mysqli = Pointer::getPointer();
            
        //get user by email
            
        //ensure that authToken === null
        
        //compare $userHash and $userLogin->getUserHash()
            
        echo "Welcome back to Group-Out.";
        
        } catch(mysqli_sql_exception $sqlException) {
        echo "Exception: " . $sqlException->getMessage();
        }
        
        ?>
        </body>
    </html>