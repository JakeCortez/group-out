<?php
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

  foreach($groupArray as $group) {

    $dateTime = $group->getGroupDateCreated();
    $niceDate = $dateTime->format("F j, Y");
    $groupName = $group->getGroupName();
    $groupCity = $group->getGroupCity();
    $groupState = $group->getGroupState();
    $groupSkill = $group->getGroupSkill();
    $groupDescription = $group->getGroupDescription();
    $groupActivityList = $group->getGroupActivityList();
    $userID = $group->getUserID();
    
    //if($_SESSION["userID"] === $userID){
    //    echo <<<EOD
    //      <a href = "group-manage.php"><button type = "submit" class ="logOut btn btn-default navbar-right navbar-btn">Profile</button></a>
//EOD;
    }
    
    // echo the result
    echo <<<EOD
      <div class="userAvatar"><img src = "../images/$pageGroupID-group.jpg" alt="$groupName" title="$groupName" width="200px" height="200px"></div>
      <div class="userDisplayName">$groupName</div>
      <div class="userActivities">$niceDate<br><strong>$groupActivityList</strong></div>
      <div class="userAboutMe">
        <h1>Group Description</h1>
        <p>$groupDescription</p>
      </div>
EOD;

}catch(mysqli_sql_exception $error) {
  echo($error);
  echo 'oops';
}
?>
