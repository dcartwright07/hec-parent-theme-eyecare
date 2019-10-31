<?php
	/*
	 * This file includes an Element to Kind Composer for Icon box.
	 */
	 
	
	if(!function_exists('wc_small_banner') && function_exists('wc_required_modules')):
	add_action('init', 'wc_small_banner', 99 );
	
	function wc_small_banner() {
	 
		if(function_exists('kc_add_map')) { 

			kc_add_map(
				array(
					'wc_kc_small_banner' => array(
						'name' => esc_html__('Small Banner', 'eyecare'),
						'description' => esc_html__('Display Small banner with image', 'eyecare'),
						'icon' => 'fa-heart',
						'category' => esc_html__('Optometrist', 'eyecare'),
						'params' => array(
							array(
								'name' => 'wc_small_image',
								'label' => esc_html__('Image For Banner', 'eyecare'),
								'type' => 'attach_image',
								'admin_label' => true,
								'description' => esc_html__('Please Select Image For banner Recommended Size: 532x800.', 'eyecare')
							),
							array(
								'name' => 'wc_smallbox_title',
								'label' => esc_html__('Heading of Box', 'eyecare'),
								'type' => 'text',
								'admin_label' => true,
								'description' => esc_html__('Please enter Heading for box.', 'eyecare')
							),
							array(
								'name' => 'wc_smallbox_description',
								'label' => esc_html__('Description of Box', 'eyecare'),
								'type' => 'textarea',
								'admin_label' => true,
								'description' => esc_html__('Please enter Description for box.', 'eyecare')
							),
							array(
								'name' => 'wc_smallbox_button_text',
								'label' => esc_html__('Button Text', 'eyecare'),
								'type' => 'text',
								'admin_label' => true,
								'description' => esc_html__('Text for button.', 'eyecare')
							),
							array(
								'name' 			=> 'wc_smallbox_button_link',
								'label' 		=> esc_html__('Button Link', 'eyecare'),
								'type' 			=> 'text',
								'admin_label' 	=> true,
								'description' 	=> esc_html__('Link for button.', 'eyecare')
							),
							array(
								'name' 			=> 'wc_smallbox_button_class',
								'label' 		=> esc_html__('Button Style', 'eyecare'),
								'type' 			=> 'radio',
								'options' 	=> array(
												'primary' 	=> esc_html__('Primary', 'eyecare'),
												'secondary' => esc_html__('Secondary', 'eyecare')
											),
								'admin_label' => true,
								'description' 	=> esc_html__('Style of button.', 'eyecare')
							),
							
							array(
								'type' => 'group',
								'label' => esc_html__('Checklist Items', 'eyecare'),
								'name' => 'wc_small_checklist',
								'description' => '',
								'options' => array('add_text' => esc_html__('Add list item', 'eyecare')),
								// default values when create new group
								
								// you can use all param type to register child params
								'params' => array(
									array(
										'type' => 'text',
										'label' => esc_html__('List Item Text', 'eyecare'),
										'name' => 'wc_small_list_text',
										'description' => esc_html__('Enter list item text.', 'eyecare'),
									)
								)
							)	
						)// Param ends
					),  // End element 
	 
				)
			); // End add map
		
		} // End if
	 
	}
	endif; //Function exist/not
	
	
	/*
	 * Generating Short Code
	 *
	 * This will help to Generate Shortcode for The Element we created above.
	 *
	 * Requires Composer plugin activate
	 */
	
	
	if(!function_exists('wc_kc_small_banner_shortcode') && function_exists('wc_shortcode')):
	
	//adds shortcode with callback
	wc_shortcode('wc_kc_small_banner', 'wc_kc_small_banner_shortcode');
 	
	
	function wc_kc_small_banner_shortcode($atts){
		extract(wc_html_decode(shortcode_atts(array(
			//Parameters of Shortcode
			"wc_small_image" 			=> "",
			"wc_smallbox_title"			=> "",
			"wc_smallbox_description" 	=> "",
			"wc_smallbox_button_text" 	=> "", 
			"wc_smallbox_button_link" 	=> "", 
			"wc_smallbox_button_class" 	=> "", 
		
			"wc_small_checklist" 		=> "",
			"_id" 						=> "",
		), $atts)));
		
		if(empty($wc_smallbox_button_class)) { 
			$wc_smallbox_button_class = "primary";
		}
		
		$output = '';
		
		$output .= '<div class="info-detail">';
        
		$output .= '<h3>';
		if(empty($wc_smallbox_title)) { 
			$output .= '&nbsp;';
		} else { 
			$output .= esc_html($wc_smallbox_title);
		}
		$output .= '</h3>';
        
		if(!empty($wc_smallbox_description)) {
			$output .= '<p>';
			$output .= esc_html($wc_smallbox_description);
			$output .= '</p>';
		}
        
		if (is_array($wc_small_checklist) || is_object($wc_small_checklist)) {
		$output .= '<ul class="checked-list">';
		
		//Loop to get Process
		foreach($wc_small_checklist as $key => $item ){
			
			if(!empty($item->wc_small_list_text)) { 
				$output .= '<li>'.esc_html($item->wc_small_list_text).'</li>';
			}
		}//Foreach Ends
		
		$output .= '</ul>';
		}
		
		if(!empty($wc_smallbox_button_text)) {
        $output .= '<a href="'.esc_url($wc_smallbox_button_link).'" class="'.esc_attr($wc_smallbox_button_class).' button">'.esc_html($wc_smallbox_button_text).'</a>';
		}
        $output .= '</div><!-- Box Detail /-->';
		
		if(!empty($wc_small_image)) {
			$output .= '<div class="info-thumb">';
			$output .= wp_get_attachment_image($wc_small_image, 'full');
			$output .= '</div>';
		}
		
		//return output for work!
		return $output;
	}//End of short code callback function
	endif; //function exists