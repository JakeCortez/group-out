
      function createRequest(){
        var request;
	try{
	request = new XMLHttpRequest();
	} catch (trymicrosoft){
	try{
	  request = new ActiveXObject("Msxml2.XMLHTTP");
	}catch(othermicrosoft){
	try{
	request = new ActiveXObject("Microsot.XMLHTTP");
	}catch (failed){
	request = null;
      }
     
     
    }
   }
   if (request == null) {
    alert("Error creating request object!");//code
   }
   return request; 
   }