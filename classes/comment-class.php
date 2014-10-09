<?php
/**
 * user class containing minimum data to authenticate and create a comment
 *
 * This user contains all the data for secure storage of login data and links
 * to the comment data.
 *
 * @see Comment
 * @author Max DeHerrera <maxdehe3@gmail.com>
 **/

 class Comment {
     /**
     * primary key of the comment, auto incremented
     * @see Comment
     **/
    private $commentID;
    /**
     * time stamping a user comment
     * @see CommentDate
     */
    private $commentDateCreated;
    /**
     * users profile auto incremented in the User table
     * @see User
     **/
    private $userID;
    /**
     * route profile auto incremented in the Route table
     * @see Route
     **/
    private $routeID;
    /**
     * event profile auto incremented in the Event table
     * @see Event
     **/
    private $eventID;
    /**
     * group profile auto incremented in the Group table
     * @see Group
     **/
    private $groupID;
    /**
     * string for users comment
     * @see Comment
     * */
    private $comment;
    
     /**
     * accessor method for comment id
     *
     * @return integer value of comment id
     * */
    public function getCommentID() {
        return($this->commentID);
    }
    
    /**
     * mutator method for comment id
     *
     * @param integer new value of comment id or null if a new object 
     * @throws UnexpectedValueException if the comment id is not an integer
     * @throws RangeException if the comment id is not positive
     * */
    public function setCommentID($newCommentID) {
        // zeroth, allow a null if this is a new object
        if($newCommentID === null) {
            $this->commentID = null;
            return;
        }
        
        // first, trim the input of excess whitespace
        $newCommentID = trim($newCommentID);
        
        // second, verify this is an integer
        if((filter_var($newCommentID, FILTER_VALIDATE_INT)) === false) {
            throw(new UnexpectedValueException("user id $commentID is not an integer"));
        }
        
        // third, convert the id to an integer and ensure its positive
        $newCommentId = intval($newCommentID);
        if($newCommentID <= 0) {
            throw(new RangeException("comment id $newCommentID is not positive"));
        }
        
        //finally, the user id is clean and can be taken out to quarantine
        $this->commentID = $newCommentID;
    }
    
    /**
     * accessor method for comment date created
     * 
     * @return date of comment date created
     * */
    public function getCommentDateCreated() {
        return($this->commentDateCreatedID);
    }
    
    /**
     * mutator method for comment date created
     * */
    public function setCommentDateCreated($newCommentDateCreated) {
        // zeroth, allow a null if this is a new object
        if($newCommentDateCreated === null) {
            $this->commentDateCreated = null;
            return;
        }
        
        // first, verify date
        $newCommentDateCreated = DateTime::createFromFormat("n/j/y h:i:s a", $newCommentDateCreated);
        if($newCommentDateCreated === false) {
            throw(new RangeException("Unable to create date from $newCommentDateCreated"));
        }
        
        // finally, comment date created
        $this->commentDateCreated = $newCommentDateCreated;
    }
    
     /**
     * accessor method for user id
     *
     * @return integer value of user id
     * */
    public function getUserID() {
        return($this->userID);
        
    }
    
    /**
     * mutator method for user id
     *
     * @param integer new value of user id or null if a new object 
     * @throws UnexpectedValueException if the iser id is not an integer
     * @throws RangeException if the user id is not positive
     * */
    public function setUserId($newUserID) {
        // zeroth, allow a null if this is a new object
        if($newUserID === null) {
            $this->userID = null;
            return;
        }
        
        // first, trim the input of excess whitespace
        $newUserID = trim($newUserID);
        
        // second, verify this is an integer
        if((filter_var($newUserID, FILTER_VALIDATE_INT)) === false) {
            throw(new UnexpectedValueException("user id $userID is not an integer"));
        }
        
        // third, convert the id to an integer and ensure its positive
        $newUserID = intval($newUserID);
        if($newUserID <= 0) {
            throw(new RangeException("user id $newUserID is not positive"));
        }
        
        //finally, the user id is clean and can be taken out to quarantine
        $this->userID = $newUserID;
    }
        
     /**
     * accessor method for route id
     *
     * @return integer value of route id
     * */
    public function getRouteID() {
        return($this->routeID);
    }
    
    /**
     * mutator method for user id
     *
     * @param integer new value of route id or null if a new object 
     * @throws UnexpectedValueException if the route id is not an integer
     * @throws RangeException if the route id is not positive
     * */
    public function setRouteID($newRouteID) {
        // zeroth, allow a null if this is a new object
        if($newRouteID === null) {
            $this->routeID = null;
            return;
        }
        
        // first, trim the input of excess whitespace
        $newRouteID = trim($newRouteID);
        
        // second, verify this is an integer
        if((filter_var($newRouteID, FILTER_VALIDATE_INT)) === false) {
            throw(new UnexpectedValueException("route id $routeID is not an integer"));
        }
        
        // third, convert the id to an integer and ensure its positive
        $newRouteID = intval($newRouteID);
        if($newRouteID <= 0) {
            throw(new RangeException("user id $newRouteID is not positive"));
        }
        
        //finally, the route id is clean and can be taken out to quarantine
        $this->userId = $newRouteID;
    }
    
     /**
     * accessor method for event id
     *
     * @return integer value of event id
     * */
    public function getEventID() {
        return($this->eventID);
    }
    
    /**
     * mutator method for event id
     *
     * @param integer new value of event id or null if a new object 
     * @throws UnexpectedValueException if the event id is not an integer
     * @throws RangeException if the event id is not positive
     * */
    public function setEventID($newEventID) {
        // zeroth, allow a null if this is a new object
        if($newEventID === null) {
            $this->eventID = null;
            return;
        }
        
        // first, trim the input of excess whitespace
        $newEventID = trim($newEventID);
        
        // second, verify this is an integer
        if((filter_var($newEventID, FILTER_VALIDATE_INT)) === false) {
            throw(new UnexpectedValueException("event id $eventID is not an integer"));
        }
        
        // third, convert the id to an integer and ensure its positive
        $newEventID = intval($newEventID);
        if($newEventID <= 0) {
            throw(new RangeException("event id $newEventID is not positive"));
        }
        
        //finally, the event id is clean and can be taken out to quarantine
        $this->eventID = $newEventID;
    }
    
     /**
     * accessor method for group id
     *
     * @return integer value of group id
     * */
    public function getGroupID() {
        return($this->groupID);
    }
    
    /**
     * mutator method for group id
     *
     * @param integer new value of group id or null if a new object 
     * @throws UnexpectedValueException if the group id is not an integer
     * @throws RangeException if the group id is not positive
     * */
    public function setGroupID($newGroupID) {
        // zeroth, allow a null if this is a new object
        if($newGroupID === null) {
            $this->groupID = null;
            return;
        }
        
        // first, trim the input of excess whitespace
        $newGroupID = trim($newGroupID);
        
        // second, verify this is an integer
        if((filter_var($newGroupID, FILTER_VALIDATE_INT)) === false) {
            throw(new UnexpectedValueException("group id $groupID is not an integer"));
        }
        
        // third, convert the id to an integer and ensure its positive
        $newGroupID = intval($newGroupID);
        if($newGroupID <= 0) {
            throw(new RangeException("group id $newGroupID is not positive"));
        }
        
        //finally, the group id is clean and can be taken out to quarantine
        $this->groupID = $newGroupID;
    }
    
    /**
     *accessor method for user comment
     *
     */
    public function getComment() {
        return($this->comment);
    }
    
    /**mutator method for comment
     *
     **/
    public function setComment($newComment) {
        // zeroth, filter out malicious content
        // ensure comment is no longer than 500 characters
        // if comment is longer than 500 throw exception
        if($newComment === null) {
            return;
        }
        //first, trim comment
        $newComment = trim($newComment);
        
        // second, filter comment
        $newComment=(filter_var($newComment, FILTER_SANITIZE_STRING));
        if(strlen($newComment) >=500){
            throw(new UnexpectedValueException("comment is greater than 500 characters"));
        }
        
        // finally, set new user comment
        $this->comment = $newComment;
    }
    
}
  
?>