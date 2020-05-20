<?php 
include ('../includes/header.php');
include ('../includes/db_connect.php');
if ($_SESSION['loggedin'] != true) {
	header("Location: login.php");
}
if ($_SESSION['role'] != 'admin') {
	header("Location: profile.php");
}

if (!isset($_GET['page'])) {
	$_GET['page'] = 1;
}
$count_accounts_query = "SELECT COUNT(*) AS user_accounts_count FROM `users` WHERE `date_deleted` IS NULL";
$result_account = mysqli_query($conn, $count_accounts_query);
if( $result_account ){
	$row_count = mysqli_fetch_assoc( $result_account );
}
// how many account will be displayed on one page
$profiles_per_page = 5;

$number_of_pages = $row_count['user_accounts_count']/$profiles_per_page;
$number_of_pages = ceil($number_of_pages);

$current_page = $_GET['page'];

$limit = $profiles_per_page;
$skip = ( $current_page - 1 ) * $profiles_per_page;

$query = "SELECT `role_id`, `role_name` FROM `roles` ";

$result = mysqli_query($conn, $query);

$num = 0;
while ($row = mysqli_fetch_assoc($result)) {
	$roles[$num]['id'] = $row['role_id'];
    $roles[$num]['name'] = $row['role_name'];
    $num++;
}

$query = "SELECT r.`role_name`, u.`username`, u.`user_id` FROM roles r JOIN users u ON r.`role_id`=u.`role_id` LIMIT $skip, $limit";

$result = mysqli_query($conn, $query);

?>
<a href="profile.php" class="btn btn-outline-light"><i class="fas fa-reply-all"></i>   Go back to your profile</a>
<p></p>
<table class="table table-striped" style="background-color: #fff;">
	<thead>
		<tr>
			<th>Username</th>
			<th>New user role</th>
			<th>#</th>
		</tr>
	</thead>
	<tbody>
<?php 
while ($row = mysqli_fetch_assoc($result)) {
    ?>
		<tr>
			<td><?= $row['username']?></td>
			<form action="change_role_script.php" method="post">
				<td>
					<select name="new_role">
						<?php 
							for ($i = 0; $i < count($roles); $i++) {
								$selected = NULL;
								if ($row['role_name'] == $roles[$i]['name']) {
									$selected = "selected";
								}
								?>
								<option value="<?= $roles[$i]['id'] ?>" <?= $selected ?>><?= $roles[$i]['name'] ?></option>
								<?php
							}
						?>
					</select>
				</td>
				<td>
					<input type="hidden" name="user_id" value="<?=$row['user_id']?>">
					<input class="btn btn-outline-secondary" type="submit" name="submit" value="Change role">
				</td>
			</form>
		</tr>
    <?php
}
?>	
	</tbody>
</table>
<!-- pagination -->
	<nav aria-label="..." style="margin-left: 50px">
  		<ul class="pagination">
  			<!-- disable if first page -->
  			<?php 
  			// check we are not on the first page
  			if( $current_page != 1 ){ 
  				//previous link must lead to page - 1
  				$previous_num = $current_page - 1;
  				?>
  				<li class="page-item"><a class="page-link" href="change_role.php?page=1"><span aria-hidden="true">&larr;</span> First</a></li>
				<li class="page-item" class="previous"><a class="page-link" href="change_role.php?page=<?= $previous_num ?>"><span aria-hidden="true">&larr;</span> Older</a></li>
  			<?php } ?>
  			<!-- display number os pages in the pagination block -->
  			<?php 
  			if ($current_page+1 <= $number_of_pages) {
  				if ($number_of_pages-4 <= 0) {
  					for ($z=$current_page; $z <= $number_of_pages; $z++) { 
	  				?>
	  				<!-- set page number requested in each page button -->
					<!-- set dinamically active class - the current page number to be distinguished among others -->
					<?php 
					$active_class = '';
					if( $current_page == $z ){
						$active_class = 'active';
					}
					?>
		  			<li class="page-item <?= $active_class ?>"><a class="page-link" href="change_role.php?page=<?= $z ?>"><?= $z ?><span class="sr-only">(current)</span></a></li>
		  			<?php
		  			}
  				}else{
		  			for ($z=$current_page; $z < $current_page+5; $z++) { 
		  				?>
		  				<!-- set page number requested in each page button -->
						<!-- set dinamically active class - the current page number to be distinguished among others -->
						<?php 
						$active_class = '';
						if( $current_page == $z ){
							$active_class = 'active';
						}
						?>
			  			<li class="page-item <?= $active_class ?>"><a class="page-link" href="change_role.php?page=<?= $z ?>"><?= $z ?><span class="sr-only">(current)</span></a></li>
			  			<?php
		  			}
		  		}
	  		}else{
	  			if ($number_of_pages-4 <= 0) {
		  			for ($x=1; $x <= $number_of_pages; $x++) { 
		  				?>
		  				<!-- set page number requested in each page button -->
						<!-- set dinamically active class - the current page number to be distinguished among others -->
						<?php 
						$active_class = '';
						if( $current_page == $x ){
							$active_class = 'active';
						}
						?>
			  			<li class="page-item <?= $active_class ?>"><a class="page-link" href="change_role.php?page=<?= $x ?>"><?= $x ?><span class="sr-only">(current)</span></a></li>
			  			<?php
		  			}
		  		}else{
		  			for ($x=$number_of_pages-4; $x <= $number_of_pages; $x++) { 
		  				?>
		  				<!-- set page number requested in each page button -->
						<!-- set dinamically active class - the current page number to be distinguished among others -->
						<?php 
						$active_class = '';
						if( $current_page == $x ){
							$active_class = 'active';
						}
						?>
			  			<li class="page-item <?= $active_class ?>"><a class="page-link" href="change_role.php?page=<?= $x ?>"><?= $x ?><span class="sr-only">(current)</span></a></li>
			  			<?php
		  			}
		  		}
	  		}
  			//  check this is not the last page
  			if( $current_page != $number_of_pages ){
  				//next link must lead to page + 1
					$next_num = $current_page + 1;
  			?>
    		<li class="page-item" class="next"><a class="page-link" href="change_role.php?page=<?= $next_num ?>">Newer <span aria-hidden="true">&rarr;</span></a></li>
    		<li class="page-item" class="next"><a class="page-link" href="change_role.php?page=<?= $number_of_pages ?>">Last <span aria-hidden="true">&rarr;</span></a></li>
    	<?php } ?>
		</ul>
</nav>
<?php

include ('../includes/footer.php');