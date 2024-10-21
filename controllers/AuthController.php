<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include "../classes/NormalUser.php";

class AuthController{

    public function login(){
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])){
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = new NormalUser();
            $user->setEmail($email);
            $user->setPassword($password);
            $user->login();
        }else{
            echo "Invalid Request";
        }
    }

    public function logout(){
        $user = new NormalUser();
        $user->logout();
    }

    public function register(){
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = new NormalUser();
            $user->setName($name);
            $user->setEmail($email);
            $user->setPassword($password);
            $user->register();
        }else{
            echo "Invalid Request";
        }
    }

}

$auth = new AuthController();

switch($_GET['action']){
    case 'login':
        $auth->login();
        break;
    case 'logout':
        $auth->logout();
        break;
    case 'register':
        $auth->register();
        break;
    default:
        echo "Operation not allowed";
}