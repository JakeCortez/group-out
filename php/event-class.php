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
  public function setEventID($eventID) {
      $this->eventID = $eventID;
  }

  public function getRouteID() {
      return $this->routeID;
  }
  public function setRouteID($routeID) {
      $this->routeID = $routeID;
  }

  public function getUserID() {
      return $this->userID;
  }
  public function setUserID($userID) {
      $this->userID = $userID;
  }

  public function getEventDateCreated() {
      return $this->eventDateCreated;
  }
  public function setEventDateCreated($eventDateCreated) {
      $this->eventDateCreated = $eventDateCreated;
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
