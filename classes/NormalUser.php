<?php
session_start();

include "abstract/User.php";

class NormalUser extends User{

    public function login(){
        if(empty($this->email) || empty($this->password)){
            header("Location: ../index.php?error=Email and Password are required");
            return;
        }else{
            $result = $this->db->getConnection()->query("SELECT * FROM users WHERE email = '$this->email' AND password = '$this->password'");
            
            if($result->num_rows > 0){
                // var_dump($result->fetch_assoc()['id']);
                $_SESSION['id'] = $result->fetch_assoc()['id'];
                $_SESSION['logged_in'] = true;
                header("Location: ../views/home.php");
            }else{
                header("Location: ../index.php?error=Invalid Email or Password");
            }
        }
    }

    public function logout(){
        session_destroy();
        header("Location: ../index.php");
    }

    public function register(){
        if(empty($this->name) || empty($this->email) || empty($this->password)){
            echo "Name, Email and Password are required";
            return;
        }else{
            
            $result = $this->db->getConnection()->query("INSERT INTO users (name, email, password) VALUES ('$this->name', '$this->email', '$this->password')");
            
            if($result){
                // $this->setId($this->db->getConnection()->insert_id);
                header("Location: ../index.php?msg=Registration Successful. Please Login.");
            }else{
                header("Location: ../views/register.php?error=Registration Failed");
            }
        }
    }

    public function getAllUsers(){
        $result = $this->db->getConnection()->query("SELECT * FROM users");
        $users = [];
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $users[] = $row;
            }
        }
        return $users;
    }

    public function deleteUser($id){
        $result = $this->db->getConnection()->query("DELETE FROM users WHERE id = $id");
        if($result){
            header("Location: ../views/home.php?msg=User Deleted Successfully");
        }else{
            header("Location: ../views/home.php?error=Failed to delete user");
        }
    }
}