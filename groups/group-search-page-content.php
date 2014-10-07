<?php
require_once("../classes/group-class.php");

// Jim's xampp
//require_once("../config/Pointer.php");

// groupout live site
require_once("/etc/apache2/capstone-mysql/group-out.php");

try {
  // call the Pointer static method to connect to mySQL
  $mysqli = Pointer::getPointer();

  // call the class static method for getting details about the group via groupID
  $groupArray = Group::getAllGroupInfo($mysqli);

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
  $groupActivityList = $group->getGroupActivityList();

  // echo the result
  echo <<<EOD
    <div class="listItem">
    <div class="listThumb"><img src = "../images/$pageGroupID-group.jpg" alt="$groupName" title="$groupName" width="140px" height="140px"></div>

    <div class="listDetails">
      <div class="listHead"><a href="group.php?groupID=$groupID">$groupName</a> | $groupActivityList</div>
      <div class="listInfo">$groupCity, $groupState | $niceDate</div>
      <div class="listDifficulty">difficulty / $groupSkill</div>
    </div>

    <div class="listJoin">
      <div class="numberJoined">
        <p class="number">lots</p>
        <p>joined</p>
      </div>
    </div>
    <div class="listButton">join group</div>

    <div style="clear:both;"></div>
    </div>
EOD;
}
} catch(mysqli_sql_exception $error) {
echo 'oops';
}

?>
