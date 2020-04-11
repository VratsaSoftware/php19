<?php 
$colors = [
    "green","#fff","#fff","#fff","#fff","#fff","#fff","#fff","#fff","#fff","#fff","#fff",
];
function dice_execude_moves($colors, $dice){
    $dice = rand(1, 6); 
    var_dump($dice);
    $_SESSION['dice'] = $dice;
        for ($j = 0; $j < 12; $j++) {
        if ($colors[$j] != "#fff") {

            $player_color = $colors[$j];

            $colors[$j] = "#fff";
            if ($dice+$j <  12) {

                $possittion_in_array = $j + $dice;

                $colors[$possittion_in_array] = $player_color;
                $_SESSION['colors'] = $colors;
                die;
            }
            elseif ($dice+$j >= 12){

                $step1 = 12 - $j;

                $step2 = $dice - $step1;

                $possittion_in_array = $step2;

                $colors[$possittion_in_array] = $player_color;
                $_SESSION['colors'] = $colors;
                die;
            }
        }
    }
    return $_SESSION['colors'];
}

  
?>
        <form action="test.php" method="post">
            <input type="submit" name="dice_row" value="Хвърли зар">
        </form>
        <form action="#" method="post">
            <input type="submit" name="delete_session" value="Clear Session">
        </form>

<?php 


var_dump($_POST);

$dice = NULL;
    if(isset($_POST['dice_row'])){
        dice_execude_moves($colors, $dice);
        echo $_SESSION['dice'];
    }
    if (isset($_POST['delete_session'])) {
        unset($_SESSION['player_color']);
        header("Location: functions/game_start.php");
    }


