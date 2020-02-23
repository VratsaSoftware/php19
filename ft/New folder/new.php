<form>
<h1>Възраст:</h1>
<input type="text" name="Age">
<input type="submit" name="submit" value="Submit">  
</form>
<?php
if (isset($_POST["numb"])) {
                
    $numb = $_POST["numb"];

    if ($numb <18) {
    echo "<ul>Water, Coca Cola, Fanta</ul>";
} elseif($numb ==18){
    echo "<ul>Beer, Vodka, Rome</ul>";
}else {
    echo "Забранено за лица под 18гд.!";
}
?>
<?php
    $c = 1;

    echo "<table border=1>";
    for ($i = 1; $i < 5; $i++) {
        echo "<tr>";
        for ($a = 1; $a <= 5; $a++) {
            echo "<td>" . $c . "</td>";
            $c+=4;
        }
        echo "</tr>";
    }
    echo "</table>";

    echo "<br>";  
?>