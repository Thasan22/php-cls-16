<?php
session_start();
include "../database/env.php";
$food_img = $_FILES['food_img'];
$title = $_REQUEST['title'];
$category = $_REQUEST['category'];
$detail = $_REQUEST['detail'];
$price = $_REQUEST['price'];
$extension = pathinfo($food_img['name'])['extension'] ?? null;
$accept = ['png','jpg','jpeg'];

$errors = [];

// IMAGE VALIDATION
if($food_img['size'] == 0){
    $errors['food_img'] = "Select an Image!";
}else if(!in_array($extension,$accept)){
    $errors['food_img'] = "Select a png, jpg or jpeg Image!";
}
// IMAGE VALIDATION ENDS

if(empty($title)){
    $errors['title'] = "Your Food Title is missing!!";
}
if(empty($detail)){
    $errors['detail'] = "Your Food Detail is missing!!";
}
if(empty($price)){
    $errors['price'] = "Enter Food Price!!";
}

if(count($errors) > 0){
    $_SESSION['errors'] = $errors;
    header('location: ../backend/add_food.php');
   
}else{

    $img_path = "../uploads/foods";
    if(!file_exists($img_path)){
        mkdir($img_path);
    }

    $img_name =   "food-image" . uniqid() . ".$extension";
    $tmp_name = $food_img['tmp_name'];
    $test = move_uploaded_file($tmp_name, "$img_path/$img_name");

    if($test){
        $query = "INSERT INTO foods(category, title, detail, price, food_img) VALUES ('$category','$title','$detail','$price','$img_name')";
        $res = mysqli_query($db_connect,$query);

        if($res){
            $_SESSION['msg'] = "Your food info has been added";
            header('location: ../backend/add_food.php');
        }
    }

}