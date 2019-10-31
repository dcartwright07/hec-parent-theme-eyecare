<?php
/**
 * Register Testimonials
 * post type
 * If Not Exists
 *
 * @Since 1.0.0
 */
if(function_exists('wc_required_modules')) {
	function wc_testimonials_init() {
		$labels = array(
			'name'               => esc_html__('Testimonials', 						'eyecare'),
			'singular_name'      => esc_html__('Testimonial', 						'eyecare'),
			'menu_name'          => esc_html__('Testimonials', 						'eyecare'),
			'name_admin_bar'     => esc_html__('Testimonial', 						'eyecare'),
			'add_new'            => esc_html__('Add New', 							'eyecare'),
			'add_new_item'       => esc_html__('Add New Testimonial', 				'eyecare'),
			'new_item'           => esc_html__('New Testimonial', 					'eyecare'),
			'edit_item'          => esc_html__('Edit Testimonial', 					'eyecare'),
			'view_item'          => esc_html__('View Testimonial', 					'eyecare'),
			'all_items'          => esc_html__('All Testimonials', 					'eyecare'),
			'search_items'       => esc_html__('Search Testimonials', 				'eyecare'),
			'parent_item_colon'  => esc_html__('Parent Testimonials:', 				'eyecare'),
			'not_found'          => esc_html__('No Testimonials found.', 			'eyecare'),
			'not_found_in_trash' => esc_html__('No Testimonials found in Trash.', 	'eyecare')
		);
	
		$args = array(
			'labels'             => $labels,
			'description'        => esc_html__('Testimonials Section', 'eyecare'),
			'public'             => false,
			'publicly_queryable' => false,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array('slug' => esc_html__('testimonial', 'eyecare')),
			'capability_type'    => 'post',
			'has_archive'        => false,
			'menu_icon'			 => 'dashicons-testimonial',
			'menu_position'      => 40,
			'taxonomies'		 => array(esc_html__('testimonials_group', 'eyecare')),
			'supports'           => array( 'title', 'thumbnail')
		);
		
		$register_type = 'post_type';
		$name = esc_html__('testimonial', 'eyecare');

		wc_required_modules($register_type, $name, $args);
		
	}//Function Ends.
	//Hook taxanomy into system
	add_action('init', 'wc_testimonials_init');
}


// Create Taxanomy For Testimonials Group
if(function_exists('wc_required_modules')) {
	function wc_testimonials_group_taxanomy() {
		
		$labels = array(
			'name'              => esc_html__('Testimonials Group', 			'eyecare'),
			'singular_name'     => esc_html__('Testimonials Group', 			'eyecare'),
			'search_items'      => esc_html__('Search Testimonials Group', 		'eyecare'),
			'all_items'         => esc_html__('All Testimonials Group', 		'eyecare'),
			'parent_item'       => esc_html__('Parent Testimonials Group', 		'eyecare'),
			'parent_item_colon' => esc_html__('Parent Testimonials Group:', 	'eyecare'),
			'edit_item'         => esc_html__('Edit Testimonials Group', 		'eyecare'),
			'update_item'       => esc_html__('Update Testimonials Group', 		'eyecare'),
			'add_new_item'      => esc_html__('Add New Testimonials Group', 	'eyecare'),
			'new_item_name'     => esc_html__('New Testimonials Group Name', 	'eyecare'),
			'menu_name'         => esc_html__('Testimonials Group', 			'eyecare'),
		);
	
		$args = array(
			'post_type'			=> array('testimonial'),
			'public'			=> false,
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'testimonials_group'),
		);
		
		$name = esc_html__('testimonials_group', 'eyecare');
		$register_type = 'taxonomy';
				
		wc_required_modules($register_type, $name, $args);
	}//Function Ends.
	//Hook taxanomy into system
	add_action( 'init', 'wc_testimonials_group_taxanomy', 0 );
}
