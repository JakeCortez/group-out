<?php
session_start();
$_SESSION["userID"] = 1;
require_once("../classes/event-class.php");

// Jim's xampp
//require_once("../config/Pointer.php");

// groupout live site
require_once("/etc/apache2/capstone-mysql/group-out.php");

try {
  // call the Pointer static method to connect to mySQL
  $mysqli = Pointer::getPointer();

  // call the class static method for getting details about the event via eventID
  $eventArray = Event::getAllEventInfo($mysqli);

  // loop through the result set
foreach($eventArray as $event) {


  // reformat the date
  $eventID = $event->getEventID();
  $dateTime = new DateTime($event->getEventDate());
  $niceDate = $dateTime->format("F j, Y");
  $eventName = $event->getEventName();
  $eventCity = $event->getEventCity();
  $eventState = $event->getEventState();
  $eventDifficulty = $event->getEventDifficulty();
  $eventMemberCount = $event->getEventMemberCount();
  $eventActivityList = $event->getEventActivityList();

  // echo the result
  echo <<<EOD
    <div class="listItem">
    <div class="listThumb"></div>

    <div class="listDetails">
      <div class="listHead"><a href="../events/event.php?eventID=$eventID">$eventName</a> | $eventActivityList</div>
      <div class="listInfo">$eventCity, $eventState | $niceDate</div>
      <div class="listDifficulty">difficulty / $eventDifficulty</div>
    </div>

    <div class="listJoin">
      <div class="numberJoined">
        <p class="number">$eventMemberCount</p>
        <p>joined</p>
      </div>
    </div>
    <div class="listButton">join event</div>

    <div style="clear:both;"></div>
    </div>
EOD;
}
} catch(mysqli_sql_exception $error) {
echo 'oops';
}

?>
