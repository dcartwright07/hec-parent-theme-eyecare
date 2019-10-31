<?php
	  //Registration of Topbar Section
	  $wp_customize->add_section('wc_titlesection_options', 
		 array(
			'title' 		=> esc_html__( 'Title Section', 'eyecare' ),
			'priority' 		=> 35,
			'capability' 	=> 'edit_theme_options',
			'description' 	=> esc_html__('Manage Title Section', 'eyecare'),
		 	'panel' 		=> 'wc_innerpages_panel',
		 ) 
	  );
      
	  //Disable Section title 
      $wp_customize->add_setting( 'wc_disable_sectiontitle',
         array(
            'default' 			=> '',
			'sanitize_callback' => 'wc_sanitize_checkbox'
         ) 
      );
	  
	  $wp_customize->add_control(
   	 		'wc_disable_sectiontitle',
    		array(
        		'label' 	=> esc_html__('Disable Title Section', 'eyecare'),
        		'section' 	=> 'wc_titlesection_options',
        		'type' 		=> 'checkbox',
    		)
		); 
		
	  //Disable BreadCrumbs 
      $wp_customize->add_setting( 'wc_disable_breadcrumbs',
         array(
            'default' 			=> '',
			'sanitize_callback' => 'wc_sanitize_checkbox'
         ) 
      );
	  
	  $wp_customize->add_control(
   	 		'wc_disable_breadcrumbs',
    		array(
        		'label' 	=> esc_html__('Disable Breadcrumbs', 'eyecare'),
        		'section' 	=> 'wc_titlesection_options',
        		'type' 		=> 'checkbox',
    		)
		); 
	  
	   //Title background image
       $wp_customize->add_setting(
    		'wc_title_background_image',
    		array(
        		'default' 			=> '',
				'sanitize_callback' => 'esc_url_raw'
    		)
		);
		
		$wp_customize->add_control(
    		new WP_Customize_Image_Control(
        	$wp_customize,
        	'wc_title_background_image',
       	 	array(
        	    'label' 		=> esc_html__('Upload Title Section Background', 'eyecare'),
				'description' 	=> esc_html__('Recommended Size: 1920x400.', 'eyecare'),
        	    'section' 		=> 'wc_titlesection_options',
        	    'settings' 		=> 'wc_title_background_image'
        		)
    		)
		);	
	   
		//Backgroun color
		$wp_customize->add_setting('wc_titlesection_background_color',
         array(
            'default' 			=> '',
            'capability' 		=> 'edit_theme_options',
			'sanitize_callback' => 'maybe_hash_hex_color',
         ) 
      );      
            
      $wp_customize->add_control( new WP_Customize_Color_Control(
         $wp_customize,
         'wc_titlesection_background_color',
         array(
            'label' 		=> esc_html__( 'Background Color', 'eyecare'),
            'section' 		=> 'wc_titlesection_options',
            'settings' 		=> 'wc_titlesection_background_color',
         ) 
      ));
	  
	  //Backgroun color
		$wp_customize->add_setting('wc_titlesection_linkstext_color',
         array(
            'default' 			=> '',
            'capability' 		=> 'edit_theme_options',
			'sanitize_callback' => 'maybe_hash_hex_color',
         ) 
      );      
            
      $wp_customize->add_control( new WP_Customize_Color_Control(
         $wp_customize,
         'wc_titlesection_linkstext_color',
         array(
            'label' 		=> esc_html__( 'Links/Text Color', 'eyecare'),
            'section' 		=> 'wc_titlesection_options',
            'settings' 		=> 'wc_titlesection_linkstext_color',
         ) 
      ));
	  //End of Title Section