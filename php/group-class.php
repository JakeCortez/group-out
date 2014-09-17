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
     * Foreign Key for activities group participate in
     **/
    private $activity;
    /**
     * Foreign Key for members of group
     **/
    private $groupMembers;
    /**
     * Foreign Key for group creator/owner
     **/
    private $userID;
    /**
     * string of day group was created
     **/
    private $dateCreated;
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
     * array of images associated with group
     **/
    private $groupGallery;
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
     *@param array for activitie types associated with group
     *@param array for members of groups
     *@param array for state group is based in
     *@param integer for user ID that created group
     *@param value for date group was created
     *@param file for avatar that represents group
     *@param string for city group is based in
     *@param string for description for group
     *@param array of files associated with group
     *@param string for name of group
     *@param integer that represents skill level of group (0-4)
     *@param regular expression for zip code(s) of group based in
     *@param integer that represents privacy level of group (0-2)
     *@throws UnexpectedValueException if fails to construct group
     *@throws RangeException if fails to construct group
     **/
    public function __construct($newGroupID, $newActivityType, $newGroupMembers, $newUserID, $newDateCreated, $newGroupAvatar, $newGroupCity,
                                $newGroupDescription, $newGroupGallery, $newGroupName, $newGroupSkill, $newGroupState, $newGroupZip, $newPrivacyLevel){
        try{
            //validate and sanitize inputs
            $this->setGroupID($newgroupID);
            $this->setActivityType($newActivityType);
            $this->setGroupMembers($newGroupMembers);
            $this->setGroupState($newGroupState);
            $this->setUserID($newUserID);
            $this->setDateCreated($newDateCreated);
            $this->setGroupAvatar($newGroupAvatar);
            $this->setGroupCity($newGroupCity);
            $this->setGroupDescription($newGroupDescription);
            $this->setGroupGallery($newGroupGallery);
            $this->setGroupName($newGroupName);
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
     * sets value of group ID
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
        
        //first, trim input of excess whitespace
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
        
        //check that ID is in Database, placeholder for now
        try{
            $newGroupID->setGroupID($newGroupID);
        }
        catch(mysqli_sql_exception $error) {
            
        }
        
        //set value of ID
        $this->groupID = $newGroupID;
    }
    
    /**
     * gets value of Activity
     **/
    public function getActivityType(){
        return($this->activityType);
    }
    
    /**
     * sets value of Activity
     *
     *@param  mixed  activites allows null if new group
     *@throws UnexpectedValueException if Activity is not an Array
     *@throws RangeException if not all values are integers
     *@throws RangeException if too many elements in Array
     **/
    public function setActivity($newActivity){
        //allow null
        if($newActivity === null){
            $this->activity = null;
            return;
        }
        
        //check if Activities are in an array
        if(gettype($newActivity !== "array")){
            throw(new UnexpectedValueException("$newActivity is not an array!"));
        }
        
        //make sure not an associative array, indexed array
        $newActivity = array_values($newActivity);
        
        //check all array elements for special characters
        filter_var_array($newActivity, FILTER_SANITIZE_SPECIAL_CHARS);
        
        //check amount of elements in array
        if(count($newActivity) > count($mySQLserver)){
            throw(new RangeException("There are too many elements in the array."));
        }
        
        //set values of array
        $this->activity = $newActivity;
    }
    
    /**
     * gets value of Group members
     **/
    public function getGroupMembers(){
        return($this->groupMembers);
    }
    
    /**
     * sets value of Group members 
     * 
     * @param mixed group members allows null if no group members
     * @throws UnexpectedValueException if value is not an array
     * @throws RangeException if all values in array are not integers
     **/
    public function setGroupMembers($newGroupMembers){
        //allow null 
        if($newGroupMembers === null){
            $this->groupMembers = null;
            return;
        }
        
        //check if group members are an array
        if(gettype($newGroupMembers !== "array")){
            throw(new UnexpectedValueException("This is not an Array!"));
        }
        
        //confirm all array elements are integers
        if(filter_var_array($newGroupMembers, FILTER_VALIDATE_INT)){
            throw(new RangeException("There is a variable inside the array besides an integer"));
        }
        
        //set value of group members
        $this->groupMembers = $newGroupMembers;
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
     * @throws UnexpectedValueException if value has special chars
     * @throws if values are not on server
     **/
    public function setGroupState($newGroupState){
        //allow null
        if($newGroupState === null){
            $this->groupState = null;
            return;
        }
        
        //check if group state
        if(filter_var($newGroupState, FILTER_SANITIZE_FULL_SPECIAL_CHARS)){
            throw(new UnexpectedValueException("There are some unknown characters in the state abbreviation."));
        }
        
        //clear out white space
        $newGroupState = trim($newGroupState);
        
        //verifys that all values are on server
        try{
            $newGroupState->setGroupState($newGroupState);
        }
        catch(mysqli_sql_exception $error) {
            throw(new RangeException("This state doesn't exist"));
        }
        
        //set value of state
        $this->groupState = $newGroupState[$i];
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
    
    /**
     * gets value of date group was created
     **/
    public function getDateCreated(){
        return($this->dateCreated);
    }
    
    /**
     * sets value of date group was created
     *
     * @param mixed value of date group was created or null if new group
     * @throws UnexpectedValueException if date is not formatted correctly
     **/
    public function setDateCreated($newDateCreated){
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
    
    /**
     * gets value of group avatar
     **/
    public function getGroupAvatar(){
        return($this->groupAvatar);
    }
    
    /**
     * sets value of group avatar
     *
     **/
    public function setGroupAvatar(){
        
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
     * @param mixed value of city associated with group
     * @throws 
     * 
    
    /**
     * gets value of description of group
     **/
    public function getGroupDescription(){
        return($this->groupDescription);
    }
    
    /**
     * gets value of pictures associated with group
     **/
    public function getGroupGallery(){
        return($this->groupGallery);
    }
    
    /**
     * gets value of name of group
     **/
    public function getGroupName(){
        return($this->groupName);
    }
    
    /**
     * gets value of skill level of group
     **/
    public function getGroupSkill(){
        return($this->groupSkill);
    }
    
    /**
     * gets value of zip code of group
     **/
    public function getGroupZip(){
        return($this->groupZip);
    }
    
    /**
     * gets value of privacy level of group
     **/
    public function getPrivacyLevel(){
        return($this->privacyLevel);
    }
}
?>