<?php
session_start();
include "../database/env.php";
$first_name = $_REQUEST["fname"];
$last_name = $_REQUEST["lname"];
$email = $_REQUEST["email"];
$profile_img = $_FILES["profile_img"];
$extention = null;
if($profile_img['size'] > 0){
    $extention = pathinfo($profile_img['name'])['extension'];
}

$accept = ['jpg', 'png'];
$user_id = $_SESSION['auth']['id'];

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

// PROFILE VALIDATION
// if($profile_img['size'] == 0){
//     $errors['profile_img'] = "Please select an image";
// }else if(!in_array($extention,$accept)){
//     $errors['profile_img'] = "Please select a jpg or png image";
// }

// IF THERE ARE ANY ERRORS RETURN THEM
if(count($errors) > 0){
    $_SESSION['errors'] = $errors;
    header('location: ../backend/profile.php');
} else{
    $path = "../uploads";
    if(!file_exists($path)){
        mkdir($path);
    }

    // FILE UPLOAD    
    
    if($profile_img['size'] > 0){

        // PREV IMAGE
        $prev_img = $path . '/' . $_SESSION['auth']['profile_img'];
        if(file_exists($prev_img)){
            unlink($prev_img);
        }

        $file_name = "user-". uniqid().".$extention";
        $uploded = move_uploaded_file($profile_img['tmp_name'],$path."/$file_name");
        $query = "UPDATE users SET fname='$first_name',lname='$last_name',email='$email',profile_pic='$file_name' WHERE id = '$user_id'";
        $res = mysqli_query($db_connect,$query);
    } else{
        $query = "UPDATE users SET fname='$first_name',lname='$last_name',email='$email' WHERE id = '$user_id'";
        $res = mysqli_query($db_connect,$query);
    }

    if($res){
        $_SESSION['auth']['fname'] = $first_name;
        $_SESSION['auth']['lname'] = $last_name;
        $_SESSION['auth']['email'] = $email;

        if($profile_img['size'] > 0){
            $_SESSION['auth']['profile_img'] = $file_name;
        }

        header("location: ../backend/profile.php");
    }
}
