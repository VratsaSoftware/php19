<?php 

$str = "piece1/ piece2/ piece3/ piece4/ piece5/ piece6";

$arr = explode('/', $str);

$new_str = implode('-', $arr);

$length = strlen($new_str);

var_dump($length);