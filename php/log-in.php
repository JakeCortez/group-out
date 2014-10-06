<?php

  $userEmail = $_POST['userEmail'];
  $userPassword = $hash($_POST['userPassword']);
  
  //connect to mySQL
  require_once("/etc/apache2/capstone-mysql/group-out.php");
  $mysqli = Pointer::getPointer();
  
  // get the user by Email
  $user = User::getUserByEmail($mysqli, $userEmail);
  
  // if found: calculate the hash of the password and compare to the hash on record
  if ($user!== null)
  
    //user is found so lets get the hash from the db
    
    
    
    //calculate the has of the password
    
    $userSalt = $user->getUserSalt();
    $passwordToCompareTo = hash_pbkdf2("sha512", $_POST["userPassword"], $userSalt, 2048, 128);
    
    //compare the two to see if they are equal
    \if($passwordToCompareTo === $user->getUserPassword(){
      //if equal let them through
      //send to them back to where they came from
      header("Location: {$_SERVER['HTTP_REFERER']}");
      
    }
  
   else {
    
    throw(exception $error) {
      echo "Cannot log in user" . $error->getMessage();
    }
  }
?>
  
  