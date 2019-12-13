<?php
	  //Blog Page Section
	  $wp_customize->add_section('wc_footer_cta',
		 array(
			'title' 		=> esc_html__( 'Call To Action', 'eyecare' ),
			'subtitle' 		=> esc_html__( 'Call To Action Sub', 'eyecare' ),
			'priority' 		=> 20,
			'capability' 	=> 'edit_theme_options',
			'description' 	=> esc_html__('Manage Call to Action', 'eyecare'),
		 	'panel' 		=> 'wc_footer_panel',
		 )
	  );

	//Disable Call To Action Box
	$wp_customize->add_setting('wc_footer_cta_dp',
		array(
			'default' 			=> '',
			'sanitize_callback' => 'wc_sanitize_checkbox'
		)
	);

	$wp_customize->add_control('wc_footer_cta_dp',
		array(
			'label' 	=> esc_html__('Enable Call To Action Box', 'eyecare'),
			'section' 	=> 'wc_footer_cta',
			'type' 		=> 'checkbox',
		)
	);

	//Extra line
	$wp_customize->add_control(
		new wc_eyecare_Customize_Misc_Control(
			$wp_customize,
			'wc_footer_cta_lineone',
			array(
				'section'  => 'wc_footer_cta',
				'type'     => 'line'
			)
		)
	);

	//Backgroun color
	$wp_customize->add_setting('wc_footer_cta_bgcolor',
		array(
			'default' 			=> '',
			'capability' 		=> 'edit_theme_options',
			'sanitize_callback' => 'maybe_hash_hex_color'
		)
	);

	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'wc_footer_cta_bgcolor',
			array(
				'label' 	=> esc_html__( 'Background Color', 'eyecare'),
				'section' 	=> 'wc_footer_cta',
				'settings' 	=> 'wc_footer_cta_bgcolor',
			)
		)
	);

	//Text button color
	$wp_customize->add_setting('wc_footer_cta_txtcolor',
		array(
			'default' 			=> '',
			'capability' 		=> 'edit_theme_options',
			'sanitize_callback' => 'maybe_hash_hex_color'
		)
	);

	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'wc_footer_cta_txtcolor',
			array(
				'label' 	=> esc_html__( 'Text/Button Color', 'eyecare'),
				'section' 	=> 'wc_footer_cta',
				'settings' 	=> 'wc_footer_cta_txtcolor',
			)
		)
	);

	//text button selected color
	$wp_customize->add_setting('wc_footer_cta_hovertxtcolor',
		array(
			'default' 			=> '',
			'capability' 		=> 'edit_theme_options',
			'sanitize_callback' => 'maybe_hash_hex_color'
		)
	);

	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'wc_footer_cta_hovertxtcolor',
			array(
				'label' 	=> esc_html__( 'Text/Button Hover/Highlight Color', 'eyecare'),
				'section' 	=> 'wc_footer_cta',
				'settings' 	=> 'wc_footer_cta_hovertxtcolor',
			)
		)
	);

	//Extra line
	$wp_customize->add_control(
		new wc_eyecare_Customize_Misc_Control(
			$wp_customize,
			'wc_footer_cta_linetwo',
			array(
				'section'  => 'wc_footer_cta',
				'type'     => 'line'
			)
		)
	);

	//Title background image
   $wp_customize->add_setting(
		'wc_cta_side_image',
		array(
			'default' 			=> '',
			'sanitize_callback' => 'esc_url_raw'
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
		$wp_customize,
		'wc_cta_side_image',
		array(
			'label' 		=> esc_html__('Call to Action Side Image', 'eyecare'),
			'description' 	=> esc_html__('Recommended Size: 282x298.', 'eyecare'),
			'section' 		=> 'wc_footer_cta',
			'settings' 		=> 'wc_cta_side_image'
			)
		)
	);


	//add Phone Number
	$wp_customize->add_setting('wc_footer_cta_lefttxt',
		array(
			'default' 			=> esc_html__('If you Have Any Questions Call Us On', 'eyecare'). ' <span>(010)123-456-7890</span>',
			'sanitize_callback' => 'force_balance_tags'
		)
	);

	$wp_customize->add_control('wc_footer_cta_lefttxt',
		array(
			'label' 		=> esc_html__('Left Side Content', 'eyecare'),
			'description' 	=> esc_html__('Wrap in span xxx-xx-xxx&lt;/span&gt; To highlight Text', 'eyecare'),
			'section' 		=> 'wc_footer_cta',
			'type' 			=> 'textarea',
		)
	);

	//Right Side
	$wp_customize->add_setting('wc_footer_cta_btntxt',
		array(
			'default' 			=> 'Appointment',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control('wc_footer_cta_btntxt',
		array(
			'label' 		=> esc_html__('Right Side Button Text', 'eyecare'),
			'description' 	=> esc_html__('Appointment/Something', 'eyecare'),
			'section' 		=> 'wc_footer_cta',
			'type' 			=> 'text',
		)
	);

	//Right Side
	$wp_customize->add_setting('wc_footer_cta_btnlink',
		array(
			'default' 			=> 'http://yoursite.com/some-page/',
			'sanitize_callback' => 'esc_url_raw'
		)
	);

	$wp_customize->add_control('wc_footer_cta_btnlink',
		array(
			'label' 		=> esc_html__('Right Side Button Link', 'eyecare'),
			'description' 	=> esc_html__('http://yoursite.com/some-page/', 'eyecare'),
			'section' 		=> 'wc_footer_cta',
			'type' 			=> 'text',
		)
	);