<?php
require_once("../config/Pointer.php");
require_once("commentText-class.php");

// require_once("/etc/apache2/capstone-mysql/group-out.php");
// require_once("event-class.php");

try {
  // call the Pointer static method to connect to mySQL
  $mysqli = Pointer::getPointer();

  // call the method
  $date = date('Y-m-d H:i:s');
  $comment = new Comment(null, $date, $_POST["userID"], $_POST["commentText"], $_POST["groupID"], $_POST["eventID"], $_POST["routeID"]);

} catch(mysqli_sql_exception $error) {
  echo "oops";
}

// mysqli_close($mysqli);
?>
