
    <!DOCTYPE html>
    <html>
        <head>
            <title>
                Form registers input from new user
            </title>
       
        <?php
            $password = mysql_fix_string($_POST["password"]);
            $confirmPassword = mysql_fix_string($_POST["confirmPassword"]);
            
            ?>
        </head>
        <body>
        
        <p> Welcome to Group-Out! 
        
        <?php
        
            $newUser = new User ( null, .. $_POST["email"],.. );
            $newUser->insert($mysqli);
            
            echo "email";
        
        ?>
        
        
        
            
        </form>
        </body>
    </html>