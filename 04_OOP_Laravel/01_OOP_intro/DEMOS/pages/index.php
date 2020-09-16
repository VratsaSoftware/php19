<?php 

include '../Page.php';

$page = new Page('Home', 'Content');

?>
<body>
	<header>
		<?php 
		// echo $page->title;
		$page->render_title();
		$page->render_header();
		?>
	</header>
	<main>
		<?php 
		$page->render_content();
		?>
	</main>
	<footer>
		<?php 
		echo $page->footer;
		?>
	</footer>
</body>
