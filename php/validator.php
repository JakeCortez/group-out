<?phpt
//sanitize function so we can format errors
//if the email has no @ character, throw an exception
try {
        if(filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL) === false){ 
            throw(new Exception("Please enter a PROPER e-mail address"));
        }
        //if filter-input passed the email, we need to sanitize the characters
        $safeEmail = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
        
        echo $safeEmail . " just signed up. <br />";
        
        //sanitize both passwords
        $safePassword = filter_input(INPUT_POST, "password",        FILTER_SANITIZE_SPECIAL_CHARS);
        $safeConfirm  = filter_input(INPUT_POST, "confirmPassword", FILTER_SANITIZE_SPECIAL_CHARS);
        
        //ensure the passwords match
        if($safePassword !== $safeConfirm) {
            throw(new Exception("Passwords DON'T match"));
        }
        
        //passwords are safe and match  (good code)
        echo "Your password $safePassword is safe with me!<br />";
}

//catch the exception and format it as an error message
catch(Exception $error) {
    echo "<span class='badForm'>" . $error->getMessage() . "</span>";   
}
?>