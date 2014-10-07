
<?php

class UserProfile {

/**
* primary key of the user, auto incrementd
**/

private $userProfileId;
/*
* foreign key of the user's profile, auto incremented in the profile table
* @see Profile
*/

private $dateCreated;
/*
* date of user profile creation, this is unique field
* validate & sanitize date format, 
*/

private $firstName;

/*
 * user's first name, validate & sanitize string regexp
 * 
 */

 private $lastName;
 
 /*
  * user's las name, validate & sanitize string regexp
  *
  */
 
 private $userCity;
 
 /*
  * user's preferred or home city, validate & sanitize string regexp
  *
  */
 
 private $userState;
 
 /*
  * user's home/preferred state, validate & sanitize INT
  * 
  */
 
 private $userZip;
 
 /*
  * user's preferred or home location's zip code
  *
  */
 private $aboutMe;
 
 /*
  * user's self description, validate & sanitize string, regexp
  *
  */
 private $userPrivacyLevel;
 
 /*
  * validate user's current privacy setting
  *
  */
 
 private $userWebsite;
 
 /*
  * user's website page, validate & sanitize url link
  *
  */
 
 private $userAvatar;
 
 /*
  * path to the user's avatar, absolute path to the image
  *
  */
 
 private $userId;
 
 /*
  * user's Id, validate
  *
  */
 //___________________________________________________________________________  
    /*
     *constructor method for a user
     *@param int user id
     *@param string, Int creation date
     *@parm string user's first name
     *@param string user's last name
     *@param string user's preferred or home city
     *@param string user's preferred state
     *@param int user's zip
     *@param string user's self-description    
     *@param integer user's privacy level
     **@param url user's external website string
     *@param jpg/png for user's profile avatar binary large object
     *@param user id
     *@throws UnexpectedValueException of a parameter is of the incorrect type
     *@throws RangeException if a parameter is out of bounds
     */
    
    /**____________________________________________________________________________________________________________________
    **/
    
    public function __construct($newUserProfileId, $newDateCreated, $newFirstName, $newLastName, $newUserCity, $newUserState,
                               $newUserZip, $newAboutMe, $newUserPrivacyLevel, $newUserWebsite, $newUserAvatar, $newUserId) {
        //use the mutator methods to populate the user
        try {
            $this->setUserProfileId($newUserProfileId);
            $this->setDateCreated($newDateCreated);
            $this->setFirstName($newFirstName);
            $this->setLastName($newLastName);
            $this->setUserCity($newUserCity);
            $this->setUserState($newUserState);  
            $this->setUserZip($newUserZip);
            $this->setAboutMe($newAboutMe);
            $this->setUserPrivacyLevel($newUserPrivacyLevel);
            $this->setUserWebsite($newUserWebsite);
            $this->setUserAvatar($newUserAvatar);
            $this->setUserID($newUserId);   
        }catch (UnexpectedValueException $unexpectedValue) {
                //rethrow to the caller
            throw(new UnexpectedValueException("Unable to construct user", 0, $unexpectedValue));
        
        }catch(RangeException $range) {
            //rethrow to the caller
            throw(new RangeException("Unable to construct user", 0, $range));
        }
    }
    /*
     * accessor method for user id
     *
     * @return integer value of user id
    */
    
    public function getUserProfileId() {
        return($this->userProfileId);        
    }
    
    /*
     *mutator method for user id
     *
     *@param integer new value of user id or null if a new object
     *@throws UnexpectedValueException if the user id is not an integer
     *@throws RangeException if the user id is not positive
     */
    public function setUserProfileId($newUserProfileId) {
        //eroth, allow a null if this is a new object
        if($newUserProfileId === null) {
            $this->userProfileId = null;
            return;    //to kick out of the function to be able to use the Id as is, just let it be a null
        //you don't care 
        }
        
        // first, trim the input of excess whitespace
        $newUserProfileId = trim($newUserProfileId);
        //second, verify this is an integer
        if((filter_var($newUserProfileId, FILTER_VALIDATE_INT)) === false) {
            throw(new UnexpectedValueException("user id $userProfileId is not an integer"));
        }
        //third, convdert the user id to an integer and ensure it's positive
        $newUserProfileId =intval($newUserProfileId);
        if($newUserProfileId <=0) {
            throw(new RangeException("Please make sure that  $userId is a positive number"));
        
        }
        //finally, the user id is clean & can be taken out of quarantine
        $this->userProfileId = $newUserProfileId; //pseudo variable that makes what is on the left into what is on right
    }
    
    /*
     * accessor method for profile creation date
     *
     * return string value of creation date
     */
    
    public function getDateCreated() {
        return($this->dateCreated);
    }
    
    /*
     *
     *mutator method for profile creation date
     *
     *@param stringnew value of date format match or null
     *@throws UnexpectedValueException if date is not a string or does not match format
     *@throws RangeException if the date creation does not match format
     */

    public function setDateCreated($newDateCreated) {
        //check for null
        if($newDateCreated === null){
            $this->dateCreated = DateTime::setDate("servertime");
        //check if date is in correct format
        } elseif(DateTime::createFromFormat("Y-m-d H:i:s", $newDateCreated)){
            $this->dateCreated = $newDateCreated;
        } else {
            throw(new UnexpectedValueException("Date created not found"));
        }
    }

    /*
    * accessor method for user's first name
    *
    */
    
    public function getFirstName() {
        return($this->firstName);
    }
    
    /*
     * mutator method for user's first name format match or null
     *@throws UnexpectedValueException if first name is not a special character format or string
    */
    
    public function setFirstName($newFirstName) {
        //first trim the input of excess whitespace
        
        $newFirstName = trim($newFirstName);
        if($newFirstName === null) {
            $this->firstName = null;
            return;
        }
        //sanitize for special characters
        $newFirstName = filter_var($newFirstName, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        
        //validate that value is string
        if(gettype($newFirstName) !== "string"){
            throw(new UnexpectedValueException("The input First Name format is invalid"));
        }
        
        //set value of first name
        $this->firstName = $newFirstName;
    }
    
    /**
     *accessor method for user's last name
     *
     **/
    
    public function getLastName() {
        return($this->lastName);
    }
    
    /**
     *mutator method for user's last name format match or null
     *@throws UnexpectedValueException if last name is not special characters or string.
     */
    
    public function setLastName($newLastName) {
        //first trim the input of excess whitespace
        $newLastName = trim($newLastName);
        if($newLastName === null) {
            $this->lastName = null;
            return;
        }
    //sanitize for special characters
    $newLastName = filter_var($newLastName, FILTER_SANITIZE_SPECIAL_CHARS);
    
    //validate that value is string
    if(gettype($newLastName) !== "string") {
        throw(new UnexpectedValueException("The input Last Name format is invalid"));
    }
    //set value of last name
    $this->lastName = $newLastName;
    }
    
    /**
     * accessor method for user city
     **/
    public function getUserCity(){
        return($this->userCity);
    }
    
    /*
     * mutator method for user city
     *
     * @param mixed value of city associated with group allowing null if not set
     * @throws UnexpectedValueException if value is not string
     **/
    public function setUserCity($newUserCity){
        //checks if null
        if($newUserCity === null){
            $this->userCity = null;
            return;
        }
        
        //sanitizes for special characters
        $newUserCity = filter_var($newUserCity, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        
        //checks if value is string
        if(gettype($newUserCity) !== "string"){
            throw(new UnexpectedValueExcperion("$newUserCity is not a valid City"));
        }
        
        //sets new value of city
        $this->userCity = $newUserCity;
    }
    /**
     * accessor method for user state
     **/
    public function getUserState(){
        return($this->userState);
    }
    
    /**
     * mutator method for user state
     *
     * @param  mixed state or allow null
     * @throws if values are not on server
     **/
    public function setUserState($newUserState){
         //clear out white space
        $newUserState = trim($newUserState);
    
        //allow null
        if($newUserState === null){
            $this->userState = null;
            return;
        }
        
        //check if user state
      /*  if(filter_var($newUserState, FILTER_SANITIZE_FULL_SPECIAL_CHARS)){
            throw(new UnexpectedValueException("Your input does not subscribe to an acceptable state abbreviation."));
        }
        
     */
       if(gettype($newUserState) !== "string"){
            throw(new UnexpectedValueExcperion("$newUserState is not a valid State"));
        }
        
        //set value of state
        $this->userState = $newUserState;
    }
    /**
     * accessor method for user zip code
    **/
    public function getUserZip(){
        return($this->userZip);
    }
    
    /**
     * mutator method for user zip code
     *
     * @param mixed value of zip code of group, allows null if new group or not set
     * @throws UnexpectedValueExcepton if value(s) are not integers
     * */
    public function setUserZip($newUserZip){
         //clear out white space
        $newUserZip = trim($newUserZip);
        
        
        //allows null
        if($newUserZip === null){
            $this->userZip = null;
            return;
        }
        
        //validates value is Integer
        if(filter_var($newUserZip, FILTER_VALIDATE_INT) === false){
            throw(new UnexpectedValueException("The Zip Code you entered is Invalid"));
        }
        
        //sets value
        $this->userZip = $newUserZip;
    }
    /**
     * accessor method for about me user self-description
     **/
    public function getAboutMe(){
        return($this->aboutMe);
    }
    
    /**
     * mutator method for user's about me self-description
     *
     * @param mixed value of description with allowing null if not set
     * @throws UnexpectedValueException if value is not a string
     **/
    
    public function setAboutMe($newAboutMe){
         //clear out white space
        $newAboutMe = trim($newAboutMe);
        if($newAboutMe === null){
            $this->aboutMe = null;
            return;
        }
        
        //sanitize for special characters
        $newAboutMe = filter_var($newAboutMe, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        
        //validate that value is string
        if(gettype($newAboutMe) !== "string"){
            throw(new UnexpectedValueException("This input format is invalid"));
        }
        
        //set value of group description
        $this->aboutMe = $newAboutMe;
    }
    /**
     * accessor method for user privcacy level
     **/
    
    public function getUserPrivacyLevel(){
        return($this->userPrivacyLevel);
    }
    
    /**
     * mutator method for user's privacy level
     *
     * @param mixed value of privacy level, default maximum privacy if null
     * @throws if value is not an integer
     **/
    
    public function setUserPrivacyLevel($newUserPrivacyLevel){
        //sets default privacy level of new group
        if($newUserPrivacyLevel === null){
            $this->userPrivacyLevel = 3;
            return;
        }
        
        //validates value is Integer
        if(filter_var($newUserPrivacyLevel, FILTER_VALIDATE_INT) === false){
            throw(new UnexpectedValueException("The privacy level was invalid"));
        }
        
        //checks if value is within range
        if($newUserPrivacyLevel > 3 || $newUserPrivacyLevel <= 0){
            throw(new UnexpectedValueException("The privacy level set is out of range"));
        }
        
        //sets value
        $this->userPrivacyLevel = $newUserPrivacyLevel;
    }
    /**
     * accessor method for user website link
     **/
   
    public function getUserWebsite(){
        return($this->userWebsite);
    }
    
    /**
     * mutator method for user's website link
     *
     **/
    
    public function setUserWebsite($newUserWebsite){
    
        if(gettype($newUserWebsite) !== "string") {
            throw(new UnexpectedValueException("Please use a URL string of the resource link"));
        }

        //check that string is a valid URL
        if(filter_var($newUserWebsite, FILTER_VALIDATE_URL) === false) {
            throw(new UnexpectedValueException("Please use a valid URL link"));
        }
         //sets value for user website
         $this->userWebsite = $newUserWebsite;
    }
    
    /**
     * accessor method for user avatar
     **/
    
    public function getUserAvatar(){
        return($this->userAvatar);
    }
    
    /**
     * mutator method for user avatar
     *
     * @param $newUserAvatar array input from the $_FILES superglobal
     **/
    
    public function setUserAvatar(&$newUserAvatar){
        //create the white list of allowed types
        $goodExtensions = array("jpg", "jpeg", "png");
        $goodMimes = array("image/jpeg", "image/png");

        //verify the file was uploaded ok
        if($newUserAvatar["error"] !== UPLOAD_ERR_OK) {
            throw(new RunTimeException ("error while uploading file: " . $newUserAvatar["error"]));
        }

        //verify the file is an allowed extension and type
        $extension = strtolower(end(explode(".", $newUserAvatar["name"])));
        if(in_array($extension, $goodExtensions) === false 
           || in_array($newUserAvatar["type"], $goodMimes) === false ) {
            throw(new RuntimeException($newUserAvatar["name"]. " is not a JPEG or PNG file"));
           }
          
        //move the file to its peramanent home
        $destination = "/var/www/html/group-out/images/user";
        //sanitize file name for security reasons
        $fileName = "avatar-". $this->userProfileId . ".$extension";
        if(move_uploaded_file($newUserAvatar["tmp_name"], "$destination/$fileName") === false) {
            throw(new RuntimeException("Unable to move file"));

        }
        
        //sets value for user's avatar
        $this->userAvatar = "$destination/$fileName";
        
    }
      /**
     * accessor method for user ID
     **/
    
    public function getUserID(){
        return($this->userID);
    }
    
    /**
     * mutator method for user id
     *
     * @param mixed value of id that created group or null if the group is being created
     * @throws UnexpectedValueException if not an integer
     * @throws RangeException if the user ID is not positive
     * @throws RangeException if userID is not in Database
     **/
    
    public function setUserID($newUserID){
        //check if value is integer
        if(filter_var($newUserID, FILTER_VALIDATE_INT) === false){
            throw(new UnexpectedValueException("The value of the User ID is not an integer"));
        }
        
        //check if User ID is positive
        $newUserID = intval($newUserID);
        if($newUserID <= 0){
            throw(new RangeException("Invalid User ID detected"));
        }
        
        //check if UserID is in Database
       
    }
   //________________________________________________________________________________
   //________________________________________________________________________________
  //_________________________________________________________________________________
  //_________________________________________________________________________________
   
public static function selectUserByProfileId (&$mysqli, $newProfileId) {

    // handle degenerate cases
    if(gettype($newProfileId) !== "string") {
    throw (new UnexpectedValueExceptioon("The input format is invalid, please insert string"));
    }   
    //trim whitespace
    $newProfileId = trim ($newProfileId);
    if($newProfileId === null) {
            $this->profileId = null;
            return;
    }

    if((filter_var($newUserProfileId, FILTER_VALIDATE_INT)) === false) {
            throw(new UnexpectedValueException("user id $newProfileId is not an integer"));
        }
        //third, convdert the user id to an integer and ensure it's positive
        $newProfileId =intval($newProfileId);
        if($newProfileId <=0) {
            throw(new RangeException("Please make sure that  $userId is a positive number"));
        
        }

        if(gettype($mysqli) !== "object" || get_class($mysqli) !== "mysqli") {
        throw(new mysqli_sql_exception("input is not a mysqli object"));

    }

    // enforce the ProfileId is not null (i.e., don't update a resource that hasn't been inserted)

    if($this->profileId === null) {
        throw(new mysqli_sql_exception("Unable to update a profile id that does not exist"));

    }       

    // create query template
    $query = "SELECT userID, userDateCreated, userfirstName, userlastName, userCity, userState, userZip, userAboutMe, userPrivacyLevel, userWebsite, userId FROM userProfiles WHERE userProfileId = ?";

    $statement = $mysqli->prepare($query);  

    if($statement === false) {

    throw(new mysqli_sql_exception("Unable to prepare statement"));

    }

    // bind the member variables to the place holders in the template

    $wasClean = $statement->bind_param("i", $this->profileID);                  

    if($wasClean === false) {

    throw(new mysqli_sql_exception("Unable to bind parameters"));

    }

    // execute the statement

    if($statement->execute() === false) {

    throw(new mysqli_sql_exception("Unable to execute mySQL statement"));

    }

    }
    
    public function insert(&$mysqli) {
    // create a database connection
        // create a sql statement
        //prepare sql statement
        //bind variables
        //insert sql statement
    // handle degenerate cases

    if(gettype($mysqli) !== "object" || get_class($mysqli) !== "mysqli") {

    throw(new mysqli_sql_exception("input is not a mysqli object"));

    }

    // enforce the resoureId is null (i.e., don't insert a resource that already exists)

    if($this->profileID !== null) {

    throw(new mysqli_sql_exception("not a new profile Id"));

    }

    // create query template

    $query = "INSERT INTO userProfiles(userdateCreated, userfirstName, userlastName, userCity, userState, userZip, userAboutMe, userPrivacyLevel, userWebsite, userId) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";  

    $statement = $mysqli->prepare($query);

    if($statement === false) {

    throw(new mysqli_sql_exception("Unable to prepare statement"));

    }

    // bind the member variables to the place holders in the template

    $wasClean = $statement->bind_param("sssssssibi", $this->dateCreated, $this->firstName, $this->lastName, $this->userCity, $this->userState, $this->userZip, $this->aboutMe, $this->userPrivacyLevel, $this-> userWebsite,
                                   $this-> userId);

    if($wasClean === false) {

    throw(new mysqli_sql_exception("Unable to bind parameters"));
    
    }

    // execute the statement
    if($statement->execute() === false) {
        throw(new mysqli_sql_exception("Unable to execute mySQL statement"));

    }

    // update the null resourceId with what mySQL just gave us
    $this->userProfileId = $mysqli->profileID;

    }

    /**

    * deletes this Resource from mySQL
    
    *
    
    * @param resource $mysqli pointer to mySQL connection, by reference
    
    * @throws mysqli_sql_exception when mySQL related errors occur
    
    **/

    public function delete(&$mysqli) {

    // handle degenerate cases
    if(gettype($mysqli) !== "object" || get_class($mysqli) !== "mysqli") {
        throw(new mysqli_sql_exception("input is not a mysqli object"));

    }

    // enforce the resourceId is not null (i.e., don't delete a resource that hasn't been inserted)

    if($this->profileID=== null) {
        throw(new mysqli_sql_exception("Unable to delete a resource that does not exist"));

}

// create query template

$query = "DELETE FROM userProfiles WHERE profileID = ?";

$statement = $mysqli->prepare($query);

if($statement === false) {

throw(new mysqli_sql_exception("Unable to prepare statement"));

}

// bind the member variables to the place holder in the template

$wasClean = $statement->bind_param("i", $this->proileID);

if($wasClean === false) {

throw(new mysqli_sql_exception("Unable to bind parameters"));

}

// execute the statement

if($statement->execute() === false) {

throw(new mysqli_sql_exception("Unable to execute mySQL statement"));

}

}

/**

* updates this Resource in mySQL

*

* @param resource $mysqli pointer to mySQL connection, by reference

* @throws mysqli_sql_exception when mySQL related errors occur

**/

public function update(&$mysqli) {

// handle degenerate cases

if(gettype($mysqli) !== "object" || get_class($mysqli) !== "mysqli") {

throw(new mysqli_sql_exception("input is not a mysqli object"));

}

// enforce the resourceId is not null (i.e., don't update a resource that hasn't been inserted)

if($this->profileID === null) {

throw(new mysqli_sql_exception("Unable to update a resource that does not exist"));

}

// create query template

$query = "UPDATE userProfiles SET profileID = ?, userProfileId = ?, dateCreated = ?, firstName = ?, lastName = ?, userCity = ?, userState = ?,
                               userZip = ?, aboutMe = ?, userPrivacyLevel = ?, userWebsite = ?,  userId = ?";

$statement = $mysqli->prepare($query);

if($statement === false) {

throw(new mysqli_sql_exception("Unable to prepare statement"));

}

// bind the member variables to the place holders in the template

$wasClean = $statement->bind_param("sssssssibi", $this->dateCreated, $this->firstName, $this->lastName, $this->userCity, $this->userState, $this->userZip, $this->aboutMe, $this->userPrivacyLevel, $this-> userWebsite,
                                   $this-> userId);

if($wasClean === false) {

throw(new mysqli_sql_exception("Unable to bind parameters"));

}

// execute the statement

if($statement->execute() === false) {

throw(new mysqli_sql_exception("Unable to execute mySQL statement"));

}

}

}

?>
