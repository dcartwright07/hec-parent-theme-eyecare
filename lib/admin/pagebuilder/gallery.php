<?php
	/*
	 * This file includes an Element to Kind Composer for Icon box.
	 */
	 
 	
	if(!function_exists('wc_gallery') && function_exists('wc_required_modules')):
	add_action('init', 'wc_gallery', 99 );
	
	function wc_gallery() {
	 
		if(function_exists('kc_add_map')) { 
			kc_add_map(
				array(
					'wc_kc_gallery' => array(
						'name' => esc_html__('Clinic Gallery', 'eyecare'),
						'description' => esc_html__('Make Beautiful Clinic Gallery.', 'eyecare'),
						'icon' => 'fa-camera',
						'category' => esc_html__('Optometrist', 'eyecare'),
						'params' => array(
							array(
								'type' => 'group',
								'label' => esc_html__('Add Gallery Items', 'eyecare'),
								'name' => 'wc_gallery_images',
								'description' => '',
								'options' => array('add_text' => esc_html__('Add new item', 'eyecare')),
								// default values when create new group
								
								// you can use all param type to register child params
								'params' => array(
									array(
										'type' => 'text',
										'label' => esc_html__('Description Of Image', 'eyecare'),
										'name' => 'wc_gallery_detail',
										'description' => esc_html__('Enter Some description about this image, this will display below image when large image opens in Lightbox.', 'eyecare'),
									),
									array(
										'type' => 'attach_image',
										'label' => esc_html__('Gallery Image', 'eyecare'),
										'name' => 'wc_gallery_image',
										'description' => esc_html__('Try to use similar size images, if looking for Masnory then try King Composer default gallery element.', 'eyecare'),
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
	
	
	if(!function_exists('wc_kc_gallery_shortcode') && function_exists('wc_shortcode')):
	
	//adds shortcode with callback
	wc_shortcode('wc_kc_gallery', 'wc_kc_gallery_shortcode');
 	
	
	function wc_kc_gallery_shortcode($atts){
		extract(wc_html_decode(shortcode_atts(array(
			//Parameters of Shortcode
			"wc_gallery_images" => "",
			"_id" => "",
		), $atts)));
		
		$output = '<div id="'.esc_attr($_id).'" class="gallery-container">';
		
		//Loop to get Partners
		foreach($wc_gallery_images as $key => $item ){
			$gallery_detail 	= $item->wc_gallery_detail;
			$gallery_id 		= $item->wc_gallery_image;
			
			//loop over each item
			if(!empty($gallery_id)) { 
				$small_image	= wp_get_attachment_image_src($gallery_id, array(337, 226));
				$full_image 	= wp_get_attachment_image_src($gallery_id, 'full');
			
				$output .= '<a href="'.esc_url($full_image[0]).'" data-lightbox="clinic-gallery" data-title="'.esc_attr($gallery_detail).'">';
       			$output .= '<img class="gallery-thumb" src="'.esc_url($small_image[0]).'" alt="'.esc_attr($gallery_detail).'"/>';
    			$output .= '</a>';
			}//End if

		}//Foreach Ends
		
		$output .= "</div><!-- main wrapper ends -->";
		$output .= '<div class="clearfix"></div>';
		//return output for work!
		return $output;
	}//End of short code callback function
	endif; //function exists