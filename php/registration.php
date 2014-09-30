<!DOCTYPE html>
    <html>
        <head>
            <title>
                Form registers input from new user
            </title>
        </head>
        <?php
            $email = $_POST["email"];
            $password = $_POST["password"];
            $confirmPassword = $_POST["confirmPassword"];
        
        ?>
        <body>
        
        <p> Welcome to Group-Out! <?php echo $email; ?> 
            
        </form>
        </body>
    </html>