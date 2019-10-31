<?php
/**
 * Register FAQ
 * post type
 * If Not Exists
 *
 * @Since 1.0.0
 */
if(function_exists('wc_required_modules')) {
	function wc_faqs_init() {
		$labels = array(
			'name'               => esc_html__('Faqs', 						'eyecare'),
			'singular_name'      => esc_html__('Faq', 						'eyecare'),
			'menu_name'          => esc_html__('Faqs', 						'eyecare'),
			'name_admin_bar'     => esc_html__('Faq', 						'eyecare'),
			'add_new'            => esc_html__('Add New', 					'eyecare'),
			'add_new_item'       => esc_html__('Add New Faq', 				'eyecare'),
			'new_item'           => esc_html__('New Faq', 					'eyecare'),
			'edit_item'          => esc_html__('Edit Faq', 					'eyecare'),
			'view_item'          => esc_html__('View Faq', 					'eyecare'),
			'all_items'          => esc_html__('All Faqs', 					'eyecare'),
			'search_items'       => esc_html__('Search Faqs', 				'eyecare'),
			'parent_item_colon'  => esc_html__('Parent Faqs:',	 			'eyecare'),
			'not_found'          => esc_html__('No Faqs found.', 			'eyecare'),
			'not_found_in_trash' => esc_html__('No Faqs found in Trash.',	'eyecare')
		);
	
		$args = array(
			'labels'             => $labels,
			'description'        => esc_html__('Faqs Section', 'eyecare'),
			'public'             => false,
			'publicly_queryable' => false,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array('slug' => esc_html__('faq', 'eyecare')),
			'capability_type'    => 'post',
			'has_archive'        => false,
			'menu_icon'			 => 'dashicons-lightbulb',
			'menu_position'      => 45,
			'taxonomies'		 => array(esc_html__('faqs_group', 'eyecare')),
			'supports'           => array( 'title', 'editor')
		);
		
		$register_type = 'post_type';
		$name = esc_html__('faq', 'eyecare');

		wc_required_modules($register_type, $name, $args);
		
	}//Function Ends.
	//Hook taxanomy into system
	add_action('init', 'wc_faqs_init');
}


// Create Taxanomy For Testimonials Group
if(function_exists('wc_required_modules')) {
	function wc_faqs_group_taxanomy() {
		
		$labels = array(
			'name'              => esc_html__('Faqs Group', 			'eyecare'),
			'singular_name'     => esc_html__('Faqs Group', 			'eyecare'),
			'search_items'      => esc_html__('Search Faqs Group', 		'eyecare'),
			'all_items'         => esc_html__('All Faqs Group', 		'eyecare'),
			'parent_item'       => esc_html__('Parent Faqs Group', 		'eyecare'),
			'parent_item_colon' => esc_html__('Parent Faqs Group:', 	'eyecare'),
			'edit_item'         => esc_html__('Edit Faqs Group', 		'eyecare'),
			'update_item'       => esc_html__('Update Faqs Group', 		'eyecare'),
			'add_new_item'      => esc_html__('Add New Faqs Group', 	'eyecare'),
			'new_item_name'     => esc_html__('New Faqs Group Name', 	'eyecare'),
			'menu_name'         => esc_html__('Faqs Group', 			'eyecare'),
		);
	
		$args = array(
			'post_type'			=> array(esc_html__('faq', 'eyecare')),
			'public'			=> false,
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => esc_html__('faqs_group', 'eyecare')),
		);
		
		$name = esc_html__('faqs_group', 'eyecare');
		$register_type = 'taxonomy';
				
		wc_required_modules($register_type, $name, $args);
	}//Function Ends.
	//Hook taxanomy into system
	add_action( 'init', 'wc_faqs_group_taxanomy', 0 );
}