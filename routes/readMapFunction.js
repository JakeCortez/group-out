function readMap(tMapID) {
    //we need to include the createRequest.js wherever this is called
    //get relevant variables from db
    //we have start object w/ lat and lng properties
    //we have an end object w/ lat lng properties
    //we have waypoints with array
    var dataObject;
    var newRequest = createRequest();
    var url = "returnMap.php";
    newRequest.open("GET",url,false);
    newRequest.onreadystatechange = function(){
        if (request.readyState==4){
            dataObject = JSON.parse(newRequest.responseText);
        }
    

    }
    newRequest.send(mapID=tMapID);
      function initialize() {
	
        var latInput = userZipLatLng.lat;
        var lngInput = userZipLatLng.lng;
        latlngCenter = userZipLatLng;//new google.maps.LatLng(latInput,lngInput);
        var latlngRouteStart = dataObject.start;
        var latlngDestination = dataObject.end;
        directionsRendererObject = new google.maps.DirectionsRenderer({'draggable':true});
        directionsServiceObject = new google.maps.DirectionsService();
        
        var wp = [];
        //for loop below creates an array of latLng objects w/ lat and lng coordinates from each of the waypoints saved in data
	for(var i=0;i<dataObject.waypoints.length;i++){
		wp[i] = {'location': new google.maps.LatLng(dataObject.waypoints[i][0], dataObject.waypoints[i][1]),'stopover':false }
	}
        
        directionsServiceObject.route(
          {'origin': latlngRouteStart,'destination': latlngDestination, 'waypoints':wp,'travelMode':google.maps.DirectionsTravelMode.WALKING},
          function(res,sts){if(sts == 'OK')directionsRendererObject.setDirections(res);}//res is a directionsResult object  
        )
        var mapOptions = {
          center: latlngCenter,
          zoom: 12
        };
        var map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);
        directionsRendererObject.setMap(map);
     
      }
}