<?php
    if($_SESSION["userID"] === $userID){
        echo <<<EOD
            <a><button type = "submit" class ="logOut btn btn-default navbar-right navbar-btn">Profile</button></a>
EOD;
    }
?>