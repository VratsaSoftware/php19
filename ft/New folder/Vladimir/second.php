<?php 
    $computers = [
        ["Maker" => "HP", "Model" => "XB65", "Processor" => "Intel Core 2", "RAM" => "4", "HD" => "500", "SSD" => "50", "P" => "200"],
        ["Maker" => "HP", "Model" => "MR5", "Processor" => "Intel Core i9", "RAM" => "32", "HD" => "10000", "SSD" => "250", "P" => "2000"],
        ["Maker" => "Lenovo", "Model" => "0203", "Processor" => "Intel Core i5", "RAM" => "8", "HD" => "2000", "SSD" => "500", "P" => "800"],
        ["Maker" => "Asser", "Model" => "GB3000", "Processor" => "Ryzen 3800", "RAM" => "16", "HD" => "5000", "SSD" => "500", "P" => "1200"],
        ["Maker" => "Lenovo", "Model" => "9000", "Processor" => "Intel Pentium", "RAM" => "2", "HD" => "500", "SSD" => "100", "P" => "250"],
        
    ];

    //this table is entirely generated on its own using only the table, only requirement is that all computers must have the same subjects
    
    for($i = 0; $i < count($computers); $i++){
        $computers[$i]["IPK"] = (( $computers[$i]["HD"] + $computers[$i]["SSD"] *3 ) + $computers[$i]["RAM"]) / $computers[$i]["P"];
    }
    
    echo "<table border=1>";
    echo "<tr>";
    echo "<td> </td>";
    foreach($computers[0] as $key => $value){ 
        if ($key == "HD") {
            echo "<td> Hard Disk </td>";
        } elseif ($key == "P") {
            echo "<td> Price </td>";
        } else {
            echo "<td> $key </td>";
        }
        
    }
    echo "</tr>";

    for($i = 0; $i < count($computers); $i++){
        $b = $i + 1;
        echo "<tr>";
        echo "<td> Computer " . $b . "</td>";
        foreach($computers[$i] as $value){
            echo "<td>" . $value . "</td>";
        }
        echo "</tr>"; 
    }

    echo "<tr>";
    echo "<td colspan = '".count($computers[0])."'> Avarage IPK :</td>";
    $lowest = $computers[0]["IPK"];
    $lowest_PC = "";
    $allIPK = 0;
    for ($i=0; $i < count($computers); $i++) { 
        $allIPK += $computers[$i]["IPK"];
        if ($lowest > $computers[$i]["IPK"]) {
            $lowest = $computers[$i]["IPK"];
            $lowest_PC = $computers[$i]["Maker"] . " (" . $computers[$i]["Model"] . ") - IPK: " . $computers[$i]["IPK"];
        }
    }
    echo "<td>".number_format($allIPK / count($computers), 2, '.', '')."</td>";
    echo "</tr>"; 
    
    echo "</table>";

    echo "<br>";

    echo "Computer with the lowest IPK: " . $lowest_PC;
?>