<?php
// first require the SimpleTest framework
require_once("/usr/lib/php5/simpletest/autorun.php");

// then require the function under scrutiny
require_once("../php/event-class.php");
require_once("../php/user-login.php");
require_once("../php/....php");

//require mySQL configureation
require_once("/etc/apache2/capstone-mysql/group-out.php");

// the UserTest is a container for all of our tests
class EventTest extends UnitTestCase {
    //variable to to hold the mySQL connection
    private $mysqli = null;
    
    //variable to hold the test database row
    private $user = null;
    
        //variable to hold the test database row
    private $route = null;
    
    //variable to hold the test database row
    private $event = null;
    
    //a few "global" variables for creating test data
    private $EMAIL             = "files@trash.org";
    private $PASSWORD          = "ideletedmyfiles";
    private $SALT              = null;
    private $AUTH_TOKEN        = null;
    private $HASH              = null;
    private $EVENTDATECREATED  = "2014-08-17 16:38:04";
    private $EVENTCITY         = "Albuquerque";
    private $EVENTDATE         = "2014-10-02 12:45:10";
    private $EVENTDESCRIPTION  = "cool, and awesome!";
    private $EVENTDIFFICULTY   = "5";
    private $EVENTNAME         = "Beerfest";
    private $EVENTPRIVACY      = "0";
    private $EVENTSTATE        = "New Mexico";
    private $EVENTZIP          = "87106";
    private $EVENTACTIVITYLIST = "Shooting, pie eating contest, chainsaw juggling.";

    //setUp() is a method that is run befor each test
    //here, we use it to connect to mySQL and to calculate the salt, hash, and authenticationToken
    public function setUp() {
        //connect to mySQL
        mysqli_report(MYSQLI_REPORT_STRICT);
        $this->mysqli = Pointer::getPointer();
        
        //randomize the salt, hash, and authentication token
        $this->SALT       = bin2hex(openssl_random_pseudo_bytes(32));
        $this->AUTH_TOKEN = bin2hex(openssl_random_pseudo_bytes(16));
        $this->HASH       = hash_pbkdf2("sha512", $this->PASSWORD, $this->SALT, 2048, 128);
        
        //create user
        $this->user = new User(null, $this->AUTH_TOKEN, $this->EMAIL, $this->HASH, 1, $this->SALT);
        
        //insert user
        $this->user->insert($this->mysqli);
        
        //create route
        $this->route = new Route(null, $this->user->getUserID, null, "a", "b", 3, 0, "c", "e");
        
        //insert route
        $this->route->insert($this->mysqli);
    }
    
    //tearDown() is a method that is run after each test
    //here, we use it to delete the test record and dissconnect from mySQL
    public function tearDown() {
        //delete the event if we can
        if($this->event !== null) {
            $this->event->delete($this->mysqli);
            $this->event = null;
        }
        
        //delete route
        //delete the event if we can
        if($this->route !== null) {
            $this->route->delete($this->mysqli);
            $this->route = null;
        
        
        //delete user
        //delete the event if we can
        if($this->user !== null) {
            $this->user->delete($this->mysqli);
            $this->user = null;
        }
    }
    
    //test creating a new Event and insert it to mySQL
    public function testInsertNewEvent() {
        //first, verify mySQL connected OK
        $this->assertNotNull($this->mysqli);
        
        //second, create a user to post to mySQL
        $this->event = new Event(null, $this->EVENTDATECREATED, $this->EVENTCITY, $this->EVENTDATE, $this->EVENTDESCRIPTION, $this->EVENTDIFFICULTY, $this->EVENTNAME, $this->EVENTPRIVACY, $this->EVENTSTATE, $this->EVENTZIP, $this->EVENTACTIVITYLIST);
        
        //third, insert the user to mySQL
        $this->event->insert($this->mysqli);
        
        //finaly, compare the fields
        $this->assertNotNull  ($this->event->getEventId());
        $this->assertTrue     ($this->event->getEventId() > 0);
        $this->assertIdentical($this->event->getEventDateCreated(),  $this->EVENTDATECREATED);
        $this->assertIdentical($this->event->getEventCity(),         $this->EVENTCITY);
        $this->assertIdentical($this->event->getEventDate(),         $this->EVENTDATE);
        $this->assertIdentical($this->event->getEventDescription(),  $this->EVENTDESCRIPTION);
        $this->assertIdentical($this->event->getEventDifficulty(),   $this->EVENTDIFFICULTY);
        $this->assertIdentical($this->event->getEventName(),         $this->EVENTNAME);
        $this->assertIdentical($this->event->getEventPrivacy(),      $this->EVENTPRIVACY);
        $this->assertIdentical($this->event->getEventState(),        $this->EVENTSTATE);
        $this->assertIdentical($this->event->getEventZip(),          $this->EVENTZIP);
        $this->assertIdentical($this->event->getEventActivityList(), $this->EVENTACTIVITYLIST);
    }
    
    //test updating an event in mySQL
    public function testUpdateEvent() {
        //first, verify mySQL connected OK
        $this->assertNotNull($this->mysqli);
        
        //second, create an event to post to mySQL
        $this->event = new Event(null, $this->EVENTDATECREATED, $this->EVENTCITY, $this->EVENTDATE, $this->EVENTDESCRIPTION, $this->EVENTDIFFICULTY, $this->EVENTNAME, $this->EVENTPRIVACY, $this->EVENTSTATE, $this->EVENTZIP, $this->EVENTACTIVITYLIST);
        
        //third, insert the event to mySQL
        $this->event->insert($this->mysqli);
        
        //fourth, update the event and post the changes
        $newEmail = "jake@cortez.org.mx";
        $this->event->setEmail("$newEmail");
        $this->event->update($this->mysqli);
        
        //finaly, compare the fields
        $this->assertNotNull  ($this->event->getEventId());
        $this->assertTrue     ($this->event->getEventId() > 0);
        $this->assertIdentical($this->event->getEventDateCreated(),  $this->EVENTDATECREATED);
        $this->assertIdentical($this->event->getEventCity(),         $this->EVENTCITY);
        $this->assertIdentical($this->event->getEventDate(),         $this->EVENTDATE);
        $this->assertIdentical($this->event->getEventDescription(),  $this->EVENTDESCRIPTION);
        $this->assertIdentical($this->event->getEventDifficulty(),   $this->EVENTDIFFICULTY);
        $this->assertIdentical($this->event->getEventName(),         $this->EVENTNAME);
        $this->assertIdentical($this->event->getEventPrivacy(),      $this->EVENTPRIVACY);
        $this->assertIdentical($this->event->getEventState(),        $this->EVENTSTATE);
        $this->assertIdentical($this->event->getEventZip(),          $this->EVENTZIP);
        $this->assertIdentical($this->event->getEventActivityList(), $this->EVENTACTIVITYLIST);
    }
    
    //test deleting an event in mySQL
    public function testDeleteUser() {
        //first, verify mySQL connected OK
        $this->assertNotNull($this->mysqli);
        
        //second, create an event to post to mySQL
        $this->event = new Event(null, $this->EVENTDATECREATED, $this->EVENTCITY, $this->EVENTDATE, $this->EVENTDESCRIPTION, $this->EVENTDIFFICULTY, $this->EVENTNAME, $this->EVENTPRIVACY, $this->EVENTSTATE, $this->EVENTZIP, $this->EVENTACTIVITYLIST);
        
        //third, insert the event to mySQL
        $this->event->insert($this->mysqli);
        
        //fourth, verify the event was inserted
        $this->assertNotNull($this->event->getEventId());
        $this->assertTrue($this->event->getEventId() > 0);
        
        //fifth, delete the event
        $this->event->delete( $this->mysqli);
        $this->event = null;
        
        //finally, try to get the event and assert we didn't get a thing
        $hopefulEvent = Event::getEventByEmail( $this->mysqli,  $this->EMAIL);
        $this->assertNull($hopefulEvent);
    }
    
    //test grabbing a event from mySQL
    public function testGetEventByEmail() {
        //first, verify mySQL connected OK
        $this->assertNotNull($this->mysqli);
        
        //second, create a event to post to mySQL
        $this->event = new Event(null, $this->EVENTDATECREATED, $this->EVENTCITY, $this->EVENTDATE, $this->EVENTDESCRIPTION, $this->EVENTDIFFICULTY, $this->EVENTNAME, $this->EVENTPRIVACY, $this->EVENTSTATE, $this->EVENTZIP, $this->EVENTACTIVITYLIST);
        
        //third, insert the event to mySQL
        $this->event->insert($this->mysqli);
        
        //fourth, the event using the static method
        $staticUser = Event::getEventByEmail($this->mysqli, $this->EMAIL);
        
        //finally, try to get the user and assert we didn't get a thing
        $this->assertNotNull  ($this->event->getEventId());
        $this->assertTrue     ($this->event->getEventId() > 0);
        $this->assertIdentical($this->event->getEventDateCreated(),  $this->EVENTDATECREATED);
        $this->assertIdentical($this->event->getEventCity(),         $this->EVENTCITY);
        $this->assertIdentical($this->event->getEventDate(),         $this->EVENTDATE);
        $this->assertIdentical($this->event->getEventDescription(),  $this->EVENTDESCRIPTION);
        $this->assertIdentical($this->event->getEventDifficulty(),   $this->EVENTDIFFICULTY);
        $this->assertIdentical($this->event->getEventName(),         $this->EVENTNAME);
        $this->assertIdentical($this->event->getEventPrivacy(),      $this->EVENTPRIVACY);
        $this->assertIdentical($this->event->getEventState(),        $this->EVENTSTATE);
        $this->assertIdentical($this->event->getEventZip(),          $this->EVENTZIP);
        $this->assertIdentical($this->event->getEventActivityList(), $this->EVENTACTIVITYLIST);
    }
}   
?>