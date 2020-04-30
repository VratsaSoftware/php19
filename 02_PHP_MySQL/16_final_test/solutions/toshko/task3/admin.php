<?php
$pageTtile = "Add Info";
include 'includ/connecDB.php';
include 'includ/header.php';

$airlines = mysqli_query($conn, "SELECT a.airline_id,a.airline_name,a.`CEO`,a.country_id,a.date_deleted,c.country_id,c.country_name,c.date_deleted 
    FROM airlines a LEFT JOIN countries c ON a.country_id = c.country_id WHERE a.date_deleted IS NULL");
$airlinesInfo = mysqli_fetch_assoc($airlines);

//Select Companies and Comanies categories
$companies = mysqli_query($conn, "SELECT c.company_id,c.company_name,c.company_categories,c.date_deleted,cc.category_id,cc.category_name,cc.date_deleted
    FROM companies c LEFT JOIN company_categories cc ON c.company_categories = cc.category_id");

//Select countries and Destinations
$countries = mysqli_query($conn, "SELECT c.country_id,c.country_name,d,country_id,d.destination_id,d.destination_name FROM countries c JOIN destinations d ON c.country_id = d.country_id");

$num = 1;

if($_GET['mode'] == "airline"){  
?>
<a href="ad.php?add=airline">Add Airline</a>
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Company Name</th>
            <th scope="col">CEO</th>
            <th scope="col">Countri</th>
            <th scope="col">Edit</th>
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
                <td><a href="edit.php?id=<?php echo $res['airline_id']; ?>">Edit</a></td>
            </tr>
    <?php
}
?>
    </tbody>
</table>
<?php
}


if($_GET['mode']== "country"){
    ?>
<a href="add.php?add=country">Add Country</a>
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Company Name</th>
            <th scope="col">CEO</th>
            <th scope="col">Countri</th>
            <th scope="col">Edit</th>
        </tr>
    </thead>
    <tbody>
<?php
while ($resCountru = mysqli_fetch_assoc($countries)) {
    ?>
            <tr>
                <th scope="row"><?php echo $num++; ?></th>
                <td><?php echo $resCountru['country_name']; ?></td>
                <td><a href="edit.php?id=<?php echo $res['country_id']; ?>">Edit</a></td>
            </tr>
    <?php
}
?>
    </tbody>
</table>
<?php
}

if($_GET['mode'] == "company"){
    ?>
<a href="add.php?add=company">Add Company</a>
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Company Name</th>
            <th scope="col">CEO</th>
            <th scope="col">Edit</th>
        </tr>
    </thead>
    <tbody>
<?php
while ($resComapnie = mysqli_fetch_assoc($companies)) {
    ?>
            <tr>
                <th scope="row"><?php echo $num++; ?></th>
                <td><?php echo $resComapnie['company_name']; ?></td>
                <td><?php echo $resComapnie['category_name']; ?></td>
                <td><a href="edit.php?id=<?php echo $res['airline_id']; ?>">Edit</a></td>
            </tr>
    <?php
}
?>
    </tbody>
</table>
<?php
}

if($_GET['mode'] == "destination"){
    ?>
<a href="add.php?add=destination">Add Destination</a>
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Company Name</th>
            <th scope="col">CEO</th>
            <th scope="col">Countri</th>
            <th scope="col">Edit</th>
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
                <td><a href="edit.php?id=<?php echo $res['airline_id']; ?>">Edit</a></td>
            </tr>
    <?php
}
?>
    </tbody>
</table>
<?php
}
