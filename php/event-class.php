<?php

class Event {

// PROPERTIES

  /**
   * @var primary key, integer, auto inserted upon creating an event
   */
  private $eventID;
  /**
   * @var foriegn key, originates from Routes
   */
  private $routeID;
  /**
   * @var foriegn key, originates from UserProfiles
   */
  private $userID;
  /**
   * @var TIMESTAMP, auto inserted upon creating an event
   */
  private $eventDateCreated;
  /**
   * @var
   */
  private $eventCity;
  /**
   *
   */
  private $eventDate;
  /**
   *
   */
  private $eventDescription;
  /**
   *
   */
  private $eventDifficulty;
  /**
   *
   */
  private $eventName;
  /**
   *
   */
  private $eventPrivacy;
  /**
   *
   */
  private $eventState;
  /**
   *
   */
  private $eventZip;

// ACCESSORS

  public function setEventID($eventID) {
      $this->eventID = $eventID;
  }
  public function getEventID() {
      return $this->eventID;
  }

  public function setRouteID($routeID) {
      $this->routeID = $routeID;
  }
  public function getRouteID() {
      return $this->routeID;
  }

  public function setUserID($userID) {
      $this->userID = $userID;
  }
  public function getUserID() {
      return $this->userID;
  }

  public function setEventDateCreated($eventDateCreated) {
      $this->eventDateCreated = $eventDateCreated;
  }
  public function getEventDateCreated() {
      return $this->eventDateCreated;
  }

  public function setEventCity($eventCity) {
      $this->eventCity = $eventCity;
  }
  public function getEventCity() {
      return $this->eventCity;
  }

  public function setEventDate($eventDate) {
      $this->eventDate = $eventDate;
  }
  public function getEventDate() {
      return $this->eventDate;
  }

  public function setEventDescription($eventDescription) {
      $this->eventDescription = $eventDescription;
  }
  public function getEventDescription() {
      return $this->eventDescription;
  }

  public function setEventDifficulty($eventDifficulty) {
      $this->eventDifficulty = $eventDifficulty;
  }
  public function getEventDifficulty() {
      return $this->eventDifficulty;
  }

  public function setEventName($eventName) {
      $this->eventName = $eventName;
  }
  public function getEventName() {
      return $this->eventName;
  }

  public function setEventPrivacy($eventPrivacy) {
      $this->eventPrivacy = $eventPrivacy;
  }
  public function getEventPrivacy() {
      return $this->eventPrivacy;
  }

  public function setEventState($eventState) {
      $this->eventState = $eventState;
  }
  public function getEventState() {
      return $this->eventState;
  }

  public function setEventZip($eventZip) {
      $this->eventZip = $eventZip;
  }
  public function getEventZip() {
      return $this->eventZip;
  }

}


?>
