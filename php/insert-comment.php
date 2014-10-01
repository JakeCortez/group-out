<?php
require_once("../config/Pointer.php");
require_once("commentText-class.php");

// require_once("/etc/apache2/capstone-mysql/group-out.php");
// require_once("event-class.php");

try {
  // call the Pointer static method to connect to mySQL
  $mysqli = Pointer::getPointer();

  // call the method
  $newComment = new Comment($_POST["userID"], $_POST["commentText"], $_POST["groupID"], $_POST["eventID"], $_POST["routeID"]);

  //insert user in DB
  $newComment->insert($mysqli);

} catch(Exception $error) {
  echo $error;
}

mysqli_close($mysqli);
?>
