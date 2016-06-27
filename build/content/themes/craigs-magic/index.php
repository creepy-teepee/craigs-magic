<?php

use \Timber\Timber;

$context = Timber::get_context();
$context['posts'] = Timber::get_posts();
$context['pagination'] = Timber::get_pagination();

Timber::render(array('index.twig'), $context);
