<?php
// first require the SimpleTest framework
require_once("/usr/lib/php5/simpletest/autorun.php");

// then require the class under scrutiny
require_once("GO-User-Login-Object.php");

//the UserTest is a container for all our tests
class UserTest extends UnitTestCase {
    //variable to hold the mySQL connection
    private $mysqli = null;
    //variable to hold the test database row
    private $userID   = null;
    
    //a few "global" variables for creating test data
    private $EMAIL      = "files@trash.org";
    private $PASSWORD   = "ideletedmyfiles";
    private $AUTH_TOKEN = null;
    private $HASH       = null; 
    private $SALT       = null;
    
    //setUp() is a method run before each test
    //here, we use it to connect to mySQL, calculate the SALT, hash, and authenticationToken
    public function setUp() {
        mysqli_report(MYSQLI_REPORT_STRICT);
        $this->mysqli = new mysqli("localhost", "store_jane", "aliceblue", "store_jane");
        
        // randomize the salt, hash, and authentication Token
        $this->SALT        = bin2hex(openssl_random_pseudo_bytes(32));
        $this->AUTH_TOKEN  = bin2hex(openssl_random_pseudo_bytes(16));
        $this->HASH        = hash_pbkdf2("sha512", $this->PASSWORD, $this->SALT, 2048, 128);
    }
   
    //tearDown() is a method that is run after each test
    //here, we use it to delete the test record and disconnect from mySQL
    public function tearDown() {
        //delete the userID if we can
        if ($this->userID !== null) {
            $this->userID->delete($this->mysqli);
            $this->userID  =  null;
        }
        //disconnect from mySQL
        if($this->mysqli !== null) {
            $this->mysqli->close();
        }
    }
    
    //test creating a new UserID and inserting it into mySQL
    public function testInsertNewUser() {
        //first, verify mySQL connected O.K.
        $this->assertNotNull($this->mysqli);
        
        // second create a userID to post to mySQL
        $this->userID = new UserID(null, $this->EMAIL, $this->HASH, $this->SALT, $this->AUTH_TOKEN);
        
        // third insert the userID to mySQL
        $this->userID->insert($this->mysqli);
        
        //finally, compare the fields -- all the fields
        $this->assertNotNull($this->userID->getUserLoginId());
        $this->assertTrue($this->userID->getUserLoginId() > 0);
        $this->assertIdentical($this->userID->getEmail(),                 $this->EMAIL);
        $this->assertIdentical($this->userID->getPassword(),              $this->HASH);
        $this->assertIdentical($this->userID->getSalt(),                  $this->SALT);
        $this->assertIdentical($this->userID->getAuthenticationToken(),   $this->AUTH_TOKEN);
    }
    
    //test updating a UserID in mySQL
    public function testUpdateUser() {
        //first, verify mySQL connected OI
        $this->assertNotNull($this->mysqli);
        
        //second, create a userID to post to mySQL
        $this->userID = new UserID(null, $this->EMAIL, $this->HASH, $this->SALT, $this->AUTH_TOKEN);
        
        //third, insert the userID to mySQL
        $this->userID->insert($this->mysqli);
        
        //fourth, update the userID and post the changes to mySQL
        $newEmail = "jake@corte.org.mx";
        $this->userID->setEmail($newEmail);
        $this->userID->update($this->mysqli);
        
        //finally, compare the fields -- all the fields
        $this->assertNotNull($this->userID->getUserLoginId());
        $this->assertTrue($this->userID->getUserLoginId() > 0);
        $this->assertIdentical($this->userID->getEmail(),                 $newEmail);
        $this->assertIdentical($this->userID->getPassword(),              $this->HASH);
        $this->assertIdentical($this->userID->getSalt(),                  $this->SALT);
        $this->assertIdentical($this->userID->getAuthenticationToken(),   $this->AUTH_TOKEN);
    }
    
    //test deleting a userID
    public function testDeleteUser(){
        //first, verify mySQL connected OK
        $this->assertNotNull($this->mysqli);
        
        //second, create a userID to post to mySQL
        $this->userID = new UserID(null, $this->EMAIL, $this->HASH, $this->SALT, $this->AUTH_TOKEN);
        
        //third, insert the userID to mySQL
        $this->userID->insert($this->mysqli);
        
        //fourth, verify the userID was inserted
        $this->assertNotNull($this->userID->getUserLoginId());
        $this->assertTrue($this->userID->getUserLoginId() > 0);
        
        //fifth, delete the userID
        $this->userID->delete($this->mysqli);
        $this->userID = null;
        
        //finally, try to get the userID and assert we found nothing...
        $hopefulUserID = UserID::getUserByEmail($this->mysqli, $this->EMAIL);
        $this->assertNull($hopefulUserID);
    }
    
        //test grabbing a userID from mySQL
    public function testGetUserByEmail(){
        
        //first, verify mySQL connected OK
        $this->assertNotNull($this->mysqli);
        
        //second, create a userID to post to mySQL
        $this->userID = new UserID(null, $this->EMAIL, $this->HASH, $this->SALT, $this->AUTH_TOKEN);
        
        //third, insert the userID to mySQL
        $this->userID->insert($this->mysqli);
        
        //fourth, verify the userID was inserted
        $staticUserID = UserID::getUserIDByEmail($this->mysqli, $this->EMAIL);
        
        //finally, compare the fields -- all the fields
        $this->assertNotNull($staticUserID ->getUserLoginId());
        $this->assertTrue($staticUserID ->getUserLoginId() > 0);        
        $this->assertIdentical($staticUserID ->getUserLoginId(),           $this->user->getUserId());
        $this->assertIdentical($staticUserID ->getEmail(),                 $this->EMAIL);
        $this->assertIdentical($staticUserID ->getPassword(),              $this->HASH);
        $this->assertIdentical($staticUserID ->getSalt(),                  $this->SALT);
        $this->assertIdentical($staticUserID ->getAuthenticationToken(),   $this->AUTH_TOKEN);
    }
}
?>