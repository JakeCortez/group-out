<?php
session_start();
$_SESSION["userID"] = 1;
require_once("../php/commentText-class.php");

// Jim's xampp
//require_once("../config/Pointer.php");

// groupout live site
require_once("/etc/apache2/capstone-mysql/group-out.php");

try {
  // call the Pointer static method to connect to mySQL
  $mysqli = Pointer::getPointer();

  // call the method
  $newComment = new Comment(null, null, $_SESSION["userID"], $_POST["commentText"], $_POST["groupID"], $_POST["eventID"], $_POST["routeID"]);

  //insert user in DB
  $newComment->insert($mysqli);

} catch(Exception $error) {
  echo $error;
}

mysqli_close($mysqli);
header("../events/event.php?eventID=1");
?>
