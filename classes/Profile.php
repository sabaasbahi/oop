<?php

class Profile{

    private $id;
    private User $user_id;
    private $age;
    private $phone_number;
    private DB $db;


    public function __construct($id, User $user_id, $age, $phone_number,){
        $this->id = $id;
        $this->user_id = $user_id;
        $this->age = $age;
        $this->phone_number = $phone_number;
        $this->db = new DB();
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getUserId(){
        return $this->user_id;
    }

    public function setUserId($user_id){
        $this->user_id = $user_id;
    }

    public function getAge(){
        return $this->age;
    }

    public function setAge($age){
        $this->age = $age;
    }

    public function getPhoneNumber(){
        return $this->phone_number;
    }

    public function setPhoneNumber($phone_number){
        $this->phone_number = $phone_number;
    }

    public function save(){

        $id = $this->user_id->getId();

        $result = $this->db->getConnection()->query("INSERT INTO profile (user_id, age, phone_number) VALUES ('$id', '$this->age', '$this->phone_number')");
        
        if($result){
            echo "Profile Saved";
        }else{
            echo "Error in Profile Saving ".$this->db->getErrors();
        }
    }
}