<?php
include_once "../database/env.php";

$id = $_REQUEST['id'];
$category_title = $_REQUEST['category_title'];

$query = "UPDATE categories SET category_title='$category_title' WHERE id = '$id'";
$res = mysqli_query($db_connect,$query);
if($res){
    header("location: ../backend/categories.php");
}