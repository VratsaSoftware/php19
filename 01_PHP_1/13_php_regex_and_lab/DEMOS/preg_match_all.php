<?php 

$text = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis natus email1@example.com voluptas provident quisquam maiores minima nostrum deserunt, sed voluptatum ratione, reiciendis laborum iusto, eveniet email12@example.com eaque numquam dolore commodi aliquid dolores.';

$pattern = '/([a-z0-9]+)@([a-z]+)\.([a-z]{2,3})/';

$arr = [];
$result = preg_match_all($pattern, $text, $arr);

// var_dump($result);
echo "<pre>";

// var_dump($arr);

var_dump( $arr[1]);

echo "</pre>";