<?php
//this needs to echo the json string we pull from the db
//send MAP ID HERE
$mapID = $_REQUEST['mapID'];
// require the database
require_once("/etc/apache2/capstone-mysql/group-out.php");

try{
    $mysqli = Pointer::getPointer();
} catch (mysqli_sql_exception $sqlException) {
    //handle connection error
    throw(new mysqli_sql_exception("Unable to connect to the database"));
}
$query = "SELECT routeData from "
//write an SQL statement that grabs routeData where mapID = $MapID 
?>