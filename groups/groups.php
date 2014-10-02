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
          <div class = "page_info">
            <h2>Find a Group</h2>
            <h3><small>choose your activity and difficulty level</small></h3>
            <h5>activity:   <a>hike</a> | <a>run</a>    | <a>bike</a> | <a>all</a></h5>
            <h5>difficulty: <a>Starter</a>  | <a>Intermediate</a> | <a>Normal</a> | <a>Enthusiast</a> | <a>Professional</a> | <a>all</a></h5>
          </div>
          <?php require_once("../php/group-list-create.php");?>
                      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
          <script src="../js/validator.js"></script>
      </article>
      <div class = "col-lg-1"></div>
  </body>
</html>