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

    <?php require_once('../php/nav.php');?>
    <div class="container-fluid">
      <div class="col-lg-1"></div>
      <article class="col-md-10">
        <?php require_once('../php/event-page-content.php');?>

      <div class="bar col-md-10">Comments</div>
      <div style="clear:both;"></div>

      <?php require_once('../php/comment-list-create-eventid.php');?>

      <!-- comment entry form-->
      <div class="bar col-md-10" style="margin-top:20px;">Add a comment</div>
      <div style="clear:both;"></div>
      <form class="form-horizontal" role="form" action="../php/insert-event-comment.php" method="post">
          <input type="hidden" value="<?php echo $_GET['eventID'];?>" id="eventID" name="eventID" />
        <div class="form-group col-md-10">
          <label for="commentText">Comment:</label>
          <textarea class="form-control" rows="5" id="commentText" name="commentText"></textarea>
        </div>
        <div class="form-group col-md-10  ">
          <div class="col-sm-10">
            <button type="submit" class="btn btn-default">Submit</button>
          </div>
        </div>
      </form>
      <div style="clear:both;"></div>

      </article>
      <div class = "col-lg-1"></div>
    </div>
    <?php require_once('../php/footer.html');?>
          <script src="../js/validateReg.js"></script>
          <script src="../js/validateLogIn.js"></script>
  </body>
</html>
