<?php
session_start();
include_once "../database/env.php";
$category_title = $_REQUEST['category_title'];

// VALIDATION
$errors = [];

if(empty($category_title)){
    $errors['category_title'] = "Your Category Title is missing!!";
}


if(count($errors) > 0){
    $_SESSION['errors'] = $errors;
    header('location: ../backend/categories.php');
}else{
    $query = "INSERT INTO categories(category_title) VALUES ('$category_title')";
    $res = mysqli_query($db_connect,$query);

    if($res){
        header('location: ../backend/categories.php');
    }
}
