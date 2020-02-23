<?php 
$arr = [
   [
   	"name" => "Acer",
   	"RAM" => "4",
   	"HD" => "6",
   	"SSD" =>  "160",
   	"Price" => "2500",
    ],
    [
   	"name" => "Lenovo",
   	"RAM" => "8",
   	"HD" => "10",
   	"SSD" =>  "80",
   	"Price" => "2200",
    ],
    [
   	"name" => "Dell",
   	"RAM" => "16",
   	"HD" => "7",
   	"SSD" =>  "100",
   	"Price" => "2100",
    ],
    [
   	"name" => "Hp",
   	"RAM" => "16",
   	"HD" => "8",
   	"SSD" =>  "140",
   	"Price" => "2000",
    ],
    [
   	"name" => "Sony",
   	"RAM" => "4",
   	"HD" => "15",
   	"SSD" =>  "120",
   	"Price" => "3000",
    ],
];
$count = count($arr);
$sum_ipk = NULL;
for ($i=0; $i < count($arr) ; $i++) { 
	$arr[$i]["IPK"] = (($arr[$i]['HD']+$arr[$i]['SSD']*3)/$arr[$i]['Price']);
	$sum_ipk += $arr[$i]["IPK"];
}
$max = $arr[0]['IPK'];
$max_ind = 0;
for ($j=0; $j < $count ; $j++) { 
	if($arr[$j]["IPK"] >$max){
		$max = $arr[$j]["IPK"];
		$max_ind = $j;
	}
}



 ?>
 <table border="5">
 	<tr>
 		<td>name</td>
 		<td>RAM</td>
 		<td>HD</td>
 		<td>SSD</td>
 		<td>Price</td>
 		<td>IPK</td>
 	</tr>
 	<tr>
 		<?php
 		for ($g=0; $g < $count ; $g++) { 
 			echo "<tr>";
 			foreach ($arr[$g] as $v) {
 			?>
 			<td><?= $v ?></td>
 			<?php
 			}
 			echo "</tr>";

 		}
 		?>
 </table>

 <p><?= $arr[$max_ind]["name"] ?> - има най-висок ИПК<? = $arr[$max_ind]['IPK'] ?></p>