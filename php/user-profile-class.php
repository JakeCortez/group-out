
<?php

class Userprofile {

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
* validate & sanitize date format, regexp
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
  * validate user's personal profile Avatar source format
  *
  */
 private $userId;
 
 /*
  * user's Id, validate
  *
  */
 
    
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
     **@param url user's external website link
     *@param jpg/png for user's profile avatar
     *@param user id
     *@throws UnexpectedValueException of a parameter is of the incorrect type
     *@throws RangeException if a parameter is out of bounds
     */
    
    /**____________________________________________________________________________________________________________________
    **/
    
    public function __construct($newUserProfileId, $newDateCreated, $newFirstName, $newLastName, $newUserCity, $newUserState,
                               $newUserZip, $newAboutMe, $newUserWebsite, $newUserFacebook, $newUserTwitter, $newUserInstagram ) {
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
            $this->setUserId($newUserId);
            
                    
        }catch (UnexpectedValueException $unexpectedValue) {
                //rethrow to the caller
            throw(new UnexpectedValueException("Unable to construct user", 0, $unexpectedValue));
        
        }catch(RangeException $range) {
            //rethrow to the caller
            throw(new RangeException("Unable to construct user", 0, $range));
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
        $newUserProfileId =intval(newUserId);
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
    }
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
    
    public function setLastName(4newLastName) {
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
        
        //check if group state
        if(filter_var($newUserState, FILTER_SANITIZE_FULL_SPECIAL_CHARS)){
            throw(new UnexpectedValueException("Your input does not subscribe to an acceptable state abbreviation."));
        }
        
        
        //verifies that all values are on server
        try{
            $newUserState->setUserState($newUserState);
        }
        catch(mysqli_sql_exception $error) {
            throw(new RangeException("This state doesn't exist"));
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
        if(filter_var_array($newUserZip, FILTER_VALIDATE_INT) === false){
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
    public function setaboutMe($newAboutMe){
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

        $splitUserWebsite = explode ("://", $newUserWebsite);
        if(strtolower($splitUserWebsite[0]) !== "http" || strtolower($splitUserWebsite[0]) !== "https") {
            throw(new UnexpectedValueException("Please use only Http and Https"));
        }

        $splitUserWebsite[1] = filter_var($splitUserWebsite[1], FILTER_SANITIZE_STRING);

        $this->userWebsite = implode("://", $splitUserWebsite);
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
     **/
    public function setUserAvatar($newUserAvatar){
        //create the white list of allowed types
        $goodExtentions = array("jpg", "jpeg", "png");
        $goodMimes = array("image/jpeg", "image/png");
        
        //verify the file was uploaded ok
        if($_FILES["avatar"]["error"] !== UPLOAD_ERR_OK) {
            throw(new RunTimeException ("error while uploading file: " . $_FILES["avatar"]["error"]));
        }
        
        //verify the file is an allowed extension and type
        $extension = end(explode(".", $_FILES["avatar"]["name"]));
        if(in_array($extension, $goodExtentions) === false 
           || in_array($_FILES["avatar"]["type"], $goodMimes) === false ) {
            throw(new RuntimeException($_FILES["avatar"]["name"]. " is not a JPEG or PNG file"));
           }
          
        //move the file to its peramanent home - instead of mt_rand() - use mysql for the id, please...
        $destination = "/var/www/html/upload";
        //sanitize file name for security reasons
        $fileName = "avatar-".mt_rand(1,1024).".".strtolower($extension);
        if(move_uploaded_file($_FILES["avatar"]["tmp_name"], "$destination/$fileName") === false) {
            throw(new RuntimeException("Unable to move file"));
        
        }
        //report successful upload to the user
        
        $avatarName = $_FILES["avatar"]["name"];
        $avatarSize = $_FILES["avatar"]["size"];
        $avatarType = $_FILES["avatar"]["type"];
        $firstName = $_POST["firstName"];
        $lastName =  $_POST["lastName"];
        echo<<<_EOF
        <p>Profile successfully updated</p>
        <ul>
            <li>First Name: $firstName</li>
            <li>Last Name: $lastName</li>
            <li>Avatar: $avatarName ($avatarType, $avatarSize bytes) <br />
            <img src="/upload/$avatarName" /></li>
        </ul>
_EOF;
        // the file name was not sanitized, for safe
                
    //sets value for user's avatar
    $this->userAvatar = ($newUserAvatar);
        
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
        //allow null
        if($newUserID === null){
            $this->userID = null;
            return;
        }
        
        //check if value is integer
        if(filter_var($newUserID, FILTER_VALIDATE_INT) === false){
            throw(new UnexpectedValueException("The value of the User ID is not an integer"));
        }
        
        //check if User ID is positive
        $newUserID = int_val($newUserID);
        if($newUserID <= 0){
            throw(new RangeException("Invalid User ID detected"));
        }
        
        //check if UserID is in Database
        try{
            $newUserID->setUserID($newUserID);
        }
        catch(mysqli_sql_exception $error){
            throw(new RangeException("Unrecognized User ID detected"));
        }
        
        //set value of owner's User ID
        $this->userID = $newUserID;
        
    }

?>
