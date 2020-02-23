<?php
$rows = 4;
$cols = 4;
$num = 0;
$arr = [];

for ($i = 0; $i < $rows; $i++) {
    $num = 1;
    for($m=0; $m<$i; $m++){
        $arr[$i][$m] = 0;
    }
    for ($j = $i; $j < $cols; $j++) {
        $arr[$i][$j] = $num;
        $num += 1;
    }
}
?>
<table border="1">
    <?php
    for ($j = 0; $j < $rows; $j++) {
        echo "<tr>";
        for ($k = 0; $k < $cols; $k++) {
            echo "<td>{$arr[$j][$k]}</td>";
        }
        echo "</tr>";
    }
    ?>
</table>