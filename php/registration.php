
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
        //initialize the user, insert into database... 
            ?>
        </head>
        <body>
        
        <p> Welcome to Group-Out! </p>
        
        <?php
        
            $newUser = new User (null, $_POST["userAuthToken"], $_POST["userEmail"], $_POST["userPassword"], $_POST["userRole"], $_POST["userSalt"]);
            $newUser->insert($mysqli);
            
            echo "email";
        
        ?>
        
        
        
            
        </form>
        </body>
    </html>