function save_map(){
//assigning values in all forms to properties in the routeData object   
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
var saveRequest = createRequest();//an ajax object is created 
	saveRequest.open('POST','route-save.php',true);//make a post request to php file...this must be done before we send data
	saveRequest.setRequestHeader('Content-Type','application/x-www-form-urlencoded');//specifies the type of data we'll be sending
	saveRequest.send('command=save&mapdata='+str+'&routeData='+routeDataString)//Sends "save" command. Also sends str as $_REQUEST['mapdata'] and routeData as $_REQUEST['routeData]
        //to php file 
	saveRequest.onreadystatechange = function(){ if(saveRequest.readyState==4) {	//when ready state of ajax object changes we run the function
		alert(str);
		
	}}
}