<?php

add_action('admin_init', function() {

	// Homepage metabox.
		
	$postId = array_key_exists('post', $_GET) ? $_GET['post'] : (array_key_exists('post_ID', $_POST) ? $_POST['post_ID'] : NULL);

	if ($postId == get_option('page_on_front')) {

		$promoMetabox = array(
			'id'       => 'shows',
			'title'    => 'Shows',
			'pages'    => array('page'),
			'context'  => 'normal',
			'priority' => 'high',
			'fields'   => array(
				array(
					'id'       => 'shows',
					'label'    => 'Shows',
					'type'     => 'list-item',
					'settings' => array(
						array(
							'id'    => 'date',
							'label' => 'Date',
							'type'  => 'date-picker'
						),
						array(
							'id'    => 'venue',
							'label' => 'Venue',
							'type'  => 'text'
						),
						array(
							'id'    => 'bookingUrl',
							'label' => 'Booking Link URL',
							'type'  => 'text'
						)
					)
				)
	        )
		);

		ot_register_meta_box($promoMetabox);
	}

});