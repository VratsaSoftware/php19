<form action="" method="post">
    Години: <input type="text" name="age" placeholder="Години">
    <input type="submit" name="send" value="Провери">
</form>
<?php
if (isset($_POST['send'])) {
    $age = $_POST['age'];

    if (empty($age) || $age <= 0) {
        echo "Е този ще е голяма пияница като се роди!!!";
    } elseif ($age <= 17) {
        ?>
        <ul>
            <li>Натурален сок</li>
            <li>Coca-Cola</li>
            <li>Fanta</li>
        </ul>
        <?php
    } else {
        ?>
        <ul>
            <li>Бира</li>
            <li>Водка</li>
            <li>Ракия</li>
        </ul>

        <?php
    }
}