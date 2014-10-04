<?php
    //start session
    session_start();
    
    $_SESSION["userID"] = 2;
    
    //check if userID exists
    if(!isset($_SESSION["userID"])){
        echo("You must be logged into an account to create a group");
    }
    
    //require all needed files
    require_once("/etc/apache2/capstone-mysql/group-out.php");
    require_once("../classes/group-class.php");
    
    //set up connection to server
    try{
        $mysqli = Pointer::getPointer();
    }
    catch(mysqli_sql_excpetion $error){
        throw(new mysqli_sql_exception("could not connect to server", 0, $error));
    }
    
    //create group object
    try{
    $group  = new Group(null, $_SESSION["userID"], null, $_POST["groupAvatar"], $_POST["groupCity"],
                     $_POST["groupDescription"], $_POST["groupName"], $_POST["groupSkill"],
                     $_POST["groupState"], $_POST["groupZip"], $_POST["privacyLevel"] );
    }
    catch(UnexpectedValueException $error){
        throw(new UnexpectedValueException("sorry something went wrong when creating your group", 0, $error));
    }
    catch(RangeException $error){
        throw(new RangeException("sorry something went wrong when creating your group"));
    }
    
    //insert group into database
    try{
        $group->insert($mysqli);
    }
    catch(mysqli_sql_exception $error){
        throw(new mysqli_sql_exception("sorry, could not save group"));
    }
    
    $group   = Group::getGroupByName($mysqli, $_POST["groupName"]);
    $groupID = $group->getGroupID();
    
    header("Location: group.php?groupID=$groupID");
?>