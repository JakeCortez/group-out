<?
ob_start(); // turns on output buffering meaning php output is stored locally until we decide to send it back to page
header('Cache-Control: no-store, no-cache, must-revalidate');//sets catch-control on http header...
require_once("/etc/apache2/capstone-mysql/group-out.php");
$data = $_REQUEST['mapdata'];//data is assigned to info we passed from saveMapFunction
$routeData = $_REQUEST['routeData'];//routeData is assigned to data we passed from SaveMapFunction
try{
    $mysqli = Pointer::getPointer();
} catch (mysqli_sql_exception $sqlException) {
    //handle connection error
    throw(new mysqli_sql_exception("Unable to connect to the database"));
}


$query = "INSERT INTO routes(routeData) VALUES(?)";// we need a mapData column 
insert($query);
function insert($query){
$statement = $mysqli->prepare($query);

if($statement === false){
    throw(new mysqli_sql_exception("error"));
}

$clean = $statement->bind_param("s", $data);

if($clean === false){
    throw(new mysqli_sql_exception("error"));
}

if($statement->execute() === false){
    throw(new mysqli_sql_exception("error"));
}
}
?>