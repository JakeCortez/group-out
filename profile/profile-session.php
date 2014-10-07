<?php
    session_start();
    $profileID = $_SESSION["profileID"];
    header("Location: ../profile/my-profile.php?profileID=$profileID");
?>