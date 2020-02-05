<?php 

$result = $_POST['gas_consumption']*$_POST['conditions']/100 + $_POST['gas_consumption'];

echo 'Променен разход на гориво ' . $result;