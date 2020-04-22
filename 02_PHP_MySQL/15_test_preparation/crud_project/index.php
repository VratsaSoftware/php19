<?php 
include 'includes/header.php';

?>
<div class="container">
	<h2>Welcome to RecipesApp!</h2>
	<div class="row">
		<div class="col-sm-8 col-offset-sm-1">
			<h4><i>If you have any questions - EMAIL us with plain text!</i></h4>
			<form action="contact_us.php" class="" method="post">
				<div class="form-group">
					<label for="your-email">Your Email address</label>
					<input type="email" class="form-control" id="your-email" placeholder="Your Email ..." name="sender_email">
				</div>
				<div class="form-group">
					<label for="email-subject">Subject</label>
					<input type="text" class="form-control" id="email-subject" placeholder="Subject ..." name="email_subject">
				</div>
				<div class="form-group">
					<label for="your-message">Your message</label>
					<textarea class="form-control" id="your-message" rows="3" name="user_message"></textarea>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-default">Send email</button>
					</div>
				</div>				
			</form>
			<hr>
			<h4><i>If you have any questions - EMAIL us with HTML formatted emails!</i></h4>
			<form action="send_html_email.php" class="" method="post">
				<div class="form-group">
					<label for="your-email">Your Email address</label>
					<input type="email" class="form-control" id="your-email" placeholder="Your Email ..." name="sender_email">
				</div>
				<div class="form-group">
					<label for="email-subject">Subject</label>
					<input type="text" class="form-control" id="email-subject" placeholder="Subject ..." name="email_subject">
				</div>
				<div class="form-group">
					<label for="your-message">Your message</label>
					<textarea class="form-control" id="your-message" rows="3" name="user_message"></textarea>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-default">Send PRETTY mails</button>
					</div>
				</div>				
			</form>
		</div>
	</div>
</div>

<?php 
include 'includes/footer.php'
?>