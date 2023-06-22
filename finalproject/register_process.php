<?php
include_once 'db.php';
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$userType = $_POST['user_type'];


if (empty($name) || empty($email) || empty($password) || empty($userType)) {
    
    header("Location: register.php?error=emptyfields");
    exit();
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    
    header("Location: register.php?error=invalidemail");
    exit();
}



$sql = 'insert into users (name,email,password,is_admin) values("'.$name.'","'.$email.'","'.$password.'","'.$userType.'")';



if ($conn->query($sql) === true) {
    
    header("Location: login.php?registration=success");
    exit();
} else {
    header("Location: register.php?error=databaseerror");
    exit();
}
?>