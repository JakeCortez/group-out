
    <!DOCTYPE html>
    <html>
        <head>
            <title>
                Form registers input from new user
            </title>
       
        <?php
        //require the class we're going to use
            require_once("GO_User_LogIn_Object.php");
            
        //create things pertaining to the user
            $password = mysql_fix_string($_POST["password"]);
            $confirmPassword = mysql_fix_string($_POST["confirmPassword"]);
  
        //connect to mySQL
            mysqli_report(MYSQLI_REPORT_STRICT);            
            
        //create user 
            $newUser = new User (null, $_POST["userAuthToken"], $_POST["userEmail"], $_POST["userPassword"], $_POST["userRole"], $_POST["userSalt"]);
            
        //insert user in DB
            $newUser->insert($mysqli);
            
        //clean up
            $mysquli->close();
            
        //to debug, var_dump the user
            var_dump($user);
            } catch(mysqli_sql_exception $sqlException) {
                echo "Exception: " . $sqlException->getMessage();
        }
        
        ?>
              </head>
        <body>
        
        <p> Welcome to Group-Out! </p>
        </body>
    </html>