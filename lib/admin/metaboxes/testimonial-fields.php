<?php
	/*
	 * This file contains metabox and functionality for Page Layout
	 */
	
	if(!function_exists('wc_testimonial_fields_boxes')):
	add_action( 'admin_init', 'wc_testimonial_fields_boxes' );

	/**
	 * Meta Boxes Testimonial's Page
	 *
	 * This file handles Metaboxes for posts and other for page layout.
	 *
	 * @since     1.0
	 */
	function wc_testimonial_fields_boxes() {
	  
	  /**
	   * Create a custom meta boxes array that we pass to 
	   * the OptionTree Meta Box API Class.
	   */
	   
		$testimonial_fields_array = array(
			'id'          => 'wc_testimonial_settings',
			'title'       => esc_html__('Testimonials Detail', 'eyecare' ),
			'desc'        => '',
			'pages'       => array(esc_html__('testimonial', 'eyecare')),
			'context'     => 'normal',
			'priority'    => 'high',
			'fields'      => array(
				  array(
					'label'       => esc_html__('Testimonial By', 'eyecare' ),
					'id'          => 'wc_testimonial_by',
					'type'        => 'text',
					'desc'        => esc_html__( 'Name of Client who wrote this Testimonial', 'eyecare' ),
					'std'         => ''
				  ),
				  array(
					'label'       => esc_html__('Testimonial Detail', 'eyecare' ),
					'id'          => 'wc_testimonial_detail',
					'type'        => 'textarea',
					'desc'        => esc_html__( 'Text of Testimonial', 'eyecare' ),
					'std'         => ''
				  )
		)
	  );
  
	/**
	 * Register our meta boxes using the 
	 * ot_register_meta_box() function.
	 * if plugin is installed
	 */
	if ( function_exists( 'ot_register_meta_box' ) )
		ot_register_meta_box($testimonial_fields_array);
	}
	endif;