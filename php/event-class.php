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
   * foreign key, originates from UserProfiles
   */
  private $userID;
  /**
   * TIMESTAMP, auto inserted upon creating an event
   */
  private $eventDateCreated;
  /**
   *
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
