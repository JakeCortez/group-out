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
         * Primary key
         **/
        private $groupMembers;
        
        /**
         * Foreign Key for groupId
         **/
        private $groupId;
        
        /**
         * Foreign Key for UserId
         **/
        private $userId;
        
        /**
         * constructor for group members
         *
         * @param array for group members
         * @param integer for groupId
         * @param integer for userId
         * @throws UnexpectedValueException if fails to construct group
         * @throws RangeException if fails to construct group
         **/
        public function __construct($groupMembers, $groupId, $userId){
            
        }
    }
?>