<?php
	//Blog Page Section
	$wp_customize->add_section('wc_optometpages_options', 
		array(
			'title' => esc_html__( 'Single Optometrist Page', 'eyecare' ),
			'priority' => 44,
			'capability' => 'edit_theme_options',
			'description' => esc_html__('Manage Single Doctor page', 'eyecare'),
			'panel' 	=> 'wc_innerpages_panel',
		) 
	);
	  
    //Right/Left/Diabls Sidebar
	$wp_customize->add_setting('wc_disable_rightleft_optsidebar', array(
		'default'        	=> 'left_sidebar',
		'capability'     	=> 'edit_theme_options',
		'sanitize_callback' => 'wc_sanitize_values'
	));

	$wp_customize->add_control('wc_disable_rightleft_optsidebar', array(
		'settings' 	=> 'wc_disable_rightleft_optsidebar',
		'label'   	=> esc_html__('Select Sidebar Type:', 'eyecare'),
		'section' 	=> 'wc_optometpages_options',
		'type'    	=> 'radio',
		'choices'   => array(
			'left_sidebar' 		=> esc_html__('Left Sidebar', 'eyecare'),
			'right_sidebar' 	=> esc_html__('Right Sidebar', 'eyecare'),
			'disable_sidebar' 	=> esc_html__('Disable Sidebar', 'eyecare'),
		),
	));
		
	//Enable or Disable Testimonials
	$wp_customize->add_setting( 'wc_disable_testimonials',
		array(
			'default' => '',
			'sanitize_callback' => 'wc_sanitize_checkbox'
		) 
	);

	//Control to disable Testimonials
	$wp_customize->add_control(
		'wc_disable_testimonials',
		array(
			'label' 	=> esc_html__('Disable Testimonials', 'eyecare'),
			'section' 	=> 'wc_optometpages_options',
			'type' 		=> 'checkbox',
		)
	);
	
	//Enable or Disable Testimonials
	$wp_customize->add_setting( 'wc_testimonials_group',
		array(
			'default' 			=> '',
			'sanitize_callback' => 'wc_check_number'
		) 
	);

	//Control to disable Testimonials
	$wp_customize->add_control(
		'wc_testimonials_group',
		array(
			'label' 		=> esc_html__('Testimonials Group', 'eyecare'),
			'section' 		=> 'wc_optometpages_options',
			'type' 			=> 'text',
			'description' 	=> esc_html__('Enter ID of testimonial Group! Please hover on group Edit option, and you will see tag_id something that\'s ID something 12 3. .', 'eyecare')
		)
	);
	
	//Enable or Disable Appointment Form
	$wp_customize->add_setting( 'wc_disable_appointment',
		array(
			'default' => '',
			'sanitize_callback' => 'wc_sanitize_checkbox'
		) 
	);

	//Control to disable Testimonials
	$wp_customize->add_control(
		'wc_disable_appointment',
		array(
			'label' 	=> esc_html__('Disable Appointment Form', 'eyecare'),
			'section' 	=> 'wc_optometpages_options',
			'type' 		=> 'checkbox',
		)
	);
	
	//Enable or Disable Testimonials
	$wp_customize->add_setting( 'wc_appointment_shortocde',
		array(
			'default' 			=> '',
			'sanitize_callback' => 'force_balance_tags'
		) 
	);

	//Control to disable Testimonials
	$wp_customize->add_control(
		'wc_appointment_shortocde',
		array(
			'label' 		=> esc_html__('Appointment Form Shortcode', 'eyecare'),
			'section' 		=> 'wc_optometpages_options',
			'type' 			=> 'text',
			'description' 	=> esc_html__('Contact Form 7 Shortcode to set default shortcode for Doctors.', 'eyecare')
		)
	);
	
	//Backgroun color
	$wp_customize->add_setting('wc_appointment_bg_color',
		array(
			'default' 			=> '',
			'capability'		=> 'edit_theme_options',
			'sanitize_callback' => 'maybe_hash_hex_color'
		) 
	);
            
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,
		'wc_appointment_bg_color',
			array(
				'label' 	=> esc_html__( 'Background Color', 'eyecare'),
				'section' 	=> 'wc_optometpages_options',
				'settings' 	=> 'wc_appointment_bg_color',
			) 
		)
	);