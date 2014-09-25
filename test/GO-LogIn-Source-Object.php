<?php
/**
 *class securing User's LogIn data
 *
 *This LogInSource doc securely stores user's login data
 *and links to the user's LogIn calls.
 *
 *@see User table
 *@author jlieberman1@cnm.edu
 **/

class UserLoginSource {
    /**
     *primary key of the user's LogIn Source, auto incremented from UserLogIn table
     **/
    private $userLogInSourceID;
    /**
     * foreign key of user's LogIn Type
     * */
    private $userLogInType;
    /**
     * constructor for a userLogInSource
     *
     * @param integer userLoginSourceID
     * @param mixed userLoginType
     * @throws UnexpectedValueException if a parameter is of the incorrect type
     * @throws RangeException if a parameter is out of range
     * **/
    public function __construct($newUserLogInSourceID, $newUserLogInType) {
        //user mutator methods to populate the user
        try {
            $this->setUserLogInSourceID($newUserLogInSourceID);
            $this->setUserLogInSourceType($newUserLogInSourceType);
        } catch(UnexpectedValueException $unexpectedValue) {
            //rethrow to the caller
            throw(new UnexpectedValueException("Unable to construct the user log in source ", 0, $unexpectedValue));
        } catch(RangeException $range) {
            //rethrow to the caller
            throw(new RangeException("Unable to construct user log in source", 0, $range));
        }
    }
    
    /** get GET methods out of the way...
     * accessor method for userLogIn source ID
     * *
     * @return integer value of user LogIN source id
     * */
    public function getUserLogInSourceID() {
        return($this->userLogInSourceID);
    }
    /**
     *mutator method for user Log In Source id
     *
     *@param mixed new value of user Log In source id or null if a new object
     *@throws Unexpected ValueException if the input is not an integer
     *@throws RangeException if the user id is not positive
     **/
    public function setUserLogInSourceID($newUserLogInSourceID) {
        //zero (special case) allow a null if this is a NEW object
        if($newUserLogInSourceID === null) {
            $this->userLogInSourceID = null;
            return;
        }
        
        //first, trim the input of any excess white space
        $newUserLogInSourceID = trim($newUserLogInSourceID);
        
        //second, verify this is an integer
        if(filter_var($newUserLogInSourceID, FILTER_VALIDATE_INT)) === false)  {
            throw(new UnexpectedValueException("user id $newUserLogInSourceID is not an integer"));
        }
        
        //third, convert the id to an integer and ensure it's positive
        $newUserLogInSourceID = intval($newUserLogInSourceID);
        if($newUserLogInSourceID <= 0) {
            throw(new RangeException("user id $newUserLogInSourceID is not positive"));
        }
        
        //finally, the user LogInSourceid is clean and can be taken out of quarantine
        // we want to use it now
        $this->userLogInSourceID = $newUserLogInSourceID;      
    }

    /**
     *accessor method for User LogIn Type
     *
     *@return string value of LogIn Type
     **/
    public function getUserLogInType() {
        return($this->userLogInType);
    }

    /**
     *mutator method for UserLogInType
     *
     *@param mixed value of UserLogInType or null if a user is activated
     *
     *verification is authToken provided by UserLogInType -- here we sanitize with minimal scrubbing
     *@throws Unexpected ValueException if the UserLogInType is not a string
     **/
    public function setUserLogInType($newUserLogInType) {
        //First, trim the input of excess whitespace
        $newUserLogInType = trim($newUserLogInType);
        //second, sanitize the UserLogInType of oddball chars
        $newUserLogInType = filter_var($newUserLogInType, FILTER_SANITIZE_USERLOGINTYPE);
        //finally, bring UserLogInType out of quarantine
        $this->userLogInType = $newUserLogInType;
     }
}
?>