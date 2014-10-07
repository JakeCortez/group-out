  function initialize() {
	this.dataObject =
        {"start":{"lat":35.339354,"lng":-106.94816500000002},
"end":{"lat":35.5439559,"lng":-106.76062030000003},"waypoints":[]}
        
	
        var wp=[];
        for(var i=0;i<dataObject.waypoints.length;i++){
		wp[i] = {'location': new google.maps.LatLng(dataObject.waypoints[i][0], data.waypoints[i][1]),'stopover':false }
	}

        latlngCenter = new google.maps.LatLng(dataObject.start.lat+.1,dataObject.start.lng+.1);//new google.maps.LatLng(latInput,lngInput);
        var latlngRouteStart = new google.maps.LatLng(dataObject.start.lat, dataObject.start.lng);
        var latlngDestination = new google.maps.LatLng(dataObject.end.lat, dataObject.end.lng);
        directionsRendererObject = new google.maps.DirectionsRenderer({'draggable':false});
        directionsServiceObject = new google.maps.DirectionsService();
        directionsServiceObject.route(
          {'origin': latlngRouteStart,'destination': latlngDestination, 'waypoints': wp,'travelMode':google.maps.DirectionsTravelMode.WALKING},
          function(res,sts){if(sts == 'OK')directionsRendererObject.setDirections(res);}//res is a directionsResult object  
        )
        var mapOptions = {
          center: latlngCenter,
          zoom: 12
        };
        var map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);
        directionsRendererObject.setMap(map);
      }