<?php
// first require the SimpleTest framework
require_once("/usr/lib/php5/simpletest/autorun.php");

// then require the class under scrutiny
require_once("../classes/user-login.php");

//connection to server
require_once("/etc/apache2/capstone-mysql/group-out.php");

//the UserTest is a container for all our tests
class UserTest extends UnitTestCase {
    //variable to hold the mySQL connection
    private $mysqli = null;
    //variable to hold the test database row
    private $user  = null;
    
    //a few "global" variables for creating test data
    private $EMAIL    = "files@trash.org";
    private $PASSWORD = "ideletedmyfiles";
    private $AUTH     = null;
    private $USER     = null;
    private $HASH     = null;
    private $SALT     = null;
    
    //setUp() is a method run before each test
    //here, we use it to connect to mySQL, calculate the SALT, hash, and authenticationToken
    public function setUp() {
        mysqli_report(MYSQLI_REPORT_STRICT);
        $this->mysqli = Pointer::getPointer();
        
        // randomize the salt, hash, and authentication Token
        $this->SALT = bin2hex(openssl_random_pseudo_bytes(32));
        $this->AUTH = bin2hex(openssl_random_pseudo_bytes(16));
        $this->HASH = hash_pbkdf2("sha512", $this->PASSWORD, $this->SALT, 2048, 128);
    }
   
    //tearDown() is a method that is run after each test
    //here, we use it to delete the test record and disconnect from mySQL
    public function tearDown() {
        //delete the userID if we can
        if ($this->user !== null) {
            $this->user->delete($this->mysqli);
            $this->user  =  null;
        }
    }
    
    //test creating a new UserID and inserting it into mySQL
    public function testInsertNewUser() {
        //first, verify mySQL connected O.K.
        $this->assertNotNull($this->mysqli);
        
        // second create a userID to post to mySQL
        $this->user = new User(null, $this->AUTH, $this->EMAIL, $this->HASH, 1, $this->SALT);
        
        // third insert the userID to mySQL
        $this->user->insert($this->mysqli);
        
        //finally, compare the fields -- all the fields
        $this->assertNotNull($this->user->getUserID());
        $this->assertTrue($this->user->getUserID() > 0);
        $this->assertIdentical($this->user->getUserEmail(),                 $this->EMAIL);
        $this->assertIdentical($this->user->getUserPassword(),              $this->HASH);
        $this->assertIdentical($this->user->getUserSalt(),                  $this->SALT);
        $this->assertNull($this->user->getUserAuthToken());
    }
    
    //test updating a UserID in mySQL
    public function testUpdateUser() {
        //first, verify mySQL connected OI
        $this->assertNotNull($this->mysqli);
        
        //second, create a userID to post to mySQL
        $this->user = new User(null, $this->AUTH, $this->EMAIL, $this->HASH, 1, $this->SALT);
        
        //third, insert the userID to mySQL
        $this->user->insert($this->mysqli);
        
        //fourth, update the userID and post the changes to mySQL
        $newEmail = "jake@corte.org.mx";
        $this->user->setUserEmail($newEmail);
        $this->user->update($this->mysqli);
        
        //finally, compare the fields -- all the fields
        $this->assertNotNull($this->user->getUserID());
        $this->assertTrue($this->user->getUserID() > 0);
        $this->assertIdentical($this->user->getUserEmail(),                 $newEmail);
        $this->assertIdentical($this->user->getUserPassword(),              $this->HASH);
        $this->assertIdentical($this->user->getUserSalt(),                  $this->SALT);
        $this->assertNull($this->user->getUserAuthToken());
    }
    
    //test deleting a userID
    public function testDeleteUser(){
        //first, verify mySQL connected OK
        $this->assertNotNull($this->mysqli);
        
        //second, create a userID to post to mySQL
        $this->user = new User(null, $this->AUTH, $this->EMAIL, $this->HASH, 1, $this->SALT);
        
        //third, insert the userID to mySQL
        $this->user->insert($this->mysqli);
        
        //fourth, verify the userID was inserted
        $this->assertNotNull($this->user->getUserID());
        $this->assertTrue($this->user->getUserID() > 0);
        
        //fifth, delete the userID
        $this->user->delete($this->mysqli);
        $this->user = null;
        
        //finally, try to get the userID and assert we found nothing...
        $hopefulUserID = User::getUserByEmail($this->mysqli, $this->EMAIL);
        $this->assertNull($hopefulUserID);
    }
    
        //test grabbing a userID from mySQL
    public function testGetUserByEmail(){
        
        //first, verify mySQL connected OK
        $this->assertNotNull($this->mysqli);
        
        //second, create a userID to post to mySQL
        $this->user = new User(null, $this->AUTH, $this->EMAIL, $this->HASH, 1, $this->SALT);
        
        //third, insert the userID to mySQL
        $this->user->insert($this->mysqli);
        
        //fourth, verify the userID was inserted
        $staticUserID = User::getUserByEmail($this->mysqli, $this->EMAIL);
        
        //finally, compare the fields -- all the fields
        $this->assertNotNull($staticUserID ->getUserID());
        $this->assertTrue($staticUserID ->getUserID() > 0);        
        $this->assertIdentical($staticUserID ->getUserID(),           $this->user->getUserId());
        $this->assertIdentical($staticUserID ->getUserEmail(),                 $this->EMAIL);
        $this->assertIdentical($staticUserID ->getUserPassword(),              $this->HASH);
        $this->assertIdentical($staticUserID ->getUserSalt(),                  $this->SALT);
        $this->assertNull($staticUserID ->getUserAuthToken());
}
?>