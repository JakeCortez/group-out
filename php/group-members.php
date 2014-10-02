<?php
    /**
     * This class intersects the group and user classes and finds users in group
     *
     * This holds no information
     *
     * @author Jake Cortez <jcortez96@hotmail.com>
     **/
    class GroupMembers{
        /**
         * Foreign Key for groupId
         **/
        private $groupID;
        
        /**
         * Foreign Key for UserId
         **/
        private $userID;
        
        /**
         * constructor for group members
         *
         * @param array for group members
         * @param integer for groupId
         * @param integer for userId
         * @throws UnexpectedValueException if fails to construct group
         * @throws RangeException if fails to construct group
         **/
        public function __construct($newGroupID, $newUserID){
            try{
                $this->setGroupID($newGroupID);
                $this->setUserID($newUserID);
            } catch(UnexpectedValueException $error) {
                throw(new UnexpectedValueException("Unable to get number of users in group.", 0, $error));
            } catch(RangeException $error) {
                throw(new RangeException("Unable to get number of users in group", 0, $error));
            }
        }
    }
?>