<?php session_start();?>
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
    <?php require_once('../php/nav.php');?>
    <div class = "container-fluid">
      <div class = "col-lg-1"></div>
      <article class = "col-lg-10">
      <div class = "page_content">
        <h1 id = "createHeader">Create a Group</h1><br>
        <form method = "post" action = "group-processor.php" enctype = "multipart/form-data" class = "basicForm">
          <label for = "groupName">Group Name:</label>
          <input type = "text" name = "groupName"><br>
          <label for = "groupAvatar">Group Avatar:</label>
          <input type = "file" name = "groupAvatar" id = "groupAvatar"><br>
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
            <label for="activity[]">Road Bike</label>
            <input name="activity[]" type="checkbox" value="1">
            <label for="activity[]">Mountain Bike</label>
            <input name="activity[]" type="checkbox" value="2">
            <label for="activity[]">Hike</label>
            <input name="activity[]"  type="checkbox" value="3">
            <label for="activity[]">Run</label>
            <input name="activity[]" type="checkbox" value="4">
            <label for="activity[]">Walk</label>
            <input name="activity[]" type="checkbox" value="5">
            <br><br>
          <label fot = "groupDescription">Group Description:</label>
          <textarea rows = "5" cols = "80" max = "500" type = "text" name = "groupDescription"></textarea><br>
          <label for = "groupState">State:</label>
          <input name = "groupState" type = "text" maxlength = "2"><br>
          <label for = "groupZip">Postal Code:</label>
          <input name = "groupZip" type = "number"><br>
          <label for = "groupCity">City:</label>
          <input name = "groupCity" type = "text"><br>
          <label for = "privacyLevel">Privacy:</label>
          <select name = "privacyLevel">
            <option value = "3">Private - Only group members have access</option>
            <option value = "1">Public - Anybody can see this group</option>
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
          <script src="../js/validateReg.js"></script>
          <script src="../js/validateLogIn.js"></script>

  </body>
</html>