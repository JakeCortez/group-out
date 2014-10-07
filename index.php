<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Group Out Home Page</title>
          <!--custom css and javascript-->
      <link href="css/style.css" rel="stylesheet">
            <!-- Bootstrap -->
      <link href="css/bootstrap.min.css" rel="stylesheet">

      <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
      <script src="//malsup.github.com/jquery.form.js"></script>
     
      <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.min.js"></script>
      <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/additional-methods.min.js"></script>
      
      <script src="js/bootstrap.min.js"></script>
          <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
          <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
          <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
          <![endif]-->

  </head>
  <body>
    <div class="page-header">
      <h1>group<strong>out</strong><small> Event creator for outdoor enthusiasts.</small></h1>
    </div>

    <?php require_once('php/nav-index.html');?>

     <div class = "container-fluid">
      <div class = "row">
        <article class = "col-lg-12">
          <!--carousel start-->
          <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
              <li data-target="images/share_routes.jpg" data-slide-to="0" class="active"></li>
              <li data-target="images/meet_people.jpg" data-slide-to="1"></li>
              <li data-target="images/make_events.jpg" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
              <div class="item active">
                <img src="images/share_routes.jpg" alt="..." />
                <div class="carousel-caption">
                  <h3>Share your favorite routes.</h3>
                </div>
              </div>
              <div class="item">
                <img src="images/meet_people.jpg" alt="..." />
                <div class="carousel-caption">
                  <h3>Meet new people.</h3>
                </div>
              </div>
                <div class="item">
                <img src="images/make_events.jpg" alt="..." />
                <div class="carousel-caption">
                  <h3>Make an event for your group to attend.</h3>
                </div>
              </div>
            </div>
            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
          </div>
        </article>
      </div>
    </div>
    <?php require_once('php/footer-index.html');?>
            <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
          <script src="js/validateReg.js"></script>
          <script src="js/validateLogIn.js"></script>
  </body>
</html>
