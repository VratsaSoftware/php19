<?php
$rows = 8;
$cols = 8;
$num = 1;
$arr = [];

for ($i = 0; $i < $rows; $i++) {
    $num = 1 * ($i + 1);
    for ($j = 0; $j < $cols; $j++) {
        $arr[$i][$j] = $num;
        $num += 4;
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