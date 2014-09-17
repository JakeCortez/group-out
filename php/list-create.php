<?php

try {
  // throw exceptions instead of PHP errors
  mysqli_report(MYSQLI_REPORT_STRICT);

  // connect!
  $mysqli = new mysqli("localhost", "root", "", "groupOut");

  // create & prepare a query template
  $query = "SELECT eventActivity, eventCity, eventDateCreated, eventDifficulty, eventJoined, eventName, eventState FROM events WHERE userID = ? LIMIT 3";

  // prepare the statement
  if(($statement = $mysqli->prepare($query)) === false) {
    throw(new mysqli_sql_exception("Unable to prepare query $query"));
  }

  // bind parameters to the template
  $userID = 1; // yucky hard wired value - get this from a session...
  if(($statement->bind_param("i", $userID)) === false) {
    throw(new mysqli_sql_exception("Unable to bind parameters"));
  }

  // execute the query
  if(($statement->execute()) === false) {
    throw(new mysqli_sql_exception("Unable to execute statement"));
  }

  // be demanding and get results! *pounds fist*
  if(($result = $statement->get_result()) === false) {
    throw(new mysqli_sql_exception("Unable to get results"));
  }


  // loop through the result set
  while(($row = $result->fetch_assoc()) !== null) {


    // reformat the date
    $dateTime = DateTime::createFromFormat("Y-m-d H:i:s", $row["eventDateCreated"]);
    $niceDate = $dateTime->format("F j, Y");

    // echo the result
    echo <<<EOD
      <div class="listItem">
      <div class="listThumb"></div>

      <div class="listDetails">
        <div class="listHead">$row[eventName] | $row[eventActivity]</div>
        <div class="listInfo">$row[eventCity], $row[eventState] | $niceDate</div>
        <div class="listDifficulty">difficulty / $row[eventDifficulty]</div>
      </div>

      <div class="listJoin">
        <div class="numberJoined">
          <p class="number">$row[eventJoined]</p>
          <p>joined</p>
        </div>
      </div>
      <div class="listButton">join event</div>

      <div style="clear:both;"></div>
      </div>
EOD;
  }

  // clean up the result set
  $result->free();

  // free up the statement
  $statement->close();

  // now, unplug the mySQL connection
  $mysqli->close();
} catch(mysqli_sql_exception $error) {
  // echo $error
}

// THINGS THAT STILL NEED TO HAPPEN
// the active user needs to be id'd first, so that the list data is related to them
// for the profile page, the event, route and group lists need to be related to the active user
// the join button needs to trigger that the active user has joined the event
  // if the active user already joined an event, the button should say "joined"
// eventActivity is actually going to be a separate table
// eventJoined is going to see who's joined the event, but people can unjoin them too
?>
