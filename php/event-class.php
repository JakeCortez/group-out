<?php

class Event {

// PROPERTIES

  /**
   * primary key, integer, auto inserted upon creating an event
   */
  private $eventID;
  /**
   * foreign key, originates from Routes
   */
  private $routeID;
  /**
   * foreign key, originates from userID of current session
   */
  private $userID;
  /**
   * TIMESTAMP, auto inserted upon creating an event
   */
  private $eventDateCreated;
  /**
   * string, user types in the city name
   */
  private $eventCity;
  /**
   * integer, user enters this via drop down menus
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
   * string, user selects state from dropdown
   */
  private $eventState;
  /**
   * integer, user types numbers with a character limit of 10
   */
  private $eventZip;

// ACCESSORS
  public function getEventID() {
      return $this->eventID;
  }
  /**
   * mutator method for eventID
   *
   * @param integer new value of eventID or null if a new object
   * @throws UnexpectedValueException if the eventID is not an integer
   * @throws RangeException if the eventID is not positive
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
        throw(new UnexpectedValueException("user id $eventID is not an integer"));
    }

    // third, convert the id to an integer and ensure its positive
    $newEventID = intval($newEventID);
    if($newEventID <= 0) {
        throw(new RangeException("eventID $newEventID is not positive"));
    }

    //finally, the user id is clean and can be taken out to quarantine
    $this->eventID = $newEventID;
  }

  public function getRouteID() {
      return $this->routeID;
  }
  /**
   * mutator method for routeID
   *
   * @param integer new value of routeID or null if a new object
   * @throws UnexpectedValueException if the routeID is not an integer
   * @throws RangeException if the routeID is not positive
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
        throw(new UnexpectedValueException("user id $routeID is not an integer"));
    }

    // third, convert the id to an integer and ensure its positive
    $newRouteID = intval($newRouteID);
    if($newRouteID <= 0) {
        throw(new RangeException("routeID $newRouteID is not positive"));
    }

    //finally, the user id is clean and can be taken out to quarantine
    $this->routeID = $newRouteID;
  }

  public function getUserID() {
      return $this->userID;
  }
  /**
   * mutator method for userID
   *
   * @param integer new value of userID or null if a new object
   * @throws UnexpectedValueException if the userID is not an integer
   * @throws RangeException if the userID is not positive
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
        throw(new RangeException("userID $newUserID is not positive"));
    }

    //finally, the user id is clean and can be taken out to quarantine
    $this->userID = $newUserID;
  }

  public function getEventDateCreated() {
      return $this->eventDateCreated;
  }
  /**
   * mutator method for eventDateCreated
   * */
  public function setEventDateCreated($newEventDateCreated) {
    // zeroth, allow a null if this is a new object
    if($newEventDateCreated === null) {
        $this->eventDateCreated = null;
        return;
    }

    // first, verify date
    $newEventDateCreated = DateTime::createFromFormat("n/j/y h:i:s a", $newEventDateCreated);
    if($newEventDateCreated === false) {
        throw(new RangeExcaption("Unable to create date from $newEventDateCreated"));
    }

    // finally, comment date created
    $this->eventDateCreated = $newEventDateCreated;
  }

  public function getEventCity() {
      return $this->eventCity;
  }
  public function setEventCity($eventCity) {
      $this->eventCity = $eventCity;
  }

  public function getEventDate() {
      return $this->eventDate;
  }
  public function setEventDate($eventDate) {
      $this->eventDate = $eventDate;
  }

  public function getEventDescription() {
      return $this->eventDescription;
  }
  public function setEventDescription($eventDescription) {
      $this->eventDescription = $eventDescription;
  }

  public function getEventDifficulty() {
      return $this->eventDifficulty;
  }
  public function setEventDifficulty($eventDifficulty) {
      $this->eventDifficulty = $eventDifficulty;
  }

  public function getEventName() {
      return $this->eventName;
  }
  public function setEventName($eventName) {
      $this->eventName = $eventName;
  }

  public function getEventPrivacy() {
      return $this->eventPrivacy;
  }
  public function setEventPrivacy($eventPrivacy) {
      $this->eventPrivacy = $eventPrivacy;
  }

  public function getEventState() {
      return $this->eventState;
  }
  public function setEventState($eventState) {
      $this->eventState = $eventState;
  }

  public function getEventZip() {
      return $this->eventZip;
  }
  public function setEventZip($eventZip) {
      $this->eventZip = $eventZip;
  }

}


?>
