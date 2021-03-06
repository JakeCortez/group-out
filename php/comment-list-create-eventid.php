<?php
require_once("../php/commentText-class.php");

// Jim's xampp
//require_once("../config/Pointer.php");

// groupout live site
require_once("/etc/apache2/capstone-mysql/group-out.php");

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
    $userFirstName = $comment->getUserFirstName();

    // echo the result
    echo <<<EOD
      <div class="alert-success col-md-10" style="margin-bottom:5px;padding:1px 5px 1px 20px;">
        <h4>$userFirstName</h4>
        <p><strong>$niceDate</strong><br>$commentText</p>
      </div>
      <div style="clear:both;"></div>
EOD;
  }
} catch(mysqli_sql_exception $error) {
  echo 'oops';
}

?>
