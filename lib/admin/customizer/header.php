<?php
	/**
	 * @since 1.0.0
	 *
	 * Header Options
	 */
	
	//Header Options Panel
	$wp_customize->add_panel('wc_header_panel', array(
		'title' 		=> esc_html__('Header', 'eyecare'),
		'description' 	=> esc_html__('Manage display for header', 'eyecare'),
		'priority' 		=> 40,
	)); 
	
	
	/**
	 * Header Type
	 *
	 * Type Section
	 */
	$wp_customize->add_section('wc_header_type', 
		array(
			'title' 		=> esc_html__( 'Header Type', 'eyecare' ),
			'priority' 		=> 35,
			'capability' 	=> 'edit_theme_options',
			'description' 	=> esc_html__('Manage Header Type', 'eyecare'),
			'panel' 		=> 'wc_header_panel',
		) 
	);
	
	//Radio selection
	$wp_customize->add_setting('wc_header_type_display', array(
		'default'        	=> 'type-three',
		'capability'     	=> 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field'
	));

	$wp_customize->add_control('wc_header_type_display', array(
		'settings' 		=> 'wc_header_type_display',
		'label'   		=> esc_html__('Select Header Type:', 'eyecare'),
		'section' 		=> 'wc_header_type',
		'type'    		=> 'radio',
		'choices'    	=> array(
			'type-one' 		=> esc_html__('Type 1: (Left Side Logo, Right side Navigation)', 'eyecare'),
			'type-two' 		=> esc_html__('Type 2: (Left Side Logo, Right Side Text Field, Full width Navigation)', 'eyecare'),
			'type-three' 	=> esc_html__('Type 3: (Left Right information boxes, Center Logo, Centered Navigation)', 'eyecare')
		),
	));

	//First Box ICON
	$wp_customize->add_setting(
		'wc_header_type_icon_class_one',
		array(
			'default' 			=> 'fa-map-marker',
			'sanitize_callback' => 'force_balance_tags',
		)
	);
	
	$wp_customize->add_control(
		'wc_header_type_icon_class_one',
		array(
			'label' 		=> esc_html__('Header Type 2 First Box Icon', 'eyecare'),
			'description' 	=> esc_html__('Font Awesom Icon Class like fa-map-marker for first box.', 'eyecare'),
			'section' 		=> 'wc_header_type',
			'type' 			=> 'text',
		)
	);
	
	//First Box Title
	$wp_customize->add_setting(
		'wc_header_type_title_one',
		array(
			'default' 			=> 'Our Location',
			'sanitize_callback' => 'force_balance_tags',
		)
	);
	
	$wp_customize->add_control(
		'wc_header_type_title_one',
		array(
			'label' 		=> esc_html__('Header Type 2 First Box Title', 'eyecare'),
			'description' 	=> esc_html__('Enter Small title e.g Our Location.', 'eyecare'),
			'section' 		=> 'wc_header_type',
			'type' 			=> 'text',
		)
	);
	
	//First Box Detail
	$wp_customize->add_setting(
		'wc_header_type_detail_one',
		array(
			'default' 			=> '6th Avenue, NeHoland',
			'sanitize_callback' => 'force_balance_tags',
		)
	);
	
	$wp_customize->add_control(
		'wc_header_type_detail_one',
		array(
			'label' 		=> esc_html__('Header Type 2 First Box Detail', 'eyecare'),
			'description' 	=> esc_html__('Enter Small description e.g 6th Avenue, NeHoland.', 'eyecare'),
			'section' 		=> 'wc_header_type',
			'type' 			=> 'text',
		)
	);
	
	//First Box ICON
	$wp_customize->add_setting(
		'wc_header_type_icon_class_two',
		array(
			'default' 			=> 'fa-phone',
			'sanitize_callback' => 'force_balance_tags',
		)
	);
	
	$wp_customize->add_control(
		'wc_header_type_icon_class_two',
		array(
			'label' 		=> esc_html__('Header Type 2 Second Box Icon', 'eyecare'),
			'description' 	=> esc_html__('Font Awesom Icon Class like fa-phone for first box.', 'eyecare'),
			'section' 		=> 'wc_header_type',
			'type' 			=> 'text',
		)
	);
	
	//First Box Title
	$wp_customize->add_setting(
		'wc_header_type_title_two',
		array(
			'default' 			=> esc_html__('Call Us', 'eyecare'),
			'sanitize_callback' => 'force_balance_tags',
		)
	);
	
	$wp_customize->add_control(
		'wc_header_type_title_two',
		array(
			'label' 		=> esc_html__('Header Type 2 Second Box Title', 'eyecare'),
			'description' 	=> esc_html__('Enter Small title e.g Call Us.', 'eyecare'),
			'section' 		=> 'wc_header_type',
			'type' 			=> 'text',
		)
	);
	
	//First Box Detail
	$wp_customize->add_setting(
		'wc_header_type_detail_two',
		array(
			'default' 			=> '123-123-1234',
			'sanitize_callback' => 'force_balance_tags',
		)
	);
	
	$wp_customize->add_control(
		'wc_header_type_detail_two',
		array(
			'label' 		=> esc_html__('Header Type 2 Second Box Detail', 'eyecare'),
			'description' 	=> esc_html__('Enter Small description e.g +123-122-1234.', 'eyecare'),
			'section' 		=> 'wc_header_type',
			'type' 			=> 'text',
		)
	);
	
	
	//Add setting For Active or deactive topbar
	$wp_customize->add_setting('wc_header_appointment_disable',
		array(
			'default' 			=> '',
			'sanitize_callback' => 'wc_sanitize_checkbox',
		) 
	);

	//Control to disable topbar
	$wp_customize->add_control(
		'wc_header_appointment_disable',
		array(
			'label' 	=> esc_html__('Enable Appointment Button', 'eyecare'),
			'section' 	=> 'wc_header_type',
			'type' 		=> 'checkbox',
		)
	);
	
	//First Box Detail
	$wp_customize->add_setting(
		'wc_header_type_appointment_text',
		array(
			'default' 			=> 'Book Appointment',
			'sanitize_callback' => 'force_balance_tags',
		)
	);
	
	$wp_customize->add_control(
		'wc_header_type_appointment_text',
		array(
			'label' 		=> esc_html__('Header Type 2 Appointment Button Text', 'eyecare'),
			'description' 	=> esc_html__('Enter Small Label e.g Book Appointment', 'eyecare'),
			'section' 		=> 'wc_header_type',
			'type' 			=> 'text',
		)
	);
	
	
	//Enable or Disable Testimonials
	$wp_customize->add_setting( 'wc_header_type_form_shortcode',
		array(
			'default' 			=> '',
			'sanitize_callback' => 'force_balance_tags'
		) 
	);

	//Control to disable Testimonials
	$wp_customize->add_control(
		'wc_header_type_form_shortcode',
		array(
			'label' 		=> esc_html__('Appointment Form Shortcode', 'eyecare'),
			'section' 		=> 'wc_header_type',
			'type' 			=> 'text',
			'description' 	=> esc_html__('Contact Form 7 Shortcode to set default shortcode for Appointment Button on Navigation Bar.', 'eyecare')
		)
	);

	/**
	 * Header Styling
	 *
	 * Styling Section
	 */
	$wp_customize->add_section('wc_header_styling', 
		array(
			'title' 		=> esc_html__( 'Header Styling', 'eyecare' ),
			'priority' 		=> 35,
			'capability' 	=> 'edit_theme_options',
			'description' 	=> esc_html__('Manage Header Styling', 'eyecare'),
			'panel' 		=> 'wc_header_panel',
		) 
	);
	
	//Backgroun color
	$wp_customize->add_setting('wc_header_sty_bgcolor',
		array(
			'default' 			=> '',
			'capability' 		=> 'edit_theme_options',
			'sanitize_callback' => 'maybe_hash_hex_color'
		) 
	);      

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,
		'wc_header_sty_bgcolor',
		array(
			'label' 	=> esc_html__( 'Header Background Color', 'eyecare'),
			'section' 	=> 'wc_header_styling',
			'settings' 	=> 'wc_header_sty_bgcolor',
		) 
	));
	
	//Line Seprator
	$wp_customize->add_control(
		new wc_eyecare_Customize_Misc_Control($wp_customize,
			'wc_header_sty_lineone',
			array(
				'section'  => 'wc_header_styling',
				'type'     => 'line'
			)
		)
	);
	
	//Heading 
	$wp_customize->add_control(
		new wc_eyecare_Customize_Misc_Control($wp_customize,
			'wc_header_sty_headingone',
			array(
				'section' 	=> 'wc_header_styling',
				'type'      => 'heading',
				'label'     => esc_html__('Common Styles Header type 1 and 2', 'eyecare')
			)
		)
	);
	
	//Link color
	$wp_customize->add_setting('wc_header_sty_linkcolor',
		array(
			'default' 			=> '',
			'capability' 		=> 'edit_theme_options',
			'sanitize_callback' => 'maybe_hash_hex_color'
		) 
	);      

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,
		'wc_header_sty_linkcolor',
		array(
			'label' 	=> esc_html__( 'Link Color', 'eyecare'),
			'section' 	=> 'wc_header_styling',
			'settings' 	=> 'wc_header_sty_linkcolor',
		) 
	));
	
	//Link Hover/Active Background color
	$wp_customize->add_setting('wc_header_sty_hoverbgcolor',
		array(
			'default' 			=> '',
			'capability' 		=> 'edit_theme_options',
			'sanitize_callback' => 'maybe_hash_hex_color'
		) 
	);      

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,
		'wc_header_sty_hoverbgcolor',
		array(
			'label' 	=> esc_html__( 'Active/Hover Background Color', 'eyecare'),
			'section' 	=> 'wc_header_styling',
			'settings' 	=> 'wc_header_sty_hoverbgcolor',
		) 
	));
	
	//Link Hover/Active color
	$wp_customize->add_setting('wc_header_sty_hoverlinkcolor',
		array(
			'default' 			=> '',
			'capability' 		=> 'edit_theme_options',
			'sanitize_callback' => 'maybe_hash_hex_color'
		) 
	);      

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,
		'wc_header_sty_hoverlinkcolor',
		array(
			'label' 	=> esc_html__( 'Active/Hover Link Color', 'eyecare'),
			'section' 	=> 'wc_header_styling',
			'settings' 	=> 'wc_header_sty_hoverlinkcolor',
		) 
	));
	
	//Sub Menu Background Color
	$wp_customize->add_setting('wc_header_sty_subme_bgcolor',
		array(
			'default' 			=> '',
			'capability' 		=> 'edit_theme_options',
			'sanitize_callback' => 'maybe_hash_hex_color'
		) 
	);      

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,
		'wc_header_sty_subme_bgcolor',
		array(
			'label' 	=> esc_html__( 'Sub Menu Background Color', 'eyecare'),
			'section' 	=> 'wc_header_styling',
			'settings' 	=> 'wc_header_sty_subme_bgcolor',
		) 
	));
	
	//Link Hover/Active color
	$wp_customize->add_setting('wc_header_sty_subme_linkcolor',
		array(
			'default' 			=> '',
			'capability' 		=> 'edit_theme_options',
			'sanitize_callback' => 'maybe_hash_hex_color'
		) 
	);      

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,
		'wc_header_sty_subme_linkcolor',
		array(
			'label' 	=> esc_html__( 'Sub Menu Link Color', 'eyecare'),
			'section' 	=> 'wc_header_styling',
			'settings' 	=> 'wc_header_sty_subme_linkcolor',
		) 
	));
	
	//Link Hover/Active color
	$wp_customize->add_setting('wc_header_sty_subme_linkhvrcolor',
		array(
			'default' 			=> '',
			'capability' 		=> 'edit_theme_options',
			'sanitize_callback' => 'maybe_hash_hex_color'
		) 
	);      

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,
		'wc_header_sty_subme_linkhvrcolor',
		array(
			'label' 	=> esc_html__( 'Sub Menu Link Hover Color', 'eyecare'),
			'section' 	=> 'wc_header_styling',
			'settings' 	=> 'wc_header_sty_subme_linkhvrcolor',
		) 
	));
	
	//Line Seprator
	$wp_customize->add_control(
		new wc_eyecare_Customize_Misc_Control($wp_customize,
			'wc_header_sty_linetwo',
			array(
				'section'  => 'wc_header_styling',
				'type'     => 'line'
			)
		)
	);
	
	//Heading 
	$wp_customize->add_control(
		new wc_eyecare_Customize_Misc_Control($wp_customize,
			'wc_header_sty_headingtwo',
			array(
				'section' 	=> 'wc_header_styling',
				'type'      => 'heading',
				'label'     => esc_html__('Header Type 2 Styles', 'eyecare')
			)
		)
	);
	
	//Link Hover/Active color
	$wp_customize->add_setting('wc_header_sty_typetwo_bgcolor',
		array(
			'default' 			=> '',
			'capability' 		=> 'edit_theme_options',
			'sanitize_callback' => 'maybe_hash_hex_color'
		) 
	);      

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,
		'wc_header_sty_typetwo_bgcolor',
		array(
			'label' 	=> esc_html__( 'Navigation Background Color', 'eyecare'),
			'section' 	=> 'wc_header_styling',
			'settings' 	=> 'wc_header_sty_typetwo_bgcolor',
		) 
	));