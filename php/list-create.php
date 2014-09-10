<?php
// step 1 connect to database
// step 2 construct the sql select with userID
// step 3 loop over result set grabbing up to 5 events & buiding html


// function to output a event block for an event list
function output_block($eventName, $eventActivity, $eventCity, $eventState, $eventDateCreated, $eventDifficulty) {
  // change event date stored in database to "Month DD, YYYY"
  $eventDateCreated = X

  // events will be an array, can be one or more of run, bike & hike
  $eventActivity = Y

  // creation of the html for a single block
  echo "<div class='listItem'>
    <div class='listThumb'>$eventThumb</div>

    <div class='listDetails'>
      <div class='listHead'>$eventName | $eventActivity</div>
      <div class='listInfo'>$eventCity, $eventState | $eventDateCreated</div>
      <div class='listDifficulty'>difficulty | $eventDifficulty</div>
    </div>

    <div class="listJoin">
      <div class="numberJoined">
        <p class="number">$numberJoined</p>
        <p style="">joined</p>
      </div>
    </div>
    <div class="listButton">joined</div>

    <div style='clear:both;'></div>
  </div>";
}





?>
