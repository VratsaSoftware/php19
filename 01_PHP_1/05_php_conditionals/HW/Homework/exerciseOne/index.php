<?php
$x = 18;
$y = 2;
$z = 2;
$biggest = 0;
$lowest = 0;
if($x >= $y && $x >= $z)
{
    $biggest = $x;
    if($y >= $z)
    {
        $lowest = $z;
        echo "$lowest $y $biggest";
    }
    else
    {
        $lowest = $y;
        echo "$lowest $z $biggest";
    }
}
else
{
    if($y >= $z)
    {
        $biggest = $y;
        if($z >= $x)
        {
            $lowest = $x;
            echo "$lowest $z $biggest";
        }
        else
        {
            $lowest = $z;
            echo "$lowest $x $biggest";
        }
    }
    else
    {
        $biggest = $z;
        if($y >= $x)
        {
            $lowest = $x;
            echo "$lowest $y $biggest";
        }
        else
        {
            $lowest = $y;
            echo "$lowest $x $biggest";
        }
    }
}
?>