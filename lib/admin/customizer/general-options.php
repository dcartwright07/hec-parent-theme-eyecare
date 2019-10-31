<?php
	/**
	 * @since 1.0.0
	 *
	 * General Settings
	 */
	
	//Add General Options Panel
	$wp_customize->add_panel('wc_go_panel', array(
		'title' 		=> esc_html__('General Options', 'eyecare'),
		'description' 	=> esc_html__('Set boxes layout, preloader, or scroll up', 'eyecare'),
		'priority' 		=> 30,
	)); 
	
	/*
	 * Section General Colors
	 *
	 * Set General Site Colors
	 */
	$wp_customize->add_section('wc_go_colors_section', 
		array(
			'title' 		=> esc_html__('General Colors', 'eyecare' ),
			'priority' 		=> 35,
			'capability' 	=> 'edit_theme_options',
			'description' 	=> esc_html__('Manage Site Colors', 'eyecare'),
			'panel' 		=> 'wc_go_panel',
		) 
	);
	
	//Adding Description.
	$wp_customize->add_control(
		new wc_eyecare_Customize_Misc_Control($wp_customize,
			'wc_go_colors_desc1',
			array(
				'section'  		=> 'wc_go_colors_section',
				'type'     		=> 'text',
				'description' 	=> esc_html__('This Section controls colors only for content section and sidebars, for Header, Title section, Call to action, footer top and bottom please go to their sections.', 'eyecare')
			)
		)
	);
	
	//Backgroun color
	$wp_customize->add_setting('wc_go_colors_bodybg',
		array(
			'default' 			=> '',
			'capability' 		=> 'edit_theme_options',
			'sanitize_callback' => 'maybe_hash_hex_color',
		) 
	);      
            
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,
		'wc_go_colors_bodybg',
		array(
			'label' 		=> esc_html__('Body Background Color', 'eyecare'),
			'description' 	=> esc_html__('For Header, Footer, Title Section, Call to action areas please go to their sections.', 'eyecare'),
			'section' 		=> 'wc_go_colors_section',
			'settings' 		=> 'wc_go_colors_bodybg',
		) 
	));
	
	//Headings color
	$wp_customize->add_setting('wc_go_colors_headingsclr',
		array(
			'default' 			=> '',
			'capability' 		=> 'edit_theme_options',
			'sanitize_callback' => 'maybe_hash_hex_color',
		) 
	);      
            
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,
		'wc_go_colors_headingsclr',
		array(
			'label' 		=> esc_html__('Headings Color', 'eyecare'),
			'description' 	=> esc_html__('h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, h1 span , h2 span, h3 span, h4 span, h5 span, h6 span color.', 'eyecare'),
			'section' 		=> 'wc_go_colors_section',
			'settings' 		=> 'wc_go_colors_headingsclr',
		) 
	));
	
	//Text color
	$wp_customize->add_setting('wc_go_colors_txtcolor',
		array(
			'default' 			=> '',
			'capability' 		=> 'edit_theme_options',
			'sanitize_callback' => 'maybe_hash_hex_color',
		) 
	);      
            
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,
		'wc_go_colors_txtcolor',
		array(
			'label' 		=> esc_html__('Text Tags Color', 'eyecare'),
			'description' 	=> esc_html__('span, label, strong, p, ul, li, ol, input and other body tags color.', 'eyecare'),
			'section' 		=> 'wc_go_colors_section',
			'settings' 		=> 'wc_go_colors_txtcolor',
		) 
	));
	
	//Links Color
	$wp_customize->add_setting('wc_go_colors_linksclr',
		array(
			'default' 			=> '',
			'capability' 		=> 'edit_theme_options',
			'sanitize_callback' => 'maybe_hash_hex_color',
		) 
	);      
            
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,
		'wc_go_colors_linksclr',
		array(
			'label' 		=> esc_html__('Links Color', 'eyecare'),
			'description' 	=> esc_html__('Used For links.', 'eyecare'),
			'section' 		=> 'wc_go_colors_section',
			'settings' 		=> 'wc_go_colors_linksclr',
		) 
	));
	
	//Links Hover Color
	$wp_customize->add_setting('wc_go_colors_linkshvrclr',
		array(
			'default' 			=> '',
			'capability' 		=> 'edit_theme_options',
			'sanitize_callback' => 'maybe_hash_hex_color',
		) 
	);      
            
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,
		'wc_go_colors_linkshvrclr',
		array(
			'label' 		=> esc_html__('Links Hover Color', 'eyecare'),
			'description' 	=> esc_html__('Used For links hover.', 'eyecare'),
			'section' 		=> 'wc_go_colors_section',
			'settings' 		=> 'wc_go_colors_linkshvrclr',
		) 
	));
	
	
	
	/*
	 * Section Boxed Layout
	 *
	 * Set color, Disable or enable
	 */
	$wp_customize->add_section('wc_go_boxed_section', 
		array(
			'title' 		=> esc_html__( 'Boxed Layout', 'eyecare' ),
			'priority' 		=> 50,
			'capability' 	=> 'edit_theme_options',
			'description' 	=> esc_html__('Manage Boxed Layout', 'eyecare'),
			'panel' 		=> 'wc_go_panel',
		) 
	);
	 
	//Add setting For Active or deactive boxed layout
	$wp_customize->add_setting('wc_go_boxed_en_boxed',
		array(
			'default' 			=> '',
			'sanitize_callback' => 'wc_sanitize_checkbox',
		) 
	);
	  
	//Enable, Disable boxed layout
	$wp_customize->add_control(
		'wc_go_boxed_en_boxed',
		array(
			'label' 	=> esc_html__('Enable boxed layout', 'eyecare'),
			'section' 	=> 'wc_go_boxed_section',
			'type' 		=> 'checkbox'
		)
	);
		
	//Backgroun color
	$wp_customize->add_setting('wc_go_boxed_bgcolor',
		array(
			'default' 			=> '',
			'capability' 		=> 'edit_theme_options',
			'sanitize_callback' => 'maybe_hash_hex_color',
		) 
	);      
            
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,
		'wc_go_boxed_bgcolor',
		array(
			'label' 		=> esc_html__('Background Color', 'eyecare'),
			'description' 	=> esc_html__('If Bg Color and Image both Exist, Bg Color would be used with less opacity. A little transparent.', 'eyecare'),
			'section' 		=> 'wc_go_boxed_section',
			'settings' 		=> 'wc_go_boxed_bgcolor',
		) 
	));
	
	//Boxed Page Background Image
	$wp_customize->add_setting('wc_go_boxed_bgimage',
		array(
			'default' 			=> '',
			'sanitize_callback' => 'esc_url_raw'
		)
	);
	
	$wp_customize->add_control(
	new WP_Customize_Image_Control($wp_customize,
		'wc_go_boxed_bgimage',
			array(
				'label' 		=> esc_html__('Boxed Background Image', 'eyecare'),
				'description' 	=> esc_html__('If Bg Color and Image both Exist, Bg Color would be used with less opacity. A little transparent.', 'eyecare'),
				'section' 		=> 'wc_go_boxed_section',
				'settings' 		=> 'wc_go_boxed_bgimage'
			)
		)
	);
	
	
	/*
	 * Section Preloader Settings
	 *
	 * Set color, Disable or enable
	 */
	$wp_customize->add_section('wc_preloader_section', 
		array(
			'title' 		=> esc_html__('Page Preloader', 'eyecare'),
			'priority' 		=> 50,
			'capability' 	=> 'edit_theme_options',
			'description' 	=> esc_html__('Manage Page Preloader', 'eyecare'),
			'panel' 		=> 'wc_go_panel',
		) 
	);
	
	//Add setting For Active or deactive Preloader
	$wp_customize->add_setting('wc_preloader_enable',
		array(
			'default' 			=> '',
			'sanitize_callback' => 'wc_sanitize_checkbox',
		) 
	);
	  
	//Control to disable Preloader
	$wp_customize->add_control(
		'wc_preloader_enable',
		array(
			'label' 	=> esc_html__('Disable Preloader', 'eyecare'),
			'section' 	=> 'wc_preloader_section',
			'type' 		=> 'checkbox'
		)
	);
	
	//Backgroun color
	$wp_customize->add_setting('wc_preloader_pagebg',
		array(
			'default' 			=> '',
			'capability' 		=> 'edit_theme_options',
			'sanitize_callback' => 'maybe_hash_hex_color',
		) 
	);      
            
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,
		'wc_preloader_pagebg',
		array(
			'label' 		=> esc_html__( 'Background Color', 'eyecare'),
			'description' 	=> esc_html__('Background color hiding page while loading.', 'eyecare'),
			'section' 		=> 'wc_preloader_section',
			'settings' 		=> 'wc_preloader_pagebg',
		) 
	));
	
	//Preloader color
	$wp_customize->add_setting('wc_preloader_color',
		array(
			'default' 			=> '',
			'capability' 		=> 'edit_theme_options',
			'sanitize_callback' => 'maybe_hash_hex_color',
		) 
	);      
            
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,
		'wc_preloader_color',
		array(
			'label' 		=> esc_html__( 'Preloader Color', 'eyecare'),
			'description' 	=> esc_html__('Preloader Color.', 'eyecare'),
			'section' 		=> 'wc_preloader_section',
			'settings' 		=> 'wc_preloader_color',
		) 
	));
	
	/*
	 * Section Scroll Up Settings
	 *
	 * Disable, Colors Scroll Up
	 */
	$wp_customize->add_section('wc_scrollup', 
		array(
			'title' 		=> esc_html__( 'Page Scrollup', 'eyecare' ),
			'priority' 		=> 50,
			'capability' 	=> 'edit_theme_options',
			'description' 	=> esc_html__('Manage Page Scroll Up', 'eyecare'),
			'panel' 		=> 'wc_go_panel',
		) 
	);
	
	//Add setting For Active or deactive topbar
	$wp_customize->add_setting('wc_scrollup_disable',
		array(
			'default' 			=> '',
			'sanitize_callback' => 'wc_sanitize_checkbox',
		) 
	);
	  
	//Control to disable topbar
	$wp_customize->add_control(
		'wc_scrollup_disable',
		array(
			'label' 	=> esc_html__('Disable Scroll Up', 'eyecare'),
			'section' 	=> 'wc_scrollup',
			'type' 		=> 'checkbox'
		)
	);
	
	//Background color
	$wp_customize->add_setting('wc_scrollup_bgcolor',
		array(
			'default' 			=> '',
			'capability' 		=> 'edit_theme_options',
			'sanitize_callback' => 'maybe_hash_hex_color',
		) 
	);      
            
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,
		'wc_scrollup_bgcolor',
		array(
			'label' 		=> esc_html__( 'Background Color', 'eyecare'),
			'description' 	=> esc_html__('Background Color.', 'eyecare'),
			'section' 		=> 'wc_scrollup',
			'settings' 		=> 'wc_scrollup_bgcolor',
		) 
	));
	
	//Arrow color
	$wp_customize->add_setting('wc_scrollup_arrowcolor',
		array(
			'default' 			=> '',
			'capability' 		=> 'edit_theme_options',
			'sanitize_callback' => 'maybe_hash_hex_color',
		) 
	);      
            
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,
		'wc_scrollup_arrowcolor',
		array(
			'label' 		=> esc_html__( 'Arrow Color', 'eyecare'),
			'description' 	=> esc_html__('Arrow Color.', 'eyecare'),
			'section' 		=> 'wc_scrollup',
			'settings' 		=> 'wc_scrollup_arrowcolor',
		) 
	));
	
	//Hover Background color
	$wp_customize->add_setting('wc_scrollup_hover_bgcolor',
		array(
			'default' 			=> '',
			'capability' 		=> 'edit_theme_options',
			'sanitize_callback' => 'maybe_hash_hex_color',
		) 
	);      
            
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,
		'wc_scrollup_hover_bgcolor',
		array(
			'label' 		=> esc_html__( 'Hover Background Color', 'eyecare'),
			'description' 	=> esc_html__('Hover Background Color.', 'eyecare'),
			'section' 		=> 'wc_scrollup',
			'settings' 		=> 'wc_scrollup_hover_bgcolor',
		) 
	));
	
	//Hover Arrow color
	$wp_customize->add_setting('wc_scrollup_hover_arrowcolor',
		array(
			'default' 			=> '',
			'capability' 		=> 'edit_theme_options',
			'sanitize_callback' => 'maybe_hash_hex_color',
		) 
	);      
            
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,
		'wc_scrollup_hover_arrowcolor',
		array(
			'label' 		=> esc_html__( 'Hover Arrow Color', 'eyecare'),
			'description' 	=> esc_html__('Hover Arrow Color.', 'eyecare'),
			'section' 		=> 'wc_scrollup',
			'settings' 		=> 'wc_scrollup_hover_arrowcolor',
		) 
	));


	/*
	 * Right To Left Support
	 *
	 * Disable Or Enable Right To Left
	 */
	$wp_customize->add_section('wc_righttoleft', 
		array(
			'title' 		=> esc_html__('Right To Left Direction', 'eyecare' ),
			'priority' 		=> 50,
			'capability' 	=> 'edit_theme_options',
			'description' 	=> esc_html__('Manage Page Directions', 'eyecare'),
			'panel' 		=> 'wc_go_panel',
		) 
	);
	
	//Add setting For Active or deactive topbar
	$wp_customize->add_setting('wc_righttoleft_enable',
		array(
			'default' 			=> '',
			'sanitize_callback' => 'wc_sanitize_checkbox',
		) 
	);
	  
	//Control to disable topbar
	$wp_customize->add_control(
		'wc_righttoleft_enable',
		array(
			'label' 	=> esc_html__('Enable Right to Left Support', 'eyecare'),
			'section' 	=> 'wc_righttoleft',
			'type' 		=> 'checkbox'
		)
	);