<?php
/**
 * class containing events and users that have joined them (called members)
 *
 * @see Event class
 * @author Jim Wittwer <wittwerjim@hotmail.com>
 **/

class EventMember {

// PROPERTIES
  /**
   * primary key, integer, auto inserted upon creating an event
   */
  private $eventID;
  /**
   * foreign key, originates from the UserProfile
   */
  private $userID;


// eventID ACCESSOR AND MUTATOR
  /**
   * accessor method for eventID
   *
   * @return integer value of eventID
   */
  public function getEventID() {
      return $this->eventID;
  }
  /**
   * mutator method for eventID
   *
   * @param integer new value of eventID
   * @throws UnexpectedValueException if the eventID is not an integer
   * @throws RangeException if the eventID is not positive
   */
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
      throw(new UnexpectedValueException("eventID $newEventID is not an integer"));
    }

    // third, convert the eventID to an integer and ensure it's positive
    $newEventID = intval($newEventID);
    if($newEventID <= 0) {
      throw(new RangeException("eventID $newEventID is not positive"));
    }

    // finally, the eventID is clean and can be set
    $this->eventID = $eventID;
  }

// userID ACCESSOR AND MUTATOR
  /**
   * accessor method for userID
   *
   * @return integer value of userID
   */
  public function getUserID() {
      return $this->userID;
  }
  /**
   * mutator method for userID
   *
   * @param integer new value of userID
   * @throws UnexpectedValueException if the userID is not an integer
   * @throws RangeException if the userID is not positive
   */
  public function setUserID($newuserID) {
    // zeroth, allow a null if this is a new object
    if($newUserID === null) {
      $this->userID = null;
      return;
    }

    // first, trim the input of excess whitespace
    $newUserID = trim($newUserID);

    // second, verify this is an integer
    if((filter_var($newUserID, FILTER_VALIDATE_INT)) === false) {
      throw(new UnexpectedValueException("userID $newUserID is not an integer"));
    }

    // third, convert the userID to an integer and ensure it's positive
    $newUserID = intval($newUserID);
    if($newUserID <= 0) {
      throw(new RangeException("userID $newUserID is not positive"));
    }

    // finally, the userID is clean and can be set
    $this->userID = $userID;
  }

  public function getUserID() {
    return $this->userID;
  }

// END CLASS
}


?>
