<?php

/**
 * Custom post type for testimonials. Makes use of CPT class to define post type.
 * 
 * See https://github.com/jjgrainger/wp-custom-post-type-class
 */

require_once THEME_PATH . '/includes/class-cpt.php';

$productions = new CPT('testimonial', array(
	'supports'    => array('title', 'editor')
));

$productions->menu_icon('dashicons-thumbs-up');