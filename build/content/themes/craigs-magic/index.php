<?php

use \Timber\Timber;

$context = Timber::get_context();
$templates = array('index.twig');

if (is_front_page()) {
	// Need to load 3 news posts for homepage.
	$context['posts'] = Timber::get_posts(array(
		'post_type'      => 'post',
		'posts_per_page' => 3
	));

	// Load 2 random testimonials.
	$context['testimonials'] = Timber::get_posts(array(
		'post_type'      => 'testimonial',
		'posts_per_page' => 2,
		'orderby'        => 'rand'
	));

	$context['isFront'] = true;
}

if (is_home()) {
	// Use a custom template for news.
	$context['themeName'] = 'news';
	$context['background'] = get_stylesheet_directory_uri() . '/images/news-background.jpg';
	$context['cornerImage'] = get_stylesheet_directory_uri() . '/images/corner-news.png';
	array_unshift($templates, 'news.twig');
}

Timber::render($templates, $context);
