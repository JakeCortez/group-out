<?php
    //require the class we're going to use
    require_once("../classes/user-login.php");
    
    function login($userEmail, $userPassword, $mysqli) {
    // Using prepared statements means that SQL injection is not possible. 
    if ($stmt = $mysqli->prepare("SELECT userID, userPassword, userSalt FROM userID WHERE userEmail = ? LIMIT 1")) {
        $stmt->bind_param('s', $userEmail);  // Bind "$email" to parameter.
        $stmt->execute();    // Execute the prepared query.
        $stmt->store_result();
 
        // get variables from result.
        $stmt->bind_result($userID, $userPassword, $userSalt);
        $stmt->fetch();
 
        // hash the password with the unique salt.
        $password = hash('sha512', $userPassword . $userSalt);
        if ($stmt->num_rows == 1) {
            // If the user exists we check if the account is locked
            // from too many login attempts 
 
            if (checkbrute($userID, $mysqli) == true) {
                // Account is locked 
                // Send an email to user saying their account is locked
                return false;
            } else {
                // Check if the password in the database matches
                // the password the user submitted.
                if ($userPassword == $userPassword) {
                    // Password is correct!
                    // Get the user-agent string of the user.
                    $user_browser = $_SERVER['HTTP_USER_AGENT'];
                    // XSS protection as we might print this value
                    $userID = preg_replace("/[^0-9]+/", "", $userID);
                    $_SESSION['userID'] = $userID;
                    // XSS protection as we might print this value
                    $username = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $username);
                    $_SESSION['username'] = $username;
                    $_SESSION['login_string'] = hash('sha512', $password . $user_browser);
                    // Login successful.
                    return true;
                } else {
                    // Password is not correct
                    // We record this attempt in the database
                    $now = time();
                    $mysqli->query("INSERT INTO login_attempts(userID, time) VALUES ('$userID', '$now')");
                    return false;
                }
            }
        } else {
            // No user exists.
            return false;
        }
    }
}

?>


// page to MATCH new (unapproved) USER AUTH TOKEN
<!DOCTYPE html>
    <html>
        <head>
            <title></title>
        </head>
        <body>
            
        </body>
    </html>