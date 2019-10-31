<?php
	/*
	 * This file includes an Element to Kind Composer for Icon box.
	 */
	 
 	
	if(!function_exists('wc_faqs_box') && function_exists('wc_required_modules')):
	add_action('init', 'wc_faqs_box', 99 );
	
	function wc_faqs_box() {
	 
		if(function_exists('kc_add_map')) { 
			//Getting Services Groups Options to use below.
			$taxonomies = array(esc_html__('faqs_group', 'eyecare'));
			$args = array('orderby'=>'name','order'=>'ASC','hide_empty'=>true);
			
			$faq_group = get_terms($taxonomies, $args);
			
			$faq_tax['default'] = esc_html__('All Groups', 'eyecare');

			foreach($faq_group as $faq){
				$faq_slug = $faq->slug;
				$faq_name = $faq->name;
				
				$faq_tax[$faq_slug] = $faq_name;
			}
			
			kc_add_map(
				array(
					'wc_kc_faqs_box' => array(
						'name' => esc_html__('Faq Box', 'eyecare'),
						'description' => esc_html__('Make Faq section in accordion style.', 'eyecare'),
						'icon' => 'fa-lightbulb-o',
						'category' => esc_html__('Optometrist', 'eyecare'),
						'params' => array(
							array(
								'name' => 'wc_faqbox_group',
								'label' => esc_html__('Group Of FAQ\'s', 'eyecare'),
								'type' => 'select',
								'options' => $faq_tax,
								'admin_label' => true,
								'description' => esc_html__('Select Group of Services to Fetch Data from.', 'eyecare')
							),
							array(
								'name' => 'wc_faqbox_limit',
								'label' => esc_html__('Limit Questions', 'eyecare'),
								'type' => 'text',
								'admin_label' => true,
								'description' => esc_html__('Type -1 to fetch all Questions.', 'eyecare')
							),
							array(
								'name' => 'wc_faqbox_sort_type',
								'label' => esc_html__('Sort Type', 'eyecare'),
								'type' => 'select',
								'options' => array(
												'desc' => esc_html__('Descending', 'eyecare'),
												'asc' => esc_html__('Ascending', 'eyecare')
											),
								'admin_label' => true,
								'description' => esc_html__('Default DESC newest First..', 'eyecare')
							),
							array(
								'name' => 'wc_faqbox_grouped',
								'label' => esc_html__('Display Type', 'eyecare'),
								'type' => 'select',
								'options' => array(
												'display_all' => esc_html__('Display All in 1 Accordion without group title', 'eyecare'),
												'grouped_accordion' => esc_html__('Grouped with Seprate Accordion with group title', 'eyecare')
											),
								'admin_label' => true,
								'description' => esc_html__('If you want all questions display in single accordion select First option. Second option will print Group heading, and following its questions.', 'eyecare')
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
	
	
	if(!function_exists('wc_kc_faqs_box_shortcode') && function_exists('wc_shortcode')):
	
	//adds shortcode with callback
	wc_shortcode('wc_kc_faqs_box', 'wc_kc_faqs_box_shortcode');
 	
	
	function wc_kc_faqs_box_shortcode($atts){
		extract(wc_html_decode(shortcode_atts(array(
			//Parameters of Shortcode
			"wc_faqbox_group" => "",
			"wc_faqbox_limit" => "",
			"wc_faqbox_sort_type" => "",
			"wc_faqbox_grouped" => "",
			"_id" => "",
		), $atts)));
		
		$display_tax = '';
		
		$output = '<div class="faqs_container_wrapper">';
		
		//Setting Taxanomy if selected
		$display_tax = '';
		if(esc_attr($wc_faqbox_group) != 'default') { 
			$display_tax['taxonomy'] = esc_html__('faqs_group', 'eyecare');
			$display_tax['field'] = 'slug';
			$display_tax['terms'] = esc_attr($wc_faqbox_group);
			$display_tax = array($display_tax);
		}
		
		//Setting posts to Display
		if(is_numeric($wc_faqbox_limit)) { 
			$posts_to_display = esc_attr($wc_faqbox_limit);
		} else {
			$posts_to_display = -1;	
		}
		
		//Show Grid or Carousel
		if($wc_faqbox_sort_type == 'asc') { 
			$sort = 'ASC';
		} else { 
			$sort = 'DESC';
		}
		
		//Check if Display all, and Grouped Accordion
		if($wc_faqbox_grouped == 'display_all') {
			//Display All without Title
			$post_args = array(
						'post_type' => esc_html__('faq', 'eyecare'),
						'order' => $sort,
						'posts_per_page' => $posts_to_display,
						'tax_query' => $display_tax,
					);
					
			$faqs_query = new WP_Query($post_args);

			// The Loop
			if($faqs_query->have_posts()) {
				$counter = 1;
				$output .= '<div id="'.esc_attr($_id).'" class="faqs-box">';
				$output .= '<ul class="accordion" data-accordion data-allow-all-closed="true">';
				
				while ($faqs_query->have_posts() ) {
					$faqs_query->the_post();
					global $post;
					$class = '';
					
					if($counter == '1') {$class = ' is-active';} //Setting active class for First Tab
							
					$output .= '<li class="accordion-item'.esc_attr($class).'" data-accordion-item>';
                    $output .= '<a href="#" class="accordion-title">'.esc_html(get_the_title()).'</a>';
                    $output .= '<div class="accordion-content" data-tab-content>';
                    $output .= get_the_content();        
                    $output .= '</div><!-- Accordion Content -->';
                    $output .= '</li>';
				
					$counter++;	
				} // Wndwhile
				
				$output .= '</ul><!-- Ul ends -->';
				$output .= '</div><!-- FAqs box -->';
				
				wp_reset_postdata();
			}// End if

		} else if($wc_faqbox_grouped == 'grouped_accordion') { 
			//Groupled with title accordion
			
			//Getting Doctor Groups Options to use below.
			$taxonomies = array(esc_html__('faqs_group', 'eyecare'));
			
			//If Taxanomomies Exists 
			if(esc_attr($wc_faqbox_group) == 'default') { 
				$faqs_group = get_terms($taxonomies, array('orderby' => 'id', 'order' => 'ASC'));
			} else { 
				$faqs_group = get_terms($taxonomies, array('orderby' => 'id', 'order' => 'ASC', 'slug' => esc_attr($wc_faqbox_group)));
			}
			
			$group_counter 	= 1;
			
			foreach($faqs_group as $group):
				$group_slug 	= $group->slug;
				$group_name 	= $group->name;
				
				$display_tax 	= '';
		
				//Setting Taxanomy if selected
				$display_tax['taxonomy'] = esc_html__('faqs_group', 'eyecare');
				$display_tax['field'] = 'slug';
				$display_tax['terms'] = esc_attr($group_slug);
				$display_tax = array($display_tax);

				
				$post_args = array(
							'post_type' => esc_html__('faq', 'eyecare'),
							'order' => $sort,
							'posts_per_page' => $posts_to_display,
							'tax_query' => $display_tax,
						);
					
				$faqs_query = new WP_Query($post_args);

				// The Loop
				if($faqs_query->have_posts()) {
					$counter = 1;
					$spacer_class = "";
					
					if($group_counter > 1) { 
						$spacer_class = "small-spacer";
					}
					
					$output .= '<div class="group-wrapper-faq '.$spacer_class.'">';
					$output .= '<h4>'.esc_attr($group_name).'</h4>';
					$output .= '<div id="'.esc_attr($_id).'" class="faqs-box">';
					$output .= '<ul class="accordion" data-accordion data-allow-all-closed="true">';
					
					while ($faqs_query->have_posts() ) {
						$faqs_query->the_post();
						global $post;
						$class = '';
						
						if($counter == '1') {$class = ' is-active';} //Setting active class for First Tab
								
						$output .= '<li class="accordion-item'.esc_attr($class).'" data-accordion-item>';
						$output .= '<a href="#" class="accordion-title">'.esc_html(get_the_title()).'</a>';
						$output .= '<div class="accordion-content" data-tab-content>';
						$output .= get_the_content();        
						$output .= '</div><!-- Accordion Content -->';
						$output .= '</li>';
					
						$counter++;	
					} // Wndwhile
					
					$output .= '</ul><!-- Ul ends -->';
					$output .= '</div><!-- FAqs box -->';
					$output .= '</div><!-- group wrapper faq /-->';
					
					wp_reset_postdata();
				}// End if
				$group_counter++;
			endforeach;
		}
		
		$output .= "</div><!-- main wrapper ends -->";
		//return output for work!
		return $output;
	}//End of short code callback function
	endif; //function exists