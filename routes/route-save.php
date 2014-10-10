<?
//ob_start(); turns on output buffering meaning php output is stored locally until we decide to send it back to page
header('Cache-Control: no-store, no-cache, must-revalidate');//sets catch-control on http header...
require_once("/etc/apache2/capstone-mysql/group-out.php");

try{
    $mysqli = Pointer::getPointer();
} catch (mysqli_sql_exception $sqlException) {
    //handle connection error
    throw(new mysqli_sql_exception("Unable to connect to the database"));
}
$_SESSION["userID"]=1;
$data = $_REQUEST['mapdata'];//data is assigned to string we passed using saveMapFunction
$routeData = $_REQUEST['routeData'];//routeData is assigned to data we passed from SaveMapFunction
$routeData = json_decode($routeData);//turns the string into an object so we can grab the parts in our bind_param

$query = "INSERT INTO routes(userID, routeName, routeDescription, routeDifficulty, routePrivacy, routeData) VALUES(?, ?, ?, ?, ?, ?)";
$statement = $mysqli->prepare($query);

if($statement === false){
    throw(new mysqli_sql_exception("error"));
}

$clean = $statement->bind_param("isssis",$_SESSION["userID"], $routeData->routeName, $routeData->routeInfo,$routeData->skill,$routeData->privacyLevel,$routeData->routeType);

if($clean === false){
    throw(new mysqli_sql_exception("error"));
}

if($statement->execute() === false){
    throw(new mysqli_sql_exception("error"));
}




?>