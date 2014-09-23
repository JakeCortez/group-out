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
    private $userId;
    /**
     * foreign key of user's profile, auto incremented in the Profile table
     * @see Profile
     * */
    private $profileId;
    /**
     *authentication token for creating the user and changing the user's password
     **/
    private $authenticationToken;
    /**
     *the user's email address, this is a unique field
     ***/
    private $email;
    /**
     *user can use another website/authorization to log in
     ***/
    private $otherAuthorize;
    /**
     *the PBKFD2 hash of the user's password
     **/
    private $password;
    /**
     *role of the user:
     * -0: administrator
     * -1: power user
     * -2: normal user
     * */
    private $role;
    /**
     *random alt for user's password
     **/
    private $salt;
    /**
     * constructor for a user
     *
     * @param mixed user id 
     * @param mixed profile id
     * @param mixed authentication token
     * @param string email
     * @param string role
     * @param string otherAuthorize
     * @param string PBFKDF2 hash of the password
     * @param integer role (access level)
     * @param string salt
     * @throws UnexpectedValueException if a parameter is of the incorrect type
     * @throws RangeException if a parameter is out of range
     * **/
    public function __construct($newUserId, $newProfileId, $newAuthenticationToken, $email, 
                                $otherAuthorize, $newPassword,  $newRole, $newSalt) {
        //user mutator methods to populate the user
        try {
            $this->setUserId($newUserId);
            $this->setProfileId($newProfileId);
            $this->setAuthenticationToken($newAuthenticationToken);
            $this->setEmail($newEmail);
            $this->setOtherAuthorize($newOtherAuthorize);
            $this->setPassword($newPassword);
            $this->setRole($newRole);
            $this->setSalt($newSalt);
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
    public function getUserId() {
        return($this->userId);
    }
    /**
     *mutator method for user id
     *
     *@param mixed new value of user id or null if a new object
     *@throws Unexpected ValueException if the input is not an integer
     *@throws RangeException if the user id is not positive
     **/
    public function setUserId($newUserId) {
        //zero (special case) allow a null if this is a NEW object
        if($newUserId === null) {
            $this->userId = null;
            return;
        }
        
        //first, trim the input of any excess white space
        $newUserId = trim($newUserId);
        
        //second, verify this is an integer
        if(filter_var($newUserId, FILTER_VALIDATE_INT)) === false)  {
            throw(new UnexpectedValueException("user id $newUserId is not an integer"));
        }
        
        //third, convert the id to an integer and ensure it's positive
        $newUserId = intval($newUserId);
        if($newUserId <= 0) {
            throw(new RangeException("user id $newUserId is not positive"));
        }
        
        //finally, the user id is clean and can be taken out of quarantine
        // we want to use it now
        $this->userId = $newUserId;      
    }
    
    /**
     *Treat Profile ID same as User ID; here
     *accessor method for profile id
     *
     *@return integer value of profile ID
     **/
    
    public function getProfileId() {
        return($this->profileId);
    }
    
    /**
     *mutator method for Profile ID
     *
     *@param mixed new value of Profile ID or null if a new object
     *@throws Unexpected ValueException if the input is not an integer
     *@throws RangeException if the Profile ID is not positive
     **/
    
    public function setProfileId($newProfileId) {
        //zero (special case) allow a null if this is a NEW object
        if($newProfileId === null) {
            $this->profileId = null;
            return;
        }
        
        //first, trim the input of any excess white space
        $newProfileId = trim($newProfileId);
        
        //second, verify this is an integer
        if(filter_var($newProfileId, FILTER_VALIDATE_INT)) === false)  {
            throw(new UnexpectedValueException("Profile Id $newProfileId is not an integer"));
        }
        
        //third, convert the id to an integer and ensure it's positive
        //there's a lower bound here, but not an upper...
        $newProfileId = intval($newProfileId);
        if($newProfileId <= 0) {
            throw(new RangeException("Profile id $newProfileId is not positive"));
        }
        
        //finally, the Profile id is clean and can be taken out of quarantine
        // we want to use it now
        $this->profileId = $newProfileId;      
    }
    /**
     *accessor method for authentication token
     *
     *@return string value of authentication token
     **/
    public function getAuthenticationToken() {
        return($this->authenticationToken);
    }
    /**
     *mutator method for Authentication Token
     *
     *@param mixed new value of Authentication Token or null if a user is activated
     *@throws Unexpected ValueException if the authentication token is not a hexadecimal string
     **/
    public function setAuthenticationToken($newAuthenticationToken) {
        if($newAuthenticationToken === null) {
            $this->authenticationToken = null;
            return;
        }
        //first, trim the input of any excess white space
        $newAuthenticationToken = trim($newAuthenticationToken);
     
        //second, verify this is a stringn of 32 hexadecimal characters
        $filterOptions = array("options" => array("regexp" =>"/^[0-9a-f]{32}$/i"));
        if((filter_var($newAuthenticationToken, FILTER_VALIDATE_REGEXP, $filterOptions)) === false) {
            throw(new UnexpectedValueException("$newAuthenticationToken is not hexadecimal"));
        }
        //finally, if it passed Regular Expression, it is clean and free to move about the code
        $newAuthenticationToken = strtolower($newAuthenticationToken);
        $this->authenticationToken = $newAuthenticationToken;
     }
     /*
      *accessor method for email
      *
      *@return string value of email
      **/
     public function getEmail() {
        return($this->email);
     }
     
     /**
      *mutator method for email
      *real verification is authToken, re-mailing user,
      *here we just sanitize with minimal scrubbing
      *
      *@param string new value of email
      **/
     public function setEmail($newEmail) {
        //First, trim the input of excess whitespace
        $newEmail = trim($newEmail);
        //second, sanitize the email of oddball chars
        $newEmail = filter_var($newEmail, FILTER_SANITIZE_EMAIL);
        //finally, bring the email out of quarantine
        $this->email = $newEmail;
     }
          /*
      *accessor method for other methods of Authorizing LogIn
      *
      *@return string value of Authorizing LogIn
      **/
     public function getOtherAuthorization() {
        return($this->otherAuthorization);
     }
     
     /**
      *mutator method for logging in using Facebook, Instagram, or Twitter
      *real verification is re-mailing user,
      *here we just sanitize with minimal scrubbing
      *
      *@param string new value of other source of authorization 
      **/
     public function setOtherAuthorization($newOtherAuthorization) {
        //First, trim the input of excess whitespace
        $newOtherAuthorization = trim($newOtherAuthorization);
        //second, sanitize the other source of authorization  of oddball chars
        $newOtherAuthorization = filter_var($newOtherAuthorization, FILTER_SANITIZE_EMAIL);
        //finally, bring the other source of authorization out of quarantine
        $this->otherAuthorization = $newOtherAuthorization;
     }
      /**
      *accessor method for Password
      *
      *@return value for Password
      **/
     public function getPassword() {
        return($this->password);
     }

    /**
     *mutator method for Password
     *
     *@param new string value for Password 
     *@throws Unexpected ValueException if the password not hexadecimal string
     **/
    public function setPassword($newPassword) {

        //first, trim the input of any excess white space
        $newPassword = trim($newPassword);
     
        //second, verify this is a string of 32 hexadecimal characters
        $filterOptions = array("options" => array("regexp" =>"/^[0-9a-f]{128}$/i"));
        if((filter_var($newPassword, FILTER_VALIDATE_REGEXP, $filterOptions)) === false) {
            throw(new UnexpectedValueException("$newPassword is not hexadecimal"));
        }
        //finally, if it passed Regular Expression, it is clean and free to move about the code
        $newPassword = strtolower($newPassword);
        $this->password = $newPassword;
        
     }
     
    public function getRole() {
        return($this->role);
     }
     /**
     *mutator method for Role
     *
     *@param mixed new value of Role or null if a new object
     *@throws Unexpected ValueException if the input is not an integer
     *@throws RangeException if the Role is not {0,1,2}
     **/
    public function setRole($newRole) {
     
        //first, trim the input of any excess white space
        $newRole = trim($newRole);
        
        //second, verify this is an integer
        if(filter_var($newRole, FILTER_VALIDATE_INT)) === false)  {
            throw(new UnexpectedValueException("Role $newRole is not an integer"));
        }
        
        //third, convert the id to an integer and ensure it's positive
        $newRole = intval($newRole);
        if($newRole < 0 || $newRole >2) {
            throw(new RangeException("Role $newRole is not 0, 1, or 2"));
        }
        
        //finally, the user id is clean and can be taken out of quarantine
        // we want to use it now
        $this->role = $newRole;      
    }
          /*
      *accessor method for SALT
      *
      *@return value for SALT
      **/
     public function getSalt() {
        return($this->salt);
     }

    /**
     *mutator method for SALT
     *
     *@param new string value for SALT 
     *@throws Unexpected ValueException if the SALT not hexadecimal string
     **/
    public function setSalt($newSalt) {
        //first, trim the input of any excess white space
        $newSalt = trim($newSalt);
     
        //second, verify this is a string of 32 hexadecimal characters
        $filterOptions = array("options" => array("regexp" =>"/^[0-9a-f]{64}$/i"));
        if((filter_var($newSalt, FILTER_VALIDATE_REGEXP, $filterOptions)) === false) {
            throw(new UnexpectedValueException("$newSalt is not hexadecimal"));
        }
        //finally, if it passed Regular Expression, it is clean and free to move about the code
        $newSalt = strtolower($newSalt);
        $this->salt = $newSalt;
     }
}