<?php
session_start();
include "../database/env.php";
$old_pass = $_REQUEST["old_pass"];
$new_pass = $_REQUEST["new_pass"];
$confirm_pass = $_REQUEST["confirm_pass"];
$db_pass = $_SESSION['auth']['password'];
$user_id = $_SESSION['auth']['id'];

// VALIDATION
$errors = [];

if(!password_verify($old_pass,$db_pass)){
    $errors['old_pass'] = "Your password is incorrect";
}else{
    if(empty($new_pass)){
        $errors['new_pass'] = "New password required";
    }else if($new_pass != $confirm_pass){
        $errors['confirm_pass'] = "New and Confirm password did not matched";
    }
}

// IF THERE ARE ANY ERRORS RETURN THEM
if(count($errors) > 0){
        $_SESSION['errors'] = $errors;
        header("location: ../backend/profile.php");
    }else{
        // UPDATE PASSWORD
        $enc_pass = password_hash($new_pass,PASSWORD_BCRYPT);
        $query = "UPDATE users SET password='$enc_pass' WHERE id = '$user_id'";
        $res = mysqli_query($db_connect,$query);

        if($res){
            $_SESSION['auth']['password'] = $enc_pass;
            $_SESSION['pass'] = "Your password has been updated";
            header("location: ../backend/profile.php");
        }

    }