<?php
/**
 *user class securing User's LogIn data
 *
 *This LogInSource doc securely stores user's login data
 *and links to the user's LogIn calls.
 *
 *@see Profile
 *@author jlieberman1@cnm.edu
 **/

class User {
    /**
     *primary key of the user, auto incremented
     **/
    private $userID;
    /**
     *authentication token for creating the user and changing the user's password
     **/
    private $userAuthToken;
    /**
     *the user's email address, this is a unique field
     ***/
    private $userEmail;
    /**
     *the PBKFD2 hash of the user's password
     **/
    private $userPassword;
    /**
     *role of the user:
     * -0: administrator
     * -1: power user
     * -2: normal user
     * */
    private $userRole;
    /**
     *random alt for user's password
     **/
    private $userSalt;
    /**
     * constructor for a user
     *
     * @param mixed user id 
     * @param mixed userLogInSource id
     * @param mixed authentication token
     * @param string userEmail
     * @param string PBFKDF2 hash of user's password
     * @param integer userRole (access level)
     * @param string userSalt
     * @throws UnexpectedValueException if a parameter is of the incorrect type
     * @throws RangeException if a parameter is out of range
     * **/
    public function __construct($newUserID, $newUserAuthToken,
                                $newUserEmail, $newUserPassword, $newUserRole, $newUserSalt) {
        //user mutator methods to populate the user
        try {
            $this->setUserID($newUserID);
            $this->setUserAuthToken($newUserAuthToken);
            $this->setUserEmail($newUserEmail);
            $this->setUserPassword($newUserPassword);
            $this->setUserRole($newUserRole);
            $this->setUserSalt($newUserSalt);
        } catch(UnexpectedValueException $unexpectedValue) {
            //rethrow to the caller
            throw(new UnexpectedValueException("Unable to construct the user", 0, $unexpectedValue));
        } catch(RangeException $range) {
            //rethrow to the caller
            throw(new RangeException("Unable to construct user", 0, $range));
        }
    }
    
    /** get GET methods out of the way...
     * accessor method for UserId
     * *
     * @return integer value of user id
     * */
    public function getUserID() {
        return($this->userID);
    }
    /**
     *mutator method for userId
     *
     *@param mixed new value of userId or null if a new object
     *@throws Unexpected ValueException if the input is not an integer
     *@throws RangeException if the user id is not positive
     **/
    public function setUserID($newUserID) {
        //zero (special case) allow a null if this is a NEW object
        if($newUserID === null) {
            $this->userID = null;
            return;
        }
        
        //first, trim the input of any excess white space
        $newUserID = trim($newUserID);
        
        //second, verify this is an integer
        if(filter_var($newUserID, FILTER_VALIDATE_INT) === false)  {
            throw(new UnexpectedValueException("userID $newUserID is not an integer"));
        }
        
        //third, convert the id to an integer and ensure it's positive
        $newUserID = intval($newUserID);
        if($newUserID <= 0) {
            throw(new RangeException("userId $newUserID is not positive"));
        }
        
        //finally, the user id is clean and can be taken out of quarantine
        // we want to use it now
        $this->userID = $newUserID;      
    }
    
    /**
     *accessor method for authentication token
     *
     *@return string value of authentication token
     **/
    public function getUserAuthToken() {
        return($this->userAuthToken);
    }
    /**
     *mutator method for Authentication Token
     *
     *@param mixed new value of Authentication Token or null if a user is activated
     *@throws Unexpected ValueException if the authentication token is not a hexadecimal string
     **/
    public function setUserAuthToken($newUserAuthToken) {
        if($newUserAuthToken === null) {
            $this->authToken = null;
            return;
        }
        //first, trim the input of any excess white space
        $newUserAuthToken = trim($newUserAuthToken);
     
        //second, verify this is a stringn of 32 hexadecimal characters
        $filterOptions = array("options" => array("regexp" =>"/^[0-9a-f]{32}$/i"));
        if((filter_var($newUserAuthToken, FILTER_VALIDATE_REGEXP, $filterOptions)) === false) {
            throw(new UnexpectedValueException("$newUserAuthToken is not hexadecimal"));
        }
        //finally, if it passed Regular Expression, it is clean and free to move about the code
        $newUserAuthToken = strtolower($newUserAuthToken);
        $this->authToken = $newUserAuthToken;
     }
     /*
      *accessor method for UserConfirmation
      *
      *@return string value of UserConfirmation
    //
     //public function getUserConfirmation() {
     //   return($this->userConfirmation);
    // }
     //
      *mutator method for UserConfirmation
      *real verification is here, when user has re-emailed,
      *
      *@param string new value of UserConfirmation

     //public function setUserConfirmation($newUserConfirmation) {
        //First, trim the input of excess whitespace
     //   $newUserConfirmation = trim($newUserConfirmation);
        //second, sanitize the UserConfirmation of oddball chars
     //   $newUserConfirmation = filter_var($newUserConfirmation, FILTER_SANITIZE_USERCONFIRMATION);
        //finally, bring the UserConfirmation out of quarantine
     //   $this->userConfirmation = $newUserConfirmation;
     //}
     //
     */
     /*
      *accessor method for userEmail
      *
      *@return string value of UserEmail
      **/
     public function getUserEmail() {
        return($this->userEmail);
     }
     
     /**
      *mutator method for UserEmail
      *real verification is authToken, re-mailing user,
      *here we just sanitize with minimal scrubbing
      *
      *@param string new value of UserEmail
      **/
     public function setUserEmail($newUserEmail) {
        //First, trim the input of excess whitespace
        $newUserEmail = trim($newUserEmail);
        //second, sanitize the email of oddball chars
        $newUserEmail = filter_var($newUserEmail, FILTER_SANITIZE_USEREMAIL);
        //finally, bring UserEmail out of quarantine
        $this->userEmail = $newUserEmail;
     }

      /**
      *accessor method for UserPassword
      *
      *@return value for UserPassword
      **/
     public function getUserPassword() {
        return($this->userpassword);
     }

    /**
     *mutator method for UserPassword
     *
     *@param new string value for UserPassword 
     *@throws Unexpected ValueException if the Userpassword not hexadecimal string
     **/
    public function setUserPassword($newUserPassword) {

        //first, trim the input of any excess white space
        $newUserPassword = trim($newUserPassword);
     
        //second, verify this is a string of 32 hexadecimal characters
        $filterOptions = array("options" => array("regexp" =>"/^[0-9a-f]{128}$/i"));
        if((filter_var($newUserPassword, FILTER_VALIDATE_REGEXP, $filterOptions)) === false) {
            throw(new UnexpectedValueException("$newUserPassword is not hexadecimal"));
        }
        //finally, if it passed Regular Expression, it is clean and free to move about the code
        $newUserPassword = strtolower($newUserPassword);
        $this->userpassword = $newUserPassword;
        
     }
     
    public function getUserRole() {
        return($this->userRole);
     }
     /**
     *mutator method for UserRole
     *
     *@param mixed new value of UserRole or null if a new object
     *@throws Unexpected ValueException if the input is not an integer
     *@throws RangeException if UserRole is not {0,1,2}
     **/
    public function setUserRole($newUserRole) {
        //first, trim the input of any excess white space
        $newUserRole = trim($newUserRole);
        //second, verify this is an integer
        if(filter_var($newUserRole, FILTER_VALIDATE_INT) === false)  {
            throw(new UnexpectedValueException("Role $newUserRole is not an integer"));
        }
        //third, convert the id to an integer and ensure it's positive
        $newUserRole = intval($newUserRole);
        if($newUserRole < 0 || $newUserRole >2) {
            throw(new RangeException("UserRole $newUserRole is not 0, 1, or 2"));
        }
        //finally, the user id is clean and can be taken out of quarantine
        // we want to use it now
        $this->userrole = $newUserRole;      
    }
       /*
      *accessor method for UserSALT
      *
      *@return value for UserSALT
      **/
     public function getUserSalt() {
        return($this->userSalt);
     }
    /**
     *mutator method for UserSALT
     *
     *@param new string value for UserSALT 
     *@throws Unexpected ValueException if the UserSALT not hexadecimal string
     **/
    public function setUserSalt($newUserSalt) {
        //first, trim the input of any excess white space
        $newUserSalt = trim($newUserSalt);
     
        //second, verify this is a string of 32 hexadecimal characters
        $filterOptions = array("options" => array("regexp" =>"/^[0-9a-f]{64}$/i"));
        if((filter_var($newUserSalt, FILTER_VALIDATE_REGEXP, $filterOptions)) === false) {
            throw(new UnexpectedValueException("$newUserSalt is not hexadecimal"));
        }
        //finally, if it passed Regular Expression, it is clean and free to move about the code
        $newUserSalt = strtolower($newUserSalt);
        $this->userSalt = $newUserSalt;
     }
}
?>