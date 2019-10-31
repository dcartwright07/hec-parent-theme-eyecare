<?php
	//Registration of Topbar Section
	$wp_customize->add_section('wc_typography_options', 
		array(
			'title' => esc_html__( 'Typography Options', 'eyecare'),
			'priority' => 30,
			'capability' => 'edit_theme_options',
			'description' => esc_html__('Set Fonts and Size.', 'eyecare'),
		) 
	);
      
	//Main Headings Font Family
	$wp_customize->add_setting('wc_headings_font', array(
		'capability'     => 'edit_theme_options',
		'default'		 => 'droid-sans',
		'sanitize_callback' => 'sanitize_text_field',
	));

	$wp_customize->add_control('wc_headings_font', array(
		'settings' => 'wc_headings_font',
		'label'   => esc_html__('Select Headings Font Family.', 'eyecare'),
		'description' => esc_html__('This font family will work for h1,h2,h3,h4,h5,h6 buttons, pricing table titles, faq questions etc.', 'eyecare'),
		'section' => 'wc_typography_options',
		'type'    => 'select',
		'choices'    => array(
						'roboto' 		=> 'Roboto',
						'open-sans' 	=> 'Open Sans',
						'slabo-27px' 	=> 'Slabo 27px',
						'lato' 			=> 'Lato',
						'montserrat' 	=> 'Montserrat',
						'raleway' 		=> 'Raleway',
						'lora' 			=> 'Lora',
						'oxygen' 		=> 'Oxygen',
						'arvo' 			=> 'Arvo',
						'oswald' 		=> 'Oswald',
						'pt-sans' 		=> 'PT Sans',
						'droid-sans' 	=> 'Droid Sans',
						'dosis' 		=> 'Dosis',
						'noto-serif' 	=> 'Noto Serif',
						'poppins' 		=> 'Poppins'
					),
	));
	
	//Main Navigation Font Family
	$wp_customize->add_setting('wc_navigation_font', array(
		'capability'     => 'edit_theme_options',
		'default'		 => 'droid-sans',
		'sanitize_callback' => 'sanitize_text_field',
	));

	$wp_customize->add_control('wc_navigation_font', array(
		'settings' => 'wc_navigation_font',
		'label'   => esc_html__('Select Primary Navigation Font Family.', 'eyecare'),
		'description' => esc_html__('This font family will be used for primary navigation, parent and child menu items.', 'eyecare'),
		'section' => 'wc_typography_options',
		'type'    => 'select',
		'choices'    => array(
						'roboto' 		=> 'Roboto',
						'open-sans' 	=> 'Open Sans',
						'slabo-27px' 	=> 'Slabo 27px',
						'lato' 			=> 'Lato',
						'montserrat' 	=> 'Montserrat',
						'raleway' 		=> 'Raleway',
						'lora' 			=> 'Lora',
						'oxygen' 		=> 'Oxygen',
						'arvo' 			=> 'Arvo',
						'oswald' 		=> 'Oswald',
						'pt-sans' 		=> 'PT Sans',
						'droid-sans' 	=> 'Droid Sans',
						'dosis' 		=> 'Dosis',
						'noto-serif' 	=> 'Noto Serif',
						'poppins' 		=> 'Poppins'
					),
	));
	
	//Main Main Font family
	$wp_customize->add_setting('wc_main_font', array(
		'capability'     => 'edit_theme_options',
		'default'		 => 'lato',
		'sanitize_callback' => 'sanitize_text_field',
	));

	$wp_customize->add_control('wc_main_font', array(
		'settings' => 'wc_main_font',
		'label'   => esc_html__('Select Main Font Family.', 'eyecare'),
		'description' => esc_html__('This font family will be used for paragraphs, body, ul, a, ol and all other elements.', 'eyecare'),
		'section' => 'wc_typography_options',
		'type'    => 'select',
		'choices'    => array(
						'roboto' => 'Roboto',
						'open-sans' => 'Open Sans',
						'slabo-27px' => 'Slabo 27px',
						'lato' => 'Lato',
						'montserrat' => 'Montserrat',
						'raleway' => 'Raleway',
						'lora' => 'Lora',
						'oxygen' => 'Oxygen',
						'arvo' => 'Arvo',
						'oswald' => 'Oswald',
						'pt-sans' => 'PT Sans',
						'droid-sans' => 'Droid Sans',
						'dosis' => 'Dosis',
						'noto-serif' => 'Noto Serif',
						'poppins' => 'Poppins'
					),
	));