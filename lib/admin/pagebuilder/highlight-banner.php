<?php
	/*
	 * This file includes an Element to Kind Composer for Icon box.
	 */
	 
	
	if(!function_exists('wc_highlight_banner') && function_exists('wc_required_modules')):
	add_action('init', 'wc_highlight_banner', 99 );
	
	function wc_highlight_banner() {
	 
		if(function_exists('kc_add_map')) { 

			kc_add_map(
				array(
					'wc_kc_highlight_banner' => array(
						'name' 			=> esc_html__('Highlight Banner', 'eyecare'),
						'description' 	=> esc_html__('Display highlight banner with image', 'eyecare'),
						'icon' 			=> 'fa-paper-plane',
						'category' 		=> esc_html__('Optometrist', 'eyecare'),
						'params' 		=> array(
							array(
								'name' 			=> 'wc_highlight_image',
								'label' 		=> esc_html__('Image For Banner', 'eyecare'),
								'type' 			=> 'attach_image',
								'admin_label' 	=> true,
								'description' 	=> esc_html__('Please Select Image For banner Recommended Size: 532x800.', 'eyecare')
							),
							array(
								'name' 			=> 'wc_highlightbox_title',
								'label' 		=> esc_html__('Heading of Box', 'eyecare'),
								'type' 			=> 'text',
								'admin_label' 	=> true,
								'description' 	=> esc_html__('Please enter Heading for box.', 'eyecare')
							),
							array(
								'name' 			=> 'wc_highlightbox_btn_txt',
								'label' 		=> esc_html__('Button Text', 'eyecare'),
								'type' 			=> 'text',
								'admin_label' 	=> true,
								'description' 	=> esc_html__('Please enter Text For button. Leave Blank to Hide Button.', 'eyecare')
							),
							array(
								'name' 			=> 'wc_highlightbox_btn_link',
								'label' 		=> esc_html__('Button Link', 'eyecare'),
								'type' 			=> 'text',
								'admin_label' 	=> true,
								'description' 	=> esc_html__('Please enter Heading for box.', 'eyecare')
							),
							array(
								'type' => 'group',
								'label' => esc_html__('Add Process', 'eyecare'),
								'name' => 'wc_highlight_process',
								'description' => '',
								'options' => array('add_text' => esc_html__('Add new process', 'eyecare')),
								// default values when create new group
								
								// you can use all param type to register child params
								'params' => array(
									array(
										'type' => 'text',
										'label' => esc_html__('Heading Of Process', 'eyecare'),
										'name' => 'wc_process_heading',
										'description' => esc_html__('Enter heading for this process.', 'eyecare'),
									),
									array(
										'type' => 'textarea',
										'label' => esc_html__('Text of Process', 'eyecare'),
										'name' => 'wc_process_description',
										'description' => esc_html__('Enter description for this process.', 'eyecare'),
									),
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
	
	
	if(!function_exists('wc_kc_highlight_banner_shortcode') && function_exists('wc_shortcode')):
	
	//adds shortcode with callback
	wc_shortcode('wc_kc_highlight_banner', 'wc_kc_highlight_banner_shortcode');
 	
	
	function wc_kc_highlight_banner_shortcode($atts){
		extract(wc_html_decode(shortcode_atts(array(
			//Parameters of Shortcode
			"wc_highlight_image" 		=> "",
			"wc_highlightbox_title"		=> "",
			"wc_highlight_process" 		=> "",
			"wc_highlightbox_btn_txt"	=> "",
			"wc_highlightbox_btn_link"	=> "",
			"_id" 						=> "",
		), $atts)));
		
		$output = '';
		$counter = 1;
		
		if(!empty($wc_highlight_image)) {
			$output .= wp_get_attachment_image($wc_highlight_image, 'full', "", array( "class" => "upper-background"));
		}
		
		$output .= '<div class="row">';
        $output .= '<div class="our-process-wrapper">';
 		$output .= '<div class="medium-12 large-8 large-offset-3 small-12 columns our-process">';
        
		if(!empty($wc_highlightbox_title)) {
			$output .= '<h2>'.esc_html($wc_highlightbox_title).'</h2>';
		}
		$output .= '<div class="row">';
		if (is_array($wc_highlight_process) || is_object($wc_highlight_process)):
		//Loop to get Process
		foreach($wc_highlight_process as $key => $item ){
			$output .= '<div class="process medium-6 small-12 columns">';
            $output .= '<div class="number">'.esc_attr($counter).'</div>';
       
	        $output .= '<div class="right-info">';
            $output .= '<h3>'.esc_html($item->wc_process_heading).'</h3>';
            $output .= '<p>'.esc_html($item->wc_process_description).'</p>';
            $output .= '</div>';
       
	        $output .= '<div class="clearfix"></div>';
            $output .= '</div><!-- process /-->';
		
			$counter++;
		}//Foreach Ends
		endif; 
		
		if(!empty($wc_highlightbox_btn_txt)) { 
			$output .= '<div class="clearfix"></div>';
			$output .= '<div class="ad-banner ap-btn">';
			$output .= '<a href="'.esc_url($wc_highlightbox_btn_link).'" class="button primary bordered-light">'.esc_html($wc_highlightbox_btn_txt).'</a>';
			$output .= '</div><!-- Button Ends /-->';
		}
		
		$output .= '</div><!-- Row Ends for Processes /-->';
		
		$output .= '</div><!-- Left Process Ends /-->';
		$output .= '</div><!-- Events Wrapper Ends /-->';
		$output .= '</div><!-- Row Ends /-->';
		
		//return output for work!
		return $output;
	}//End of short code callback function
	endif; //function exists