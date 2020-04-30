<?php
include 'includ/connecDB.php';

$airlines = mysqli_query($conn, "SELECT * FROM airlines WHERE airline_id = ".$_GET['reset']);

$res = mysqli_fetch_array($airlines);

if($_GET['reset'] == $res['airline_id']){
    mysqli_query($conn, "UPDATE airlines SET date_deleted = NULL WHERE airline_id = ".$_GET['reset']);
    if(mysqli_error($conn)){
        echo mysqli_error($conn);
    } else {
        header("Location: deletes.php");
        exit;
    }
}