<?php
session_start();

if(!isset($_SESSION["profileID"])){
  header("Location: create-profile.php");
}

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
    <script src="../js/group-out.js"></script>
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
  </head>
  <body>
    <!-- Navigation called from php folder -->
    <?php require_once('../php/nav.php');?>

    <div class="container-fluid">
      <div class = "col-lg-1"></div>
      <!-- Article Area -->
      <article class="col-md-10">
        <?php require_once("profile-page-content.php");?>
      </article>
      <div class = "col-lg-1"></div>
    </div>

    <!-- footer called from php folder -->
    <?php require_once('../php/footer.html');?>
                      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
          <script src="../js/validateReg.js"></script>
          <script src="../js/validateLogIn.js"></script>
  </body>
</html>
