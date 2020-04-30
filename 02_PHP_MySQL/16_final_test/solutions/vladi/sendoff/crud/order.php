<?php 
include 'include/db.php';

if ($_GET['order'] == "1") {
    header("Location: index.php?order=2");
} else {
    header("Location: index.php?order=1");
}