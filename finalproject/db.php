<?php
$username = 'root';
$password = '';
$hostname = 'localhost';
$DBName= 'final_project_web';
$conn = new mysqli($hostname, $username, $password, $DBName);
if ($conn->connect_error){
    dio('error in connection'.$conn->error);
}