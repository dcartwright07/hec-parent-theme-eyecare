<?php
	  //Blog Page Section
	  $wp_customize->add_section('wc_footer_information-boxes', 
		 array(
			'title' 		=> esc_html__('Footer Information Boxes', 'eyecare'),
			'priority' 		=> 25,
			'capability' 	=> 'edit_theme_options',
			'description' 	=> esc_html__('Footer Information Boxes', 'eyecare'),
		 	'panel' 		=> 'wc_footer_panel',
		 ) 
	  );

	//Disable Call To Action Box
	$wp_customize->add_setting('wc_footer_information-boxes_display',
		array(
			'default' 			=> '',
			'sanitize_callback' => 'wc_sanitize_checkbox'
		)
	);

	$wp_customize->add_control('wc_footer_information-boxes_display',
		array(
			'label' 	=> esc_html__('Enable Footer Information Boxes', 'eyecare'),
			'section' 	=> 'wc_footer_information-boxes',
			'type' 		=> 'checkbox',
		)
	);
	
	//Adding line seprator.
	$wp_customize->add_control(
		new wc_eyecare_Customize_Misc_Control(
			$wp_customize,
			'wc_footer_information-boxes_lineone',
			array(
				'section'  => 'wc_footer_information-boxes',
				'type'     => 'line'
			)
		)
	);
	
	//Radio selection
	$wp_customize->add_setting('wc_footer_information-boxes_widgetsq', 
		array(
			'default'        	=> 'three-widgets',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wc_sanitize_values'
		)
	);

	$wp_customize->add_control('wc_footer_information-boxes_widgetsq', 
		array(
			'settings' 	=> 'wc_footer_information-boxes_widgetsq',
			'label'   	=> esc_html__('Boxes To display', 'eyecare'),
			'section' 	=> 'wc_footer_information-boxes',
			'type'    	=> 'radio',
			'choices'   => array(
							'two-widgets' 	=> esc_html__('Two Boxes', 'eyecare'),
							'three-widgets' => esc_html__('Three Boxes', 'eyecare'),
						),
		)
	);
	
	
	/**
	 * Box One Details
	 *
	 * @Since 1.0.0
	 */
	
	//Adding line seprator.
	$wp_customize->add_control(
		new wc_eyecare_Customize_Misc_Control(
			$wp_customize,
			'wc_footer_information-boxes_linetwo',
			array(
				'section'  => 'wc_footer_information-boxes',
				'type'     => 'line'
			)
		)
	);
	
	$wp_customize->add_setting('wc_footer_information-boxes_one_icon',
		array(
			'default' 			=> 'fa-phone',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control('wc_footer_information-boxes_one_icon',
		array(
			'label' 		=> esc_html__('First Box Icon Class', 'eyecare'),
			'description' 	=> esc_html__('You can find icon class from fontawesome website like fa-phone or fa-user', 'eyecare'),
			'section' 		=> 'wc_footer_information-boxes',
			'type' 			=> 'text',
		)
	);
	
	$wp_customize->add_setting('wc_footer_information-boxes_one_title',
		array(
			'default' 			=> esc_html__('Have a question? call us now', 'eyecare'),
			'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control('wc_footer_information-boxes_one_title',
		array(
			'label' 		=> esc_html__('First Box Title', 'eyecare'),
			'description' 	=> esc_html__('First Box Title For Example: Have a question? call us now', 'eyecare'),
			'section' 		=> 'wc_footer_information-boxes',
			'type' 			=> 'text',
		)
	);
	
	$wp_customize->add_setting('wc_footer_information-boxes_one_desc',
		array(
			'default' 			=> '+92 345 44433456',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control('wc_footer_information-boxes_one_desc',
		array(
			'label' 		=> esc_html__('First Box Description', 'eyecare'),
			'description' 	=> esc_html__('First box description', 'eyecare'),
			'section' 		=> 'wc_footer_information-boxes',
			'type' 			=> 'text',
		)
	);
	
	
	/**
	 * Box Two Details
	 *
	 * @Since 1.0.0
	 */
	
	//Adding line seprator.
	$wp_customize->add_control(
		new wc_eyecare_Customize_Misc_Control(
			$wp_customize,
			'wc_footer_information-boxes_linethree',
			array(
				'section'  => 'wc_footer_information-boxes',
				'type'     => 'line'
			)
		)
	);
	
	$wp_customize->add_setting('wc_footer_information-boxes_two_icon',
		array(
			'default' 			=> 'fa-clock-o',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control('wc_footer_information-boxes_two_icon',
		array(
			'label' 		=> esc_html__('Second Box Icon Class', 'eyecare'),
			'description' 	=> esc_html__('You can find icon class from fontawesome website like fa-phone or fa-user', 'eyecare'),
			'section' 		=> 'wc_footer_information-boxes',
			'type' 			=> 'text',
		)
	);
	
	$wp_customize->add_setting('wc_footer_information-boxes_two_title',
		array(
			'default' 			=> esc_html__('We are open on', 'eyecare'),
			'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control('wc_footer_information-boxes_two_title',
		array(
			'label' 		=> esc_html__('Second Box Title', 'eyecare'),
			'description' 	=> esc_html__('Second Box Title', 'eyecare'),
			'section' 		=> 'wc_footer_information-boxes',
			'type' 			=> 'text',
		)
	);
	
	$wp_customize->add_setting('wc_footer_information-boxes_two_desc',
		array(
			'default' 			=> esc_html__('Mon - Fri: 08:00 - 17:00', 'eyecare'),
			'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control('wc_footer_information-boxes_two_desc',
		array(
			'label' 		=> esc_html__('Second Box Description', 'eyecare'),
			'description' 	=> esc_html__('Second box description', 'eyecare'),
			'section' 		=> 'wc_footer_information-boxes',
			'type' 			=> 'text',
		)
	);
	
	
	/**
	 * Box Two Details
	 *
	 * @Since 1.0.0
	 */
	
	//Adding line seprator.
	$wp_customize->add_control(
		new wc_eyecare_Customize_Misc_Control(
			$wp_customize,
			'wc_footer_information-boxes_linefour',
			array(
				'section'  => 'wc_footer_information-boxes',
				'type'     => 'line'
			)
		)
	);
	
	$wp_customize->add_setting('wc_footer_information-boxes_three_icon',
		array(
			'default' 			=> 'fa-envelope',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control('wc_footer_information-boxes_three_icon',
		array(
			'label' 		=> esc_html__('Third Box Icon Class', 'eyecare'),
			'description' 	=> esc_html__('You can find icon class from fontawesome website like fa-phone or fa-user', 'eyecare'),
			'section' 		=> 'wc_footer_information-boxes',
			'type' 			=> 'text',
		)
	);
	
	$wp_customize->add_setting('wc_footer_information-boxes_three_title',
		array(
			'default' 			=> esc_html__('Drop Us an Email', 'eyecare'),
			'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control('wc_footer_information-boxes_three_title',
		array(
			'label' 		=> esc_html__('Third Box Title', 'eyecare'),
			'description' 	=> esc_html__('Third Box Title', 'eyecare'),
			'section' 		=> 'wc_footer_information-boxes',
			'type' 			=> 'text',
		)
	);
	
	$wp_customize->add_setting('wc_footer_information-boxes_three_desc',
		array(
			'default' 			=> esc_html__('yours@webfulcreations.com', 'eyecare'),
			'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control('wc_footer_information-boxes_three_desc',
		array(
			'label' 		=> esc_html__('Third Box Description', 'eyecare'),
			'description' 	=> esc_html__('Third box description', 'eyecare'),
			'section' 		=> 'wc_footer_information-boxes',
			'type' 			=> 'text',
		)
	);