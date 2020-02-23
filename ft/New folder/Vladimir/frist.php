<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Something</title>
    </head>

    <body style="margin: 2%" >


        <form method="post">
            <p>What is your age?</p> 
            <input type="number" name="age">
            <div style="margin: 5% 0 2% 0;">
                <input type="submit">
            </div>
        </form>

        <hr>
        
        <?php

            if (isset($_POST["age"])) {
                
                $age = $_POST["age"];

                if ($age >= 18 && $age < 100) {
                    echo " <h1> Adult drinks </h1>
                    <ul>
                        <li> Wine </li>
                        <li> Beer </li>
                        <li> Vodka </li>
                        <li> Rakja </li>
                    </ul>";
                } elseif ($age >= 100) {
                    echo "<p> You are too old to drink... </p>";
                } else {
                    echo " <h1> Drinks for kids</h1>
                    <ul>
                        <li> Juice </li>
                        <li> Lemonade </li>
                        <li> Water </li>
                        <li> Cola </li>
                    </ul>";
                }

            }

        ?>

    </body>


</html>