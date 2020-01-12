<?php
    $positionOne = intval(9);
    $positionTwo = intval(6);
    $positionThree = intval(0);
    $positionFour = intval(1);
    $positionFive = intval(0);
    $positionSix = intval(4);
    $positionSeven = intval(3);
    $positionEight = intval(4);
    $positionNine = intval(8);
    $positionTen = intval(0);
    $sum = $positionOne*2+$positionTwo*4+$positionThree*8+$positionFour*5+$positionFive*10+$positionSix*9+$positionSeven*7+$positionEight*3+$positionNine*6;
    $sumDivision = $sum%11;
    $sumModol = $sumDivision%11;

    if($sumDivision !== 10 & $sumModol !== 0){
        $positionTen = $sumDivision;
        echo $positionTen;
    }else{
        $positionTen = 0;
        echo $positionTen;
    }
    