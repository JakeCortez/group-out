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
    private $groupDateCreated;
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
     * string, user selects from drop-down that inputs CHARS(2)
     */
    private $groupActivityList;

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
     *@param string $newGroupActivityList, one or more
     *@throws UnexpectedValueException if fails to construct group
     *@throws RangeException if fails to construct group
     **/
    public function __construct($newGroupID, $newUserID, $newGroupDateCreated, $newGroupAvatar, $newGroupCity,
                                $newGroupDescription, $newGroupName, $newGroupSkill, $newGroupState, $newGroupZip, $newPrivacyLevel, $newGroupActivityList){
        try{
            //validate and sanitize inputs
            $this->setGroupID($newGroupID);
            $this->setUserID($newUserID);
            $this->setGroupDateCreated($newGroupDateCreated);
            $this->setGroupAvatar($newGroupAvatar);
            $this->setGroupCity($newGroupCity);
            $this->setGroupDescription($newGroupDescription);
            $this->setGroupName($newGroupName);
            $this->setGroupSkill($newGroupSkill);
            $this->setGroupState($newGroupState);
            $this->setGroupZip($newGroupZip);
            $this->setPrivacyLevel($newPrivacyLevel);
            $this->setGroupActivityList($newGroupActivityList);
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
     * @throws RangeException if value is not integer again and is not positive
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
        $newGroupState = filter_var($newGroupState, FILTER_SANITIZE_STRING);
        
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
     * @throws UnexpectedValueException if userID does not exist
     * @throws UnexpectedValueException if not an integer
     * @throws RangeException if the user ID is not positive
     * @throws RangeException if userID is not in Database
     **/
    public function setUserID($newUserID){
        //check for null
        if($newUserID === null){
            throw(UnexpectedValueException("Only registered users can create groups."));
        }
        
        //check if value is integer
        if(filter_var($newUserID, FILTER_VALIDATE_INT) === false){
            throw(new UnexpectedValueException("The value of the User ID is not an integer"));
        }
        
        //check if User ID is positive
        $newUserID = intval($newUserID);
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
        //if null for a new group
        if($newGroupDateCreated === null){
            date_default_timezone_set('America/Denver'); // CDT
            
            $current_date = date('Y-m-d H:i:s');
            
            $this->groupDateCreated = $current_date;
            return;
        }
        
        //zeroth, if the is a DateTime object, assign it
        if(gettype($newGroupDateCreated) === "object" && get_class($newGroupDateCreated) === "DateTime") {
            $this->groupDateCreated = $newGroupDateCreated;
            return;
        }
        
        $newGroupDateCreated = trim($newGroupDateCreated);
        $newGroupDateCreated = filter_var($newGroupDateCreated, FILTER_SANITIZE_STRING);
        
        //second, use a regular expression to extract the date and verify it
        if((preg_match("/^(\d{4})-(\d{2})-(\d{2}) (\d{2}):(\d{2}):(\d{2})$/", $newGroupDateCreated, $matches)) !== 1) {
            throw(new RangeException("groupDateCreated $newGroupDateCreated is not a mySQL formatted date"));
        }
        
        //verify the date is valid date
        $year  = intval($matches[1]);
        $month = intval($matches[2]);
        $day   = intval($matches[3]);
        if((checkdate($month, $day, $year)) === false) {
            throw(new RangeException("groupDateCreated $newGroupDateCreated is not a gregorian date"));
        }
        
        //convert the date to a DateTime Object
        if(($dateTime = DateTime::createFromFormat("Y-m-d H:i:s", $newGroupDateCreated)) === false) {
            throw(new RangeException("groupDateCreated $newGroupDateCreated cannot be converted to a DateTime object"));
        }
        $this->groupDateCreated = $dateTime;
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
    public function setGroupAvatar(&$newGroupAvatar){
        //create the white list of allowed types
        //$goodExtensions = array("jpg", "jpeg", "png");
        //$goodMimes = array("image/jpeg", "image/png");
        //verify the file was uploaded ok
        //if($newGroupAvatar["error"] !== UPLOAD_ERR_OK) {
        //    throw(new RunTimeException ("error while uploading file: " . $newGroupAvatar["error"]));
        //}
        //verify the file is an allowed extension and type
        //$extension = strtolower(end(explode(".", $newGroupAvatar["name"])));
        //if(in_array($extension, $goodExtensions) === false || in_array($newGroupAvatar["type"], $goodMimes) === false ) {
        //   throw(new RuntimeException($newGroupAvatar["name"]. " is not a JPEG or PNG file"));
        //   }
        //  
        //move the file to its peramanent home
        //$destination = "/var/www/html/group-out/images/user";
        //sanitize file name for security reasons
        //$fileName = "avatar-". $this->groupName . ".$extension";
        //if(move_uploaded_file($newGroupAvatar["tmp_name"], "$destination/$fileName") === false) {
        //    throw(new RuntimeException("Unable to move file"));
        //}
        
        //sets value for user's avatar
        $this->groupAvatar = "/var/www/html/group-out/images/user/avatar-1.png";
    }
    
    /**
     * gets value of city of group+
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
        $newGroupName = filter_var($newGroupName, FILTER_SANITIZE_STRING);
        
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
            throw(new RangeException("The maximum skill level is 5. The Minumum is 1 $newGroupSkill is out of range"));
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
        if(filter_var($newGroupZip, FILTER_VALIDATE_INT) === false){
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
        if($newPrivacyLevel > 3 || $newPrivacyLevel < 1){
            echo($newPrivacyLevel);
            throw(new UnexpectedValueException("The privacy level set is out of range"));
        }
        
        //sets value
        $this->privacyLevel = $newPrivacyLevel;
    }
    
    /**
     * gets value of groupActivityList
     **/
    public function getGroupActivityList(){
        return($this->groupActivityList);
    }
    
    /**
     * sets value of groupActivityList
     *
     * @param mixed for list of acitivities
     **/
    public function setGroupActivityList($newGroupActivityList){
        //filter for bad inputs
        $newGroupActivityList = trim($newGroupActivityList);
        $newGroupActivityList = filter_var($newGroupActivityList, FILTER_SANITIZE_STRING);
        //set value of activities
        $this->groupActivityList = $newGroupActivityList;
    }
    
    /**
     * inserts group into mySQL
     *
     * @param resource $mysqli pointer to mySQL connection, by reference
     * @throws mysqli_sql_exception when mySQL related errors occur
     **/
    public function insert(&$mysqli){
        //handle degenerate cases
        if(gettype($mysqli) !== "object" || get_class($mysqli) !== "mysqli"){
            throw(new mysqli_sql_exception("input is not a mysqli object"));
        }
        
        //enforce that the group ID doesn't already exist
        if($this->groupID !== null){
            throw(new mysqli_sql_exception("not a new group"));
        }
        
        //query template
        $query     = "INSERT INTO groups(userID, groupDateCreated, groupAvatar, groupCity, groupDescription,
                                         groupName, groupSkill, groupState, groupZip, privacyLevel)
                                         VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $statement = $mysqli->prepare($query);
        if($statement === false){
            throw(new mysqli_sql_exception("Unable to prepare statement"));
        }
        
        //bind variables to place holders in query
        $clean = $statement->bind_param("isssssissi", $this->userID, $this->groupDateCreated, $this->groupAvatar,
                                            $this->groupCity, $this->groupDescription, $this->groupName,
                                            $this->groupSkill, $this->groupState, $this->groupZip, $this->privacyLevel);
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
        if(gettype($mysqli) !== "object" || get_class($mysqli) !== "mysqli"){
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
        if(gettype($mysqli) !== "object" || get_class($mysqli) !== "mysqli"){
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
        $clean = $statement->bind_param("isssssissii", $this->userID, $this->groupDateCreated, $this->groupAvatar,
                                            $this->groupCity, $this->groupDescription, $this->groupName,
                                            $this->groupSkill, $this->groupState, $this->groupZip, $this->privacyLevel, $this->groupID);
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
        $name = strval($name);
        
        //query template 
        $query     = "SELECT groupID, userID, groupDateCreated, groupAvatar, groupCity, groupDescription,
                                         groupName, groupSkill, groupState, groupZip, privacyLevel FROM groups WHERE groupName = ?";
        
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
                                   $row["groupName"], $row["groupSkill"], $row["groupState"], $row["groupZip"], $row["privacyLevel"], null);
            }
            catch(Exception $exception){
                throw(new mysqli_sql_exception("Unable to convert row to user", 0, $exception));
            }
            
            return($group);
        } else {
            return(null);
        }
    }
    
    /**
     * static method to get group info with groupID
     *
     * @param object $mysqli that describes mysqli object from database
     * @param int $groupID that represents current group being displayed on page
     * @returns mixed value of groupID int or null if group not found
     * @throws mysqli_sql_exception if mysqli errors occur
     **/
    public static function getGroupByUserID($mysqli, $userID){
        //handle degenerate cases
        if(gettype($mysqli) !== "object" || get_class($mysqli) !== "mysqli"){
            throw(new mysqli_sql_exception("input is not a mysqli object"));
        }
        
        //cleanse input
        $userID = trim($userID);
        $userID = intval($userID);
        if(filter_var($userID, FILTER_VALIDATE_INT) === false){
            throw(new UnexpectedValueException("userID is invalid"));
        }
        
        //query template
        $query     = "SELECT groups.groupID, groups.userID, groups.groupDateCreated, groups.groupAvatar, groups.groups.groupCity, groups.groupDescription, groups.groupName, groups.groupSkill, groups.groupSkill, groups.groupState, groups.groupZip, groups.privacyLevel, groupsToActivity.groupActivityList
        FROM groups
        INNER JOIN (SELECT DISTINCT groupID, GROUP-CONCAT(DISTINCT activityTypeName ORDER BY activityTypeName SEPERATOR ', ')
        AS groupActivityList
        FROM groupToActivity LEFT JOIN activityType ON groupToActivity.activityTypeID = activityType.activityTypeID GROUP BY groupID) groupToActivity
        ON groups.groupID = groupToActivity.groupID
        WHERE groups.userID = ?";
    
        $statement = $mysqli->prepare($query);
        if($statement === false){
            throw(new mysqli_sql_exception("Unable to prepare statement"));
        }
        
        //bind member variables to the place holder
        $clean = $statement->bind_param("i", $groupID);
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
                                   $row["groupName"], $row["groupSkill"], $row["groupState"], $row["groupZip"], $row["privacyLevel"], $row["groupActivityList"]);
            }
            catch(Exception $exception){
                throw(new mysqli_sql_exception("Unable to convert row to group", 0, $exception));
            }
            
            return($group);
        } else {
            return(null);
        }
    }
    
    public static function getGroupInfo(&$mysqli, $groupID){
      //handle degenerate cases
        if(gettype($mysqli) !== "object" || get_class($mysqli) !== "mysqli"){
            throw(new mysqli_sql_exception("input is not a mysqli object"));
        }
        
        //cleanse input
        $groupID = trim($groupID);
        $groupID = intval($groupID);
        if(filter_var($groupID, FILTER_VALIDATE_INT) === false){
            throw(new UnexpectedValueException("groupID is invalid"));
        }
        
        //create query
        $query = "SELECT groups.groupID, groups.userID, groups.groupDateCreated,  groups.groupName,  groups.groupCity,  groups.groupState, groups.groupZip,  groups.groupDescription, groups.groupSkill, groups.privacyLevel, groups.groupAvatar, groupToActivity.groupActivityList
            FROM groups
            INNER JOIN (SELECT DISTINCT groupID, GROUP_CONCAT(DISTINCT activityTypeName ORDER BY activityTypeName SEPARATOR ', ')
            AS groupActivityList
            FROM groupToActivity LEFT JOIN activityType
            ON groupToActivity.activityTypeID = activityType.activityTypeID GROUP BY groupID) groupToActivity
            ON groups.groupID = groupToActivity.groupID
            WHERE groups.groupID = ?";
        //prepare the statement
        $statement = $mysqli->prepare($query);
        if($statement === false){
            throw(new mysqli_sql_exception("Unable to prepare statement"));
        }
        
        //bind member variables to the place holder
        $clean = $statement->bind_param("i", $groupID);
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
        
        //create group array to be looped through
        $groupArray = array();
        
        while(($row = $result->fetch_assoc()) !== null) {
            $groupArray[] = new Group($row["groupID"], $row["userID"], $row["groupDateCreated"], $row["groupAvatar"], $row["groupCity"], $row["groupDescription"],
                                   $row["groupName"], $row["groupSkill"], $row["groupState"], $row["groupZip"], $row["privacyLevel"], $row["groupActivityList"]);
        }
        
        return $groupArray;
    }
    
    public static function getAllGroupInfo(&$mysqli){
      //handle degenerate cases
        if(gettype($mysqli) !== "object" || get_class($mysqli) !== "mysqli"){
            throw(new mysqli_sql_exception("input is not a mysqli object"));
        }
        
        $query = "SELECT groups.groupID, groups.userID, groups.groupDateCreated,  groups.groupName,  groups.groupCity,  groups.groupState, groups.groupZip,  groups.groupDescription, groups.groupSkill, groups.privacyLevel, groups.groupAvatar, groupToActivity.groupActivityList
            FROM groups
            INNER JOIN (SELECT DISTINCT groupID, GROUP_CONCAT(DISTINCT activityTypeName ORDER BY activityTypeName SEPARATOR ', ')
            AS groupActivityList
            FROM groupToActivity LEFT JOIN activityType
            ON groupToActivity.activityTypeID = activityType.activityTypeID GROUP BY groupID) groupToActivity
            ON groups.groupID = groupToActivity.groupID";
        
        $statement = $mysqli->prepare($query);
        if($statement === false){
            throw(new mysqli_sql_exception("Unable to prepare statement"));
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
        
        //create group array to be looped through
        $groupArray = array();
        
        while(($row = $result->fetch_assoc()) !== null) {
            $groupArray[] = new Group($row["groupID"], $row["userID"], $row["groupDateCreated"], $row["groupAvatar"], $row["groupCity"], $row["groupDescription"],
                                   $row["groupName"], $row["groupSkill"], $row["groupState"], $row["groupZip"], $row["privacyLevel"], $row["groupActivityList"]);
        }
        
        return $groupArray;
    }
}
?>