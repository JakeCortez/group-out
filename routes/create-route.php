 <!DOCTYPE html>
<html>
  <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Group Out</title>
          <!--custom css and javascript-->
      <link href="../css/style.css" rel="stylesheet">
      <script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2aOD4S27kgQRMsngL2OLy_nKGYJ6YUO8&libraries=drawing">
    </script>
      <script type = "text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
      <script type="text/javascript">
      function initialize() {
        var mapOptions = {
          center: { lat: 35.1107, lng: -106.61},
          zoom: 12
        };
        var map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);
        var drawingManager = new google.maps.drawing.DrawingManager({
            drawingMode: google.maps.drawing.OverlayType.MARKER,
            drawingControl: true,
            drawingControlOptions: {
              position: google.maps.ControlPosition.TOP_CENTER,
              drawingModes: [
                google.maps.drawing.OverlayType.MARKER,
                google.maps.drawing.OverlayType.POLYLINE
              ]
            },
            markerOptions: {
              icon: 'http://www.example.com/icon.png'
            },
            circleOptions: {
              fillColor: '#ffff00',
              fillOpacity: 1,
              strokeWeight: 5,
              clickable: false,
              zIndex: 1,
              editable: true
            }
          });
          drawingManager.setMap(map);
      }
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
    <?php require_once('../php/nav.html');?>
    <div id = "container-fluid">
    <div class = "row">
      <div class = "col-lg-1"></div>
      <article class = "col-lg-10">
        <h1 id = "createHeader">Create a Route</h1><br>
        <div class = "page_content">
          <div id = "map-canvas">
          </div><br>
          <form class = "basicForm">
            <label for = "routeName">Route Name:</label>
            <input name = "routeName" type = "text" placeholder = "Route Name"><br>
            <label for = "routeType">Route Type:</label>
            <select name = "routeType">
              <option>--</option>
              <option>Hike</option>
              <option>Jog</option>
              <option>Bike</option>
            </select><br>
            <label for = "skill">Route Skill Level:</label>
            <select name = "skill">
              <option>--</option>
              <option>Professional</option>
              <option>Enthusiast</option>
              <option>Normal</option>
              <option>Intermediate</option>
              <option autofocus>Starter</option>
            </select><br>
            <label for = "routeInfo">Route Description:</label>
            <textarea rows = "5 " class = "description" cols = "80" max = "500" type = "text"></textarea><br>
            <label for = "privacyLevel">Privacy</label>
            <select for = "privacyLevel">
              <option value = "1">Private - Only you can see this route</option>
              <option value = "0">Public - Anybody can see this route</option>
            </select><br>
            <button type = "submit">Create</button>
          </form>
        </div>
      </article>
      <div class = "col-lg-1"></div>
    </div>
      <?php require_once('../php/footer.html');?>
                      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
          <script src="../js/validator.js"></script>
    </div>
    </div>
  </body>
</html>