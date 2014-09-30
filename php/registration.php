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
        
        <p> Welcome to Group-Out! <?php echo $email; ?> <br />
        We would like to know a little about you for our files.  <br />
        If you would be so kind as to tell us
        
            <label for="firstName">First Name</label>
            <input type="text" id="userFirstName" name="firstName" /><br />
            <label for="lastName">Last Name</label>
            <input type="text" id="userLastName" name="lastName" /><br />
            <label for="avatar">Avatar File (JPG and PNG only )</label>
            <input type="file" id="avatar" name="avatar" /><br />
            <button class = "btn btn-default" type="submit">Save My Profile</button>
          
        
        
        </p>     
      <
       
        <p> Your message is:
        <?php //echo $_POST["message"];  ?></p>       
        </body>
    </html>