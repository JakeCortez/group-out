<?php
    require_once("../php/userprofile.php");
    
    // groupout live site
    require_once("/etc/apache2/capstone-mysql/group-out.php");

try {
  // call the Pointer static method to connect to mySQL
  $mysqli = Pointer::getPointer();

  // grab profileID from the page URL
  $pageProfileID = $_GET["profileID"];
  
  //call static method to get profile info
  $profileArray = UserProfile::getProfileInfo($mysqli, $pageProfileID);
  
  foreach($profileArray as $profile) {
    $firstName = $profile->getFirstName();
    $lastName  = $profile->getLastName();
    $city      = $profile->getUserCity();
    $aboutMe   = $profile->getAboutMe();
    
    // echo the result
    echo <<<EOD
      <div class="userAvatar"><img src = "../images/d-kitty.jpg" alt="selfies" title="selfies" width="200px" height="200px"></div>
      <div class="userDisplayName">$firstName $lastName</div>
      <div class="userActivities">$city<br><strong>yes</strong></div>
      <div class="userAboutMe">
        <h1>About Me</h1>
        <p>$aboutMe</p>
      </div>
EOD;
  }
}catch(mysqli_sql_exception $error) {
    echo 'oops';
}
  
?>