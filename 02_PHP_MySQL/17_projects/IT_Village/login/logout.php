<?php 
session_name("IT_Village");
session_start();
session_destroy();

header("Location: ../index.php");