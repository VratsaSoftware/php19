<?php
error_reporting(E_ALL & ~E_NOTICE);
$firmi = [
    ['name' => 'Avatar', 'country' => 'Rusian', 'imbd' => '70', 'r' => '8000', 'p' => '10000', 'b' => '5000'],
    ['name' => 'Spider-Men', 'country' => 'Bulgaria', 'imbd' => '65', 'r' => '15000', 'p' => '20000', 'b' => '5120'],
    ['name' => 'Venom', 'country' => 'Germania', 'imbd' => '80', 'r' => '10000', 'p' => '15000', 'b' => '1000' ],
    ['name' => 'Avengers', 'country' => 'China', 'imbd' => '50', 'r' => '6400', 'p' => '9400', 'b' => '4800' ],
    ['name' => 'Transformers', 'country' => 'USA', 'imbd' => '20', 'r' => '21000', 'p' => '27000', 'b' => '4900'],
];
//var_dump($firmi);
for ($i = 0; $i < count($firmi); $i++) {
    $sum = ($firmi[$i]['p'] + $firmi[$i]['r']) / $firmi[$i]['imbd']*2;
    $firmi[$i]['ir'] = round($sum, 2);
}
//var_dump($firmi);
$firmiIR = 0;
$max_ir = $firmi[0]['ir'];
for ($k = 0; $k < count($firmi); $k++) {
    $firmiIR = $firmiIR + $firmi[$k]['ir'];
    //$max_ir = $firmi[$k]['ir'];
    $firmi_name = $firmi[$k]['name'];
    $firmi_model = $firmi[$k]['countri'];
    for ($f = 0; $f < count($firmi); $f++) {
        if ($firmi[$f]['ir'] >  $max_ir) {
            $max = $firmi[$f]['ir'];
            $firmi_name = $firmi[$f]['name'];
            $firmi_model = $firmi[$f]['countri'];
        }
    }
}
$avg_ir = $firmiIR / count($firmi);
?>
    <table border="1">
    <tr>
        <td>Фирма</td>
        <td>Дърйажа</td>
        <td>IMBD</td>
        <td>Разход за продуциране</td>
        <td>Приходи от билети</td>
        <td>Продадени билети</td>
        <td>Индекс на реализация</td>
    </tr>
    <?php
    for ($j = 0; $j < count($firmi); $j++) {
        echo "<tr>";
        foreach ($firmi[$j] as $values) {
            echo "<td>" . $values . "</td>";
        }
        echo "</tr>";
    }
    ?>
    </tablе>
<?php
echo "<p>Среден ИПК: " . $avg_ir . "</p>";
echo "<p>Лаптопа с най-висок коефициент на пазарен успех е:" . $firmi_name . " - " . $firmi_model . "с IR: " . $max_ir . "</p>";