<?php
	//Blog Page Section
	$wp_customize->add_section('wc_blogpageesection_options', 
		array(
			'title' 		=> esc_html__( 'Blog Page', 'eyecare' ),
			'priority' 		=> 40,
			'capability' 	=> 'edit_theme_options',
			'description' 	=> esc_html__('Manage blog page section', 'eyecare'),
			'panel' 		=> 'wc_innerpages_panel',
		) 
	);
		  
	//Right/Left/Diabls Sidebar
	$wp_customize->add_setting('wc_blogsection_manage_sidebar', array(
		'default'        	=> 'right_sidebar',
		'capability'     	=> 'edit_theme_options',
		'sanitize_callback' => 'wc_sanitize_values'
	));

	$wp_customize->add_control('wc_blogsection_manage_sidebar', array(
		'settings' 		=> 'wc_blogsection_manage_sidebar',
		'label'   		=> esc_html__('Select Sidebar Type:', 'eyecare'),
		'section' 		=> 'wc_blogpageesection_options',
		'type'    		=> 'radio',
		'choices'    	=> array(
							'left_sidebar' 		=> esc_html__('Left Sidebar', 'eyecare'),
							'right_sidebar' 	=> esc_html__('Right Sidebar', 'eyecare'),
							'disable_sidebar' 	=> esc_html__('Disable Sidebar', 'eyecare'),
		),
	));
		
	//Disable Meta Info
	$wp_customize->add_setting( 
		'wc_blogsection_metainfo',
		array(
			'default' 			=> '',
			'sanitize_callback' => 'wc_sanitize_checkbox'
		)
	);
	
	$wp_customize->add_control(
		'wc_blogsection_metainfo',
		array(
			'label' 	=> esc_html__('Disable Meta Info', 'eyecare'),
			'section' 	=> 'wc_blogpageesection_options',
			'type' 		=> 'checkbox',
		)
	);
		
	//Disable Read more link
	$wp_customize->add_setting( 
		'wc_disable_readmorelink',
		array(
			'default' => '',
			'sanitize_callback' => 'wc_sanitize_checkbox'
		)
	);
	
	$wp_customize->add_control(
		'wc_disable_readmorelink',
		array(
			'label' => esc_html__('Disable Read More Link', 'eyecare'),
			'section' => 'wc_blogpageesection_options',
			'type' => 'checkbox',
		)
	);
		
	//Display Full or Excerpt
	$wp_customize->add_setting('wc_display_full_excerpt', array(
		'default'        	=> 'excerpt_content',
		'capability'     	=> 'edit_theme_options',
		'sanitize_callback' => 'wc_sanitize_values'
	));

	$wp_customize->add_control('wc_display_full_excerpt', array(
		'settings' 		=> 'wc_display_full_excerpt',
		'label'   		=> esc_html__('Content Display:', 'eyecare'),
		'section' 		=> 'wc_blogpageesection_options',
		'type'    		=> 'radio',
		'choices'    	=> array(
							'full_content' 		=> esc_html__('Full Content', 'eyecare'),
							'excerpt_content' 	=> esc_html__('Excerpt', 'eyecare'),
						),
	));
		
	//add Small Address for header
	$wp_customize->add_setting(
		'wc_excerpt_length_blog',
		array(
			'default' 			=> '50',
			'sanitize_callback' => 'wc_check_number'
		)
	);
	
	$wp_customize->add_control(
		'wc_excerpt_length_blog',
		array(
			'label' 		=> esc_html__('Excerpt Length', 'eyecare'),
			'description' 	=> '',
			'section' 		=> 'wc_blogpageesection_options',
			'type' 			=> 'text',
		)
	);