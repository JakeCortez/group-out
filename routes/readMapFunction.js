function readMap(data) {
    //get relevant variables from db
    //we have start object w/ lat and lng properties
    //we have an end object w/ lat lng properties
    //we have waypoints with array 
      function initialize() {
	
        var latInput = userZipLatLng.lat;
        var lngInput = userZipLatLng.lng;
        latlngCenter = userZipLatLng;//new google.maps.LatLng(latInput,lngInput);
        var latlngRouteStart = start
        var latlngDestination = end 
        directionsRendererObject = new google.maps.DirectionsRenderer({'draggable':true});
        directionsServiceObject = new google.maps.DirectionsService();
        
        var wp = [];
        //for loop below creates an array of latLng objects w/ lat and lng coordinates from each of the waypoints saved in data
	for(var i=0;i<data.waypoints.length;i++){
		wp[i] = {'location': new google.maps.LatLng(data.waypoints[i][0], data.waypoints[i][1]),'stopover':false }
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