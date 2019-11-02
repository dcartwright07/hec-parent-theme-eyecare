<?php
/**
 * Register a Service post type.
 *
 */
if(function_exists('wc_required_modules')) {
	function wc_services_init() {
		$labels = array(
			'name'               => esc_html__('Services', 						'eyecare'),
			'singular_name'      => esc_html__('Service', 						'eyecare'),
			'menu_name'          => esc_html__('Services', 						'eyecare'),
			'name_admin_bar'     => esc_html__('Service', 						'eyecare'),
			'add_new'            => esc_html__('Add New', 						'eyecare'),
			'add_new_item'       => esc_html__('Add New Service', 				'eyecare'),
			'new_item'           => esc_html__('New Service', 					'eyecare'),
			'edit_item'          => esc_html__('Edit Service', 					'eyecare'),
			'view_item'          => esc_html__('View Service', 					'eyecare'),
			'all_items'          => esc_html__('All Services', 					'eyecare'),
			'search_items'       => esc_html__('Search Services', 				'eyecare'),
			'parent_item_colon'  => esc_html__('Parent Services:', 				'eyecare'),
			'not_found'          => esc_html__('No Services found.',			'eyecare'),
			'not_found_in_trash' => esc_html__('No Services found in Trash.', 	'eyecare')
		);

		$args = array(
			'labels'             => $labels,
			'description'        => esc_html__( 'Services Section', 'eyecare' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'service' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'menu_icon'			     => 'dashicons-clipboard',
			'menu_position'      => 30,
			'taxonomies'		     => array(
				esc_html__( 'services_group', 'eyecare' ),
				esc_html__( 'services_button', 'eyecare' )
			),
			'supports'           => array( 'title', 'editor', 'thumbnail' )
		);

		$register_type = 'post_type';
		$name = esc_html__('service', 'eyecare');

		wc_required_modules($register_type, $name, $args);
	}//Function Ends.

	//Hook taxanomy into system
	add_action( 'init', 'wc_services_init', 0 );
}//If wc_required_modules exists


// Create Taxanomy For Services Group
if(function_exists('wc_required_modules')) {
	function wc_services_group_taxanomy() {

		$labels = array(
			'name'              => esc_html__('Services Group', 			'eyecare'),
			'singular_name'     => esc_html__('Services Group', 			'eyecare'),
			'search_items'      => esc_html__('Search Services Group', 		'eyecare'),
			'all_items'         => esc_html__('All Services Group', 		'eyecare'),
			'parent_item'       => esc_html__('Parent Services Group', 		'eyecare'),
			'parent_item_colon' => esc_html__('Parent Services Group:', 	'eyecare'),
			'edit_item'         => esc_html__('Edit Services Group', 		'eyecare'),
			'update_item'       => esc_html__('Update Services Group', 		'eyecare'),
			'add_new_item'      => esc_html__('Add New Services Group', 	'eyecare'),
			'new_item_name'     => esc_html__('New Services Group Name', 	'eyecare'),
			'menu_name'         => esc_html__('Services Group', 			'eyecare'),
		);

		$args = array(
			'post_type'			=> array(esc_html__('service', "eyecare")),
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => esc_html__("services_group", "eyecare") ),
		);
		$name = esc_html__('services_group', 'eyecare');
		$register_type = 'taxonomy';

		wc_required_modules($register_type, $name, $args);

	}//Function Ends.

	//Hook taxanomy into system
	add_action( 'init', 'wc_services_group_taxanomy', 0 );
}

// Create Taxanomy For Services Button
if( function_exists( 'wc_required_modules' ) ) {
	function wc_services_button_taxanomy() {

		$args = array(
			'post_type'			    => array( esc_html__( 'service', "eyecare" ) ),
			'hierarchical'      => true,
			'labels'            => wp_list_pages(),
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => esc_html__( "services_button", "eyecare" ) ),
		);

		$name = esc_html__( 'services_button', 'eyecare' );
		$register_type = 'taxonomy';

		wc_required_modules( $register_type, $name, $args );

	}

	//Hook taxanomy into system
	add_action( 'init', 'wc_services_button_taxanomy', 0 );
}