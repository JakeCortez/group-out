<?php
/**
* @author Jim Wittwer (wittwerjim@hotmail.com)
*/

class Event {

// PROPERTIES

  /**
   * primary key, integer, auto inserted upon creating an event
   */
  private $eventID;
  /**
   * FOREIGN KEY, originates from Routes
   */
  private $routeID;
  /**
   * FOREIGN KEY, originates from userID of current session
   */
  private $userID;
  /**
   * CURRENT_TIMESTAMP, auto inserted upon creating an event
   */
  private $eventDateCreated;
  /**
   * string, user types in the city name
   */
  private $eventCity;
  /**
   * DATETIME, user enters this via drop down menus
   */
  private $eventDate;
  /**
   * string, user types text into a field with a character limit
   */
  private $eventDescription;
  /**
   * integer, 0=easy | 1=moderate | 3=hard | 4=expert
   */
  private $eventDifficulty;
  /**
   * string, user enters text into field with character limit of 20
   */
  private $eventName;
  /**
   * integer, 0=public | 2=group | 3=private
   */
  private $eventPrivacy;
  /**
   * integer, user selects state from dropdown
   */
  private $eventState;
  /**
   * string, user selects from drop-down that inputs CHARS(2)
   */
  private $eventZip;
  /**
   * string, user selects from drop-down that inputs CHARS(2)
   */
  private $eventActivityList;



  /**
   * constructor for Event
   *
   * @param $newEventID integer, auto inserted upon creating an event
   * @param $newRouteID FOREIGN KEY, integer, originates from Routes
   * @param $newUserID FOREIGN KEY, integer, originates from userID of current session
   * @param $newEventDateCreated CURRENT_TIMESTAMP auto inserted upon creating an event
   * @param $newEventCity string, user types in the city name
   * @param $newEventDate DATETIME, user enters this via drop down menus
   * @param $newEventDescription string, user types text into a field with a character limit
   * @param $newEventDifficulty integer, 0=easy | 1=moderate | 3=hard | 4=expert
   * @param $newEventName string, user enters text into field with character limit
   * @param $newEventPrivacy integer, 0=public | 2=group | 3=private
   * @param $newEventState CHAR(2), user selects state from dropdown
   * @param $newEventZip string, user types numbers with a character limit of 10
   * @param $newEventMemberCount integer, the number of members who joined the event
   * @param $newEventActivityList string, one or more
   * @throws UnexpectedValueException when a parameter is of the wrong type
   * @throws RangeException when a parameter is invalid
   **/
  public function __construct($newEventID, $newRouteID, $newUserID, $newEventDateCreated, $newEventCity, $newEventDate, $newEventDescription, $newEventDifficulty, $newEventName, $newEventPrivacy, $newEventState, $newEventZip, $newEventMemberCount, $newEventActivityList) {
      try {
        $this->setEventID($newEventID);
        $this->setRouteID($newRouteID); // FOREIGN KEY
        $this->setUserID($newUserID); // FOREIGN KEY
        $this->setEventDateCreated($newEventDateCreated);
        $this->setEventCity($newEventCity);
        $this->setEventDate($newEventDate);
        $this->setEventDescription($newEventDescription);
        $this->setEventDifficulty($newEventDifficulty);
        $this->setEventName($newEventName);
        $this->setEventPrivacy($newEventPrivacy);
        $this->setEventState($newEventState);
        $this->setEventZip($newEventZip);
        $this->setEventMemberCount($newEventMemberCount);
        $this->setEventActivityList($newEventActivityList);
      } catch(UnexpectedValueException $unexpectedValue) {
          // rethrow to the caller
          throw(new UnexpectedValueException("Unable to construct Event", 0, $unexpectedValue));
      } catch(RangeException $range) {
          // rethrow to the caller
          throw(new RangeException("Unable to construct Event", 0, $range));
      }
  }



///// GET & SET FOR eventID
  /**
   * gets the value of eventID
   *
   * @return mixed eventID (or null if new object)
   **/
  public function getEventID() {
      return($this->eventID);
  }

  /**
   * sets the value of eventID
   *
   * @param mixed $newEventID eventID (or null if new object)
   * @throws UnexpectedValueException if not an integer or null
   * @throws RangeException if eventID isn't positive
   **/
  public function setEventID($newEventID) {
    // zeroth, set allow the eventID to be null if a new object
    if($newEventID === null) {
        $this->eventID = null;
        return;
    }

    // first, ensure the eventID is an integer
    if(filter_var($newEventID, FILTER_VALIDATE_INT) === false) {
        throw(new UnexpectedValueException("eventID $newEventID is not numeric"));
    }

    // second, convert the eventID to an integer and enforce it's positive
    $newEventID = intval($newEventID);
    if($newEventID <= 0) {
        throw(new RangeException("eventID $newEventID is not positive"));
    }

    // finally, take the eventID out of quarantine and assign it
    $this->eventID = $newEventID;
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

///// GET & SET FOR eventDateCreated
  /**
   * gets the value of eventDateCreated
   *
   * @return DateTime eventDateCreated and time as a DateTime object
   * @see http://php.net/manual/en/class.datetime.php
   **/
  public function getEventDateCreated() {
      return($this->eventDateCreated);
  }

  /**
   * sets the value of eventDateCreated
   *
   * @param mixed $newEventDateCreated eventDateCreated as a string in Y-m-d H:i:s format or as a DateTime object
   * @throws RangeException if the input is a string and cannot be parsed
   * @see http://php.net/manual/en/function.date.php
   * @see http://php.net/manual/en/class.datetime.php
   **/
  public function setEventDateCreated($newEventDateCreated) {
    // zeroth, if this is a DateTime object, assign it
    if(gettype($newEventDateCreated) === "object" && get_class($newEventDateCreated) === "DateTime") {
        $this->eventDateCreated = $newEventDateCreated;
        return;
    }

    // first, cleanse the date string
    $newEventDateCreated = trim($newEventDateCreated);
    $newEventDateCreated = filter_var($newEventDateCreated, FILTER_SANITIZE_STRING);

    // second, use a regular expression to extract the date and verify it
    if((preg_match("/^(\d{4})-(\d{2})-(\d{2}) (\d{2}):(\d{2}):(\d{2})$/", $newEventDateCreated, $matches)) !== 1) {
        throw(new RangeException("eventDateCreated $newEventDateCreated is not a mySQL formatted date"));
    }

    // third, verify the date is a valid date
    $year  = intval($matches[1]);
    $month = intval($matches[2]);
    $day   = intval($matches[3]);
    if((checkdate($month, $day, $year)) === false) {
        throw(new RangeException("eventDateCreated $newEventDateCreated is not a Gregorian date"));
    }

    // finally, convert the date to a DateTime object
    if(($dateTime = DateTime::createFromFormat("Y-m-d H:i:s", $newEventDateCreated)) === false) {
        throw(new RangeException("eventDateCreated $newEventDateCreated cannot be converted to a DateTime object"));
    }
    $this->eventDateCreated = $dateTime;
  }

///// GET & SET FOR eventCity
  /**
   * gets the value of eventCity
   *
   * @return string eventCity
   **/
  public function getEventCity() {
      return($this->eventCity);
  }

  /**
   * sets the value of eventCity
   *
   * @param string $newEventCity eventCity
   **/
  public function setEventCity($newEventCity) {
      // filter the city as a generic string
      $newEventCity = trim($newEventCity);
      $newEventCity = filter_var($newEventCity, FILTER_SANITIZE_STRING);

      // then just take the city out of quarantine
      $this->eventCity = $newEventCity;
  }

///// GET & SET FOR eventDate
  /**
   * gets the value of eventDate
   *
   * @return DateTime eventDate and time as a DateTime object
   * @see http://php.net/manual/en/class.datetime.php
   **/
  public function getEventDate() {
      return($this->eventDate);
  }

  /**
   * sets the value of eventDate
   *
   * @param mixed $newEventDate eventDate as a string in Y-m-d H:i:s format or as a DateTime object
   * @throws RangeException if the input is a string and cannot be parsed
   * @see http://php.net/manual/en/function.date.php
   * @see http://php.net/manual/en/class.datetime.php
   **/
  public function setEventDate($newEventDate) {
    // zeroth, if this is a DateTime object, assign it
    if(gettype($newEventDate) === "object" && get_class($newEventDate) === "DateTime") {
        $this->eventDate = $newEventDate;
        return;
    }

    // first, cleanse the date string
    $newEventDate = trim($newEventDate);
    $newEventDate = filter_var($newEventDate, FILTER_SANITIZE_STRING);

    // second, use a regular expression to extract the date and verify it
    if((preg_match("/^(\d{4})-(\d{2})-(\d{2}) (\d{2}):(\d{2}):(\d{2})$/", $newEventDate, $matches)) !== 1) {
        throw(new RangeException("eventDate $newEventDate is not a mySQL formatted date"));
    }

    // third, verify the date is a valid date
    $year  = intval($matches[1]);
    $month = intval($matches[2]);
    $day   = intval($matches[3]);
    if((checkdate($month, $day, $year)) === false) {
        throw(new RangeException("eventDate $newEventDate is not a Gregorian date"));
    }

    // finally, convert the date to a DateTime object
    if(($dateTime = DateTime::createFromFormat("Y-m-d H:i:s", $newEventDate)) === false) {
        throw(new RangeException("eventDate $newEventDate cannot be converted to a DateTime object"));
    }
    $this->eventDate = $dateTime;
  }

///// GET & SET FOR eventDescription
  /**
   * gets the value of eventDescription
   *
   * @return string eventDescription
   **/
  public function getEventDescription() {
      return($this->eventDescription);
  }

  /**
   * sets the value of eventDescription
   *
   * @param string $newEventDescription product name
   **/
  public function setEventDescription($newEventDescription) {
      // filter the description as a generic string
      $newEventDescription = trim($newEventDescription);
      $newEventDescription = filter_var($newEventDescription, FILTER_SANITIZE_STRING);

      // then just take the description out of quarantine
      $this->eventDescription = $newEventDescription;
  }

///// GET & SET FOR eventDifficulty
  /**
   * gets the value of eventDifficulty
   *
   * @return mixed eventDifficulty (or null if new object)
   **/
  public function getEventDifficulty() {
      return($this->eventDifficulty);
  }

  /**
   * sets the value of eventDifficulty
   *
   * @param mixed $newEventDifficulty eventDifficulty (or null if new object)
   * @throws UnexpectedValueException if not an integer or null
   * @throws RangeException if eventDifficulty isn't positive
   **/
  public function setEventDifficulty($newEventDifficulty) {
    // zeroth, set allow the eventDifficulty to be null if a new object
    if($newEventDifficulty === null) {
        $this->eventDifficulty = null;
        return;
    }

    // first, ensure the eventDifficulty is an integer
    if(filter_var($newEventDifficulty, FILTER_VALIDATE_INT) === false) {
        throw(new UnexpectedValueException("Event difficulty $newEventDifficulty is not numeric"));
    }

    // second, convert the eventDifficulty to an integer and enforce it's positive
    $newEventDifficulty = intval($newEventDifficulty);
    if($newEventDifficulty <= 0) {
        throw(new RangeException("Event difficulty $newEventDifficulty is not positive"));
    }

    // finally, take the eventDifficulty out of quarantine and assign it
    $this->eventDifficulty = $newEventDifficulty;
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
   * sets the value of eventName
   *
   * @param string $newEventName eventName
   **/
  public function setEventName($newEventName) {
      // filter the city as a generic string
      $newEventName = trim($newEventName);
      $newEventName = filter_var($newEventName, FILTER_SANITIZE_STRING);

      // then just take the city out of quarantine
      $this->eventName = $newEventName;
  }

///// GET & SET FOR eventPrivacy
  /**
   * gets the value of eventPrivacy
   *
   * @return mixed eventPrivacy (or null if new object)
   **/
  public function getEventPrivacy() {
      return($this->eventPrivacy);
  }

  /**
   * sets the value of eventPrivacy
   *
   * @param mixed $newEventPrivacy eventPrivacy (or null if new object)
   * @throws UnexpectedValueException if not an integer or null
   * @throws RangeException if eventPrivacy isn't positive
   **/
  public function setEventPrivacy($newEventPrivacy) {
    // zeroth, set allow the eventPrivacy to be null if a new object
    if($newEventPrivacy === null) {
        $this->eventPrivacy = null;
        return;
    }

    // first, ensure the eventPrivacy is an integer
    if(filter_var($newEventPrivacy, FILTER_VALIDATE_INT) === false) {
        throw(new UnexpectedValueException("Event privacy $newEventPrivacy is not numeric"));
    }

    // second, convert the eventPrivacy to an integer and enforce it's positive
    $newEventPrivacy = intval($newEventPrivacy);
    if($newEventPrivacy <= 0) {
        throw(new RangeException("Event privacy $newEventPrivacy is not positive"));
    }

    // finally, take the eventPrivacy out of quarantine and assign it
    $this->eventPrivacy = $newEventPrivacy;
  }


///// GET & SET FOR eventState
  /**
   * gets the value of eventState
   *
   * @return mixed eventState (or null if new object)
   **/
  public function getEventState() {
      return($this->eventState);
  }

  /**
   * sets the value of eventState
   *
   * @param mixed $newEventState eventState (or null if new object)
   * @throws UnexpectedValueException if not an integer or null
   * @throws RangeException if eventState isn't positive
   **/
  public function setEventState($newEventState) {
    // zeroth, set allow the eventState to be null if a new object
    if($newEventState === null) {
        $this->eventState = null;
        return;
    }

    // validate for CHAR(2)

    // finally, take the eventState out of quarantine and assign it
    $this->eventState = $newEventState;
  }

///// GET & SET FOR eventZip
  /**
   * gets the value of eventZip
   *
   * @return string eventZip
   **/
  public function getEventZip() {
    return($this->eventZip);
  }

  /**
   * sets the value of eventZip
   *
   * @param string $newEventZip
   * @throws RangeException when input doesn't conform to USPS standards
   **/
  public function setEventZip($newEventZip) {
    // verify the eventZip is in valid form
    $newEventZip    = trim($newEventZip);
    $filterOptions = array("options" => array("regexp" => "/^\d{5}(-\d{4})?$/"));
    if(filter_var($newEventZip, FILTER_VALIDATE_REGEXP, $filterOptions) === false) {
        throw(new RangeException("not a valid ZIP code"));
    }

    // finally, take the eventZip out of quarantine
    $this->eventZip = $newEventZip;
  }

///// GET & SET FOR EventMemberCount
  /**
   * gets the value of eventMemberCount
   *
   * @return mixed eventMemberCount (or null if new object)
   **/
  public function getEventMemberCount() {
    return($this->eventMemberCount);
  }
  /**
   * sets the value of eventMemberCount
   *
   * @param mixed $newEventMemberCount eventMemberCount (or null if new object)
   * @throws UnexpectedValueException if not an integer or null
   * @throws RangeException if eventMemberCount isn't positive
   **/
  public function setEventMemberCount($newEventMemberCount) {
    // zeroth, set allow the eventMemberCount to be null if a new object
    if($newEventMemberCount === null) {
        $this->eventMemberCount = null;
        return;
    }

    // first, ensure the eventMemberCount is an integer
    if(filter_var($newEventMemberCount, FILTER_VALIDATE_INT) === false) {
        throw(new UnexpectedValueException("EventMemberCount $newEventMemberCount is not numeric"));
    }

    // second, convert the eventMemberCount to an integer and enforce it's positive
    $newEventMemberCount = intval($newEventMemberCount);
    if($newEventMemberCount <= 0) {
        throw(new RangeException("EventMemberCount $newEventMemberCount is not positive"));
    }

    // finally, take the eventMemberCount out of quarantine and assign it
    $this->eventMemberCount = $newEventMemberCount;
  }

///// GET & SET FOR EventActivityList
  /**
   * gets the value of EventActivityList
   *
   * @return string EventActivityList
   **/
  public function getEventActivityList() {
      return($this->eventActivityList);
  }

  /**
   * sets the value of EventActivityList
   *
   * @param string $newEventActivityList EventActivityList
   **/
  public function setEventActivityList($newEventActivityList) {
      // filter the city as a generic string
      $newEventActivityList = trim($newEventActivityList);
      $newEventActivityList = filter_var($newEventActivityList, FILTER_SANITIZE_STRING);

      // then just take the city out of quarantine
      $this->eventActivityList = $newEventActivityList;
  }

///// METHOD TO INSERT EVENT INTO MYSQL
///// !! DOESN'T TAKE INTO ACCOUNT FOREIGN KEYS FOR routeID, UserID!!
  /**
   * inserts this Event to mysql
   *
   * @param resource $mysqli pointer to mySQL connection, by reference
   * @throws mysqli_sql_exception when mySQL related errors occur
   **/
  public function insert(&$mysqli) {
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
