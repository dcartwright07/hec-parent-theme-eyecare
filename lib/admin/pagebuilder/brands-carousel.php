<?php
	/*
	 * This file includes an Element to Kind Composer for Icon box.
	 */
	 
 	
	if(!function_exists('wc_brands_carousel') && function_exists('wc_required_modules')):
	add_action('init', 'wc_brands_carousel', 99 );
	
	function wc_brands_carousel() {
	 
		if(function_exists('kc_add_map')) { 
			kc_add_map(
				array(
					'wc_kc_brands_carousel' => array(
						'name' => esc_html__('Brands Carousel', 'eyecare'),
						'description' => esc_html__('Make Brands Carousel.', 'eyecare'),
						'icon' => 'fa-life-ring',
						'category' => esc_html__('Optometrist', 'eyecare'),
						'params' => array(
							array(
								'type' => 'group',
								'label' => esc_html__('Add Brands', 'eyecare'),
								'name' => 'wc_brandcarousel_images',
								'description' => '',
								'options' => array('add_text' => esc_html__('Add new partner', 'eyecare')),
								// default values when create new group
								
								// you can use all param type to register child params
								'params' => array(
									array(
										'type' => 'text',
										'label' => esc_html__('Partner Link', 'eyecare'),
										'name' => 'wc_brandcarousel_link',
										'description' => esc_html__('Enter URL to link the Brand/Parnter. Leave blank to not link.', 'eyecare'),
									),
									array(
										'type' => 'attach_image',
										'label' => esc_html__('Partner Logo', 'eyecare'),
										'name' => 'wc_brandcarousel_logo',
										'description' => esc_html__('Recommended Size 200x100', 'eyecare'),
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
	
	
	if(!function_exists('wc_kc_brands_carousel_shortcode') && function_exists('wc_shortcode')):
	
	//adds shortcode with callback
	wc_shortcode('wc_kc_brands_carousel', 'wc_kc_brands_carousel_shortcode');
 	
	
	function wc_kc_brands_carousel_shortcode($atts){
		extract(wc_html_decode(shortcode_atts(array(
			//Parameters of Shortcode
			"wc_brandcarousel_images" => "",
			"_id" => "",
		), $atts)));
		
		$output = '<div id="'.esc_attr($_id).'" class="brand-carousel side-controls">';
		
		if (is_array($wc_brandcarousel_images) || is_object($wc_brandcarousel_images)):
		//Loop to get Partners
		foreach($wc_brandcarousel_images as $key => $item ){
			
			//loop over each item
			if(!empty($item->wc_brandcarousel_logo)) { 
				$output .= '<div class="bran-logo">';
				
				if(!empty($item->wc_brandcarousel_link)) {
					$output .= '<a href="'.esc_url($item->wc_brandcarousel_link).'">';
				}

				$output .= wp_get_attachment_image($item->wc_brandcarousel_logo, array(200,100), "", array( "class" => "thumbnail"));

				if(!empty($item->wc_brandcarousel_link)) {
					$output .= '</a>';
				}

				$output .= '</div>';
			}//End if

		}//Foreach Ends
		endif;
		
		$output .= "</div><!-- main wrapper ends -->";
		$output .= '<div class="clearfix"></div>';
		//return output for work!
		return $output;
	}//End of short code callback function
	endif; //function exists