<?php

include '../Page.php';

$page = new Page('About page', 'Content about page');

?>

<body>
	<header>
		<?php 
		$page->render_header();
		?>
	</header>
	<footer>
		<?php 
		$page->render_footer();
		?>
	</footer>
</body>

