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
    private $commentId;
    /**
     * time stamping a user comment
     * @see CommentDate
     */
    private $commentDateCreated;
    /**
     * users profile auto incremented in the User table
     * @see User
     **/
    private $userId;
    /**
     * route profile auto incremented in the Route table
     * @see Route
     **/
    private $routeId;
    /**
     * event profile auto incremented in the Event table
     * @see Event
     **/
    private $eventId;
    /**
     * group profile auto incremented in the Group table
     * @see Group
     **/
    private $groupId;
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
    public function getCommentId() {
        return($this->commentId);
    }
    
    /**
     * mutator method for comment id
     *
     * @param integer new value of comment id or null if a new object 
     * @throws UnexpectedValueException if the comment id is not an integer
     * @throws RangeException if the comment id is not positive
     * */
    public function setCommentId($newCommentId) {
        // zeroth, allow a null if this is a new object
        if($newCommentId === null) {
            $this->commentId = null;
            return;
        }
        
        // first, trim the input of excess whitespace
        $newCommentId = trim($newCommentId);
        
        // second, verify this is an integer
        if((filter_var($newCommentId, FILTER_VALIDATE_INT)) === false) {
            throw(new UnexpectedValueException("user id $commentId is not an integer"));
        }
        
        // third, convert the id to an integer and ensure its positive
        $newCommentId = intval($newCommentId);
        if($newCommentId <= 0) {
            throw(new RangeException("comment id $newcommentId is not positive"));
        }
        
        //finally, the user id is clean and can be taken out to quarantine
        $this->commentId = $newCommentId;
    }
    
    /**
     * accessor method for comment date created
     * 
     * @return date of comment date created
     * */
    public function getCommentDateCreated() {
        return($this->commentdatecreatedId);
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
            throw(new RangeExcaption("Unable to create date from $newCommentDateCreated"));
        }
        
        // finally, comment date created
        $this->commentDateCreated = $newCommentDateCreated;
    }
    
     /**
     * accessor method for user id
     *
     * @return integer value of user id
     * */
    public function getUserId() {
        return($this->userId);
        
    }
    
    /**
     * mutator method for user id
     *
     * @param integer new value of user id or null if a new object 
     * @throws UnexpectedValueException if the iser id is not an integer
     * @throws RangeException if the user id is not positive
     * */
    public function setUserId($newUserId) {
        // zeroth, allow a null if this is a new object
        if($newUserId === null) {
            $this->userId = null;
            return;
        }
        
        // first, trim the input of excess whitespace
        $newUserId = trim($newUserId);
        
        // second, verify this is an integer
        if((filter_var($newUserId, FILTER_VALIDATE_INT)) === false) {
            throw(new UnexpectedValueException("user id $userId is not an integer"));
        }
        
        // third, convert the id to an integer and ensure its positive
        $newUserId = intval($newUserId);
        if($newUserId <= 0) {
            throw(new RangeException("user id $newuserId is not positive"));
        }
        
        //finally, the user id is clean and can be taken out to quarantine
        $this->userId = $newUserId;
    }
        
     /**
     * accessor method for route id
     *
     * @return integer value of route id
     * */
    public function getRouteId() {
        return($this->routeId);
    }
    
    /**
     * mutator method for user id
     *
     * @param integer new value of route id or null if a new object 
     * @throws UnexpectedValueException if the route id is not an integer
     * @throws RangeException if the route id is not positive
     * */
    public function setRouteId($newRouteId) {
        // zeroth, allow a null if this is a new object
        if($newRouteId === null) {
            $this->routeId = null;
            return;
        }
        
        // first, trim the input of excess whitespace
        $newRouteId = trim($newRouteId);
        
        // second, verify this is an integer
        if((filter_var($newRouteId, FILTER_VALIDATE_INT)) === false) {
            throw(new UnexpectedValueException("route id $routeId is not an integer"));
        }
        
        // third, convert the id to an integer and ensure its positive
        $newRouteId = intval($newRouteId);
        if($newRouteId <= 0) {
            throw(new RangeException("user id $newrouteId is not positive"));
        }
        
        //finally, the route id is clean and can be taken out to quarantine
        $this->userId = $newRouteId;
    }
    
     /**
     * accessor method for event id
     *
     * @return integer value of event id
     * */
    public function getEventId() {
        return($this->eventId);
    }
    
    /**
     * mutator method for event id
     *
     * @param integer new value of event id or null if a new object 
     * @throws UnexpectedValueException if the event id is not an integer
     * @throws RangeException if the event id is not positive
     * */
    public function setEventId($newEventId) {
        // zeroth, allow a null if this is a new object
        if($newEventId === null) {
            $this->eventId = null;
            return;
        }
        
        // first, trim the input of excess whitespace
        $newEventId = trim($newEventId);
        
        // second, verify this is an integer
        if((filter_var($newEventId, FILTER_VALIDATE_INT)) === false) {
            throw(new UnexpectedValueException("event id $eventId is not an integer"));
        }
        
        // third, convert the id to an integer and ensure its positive
        $newEventId = intval($newEventId);
        if($newEventId <= 0) {
            throw(new RangeException("event id $neweventId is not positive"));
        }
        
        //finally, the event id is clean and can be taken out to quarantine
        $this->eventId = $newEventId;
    }
    
     /**
     * accessor method for group id
     *
     * @return integer value of group id
     * */
    public function getGroupId() {
        return($this->groupId);
    }
    
    /**
     * mutator method for group id
     *
     * @param integer new value of group id or null if a new object 
     * @throws UnexpectedValueException if the group id is not an integer
     * @throws RangeException if the group id is not positive
     * */
    public function setGroupId($newGroupId) {
        // zeroth, allow a null if this is a new object
        if($newGroupId === null) {
            $this->groupId = null;
            return;
        }
        
        // first, trim the input of excess whitespace
        $newGroupId = trim($newGroupId);
        
        // second, verify this is an integer
        if((filter_var($newGroupId, FILTER_VALIDATE_INT)) === false) {
            throw(new UnexpectedValueException("group id $groupId is not an integer"));
        }
        
        // third, convert the id to an integer and ensure its positive
        $newGroupId = intval($newGroupId);
        if($newGroupId <= 0) {
            throw(new RangeException("group id $newgroupId is not positive"));
        }
        
        //finally, the group id is clean and can be taken out to quarantine
        $this->groupId = $newGroupId;
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