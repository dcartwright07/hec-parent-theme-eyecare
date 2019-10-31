<?php
	//Registration of Site Identity Section
	$wp_customize->add_section('wc_site_social_options', 
		array(
			'title' => esc_html__( 'Social links, Address, Phone, Time', 'eyecare' ),
			'priority' => 65,
			'capability' => 'edit_theme_options',
			'description' => esc_html__('Set Social links, business address, phone and time table', 'eyecare'),
		) 
	);
      
	//add Phone Number
	$wp_customize->add_setting(
		'wc_socialoptions_phone',
		array(
			'default' => '123-123-1234',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
		
	$wp_customize->add_control(
		'wc_socialoptions_phone',
		array(
			'label' => esc_html__('Business Phone', 'eyecare'),
			'description' => '',
			'section' => 'wc_site_social_options',
			'type' => 'text',
		)
	);
		
	//add Small Address for header
	$wp_customize->add_setting(
		'wc_socialoptions_small_add',
		array(
			'default' => '248 Texas , 43539',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
		
	$wp_customize->add_control(
		'wc_socialoptions_small_add',
		array(
			'label' => esc_html__('Small Address For Header', 'eyecare'),
			'description' => '',
			'section' => 'wc_site_social_options',
			'type' => 'text',
		)
	);
		
	//add Large Address for footer
	$wp_customize->add_setting(
		'wc_socialoptions_large_add',
		array(
			'default' => '132 Jefferson Avenue, Suite 22, Redwood City, CA 94872, USA',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
		
	$wp_customize->add_control(
		'wc_socialoptions_large_add',
		array(
			'label' => esc_html__('Large Address For Footer', 'eyecare'),
			'description' => '',
			'section' => 'wc_site_social_options',
			'type' => 'text',
		)
	);
		
	//add Email for Footer
	$wp_customize->add_setting(
		'wc_socialoptions_email',
		array(
			'default' => 'ateeq@webfulcreations.com',
			'sanitize_callback' => 'sanitize_email',
		)
	);
		
	$wp_customize->add_control(
		'wc_socialoptions_email',
		array(
			'label' => esc_html__('Business Email address', 'eyecare'),
			'description' => '',
			'section' => 'wc_site_social_options',
			'type' => 'text',
		)
	);
		
	//add Time table for header
	$wp_customize->add_setting(
		'wc_socialoptions_timings',
		array(
			'default' => 'Monday - Friday : 09:00-17:00',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
		
	$wp_customize->add_control(
		'wc_socialoptions_timings',
		array(
			'label' => esc_html__('Business Timetable for Header', 'eyecare'),
			'description' => '',
			'section' => 'wc_site_social_options',
			'type' => 'text',
		)
	);
		
	//Adding line seprator.
	$wp_customize->add_control(
		new wc_eyecare_Customize_Misc_Control(
			$wp_customize,
			'wc_socialoptions_seprator_1',
			array(
				'section'  => 'wc_site_social_options',
				'type'     => 'line'
			)
		)
	);
		
	//add Facebook Link
	$wp_customize->add_setting(
		'wc_socialoptions_fb_field',
		array(
			'default' => 'http://facebook.com/',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	
	$wp_customize->add_control(
		'wc_socialoptions_fb_field',
		array(
			'label' => esc_html__('Facebook Link', 'eyecare'),
			'description' => '',
			'section' => 'wc_site_social_options',
			'type' => 'text',
		)
	);
		
	//add twitter Link
	$wp_customize->add_setting(
		'wc_socialoptions_tw_field',
		array(
			'default' => 'http://twitter.com/',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	
	$wp_customize->add_control(
		'wc_socialoptions_tw_field',
		array(
			'label' => esc_html__('Twitter Link', 'eyecare'),
			'description' => '',
			'section' => 'wc_site_social_options',
			'type' => 'text',
		)
	);
		
	//add Linked In Link
	$wp_customize->add_setting(
		'wc_socialoptions_lin_field',
		array(
			'default' => 'http://linkedin.com/',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	
	$wp_customize->add_control(
		'wc_socialoptions_lin_field',
		array(
			'label' => esc_html__('LinkedIn Link', 'eyecare'),
			'description' => '',
			'section' => 'wc_site_social_options',
			'type' => 'text',
		)
	);
		
	//add Instagram In Link
	$wp_customize->add_setting(
		'wc_socialoptions_in_field',
		array(
			'default' => 'http://Instagram.com/',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	
	$wp_customize->add_control(
		'wc_socialoptions_in_field',
		array(
			'label' => esc_html__('Instagram Link', 'eyecare'),
			'description' => '',
			'section' => 'wc_site_social_options',
			'type' => 'text',
		)
	);
	
	//add googleplus In Link
	$wp_customize->add_setting(
		'wc_socialoptions_gp_field',
		array(
			'default' => 'http://googleplus.com/',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
		
	$wp_customize->add_control(
		'wc_socialoptions_gp_field',
		array(
			'label' => esc_html__('Google Plus Link', 'eyecare'),
			'description' => '',
			'section' => 'wc_site_social_options',
			'type' => 'text',
		)
	);
	
	//add googleplus In Link
	$wp_customize->add_setting(
		'wc_socialoptions_yt_field',
		array(
			'default' => 'http://youtube.com/',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	
	$wp_customize->add_control(
		'wc_socialoptions_yt_field',
		array(
			'label' => esc_html__('Youtube Link', 'eyecare'),
			'description' => '',
			'section' => 'wc_site_social_options',
			'type' => 'text',
		)
	);