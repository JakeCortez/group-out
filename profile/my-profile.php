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
   <div class="container-fluid">
     <article class="col-lg-8">
<!-- Main User Area -->
        <div class="userAvatar" style="float:left;width:200px;height:200px;background-color:#c9f9a5;margin-right:20px;margin-bottom:20px;"></div>
        <div class="userDisplayName" style="font-weight:bold;font-size:2em;">Display Name</div>
        <div class="userActivities" style="font-size:1.5em;">biker | runner</div>
        <div class="userAboutMe" style="clear:both;margin-bottom:20px;"><span style="font-size:2em;font-weight:bold;">About Me</span><br />Praesent accumsan lacus massa, sed aliquam lorem dapibus vitae. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed a gravida leo, vel blandit dolor. Praesent vulputate purus justo, sed ornare tortor aliquet id. Vivamus commodo fringilla nisl non eleifend.</div>

<!-- User Link area -->
        <div class="userLinks" style="font-size:1.75em;font-weight:bold;margin-bottom:20px;">my website / facebook / twitter / instagram</div>

<!-- PLACEHOLDER FOR THE TAB BAR ABOVE LIST AREA -->
        <div class="bar" style="height:40px;background-color:#7f7f7f;color:#fff;font-size:1.5em;font-weight:bold;padding:5px 5px 5px 20px;">Tabs</div>

<!-- Listed routes, events and groups -->
        <div class="listItem">
          <div class="listThumb"></div>

          <div class="listDetails">
            <div class="listHead">Event Name | hike, bike</div>
            <div class="listInfo">City Name, ST | May 10, 2015</div>
            <div class="listDifficulty">difficulty / med</div>
          </div>

          <div class="listJoin">
            <div class="numberJoined">
              <p class="number">132</p>
              <p style="">joined</p>
            </div>
          </div>
          <div class="listButton">join event</div>
          <div style="clear:both;"></div>
        </div>
<!-- END OF Listed routes, events and groups -->

     </article>

     <aside class="col-lg-4">
     <?php require_once('../php/sidebarplaceholder.html');?>
     </aside>
   </div>
   <?php require_once('../php/footer.html');?>

 </body>
</html>
