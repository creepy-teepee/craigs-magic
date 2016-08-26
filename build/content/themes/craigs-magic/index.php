<?php

use \Timber\Timber;

$context = Timber::get_context();
$templates = array('index.twig');

if (is_front_page()) {

	$page = Timber::get_post();

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

	if (is_array($page->shows)) {
		// Get future shows.
		
		$suits = array('hearts', 'clubs', 'diamonds', 'spades');
		
		$today = new DateTime();
		$shows = array();
		foreach ($page->shows as $index => $show) {
			$dt = new DateTime($show['date']);
			$dt->setTime(23, 59, 59); // Use end of day to account for today.
			if ($dt > $today) {
				$show['suit'] = $suits[$index % 4];
				$shows[] = $show;
			}
		}
		$context['shows'] = $shows;
	}

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
