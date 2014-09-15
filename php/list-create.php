<?php
// step 1a connect to database
$db = mysqli_connect("localhost","root","","groupOut");

// step 1b Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// step 2 construct the sql query for events created by userID 1 and limit to 3 results
$result = mysqli_query($db,"SELECT *, DATE_FORMAT(eventDateCreated,'%M %e, %Y') AS niceDate FROM events WHERE userID=1 LIMIT 5");

// step 3 create the html from the results of the sql query
while($row = mysqli_fetch_array($result)) {
  echo "<div class='listItem'>
        <div class='listThumb'></div>

        <div class='listDetails'>
          <div class='listHead'>" . $row['eventName'] . " | " . $row['eventActivity'] . "</div>
          <div class='listInfo'>" . $row['eventCity'] . ", " . $row['eventState'] . " | " . $row['niceDate'] .  "</div>
          <div class='listDifficulty'>difficulty / " . $row['eventDifficulty'] . "</div>
        </div>

        <div class='listJoin'>
          <div class='numberJoined'>
            <p class='number'>" . $row['eventJoined'] . "</p>
            <p>joined</p>
          </div>
        </div>
        <div class='listButton'>join event</div>

        <div style='clear:both;'></div>
        </div>";
}

// step 4 close the database connection
mysqli_close($db);

?>
