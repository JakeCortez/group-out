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
        
        <p> Welcome, <?php $email; ?> </p>     
      
       
        <p> Your message is:
        <?php //echo $_POST["message"];  ?></p>       
        </body>
    </html>