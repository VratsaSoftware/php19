<?php
include 'includes/db_connect.php';
$title = 'Еdit company ';
$id = $_GET['id'];
$select_query = "SELECT * FROM `compnies` WHERE `company_id`=" . $id;
$company_result = mysqli_query($conn, $select_query);
if ($company_result) {
    $company_row = mysqli_fetch_assoc($company_result);

}
$read_query = "SELECT * FROM `cuisines` WHERE `date_deleted` IS NULL ";
$result = mysqli_query($conn, $read_query);

?>

<form method="post" action="" class="form">
    <p>Edit company </p>
    <input type="hidden" name="company_id" value="<?= $company_row['meal_type_id'] ?>">
    <input type="text" name="meal_type_name" class="form-control" value="<?= $company_row['company_name'] ?>">
    <p>Edit category</p>
    <select name="cuisine_id" class="form-control">
        <option>select-category---</option>
        >
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <option value="<?= $row['category_id'] ?>"<?php if ($row['category_id'] == $company_row['category_id']) {
                    echo "selected=true";
                } ?>><?= $row['category_name'] ?></option>
                <?php
            }
        }
        ?>

    </select>
    <input type="submit" name="submit" value="Update">
</form>
<?php

//1

if (isset($_POST['company_name'])) {
    $company_name = $_POST['company_name'];
    $category_id = $_POST['category_id'];
    $company_id = $_POST['company_id'];
//2 update_query
    $update_query = "UPDATE `companies` SET `company_name`='$company_name',`category_id`=$category_id WHERE `comapny_id`=" . $company_id;
//3
    $result = mysqli_query($conn, $update_query);

    var_dump($result);
    if ($result) {
        echo "Record updated successfully";
        header('Location:index.php');
    } else {
        die('Query failed!' . mysqli_error($conn));
    }


}
include 'includes/footer.php'
?>
