<?php
include 'includ/connecDB.php';

$airlines = mysqli_query($conn, "SELECT * FROM airlines WHERE airline_id = ".$_GET['id']);

$res = mysqli_fetch_array($airlines);

if($_GET['id'] == $res['airline_id']){
    mysqli_query($conn, "UPDATE airlines SET date_deleted = NOW() WHERE airline_id = ".$_GET['id']);
    if(mysqli_error($conn)){
        echo mysqli_error($conn);
    } else {
        header("Location: index.php");
        exit;
    }
}