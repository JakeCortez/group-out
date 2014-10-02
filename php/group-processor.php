<?php
    //start session
    session_start();
    
    $_SESSION["userID"] = 2;
    
    if(notset($_SESSION["userID"])){
        echo("You must be logged into an account to create a group");
    }
    
    //require all needed files
    require_once("/etc/apache2/capstone-mysql/group-out.php");
    require_once("../classes/user-login.php");
    require_once("../classes/group-class.php");
    
    //set up connection to server and get user info
    try{
        $mysqli = Pointer::getPointer();
    }
    catch(mysqli_sql_excpetion $error){
        throw(new mysqli_sql_exception("could not connect to server", 0, $error));
    }
    try{
    $group  = Group( null, $_SESSION["userID"], null, $_POST["groupAvatar"], $_POST["groupCity"],
                     $_POST["groupDescription"], $_POST["groupName"], $_POST["groupSkill"],
                     $_POST["groupState"], $_POST["groupZip"], $_POST["privacyLevel"] );
    }
    catch(UnexpectedValueException $error){
        throw(new UnexpectedValueException("sorry something went wrong when creating your group", 0, $error));
    }
    catch(RangeException $error){
        throw(new RangeException("sorry something went wrong when creating your group"));
    }
    try{
        $this->group->insert($this->mysqli);
    }
    catch(mysqli_sql_exception $error){
        throw(new mysqli_sql_exception("sorry, could not save group"));
    }
?>