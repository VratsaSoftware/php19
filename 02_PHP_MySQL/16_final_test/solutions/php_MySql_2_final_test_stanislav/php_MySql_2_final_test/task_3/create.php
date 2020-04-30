<?php
include 'includes/header.php';
$title = 'Create company';
$read_query = " SELECT * FROM `company_categories` WHERE `date_deleted` IS NULL";
$result = mysqli_query($conn,$read_query);

?>

    <form method="post" action="" class="form">
        <p>Enter company_name</p>
        <input type="text" name="company_name" class="form-control">
        <p>select categories</p>
        <select name="category_id" class="form-control">
            <option>select--categories---</option>>
            <?php
            if (mysqli_num_rows($result)>0){
                while ($row = mysqli_fetch_assoc($result)){
                    ?>
                    <option value="<?=$row['category_id']?>"><?=$row['category_name']?></option>

                    <?php
                }
            }
            ?>

        </select>
        <input type="submit" name="submit" value="save">
    </form>
<?php
//var_dump($_POST['meal_type_name']);
//1 

if( isset($_POST['company_name'])){
    $company_name = $_POST['company_name'];
    $category_id=$_POST['category_id'];
//2 insert_query
    $insert_query = "INSERT INTO `companies`(`company_name`,`company_categories`) VALUES ('$company_name',$category_id)";
//3
    $result = mysqli_query($conn, $insert_query);

    var_dump($result);
    die;
    if($result){
        echo "Record created successfully";
        header('Location:index.php');
    } else {
        die('Query failed!' . mysqli_error($conn));
    }


}