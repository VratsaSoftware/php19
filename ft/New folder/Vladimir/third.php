<?php

    $arr = [];
    $rows = 5;
    $cols = 5;
    $num = 1;

    for ($i=0; $i < $rows; $i++) {
        $num = $i + 1;
        for ($j=0; $j < $cols; $j++) { 
            $arr[$i][$j] = $num;
            $num += $i * 10 + 4;
        }
    }

    echo '<table border="1">';
    for ($m=0; $m < $rows; $m++) { 
        echo '<tr>';
        for ($n=0; $n < $cols; $n++) { 
            echo '<td>' . $arr[$m][$n] . '</td>';
        }
        echo '</tr>';
    }

    echo '</table>';

    //echo json_encode($arr);
?>