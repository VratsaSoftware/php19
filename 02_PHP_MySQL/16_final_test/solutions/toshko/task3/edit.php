<?php
$pageTtile = "Add Info";
include 'includ/connecDB.php';
include 'includ/header.php';

$airlines = mysqli_query($conn, "SELECT a.airline_id,a.airline_name,a.`CEO`,a.country_id,a.date_deleted,c.country_id,c.country_name,c.date_deleted 
    FROM airlines a LEFT JOIN countries c ON a.country_id = c.country_id WHERE a.airline_id = ".$_GET['id']);
$airlinesInfo = mysqli_fetch_assoc($airlines);

//Select Companies and Comanies categories
$companies = mysqli_query($conn, "SELECT c.company_id,c.company_name,c.company_categories,c.date_deleted,cc.category_id,cc.category_name,cc.date_deleted
    FROM companies c LEFT JOIN company_categories cc ON c.company_categories = cc.category_id");

//Select countries and Destinations
$countries = mysqli_query($conn, "SELECT c.country_id,c.country_name,c.date_deleted,d.destination_id,d.destination_name,d.country_id,d.date_deleted 
    FROM countries c LEFT JOIN destinations d ON c.country_id = d.country_id");

$num = 1;


if($_GET['id'] == $airlinesInfo['airline_id']){  
    echo 'Ok';
}