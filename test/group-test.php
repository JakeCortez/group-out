<?php
//first, require the class
require_once("/usr/lib/php5/simpletest/autorun.php");
require_once("../classes/user-login.php");
require_once("../classes/group-class.php");
require_once("/etc/apache2/capstone-mysql/group-out.php");

class GroupTest extends UnitTestCase{
    private $mysqli = null;
    private $user   = null;
    private $group  = null;
    
    private $EMAIL    = "test-user@oranges.net";
    private $PASSWORD = "aliceblue";
    private $SALT     = null;
    private $AUTH     = null;
    private $HASH     = null;
    
    public function setUp(){
        mysqli_report (MYSQLI_REPORT_STRICT);
        $this->mysqli = Pointer::getPointer();
        
        //randomize salt, hash and authentication token
        $this->SALT = bin2hex(openssl_random_pseudo_bytes(32));
        $this->AUTH = bin2hex(openssl_random_pseudo_bytes(16));
        $this->HASH = hash_pbkdf2("sha512", $this->PASSWORD, $this->SALT, 2048, 128);
        
        //create user
        $this->user = new User(null, $this->AUTH, $this->EMAIL, $this->HASH, 1, $this->SALT);
        //insert user
        $this->user->insert($this->mysqli);
    }
    
    public function tearDown(){
        // delete user and group
        if($this->group !== null){
            $this->group->delete($this->mysqli);
            $this->group = null;
        }
        
        if($this->user !== null){
            $this->user->delete($this->mysqli);
        }
    }
    
    public function testInsertNewGroup(){
        //confirm connection to database
        $this->assertNotNull($this->mysqli);
        
        //create group
        $this->group = new Group(null, $this->user->getUserID(), null, "../images/default-avatar.jpg", "Albuquerque", "We are cool", "group-test", 5,"NM",  "87124", 1);
        //insert group
        $this->group->insert($this->mysqli);
        
        //is the group there?
        $this->assertNotNull($this->group->getGroupID());
        $this->assertTrue($this->group->getGroupID() > 0);
        $this->assertNotNull($this->group->getUserID());
        $this->assertTrue($this->group->getUserID() > 0);
        $this->assertNotNull($this->group->getGroupDateCreated());
        $this->assertIdentical($this->group->getGroupAvatar(), "../images/default-avatar.jpg");
        $this->assertIdentical($this->group->getGroupCity(), "Albuquerque");
        $this->assertIdentical($this->group->getGroupDescription(), "We are cool");
        $this->assertIdentical($this->group->getGroupName(), "group-test");
        $this->assertIdentical($this->group->getGroupState(), "NM");
        $this->assertIdentical($this->group->getGroupSkill(), 5);
        $this->assertIdentical($this->group->getGroupZip(), "87124");
        $this->assertIdentical($this->group->getPrivacyLevel(), 1);
    }
    
    public function testUpdateGroup(){
        //confirm connection to database
        $this->assertNotNull($this->mysqli);
        
        //create group
        $this->group = new Group(null, $this->user->getUserID(), null, "../images/default-avatar.jpg", "Albuquerque", "We are cool", "group-test", 5,"NM",  "87124", 1);
        
        //insert group
        $this->group->insert($this->mysqli);
        
        //update group
        $newDescription = "We are the best, around. NOTHING will EVER bring us down";
        $this->group->setGroupDescription($newDescription);
        $this->group->update($this->mysqli);
        
        //did it update?
        $this->assertNotNull($this->group->getGroupID());
        $this->assertTrue($this->group->getGroupID() > 0);
        $this->assertNotNull($this->group->getUserID());
        $this->assertTrue($this->group->getUserID() > 0);
        $this->assertNotNull($this->group->getGroupDateCreated());
        $this->assertIdentical($this->group->getGroupAvatar(), "../images/default-avatar.jpg");
        $this->assertIdentical($this->group->getGroupCity(), "Albuquerque");
        $this->assertIdentical($this->group->getGroupDescription(), $newDescription);
        $this->assertIdentical($this->group->getGroupName(), "group-test");
        $this->assertIdentical($this->group->getGroupState(), "NM");
        $this->assertIdentical($this->group->getGroupSkill(), 5);
        $this->assertIdentical($this->group->getGroupZip(), "87124");
        $this->assertIdentical($this->group->getPrivacyLevel(), 1);
    }
    
    public function testGetGroupByName(){
        //confirm connection to database
        $this->assertNotNull($this->mysqli);
        
        //create group
        $this->group = new Group(null, $this->user->getUserID(), null, "../images/default-avatar.jpg", "Albuquerque", "We are cool", "group-test", 5,"NM",  "87124", 1);
        
        //insert group
        $this->group->insert($this->mysqli);
        
        //search database
        $name = 'group-test';
        Group::getGroupByName($this->mysqli, $name);
        
        //is the group there?
        $this->assertNotNull($this->group->getGroupID());
        $this->assertTrue($this->group->getGroupID() > 0);
        $this->assertNotNull($this->group->getUserID());
        $this->assertTrue($this->group->getUserID() > 0);
        $this->assertNotNull($this->group->getGroupDateCreated());
        $this->assertIdentical($this->group->getGroupAvatar(), "../images/default-avatar.jpg");
        $this->assertIdentical($this->group->getGroupCity(), "Albuquerque");
        $this->assertIdentical($this->group->getGroupDescription(), "We are cool");
        $this->assertIdentical($this->group->getGroupName(), "group-test");
        $this->assertIdentical($this->group->getGroupState(), "NM");
        $this->assertIdentical($this->group->getGroupSkill(), 5);
        $this->assertIdentical($this->group->getGroupZip(), "87124");
        $this->assertIdentical($this->group->getPrivacyLevel(), 1);
    }
}
?>