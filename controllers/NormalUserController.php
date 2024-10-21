<?php

include "../classes/NormalUser.php";

class NormalUserController{

    public function getAllUsers(){
        $normalUser = new NormalUser();
        return $normalUser->getAllUsers();
    }

    public function deleteUser($id){
        $normalUser = new NormalUser();
        $normalUser->deleteUser($id);
    }
}

$newNormalUserController = new NormalUserController();

switch($_GET['action']){
    case 'delete':
        $newNormalUserController->deleteUser($_GET['id']);
        // header("Location: ../views/home.php");
        break;
}