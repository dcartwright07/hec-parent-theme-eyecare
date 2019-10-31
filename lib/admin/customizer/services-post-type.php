<?php
	//Blog Page Section
	$wp_customize->add_section('wc_servicespages_options', 
	 array(
		'title' 		=> esc_html__( 'Single Service', 'eyecare' ),
		'priority' 		=> 43,
		'capability' 	=> 'edit_theme_options',
		'description' 	=> esc_html__('Manage Default page', 'eyecare'),
		'panel' 		=> 'wc_innerpages_panel',
	 ) 
	);
	
	//Right/Left/Diabls Sidebar
	$wp_customize->add_setting('wc_services_sidebar', array(
		'default'        	=> 'left_sidebar',
		'capability'     	=> 'edit_theme_options',
		'sanitize_callback' => 'wc_sanitize_values',
	));
	
	$wp_customize->add_control('wc_services_sidebar', array(
		'settings' 		=> 'wc_services_sidebar',
		'label'   		=> esc_html__('Select Sidebar Type:', 'eyecare'),
		'section' 		=> 'wc_servicespages_options',
		'type'    		=> 'radio',
		'choices'    	=> array(
							'left_sidebar' 		=> esc_html__('Left Sidebar', 'eyecare'),
							'right_sidebar' 	=> esc_html__('Right Sidebar', 'eyecare'),
							'disable_sidebar' 	=> esc_html__('Disable Sidebar', 'eyecare'),
						),
	));
	
	
	//Disable Services Box
	$wp_customize->add_setting('wc_services_activate',
		array(
			'default' 			=> '',
			'sanitize_callback' => 'wc_sanitize_checkbox'
		)
	);

	$wp_customize->add_control('wc_services_activate',
		array(
			'label' 	=> esc_html__('Enable Our Team Section', 'eyecare'),
			'section' 	=> 'wc_servicespages_options',
			'type' 		=> 'checkbox',
		)
	);
	
	//add Title
	$wp_customize->add_setting('wc_services_team_title',
		array(
			'default' 			=> esc_html__('Meet Our', 'eyecare'). ' <span>'.esc_html__("Optometrists", "eyecare").'</span>',
			'sanitize_callback' => 'force_balance_tags'
		)
	);

	$wp_customize->add_control('wc_services_team_title',
		array(
			'label' 		=> esc_html__('Our Team Heading', 'eyecare'),
			'description' 	=> esc_html__('Wrap in $lt;span&gt; xxx-xx-xxx&lt;/span&gt; To highlight Title', 'eyecare'),
			'section' 		=> 'wc_servicespages_options',
			'type' 			=> 'textarea',
		)
	);
	
	
	//add Title
	$wp_customize->add_setting('wc_services_team_title_desc',
		array(
			'default' 			=> esc_html__('We Have Best Professional Team To Care Your Eyes', 'eyecare'),
			'sanitize_callback' => 'force_balance_tags'
		)
	);

	$wp_customize->add_control('wc_services_team_title_desc',
		array(
			'label' 		=> esc_html__('Our Team Heading Description', 'eyecare'),
			'description' 	=> esc_html__('Couple of lines about section.', 'eyecare'),
			'section' 		=> 'wc_servicespages_options',
			'type' 			=> 'textarea',
		)
	);