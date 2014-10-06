<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Group Out</title>
          <!--custom css and javascript-->
      <link href="../css/style.css" rel="stylesheet">
            <!-- Bootstrap -->
      <link href="../css/bootstrap.min.css" rel="stylesheet">
      <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
      <script src="../js/bootstrap.min.js"></script>
          <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
          <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
          <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
          <![endif]-->
      <script src="../js/group-out.js"></script>
  </head>
  <body>

    <?php require_once('../php/nav.html');?>
    <div class = "container-fluid">
      <div class = "col-lg-1"></div>
      <article class = "col-lg-10">
        <div class = "page_content">
          <h1 id = "createHeader">Create an Event</h1><br>
          <form class = "basicForm" id="eventName" method="post" action="event-processor.php">
            <label for="eventName">Event Name</label>
            <input type="text" id="eventName" required name="eventName" placeholder="myEvent!"/><br>
            <label for="eventCity">Event City</label>
            <input type="text" id="eventCity" required name="eventCity" placeholder="Albuquerque?"/><br>
            <label for="eventState">Event State</label>
            <input type="text" maxlength = "2" id="eventState" required name="eventState" placeholder="NM"/><br>
            <label for="eventZipCode">Event Zip Code</label>
            <input type="text" maxlength ="10" id="eventZip" required name="eventZip" placeholder="zip!" /> <br>
            <label for="eventDescription">Event Description</label>
            <textarea name="eventDescription" rows="5" class="description" cols="80" max="500" type="text"></textarea> <br>
            <label for="date">Event Time and Date</label>
            <input type="text" id="eventDate" required name="eventDate"><br>
            <label for="activity">Choose One or More Activities:</label>
            <label for="roadBike">Road Bike</label>
            <input name="roadBike" type="checkbox" value="1">
            <label for="mountainBike">Mountain Bike</label>
            <input name="mountainBike" type="checkbox" value="2">
            <label for="hike">Hike</label>
            <input name="hike"  type="checkbox" value="3">
            <label for="run">Run</label>
            <input name="run"  type="checkbox" value="4">
            <label for="walk">Walk</label>
            <input name="walk"  type="checkbox" value="5">
            <br><br>
            <label for="eventDifficulty">Choose Your Event's Difficulty</label>
            <select name = "eventDifficulty">
              <option value = "null">--</option>
              <option value = "5">Professional</option>
              <option value = "4">Enthusiast</option>
              <option value = "3">Normal</option>
              <option value = "2">Intermediate</option>
              <option value = "1">Starter</option>
            </select><br>
            <label for = "eventPrivacy">Privacy Setting</label>
            <select name = "eventPrivacy">
              <option value = "2">Private</option>
              <option value = "1">Public</option>
            </select><br>
            <button type="submit">Click to Create Event</button>
          </form>
        </div>
      </article>
      <div class = "col-lg-1"></div>
    </div>
    <?php require_once('../php/footer.html');?>
          <script src="../js/validateReg.js"></script>
          <script src="../js/validateLogIn.js"></script>
  </body>
</html>
