<?php
require_once("../config/Pointer.php");
require_once("commentText-class.php");

// require_once("/etc/apache2/capstone-mysql/group-out.php");
// require_once("commentText-class.php");

try {
  // call the Pointer static method to connect to mySQL
  $mysqli = Pointer::getPointer();

  // grab the eventID from the page URL
  $pageEventID = $_GET["eventID"];


  // call the class static method for getting user comments by this page's eventID
  $userCommentArray = Comment::getCommentsByEventID($mysqli, $pageEventID);

  // loop through the result set
  foreach($userCommentArray as $comment) {


    // reformat the date
    $commentID = $comment->getCommentID();
    $dateTime = $comment->getCommentDateCreated();
    $niceDate = $dateTime->format("F j, Y");
    $userID = $comment->getUserID();
    $routeID = $comment->getRouteID();
    $eventID = $comment->getEventID();
    $groupID = $comment->getGroupID();
    $commentText = $comment->getCommentText();

    // echo the result
    echo <<<EOD
      <p><strong>$niceDate</strong><br>
      $commentText</p>
EOD;
  }
} catch(mysqli_sql_exception $error) {
  echo 'oops';
}

?>
