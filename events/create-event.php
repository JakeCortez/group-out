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
      <article class = "col-lg-9">
        <h1>Create an Event</h1>
        <form id="eventName" method="post" action="">
            <label for="eventName"><h4>Event Name</h4></label>
            <input type="text" id="eventName" required name="eventName" placeholder="myEvent!"/><br />
            <label for="eventCity"><h4>Event City</h4></label>
            <input type="text" id="eventCity" required name="eventCity" placeholder="Albuquerque?"/><br />
            <label for="eventState"><h4>Event State</h4></label>
            <input type="text" size=2 id="eventState" required name="eventState" placeholder="NM"/><br />
            <label for="eventZipCode"><h4>Event Zip Code</h4></label>
            <input type="text" max="10" id="eventZipCode" required name="eventZipCode" placeholder="zip!" /> <br />
            <label for="eventDescription"><h4>Event Description</h4></label>
            <input type="text" max="300" id="eventDescription" required name="eventDescription" placeholder="abc123" /> <br />
            <label for="date"><h4>Event Time and Date</h4<label><br />
            <input type="datetime-local" value="2014-09-04T21:00" id="datetime-local" required name="datetime-local"><br /><br/>
            <form action="">
            <h4>Choose one or more activities</h4>
            <input name="activity" type="checkbox" value="hike">Hike<br>
            <input type="checkbox" value="bike">Bike<br>
            <input type="checkbox" value="run">Run<br>
            <input type="checkbox" value="other">Other<br><br>
            <h4>Choose Group Skill Level</h4>
            <input name="skillLevel"  type="checkbox" value="low">Lo<br>
            <input type="checkbox" value="medium">Med<br>
            <input type="checkbox" value="hi">Hi<br><br>
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

  </body>
</html>

