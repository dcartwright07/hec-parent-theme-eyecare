<?php
	//Blog Page Section
	$wp_customize->add_section('wc_defaultpage_options', 
	 array(
		'title' 		=> esc_html__( 'Page Default', 'eyecare' ),
		'priority' 		=> 43,
		'capability' 	=> 'edit_theme_options',
		'description' 	=> esc_html__('Manage Default page', 'eyecare'),
		'panel' 		=> 'wc_innerpages_panel',
	 ) 
	);
	
	//Right/Left/Diabls Sidebar
	$wp_customize->add_setting('wc_default_page_sidebar', array(
		'default'        	=> 'right_sidebar',
		'capability'     	=> 'edit_theme_options',
		'sanitize_callback' => 'wc_sanitize_values',
	));
	
	$wp_customize->add_control('wc_default_page_sidebar', array(
		'settings' 		=> 'wc_default_page_sidebar',
		'label'   		=> esc_html__('Select Sidebar Type:', 'eyecare'),
		'section' 		=> 'wc_defaultpage_options',
		'type'    		=> 'radio',
		'choices'    	=> array(
							'left_sidebar' 		=> esc_html__('Left Sidebar', 'eyecare'),
							'right_sidebar' 	=> esc_html__('Right Sidebar', 'eyecare'),
							'disable_sidebar' 	=> esc_html__('Disable Sidebar', 'eyecare'),
						),
	));