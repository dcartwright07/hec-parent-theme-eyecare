<?php
	/*
	 * This file includes an Element to Kind Composer for Section Title.
	 */
	 
 	
	if(!function_exists('wc_title_section') && function_exists('wc_required_modules')):
	add_action('init', 'wc_title_section', 99 );
	
	function wc_title_section() {
	 
		if(function_exists('kc_add_map')) { 

			kc_add_map(
				array(
					'wc_kc_section_title' => array(
						'name' => esc_html__('Section Title', 'eyecare'),
						'description' => esc_html__('Display Section Title', 'eyecare'),
						'icon' => 'fa-header',
						'category' => esc_html__('Optometrist', 'eyecare'),
						'params' => array(
							array(
								'name' => 'wc_section_title',
								'label' => esc_html__('Enter Title', 'eyecare'),
								'type' => 'text',
								'admin_label' => true,
								'description' => esc_html__('Please enter title of section here. Use &lt;span&gt;highlightext here&lt;/span&gt; around text to highlight.', 'eyecare')
							),
							array(
								'name' => 'wc_section_title_description',
								'label' => esc_html__('Enter Title Description', 'eyecare'),
								'type' => 'textarea',
								'admin_label' => true,
								'description' => esc_html__('Enter some description below title, leave blank for no Description.', 'eyecare')
							)
						)// Param ends
					),  // End element 
	 
				)
			); // End add map
		
		} // End if
	 
	}
	endif; //Function exist/not
	
	
	/**
	  * Generating Short Code
	  *
	  * This will help to Generate Shortcode for The Element we created above.
	  *
	  * Requires Composer plugin activate
	  */
	
	
	if(!function_exists('wc_kc_section_title_shortcode') && function_exists('wc_shortcode')):
	
	//adds shortcode with callback
	wc_shortcode('wc_kc_section_title', 'wc_kc_section_title_shortcode');
 	
	function wc_kc_section_title_shortcode($atts){
		extract(wc_html_decode(shortcode_atts(array(
			//Parameters of Shortcode
			"wc_section_title" => "",
			"wc_section_title_description"	=> "",
			"_id" => "",
		), $atts)));
		
		
		$output = '<div id="'.esc_attr($_id).'" class="section-title-wrapper columns row">';
		$output .= '<div class="section-title">';
		$output .= "<h2>".do_shortcode($wc_section_title)."</h2>";
		
		if(!empty($wc_section_title_description)) { 
			$output .= '<p>';
			$output .= esc_html($wc_section_title_description);
			$output .= '</p>';
		} //Title Description output.
		
		$output .= '</div><!-- Section title /-->';
		$output .= '</div><!-- Title Wrapper /-->';
		
		//return output for work!
		return $output;
	}//End of short code callback function
	endif; //function exists
		