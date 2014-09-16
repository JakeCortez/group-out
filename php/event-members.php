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
   * @var primary key, integer, auto inserted upon creating an event
   */
  private $eventID;
  /**
   * @var foriegn key, originates from the UserProfile
   */
  private $userID;

// ACCESSORS

  public function setEventID($eventID) {
      $this->eventID = $eventID;
  }
  public function getEventID() {
      return $this->eventID;
  }

  public function setUserID($userID) {
      $this->userID = $userID;
  }
  public function getUserID() {
      return $this->userID;
  }

}


?>
