<?php
session_start();
include "../database/env.php";
$first_name = $_REQUEST["fname"];
$last_name = $_REQUEST["lname"];
$email = $_REQUEST["email"];
$password = $_REQUEST["password"];
$confirm_password = $_REQUEST["confirm_password"];

// VALIDATION
$errors = [];

// NAME ERROR
if(empty($first_name)){
    $errors['fname'] = "Your First Name is missing!!";
}
// EMAIL ERROR
if(empty($email)){
    $errors['email'] = "Your Email is missing!!";
} else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    $errors['email'] = "Your Email is invalid!!";
}
// password ERROR
if(empty($password)){
    $errors['password'] = "Your Password is missing!!";
} else if(strlen($password) < 8){
    $errors['password'] = "Your Password is too short!!";
}

if(empty($confirm_password)){
    $errors['confirm_password'] = "Your Confirm Password is missing!!";
} else if($password != $confirm_password){
    $errors['confirm_password'] = "Your Password & confirm_password did not matched!!";
}

// IF THERE ARE ANY ERRORS RETURN THEM
if(count($errors) > 0){
    $_SESSION["old"] = $_REQUEST;
    $_SESSION['errors'] = $errors;
    header('location: ../backend/register.php');
} else{
    $enc_pass = password_hash($password,PASSWORD_BCRYPT);
    $query = "INSERT INTO users(fname, lname, email, password) VALUES ('$first_name','$last_name','$email','$enc_pass')";
    $result = mysqli_query($db_connect,$query);
    if($result){
        $_SESSION['success'] = "Your account has been created ☺";
        header("location: ../backend/register.php");
    }
}