<?php
session_start();
include "../../database/env.php";
$heading = $_REQUEST["heading"];
$details = $_REQUEST["details"];
$btn_title = $_REQUEST["btn_title"];
$btn_url = $_REQUEST["btn_url"];
$video_url = $_REQUEST["video_url"];
$store_btn = $_REQUEST['store_btn'];
$featured_img = $_FILES['featured_img'];

// VALIDATION
$errors = [];


if(empty($heading)){
    $errors['heading'] = "Your Banner Title is missing!!";
}
 if(empty($details)){
    $errors['details'] = "Your Banner Detail is missing!!";
}
 if(empty($btn_title)){
    $errors['btn_title'] = "Your Banner Button Title is missing!!";
}
 if(empty($btn_url)){
    $errors['btn_url'] = "Your Banner Button Link is missing!!";
}
 if(empty($video_url)){
    $errors['video_url'] = "Your Banner Video Link is missing!!";
}

if(count($errors) > 0){
    $_SESSION['errors'] = $errors;
    header('location: ../../backend/add_banner.php');
   
} else{
     $img_path = uniqid() . "banner-image" . $featured_img['name'];
    $tmp_name = $featured_img['tmp_name'];
    move_uploaded_file($tmp_name,"uploads/" . $img_path);
   
    $query = "INSERT INTO banners (heading, details, button_title, button_url, video_url, featured_img) VALUES ('$heading','$details','$btn_title','$btn_url','$video_url','$img_path')";
    $res = mysqli_query($db_connect,$query);
    if($res){
        $_SESSION['msg'] = "Your banner info has been added";
        header('location: ../../backend/all_banners.php');
    }
    
}