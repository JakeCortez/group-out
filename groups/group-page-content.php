<?php
$_SESSION["userID"] = 1;
require_once("../classes/group-class.php");

// Jim's xampp
//require_once("../config/Pointer.php");

// groupout live site
require_once("/etc/apache2/capstone-mysql/group-out.php");

try {
  // call the Pointer static method to connect to mySQL
  $mysqli = Pointer::getPointer();

  // grab the groupID from the page URL
  $pageGroupID = $_GET["groupID"];

  // call the class static method for getting details about the group via groupID
  $groupArray = Group::getGroupInfo($mysqli, $pageGroupID);

  // loop through the result set
  foreach($groupArray as $group) {

    // reformat the date
    $groupID = $group->getGroupID();
    $dateTime = $group->getGroupDateCreated();
    $niceDate = $dateTime->format("F j, Y");
    $groupName = $group->getGroupName();
    $groupCity = $group->getGroupCity();
    $groupState = $group->getGroupState();
    $groupSkill = $group->getGroupSkill();
    $groupDescription = $group->getGroupDescription();

    // echo the result
    echo <<<EOD
      <div class="userAvatar"></div>
      <div class="userDisplayName">$groupName</div>
      <div class="userActivities">$niceDate<br><strong>hike, bike</strong></div>
      <div class="userAboutMe">
        <h1>Event Description</h1>
        <p>$groupDescription</p>
      </div>
EOD;
  }
} catch(mysqli_sql_exception $error) {
  echo 'oops';
}
?>
