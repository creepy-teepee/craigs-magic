<?php

use \Timber\Timber;

$context = Timber::get_context();
$templates = array('single.twig');

$context['post'] = Timber::get_post();

Timber::render($templates, $context);
