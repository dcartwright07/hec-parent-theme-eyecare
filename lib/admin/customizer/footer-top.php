<?php
	  //Blog Page Section
	  $wp_customize->add_section('wc_footer_top', 
		 array(
			'title' 		=> esc_html__('Footer Top', 'eyecare'),
			'priority' 		=> 25,
			'capability' 	=> 'edit_theme_options',
			'description' 	=> esc_html__('Footer Top Options', 'eyecare'),
		 	'panel' 		=> 'wc_footer_panel',
		 ) 
	  );

	//Disable Call To Action Box
	$wp_customize->add_setting('wc_footer_top_display',
		array(
			'default' 			=> '',
			'sanitize_callback' => 'wc_sanitize_checkbox'
		)
	);

	$wp_customize->add_control('wc_footer_top_display',
		array(
			'label' 	=> esc_html__('Disable Footer Top Box', 'eyecare'),
			'section' 	=> 'wc_footer_top',
			'type' 		=> 'checkbox',
		)
	);
	
	//Adding line seprator.
	$wp_customize->add_control(
		new wc_eyecare_Customize_Misc_Control(
			$wp_customize,
			'wc_footer_top_lineone',
			array(
				'section'  => 'wc_footer_top',
				'type'     => 'line'
			)
		)
	);
	
	//Radio selection
	$wp_customize->add_setting('wc_footer_top_widgetsq', 
		array(
			'default'        	=> 'four-widgets',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wc_sanitize_values'
		)
	);

	$wp_customize->add_control('wc_footer_top_widgetsq', 
		array(
			'settings' 	=> 'wc_footer_top_widgetsq',
			'label'   	=> esc_html__('Widgets In Footer Top', 'eyecare'),
			'section' 	=> 'wc_footer_top',
			'type'    	=> 'radio',
			'choices'   => array(
							'one-widget'	=> esc_html__('One Widget', 'eyecare'),
							'two-widgets' 	=> esc_html__('Two Widgets', 'eyecare'),
							'three-widgets' => esc_html__('Three Widgets', 'eyecare'),
							'four-widgets' 	=> esc_html__('Four Widgets', 'eyecare'),
						),
		)
	);
	
	//Adding line seprator.
	$wp_customize->add_control(
		new wc_eyecare_Customize_Misc_Control(
			$wp_customize,
			'wc_footer_top_linetwo',
			array(
				'section'  => 'wc_footer_top',
				'type'     => 'line'
			)
		)
	);
	
	//Footer Background Image
	$wp_customize->add_setting('wc_footer_top_bgimg',
		array(
			'default' 			=> '',
			'sanitize_callback' => 'esc_url_raw'
		)
	);

	$wp_customize->add_control(
	new WP_Customize_Image_Control($wp_customize,
		'wc_footer_top_bgimg',
			array(
				'label' 		=> esc_html__('Footer Background Image', 'eyecare'),
				'description' 	=> esc_html__('Recommended Size: 1920x500', 'eyecare'),
				'section' 		=> 'wc_footer_top',
				'settings'	 	=> 'wc_footer_top_bgimg'
			)
		)
	);
	
	//Backgroun color
	$wp_customize->add_setting('wc_footer_top_bgclr',
		array(
			'default' 			=> '',
			'capability' 		=> 'edit_theme_options',
			'sanitize_callback' => 'maybe_hash_hex_color'
		) 
	);      

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,
		'wc_footer_top_bgclr',
			array(
				'label' 	=> esc_html__('Top Background Color', 'eyecare'),
				'section' 	=> 'wc_footer_top',
				'settings' 	=> 'wc_footer_top_bgclr',
			) 
		)
	);
	
	//Heading color
	$wp_customize->add_setting('wc_footer_top_headingclr',
		array(
			'default' 			=> '',
			'capability' 		=> 'edit_theme_options',
			'sanitize_callback' => 'maybe_hash_hex_color'
		) 
	);      

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,
		'wc_footer_top_headingclr',
			array(
				'label' 	=> esc_html__('Footer Top Heading Color', 'eyecare'),
				'section' 	=> 'wc_footer_top',
				'settings' 	=> 'wc_footer_top_headingclr',
			) 
		)
	);
	
	//Backgroun color
	$wp_customize->add_setting('wc_footer_top_txtclr',
		array(
			'default' 			=> '',
			'capability' 		=> 'edit_theme_options',
			'sanitize_callback' => 'maybe_hash_hex_color'
		) 
	);      

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,
		'wc_footer_top_txtclr',
			array(
				'label' 	=> esc_html__('Footer Top Text Color', 'eyecare'),
				'section' 	=> 'wc_footer_top',
				'settings' 	=> 'wc_footer_top_txtclr',
			) 
		)
	);
	
	//Backgroun color
	$wp_customize->add_setting('wc_footer_top_linkclr',
		array(
			'default' 			=> '',
			'capability' 		=> 'edit_theme_options',
			'sanitize_callback' => 'maybe_hash_hex_color'
		) 
	);      

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,
		'wc_footer_top_linkclr',
			array(
				'label' 	=> esc_html__('Footer Top Link Color', 'eyecare'),
				'section' 	=> 'wc_footer_top',
				'settings' 	=> 'wc_footer_top_linkclr',
			) 
		)
	);
	
	//Backgroun color
	$wp_customize->add_setting('wc_footer_top_linkhvrclr',
		array(
			'default' 			=> '',
			'capability' 		=> 'edit_theme_options',
			'sanitize_callback' => 'maybe_hash_hex_color'
		) 
	);      

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,
		'wc_footer_top_linkhvrclr',
			array(
				'label' 	=> esc_html__('Footer Top Link Hover Color', 'eyecare'),
				'section' 	=> 'wc_footer_top',
				'settings' 	=> 'wc_footer_top_linkhvrclr',
			) 
		)
	);	
