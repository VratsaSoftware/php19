<?php 

$str = 'apple';

$length = strlen($str);

echo $length;


$cyr_str = "топка";

$cyr_len = strlen($cyr_str);

echo $cyr_len;

$mb_len = mb_strlen($cyr_str);

echo $mb_len;
