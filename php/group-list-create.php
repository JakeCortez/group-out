<?php
// require the database
require_once("/etc/apache2/capstone-mysql/group-out.php");
//include group-class
include "group-class.php";
try{
    $mysqli = Pointer::getPointer();
} catch (mysqli_sql_exception $sqlException) {
    //handle connection error
    throw(new mysqli_sql_excpetion("Unable to connect to the database"));
}

try {
  // call the Pointer static method to connect to mySQL
  $mysqli = Pointer::getPointer();

  // call the class static method for querying/getting 3 event results
  $groupArray = Group::getGroupByName($mysqli, "test-group");

  // loop through the result set
  foreach($groupArray as $group) {


    // reformat the date
    $dateTime         = $group->getGroupDateCreated();
    $niceDate         = $dateTime->format("F j, Y");
    $groupName        = $group->getGroupName();
    $groupCity        = $group->getGroupCity();
    $groupZip         = $group->getGroupZip();
    $groupState       = $group->getGroupState();
    $groupSkill       = $group->getGroupSkill();
    $groupAvatar      = $group->getGroupAvatar();
    $groupDescription = $group->getGroupDescription();

    // echo the result
    echo <<<EOD
      <div class="listItem">
      <div class="listThumb">$groupAvatar</div>

      <div class="listDetails">
        <div class="listHead">$groupName | $groupActivities</div>
        <div class="listInfo">$groupCity, $groupZip, $groupState | $niceDate</div>
        <div class="listDifficulty">difficulty / $groupSkill</div>
      </div>

      <div class="listJoin">
        <div class="numberJoined">
          <p class="number">1</p>
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
