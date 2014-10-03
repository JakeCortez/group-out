<?php
/**
 * This is an intersecting class between users to groups to find what users belong ot what groups
 *
 *  this holds user and group Ids
 *
 *  @author Jake Cortez <jcortez96@hotmail.com
 **/
class UserToGroups{
    /**
     * foreign key for groupID
     **/
    private $groupID;
    
    /**
     * foreign key for userID
     **/
    private $userID;
    
    /**
     * constructor for group
     *
     * @param int groupID for group
     * @patam int userID  for users associated with group
     * @throws UnexpectedValueException if IDs are not integers
     * @throws RangeException if IDs are less than 1
     **/
    public function __construct($newGroupID, $newUserID){
        try{
            //validate and sanitize intputs
            $this->setGroupID($newGroupID);
            $this->setUserID($newUserID);
        }
        catch(UnexpectedValueException $error){
            throw(new UnexpectedValueException("could not retrieve group members"));
        }
        catch(RangeException $error){
            throw(new RangeException("could not retrieve group members"));
        }
    }
}
?>