<?php
$laptops = [
    ['name' => 'HP', 'model' => 'Pavilion', 'cpu' => 'Intel core i5-9800K', 'ram' => '8', 'hdd' => '1', 'ssd' => '256', 'price' => '1200'],
    ['name' => 'Asus', 'model' => 'Rog', 'cpu' => 'Intel Core i7-8700K', 'ram' => '16', 'hdd' => '2', 'ssd' => '512', 'price' => '2000'],
    ['name' => 'Lenovo', 'model' => 'Model1', 'cpu' => 'AMD Ryzen 7 2700K', 'ram' => '32', 'hdd' => '4', 'ssd' => '1000', 'price' => '1800'],
    ['name' => 'Acer', 'model' => 'Aspire', 'cpu' => 'Intel Core i9 - 9800K', 'ram' => '64', 'hdd' => '3', 'ssd' => '480', 'price' => '2800'],
    ['name' => 'DELL', 'model' => 'model2', 'cpu' => 'AMD Ryzen 5 3600X', 'ram' => '8', 'hdd' => '6', 'ssd' => '490', 'price' => '1600'],
];

//var_dump($laptops);

for ($i = 0; $i < count($laptops); $i++) {
    $sum = (($laptops[$i]['hdd'] + $laptops[$i]['ssd'] * 3) + $laptops[$i]['ram']) / $laptops[$i]['price'];
    $laptops[$i]['ipk'] = round($sum, 2);
}

//var_dump($laptops);
$laptopsIPK = 0;
for ($k = 0; $k < count($laptops); $k++) {
    $laptopsIPK = $laptopsIPK + $laptops[$k]['ipk'];
    $max_IPK = $laptops[$k]['ipk'];
    $laptops_name = $laptops[$k]['name'];
    $laptops_model = $laptops[$k]['model'];
    for ($f = 0; $f < count($laptops); $f++) {
        if ($laptops[$f]['ipk'] < $max_IPK) {
            $max = $laptops[$f]['ipk'];
            $laptops_name = $laptops[$f]['name'];
            $laptops_model = $laptops[$f]['model'];
        }
    }
}


$avg_ipk = $laptopsIPK / count($laptops);
?>
    <table border="1">
    <tr>
        <td>Производител</td>
        <td>Модел</td>
        <td>Процесор</td>
        <td>Рам Памет</td>
        <td>Твърд Диск</td>
        <td>SSD Диск</td>
        <td>Цена</td>
        <td>ИПК</td>
    </tr>
    <?php
    for ($j = 0; $j < count($laptops); $j++) {
        echo "<tr>";
        foreach ($laptops[$j] as $values) {
            echo "<td>" . $values . "</td>";
        }
        echo "</tr>";
    }
    ?>
    </tablе>

<?php
echo "<p>Среден ИПК: " . $avg_ipk . "</p>";

echo "<p>Лаптопа с най-висок коефициент на пазарен успех е:" . $laptops_name . " - " . $laptops_model . "с ИПК: " . $max_IPK . "</p>";