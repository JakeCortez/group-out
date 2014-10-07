function ReadMap(tMapID) {//declaring an object that will take the mapID of a map we want to reproduce as a parameter
    //we need to include the createRequest.js wherever this is called
    //get relevant variables from db
    //we have start object w/ lat and lng properties
    //we have an end object w/ lat lng properties
    //we have waypoints with array
    /* CODE TO GET JSON STRING FROM DATABASE AND THEN TURN IT INTO A DATA OBJECT SITS BELOW WE COMMENT IT OUT FOR TESTING
    this.mapID = tMapID;
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
    */
    //at this point we should have a dataObject object with all the properties we need to reproduce the map
    //for the sake of testing we will create one just below
    this.dataObject = {
	start:{lat:35.1,lng:-106.1},end:{lat:35,lng:-106},waypoints:[]
	
    }
    
    this.getObject = function() {
	return this.dataObject;
    }
 
    this.init = function(data) {
	
        latlngCenter = data.start;
        latlngRouteStart = data.start;
        latlngDestination = data.end;
        directionsRendererObject = new google.maps.DirectionsRenderer({'draggable':true});
        directionsServiceObject = new google.maps.DirectionsService();
         
        wp = [];
        //for loop below creates an array of latLng objects w/ lat and lng coordinates from each of the waypoints saved in data
	for(var i=0;i<data.waypoints.length;i++){
		wp[i] = {'location': new google.maps.LatLng(data.waypoints[i][0], data.waypoints[i][1]),'stopover':false }
	}
    
        directionsServiceObject.route(
          {'origin': latlngRouteStart,'destination': latlngDestination, 'waypoints':wp,'travelMode':google.maps.DirectionsTravelMode.WALKING},
          function(res,sts){if(sts == 'OK')directionsRendererObject.setDirections(res);}//res is a directionsResult object  
        )
        mapOptions = {
          center: {lat: -35, lng: 150},
          zoom: 12
        };
	
       
      }
      
}