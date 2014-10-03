 <!DOCTYPE html>
<html>
  <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Group Out</title>
     <?php
     //include "../php/RouteClass.php";
     //include "../php/MapMarkerClass.php";
     //include "../php/sqlconnect.php";
     require_once ("../config/Pointer.php");
     require_once("../php/getUserZip.php");
     
     $mysqli = Pointer::getPointer();
     $query = "select ";
     
     ?>
     <!-- script below grabs user's zip code -->
     
          <!--custom css and javascript-->
      <link href="../css/style.css" rel="stylesheet">
      <script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2aOD4S27kgQRMsngL2OLy_nKGYJ6YUO8&libraries=drawing">
    </script>
      <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script> 
      <script type = "text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
      <script src="json2.js"></script>
      <script type="text/javascript">
      var data = {};
      var routeData = {};
      var geocoder;
      var latlngCenter;
      function initialize() {
        /**
        geocoder = new google.maps.Geocoder();
        geocoder.geocode({'address':zipCode},function(results,status){
        if (status == google.maps.GeocoderStatus.OK) {
        latlngCenter = (results[0].geometry.location);
          });
        }
        **/
       
        var latInput = 35.1107;
        var lngInput = -106.61;
        latlngCenter = new google.maps.LatLng(latInput,lngInput);
        var latlngRouteStart = new google.maps.LatLng(latInput,lngInput);
        var latlngDestination = new google.maps.LatLng(latInput+.2,lngInput+.2);
        directionsRendererObject = new google.maps.DirectionsRenderer({'draggable':true});
        directionsServiceObject = new google.maps.DirectionsService();
        directionsServiceObject.route(
          {'origin': latlngRouteStart,'destination': latlngDestination,'travelMode':google.maps.DirectionsTravelMode.WALKING},
          function(res,sts){if(sts == 'OK')directionsRendererObject.setDirections(res);}//res is a directionsResult object  
        )
        var mapOptions = {
          center: latlngCenter,
          zoom: 12
        };
        var map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);
        directionsRendererObject.setMap(map);
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
      
      function save_map(){
        routeData.routeName = document.getElementById("routeName").value;
        routeData.routeType = document.getElementById("routeType").value;
        routeData.skill = document.getElementById("skill").value;
        routeData.privacyLevel = document.getElementById("privacyLevel").value;
        routeData.routeInfo = document.getElementById("routeInfo").value; 
	var w=[],wp;
	var rleg = directionsRendererObject.directions.routes[0].legs[0]; //https://developers.google.com/maps/documentation/directions/#Legs rleg is assigned to first leg of first route
	data.start = {'lat': rleg.start_location.lat(), 'lng':rleg.start_location.lng()}//data object is given a start property assigned the lat and lng coordinates of rleg's start
	data.end = {'lat': rleg.end_location.lat(), 'lng':rleg.end_location.lng()}
	var wp = rleg.via_waypoints	//wp is assigned to the array of user generated waypoints
	for(var i=0;i<wp.length;i++)w[i] = [wp[i].lat(),wp[i].lng()]	 //wp is fed 2d array w/ lat and lng of each waypoint
	data.waypoints = w; //data object's waypoint variable is assigned to the array we just fed valued to 
	var str = JSON.stringify(data) //our data is turned into a jsong string
        var routeDataString = JSON.stringify(routeData);
	var jax = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');//an ajax object is created 
	jax.open('POST','route-save.php');//make a post request to php file...this must be done before we send data
	jax.setRequestHeader('Content-Type','application/x-www-form-urlencoded');//specifies the type of data we'll be sending
	jax.send('command=save&mapdata='+str+'&routeData='+routeDataString)//Sends "save" command. Also sends str as $_REQUEST['mapdata']
        //to php file AND the str string...sends routeData as routeDataString too
	jax.onreadystatechange = function(){ if(jax.readyState==4) {	//when ready state of ajax object changes we run the function
		//if all went well with the connection...
		
		
		//if connection was messed up...
		
	}}
}
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
            <input type="button" value="Create" onClick="save_map()"></input>
          </form>
        </div>
      </article>
      
    </div>
      <?php require_once('../php/footer.html');?>
    </div>
    </div>
    
  </body>
</html>