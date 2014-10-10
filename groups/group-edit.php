<?php
    //updates group info
    session_start();
    
    //require group-class
    require_once("/etc/apache2/capstone-mysql/group-out.php");
    require_once("../classes/group-class.php");
    
    //set up connection to server
    try{
        $mysqli = Pointer::getPointer();
    }
    catch(mysqli_sql_exception $error){
        throw(new mysqli_sql_exception("could not connect to server", 0, $error));
    }
    $userID = $_SESSION["userID"];
    //get group
    try{
    $group = Group::getGroupByUserID($mysqli, $userID);
    }catch(mysqli_sql_exception $error){
        echo($error);
        throw(new mysqli_sql_exception("could not find group", 0, $error));
    }
    
    $groupID = $group->getGroupID();

    if($_POST["groupName"] !== null){
        $group->setGroupName($_POST["groupName"]);
    }

    if($_POST["groupCity"] !== null){
        $group->setGroupCity($_POST["groupCity"]);
    }
    
    if($_POST["groupState"] !== null){
        $group->setGroupState($_POST["groupState"]);
    }
        
    if($_POST["groupSkill"] !== null){
        $group->setGroupSkill($_POST["groupSkill"]);
    }
        
    if($_POST["groupDescription"] !== null){
        $group->setGroupDescription($_POST["groupDescription"]);
    }
        
    if($_POST["groupZip"] === null){
        $group->setGroupZip($_POST["groupZip"]);
    }
        
    if($_POST["privacyLevel"] === null){
        $group->setPrivacyLevel($_POST["privacyLeve"]);
    }
    
    if($_POST["groupAvatar"] === null){
        $group->setGroupAvatar($_POST["groupAvatar"]);
    }

    //update group
    try{
        $group->update($mysqli);
    }
    catch(mysqli_sql_exception $error){
        throw(new mysqli_sql_exception("sorry, could not save group", 0, $error));
    }
    
    header("Location: group.php?groupID=$groupID")
?>