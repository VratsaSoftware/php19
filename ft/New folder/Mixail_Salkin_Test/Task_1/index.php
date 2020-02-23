<!DOCTYPE>
<html lang="en">
<head >
    <meta charset="UTF-8">
    <title>Task1</title>
</head>
<body>
 <form action="#" method="post">
        <h3>Insert your age : </h3>
     <input type="number" name="age">
     <input  type="submit" name="submit" value="open menu" >

 </form>


<?php
    if (!empty($_POST)){
        $age = $_POST['age'];


        if($age >= 18){
            echo "<h2>Alcoxol</h2>
                   <ul>
                    <li>Wisky</li>
                     <li>Vodka</li>
                     <li> Djin</li>
                  </ul>";
        }
        elseif ($age < 18){

            echo "
                <h2> Menu without alcoxol : </h2>
                    <ul>
                        <li>Cappy</li>
                        <li>Water</li>
                        <li>Soda</li>

                    </ul>";
        }
        else{
            echo "Input your age !";
        }
    }
?>


</body>
</html>