<?php
	/*
	 * This file includes an Element to Kind Composer for Icon box.
	 */
	 
	
	if(!function_exists('wc_icon_box') && function_exists('wc_required_modules')):
	add_action('init', 'wc_icon_box', 99 );
	
	function wc_icon_box() {
	 
		if(function_exists('kc_add_map')) { 

			kc_add_map(
				array(
					'wc_kc_icon_box' => array(
						'name' => esc_html__('Icon Box', 'eyecare'),
						'description' => esc_html__('Display Icon box with heading and detail', 'eyecare'),
						'icon' => 'fa-diamond',
						'category' => esc_html__('Optometrist', 'eyecare'),
						'params' => array(
							array(
								'name' => 'wc_iconbox_icon',
								'label' => esc_html__('Icon For Box', 'eyecare'),
								'type' => 'icon_picker',
								'admin_label' => true,
								'description' => esc_html__('Please Select Icon for the Box.', 'eyecare')
							),
							array(
								'name' => 'wc_iconbox_title',
								'label' => esc_html__('Heading of Box', 'eyecare'),
								'type' => 'text',
								'admin_label' => true,
								'description' => esc_html__('Please enter Heading for box.', 'eyecare')
							),
							array(
								'name' => 'wc_iconbox_description',
								'label' => esc_html__('Enter Description', 'eyecare'),
								'type' => 'textarea',
								'admin_label' => true,
								'description' => esc_html__('Two three lines of Description.', 'eyecare')
							),
							array(
								'name' => 'wc_iconbox_link',
								'label' => esc_html__('Link Heading', 'eyecare'),
								'type' => 'text',
								'admin_label' => true,
								'description' => esc_html__('Link heading. Leave blank if you dont want to add link.', 'eyecare')
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
	
	
	if(!function_exists('wc_kc_icon_box_shortcode') && function_exists('wc_shortcode')):
	
	//adds shortcode with callback
	wc_shortcode('wc_kc_icon_box', 'wc_kc_icon_box_shortcode');
 	
	
	function wc_kc_icon_box_shortcode($atts){
		extract(wc_html_decode(shortcode_atts(array(
			//Parameters of Shortcode
			"wc_iconbox_icon" => "",
			"wc_iconbox_title"	=> "",
			"wc_iconbox_description" => "",
			"wc_iconbox_link" => "",
			"_id" => "",
		), $atts)));
		
		
		$output = '<div id="'.esc_attr($_id).'" class="icon-box">';
		$output .= '<div class="icon-side float-left">';
		$output .= '<i class="fa '.esc_attr($wc_iconbox_icon).'" aria-hidden="true"></i>
					</div>
					<div class="info-side float-left">';
		if($wc_iconbox_link != '') { 
			$output .= '<p><a href="'.esc_url($wc_iconbox_link).'"><strong>'.do_shortcode($wc_iconbox_title).'</strong></a><br>';	
		} else { 
			$output .= '<p><strong>'.do_shortcode($wc_iconbox_title).'</strong><br>';
		}		
		$output .= do_shortcode($wc_iconbox_description);
		$output .= '</p>
					</div>
					<div class="clearfix"></div>
				</div>';

		//return output for work!
		return $output;
	}//End of short code callback function
	endif; //function exists