<?php
    //require the class we're going to use
    require_once("../classes/user-login.php");
    require_once("../php/userprofile.php");
    
    //start the session state
    session_start();
    
    //insert something into the session to follow user & userZip
    //$_SESSION["userID"]  ="";
    //$_SESSION["userZip"] = null;
        
    //destroy the cookie
   // $params = session_get_cookie_params();
    //setcookie(session_name(), "", 1, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);

    //destroy the current session
    //session_destroy();

        $userEmail = $_POST['userEmail'];
        $password = $_POST['userPassword'];
  
        //connect to mySQL
        require_once("/etc/apache2/capstone-mysql/group-out.php");
        $mysqli = Pointer::getPointer();
        require_once("../classes/user-login.php");
  
        // get the user by Email
        $user = User::getUserByEmail($mysqli, $userEmail);
        $userSalt = $user->getUserSalt();
        $userHash = hash_pbkdf2("sha512", $password, $userSalt, 2048, 128);
        $userPassword = $user->getUserPassword();
        $userAuthToken = $user->getUserAuthToken();
        $userID = $user->getUserID();
        
        //examine AuthToken -- if not set to null, cancel user's session
        if ($userAuthToken !== null) {
           throw (new exception ("We can't find your email address.  Please register again"));
        }
        
        // if found, compare passwords
        if ($user!== null && $userHash === $userPassword) {
            $_SESSION["userID"] = $userID;
            
            $profileID = UserProfile::getProfileByUserId($mysqli, $userID);
            $_SESSION["profileID"] = $profileID;
            
        //if equal let them through and send user back to entry page 
            header("Location: {$_SERVER['HTTP_REFERER']}");
        }
        
        // while password matches, create session, store userID
        else  {
            throw (new exception ("your password doesn't match"));
        }
?>

