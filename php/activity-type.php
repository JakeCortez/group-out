<?php

class ActivityType {

/**
* primary key 
**/

private activityTypeId;

}
private activityTypeName;
}

private activityTypeDescription;

/*
  * activity type, validate
  *
  */
 
    
    /*
     *constructor method for a Activity user
     *@param int activity type
     *@param string, activity name
     *@param string, activity description
     *@throws UnexpectedValueException of a parameter is of the incorrect type
     *@throws RangeException if a parameter is out of bounds
     */
    
    /**____________________________________________________________________________________________________________________
    **/
    public function __construct($newActivityTypeId, $newActivityName, $newActivityDescription ) {
        
        //use the mutator methods to populate the user
        try {
            $this->setActivityTypeId($newActivityTypeId);
            $this->dateActivityTypeName($newActivityTypeName);
            $this->setActivityTypeDescription($newActivityTypeDescription);
            
        }catch (UnexpectedValueException $unexpectedValue) {
                //rethrow to the caller
            throw(new UnexpectedValueException("Unable to construct user", 0, $unexpectedValue));
        
        }catch(RangeException $range) {
            //rethrow to the caller
            throw(new RangeException("Unable to construct user", 0, $range));
        }
        
    /*
     * accessor method for user activity type id
     *
     * @return integer value of user id
    */
    public function getActivityTypeId() {
        return($this->activityTypeId);        
    }
    
    /*
     *mutator method for activity type id
     *
     *@param integer new value of user id or null if a new object
     *@throws UnexpectedValueException if the user id is not an integer
     *@throws RangeException if the user id is not positive
     */
    public function setActivityTypeId($newActivityTypeId) {
        // allow a null if this is a new object
        if($newActivityTypeId === null) {
            $this->activityTypeId = null;
            return;    //to kick out of the function to be able to use the Id as is, just let it be a null
        //you don't care 
        }
        
        // first, trim the input of excess whitespace
        $newActivityTypeId = trim($newActivityTypeId);
        //second, verify this is an integer
        if((filter_var($newActivityTypeId, FILTER_VALIDATE_INT)) === false) {
            throw(new UnexpectedValueException("user id $activityTypeId is not an integer"));
        }
        //third, convdert the activity type id to an integer and ensure it's positive
        $newActivityTypeId =intval(newActivityTypeId);
        if($newActivityTypeId <=0) {
            throw(new RangeException("Please make sure that  $userId is a positive number"));
        
        }
        //finally, the activity type id is clean & can be taken out of quarantine
        $this->activityTypeId = $newActivityTypeId; //pseudo variable that makes what is on the left into what is on right
    }
    
    
    /*
    * accessor method for activity type name
    *
    */
    
    public function getActivityTypeName() {
        return($this->activityTypeName);
    }
    
    /*
     * mutator method for activity type name name format match or null
     *@throws UnexpectedValueException if first name is not a special character format or string
    */
    }
    public function setActivityTypeName($newActivityTypeName) {
        //first trim the input of excess whitespace
        
        $newActivityTypeName = trim($newActivityTypeName);
        if($newActivityTypeName === null) {
            $this->activityTypeName = null;
            return;
        }
        //sanitize for special characters
        $newActivityTypeName = filter_var($newAtivityTypeName, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        
        //validate that value is string
        if(gettype($newActivityTypeName) !== "string"){
            throw(new UnexpectedValueException("The input First Name format is invalid"));
        }
        
        //set value of first name
        $this->activityTypeName = $newActivityTypeName;
    }
    
    /**
     * accessor method for activity type description
     **/
    public function getActivityTypeDescription(){
        return($this->activityTypeDescription();
    }
    
    /**
     * mutator method for activity type description
     *
     * @param mixed value of description with allowing null if not set
     * @throws UnexpectedValueException if value is not a string
     **/
    public function setActivityTypeDescription($newActivityTypeDescription){
         //clear out white space
        $newActivityTypeDescription = trim($newActivityTypeDescription);
        if($newActivityTypeDescription === null){
            $this->activityTypeDescription = null;
            return;
        }
        
        //sanitize for special characters
        $newActivityTypeDescription = filter_var($newActivityTypeDescription, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        
        //validate that value is string
        if(gettype($newActivtyTypeDescription) !== "string"){
            throw(new UnexpectedValueException("This input format is invalid"));
        }
        
        //set value of group description
        $this->activityTypeDescription = $newActivityTypeDescription;
    }

