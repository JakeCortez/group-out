<?php
require_once("../config/Pointer.php");
require_once("commentText-class.php");

// require_once("/etc/apache2/capstone-mysql/group-out.php");
// require_once("commentText-class.php");

try {
  // call the Pointer static method to connect to mySQL
  $mysqli = Pointer::getPointer();

  // call the class static method for querying/getting 3 event results
  $userCommentArray = Comment::getCommentsByUserID($mysqli, 1);

  // loop through the result set
  foreach($userCommentArray as $comment) {


    // reformat the date
    $commentID = $comment->getCommentID();
    $niceDate = $commentdatecreated->format("F j, Y");
    $userID = $comment->getUserID();
    $routeID = $comment->getRouteID();
    $eventID = $comment->getEventID();
    $groupID = $comment->getGroupID();
    $commentText = $comment->getCommentText();

    // echo the result
    echo <<<EOD
      <h1>$userID</h1>
      <p><strong>$niceDate</strong><br>
      $commentText</p>
EOD;
  }
} catch(mysqli_sql_exception $error) {
  echo 'oops';
}

?>
