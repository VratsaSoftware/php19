<?php 
include 'includes/header.php';
?>
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="col-md-11">
			<input type="text" name="search" class="form-control" id="search-input">
		</div>
		<div class="col-md-1">
			<input type="submit" name="submit" class="btn btn-success" value="submit" id="search-btn">
		</div>
	</div>
</div>
<div class="col-md-6 col-md-offset-3">
<table style="margin-left: 50px" class="table table-striped">
	<thead>
		<tr>
			<th>#</th>
			<th>product name</th>
			<th>rating</th>				
		</tr>
	</thead>
	<tbody>
		<tr>
			<td colspan="3">
			No Results found</td>
		</tr>
	</tbody>
</table>
</div>
<?php 
	include 'includes/footer.php'
?>