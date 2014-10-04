<?php //  FROM WIKI HOW http://www.wikihow.com/Create-a-Secure-Login-Script-in-PHP-and-MySQL
    //require the class we're going to use
    require_once("../classes/user-login.php");
    
    // get the token from the URL
    $userAuthToken = $_GET["authToken"];

   //connect to mySQL
    require_once("/etc/apache2/capstone-mysql/group-out.php");
    $mysqli = Pointer::getPointer();
  
    // get the user by Email
    $user = User::getUserByAuthToken($mysqli, $userAuthToken);
  
    // if user found: examine ser AuthToken and compare to the authToken on record
    if ($user !== null) 
        
    // if AuthTokens match, set AuthToken to null in mysqli log 
    $mysqli->setAuthToken(null);
    
    //user accepted, activated 
    $user->update($mysqli);
    
    //OTHERWISE
    } else {
    
    throw(exception $error) {
      echo "Cannot log in user" . $error->getMessage();
    }
  }
?>
 