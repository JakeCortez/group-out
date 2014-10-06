  function initialize() {
	
        var latInput = userZipLatLng.lat;
        var lngInput = userZipLatLng.lng;
        latlngCenter = userZipLatLng;//new google.maps.LatLng(latInput,lngInput);
        var latlngRouteStart = new google.maps.LatLng(latInput-.1,lngInput-.1);
        var latlngDestination = new google.maps.LatLng(latInput+.1,lngInput+.1);
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
     
      }