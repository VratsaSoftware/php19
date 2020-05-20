<?php 
$link = "../img/logo_1.jpg";
$title = "Statistics";
include('../includes/header.php');
include('../includes/db_connect.php');
if ($_SESSION['loggedin'] != true) {
	header("Location: login.php");
}

?>
<a href="profile.php" class="btn btn-outline-light"><i class="fas fa-reply-all"></i>   Go back to your profile</a><p></p>
<?php
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

$query = "SELECT u.`username`, res.`wins`, res.`losses` FROM users u JOIN results res ON u.user_id = res.user_id ORDER BY res.`wins` DESC LIMIT $skip, $limit";

$result = mysqli_query($conn, $query);

if( mysqli_num_rows($result) > 0 ){
	?>
	<div class="row">
		<div class="col-sm-1 col-sm-offset-5">
			<p class="text-white">Players</p>
		</div>
	</div>
	<div class="row">
		<table style="margin-left: 25px; background-color: #fff; max-width: 96%" class="table table-striped">
			<tr>
				<td>#</td>
				<td>Name</td>
				<td>Wins</td>
				<td>Losses</td>
				<td>Game played</td>
			</tr>
			<?php
			$num = (( $current_page - 1 ) * $profiles_per_page) + 1;
			while($row = mysqli_fetch_assoc($result)){
				?>
				<tr>					
					<td><?= $num ++?></td>
					<td><?= $row['username'] ?></td>	
					<td><?php $wins = $row['wins']; echo $wins;?></td>
		    		<td><?php $losses = $row['losses']; echo $losses;?></td>
		    		<td><?php echo $wins + $losses?></td>	
				</tr>
				<?php
			}
			?>
		</table>
	</div>
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
  				<li class="page-item"><a class="page-link" href="statistics.php?page=1"><span aria-hidden="true">&larr;</span> First</a></li>
				<li class="page-item" class="previous"><a class="page-link" href="statistics.php?page=<?= $previous_num ?>"><span aria-hidden="true">&larr;</span> Older</a></li>
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
		  			<li class="page-item <?= $active_class ?>"><a class="page-link" href="statistics.php?page=<?= $z ?>"><?= $z ?><span class="sr-only">(current)</span></a></li>
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
			  			<li class="page-item <?= $active_class ?>"><a class="page-link" href="statistics.php?page=<?= $z ?>"><?= $z ?><span class="sr-only">(current)</span></a></li>
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
			  			<li class="page-item <?= $active_class ?>"><a class="page-link" href="statistics.php?page=<?= $x ?>"><?= $x ?><span class="sr-only">(current)</span></a></li>
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
			  			<li class="page-item <?= $active_class ?>"><a class="page-link" href="statistics.php?page=<?= $x ?>"><?= $x ?><span class="sr-only">(current)</span></a></li>
			  			<?php
		  			}
		  		}
	  		}
  			//  check this is not the last page
  			if( $current_page != $number_of_pages ){
  				//next link must lead to page + 1
					$next_num = $current_page + 1;
  			?>
    		<li class="page-item" class="next"><a class="page-link" href="statistics.php?page=<?= $next_num ?>">Newer <span aria-hidden="true">&rarr;</span></a></li>
    		<li class="page-item" class="next"><a class="page-link" href="statistics.php?page=<?= $number_of_pages ?>">Last <span aria-hidden="true">&rarr;</span></a></li>
    	<?php } ?>
		</ul>
</nav>
<?php

} else {
	die('Query failed!' . mysqli_error($conn));
}
?>
<hr>
<?php
$query = "SELECT SUM(`wins`) AS `sum_wins` FROM `results`";

$result = mysqli_query($conn, $query);

$wins = mysqli_fetch_assoc($result);


$query = "SELECT SUM(`losses`) AS `sum_losses` FROM `results`";

$result = mysqli_query($conn, $query);

$losses = mysqli_fetch_assoc($result);

?>
<p class="text-white">Games played</p>
<style>
.circularPercentage {
  transform: rotate(-90deg);
}
.wins_dot {
  height: 25px;
  width: 25px;
  background-color: #0f0b;
  border-radius: 50%;
  display: inline-block;
}
.losses_dot {
  height: 25px;
  width: 25px;
  background-color: #f00;
  border-radius: 50%;
  display: inline-block;
}

</style>
<?php 

$games_played = (int)$wins['sum_wins'] + (int)$losses['sum_losses'];
if ($games_played > 0) {
//Find how percents is wins of all games played
$win_percent = (int)$wins['sum_wins'] / $games_played;

//Find how percents is losses of all games played
$loss_percent = (int)$losses['sum_losses'] / $games_played;

//Find how much points of the pie chart is wins
$pie_chart_wins = $win_percent * 424.17;

//Find how much points of the pie chart is losses
$pie_chart_losses = $loss_percent * 424.17;

?>
<div class="container">
	<div class="row">
		<div class="col-lg-6">
			<svg class="circularPercentage" fill="none" width="150" height="150">
			    <circle class="background" fill="none" stroke="#f00" cx="75" cy="75" stroke-width="15" r="67.5"></circle>
			    <circle class="percentage" fill="none" cx="75" cy="75" stroke="#0f0" stroke-width="15" r="67.5" stroke-dasharray="<?= $pie_chart_wins?> <?= $pie_chart_losses?>" stroke-dashoffset="0"></circle>
			</svg>
		</div>
		<div class="col-lg-6">
			<p class="text-white">Legend:</p>
			<p class="text-white">Wins: <span class="wins_dot"></span>Green color <?php  echo round($win_percent*100) . "%"; ?></p>
			<p class="text-white">Losses:<span class="losses_dot"></span> Red color <?php echo round($loss_percent*100) . "%"; ?></p>
		</div>
	</div>
</div>
<?php
}
include('../includes/footer.php');
