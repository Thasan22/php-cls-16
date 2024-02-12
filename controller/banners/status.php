<?php
include "../../database/env.php";
$status_id = $_REQUEST['status-id'];

$query = "SELECT status FROM banners WHERE id = $status_id";
$res = mysqli_query($db_connect,$query);
$status_fetch = mysqli_fetch_assoc($res);

if($status_fetch['status'] == 1){
    $status_query = "UPDATE banners SET status= 0";
    mysqli_query($db_connect,$status_query);
}else{

    $status_query = "UPDATE banners SET status= 0";
    mysqli_query($db_connect,$status_query);

    $status_query = "UPDATE banners SET status= 1 WHERE id = '$status_id'";
    mysqli_query($db_connect,$status_query);

    header("location: ../../backend/all_banners.php");
}