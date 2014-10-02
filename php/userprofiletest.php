<?php

  require_once("userprofile.php");
  
    $newUserProfileId = 1;
    $newDateCreated = "2014-09-29 12:00:00";
    $newFirstName = "firstName";
    $newLastName = "lastName";
    $newUserCity = "Albuquerque";
    $newUserState = "NM";
    $newUserZip = "87109";
    $newAboutMe = "Whatever you'd like to type";
    $newUserPrivacyLevel = 3;
    $newUserWebsite = "http://www.blizzard.com";
    $newUserId = 5;
    
  
try {
 $userProfile = new UserProfile($newUserProfileId, $newDateCreated, $newFirstName, $newLastName, $newUserCity, $newUserState, $newUserZip, $newAboutMe, $newUserPrivacyLevel, $newUserWebsite, $_FILES["avatarImage"], $newUserId);
} catch (Exception $error) {
  echo "Exception: " . $error->getMessage() . "<br />";
}

/*  echo $userProfile->getAboutMe();
  echo $newAboutMe;
  echo 'hello */
  
?>