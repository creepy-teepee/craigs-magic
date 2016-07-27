<?php

use \Timber\Timber;

$context = Timber::get_context();
$templates = array('single.twig');

$context['post'] = Timber::get_post();

// Add a random testimonial.
$testimonials = Timber::get_posts(array(
	'post_type'      => 'testimonial',
	'posts_per_page' => 1,
	'orderby'        => 'rand'
));

$context['testimonial'] = (count($testimonials) > 0) ? $testimonials[0] : NULL;

Timber::render($templates, $context);
