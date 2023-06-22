<?php

include_once 'db.php';
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';


if (empty($name) || empty($email) || empty($password)) {
    
    header("Location: login.php?error=emptyfields");
    exit();
}






$stmtLogin = $conn->prepare("SELECT id, name, password, is_admin FROM users WHERE email = ?");
$stmtLogin->bind_param("s", $email);

$stmtLogin->execute();


$result = $stmtLogin->get_result();


if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();
    $storedPassword = $row['password'];
    
    
    if ($password == $storedPassword) {
        
        session_start();
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['user_name'] = $row['name'];
        $_SESSION['user_type'] = $row['is_admin'];

       
        if ($row['is_admin'] == 1) {
            header("Location: admin.php");
            exit();
        } else {
            header("Location: user.php");
            exit();
        }
    } else {
        
        header("Location: login.php?error=invalidpassword");
        exit();
    }
} else {
   
    header("Location: login.php?error=usernotfound");
    exit();
}





?>

