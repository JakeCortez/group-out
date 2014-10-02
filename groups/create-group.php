<?php session_start(); ?>
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
        <h1 id = "createHeader">Create a Group</h1><br>
        <form method = "post" action = "../php/group-processor.php" class = "basicForm">
          <label for = "groupName">Group Name:</label>
          <input type = "text" name = "groupName"><br>
          <label for = "groupAvatar">Group Avatar:</label>
          <input type = "file" name = "groupAvatar"><br>
          <label for = "groupSkill">Skill Level of Group:</label>
          <select name = "groupSkill">
            <option value = "null">--</option>
            <option value = "5">Professional</option>
            <option value = "4">Enthusiast</option>
            <option value = "3">Normal</option>
            <option value = "2">Intermediate</option>
            <option value = "1">Starter</option>
          </select><br>
            <label for="activity">Choose One or More Activities</label>
            <label for="activityType">Hike</label>
            <input name="activityType" type="checkbox" value="1">
            <label for="activityType">Bike</label>
            <input name="activityType" type="checkbox" value="2">
            <label for="activityType">Run</label>
            <input name="activityType"  type="checkbox" value="3">
            <br><br>
          <label fot = "groupDescription">Group Description:</label>
          <textarea rows = "5" cols = "80" max = "500" type = "text" name = "groupDescription"></textarea><br>
          <label for = "groupState">State:</label>
          <input name = "groupState" type = "text" max = "2"><br>
          <label for = "groupZip">Postal Code:</label>
          <input name = "groupZip" type = "number"><br>
          <label for = "groupCity">City:</label>
          <input name = "groupCity" type = "text"><br>
          <label for = "privacyLevel">Privacy:</label>
          <select name = "privacyLevel">
            <option value = "1">Private - Only group members have access</option>
            <option value = "0">Public - Anybody can see this group</option>
          </select><br>
          <button type = "submit">Create Group</button>
        </form>
      </div>
      </article>
      <div class = "col-lg-1"></div>
    </div>
    <?php require_once('../php/footer.html');?>
                      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
          <script src="../js/validator.js"></script>

  </body>
</html>