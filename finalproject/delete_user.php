<?php

include_once 'db.php';

session_start();

$userId = $_GET['id'];







$statmentDeleteUser = $conn->prepare("DELETE FROM users WHERE id = ?");
$statmentDeleteUser->bind_param("i", $userId);


if ($statmentDeleteUser->execute()) {

    if($_SESSION['user_type'] == 1){
        header("Location:  admin.php");
        exit();
    }
    else {
        header("Location:  login.php");
        exit(); 
    }
    
}
else {
    if($_SESSION['user_type'] == 1){
        header("Location:  admin.php?error=deleteerror");
        exit();
    }
    else {
        header("Location: user.php?error=deleteerror");
        exit(); 
    }
}
