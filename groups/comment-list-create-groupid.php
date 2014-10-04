<?php
$_SESSION["userID"] = 1;
require_once("../php/commentText-class.php");

// Jim's xampp
//require_once("../config/Pointer.php");

// groupout live site
require_once("/etc/apache2/capstone-mysql/group-out.php");

try {
  // call the Pointer static method to connect to mySQL
  $mysqli = Pointer::getPointer();

  // grab the eventID from the page URL
  $pageGroupID = $_GET["groupID"];


  // call the class static method for getting user comments by this page's eventID
  $groupCommentArray = Comment::getCommentsByGroupID($mysqli, $pageGroupID);

  // loop through the result set
  foreach($groupCommentArray as $comment) {


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
