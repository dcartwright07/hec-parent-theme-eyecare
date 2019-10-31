<?php
	  //Blog Page Section
	  $wp_customize->add_section('wc_footer_bottom', 
		 array(
			'title' 		=> esc_html__( 'Footer Bottom Box', 'eyecare' ),
			'priority' 		=> 30,
			'capability' 	=> 'edit_theme_options',
			'description' 	=> esc_html__('Footer Bottom Options', 'eyecare'),
			'panel' 		=> 'wc_footer_panel',
		 ) 
	  );

	//Disable Call To Action Box
	$wp_customize->add_setting('wc_footer_bottom_display',
		array(
			'default' 			=> '',
			'sanitize_callback' => 'wc_sanitize_checkbox'
		)
	);

	$wp_customize->add_control('wc_footer_bottom_display',
		array(
			'label' 	=> esc_html__('Disable Footer Bottom Box', 'eyecare'),
			'section' 	=> 'wc_footer_bottom',
			'type' 		=> 'checkbox',
		)
	);
	
	//Adding line seprator.
	$wp_customize->add_control(
		new wc_eyecare_Customize_Misc_Control(
			$wp_customize,
			'wc_footer_bottom_lineone',
			array(
				'section'  => 'wc_footer_bottom',
				'type'     => 'line'
			)
		)
	);
	
	//Radio selection
	$wp_customize->add_setting('wc_footer_bottom_ls', 
		array(
			'default'        	=> 'selective-social-icons',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wc_sanitize_values'
		)
	);

	$wp_customize->add_control('wc_footer_bottom_ls', 
		array(
			'settings' 		=> 'wc_footer_bottom_ls',
			'label'   		=> esc_html__('Left Side Section', 'eyecare'),
			'description'	=> esc_html__('For copyright info and Selective icons please scroll down after selection.', 'eyecare'),
			'section' 		=> 'wc_footer_bottom',
			'type'    		=> 'radio',
			'choices'   	=> array(
				'copyright-info' 			=> esc_html__('Copyright Info', 'eyecare'),
				'selective-social-icons' 	=> esc_html__('Social Icons', 'eyecare'),
				'footer-menu' 	 			=> esc_html__('Footer Menu', 'eyecare'),
			),
		)
	);
	
	//Radio selection
	$wp_customize->add_setting('wc_footer_bottom_rs', 
		array(
			'default'        	=> 'copyright-info',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wc_sanitize_values'
		)
	);

	$wp_customize->add_control('wc_footer_bottom_rs', 
		array(
			'settings' 		=> 'wc_footer_bottom_rs',
			'label'   		=> esc_html__('Right Side Section', 'eyecare'),
			'description'	=> esc_html__('For copyright info and Selective icons please scroll down after selection.', 'eyecare'),
			'section' 		=> 'wc_footer_bottom',
			'type'    		=> 'radio',
			'choices'   	=> array(
				'copyright-info' 			=> esc_html__('Copyright Info', 'eyecare'),
				'selective-social-icons' 	=> esc_html__('Social Icons', 'eyecare'),
				'footer-menu' 	 			=> esc_html__('Footer Menu', 'eyecare'),
			),
		)
	);
	
	//Adding line seprator.
	$wp_customize->add_control(
		new wc_eyecare_Customize_Misc_Control(
			$wp_customize,
			'wc_footer_bottom_linetwo',
			array(
				'section'  => 'wc_footer_bottom',
				'type'     => 'line'
			)
		)
	);
	
	//Backgroun color
	$wp_customize->add_setting('wc_footer_bottom_bgcolor',
		array(
			'default' 			=> '',
			'capability' 		=> 'edit_theme_options',
			'sanitize_callback' => 'maybe_hash_hex_color'
		) 
	);      

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,
		'wc_footer_bottom_bgcolor',
			array(
				'label' 	=> esc_html__('Bottom Background Color', 'eyecare'),
				'section' 	=> 'wc_footer_bottom',
				'settings' 	=> 'wc_footer_bottom_bgcolor',
			) 
		)
	);
	
	//Backgroun color
	$wp_customize->add_setting('wc_footer_bottom_linkcolor',
		array(
			'default' 			=> '',
			'capability' 		=> 'edit_theme_options',
			'sanitize_callback' => 'maybe_hash_hex_color'
		) 
	);      

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,
		'wc_footer_bottom_linkcolor',
			array(
				'label' => esc_html__('Footer Bottom Text/Link Color', 'eyecare'),
				'section' => 'wc_footer_bottom',
				'settings' => 'wc_footer_bottom_linkcolor',
			) 
		)
	);
	
	//Backgroun color
	$wp_customize->add_setting('wc_footer_bottom_linkhvrcolor',
		array(
			'default' 			=> '',
			'capability' 		=> 'edit_theme_options',
			'sanitize_callback' => 'maybe_hash_hex_color'
		) 
	);      

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,
		'wc_footer_bottom_linkhvrcolor',
			array(
				'label' 	=> esc_html__('Footer Bottom Link Hover Color', 'eyecare'),
				'section' 	=> 'wc_footer_bottom',
				'settings' 	=> 'wc_footer_bottom_linkhvrcolor',
			) 
		)
	);
	
	//Adding line seprator.
	$wp_customize->add_control(
		new wc_eyecare_Customize_Misc_Control(
			$wp_customize,
			'wc_footer_bottom_linethree',
			array(
				'section'  => 'wc_footer_bottom',
				'type'     => 'line'
			)
		)
	);
	
	//add Phone Number
	$wp_customize->add_setting('wc_footer_bottom_copyright',
		array(
			'sanitize_callback' => 'force_balance_tags',
			'default' 			=> '2017 &copy; <a href="'.esc_url('http://www.webfulcreations.com/').'">'.esc_html__('Webful Creations Vision', 'eyecare').'</a>'.esc_html__(' All Rights Reserved.', 'eyecare'),			
		)
	);

	$wp_customize->add_control('wc_footer_bottom_copyright',
		array(
			'label' 		=> esc_html__('Copyright Information', 'eyecare'),
			'description' 	=> '',
			'section' 		=> 'wc_footer_bottom',
			'type' 			=> 'textarea',
		)
	);
	
	$wp_customize->add_setting(
        'wc_footer_bottom_selicons',
        array(
            'default'           => 'wc_socialoptions_fb_field,wc_socialoptions_tw_field,wc_socialoptions_lin_field,wc_socialoptions_in_field,wc_socialoptions_gp_field',
			'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        new wc_eyecare_Customize_Multi_checkbox_Control(
            $wp_customize,
            'wc_footer_bottom_selicons',
            array(
                'section' 		=> 'wc_footer_bottom',
                'type' 			=> 'checkbox-multiple',
				'label'   		=> esc_html__( 'Select Icons To Display', 'eyecare' ),
				'description' 	=> esc_html__('You can select icons here for Footer bottom type Icons.', 'eyecare'),
                'choices' => array(
                    'wc_socialoptions_phone'		=> esc_html__('Business Phone',  'eyecare'),
                    'wc_socialoptions_small_add'    => esc_html__('Small Address',	 'eyecare'),
                    'wc_socialoptions_email'       	=> esc_html__('Email',			 'eyecare'),
                    'wc_socialoptions_timings'     	=> esc_html__('Time Table',	 	 'eyecare'),
                    'wc_socialoptions_fb_field' 	=> esc_html__('Facebook',		 'eyecare'),
					'wc_socialoptions_tw_field' 	=> esc_html__('Twitter',		 'eyecare'),
					'wc_socialoptions_lin_field' 	=> esc_html__('LinkedIn',		 'eyecare'),
					'wc_socialoptions_in_field' 	=> esc_html__('Instagram',		 'eyecare'),
					'wc_socialoptions_gp_field' 	=> esc_html__('Google Plus',	 'eyecare'),
                	'wc_socialoptions_yt_field' 	=> esc_html__('YouTube',		 'eyecare')
				)
            )
        )
    );