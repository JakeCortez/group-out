<?php
    //require the class we're going to use
    require_once("../classes/user-login.php");
    
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
            require_once("../classes/user-login.php");
  
        //connect to mySQL
            require_once("/etc/apache2/capstone-mysql/group-out.php");
            $mysqli = Pointer::getPointer();
            
        //get user by email
            $user = User::getUserByEmail($mysqli, $userEmail);
            $userHash = $hash($_POST["userPassword"].$user->getUserSalt());
            
        //examine AuthToken
            if ($userAuthToken !== null) {
                throw (new exception ("We can't find your email address.  Please register again"));              
            }
        //compare $userHash and $userLogin->getUserHash()
            if($user->getUserPassword()==$userHash){
                $_SESSION["userID"]=$user->getID(); {
                else{
                    $_SESSION["message"] = "Your ID doesn't match your login email"                    
                }
                if (isset($_SESSION["message"])) {
                    echo $_SESSION["message"]; 
                    }
                }
            }
        echo "Welcome back to Group-Out.";
     }
        catch(mysqli_sql_exception $sqlException) {
            echo "Exception: " . $sqlException->getMessage();
        }
        
        ?>
        </body>
    </html>