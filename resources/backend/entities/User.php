<?php
    require_once("Database.php");
    class User implements JsonSerializable{
        private $user_id;
        private $first_name;
        private $last_name;
        private $address1;
        private $address2;
        private $city;
        private $state;
        private $zip;
        private $username;
        private $password;
        private $user_group;
        private $email;
    
        public function __construct($user_id,$first_name,$last_name,$address1,$address2,$city,$state,$zip,$username,$password,$user_group,$email){
            $this->user_id=addslashes($user_id);
            $this->first_name=addslashes($first_name);
            $this->last_name=addslashes($last_name);
            $this->address1=addslashes($address1);
            $this->address2=addslashes($address2);
            $this->city=addslashes($city);
            $this->state=addslashes($state);
            $this->zip=addslashes($zip);
            $this->username=addslashes($username);
            $this->password=$password;
            $this->user_group=addslashes($user_group);
            $this->email=addslashes($email);
        }
        
        public function getUser_Group(){
            return $this->user_group;
        }
        
        public function getFirst_Name(){
            return $this->first_name;
        }
        
        public function jsonSerialize() {
            return ["user_id" => $this->user_id,"first_name"=>$this->first_name, "last_name"=>$this->last_name, 
            "address1"=>$this->address1,"address2"=>$this->address2, "city"=>$this->city,"state"=>$this->state,
            "zip"=>$this->zip, "username" => $this->username, "password"=>$this->password, "user_group"=>$this->user_group,
            "email"=>$this->email];
        }
        
        public static function getUserById($user_id){
            $result=Database::executeSelectStatement("User not found","select * from user where user_id = :id",[":id"=>$user_id]);
            return new User($result[0]->user_id,$result[0]->first_name,$result[0]->last_name,$result[0]->address1,$result[0]->address2,
            $result[0]->city,$result[0]->state,$result[0]->zip,$result[0]->username,$result[0]->password,$result[0]->user_group,
            $result[0]->email);
        }
        
        public static function getUser($username,$password){
            $result=Database::executeSelectStatement("User not found","select * from user where username = :username and password = :password",
            [":username"=>$username,":password"=>sha1($password)]);
            if($result!=null)
                    return new User($result[0]->user_id,$result[0]->first_name,$result[0]->last_name,$result[0]->address1,$result[0]->address2,
                    $result[0]->city,$result[0]->state,$result[0]->zip,$result[0]->username,$result[0]->password,$result[0]->user_group,
                    $result[0]->email);
                else 
                    return null;
        }
        
        public static function deleteUserWhenIdGiven($user_id){
            return Database::executeNonSelectStatement("User cannot be deleted","delete from user where user_id= :user_id",["user_id"=>$user_id]);
        }
        
        public function save(){
            Database::executeNonSelectStatement("User not saved","insert into user (first_name,last_name,address1,address2,city,state,zip
            ,username,password,user_group,email) values('{$this->first_name}','{$this->last_name}','{$this->address1}','{$this->address2}'
            ,'{$this->city}','{$this->state}','{$this->zip}','{$this->username}','{$this->password}','{$this->user_group}','{$this->email}')");
        }
    
}
?>