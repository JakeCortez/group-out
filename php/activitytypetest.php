<?php


  require_once("activitytype.php");
  
    
    $newActivityTypeId = 1;
    $newActivityName = "activityName";
    $newActivityDescription = "Whatever you would like to say about this";
     
  
try {
 $activityType = new ActivityType($newActivityTypeId, $newActivityName, $newActivityDescription);
} catch (Exception $error) {
  echo "Exception: " . $error->getMessage() . "<br />";
}

/*  echo $userProfile->getAboutMe();
  echo $newAboutMe;
  echo 'hello */
  
?>
