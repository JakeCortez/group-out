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
    
    $userID = $_SESSION["userID"];

    //create profile object
    try{
        $profile = new UserProfile(null, null, $_POST["firstName"], $_POST["lastName"],
                           $_POST["userCity"], $_POST["userState"], $_POST["userZip"], $_POST["aboutMe"],
                           $_POST["userPrivacyLevel"], $_POST["website"], null, $userID, null);
    }
    catch(UnexpectedValueException $error){
        throw(new UnexpectedValueException("sorry something went wrong when creating your profile", 0, $error));
    }
    catch(RangeException $error){
        echo($error);
        throw(new RangeException("sorry something went wrong when creating your profile"));
    }

    //insert profile into database
    try{
        $profile->insert($mysqli);
    }
    catch(mysqli_sql_exception $error){
      throw(new mysqli_sql_exception("sorry, could not save event"));
    }
    
    //set profile ID to session
    $profileID = UserProfile::getProfileByUserId($mysqli, $userID);
    echo($profileID);
    $_SESSION["profileID"] = $profileID;
    
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

    header("Location: my-profile.php?profileID=$profileID");
?>
