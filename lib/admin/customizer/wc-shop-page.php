<?php
	//Blog Page Section
	$wp_customize->add_section('wc_shoppage_options', 
		array(
			'title' 		=> esc_html__('Shop Page', 'eyecare' ),
			'priority' 		=> 40,
			'capability' 	=> 'edit_theme_options',
			'description' 	=> esc_html__('Manage Shop Page', 'eyecare'),
			'panel' 		=> 'wc_innerpages_panel',
		) 
	);
	
    //Right/Left/Diabls Sidebar
	$wp_customize->add_setting('wc_disable_rightleft_shoppage', array(
		'default'        	=> 'left_sidebar',
		'capability'     	=> 'edit_theme_options',
		'sanitize_callback' => 'wc_sanitize_values',
	));

	$wp_customize->add_control('wc_disable_rightleft_shoppage', array(
		'settings' 	=> 'wc_disable_rightleft_shoppage',
		'label'   	=> esc_html__('Select Sidebar Type:', 'eyecare'),
		'section' 	=> 'wc_shoppage_options',
		'type'    	=> 'radio',
		'choices'   => array(
			'left_sidebar' 		=> esc_html__('Left Sidebar', 'eyecare'),
			'right_sidebar' 	=> esc_html__('Right Sidebar', 'eyecare'),
			'disable_sidebar' 	=> esc_html__('Disable Sidebar', 'eyecare'),
		),
	));
	
	
	function shoppage_sanitize_products_perrow( $value ) {
 	   if ( ! in_array( $value, array('two-products', 'three-products', 'four-products')) ) {
 	       $value = 'three-products';
	   }
    	return $value;
	}
	
	//add Phone Number
	$wp_customize->add_setting('products_perrow_shop',
		array(
			'default' => 'three-products',
			'sanitize_callback' => 'shoppage_sanitize_products_perrow',
		)
	);

	$wp_customize->add_control('products_perrow_shop',
		array(
			'label' => esc_html__('Products Per Row', 'eyecare'),
			'description' => '',
			'section' => 'wc_shoppage_options',
			'type' => 'radio',
			'choices' => array( 
				'two-products' => esc_html__('Two Products', 'eyecare'),
				'three-products' => esc_html__('Three Products', 'eyecare'),
				'four-products' => esc_html__('Four Products', 'eyecare'),
			),
		)
	);
	
	//add Phone Number
	$wp_customize->add_setting('products_perpage_shop',
		array(
			'default' => '9',
			'sanitize_callback' => 'wc_check_number',
		)
	);

	$wp_customize->add_control('products_perpage_shop',
		array(
			'label' => esc_html__('Products Per Page', 'eyecare'),
			'description' => '',
			'section' => 'wc_shoppage_options',
			'type' => 'select',
			'choices' => array( 
				'3' => esc_html__('3 Products', 'eyecare'),
				'6' => esc_html__('6 Products', 'eyecare'),
				'9' => esc_html__('9 Products', 'eyecare'),
				'12' => esc_html__('12 Products', 'eyecare'),
				'15' => esc_html__('15 Products', 'eyecare'),
				'18' => esc_html__('18 Products', 'eyecare'),
				'21' => esc_html__('21 Products', 'eyecare'),
				'24' => esc_html__('24 Products', 'eyecare'),
			),
		)
	);