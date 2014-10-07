<?php
    //start session
    session_start();

    $_SESSION["userID"] = 2;

    //check if userID exists
    if(!isset($_SESSION["userID"])){
        echo("You must be logged into an account to create a group");
    }

    //require all needed files
    // Jim's xampp
    require_once("../config/Pointer.php");

    // groupout live site
    //require_once("/etc/apache2/capstone-mysql/group-out.php");
    require_once("../classes/event-class.php");

    //set up connection to server
    try{
        $mysqli = Pointer::getPointer();
    }
    catch(mysqli_sql_exception $error){
        throw(new mysqli_sql_exception("could not connect to server", 0, $error));
    }

    //create event object
    try{
    $event  = new Event(null, null, $_SESSION["userID"], null, $_POST["eventCity"], $_POST["eventDate"],
                     $_POST["eventDescription"], $_POST["eventDifficulty"], $_POST["eventName"],
                     $_POST["eventPrivacy"], $_POST["eventState"], $_POST["eventZip"], $_POST["eventMemberCount"], null);
    }
    catch(UnexpectedValueException $error){
        throw(new UnexpectedValueException("sorry something went wrong when creating your event", 0, $error));
    }
    catch(RangeException $error){
        throw(new RangeException("sorry something went wrong when creating your event"));
    }

    //insert event into database
    try{
        $event->insert($mysqli);
    }
    catch(mysqli_sql_exception $error){
      echo($error);
      throw(new mysqli_sql_exception("sorry, could not save event"));
    }

    $eventID = $event->getEventID();

    $activityTypeID = $_POST["activityTypeID"];
    foreach($activityTypeID as $activity) {
      $query = "INSERT INTO eventToActivity (eventID, activityTypeID) VALUES (?, ?)";

      $statement = $mysqli->prepare($query);
      if($statement === false) {
        throw(new mysqli_sql_exception("Unable to prepare statement"));
      }

      $wasClean = $statement->bind_param("ii", $eventID, $activity);
      if($wasClean === false) {
        throw(new mysqli_sql_exception("Unable to bind parameters"));
      }

      if($statement->execute() === false) {
        echo($error);
        throw(new mysqli_sql_exception("Unable to execute mySQL statement"));
      }
    }

    header("Location: event.php?eventID=$eventID");
?>
