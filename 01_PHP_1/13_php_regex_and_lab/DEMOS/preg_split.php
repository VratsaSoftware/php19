<?php 

$text = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores eligendi molestias, officiis debitis facere velit ab ullam unde, voluptate animi quibusdam, recusandae repellat fuga corporis incidunt vitae id numquam consequuntur?';

// $pattern = '/[a-z]{3}/';
$pattern = '/\b[a-zA-Z]{3}\b/';


$result_text = preg_split($pattern, $text);

echo $text;
echo "<br>";
var_dump($result_text);