<?php
/**
 * This class is for the group application of groupout
 *
 * This holds all group info
 *
 * @author Jake Cortez <jcortez96@hotmail.com>
 **/
class Group {
    /**
     * Primary key
     **/
    private $groupID;
    /**
     * Foreign Key for group creator/owner
     **/
    private $userID;
    /**
     * string of day group was created
     **/
    private $groupdateCreated;
    /**
     * image of group avatar
     **/
    private $groupAvatar;
    /**
     * string of city group is based in
     **/
    private $groupCity;
    /**
     * string for group description
     **/
    private $groupDescription;
    /**
     * string of group Name
     **/
    private $groupName;
    /**
     * number of group skill level
     **/
    private $groupSkill;
    /**
     * object of state group is based in
     **/
    private $groupState;
    /**
     * number zip code group is based in
     **/
    private $groupZip;
    /**
     * number for privacy setting
     **/
    private $privacyLevel;


    /**
     * contructor for group
     *
     *@param integer for group ID
     *@param array for state group is based in
     *@param integer for user ID that created group
     *@param value for date group was created
     *@param file for avatar that represents group
     *@param string for city group is based in
     *@param string for description for group
     *@param string for name of group
     *@param integer that represents skill level of group (0-4)
     *@param regular expression for zip code(s) of group based in
     *@param integer that represents privacy level of group (0-2)
     *@throws UnexpectedValueException if fails to construct group
     *@throws RangeException if fails to construct group
     **/
    public function __construct($newGroupID, $newUserID, $newGroupDateCreated, $newGroupAvatar, $newGroupCity,
                                $newGroupDescription, $newGroupName, $newGroupSkill, $newGroupState, $newGroupZip, $newPrivacyLevel){
        try{
            //validate and sanitize inputs
            $this->setGroupID($newgroupID);
            $this->setUserID($newUserID);
            $this->setGroupDateCreated($newGroupDateCreated);
            $this->setGroupAvatar($newGroupAvatar);
            $this->setGroupCity($newGroupCity);
            $this->setGroupDescription($newGroupDescription);
            $this->setGroupName($newGroupName);
            $this->setGroupState($newGroupState);
            $this->setGroupSkill($newGroupSkill);
            $this->setGroupZip($newGroupZip);
            $this->setPrivacyLevel($newPrivacyLevel);
        }
        catch(UnexpectedValueException $error){
            throw(new UnexpectedValueException("Sorry Something went wrong when creating your group.", 0, $error));
        }
        catch(RangeException $error){
            throw(new RangeException("Sorry Something went wrong when creating your group", 0, $error));
        }
    }
    
    /**
     * gets value of group ID
     **/
    public function getGroupID(){
        return($this->groupID);
    }
    
    /**
     * sets value of group Id
     *
     * @param mixed new value of group ID's from server or null if new ID
     * @throws UnexpectedValueException if ID is not an integer
     * @throws RangeException if value is not integer again and is positive
     * @throws RangeException if ID is not found on server
     **/
    public function setGroupID($newGroupID){
        //allow null if this is a new object
        if($newGroupID === null){
            $this->groupID = null;
            return;
        }
        
        //first, trim excess whitespace
        $newGroupID = trim($newGroupID);
        
        //check if ID is an Integer
        if((filter_var($newGroupID, FILTER_VALIDATE_INT)) === false){
            throw(new UnexpectedValueException("$newGroupID is not an integer!"));
        }
        
        //convert ID to integer an check if integer is positive
        $newGroupID = intval($newGroupID);
        if($newGroupID <= 0) {
            throw(new RangeException("$newGroupID is not positive"));
        }
        
        //set value of ID
        $this->groupID = $newGroupID;
    }

    /**
     * gets value of state group is based in
     **/
    public function getGroupState(){
        return($this->groupState);
    }
    
    /**
     * sets value of state
     *
     * @param  mixed state or allow null
     * @throws if values are not on server
     **/
    public function setGroupState($newGroupState){
        //allow null
        if($newGroupState === null){
            $this->groupState = null;
            return;
        }
        
        //check if group state
        if(filter_var($newGroupState, FILTER_SANITIZE_STRING)){
            throw(new UnexpectedValueException("There are some unknown characters in the state abbreviation."));
        }
        
        //clear out white space
        $newGroupState = trim($newGroupState);
        
        //set value of state
        $this->groupState = $newGroupState;
    }
    
    /**
     * gets value of owner's user ID
     **/
    public function getUserID(){
        return($this->userID);
    }
    
    
    /**
     * sets value of id
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
        
        //set value of owner's User ID
        $this->userID = $newUserID;
        
    }
    
    /**
     * gets value of date group was created
     **/
    public function getGroupDateCreated(){
        return($this->groupDateCreated);
    }
    
    /**
     * sets value of date group was created
     *
     * @param mixed value of date group was created or null if new group
     * @throws UnexpectedValueException if date is not formatted correctly
     **/
    public function setGroupDateCreated($newGroupDateCreated){
        //check for null
        if($newGroupDateCreated === null){
            $this->groupDateCreated = DateTime::setDate("servertime");
        //check if date is in correct format
        } elseif(DateTime::createFromFormat("Y-m-d H:i:s", $newGroupDateCreated)){
            $this->groupDateCreated = $newGroupDateCreated;
        } else {
            throw(new UnexpectedValueException("Date created not found"));
        }
    }
    
    /**
     * gets value of group avatar
     **/
    public function getGroupAvatar(){
        return($this->groupAvatar);
    }
    
    /**
     * sets value of group avatar
     *
     * @param mixed value of img associated with group allowing null if not set 
     **/
    public function setGroupAvatar($newGroupAvatar){
        // if null set default avatar
        if($newGroupAvatar === null){
            $this->groupAvatar = "default";
        }
    }
    
    /**
     * gets value of city of group
     **/
    public function getGroupCity(){
        return($this->groupCity);
    }
    
    /*
     * sets value of city of group
     *
     * @param mixed value of city associated with group allowing null if not set
     * @throws UnexpectedValueException if value is not string
     **/
    public function setGroupCity($newGroupCity){
        //checks if null
        if($newGroupCity === null){
            $this->groupCity = null;
            return;
        }
        
        //sanitizes for special characters
        $newGroupCity = filter_var($newGroupCity, FILTER_SANITIZE_STRING);
        
        //checks if value is string
        if(gettype($newGroupCity) !== "string"){
            throw(new UnexpectedValueExcperion("$newGroupCity is not a valid City"));
        }
        
        //sets new value of city
        $this->groupCity = $newGroupCity;
    }
    
    /**
     * gets value of description of group
     **/
    public function getGroupDescription(){
        return($this->groupDescription);
    }
    
    /**
     * sets value of description of group
     *
     * @param mixed value of description with allowing null if not set
     * @throws UnexpectedValueException if value is not a string
     **/
    public function setGroupDescription($newGroupDescription){
        if($newGroupDescription === null){
            $this->groupDescription = null;
            return;
        }
        
        //sanitize for special characters
        $newGroupDescription = filter_var($newGroupDescription, FILTER_SANITIZE_STRING);
        
        //validate that value is string
        if(gettype($newGroupDescription) !== "string"){
            throw(new UnexpectedValueException("This group description is invalid"));
        }
        
        //set value of group description
        $this->groupDescription = $newGroupDescription;
    }
    
    /**
     * gets value of name of group
     **/
    public function getGroupName(){
        return($this->groupName);
    }
    
    /**
     * sets value of name of group
     *
     * @param mixed value of name for group allowing null for new group
     * @throws UnexpectedValueException if name is not string
     * @throws RangeException if name is too long
     **/
    public function setGroupName($newGroupName){
        //allow null
        if($newGroupName === null){
            $this->groupName = null;
            return;
        }
        
        //sanitizes input for special characters
        $newGroupName = filtre_var($newGroupName, FILTER_SANITIZE_STRING);
        
        //checks if value is string
        if(gettype($newGroupName) !== "string"){
            throw(new UnexpectedValueException("Group Name is Invalid"));
        }
        
        //checks length of string
        if(count($newGroupName) > 31){
            throw(new RangeException("Group name must be under 30 characters"));
        }
        
        //sets value of group name
        $this->groupName = $newGroupName;
    }
    
    /**
     * gets value of skill level of group
     **/
    public function getGroupSkill(){
        return($this->groupSkill);
    }
    
    /*
     * sets value of skill level of group
     *
     * @param mixed value of skill level of group allows null if new group
     * @throws UnexpectedValueException if value is not an integer
     * @throws RangeException if value is larger that 5 or less than 0
     **/
    public function setGroupSkill($newGroupSkill){
        //allows null
        if($newGroupSkill === null){
            $this->groupSkill = null;
            return;
        }
        
        //validates input is an integer
        if(filter_var($newGroupSkill, FILTER_VALIDATE_INT) === false){
            throw(new UnexpectedValueException("Skill level is invalid"));
        }
        
        //checks if input is within range
        if($newGroupSkill > 5 || $newGroupSkill < 1){
            throw(new RangeException("The maximum skill level is 5. The Minumum is 0"));
        }
        
        //set value
        $this->groupSkill = $newGroupSkill;
    }
    
    /**
     * gets value of zip code of group
     **/
    public function getGroupZip(){
        return($this->groupZip);
    }
    
    /**
     * sets value of zip code of group
     *
     * @param mixed value of zip code of group, allows null if new group or not set
     * @throws UnexpectedValueExcepton if value(s) are not integers
     * */
    public function setGroupZip($newGroupZip){
        //allows null
        if($newGroupZip === null){
            $this->groupZip = null;
            return;
        }
        
        //validates value is Integer
        if(filter_var_array($newGroupZip, FILTER_VALIDATE_INT) === false){
            throw(new UnexpectedValueException("The Zip Code you entered is Invalid"));
        }
        
        //sets value
        $this->groupZip = $newGroupZip;
    }
    
    /**
     * gets value of privacy level of group
     **/
    public function getPrivacyLevel(){
        return($this->privacyLevel);
    }
    
    /**
     * sets value of privacy for group
     *
     * @param mixed value of privacy level, default maximum privacy if null
     * @throws if value is not an integer
     **/
    public function setPrivacyLevel($newPrivacyLevel){
        //sets default privacy level of new group
        if($newPrivacyLevel === null){
            $this->privacyLevel = 3;
            return;
        }
        
        //validates value is Integer
        if(filter_var($newPrivacyLevel, FILTER_VALIDATE_INT) === false){
            throw(new UnexpectedValueException("The privacy level was invalid"));
        }
        
        //checks if value is within range
        if($newPrivacyLevel > 3 || $newPrivacyLevel <= 0){
            throw(new UnexpectedValueException("The privacy level set is out of range"));
        }
        
        //sets value
        $this->privacyLevel = $newPrivacyLevel;
    }
    
    /**
     * inserts group into mySQL
     *
     * @param resource $mysqli pointer to mySQL connection, by reference
     * @throws mysqli_sql_exception when mySQL related errors occur
     **/
    public function insert(&$mysqli){
        //handle degenerate cases
        if(gettype($mysqli) !== "object" || get_class !== "mysqli"){
            throw(new mysqli_sql_exception("input is not a mysqli object"));
        }
        
        //enforce that the group ID doesn't already exist
        if($this->groupID !== null){
            throw(new mysqli_sql_exception("not a new group"));
        }
        
        //query template
        $query     = "INSERT INTO groups(userID, groupDateCreated, groupAvatar, groupCity, groupDescription,
                                         groupName, groupSkill, groupState, groupZip, privacyLevel
                                         VALUES = ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,)";
        $statement = $mysqli->prepare($query);
        if($statement === false){
            throw(new mysqli_sql_exception("Unable to prepare statement"));
        }
        
        //bind variables to place holders in query
        $clean = $statement->bind_param("issssssisi", $this->userID, $this->groupDateCreated, $this->groupAvatar,
                                            $this->groupCity, $this->groupDescription, $this->groupName,
                                            $this->groupSkill, $this->groupState, $this->groupZip);
        if($clean ===false){
            throw(new mysqli_sql_exception("Unable to bind variables"));
        }
        
        //execute
        if($statement->execute() === false){
            throw(new mysqli_sql_exception("Unable to Execute mySQL statement"));
        }
        
        //update the null Group Id
        $this->groupID = $mysqli->insert_id;
    }
    
    /**
     * deletes group from mySQL
     *
     * @param resource $mysqli pointer to mySQL connection, by reference
     * @throws mysqli_sql_exception when mySQL related errors occur
     **/
    public function delete(&$mysqli){
        //handle degenerate cases
        if(gettype($mysqli) !== "object" || get_class !== "mysqli"){
            throw(new mysqli_sql_exception("input is not a mysqli object"));
        }
        
        //enforce that the group ID exists
        if($this->groupID === null){
            throw(new mysqli_sql_exception("unable to delete a group that does not exist"));
        }
        
        //query template
        $query     = "DELETE FROM groups WHERE groupID = ?";
        $statement = $mysqli->prepare($query);
        if($statement === false){
            throw(new mysqli_sql_exception("Unable to prepare statement"));
        }
        
        //bind member variables to the place holders in the template
        $clean = $statement->bind_param("i", $this->groupID);
        if($clean === false){
            throw(new mysqli_sql_exception("Unable to bind parameters"));
        }
        
        //execute
        if($statement->execute() === false) {
            throw(new mysqli_sql_exception("Unable to execute mySQL statement"));
        }
    }
    
    /**
     * updates this group in mySQL
     *
     * @param resource $mysqli pointer to mySQL connection, by reference
     * @throws mysqli_sql_exception when mySQL related errors occur
     **/
    public function update(&$mysqli){
        //handle degenerate cases
        if(gettype($mysqli) !== "object" || get_class !== "mysqli"){
            throw(new mysqli_sql_exception("input is not a mysqli object"));
        }
        
        //enforce that the group exists
        if($this->groupID === null){
            throw(new mysqli_sql_exception("unable to update group that does not exist"));
        }
        
        //query template
        $query     = "UPDATE groups SET userID =?, groupDateCreated = ?, groupAvatar = ?,
                                       groupCity = ?, groupDescription = ?,
                                       groupName = ?, groupSkill = ?, groupState = ?, groupZip = ?,
                                       privacyLevel = ? WHERE groupID = ?";
        $statement = $mysqli->prepare($query);
        if($statement === false){
            throw(new mysqli_sql_exception("Unable to prepare statement"));
        }
        
        //bind variables to place holders in query
        $clean = $statement->bind_param("issssssisii", $this->userID, $this->groupDateCreated, $this->groupAvatar,
                                            $this->groupCity, $this->groupDescription, $this->groupName,
                                            $this->groupSkill, $this->groupState, $this->groupZip, $this->groupID);
        if($clean ===false){
            throw(new mysqli_sql_exception("Unable to bind variables"));
        }
        
        //execute
        if($statement->execute() === false){
            throw(new mysqli_sql_exception("Unable to Execute mySQL statement"));
        }
    }
    
    /**
     * gets group by name
     *
     * @param resource $mysqli pointer to mySQL connection by reference
     * @param string $name to search for
     * @return mixed group or groups found or null if not found
     * @throws mysqli_sql_exception when mySQL related errors occur
     **/
    public static function getGroupByName(&$mysqli, $name){
        //handle degenerate cases
        if(gettype($mysqli) !== "object" || get_class($mysqli) !== "mysqli"){
            throw(new mysqli_sql_exception("input is not a mysqli object"));
        }
        
        //sanitize name before searching
        $name = trim($name);
        $name = filter_var($name, FILTER_SANITIZE_STRING);
        
        //query template 
        $query     = "SELECT groupID, activityType, userID, dateCreated, groupAvatar, groupCity, groupDescription,
                                         groupGallery, groupName, groupSkill, groupState, groupZip, privacyLevel FROM groups WHERE name = $name";
        
        $statement = $mysqli->prepare($query);
        if($statement === false){
            throw(new mysqli_sql_exception("Unable to prepare statement"));
        }
        
        //bind member variables to the place holder
        $clean = $statement->bind_param("s", $name);
        if($clean === false){
            throw(new mysqli_sql_exception("Unable to bind parameter"));
        }
        
        //execute
        if($statement->execute() === false) {
            throw(new mysqli_sql_exception("Unable to execute mySQL statement"));
        }
        
        //get results from the SELECT query
        $result  = $statement->get_result();
        if($result === null){
            throw(new mysqli_sql_exception("Unable to get result set"));
        }
        
        //fetch result
        $row = $result->fetch_assoc();
        
        if($row !==null){
            try{
                $group = new Group($row["groupID"], $row["userID"], $row["groupDateCreated"], $row["groupAvatar"], $row["groupCity"], $row["groupDescription"],
                                   $row["groupName"], $row["groupSkill"], $row["groupState"], $row["groupZip"], $row["privacyLevel"]);
            }
            catch(Exception $exception){
                throw(new mysqli_sql_exception("Unable to convert row to user", 0, $exception));
            }
            
            return($group);
        } else {
            return(null);
        }
    }
}
?>