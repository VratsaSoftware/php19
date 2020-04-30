<?php
$pageTtile = "Soft Delete";
include 'includ/connecDB.php';
include 'includ/header.php';
//Select AirLines
$airlines = mysqli_query($conn, "SELECT a.airline_id,a.airline_name,a.`CEO`,a.country_id,a.date_deleted,c.country_id,c.country_name,c.date_deleted 
    FROM airlines a LEFT JOIN countries c ON a.country_id = c.country_id WHERE a.date_deleted IS NOT NULL");

//Select Companies and Comanies categories
$companies = mysqli_query($conn, "SELECT c.company_id,c.company_name,c.company_categories,c.date_deleted,cc.category_id,cc.category_name,cc.date_deleted
    FROM companies c LEFT JOIN company_categories cc ON c.company_categories = cc.category_id");

//Select countries and Destinations
$countries = mysqli_query($conn, "SELECT c.country_id,c.country_name,c.date_deleted,d.destination_id,d.destination_name,d.country_id,d.date_deleted 
    FROM countries c LEFT JOIN destinations d ON c.country_id = d.country_id");


$num = 1;

if(mysqli_num_rows($airlines) == 0){
    echo 'No Delete';
}

?>

<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Company Name</th>
            <th scope="col">CEO</th>
            <th scope="col">Countri</th>
            <th scope="col">Sonf Delete</th>
            <th scope="col">Total Delete</th>
        </tr>
    </thead>
    <tbody>
<?php
while ($res = mysqli_fetch_assoc($airlines)) {
    ?>
            <tr>
                <th scope="row"><?php echo $num++; ?></th>
                <td><?php echo $res['airline_name']; ?></td>
                <td><?php echo $res['CEO']; ?></td>
                <td><?php echo $res['country_name']; ?></td>
                <td><a href="restor.php?reset=<?php echo $res['airline_id']; ?>">Restor</a></td>
                <td><a href="tota_delete.php?id=<?php echo $res['airline_id']; ?>">Total Delete</a></td>
            </tr>
    <?php
}
?>
    </tbody>
</table>