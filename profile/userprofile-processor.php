<?php
    //start session
    session_start();

    //check if userID exists
    if(!isset($_SESSION["userID"])){
        echo("You must be logged into an account to create a profile");
    }

    //require all needed files
    // Jim's xampp
    //quire_once("../config/Pointer.php");

    // groupout live site
    require_once("/etc/apache2/capstone-mysql/group-out.php");
    require_once("../php/userprofile.php");

    //set up connection to server
    try{
        $mysqli = Pointer::getPointer();
    }
    catch(mysqli_sql_exception $error){
        throw(new mysqli_sql_exception("could not connect to server", 0, $error));
    }

    //create profile object
    try{
        $profile = new UserProfile($_SESSION["userID"], null, $_POST["firstName"], $_POST["lastName"],
                                   $_POST["userCity"], $_POST["userState"], $_POST["userZip"], $_POST["aboutMe"],
                                   $_POST["userPrivacyLevel"], $_POST["website"], null, $_SESSION["userID"]);
    }
    catch(UnexpectedValueException $error){
        throw(new UnexpectedValueException("sorry something went wrong when creating your profile", 0, $error));
    }
    catch(RangeException $error){
        throw(new RangeException("sorry something went wrong when creating your profile"));
    }

    //insert profile into database
    try{
        $profile->insert($mysqli);
    }
    catch(mysqli_sql_exception $error){
      echo($error);
      throw(new mysqli_sql_exception("sorry, could not save event"));
    }

    $userID = $profile->getProfileID();
    $activityTypeID = $_POST["activity"];
    
    foreach($activityTypeID as $activity) {
      $query = "INSERT INTO userToActivity (userID, activityTypeID) VALUES (?, ?)";

      $statement = $mysqli->prepare($query);
      if($statement === false) {
        throw(new mysqli_sql_exception("Unable to prepare statement"));
      }

      $wasClean = $statement->bind_param("ii", $userID, $activity);
      if($wasClean === false) {
        throw(new mysqli_sql_exception("Unable to bind parameters"));
      }

      if($statement->execute() === false) {
        echo($error);
        throw(new mysqli_sql_exception("Unable to execute mySQL statement"));
      }
    }

    header("Location: my-profile.php?profileID=$userID");
?>
