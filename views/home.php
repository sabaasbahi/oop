<?php
include "../controllers/NormalUserController.php";
$normalUserController = new NormalUserController();
session_start();
if(!isset($_SESSION['logged_in'])){
    header("Location: ../index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Welcome</h1>
    <?=$_SESSION['id'];?>
    <a href="../controllers/AuthController.php?action=logout">Logout</a>
    <br>
    <br>
    <?php
    if(isset($_GET['msg'])){
        echo $_GET['msg'];
    }
    ?>
    <br>
    <br>
    <?php
    
    $users = $normalUserController->getAllUsers();

    foreach($users as $user){
        echo $user['id']." ".$user['email']." <a href='../controllers/NormalUserController.php?action=delete&id=".$user['id']."'>Delete</a><br>";
    }
    
    ?>
</body>
</html>