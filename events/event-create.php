 <!DOCTYPE html>
<html>

<?php require_once('../php/head.html');?>
  <body>
    
    <?php require_once('../php/nav.html');?>
    <div class = "container-fluid">
      <article class = "col-lg-9">
        <h1>Create an Event</h1>
        <form id="eventName" method="post" action="">
            <label for="eventName"><h4>Event Name</h4></label>
            <input type="text" id="eventName" name="eventName" placeholder="myEvent!"/><br />
            <label for="eventCity"><h4>Event City</h4></label>
            <input type="text" id="eventCity" name="eventCity" placeholder="Albuquerque?"/><br />
            <label for="eventState"><h4>Event State</h4></label>
            <input type="text" size=2 id="eventState" name="eventState" placeholder="NM"/><br />
            <label for="eventZipCode"><h4>Event Zip Code</h4></label>
            <input type="number" maxlength="5" id="eventZipCode" name="eventZipCode" placeholder="zip!" /> <br />
            <label for="eventDescription"><h4>Event Description</h4></label>
            <input type="text" max="300" id="eventDescription" name="eventDescription" placeholder="abc123" /> <br />
            <label for="date"><h4>Event Time and Date</h4<label><br />
            <input type="datetime-local" value="2014-09-04T21:00" id="datetime-local" name="datetime-local"><br /><br/>
            <form action="">
            <h4>Choose one or more activities</h4>
            <input name="activity" type="checkbox" value="hike">Hike<input type="checkbox" value="bike">Bike<input type="checkbox" value="run">Run<input type="checkbox" value="other">Other<br /><br />
            <h4>Choose Group Skill Level</h4>
            <input name="skillLevel"  type="checkbox" value="low">Lo<input type="checkbox" value="medium">Med<input type="checkbox" value="hi">Hi<br /><br />
            <h4>Privacy Setting</h4>
            <input name="privacy" type="checkbox" value="private">Private / only people you invite can join<br /><input type="checkbox" value="public">Public / anyone can request to join<br />
        </form>
            <br />
        <button type="submit">Click to Create Event</button>
      </article>
    
      <aside class = "col-lg-3">
      <?php require_once('../php/sidebarplaceholder.html');?>
      </aside>
    </div>
    <?php require_once('../php/footer.html');?>
    
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>

