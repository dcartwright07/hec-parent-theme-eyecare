<?php
	/*
	 * This file includes an Element to Kind Composer for Pricing Table.
	 */
	 
 	
	if(!function_exists('wc_pricing_table') && function_exists('wc_required_modules')):
	add_action('init', 'wc_pricing_table', 99 );
	
	function wc_pricing_table() {
	 
		if(function_exists('kc_add_map')) { 

			kc_add_map(
				array(
					'wc_kc_pricing_table' => array(
						'name' => esc_html__('Pricing Table', 'eyecare'),
						'description' => esc_html__('Add Pricing Table', 'eyecare'),
						'icon' => 'fa-list-alt',
						'category' => esc_html__('Optometrist', 'eyecare'),
						'params' => array(
							array(
								'name' => 'wc_pricetable_title',
								'label' => esc_html__('Table Heading', 'eyecare'),
								'type' => 'text',
								'admin_label' => true,
								'description' => esc_html__('Please enter Heading for table.', 'eyecare')
							),
							array(
								'name' => 'wc_pricetable_price',
								'label' => esc_html__('Price', 'eyecare'),
								'type' => 'text',
								'admin_label' => true,
								'description' => esc_html__('Price with currency symbol.', 'eyecare')
							),
							array(
								'name' => 'wc_pricetable_price_label',
								'label' => esc_html__('Price Label', 'eyecare'),
								'type' => 'text',
								'admin_label' => true,
								'description' => esc_html__('Small label with or without slash e.g: /Month.', 'eyecare')
							),
							array(
								'name' => 'wc_pricetable_button',
								'label' => esc_html__('Button Text', 'eyecare'),
								'type' => 'text',
								'admin_label' => true,
								'description' => esc_html__('Text for Table Button.', 'eyecare')
							),
							array(
								'name' => 'wc_pricetable_link',
								'label' => esc_html__('Button Link', 'eyecare'),
								'type' => 'text',
								'admin_label' => true,
								'description' => esc_html__('Link Table.', 'eyecare')
							),
							array(
								'type' => 'group',
								'label' => esc_html__('Add Table Fields', 'eyecare'),
								'name' => 'wc_pricetable_rows',
								'description' => '',
								'options' => array('add_text' => esc_html__('Add new table row', 'eyecare')),
								// default values when create new group
								
								// you can use all param type to register child params
								'params' => array(
									array( 
										'type' => 'select',
										'label' => esc_html__('Row Type', 'eyecare'),
										'name' => 'wc_pricingtable_row_type',
										'description' => esc_html__('Please select which type of row is this.', 'eyecare'),
										'options' => array( 
														'nothing_selected' 	=> esc_html__('Please select type', 'eyecare'),
														'checked_list' 		=> esc_html__('Checked List', 'eyecare'),
														'crossed_list' 		=> esc_html__('Crossed List', 'eyecare'),
										),
									),
									array(
										'type' => 'text',
										'label' => esc_html__('Row Label', 'eyecare'),
										'name' => 'wc_pricingtable_row_label',
										'description' => esc_html__('Title Row For Inner Area. If blank Title Row will not be included.', 'eyecare')
									)
								)
							)

						)// Param ends
					),  // End element
				)
			); // End add map
		
		} // End if
	 
	}//Function Ends
	endif; //Function exist/not
	
	
	/*
	 * Generating Short Code
	 *
	 * This will help to Generate Shortcode for The Element we created above.
	 *
	 * Requires Composer plugin activate
	 */
	
	
	if(!function_exists('wc_kc_pricing_table_shortcode') && function_exists('wc_shortcode')):
	
	//adds shortcode with callback
	wc_shortcode('wc_kc_pricing_table', 'wc_kc_pricing_table_shortcode');
 	
	
	function wc_kc_pricing_table_shortcode($atts){
		extract(wc_html_decode(shortcode_atts(array(
			//Parameters of Shortcode
			"wc_pricetable_title" 		=> "",
			"wc_pricetable_price" 		=> "",
			"wc_pricetable_price_label" => "",
			"wc_pricetable_button" 		=> "",
			"wc_pricetable_link" 		=> "",
			"wc_pricetable_rows" 		=> "",
			"wc_pricingtable_row_type" 	=> "",
			"wc_pricingtable_row_label" => "",
			"_id" => "",
		), $atts)));

		
		$output = '<div id="'.esc_attr($_id).'" class="price-plan">';
		
		$output .= '<div class="price-title">';
		if(!empty($wc_pricetable_title)) {
			$output .= '<h4 class="title-heading">'.esc_html($wc_pricetable_title).'</h4>';
		}
		
		if(!empty($wc_pricetable_price)) {
			$output .= '<strong>'.esc_html($wc_pricetable_price).'</strong>';
		}
		
		if(!empty($wc_pricetable_price_label)) {
			$output .= esc_html($wc_pricetable_price_label);
		}
        $output .= '</div><!-- price title ends /-->';
		
		
		$output .= '<ul class="price-details">';
		
		//Loop to get rows of Table
		foreach($wc_pricetable_rows as $key => $item ){
			
			if($item->wc_pricingtable_row_type == 'crossed_list') { 
				$list_class = "fa fa-times red";
			} else { 
				$list_class = "fa fa-check orange";
			}
			
			//loop over each item
			if(!empty($item->wc_pricingtable_row_title)) { 
				$output .= '<li class="title">'.esc_attr($item->wc_pricingtable_row_title).'</li>';
			}
			
			if(!empty($item->wc_pricingtable_row_label)) {
				$output .= '<li>';
				$output .= '<i class="'.$list_class.'" aria-hidden="true"></i>';
				$output .= esc_html($item->wc_pricingtable_row_label);				
				$output .= '</li>';
			}			
		}//Foreach Ends
		
		
		$output .= '</ul>';
		
		if(!empty($wc_pricetable_button) || !empty($wc_pricetable_link)) {
			$output .= '<a class="button secondary" href="'.esc_url($wc_pricetable_link).'">'.esc_attr($wc_pricetable_button).'</a>';
		}//Add button Ends
		
		$output .= '</div>';

		//return output for work!
		return $output;
	}//End of short code callback function
	endif; //function exists