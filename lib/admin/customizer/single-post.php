<?php
	//Blog Page Section
	$wp_customize->add_section('wc_singlepost_options', 
		array(
			'title' => esc_html__( 'Single Post Page', 'eyecare' ),
			'priority' => 40,
			'capability' => 'edit_theme_options',
			'description' => esc_html__('Manage blog page section', 'eyecare'),
			'panel' 	=> 'wc_innerpages_panel',
		) 
	);
	  
	//Right/Left/Diabls Sidebar
	$wp_customize->add_setting('wc_singlepost_sidebar', array(
		'default'        	=> 'right_sidebar',
		'capability'     	=> 'edit_theme_options',
		'sanitize_callback' => 'wc_sanitize_values'
	));

	$wp_customize->add_control('wc_singlepost_sidebar', array(
		'settings' 		=> 'wc_singlepost_sidebar',
		'label'   		=> esc_html__('Select Sidebar Type:', 'eyecare'),
		'section' 		=> 'wc_singlepost_options',
		'type'    		=> 'radio',
		'choices'    	=> array(
							'left_sidebar' 		=> esc_html__('Left Sidebar', 'eyecare'),
							'right_sidebar' 	=> esc_html__('Right Sidebar', 'eyecare'),
							'disable_sidebar' 	=> esc_html__('Disable Sidebar', 'eyecare'),
						),
	));
		
	//Disable Meta Info
	$wp_customize->add_setting( 
		'wc_singlepost_metainfo',
		array(
			'default' 			=> '',
			'sanitize_callback' => 'wc_sanitize_checkbox'
		)
	);

	$wp_customize->add_control(
		'wc_singlepost_metainfo',
		array(
			'label' 		=> esc_html__('Disable Meta Info', 'eyecare'),
			'section' 		=> 'wc_singlepost_options',
			'type' 			=> 'checkbox',
		)
	);
		
	//Disable Tags
	$wp_customize->add_setting( 
		'wc_singlepost_tags',
		array(
			'default' 			=> '',
			'sanitize_callback' => 'wc_sanitize_checkbox'
		)
	);

	$wp_customize->add_control(
		'wc_singlepost_tags',
		array(
			'label' 	=> esc_html__('Disable Tags', 'eyecare'),
			'section' 	=> 'wc_singlepost_options',
			'type' 		=> 'checkbox',
		)
	);
		
	//Disable Sharing Icons
	$wp_customize->add_setting( 
		'wc_singlepost_sharingicons',
		array(
			'default' 			=> '',
			'sanitize_callback' => 'wc_sanitize_checkbox'
		)
	);
	
	$wp_customize->add_control(
		'wc_singlepost_sharingicons',
		array(
			'label' 	=> esc_html__('Disable Social Sharing', 'eyecare'),
			'section' 	=> 'wc_singlepost_options',
			'type' 		=> 'checkbox',
		)
	);
		
	//Disable Author Box
	$wp_customize->add_setting( 
		'wc_singlepost_authorbox',
		array(
			'default' 			=> '',
			'sanitize_callback' => 'wc_sanitize_checkbox'
		)
	);

	$wp_customize->add_control(
		'wc_singlepost_authorbox',
		array(
			'label' 	=> esc_html__('Disable Author Box', 'eyecare'),
			'section' 	=> 'wc_singlepost_options',
			'type' 		=> 'checkbox',
		)
	);
		
	//Disable Comments
	$wp_customize->add_setting( 
		'wc_singlepost_comments',
		array(
			'default' 			=> '',
			'sanitize_callback' => 'wc_sanitize_checkbox'
		)
	);

	$wp_customize->add_control(
		'wc_singlepost_comments',
		array(
			'label' 	=> esc_html__('Disable Comments', 'eyecare'),
			'section' 	=> 'wc_singlepost_options',
			'type' 		=> 'checkbox',
		)
	);