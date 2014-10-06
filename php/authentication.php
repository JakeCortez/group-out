<?php
    //require the class we're going to use
    require_once("../classes/user-login.php");
    
    //start the session state
    session_start();
    
    //set session to a blank array
    $_SESSION = array();
    
    //insert something into the session to follow user & userZip
    $_SESSION["userID", "userZip"] = "";
        
    //destroy the cookie
    $params = session_get_cookie_params();
    setcookie(session_name(), "", 1, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);

    //destroy the current session
    session_destroy();
    
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
        $userEmail = $_POST['userEmail'];
        $userPassword = $hash($_POST['userPassword']);
  
        //connect to mySQL
         require_once("/etc/apache2/capstone-mysql/group-out.php");
        $mysqli = Pointer::getPointer();
  
        // get the user by Email
        $user = User::getUserByEmail($mysqli, $userEmail);
        $userHash = $hash($_POST["userPassword"].$user->getUserSalt());
        
        //examine AuthToken -- if not set to null, cancel user's session
        if ($userAuthToken !== null) {
           throw (new exception ("We can't find your email address.  Please register again"));
            mysqli_close();
        }
  
        // if found: calculate the hash of the user's inserted password
        if ($user!== null)
            $userHash = hash_pbkdf2("sha512", $_POST["userPassword"], $userSalt, 2048, 128);
        
        //compare to the hash of the password in the database
            $userSalt = $user->getUserSalt();
            $passwordToCompareTo = hash_pbkdf2("sha512", $_POST["userPassword"], $userSalt, 2048, 128);
    
        //compare the two to see if they are equal
        if($passwordToCompareTo === $user->getUserPassword(){
            
        //if equal let them through and send user back to entrypage 
            header("Location: {$_SERVER['HTTP_REFERER']}");
        }
        else {
            // while password matches, create session, store userID
                if ($userPasswordStatement -> execute() === false) {
                    throw (new exception ("your password doesn't match"));
                    mysqli_close();
                }
                
                // while password matches, create session, store userID
                = $userPassword-> store_result();
                while ($userPassword = $userPassword) -> fetch_assoc()) {
                    $_SESSION["userID"]=$userPassword; {
                    }
                }
            echo "Welcome back to Group-Out.";
        }
            else {
                throw(exception, $error) {
                    echo "Cannot log in user" . $error->getMessage();
                }
            }
?>
    </body>
</html>