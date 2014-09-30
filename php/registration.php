
    <!DOCTYPE html>
    <html>
        <head>
            <title>
                Form registers input from new user
            </title>
       
        <?php
            $email = mysql_fix_string($_POST["email"]);
            $password = mysql_fix_string($_POST["password"]);
            $confirmPassword = mysql_fix_string($_POST["confirmPassword"]);
            
            ?>
        </head>
        <body>
        
        <p> Welcome to Group-Out! <?php echo $email; ?>
        
        <?php
        
            $newUser = new User ("email", "password");
            $newUser->($mysqli);
        
        ?>
        
        
        
            
        </form>
        </body>
    </html>