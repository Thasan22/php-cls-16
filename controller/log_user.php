<?php
session_start();
include_once "../database/env.php";

$email = $_REQUEST["email"];
$password = $_REQUEST["password"];

// VALIDATION
$errors = [];


// EMAIL & PASSWORD CHECK
$query = "SELECT * FROM users WHERE email = '$email'";
$res = mysqli_query($db_connect,$query);
if(empty($email)){
    $errors['email'] = "Email is required";
}else if($res->num_rows == 0){
    $errors['email'] = "Email Address is incorrect";
}

if(empty($password)){
    $errors['password'] = "Password is required";
}else{
    $db_user = mysqli_fetch_assoc($res); 
    $right_pass = password_verify($password,$db_user['password']);

    if(!$right_pass){
        $errors['password'] = "Password is incorrect";
    }else{
        // redirect to dashboard

        $_SESSION['auth'] = $db_user;

        header("location: ../backend/dashboard.php");
    }
}

// IF ERRORS FOUND
if(count($errors) > 0){
    $_SESSION['errors'] = $errors;
    header('location: ../backend/login.php');
}