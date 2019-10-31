<?php
/**
 * Register a Optometrist post type.
 *
 */
if(function_exists('wc_required_modules')) {
	function wc_veternaries_init() {
		$labels = array(
			'name'               => esc_html__('Optometrists', 						'eyecare'),
			'singular_name'      => esc_html__('Optometrist', 						'eyecare'),
			'menu_name'          => esc_html__('Optometrists', 						'eyecare'),
			'name_admin_bar'     => esc_html__('Optometrist', 						'eyecare'),
			'add_new'            => esc_html__('Add New', 						'eyecare'),
			'add_new_item'       => esc_html__('Add New Optometrist', 				'eyecare'),
			'new_item'           => esc_html__('New Optometrist', 					'eyecare'),
			'edit_item'          => esc_html__('Edit Optometrist', 					'eyecare'),
			'view_item'          => esc_html__('View Optometrist', 					'eyecare'),
			'all_items'          => esc_html__('All Optometrists', 					'eyecare'),
			'search_items'       => esc_html__('Search Optometrists', 				'eyecare'),
			'parent_item_colon'  => esc_html__('Parent Optometrists:', 				'eyecare'),
			'not_found'          => esc_html__('No Optometrists found.', 			'eyecare'),
			'not_found_in_trash' => esc_html__('No Optometrists found in Trash.', 	'eyecare')
		);
	
		$args = array(
			'labels'             => $labels,
			'description'        => esc_html__('Optometrists Section', 'eyecare'),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array('slug' => esc_html__('optometrist', 'eyecare')),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'menu_icon'			 => 'dashicons-visibility',
			'menu_position'      => 35,
			'taxonomies'		 => array(esc_html__('optometrist_group', 'eyecare')),
			'supports'           => array( 'title', 'editor', 'thumbnail')
		);
		
		$name = esc_html__('optometrist', 'eyecare');
		$register_type = 'post_type';
				
		wc_required_modules($register_type, $name, $args);
		
	}//Function Ends.
	//Hook into system
	add_action('init', 'wc_veternaries_init');
}


// Create Taxanomy For Optometrists Group
if(function_exists('wc_required_modules')) {
	function wc_veternaries_group_taxanomy() {
		
		$labels = array(
			'name'              => esc_html__('Optometrists Group', 			'eyecare'),
			'singular_name'     => esc_html__('Optometrists Group', 			'eyecare'),
			'search_items'      => esc_html__('Search Optometrists Group', 	'eyecare'),
			'all_items'         => esc_html__('All Optometrists Group', 		'eyecare'),
			'parent_item'       => esc_html__('Parent Optometrists Group', 	'eyecare'),
			'parent_item_colon' => esc_html__('Parent Optometrists Group:', 	'eyecare'),
			'edit_item'         => esc_html__('Edit Optometrists Group', 	'eyecare'),
			'update_item'       => esc_html__('Update Optometrists Group', 	'eyecare'),
			'add_new_item'      => esc_html__('Add New Optometrists Group', 	'eyecare'),
			'new_item_name'     => esc_html__('New Optometrists Group Name', 'eyecare'),
			'menu_name'         => esc_html__('Optometrists Group', 			'eyecare'),
		);
	
		$args = array(
			'post_type'			=> array(esc_html__('optometrist', 'eyecare')),
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => esc_html__('optometrist_group', 'eyecare')),
		);
		
		$name = esc_html__('optometrist_group', 'eyecare');
		$register_type = 'taxonomy';
				
		wc_required_modules($register_type, $name, $args);
	}//Function Ends.
	//Hook taxanomy into system
	add_action( 'init', 'wc_veternaries_group_taxanomy', 0 );
}

/*
 * Adding Shortcode to use for Expertise Progress Bar
 *
 */
 
if(function_exists('wc_shortcode')) { 
if(!function_exists('wc_expertise_progress')):
	//adds shortcode with callback
 	wc_shortcode('wc_progressbar', 'wc_expertise_progress');
	
	function wc_expertise_progress($atts){
		extract(wc_html_decode(shortcode_atts(array(
			//Parameters of Shortcode
			"wc_progress_label" => "",
			"wc_pgoress_type"	=> "",
			"wc_progress_percentage" => ""
		), $atts)));
		
		if($wc_pgoress_type != 'success' && 
		   $wc_pgoress_type != 'warning' && 
		   $wc_pgoress_type != 'alert' && 
		   $wc_pgoress_type != 'secondary' && 
		   $wc_pgoress_type != 'primary') { 
			$class = "primary";
		} else { 
			$class = $wc_pgoress_type;
		}
		
		if(is_numeric($wc_progress_percentage)) { 
			$percentage = esc_attr($wc_progress_percentage).'%';
		} else { 
			$percentage = '50%';
		}
		
		$output = '<label>'.do_shortcode($wc_progress_label).'</label>';
        $output .= '<div class="progress '.esc_attr($class).'">';
        $output .= '<div style="width:'.esc_attr($percentage).';" class="progress-meter"></div></div>';
		
		//return output for work!
		return $output;
	}//End of short code callback function
endif; //function exists
}