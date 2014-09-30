<?php
// require the database
require_once("/etc/apache2/capstone-mysql/group-out.php");

try{
    $mysqli = Pointer::getPointer();
} catch (mysqli_sql_exception $sqlException) {
    //handle connection error
    throw(new mysqli_sql_excpetion("Unable to connect to the database"));
}
?>