<?php
	/*
	 * This file includes an Element to Kind Composer for extending row element.
	 */
	 
 	
	if(!function_exists('wc_extend_row') && function_exists('wc_required_modules')):
	add_action('init', 'wc_extend_row', 99 );
	
	function wc_extend_row() {
		if(function_exists('kc_add_map')) { 
			global $kc;

			$kc->add_map_param( 
				'kc_row', 
				array(
					'name' => 'wc_row_background',
					   'label' => esc_html__('Background Type', 'eyecare'),
					   'type' => 'select',
					   'options' => array(
					   				'default' => esc_html__('Transparent Background', 'eyecare'),
									'grey_background' => esc_html__('Grey Background', 'eyecare'),
									'dark_background' => esc_html__('Background Image with Little Transparent Background', 'eyecare')
					   ),
					  'admin_label' => true,
					   'description' => esc_html__('Select Background Type. To update style of these Types go to Appearance >> customize , Elements Section', 'eyecare')
				), 1 );

		} // End if
	}
	endif; //Function exist/not