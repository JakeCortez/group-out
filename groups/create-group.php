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
       
        <form id="nameGroup" method="post"<h1>Create a group</h1><form action="jquery-form.php">
            <label for="groupName">Group Name</label>
            <input type="text" id="groupName" name="email" placeholder="The Wicked Lobos"/><br />
            <label for="">Password</label>
            <input type="password" id="password" name="password" placeholder="abc123" /><br />
            <label for="confirmPassword">Confirm Password</label>
            <input type="password" id="confirmPassword" name="confirmPassword" placeholder="abc123" /> <br />
            <label for="member">Member Number</label>
            <input type="number" id="member" name="member" placeholder="abc123"/><br />
            <label type="napHours">Nap Hours</label>
            <input type="number" min="0" step="1.75" id="napHours" name="napHours" placeholder="Sleep Well!" /> <br />
            <button type="submit">Nap Time!</button>
        </form>  
      </article>
    
      <aside class = "col-lg-3">
      <?php require_once('../php/sidebarplaceholder.html');?>
      </aside>
    </div>
    <?php require_once('../php/footer.html');?>

  </body>
</html>