<?php

$array = [
    ['Sofia','Y' => 1994,'P' => 2000000,'NF' => 20,'SH' => 5,'CA' => 2,'YI' =>10000],
    ['Vraca','Y' => 1430,'P' => 50000,'NF' => 30,'SH' => 5,'CA' => 2,'YI' =>10000],
    ['Plovdiv','Y' => 1994,'P' => 500000,'NF' => 400,'SH' => 5,'CA' => 2,'YI' =>10000],
    ['Lovech','Y' => 1994,'P' => 20000,'NF' => 22,'SH' => 5,'CA' => 2,'YI' =>10000],
    ['Velingrad','Y' => 1994,'P' => 10000,'NF' => 1,'SH' => 5,'CA' => 2,'YI' =>10000],
];

foreach($array as $i => $element){
    foreach($array[$i] as $key => $value){
       $tig = (((($array[$i]['NF']+$array[$i]['SH'])/$array[$i]['CA'])*100)*$array[$i]['P']/$array[$i]['CA'])*(2019-$array[$i]['Y']);
       $array[$i]['TIG'] = 0;
       $array[$i]['TIG'] = $tig;
    }
}

echo "<table border='1'>";
echo "<tr>";
echo "<td>Име на града</td>";
echo "<td>Година</td>";
echo "<td>Население</td>";
echo "<td>Брой предприятия</td>";
echo "<td>Брой спортни зали</td>";
echo "<td>Културни мероприятия</td>";
echo "<td>Глава от население</td>";
echo "<td>ТИГ</td>";

foreach($array as $i => $element){
    echo "<tr>";
    foreach($array[$i] as $key => $value){
       echo "<td>".$value."</td>";
    }
    echo "</tr>";
}

echo "</tr>";
echo "<tr>";
echo "<td>Среден ТИГ</td>";
$avg = 0;
foreach($array as $i => $element){
    foreach($array[$i] as $key => $value){
        $avg += $array[$i]['TIG'];
    }
}
echo "<td>".($avg/count($array))."</td>";
echo "</tr>";
echo "</table>";
