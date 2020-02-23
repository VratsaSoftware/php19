<?php
$towns=[
	['name'=>"София",'Y'=>'1220','P'=>2330500,'NF'=>736,'SH'=>24,'CA'=>735, 'YI'=> 25000,],
	['name'=>"Варна",'Y'=>'254','P'=>450000,'NF'=>335,'SH'=>11,'CA'=>560, 'YI'=> 24500,],
	['name'=>"Русе",'Y'=>'1568','P'=>280000,'NF'=>360,'SH'=>8,'CA'=>380, 'YI'=> 12000,],
	['name'=>"Плевен",'Y'=>'697','P'=>60000,'NF'=>30,'SH'=>2,'CA'=>136, 'YI'=> 9000,],
	['name'=>"Куртово Кунаре",'Y'=>'368','P'=>75000,'NF'=>42,'SH'=>6,'CA'=>213, 'YI'=> 6500,],
];
$sum_TIG=0;
for ($i=0; $i<count($towns); $i++)
	{
		$y=$towns[$i]['Y'];
		$p=$towns[$i]['P'];
		$nf=$towns[$i]['NF'];
		$sh=$towns[$i]['SH'];
		$ca=$towns[$i]['CA'];
		$yi=$towns[$i]['YI'];
		$towns[$i]['TIG']=number_format(((($nf+$sh)/$ca)*100)*($p/$ca)/(2019-$y),2);
		$sum_TIG+=$towns[$i]['TIG'];
	}
$aver_TIG=$sum_TIG/count($towns);
$min_TIG=$aver_TIG;
for ($i=0; $i<count($towns); $i++)
	{
		if ($min_TIG>$towns[$i]['TIG'])
			{
				$min_TIG=$towns[$i]['TIG'];
				$name_mt=$towns[$i]['name'];
			}
	}

echo "<table border=1>";
echo '<th>
	<td>град</td>
	<td>година на основаване</td>
	<td>население (брой души)</td>
	<td>брой предприятия</td>
	<td>брой спортни зали</td>
	<td>културни мероприятия за 1 година</td>
	<td>годишен приход на глава от населението</td>
	<td>индекс на растеж</td>
	</th>';
	for ($i=0; $i<count($towns); $i++)
		{
		echo "<tr>";
		echo '<td>'.($i+1).'</td>';
		foreach ($towns[$i] as $key => $value) 
			{
			echo '<td>'.$value.'</td>';
			}
		echo "</tr>";
		}
	echo '<tr>
	<td colspan=6> </td>
	<td colspan=2> Средният индекс на растеж е</td>
	<td>'.$aver_TIG.'</td>
	</tr>';

		echo '<tr>
	<td colspan=6> </td>
	<td colspan=2> Градът с най-нисък индекс на растеж е</td>
	<td>'.$name_mt.'</td>
	</tr>';
echo '</table>';
