<?php
require_once("../config/Pointer.php");
require_once("../classes/event-class.php");

// require_once("/etc/apache2/capstone-mysql/group-out.php");
// require_once("../classes/event-class.php");

try {
  // call the Pointer static method to connect to mySQL
  $mysqli = Pointer::getPointer();

  // grab the eventID from the page URL
  $pageEventID = $_GET["eventID"];

  // call the class static method for getting details about the event via eventID
  $eventArray = Event::getEventInfo($mysqli, $pageEventID);

  // loop through the result set
  foreach($eventArray as $event) {

    // reformat the date
    $eventID = $event->getEventID();
    $dateTime = $event->getEventDate();
    $niceDate = $dateTime->format("F j, Y");
    $eventName = $event->getEventName();
    $eventCity = $event->getEventCity();
    $eventState = $event->getEventState();
    $eventDifficulty = $event->getEventDifficulty();
    $eventMemberCount = $event->getEventMemberCount();
    $eventActivityList = $event->getEventActivityList();
    $eventDescription = $event->getEventDescription();

    // echo the result
    echo <<<EOD
      <div class="userAvatar"></div>
      <div class="userDisplayName">$eventName</div>
      <div class="userActivities">$niceDate<br><strong>$eventActivityList</strong></div>
      <div class="userAboutMe">
        <h1>Event Description</h1>
        <p>$eventDescription</p>
      </div>
EOD;
  }
} catch(mysqli_sql_exception $error) {
  echo 'oops';
}
?>
