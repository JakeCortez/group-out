<?php
  $userEmail = $_POST['userEmail'];
  $userPassword = $_POST['userPassword'];
  
  //connect to mySQL
  require_once("/etc/apache2/capstone-mysql/group-out.php");
  $mysqli = Pointer::getPointer();
  
  // get the user by Email
  $user = User::getUserEmail($mysqli, $userEmail);
  
  // if found: calculate the hash of the password and compare to the hash on record
  if ($user!== null) {
  $userHash = $hash($_POST["userPassword"].$user->getUserSalt());
    
  // if hashes match, log in User
  if ($userHash == $hash); {
    $user = $_SERVER["HTTP_ACCEPTED"];
    
  //user accepted, activated  OTHERWISE
  
  } else {
    
    throw(exception $error) {
      echo "Cannot log in user" . $error->getMessage();
    }
  }
?>
  
  