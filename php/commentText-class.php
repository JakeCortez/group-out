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
    private $commentText;
    
    
    /**
   * constructor for Event
   *
   * @param $newEventID integer, auto inserted upon creating an event
   * @throws UnexpectedValueException when a parameter is of the wrong type
   * @throws RangeException when a parameter is invalid
   **/
  public function __construct($newCommentID, $newCommentDateCreated, $newUserID, $newCommentText, $newGroupID, $newEventID, $newRouteID) {
      try {
        $this->setCommentID($newCommentID);
        $this->setCommentDateCreated($newCommentDateCreated);
        $this->setUserID($newUserID); // FOREIGN KEY
        $this->setCommentText($newCommentText);
        $this->setGroupID($newGroupID);
        $this->setEventID($newEventID);
        $this->setRouteID($newRouteID); // FOREIGN KEY
        
      } catch(UnexpectedValueException $unexpectedValue) {
          // rethrow to the caller
          throw(new UnexpectedValueException("Unable to construct Event", 0, $unexpectedValue));
      } catch(RangeException $range) {
          // rethrow to the caller
          throw(new RangeException("Unable to construct Event", 0, $range));
      }
  }
    
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
        $newCommentID = intval($newCommentID);
        if($newCommentID <= 0) {
            throw(new RangeException("comment id $newcommentID is not positive"));
        }
        
        //finally, the user id is clean and can be taken out to quarantine
        $this->commentID = $newCommentID;
    }
    
 //// GET & SET FOR eventDateCreated
  /**
   * gets the value of eventDateCreated
   *
   * @return DateTime eventDateCreated and time as a DateTime object
   * @see http://php.net/manual/en/class.datetime.php
   **/
  public function getCommentDateCreated() {
      return($this->commentDateCreated);
  }

  /**
   * sets the value of commentDateCreated
   *
   * @param mixed $newCommentDateCreated commentDateCreated as a string in Y-m-d H:i:s format or as a DateTime object
   * @throws RangeException if the input is a string and cannot be parsed
   * @see http://php.net/manual/en/function.date.php
   * @see http://php.net/manual/en/class.datetime.php
   **/
  public function setCommentDateCreated($newCommentDateCreated) {
    // zeroth, if this is a DateTime object, assign it
    if(gettype($newCommentDateCreated) === "object" && get_class($newCommentDateCreated) === "DateTime") {
        $this->commentDateCreated = $newCommentDateCreated;
        return;
    }

    // first, cleanse the date string
    $newCommentDateCreated = trim($newCommentDateCreated);
    $newCommentDateCreated = filter_var($newCommentDateCreated, FILTER_SANITIZE_STRING);

    // second, use a regular expression to extract the date and verify it
    if((preg_match("/^(\d{4})-(\d{2})-(\d{2}) (\d{2}):(\d{2}):(\d{2})$/", $newCommentDateCreated, $matches)) !== 1) {
        throw(new RangeException("commentDateCreated $newCommentDateCreated is not a mySQL formatted date"));
    }

    // third, verify the date is a valid date
    $year  = intval($matches[1]);
    $month = intval($matches[2]);
    $day   = intval($matches[3]);
    if((checkdate($month, $day, $year)) === false) {
        throw(new RangeException("commentDateCreated $newCommentDateCreated is not a Gregorian date"));
    }

    // finally, convert the date to a DateTime object
    if(($dateTime = DateTime::createFromFormat("Y-m-d H:i:s", $newCommentDateCreated)) === false) {
        throw(new RangeException("commentDateCreated $newCommentDateCreated cannot be converted to a DateTime object"));
    }
    $this->commentDateCreated = $dateTime;
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
    public function setUserID($newUserID) {
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
            throw(new RangeException("user id $newuserID is not positive"));
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
            throw(new RangeException("user id $newrouteID is not positive"));
        }
        
        //finally, the route id is clean and can be taken out to quarantine
        $this->userID = $newRouteID;
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
            throw(new RangeException("event id $neweventID is not positive"));
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
            throw(new RangeException("group id $newgroupID is not positive"));
        }
        
        //finally, the group id is clean and can be taken out to quarantine
        $this->groupID = $newGroupID;
    }
    
    /**
     *accessor method for user comment
     *
     */
    public function getCommentText() {
        return($this->commentText);
    }
    
    /**mutator method for comment
     *
     **/
    public function setCommentText($newCommentText) {
        // zeroth, filter out malicious content
        // ensure comment is no longer than 500 characters
        // if comment is longer than 500 throw exception
        if($newCommentText === null) {
            return;
        }
        //first, trim comment
        $newCommentText = trim($newCommentText);
        
        // second, filter comment
        $newCommentText=(filter_var($newCommentText, FILTER_SANITIZE_STRING));
        if(strlen($newCommentText) >=500){
            throw(new UnexpectedValueException("comment is greater than 500 characters"));
        }
        
        // finally, set new user comment
        $this->comment = $newCommentText;
    }
    
    ///// METHOD TO INSERT COMMENT INTO MYSQL
  /**
   * inserts this commentText to mysql
   *
   * @param resource $mysqli pointer to mySQL connection, by reference
   * @throws mysqli_sql_exception when mySQL related errors occur
   **/
  public function insert(&$mysqli) {
    // handle degenerate cases
    if(gettype($mysqli) !== "object" || get_class($mysqli) !== "mysqli") {
      throw(new mysqli_sql_exception("input is not a mysqli object"));
    }

    // create query template
    $query = "INSERT INTO commmentText(commentID, commentDateCreated, userID, routeID, eventID, groupID, commentText) VALUES(?, ?, ?, ?, ?, ?, ?)";
    $statement = $mysqli->prepare($query);
    if($statement === false) {
      throw(new mysqli_sql_exception("Unable to prepare statement"));
    }
    
    // bind the member variables to the place holders in the template
    // for bind_param s=string i=integer d=double
    $wasClean = $statement->bind_param("isiiiis", $this->userID, $this->commentDateCreated, $this->userID, $this->routeID, $this->eventID, $this->groupID, $this->commentText);
    if($wasClean === false) {
      throw(new mysqli_sql_exception("Unable to bind parameters"));
    }
    
     // execute the statement
    if($statement->execute() === false) {
      throw(new mysqli_sql_exception("Unable to execute mySQL statement"));
    }

    // update the null commentText with what mySQL just created via auto_increment
    $this->eventID = $mysqli->insert_id;
  }
  
  ///// METHOD TO DELETE COMMENT INTO MYSQL
  /**
   * deletes this Comment from mysql
   *
   * @param resource $mysqli pointer to mySQL connection, by reference
   * @throws mysqli_sql_exception when mySQL related errors occur
   **/
  public function delete(&$mysqli) {
    // handle degenerate cases
    if(gettype($mysqli) !== "object" || get_class($mysqli) !== "mysqli") {
      throw(new mysqli_sql_exception("input is not a mysqli object"));
    }

    // enforce the commentTextID is not null (i.e., don't delete a user that hasn't been inserted)
    if($this->eventID === null) {
      throw(new mysqli_sql_exception("Unable to delete a comment that does not exist"));
    }

    // create query template
    $query = "DELETE FROM Comment WHERE commentTextID = ?";
    $statement = $mysqli->prepare($query);
    if($statement === false) {
      throw(new mysqli_sql_exception("Unable to prepare statement"));
    }

    // bind the member variables to the pace holder in the template
    $wasClean = $statement->bind_param("i", $this->commentTextID);
    if($wasClean === false) {
      throw(new mysqli_sql_exception("unable to bind parameters"));
    }

    // execute the statement
    if($statement->execute() === false) {
      throw(new mysqli_sql_exception("unable to execute mySQL statement"));
    }

  }

   //// STATIC METHOD to get public comments by the UserID of the event author
  /**
   *
   * @param makes a query on the Events table to grab results for a list of Events
   * @return creates multiple $eventArry objects that can be looped through
   *
   **/
  public static function getCommentsByUserID(&$mysqli, $userID) {
    // create & prepare a query template
    $query = "SELECT commentID, commentDateCreated, userID, commentText, groupID, eventID, routeID FROM comments WHERE userID = ? LIMIT 5";

    // prepare the statement
    if(($statement = $mysqli->prepare($query)) === false) {
      throw(new mysqli_sql_exception("Unable to prepare query $query"));
    }

    // bind parameters to the template
    if(($statement->bind_param("i", $userID)) === false) {
      throw(new mysqli_sql_exception("Unable to bind parameters"));
    }

    // execute the query
    if(($statement->execute()) === false) {
      throw(new mysqli_sql_exception("Unable to execute statement"));
    }

    // be demanding and get results! *pounds fist*
    if(($result = $statement->get_result()) === false) {
      throw(new mysqli_sql_exception("Unable to get results"));
    }

    // create the $eventArray that can be looped through
    $userCommentArray = array();

    while(($row = $result->fetch_assoc()) !== null) {
      $userCommentArray[] = new Comment($row["commentID"], $row["commentDateCreated"], $row["userID"], $row["commentText"], $row["groupID"], $row["eventID"], $row["routeID"]);
    }

    return $userCommentArray;
  }

  //// STATIC METHOD to get public comments by the EventID of the event author
  /**
   *
   * @param makes a query on the Events table to grab results for a list of Events
   * @return creates multiple $eventArry objects that can be looped through
   *
   **/
  public static function getCommentsByEventID(&$mysqli, $eventID) {
    // create & prepare a query template
    $query = "SELECT commentID, commentDateCreated, userID, commentText, groupID, eventID, routeID WHERE eventID = ? LIMIT 5";

    // prepare the statement
    if(($statement = $mysqli->prepare($query)) === false) {
      throw(new mysqli_sql_exception("Unable to prepare query $query"));
    }

    // bind parameters to the template
    if(($statement->bind_param("i", $eventID)) === false) {
      throw(new mysqli_sql_exception("Unable to bind parameters"));
    }

    // execute the query
    if(($statement->execute()) === false) {
      throw(new mysqli_sql_exception("Unable to execute statement"));
    }

    // be demanding and get results! *pounds fist*
    if(($result = $statement->get_result()) === false) {
      throw(new mysqli_sql_exception("Unable to get results"));
    }

    // create the $eventArray that can be looped through
    $eventArray = array();

    while(($row = $result->fetch_assoc()) !== null) {
      $eventArray[] = new Event($row["commentID"], $row["commentDateCreated"], $row["userID"], $row["commentText"], $row["groupID"], $row["eventID"], $row["routeID"]);
    }

    return $eventArray;
  }

  //// STATIC METHOD to get public comments by the GroupID of the event author
  /**
   *
   * @param makes a query on the Events table to grab results for a list of Events
   * @return creates multiple $eventArry objects that can be looped through
   *
   **/
  public static function getEventsByGroupID(&$mysqli, $groupID) {
    // create & prepare a query template
    $query = "SELECT commentID, commentDateCreated, userID, commentText, groupID, eventID, routeID WHERE groupID = ? LIMIT 5";

    // prepare the statement
    if(($statement = $mysqli->prepare($query)) === false) {
      throw(new mysqli_sql_exception("Unable to prepare query $query"));
    }

    // bind parameters to the template
    if(($statement->bind_param("i", $groupID)) === false) {
      throw(new mysqli_sql_exception("Unable to bind parameters"));
    }

    // execute the query
    if(($statement->execute()) === false) {
      throw(new mysqli_sql_exception("Unable to execute statement"));
    }

    // be demanding and get results! *pounds fist*
    if(($result = $statement->get_result()) === false) {
      throw(new mysqli_sql_exception("Unable to get results"));
    }

    // create the $eventArray that can be looped through
    $groupArray = array();

    while(($row = $result->fetch_assoc()) !== null) {
      $groupArray[] = new Event($row["commentID"], $row["commentDateCreated"], $row["userID"], $row["commentText"], $row["groupID"], $row["eventID"], $row["routeID"]);
    }

    return $groupArray;
  }
  
     //// STATIC METHOD to get public comments by the UserID of the event author
  /**
   *
   * @param makes a query on the Events table to grab results for a list of Events
   * @return creates multiple $eventArry objects that can be looped through
   *
   **/
  public static function getCommentsByRouteID(&$mysqli, $routeID) {
    // create & prepare a query template
    $query = "SELECT commentID, commentDateCreated, userID, commentText, groupID, eventID, routeID WHERE routeID = ? LIMIT 5";

    // prepare the statement
    if(($statement = $mysqli->prepare($query)) === false) {
      throw(new mysqli_sql_exception("Unable to prepare query $query"));
    }

    // bind parameters to the template
    if(($statement->bind_param("i", $routeID)) === false) {
      throw(new mysqli_sql_exception("Unable to bind parameters"));
    }

    // execute the query
    if(($statement->execute()) === false) {
      throw(new mysqli_sql_exception("Unable to execute statement"));
    }

    // be demanding and get results! *pounds fist*
    if(($result = $statement->get_result()) === false) {
      throw(new mysqli_sql_exception("Unable to get results"));
    }

    // create the $eventArray that can be looped through
    $routeArray = array();

    while(($row = $result->fetch_assoc()) !== null) {
      $routeArray[] = new Event($row["commentID"], $row["commentDateCreated"], $row["userID"], $row["commentText"], $row["groupID"], $row["eventID"], $row["routeID"]);
    }

    return $routeArray;
  }
}
  
?>