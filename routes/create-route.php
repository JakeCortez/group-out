<?php
session_start();
$_SESSION["userZip"] = 87102;
$_SESSION["userID"] = 0;
$userZipGeocode = file_get_contents(
("https://maps.googleapis.com/maps/api/geocode/json?address=".$_SESSION["userZip"]."&key=AIzaSyB2aOD4S27kgQRMsngL2OLy_nKGYJ6YUO8"));
?>

<!DOCTYPE html>
<html>
  <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Group Out</title>
     
     <!-- declaring important variables -->
     <script type="text/javascript">
      var data = {};
      var routeData = {};
      var latlngCenter;
      
     </script>
      <!--linking css and javascript-->
      <link href="../css/style.css" rel="stylesheet">
      <script type="text/javascript" src="saveMapFunction.js"></script>
      <script type="text/javascript" src="mapInitFunction.js"></script>
      <script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2aOD4S27kgQRMsngL2OLy_nKGYJ6YUO8&libraries=drawing">
      </script>
      <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script> 
      <script type = "text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

     <!-- MAKING AN AJAX OBJECT called "request" -->
     <script type = "text/javascript" src="createRequest.js"></script>
     <script>
    //getting latLng coordinates of users zip code from google geocode api
    var request = null;
    var userZipLatLng;
    request = createRequest();
     var url = "https://maps.googleapis.com/maps/api/geocode/json?address="+<?php echo $_SESSION["userZip"]?>+"&key=AIzaSyB2aOD4S27kgQRMsngL2OLy_nKGYJ6YUO8";
     request.open("GET",url, false);
     request.onreadystatechange = function(){
      if (request.readyState==4) {
	var geocodeObject = JSON.parse(request.responseText);
	userZipLatLng = (geocodeObject.results[0].geometry.location);
	
      }
     }
     request.send(null);
    google.maps.event.addDomListener(window, 'load', initialize);
    </script>
     
     
     
            <!-- Bootstrap -->
      <link href="../css/bootstrap.min.css" rel="stylesheet">
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
  <script type = "text/javscript" src = "../js/maptest.js"></script> 
    <?php require_once('../php/nav.php');?>
    <div id = "container-fluid">
    <div class = "row">
      <article class = "col-lg-9">
        <div class = "page_content">
          <div id = "map-canvas">
          </div>
          <form class = "basicForm">
            <label for = "routeName">Route Name:</label>
            <input name = "routeName" id = "routeName" type = "text" placeholder = "Route Name"><br>
            <label for = "routeType">Route Type:</label>
            <select name = "routeType" id = "routeType">
              <option>--</option>
              <option>Hike</option>
              <option>Jog</option>
              <option>Bike</option>
            </select><br>
            <label for = "skill">Route Skill Level:</label>
            <select name = "skill" id = "skill">
              <option>--</option>
              <option>Professional</option>
              <option>Enthusiast</option>
              <option>Normal</option>
              <option>Intermediate</option>
              <option autofocus>Starter</option>
            </select><br>
            <label for = "routeInfo" >Route Description:</label>
            <textarea rows = "5 " id = "routeInfo" class = "description" cols = "80" max = "500" type = "text"></textarea><br>
            <label for = "privacyLevel">Privacy</label>
            <select for = "privacyLevel" id = "privacyLevel">
              <option value = "1">Private - Only you can see this route</option>
              <option value = "0">Public - Anybody can see this route</option>
            </select><br>
            <input type="button" value="Create" onClick="save_map();"/>
          </form>
        </div>
      </article>
      
    </div>
      <?php require_once('../php/footer.html');?>
    </div>
    </div>
    
  </body>
</html>