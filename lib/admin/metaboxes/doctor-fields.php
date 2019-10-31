<?php
	/*
	 * This file contains metabox and functionality for Page Layout
	 */

	add_action( 'admin_init', 'wc_doctor_fields_boxes' );

	/**
	 * Meta Boxes Doctor's Page
	 *
	 * This file handles Metaboxes for posts and other for page layout.
	 *
	 * @since     1.0
	 */
	if(!function_exists("wc_doctor_fields_boxes")): 
	function wc_doctor_fields_boxes() {
	  
	  /**
	   * Create a custom meta boxes array that we pass to 
	   * the OptionTree Meta Box API Class.
	   */
	   
		$doctor_fields_array = array(
			'id'          => 'wc_doctor_settings',
			'title'       => esc_html__('Optometrist Settings', 'eyecare' ),
			'desc'        => '',
			'pages'       => array(esc_html__('optometrist', 'eyecare')),
			'context'     => 'normal',
			'priority'    => 'high',
			'fields'      => array(
				  array(
					'label'       => esc_html__('Optometrist Slogan', 'eyecare' ),
					'id'          => 'wc_doctor_slogan',
					'type'        => 'text',
					'desc'        => esc_html__( 'Line to show under Doctor Name, e.g M.Phill Optometrist from Harvard!
', 'eyecare' ),
					'std'         => ''
				  ),
				  array(
					'label'       => esc_html__('Optometrist Speciality', 'eyecare' ),
					'id'          => 'wc_doctor_speciality',
					'type'        => 'text',
					'desc'        => esc_html__('Use &lt;dr&gt; Between Speciality to show more than 1.
', 'eyecare' ),
					'std'         => ''
				  ),
				  array(
					'label'       => esc_html__('Optometrist Availability 1', 'eyecare' ),
					'id'          => 'wc_doctor_availability_field1',
					'type'        => 'text',
					'desc'        => esc_html__( 'e.g Sunday - Saturday: Only Appointment', 'eyecare' ),
					'std'         => ''
				  ),
				  array(
					'label'       => esc_html__('Optometrist Availability 2', 'eyecare' ),
					'id'          => 'wc_doctor_availability_field2',
					'type'        => 'text',
					'desc'        => esc_html__( 'e.g Monday - Friday: 9:00 - 15:00', 'eyecare' ),
					'std'         => ''
				  ),
				  array(
					'label'       => esc_html__('Doctor Social Icons', 'eyecare' ),
					'id'          => 'wc_doctor_facebook',
					'type'        => 'text',
					'desc'        => esc_html__( 'Facebook e.g http://facebook.com/yourpage', 'eyecare' ),
					'std'         => ''
				  ),
				  array(
					'label'       => '',
					'id'          => 'wc_doctor_twitter',
					'type'        => 'text',
					'desc'        => esc_html__( 'Twitter e.g http://twitter.com/yourname', 'eyecare' ),
					'std'         => ''
				  ),
				  array(
					'label'       => '',
					'id'          => 'wc_doctor_googleplus',
					'type'        => 'text',
					'desc'        => esc_html__( 'Google Plus e.g http://plus.google.com/username', 'eyecare' ),
					'std'         => ''
				  ),
				  array(
					'label'       => '',
					'id'          => 'wc_doctor_linkedin',
					'type'        => 'text',
					'desc'        => esc_html__( 'LinkedIn e.g http://linkedin.com/username', 'eyecare' ),
					'std'         => ''
				  ),
				  array(
					'label'       => esc_html__('Disable Testimonials', 'eyecare'),
					'id'          => 'wc_testimonials_disable',
					'type'        => 'on-off',
					'taxonomy'    => esc_html__('testimonials_group', 'eyecare'),
					'desc'        => esc_html__( 'Turn Testimonials on or off', 'eyecare' ),
					'std'         => ''
				  ),
				  array(
					'label'       => esc_html__('Testimonials Group', 'eyecare'),
					'id'          => 'wc_testimonials_group',
					'type'        => 'taxonomy-select',
					'taxonomy'    => esc_html__('testimonials_group', 'eyecare'),
					'desc'        => esc_html__( 'Only 2 Testimonials will appear from selected Group', 'eyecare' ),
					'std'         => ''
				  ),
				  array(
					'label'       => esc_html__('Appointment Form Shortcode', 'eyecare'),
					'id'          => 'wc_appointment_shortcode',
					'type'        => 'text',
					'desc'        => esc_html__( 'Contact Form 7 for This Vet', 'eyecare' ),
					'std'         => ''
				  ),
				  array(
					'label'       => esc_html__('Disable Appointment Form', 'eyecare'),
					'id'          => 'wc_appointment_disable',
					'type'        => 'on-off',
					'taxonomy'    => esc_html__('testimonials_group', 'eyecare'),
					'desc'        => esc_html__( 'Turn Appointment on or off', 'eyecare' ),
					'std'         => ''
				  ),
		)
	  );
  
	/**
	 * Register our meta boxes using the 
	 * ot_register_meta_box() function.
	 * if plugin is installed
	 */
	if ( function_exists( 'ot_register_meta_box' ) )
		ot_register_meta_box($doctor_fields_array);
	}
	endif;