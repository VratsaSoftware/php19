<?php
$conn = mysqli_connect("localhost", "root", '', "airport");

if(!$conn){
    echo mysqli_error($conn);
}

mysqli_set_charset($conn, "utf8mb4");

