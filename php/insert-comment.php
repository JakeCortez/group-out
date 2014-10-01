<?php
require_once("../config/Pointer.php");
require_once("commentText-class.php");

// require_once("/etc/apache2/capstone-mysql/group-out.php");
// require_once("event-class.php");

try {
  // call the Pointer static method to connect to mySQL
  $mysqli = Pointer::getPointer();

  // call the class static method for querying/getting 3 event results
  $eventArray = Comment::insert($mysqli);

} catch(mysqli_sql_exception $error) {
  echo 'oops';
}
echo '1 record added';
mysqli_close($mysqli);
?>
