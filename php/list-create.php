<?php
// step 1 connect to database
// step 2 construct the sql select with userID
// step 3 loop over result set grabbing up to 5 routes & buiding html


// function to output a route block for a route list
function output_block($routeName, $routeActivity, $routeCity, $routeState, $routeDateCreated, $routeDifficulty) {
  // change route date stored in database to "Month DD, YYYY"
  $routeDateCreated = X

  // routes will be an array, can be one or more of run, bike & hike
  $routeActivity = Y

  // creation of the html for a single block
  echo "<div class='listItem'>
    <div class='listThumb'>$routeMapThumb</div>

    <div class='listDetails'>
      <div class='listHead'>$routeName | $routeActivity</div>
      <div class='listInfo'>$routeCity, $routeState | $routeDateCreated</div>
      <div class='listDifficulty'>difficulty | $routeDifficulty</div>
    </div>
    <div style='clear:both;'></div>
  </div>";
}





?>
