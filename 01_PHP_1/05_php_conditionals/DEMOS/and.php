<?php 

// var_dump(((true)&&(false)&&(true)));
$var = 2;
// $var == '2';
// $var == 2;
// var_dump($var==2);
// $var != '2';

// $var === '2';
var_dump($var !== '2');
$var = 2;
var_dump(($var !== '2') && ($var != '2'));
var_dump(($var !== '2') || ($var != '2'));
var_dump(($var !== '2') || ($var != '2') && ($var == true);


