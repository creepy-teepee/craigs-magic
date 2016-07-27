<?php

require_once 'vendor/autoload.php';

use \Timber\Timber;

// Enable post thumbnails (featured images).
add_theme_support('post-thumbnails');

// Remove things WordPress thinks we need that we don't.
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

// Styles.
function rgEnqueueStyles() {
	wp_enqueue_style('typography', 'https://cloud.typography.com/7750934/6174352/css/fonts.css');
	wp_enqueue_style('main', get_template_directory_uri() . '/css/style.min.css'); // Remove .min to use unminified CSS for testing.
}
add_action('wp_enqueue_scripts', 'rgEnqueueStyles');

// Timber.
Timber::$dirname = array('templates');
