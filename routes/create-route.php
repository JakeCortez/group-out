 <!DOCTYPE html>
<html>
  <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Group Out</title>
          <!--custom css and javascript-->
      <link href="../css/style.css" rel="stylesheet">
      <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBy-_PKHdZOkY8jGVZlOFN7hbXVflQ-4us"></script>
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
    <div id = "container-fluid">
      <div id = "map-canvas">
      </div>
      <article class = "col-lg-9">
        <div id = "placeholder-map"></div>
        <form>
          <input type = "text" placeholder = "Route Name"><br>
          Route Type: <br>
          Run<input type = "checkbox"><br>
          Hike<input type = "checkbox"><br>
          Bike<input type = "checkbox"><br>
           <input type = "" > <br>
        </form>
      </article>
      <aside class = "col-lg-3">
      <?php require_once('../php/sidebarplaceholder.html');?>
      </aside>
      <?php require_once('../php/footer.html');?>
    </div>
    </div>
  </body>
</html>