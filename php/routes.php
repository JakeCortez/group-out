<?php
/**
* @author Charlie goodan (cgoodan@gmail.com)
*/

class Rout {
    
    // PROPERTIES
    
    /**
     * primary key, integer, auto inserted upon creating a route
     */
    private $routeID;
    /**
     * FOREIGN KEY, originates from userID of current session
     */
    private $userID;
    /**
     * CURRENT_TIMESTAMP, auto inserted upon creating an event
     */
    private $routeDateCreated;
    /**
     * string, route enters text into field with character limit of 20
     */
    private $routeName;
    /**
     * string, route types text into a field with a character limit
     */
    private $routeDescription;
    /**
     * integer, 0=easy | 1=moderate | 3=hard | 4=expert
     */
    private $routeDifficulty;
    /**
     * integer, 0=public | 2=group | 3=private
     */
    private $routePrivacy;
    /**
     *provided by google maps api
     **/
    private $centerLng;
    /**
     *provided by google maps api
     **/
    private $centerLat




  /**
   * constructor for Route
   *
   * @param $newRouteID FOREIGN KEY, integer, originates from Routes
   * @param $newUserID FOREIGN KEY, integer, originates from userID of current session
   * @param $newRouteDateCreated CURRENT_TIMESTAMP auto inserted upon creating an event
   * @param $newRouteName string, user enters text into field with character limit
   * @param $newRouteDescription string, user types text into a field with a character limit
   * @param $newRouteDifficulty integer, 0=easy | 1=moderate | 3=hard | 4=expert
   * @param $newRoutePrivacy integer, 0=public | 2=group | 3=private
   * @param $newCenterLng double provided by google maps api
   * @param $newCenterLat double provided by google maps api
   * @throws UnexpectedValueException when a parameter is of the wrong type
   * @throws RangeException when a parameter is invalid
   **/
  public function __construct($newRouteID, $newUserID, $newRouteDateCreated, $newRouteName, $newRouteDescription, $newRouteDifficulty, $newRoutePrivacy, $newCenterLng, $newCenterLat) {
      try {
        $this->setRouteID($newRouteID); // FOREIGN KEY
        $this->setUserID($newUserID); // FOREIGN KEY
        $this->setRouteDateCreated($newRouteDateCreated);
        $this->setRouteName($newRouteName);
        $this->setRouteDescription($newEventDescription);
        $this->setRouteDifficulty($newEventDifficulty);
        $this->setCenterLng($newCenterLng);
        $this->setCenterLng($newCenterLng);
      } catch(UnexpectedValueException $unexpectedValue) {
          // rethrow to the caller
          throw(new UnexpectedValueException("Unable to construct Route", 0, $unexpectedValue));
      } catch(RangeException $range) {
          // rethrow to the caller
          throw(new RangeException("Unable to construct Route", 0, $range));
      }
  }

///// GET & SET FOR routeID !!FOREIGN KEY!!
  /**
   * gets the value of routeID
   *
   * @return mixed routeID (or null if new object)
   **/
    public function getRouteID() {
        return($this->routeID);
    }

    /**
     * sets the value of routeID
     *
     * @param mixed $newRouteID routeID (or null if new object)
     * @throws UnexpectedValueException if not an integer or null
     * @throws RangeException if routeID isn't positive
     **/
    public function setRouteID($newRouteID) {
    // zeroth, set allow the routeID to be null if a new object
        if($newRouteID === null) {
            $this->routeID = null;
            return;
    }

    // first, ensure the routeID is an integer
    if(filter_var($newRouteID, FILTER_VALIDATE_INT) === false) {
        throw(new UnexpectedValueException("routeID $newRouteID is not numeric"));
    }

    // second, convert the routeID to an integer and enforce it's positive
    $newRouteID = intval($newRouteID);
    if($newRouteID <= 0) {
        throw(new RangeException("routeID $newRouteID is not positive"));
    }

    // finally, take the routeID out of quarantine and assign it
    $this->routeID = $newRouteID;
    }

///// GET & SET FOR userID !!FOREIGN KEY!!
    /**
     * gets the value of userID
     *
     * @return mixed userID (or null if new object)
     **/
    public function getUserID() {
        return($this->userID);
    }

    /**
     * sets the value of userID
     *
     * @param mixed $newUserID userID (or null if new object)
     * @throws UnexpectedValueException if not an integer or null
     * @throws RangeException if userID isn't positive
     **/
    public function setUserID($newUserID) {
        // zeroth, set allow the userID to be null if a new object
        if($newUserID === null) {
            $this->userID = null;
            return;
        }
    }

    // first, ensure the UserID is an integer
    if(filter_var($newUserID, FILTER_VALIDATE_INT) === false) {
        throw(new UnexpectedValueException("userID $newUserID is not numeric"));
    }

    // second, convert the userID to an integer and enforce it's positive
    $newUserID = intval($newUserID);
    if($newUserID <= 0) {
        throw(new RangeException("userID $newUserID is not positive"));
    }

    // finally, take the UserID out of quarantine and assign it
    $this->userID = $newUserID;
}

///// GET & SET FOR routeDateCreated
    /**
     * gets the value of routeDateCreated
     *
     * @return DateTime routeDateCreated and time as a DateTime object
     * @see http://php.net/manual/en/class.datetime.php
     **/
    public function getRouteDateCreated() {
        return($this->routeDateCreated);
    }

  /**
   * sets the value of routeDateCreated
   *
   * @param mixed $newRouteDateCreated routeDateCreated as a string in Y-m-d H:i:s format or as a DateTime object
   * @throws RangeException if the input is a string and cannot be parsed
   * @see http://php.net/manual/en/function.date.php
   * @see http://php.net/manual/en/class.datetime.php
   **/
  public function setRouteDateCreated($newRouteDateCreated) {
    // if null for new event
    if($newRouteDateCreated === null) {
      date_default_timezone_set("America/Denver");
      $currentDate = date("Y-m-d H:i:s");

      $this->routeDateCreated = $currentDate;
      return;
    }

    // zeroth, if this is a DateTime object, assign it
    if(gettype($newRouteDateCreated) === "object" && get_class($newRouteDateCreated) === "DateTime") {
        $this->routeDateCreated = $newRouteDateCreated;
        return;
    }

    // first, cleanse the date string
    $newRouteDateCreated = trim($newRouteDateCreated);
    $newRouteDateCreated = filter_var($newRouteDateCreated, FILTER_SANITIZE_STRING);

    // second, use a regular expression to extract the date and verify it
    if((preg_match("/^(\d{4})-(\d{2})-(\d{2}) (\d{2}):(\d{2}):(\d{2})$/", $newRouteDateCreated, $matches)) !== 1) {
        throw(new RangeException("routeDateCreated $newRouteDateCreated is not a mySQL formatted date"));
    }

    // third, verify the date is a valid date
    $year  = intval($matches[1]);
    $month = intval($matches[2]);
    $day   = intval($matches[3]);
    if((checkdate($month, $day, $year)) === false) {
        throw(new RangeException("routeDateCreated $newRouteDateCreated is not a Gregorian date"));
    }

    // finally, convert the date to a DateTime object
    if(($dateTime = DateTime::createFromFormat("Y-m-d H:i:s", $newRouteDateCreated)) === false) {
        throw(new RangeException("routeDateCreated $newRouteDateCreated cannot be converted to a DateTime object"));
    }
    $this->routeDateCreated = $dateTime;
  }

///// GET & SET FOR eventName
  /**
   * gets the value of eventName
   *
   * @return string eventName
   **/
  public function getEventName() {
      return($this->eventName);
  }

  /**
   * sets the value of routeName
   *
   * @param string $newRouteName routeName
   **/
  public function setRouteName($newRouteName) {
      // filter the city as a generic string
      $newRouteName = trim($newRouteName);
      $newRouteName = filter_var($newRouteName, FILTER_SANITIZE_STRING);

      // then just take the city out of quarantine
      $this->routeName = $newRouteName;
  }

///// GET & SET FOR routeDescription
  /**
   * gets the value of routeDescription
   *
   * @return string routeDescription
   **/
  public function getRouteDescription() {
      return($this->routeDescription);
  }

  /**
   * sets the value of routeDescription
   *
   * @param string $newRouteDescription product name
   **/
  public function setRouteDescription($newRouteDescription) {
      // filter the description as a generic string
      $newRouteDescription = trim($newRouteDescription);
      $newRouteDescription = filter_var($newRouteDescription, FILTER_SANITIZE_STRING);

      // then just take the description out of quarantine
      $this->routeDescription = $newRouteDescription;
  }

///// GET & SET FOR routeDifficulty
  /**
   * gets the value of routeDifficulty
   *
   * @return mixed routeDifficulty (or null if new object)
   **/
  public function getRouteDifficulty() {
      return($this->routeDifficulty);
  }

  /**
   * sets the value of routeDifficulty
   *
   * @param mixed $newRouteDifficulty routeDifficulty (or null if new object)
   * @throws UnexpectedValueException if not an integer or null
   * @throws RangeException if routeDifficulty isn't positive
   **/
  public function setRouteDifficulty($newRouteDifficulty) {
    // zeroth, set allow the routeDifficulty to be null if a new object
    if($newRouteDifficulty === null) {
        $this->routeDifficulty = null;
        return;
    }

    // first, ensure the routeDifficulty is an integer
    if(filter_var($newRouteDifficulty, FILTER_VALIDATE_INT) === false) {
        throw(new UnexpectedValueException("Route difficulty $newRouteDifficulty is not numeric"));
    }

    // second, convert the routeDifficulty to an integer and enforce it's positive
    $newRouteDifficulty = intval($newRouteDifficulty);
    if($newRouteDifficulty <= 0) {
        throw(new RangeException("Route difficulty $newRouteDifficulty is not positive"));
    }

    // finally, take the routeDifficulty out of quarantine and assign it
    $this->routeDifficulty = $newRouteDifficulty;
  }

///// GET & SET FOR routePrivacy
  /**
   * gets the value of routePrivacy
   *
   * @return mixed routePrivacy (or null if new object)
   **/
  public function getRoutePrivacy() {
      return($this->routePrivacy);
  }

  /**
   * sets the value of routePrivacy
   *
   * @param mixed $newRoutePrivacy routePrivacy (or null if new object)
   * @throws UnexpectedValueException if not an integer or null
   * @throws RangeException if routePrivacy isn't positive
   **/
  public function setRoutePrivacy($newRoutePrivacy) {
    // zeroth, set allow the routePrivacy to be null if a new object
    if($newRoutePrivacy === null) {
        $this->routePrivacy = null;
        return;
    }

    // first, ensure the routePrivacy is an integer
    if(filter_var($newRoutePrivacy, FILTER_VALIDATE_INT) === false) {
        throw(new UnexpectedValueException("Route privacy $newRoutePrivacy is not numeric"));
    }

    // second, convert the routePrivacy to an integer and enforce it's positive
    $newRoutePrivacy = intval($newRoutePrivacy);
    if($newRoutePrivacy <= 0) {
        throw(new RangeException("Route privacy $newRoutePrivacy is not positive"));
    }

    // finally, take the routePrivacy out of quarantine and assign it
    $this->routePrivacy = $newRoutePrivacy;
  }

    // trim() the input variable
    // use filter_var() with FILTER_VALIDATE_FLOAT
    // (float => OK, false => invalid)
    // Ermagherd! Kazim is AFK!
    // latitude: [-90, 90]
    // longitude: [-180, 180]
    // if it passes all that, take out of quarentine
    // Y U NO PRINT MORE MEMES!?!?!
    
    
    
    
    //accessor method for centerLat
    public function getCenterLat() {
        return($this->centerLat) ;
    }
    
    //mutator method for centerLat
    //@param float new value of latitude
    public function setCenterLat($newCenterLat) {
        if($newCenterLat === null) {
            $this->centerLat = null;
            return;
        }
    }
    
    $newCenterLat = trim($newCenterLat);
    
    if(filter_var($newCenterLat, FILTER_VALIDATE_FLOAT) === false) {
        throw(new UnexpectedValueException("provided latitude $newCenterLat is invalid"));
    }
    
    if($newCenterLat < -180) {
        throw(new RangeException("provided latitude $newCenterLat is invalid"));
    }
    
    if($newCenterLat > 180) {
        throw(new RangeException("provided latitude $newCenterLat is invalid"));
    }
    
    //finaly the centerLat is clean and can be taken out of quarentien
    $this->centerLat = $newCenterLat;
    
    
    
    //accessor method for centerLng
    public function getCenterLng() {
        return($this->centerLng) ;
    }
    
    //mutator method for centerLng
    //@param float new value of latitude
    public function setCenterLat($newCenterLng) {
        if($newCenterLng === null) {
            $this->centerLng = null;
            return;
        }
    }    
    $newCenterLng = trim($newCenterLng);
    
    if(filter_var($newCenterLng, FILTER_VALIDATE_FLOAT) === false) {
        throw(new UnexpectedValueException("provided longitude $newCenterLng is invalid"));
    }
    
    if($newCenterLng < -90) {
        throw(new RangeException("provided longitude $newCenterLng is invalid"));
    }
    
    if($newCenterLng > 90) {
        throw(new RangeException("provided longitude $newCenterLng is invalid"));
    }
    
     //finaly the centerLng is clean and can be taken out of quarentien
    $this->centerLng = $newCenterLng;
    
    
/////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////


///// METHOD TO INSERT EVENT INTO MYSQL
///// !! DOESN'T TAKE INTO ACCOUNT FOREIGN KEYS FOR routeID, UserID!!
  /**
   * inserts this Event to mysql
   *
   * @param resource $mysqli pointer to mySQL connection, by reference
   * @throws mysqli_sql_exception when mySQL related errors occur
   **/
  public static function select(&$mysqli) {
    // handle degenerate cases
    if(gettype($mysqli) !== "object" || get_class($mysqli) !== "mysqli") {
      throw(new mysqli_sql_exception("input is not a mysqli object"));
    }

    // enforce the eventID is null (i.e., don't insert an event that already exists)
    if($this->eventID !== null) {
      throw(new mysqli_sql_exception("Event already exists"));
    }

    // create query template
    $query = "INSERT INTO event(routeID, userID, eventDateCreated, eventCity, eventDate, eventDescription, eventDifficulty, eventName, eventPrivacy, eventState, eventZip) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $statement = $mysqli->prepare($query);
    if($statement === false) {
      throw(new mysqli_sql_exception("Unable to prepare statement"));
    }

    // bind the member variables to the place holders in the template
    // for bind_param s=string i=integer d=double
    $wasClean = $statement->bind_param("iissssisiis", $this->routeID, $this->userID, $this->eventDateCreated, $this->eventCity, $this->eventDate, $this->eventDescription, $this->eventDifficulty, $this->eventName, $this->eventPrivacy, $this->eventState, $this->eventZip);
    if($wasClean === false) {
      throw(new mysqli_sql_exception("Unable to bind parameters"));
    }

    // execute the statement
    if($statement->execute() === false) {
      throw(new mysqli_sql_exception("Unable to execute mySQL statement"));
    }

    // update the null eventID with what mySQL just created via auto_increment
    $this->eventID = $mysqli->insert_id;
  }

///// METHOD TO DELETE EVENT INTO MYSQL
  /**
   * deletes this Event from mysql
   *
   * @param resource $mysqli pointer to mySQL connection, by reference
   * @throws mysqli_sql_exception when mySQL related errors occur
   **/
  public function delete(&$mysqli) {
    // handle degenerate cases
    if(gettype($mysqli) !== "object" || get_class($mysqli) !== "mysqli") {
      throw(new mysqli_sql_exception("input is not a mysqli object"));
    }

    // enforce the eventID is not null (i.e., don't delete a user that hasn't been inserted)
    if($this->eventID === null) {
      throw(new mysqli_sql_exception("Unable to delete an event that does not exist"));
    }

    // create query template
    $query = "DELETE FROM Event WHERE eventID = ?";
    $statement = $mysqli->prepare($query);
    if($statement === false) {
      throw(new mysqli_sql_exception("Unable to prepare statement"));
    }

    // bind the member variables to the pace holder in the template
    $wasClean = $statement->bind_param("i", $this->eventID);
    if($wasClean === false) {
      throw(new mysqli_sql_exception("unable to bind parameters"));
    }

    // execute the statement
    if($statement->execute() === false) {
      throw(new mysqli_sql_exception("unable to execute mySQL statement"));
    }

  }

///// METHOD TO UPDATE EVENT INTO MYSQL
///// !! DOESN'T TAKE INTO ACCOUNT FOREIGN KEYS FOR routeID, UserID!!
  /**
   * updates this Event in mysql
   *
   * @param resource $mysqli pointer to mySQL connection, by reference
   * @throws mysqli_sql_exception when mySQL related errors occur
   **/
  public function update(&$mysqli) {
    // handle degenerate cases
    if(gettype($mysqli) !== "object" || get_class($mysqli) !== "mysqli") {
      throw(new mysqli_sql_exception("input is not a mysqli object"));
    }

    // enforce the eventID is not null (i.e., don't delete a user that hasn't been inserted)
    if($this->eventID === null) {
      throw(new mysqli_sql_exception("Unable to delete an event that does not exist"));
    }

    // create query template
    $query = "UPDATE Event SET routeID = ?, userID = ?, eventDateCreated = ?, eventCity = ?, eventDate = ?, eventDescription = ?, eventDifficulty = ?, eventName = ?, eventPrivacy = ?, eventState = ?, eventZip = ? WHERE eventID = ?";
    $statement = $mysqli->prepare($query);
    if($statement === false) {
      throw(new mysqli_sql_exception("Unable to prepare statement"));
    }

    // bind the member variables to the place holders in the template
    // for bind_param s=string i=integer d=double
    $wasClean = $statement->bind_param("iissssisiisi", $this->routeID, $this->userID, $this->eventDateCreated, $this->eventCity, $this->eventDate, $this->eventDescription, $this->eventDifficulty, $this->eventName, $this->eventPrivacy, $this->eventState, $this->eventZip, $this->eventID);
    if($wasClean === false) {
      throw(new mysqli_sql_exception("Unable to bind parameters"));
    }

    // execute the statement
    if($statement->execute() === false) {
      throw(new mysqli_sql_exception("unable to execute mySQL statement"));
    }

  }

///// STATIC METHOD to get public events by the userID of the event author
  /**
   *
   * @param makes a query on the Events table to grab results for a list of Events
   * @return creates multiple $eventArry objects that can be looped through
   *
   **/
  public static function getEventsByUserID(&$mysqli, $userID) {
    // create & prepare a query template
    // old query $query = "SELECT eventID, routeID, userID, eventDate, eventCity, eventDate, eventDescription, eventDifficulty, eventName, eventPrivacy, eventState, eventZip, eventMemberCount FROM events WHERE userID = ? AND eventPrivacy = 2 LIMIT 3";
    $query = "SELECT events.eventID, events.routeID, events.userID, events.eventDate, events.eventCity, events.eventDateCreated, events.eventDescription, events.eventDifficulty, events.eventName, events.eventPrivacy, events.eventState, events.eventZip, events.eventMemberCount, eventToActivity.eventActivityList
              FROM events
              INNER JOIN (SELECT DISTINCT eventID, GROUP_CONCAT(DISTINCT activityTypeName ORDER BY activityTypeName SEPARATOR ', ') AS eventActivityList FROM eventToActivity LEFT JOIN activityType ON eventToActivity.activityTypeID = activityType.activityTypeID GROUP BY eventID) eventToActivity
              ON events.eventID = eventToActivity.eventID
              WHERE events.userID = ? AND events.eventPrivacy = 2
              LIMIT 3";

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

    // get the results
    if(($result = $statement->get_result()) === false) {
      throw(new mysqli_sql_exception("Unable to get results"));
    }

    // create the $eventArray that can be looped through
    $eventArray = array();

    while(($row = $result->fetch_assoc()) !== null) {
      $eventArray[] = new Event($row["eventID"], $row["routeID"], $row["userID"], $row["eventDateCreated"], $row["eventCity"], $row["eventDate"], $row["eventDescription"], $row["eventDifficulty"], $row["eventName"], $row["eventPrivacy"], $row["eventState"], $row["eventZip"], $row["eventMemberCount"], $row["eventActivityList"]);
    }

    return $eventArray;
  }

}
?>
