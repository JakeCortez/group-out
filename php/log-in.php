<?php
  $email = $_POST['email'];
  $password = $_POST['password'];
  
  //connect to mySQL
  require_once("/etc/apache2/capstone-mysql/group-out.php");
  $mysqli = Pointer::getPointer();
  
  // get the user by Email
  $user = User::getUserEmail($mysqli, $email);
  
  // if found: calculate the hash of the password and compare to the hash on record
  if ($user !== null) {
    
  // if hashes match, log in User
  if (userHash === mysqli Hash, then )
      
  } else {
   
      // if not found: throw an exception
         
  }

  
  
  
  // if the hashes above match, profit!
  // if not, throw an exception
  
  //sanitize function so we can format errors
//if the email has no @ character, throw an exception
try {
       
}

//catch the exception and format it as an error message
catch(Exception $error) {
    echo "<span class='badForm'>" . $error->getMessage() . "</span>";   
}

?>