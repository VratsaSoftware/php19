<?php 
include 'Page.php';
include 'HomePage.php';
include 'Slider.php';

$page = new Page('Page', 'Page content', 'Footer');

$photos = ['1.jpeg', '2.jpeg'];

// var_dump($photos);
$slider = new Slider('I am a Slider', $photos);
// var_dump($slider);

$home_page = new HomePage('HomePage', 'Home Page content', 'HomePage footer', $slider, 'banner');

echo $home_page->render_header();

echo $home_page->render_content();

echo $home_page->render_footer();