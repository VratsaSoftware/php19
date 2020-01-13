<?php
$var = 302;

$sumDDS = 0;
if($var >= 51 && $var <= 150)
{
    // $momentSum = 50*0.10;
   
    $var = $var - 50;
    $sum = ($var * 0.15) + $step_one;
    $sumDDS = $sum * 1.2;
}
elseif($var >= 151 && $var <= 250)
{
    // $momentSum = 50*0.10;
    
    $var = $var - 50;
    $momentSum = $momentSum + 100*0.15;
    $var = $var - 100;
    $sum = ($var * 0.25) + $momentSum;
    $sumDDS = $sum * 1.2;
}
elseif($var >= 251)
{
    $momentSum = 50*0.10;//5
    
    $var = $var - 50;//252
    $momentSum = $momentSum + 100*0.15;//20
    $var = $var - 100;//152
    $momentSum = $momentSum + 100 * 0.25;//45
    $var = $var - 100;//52
    $sum = ($var * 0.35) + $momentSum;
    $sumDDS = $sum * 1.2 ;
}
else
{
    $var = $var*0.10;
    $sum = $var * 1.2;
    echo "$sum лева";
}
echo "$sumDDS лева";
