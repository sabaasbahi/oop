<?php

include "../classes/DB.php";

abstract class User{

    protected $id;
    protected $name;
    protected $email;
    protected $password;
    protected $is_active;
    protected $is_deleted;
    protected DB $db;

    public function __construct(){
        $this->db = new DB();
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function getPassword(){
        return $this->password;
    }

    public function setPassword($password){
        $this->password = $password;
    }

    public function getIsActive(){
        return $this->is_active;
    }

    public function setIsActive($is_active){
        $this->is_active = $is_active;
    }

    public function getIsDeleted(){
        return $this->is_deleted;
    }

    public function setIsDeleted($is_deleted){
        $this->is_deleted = $is_deleted;
    }

    abstract public function login();

    abstract public function logout();

    abstract public function register();

}