<?php
	/**
	 * @since 1.0.0
	 *
	 * Top Bar Options
	 */
	
	//Add Header Options Panel
	$wp_customize->add_panel('wc_topbar_panel', array(
		'title' 		=> esc_html__('Top Bar', 'eyecare'),
		'description' 	=> esc_html__('Set what to Display in Top Bar', 'eyecare'),
		'priority' 		=> 35,
	)); 
	
	
	/**
	 * Top Bar Styling
	 *
	 * Styling Section
	 */
	$wp_customize->add_section('wc_topbar_styling', 
		array(
			'title' 		=> esc_html__( 'Styling', 'eyecare' ),
			'priority' 		=> 35,
			'capability' 	=> 'edit_theme_options',
			'description' 	=> esc_html__('Manage Topbar styling', 'eyecare'),
			'panel' 		=> 'wc_topbar_panel',
		) 
	);

	//Add setting For Active or deactive topbar
	$wp_customize->add_setting('wc_topbar_sty_disable',
		array(
			'default' 			=> '',
			'sanitize_callback' => 'wc_sanitize_checkbox',
		) 
	);

	//Control to disable topbar
	$wp_customize->add_control(
		'wc_topbar_sty_disable',
		array(
			'label' 	=> esc_html__('Enable Topbar', 'eyecare'),
			'section' 	=> 'wc_topbar_styling',
			'type' 		=> 'checkbox',
		)
	);      

	$wp_customize->add_control(
		new wc_eyecare_Customize_Misc_Control($wp_customize,
			'wc_topbar_sty_line1',
			array(
				'section'  => 'wc_topbar_styling',
				'type'     => 'line'
			)
		)
	);

	$wp_customize->add_control(
		new wc_eyecare_Customize_Misc_Control($wp_customize,
		'wc_topbar_sty_heading1',
			array(
				'section'  => 'wc_topbar_styling',
				'type'     => 'heading',
				'label'	   => esc_html__('Styling', 'eyecare')
			)
		)
	);

	//Backgroun color
	$wp_customize->add_setting('wc_topbar_sty_bgcolor',
		array(
			'default' 			=> '',
			'capability' 		=> 'edit_theme_options',
			'sanitize_callback' => 'maybe_hash_hex_color'
		) 
	);      

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,
		'wc_topbar_sty_bgcolor',
		array(
			'label' 	=> esc_html__( 'Background Color', 'eyecare'),
			'section' 	=> 'wc_topbar_styling',
			'settings' 	=> 'wc_topbar_sty_bgcolor',
		) 
	));

	//Border color
	$wp_customize->add_setting('wc_topbar_sty_bordercolor',
		array(
			'default' 			=> '',
			'capability' 		=> 'edit_theme_options',
			'sanitize_callback' => 'maybe_hash_hex_color'
		) 
	);      

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,
		'wc_topbar_sty_bordercolor',
		array(
			'label' 	=> esc_html__( 'Border Color', 'eyecare'),
			'section' 	=> 'wc_topbar_styling',
			'settings' 	=> 'wc_topbar_sty_bordercolor',
		) 
	));

	//Top Bar Links Colors
	$wp_customize->add_setting('wc_topbar_sty_linkcolor',
		array(
			'default' 			=> '',
			'capability' 		=> 'edit_theme_options',
			'sanitize_callback' => 'maybe_hash_hex_color'
		) 
	);      

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,
		'wc_topbar_sty_linkcolor',
		array(
			'label' 	=> esc_html__( 'Links Color', 'eyecare'),
			'section' 	=> 'wc_topbar_styling',
			'settings' 	=> 'wc_topbar_sty_linkcolor',
		) 
	));

	//Top Bar Links Hover Color
	$wp_customize->add_setting('wc_topbar_sty_linkhovercolor',
		array(
			'default' 			=> '',
			'capability' 		=> 'edit_theme_options',
			'sanitize_callback' => 'maybe_hash_hex_color'
		) 
	);      

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,
		'wc_topbar_sty_linkhovercolor',
		array(
			'label' 	=> esc_html__( 'Links Hover Color', 'eyecare'),
			'section' 	=> 'wc_topbar_styling',
			'settings' 	=> 'wc_topbar_sty_linkhovercolor',
		) 
	));

	//Top Bar text Color
	$wp_customize->add_setting('wc_topbar_sty_textcolor',
		array(
			'default' 			=> '',
			'capability' 		=> 'edit_theme_options',
			'sanitize_callback' => 'maybe_hash_hex_color'
		) 
	);      

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,
		'wc_topbar_sty_textcolor',
		array(
			'label' 	=> esc_html__( 'Text Color', 'eyecare'),
			'section' 	=> 'wc_topbar_styling',
			'settings' 	=> 'wc_topbar_sty_textcolor',
		) 
	));
	
	
	/**
	 * Top Bar Left Section
	 *
	 * What to display in left side
	 */
	$wp_customize->add_section('wc_tb_left_section', 
		array(
			'title' 		=> esc_html__( 'Left Section', 'eyecare' ),
			'priority' 		=> 50,
			'capability' 	=> 'edit_theme_options',
			'description'	=> esc_html__('Manage Boxed Layout', 'eyecare'),
			'panel' 		=> 'wc_topbar_panel',
		) 
	); 	
	
	//Radio selection
	$wp_customize->add_setting('wc_tb_ls_type', array(
		'default'        	=> 'text-field',
		'capability'     	=> 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field'
	));

	$wp_customize->add_control('wc_tb_ls_type', array(
		'settings' 		=> 'wc_tb_ls_type',
		'label'   		=> esc_html__('Display on Left Side:', 'eyecare'),
		'section' 		=> 'wc_tb_left_section',
		'type'    		=> 'radio',
		'choices'    	=> array(
			'text-field' 		=> esc_html__('Text Field', 'eyecare'),
			'top-menu' 			=> esc_html__('Top Menu', 'eyecare'),
			'selective-icons' 	=> esc_html__('Selective Social Icons', 'eyecare'),
		),
	));

	//Adding line seprator.
	$wp_customize->add_control(
		new wc_eyecare_Customize_Misc_Control($wp_customize,
			'wc_tb_ls_line1',
			array(
				'section'  => 'wc_tb_left_section',
				'type'     => 'line'
			)
		)
	);

	//Adding line seprator.
	$wp_customize->add_control(
		new wc_eyecare_Customize_Misc_Control($wp_customize,
			'wc_tb_ls_heading1',
			array(
				'section' 	=> 'wc_tb_left_section',
				'type'      => 'heading',
				'label'     => esc_html__('Selective Icons OR Text Field', 'eyecare')
			)
		)
	);

	//Adding Description.
	$wp_customize->add_control(
		new wc_eyecare_Customize_Misc_Control($wp_customize,
			'wc_tb_ls_desc1',
			array(
				'section'  		=> 'wc_tb_left_section',
				'type'     		=> 'text',
				'description' 	=> esc_html__('Please go back to Top Bar &gt;&gt; Selective Icons Or Text Field to select and set values.', 'eyecare')
			)
		)
	);
	
	/**
	 * Top Bar Right Section
	 *
	 * What to display in right side
	 */
	$wp_customize->add_section('wc_tb_right_section', 
		array(
			'title' 		=> esc_html__( 'Right Section', 'eyecare' ),
			'priority' 		=> 50,
			'capability' 	=> 'edit_theme_options',
			'description'	=> esc_html__('Manage Right Side', 'eyecare'),
			'panel' 		=> 'wc_topbar_panel',
		) 
	); 	
	
	//Enabling or Disabling Search Box
	$wp_customize->add_setting('wc_topbar_search_box',
		array(
			'default' 			=> '',
			'sanitize_callback' => 'wc_sanitize_checkbox',
		) 
	);

	//Control to disable topbar
	$wp_customize->add_control(
		'wc_topbar_search_box',
		array(
			'label' 	=> esc_html__('Disable Search Box', 'eyecare'),
			'section' 	=> 'wc_tb_right_section',
			'type' 		=> 'checkbox',
		)
	);
	
	//Radio selection
	$wp_customize->add_setting('wc_tb_rs_type', array(
		'default'        	=> 'selective-icons',
		'capability'     	=> 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field'
	));

	$wp_customize->add_control('wc_tb_rs_type', array(
		'settings' 		=> 'wc_tb_rs_type',
		'label'   		=> esc_html__('Display on Right Side:', 'eyecare'),
		'section' 		=> 'wc_tb_right_section',
		'type'    		=> 'radio',
		'choices'    	=> array(
			'text-field' 		=> esc_html__('Text Field', 'eyecare'),
			'top-menu' 			=> esc_html__('Top Menu', 'eyecare'),
			'selective-icons' 	=> esc_html__('Selective Social Icons', 'eyecare'),
		),
	));

	//Adding line seprator.
	$wp_customize->add_control(
		new wc_eyecare_Customize_Misc_Control($wp_customize,
			'wc_tb_rs_line1',
			array(
				'section'  => 'wc_tb_right_section',
				'type'     => 'line'
			)
		)
	);

	//Adding line seprator.
	$wp_customize->add_control(
		new wc_eyecare_Customize_Misc_Control($wp_customize,
			'wc_tb_rs_heading1',
			array(
				'section' 	=> 'wc_tb_right_section',
				'type'      => 'heading',
				'label'     => esc_html__('Selective Icons OR Text Field', 'eyecare')
			)
		)
	);

	//Adding Description.
	$wp_customize->add_control(
		new wc_eyecare_Customize_Misc_Control($wp_customize,
			'wc_tb_rs_desc1',
			array(
				'section'  		=> 'wc_tb_right_section',
				'type'     		=> 'text',
				'description' 	=> esc_html__('Please go back to Top Bar &gt;&gt; Selective Icons Or Text Field to select and set values.', 'eyecare')
			)
		)
	);
	
	
	/**
	 * SELECTIVE ICONS OR Text Field
	 *
	 * Selective Icons or Text Field
	 */
	$wp_customize->add_section('wc_tb_selective', 
		array(
			'title' 		=> esc_html__( 'Selective Icons OR Text Field', 'eyecare' ),
			'priority' 		=> 50,
			'capability' 	=> 'edit_theme_options',
			'description'	=> esc_html__('Manage Right Side', 'eyecare'),
			'panel' 		=> 'wc_topbar_panel',
		) 
	); 
	
	$wp_customize->add_setting(
        'wc_tb_sel_icons',
        array(
            'default'           => 'wc_socialoptions_fb_field,wc_socialoptions_tw_field,wc_socialoptions_in_field,wc_socialoptions_gp_field',
			'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        new wc_eyecare_Customize_Multi_checkbox_Control(
            $wp_customize,
            'wc_tb_sel_icons',
            array(
                'section' 		=> 'wc_tb_selective',
                'type' 			=> 'checkbox-multiple',
				'label'   		=> esc_html__( 'Select Icons To Display', 'eyecare' ),
				'description' 	=> esc_html__('Once you selected icons to display go back to left, or right section of topbar and select selective icons for that section. To set values of these fields, please go back to Social links, address section.', 'eyecare'),
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
	
	//add googleplus In Link
	$wp_customize->add_setting(
		'wc_tb_sel_textfield',
		array(
			'default' 			=> esc_html__('We are Serving the Entire Texas Area So reach us today!', 'eyecare'),
			'sanitize_callback' => 'force_balance_tags',
		)
	);
	
	$wp_customize->add_control(
		'wc_tb_sel_textfield',
		array(
			'label' 		=> esc_html__('Text Field', 'eyecare'),
			'description' 	=> esc_html__('Once you enter text for topbar, go back to left or right top bar sections and select Text Field.', 'eyecare'),
			'section' 		=> 'wc_tb_selective',
			'type' 			=> 'textarea',
		)
	);