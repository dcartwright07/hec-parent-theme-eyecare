<?php
	/*
	 * This file includes an Element to Kind Composer for Icon box.
	 */
	 
 	
	if(!function_exists('wc_testimonials_box') && function_exists('wc_required_modules')):
	add_action('init', 'wc_testimonials_box', 99 );
	
	function wc_testimonials_box() {
	 
		if(function_exists('kc_add_map')) { 
			//Getting Services Groups Options to use below.
			$taxonomies = array(esc_html__('testimonials_group', 'eyecare'));
			$args = array('orderby'=>'name','order'=>'ASC','hide_empty'=>true);
			
			$testimonials_group = get_terms($taxonomies, $args);
			
			$testimonials_tax['default'] = esc_html__('All Groups', 'eyecare');

			foreach($testimonials_group as $group){
				$group_slug = $group->slug;
				$group_name = $group->name;
				
				$testimonials_tax[$group_slug] = $group_name;
			}
			//taxanomy Choices Ends.
			
			kc_add_map(
				array(
					'wc_kc_testimonials_box' => array(
						'name' => esc_html__('Testimonials', 'eyecare'),
						'description' => esc_html__('Make testimonials Grid/Carousel.', 'eyecare'),
						'icon' => 'fa-commenting',
						'category' => esc_html__('Optometrist', 'eyecare'),
						'params' => array(
						
							array(
								'name' => 'wc_testimonialsbox_type',
								'label' => esc_html__('Display Type', 'eyecare'),
								'type' => 'select',
								'options' => array(
												'grid_type' => esc_html__('Grid Type', 'eyecare'),
												'carousel_type' => esc_html__('Carousel Type', 'eyecare')
											),
								'admin_label' => true,
								'description' => esc_html__('Select Display Type, Carousel will have full widh available space, for grid you can select columns below.', 'eyecare')
							),
							array(
								'name' => 'wc_testimonialsbox_columns',
								'label' => esc_html__('Columns', 'eyecare'),
								'type' => 'select',
								'options' => array(
												'one_columns' 	=> esc_html__('One Column', 'eyecare'),
												'two_columns' 	=> esc_html__('Two Columns', 'eyecare'),
												'three_columns' => esc_html__('Three Columns', 'eyecare'),
												'four_columns' 	=> esc_html__('Four Columns', 'eyecare'),
												'six_columns' 	=> esc_html__('Six Columns', 'eyecare')
											),
								'admin_label' => true,
								'description' => esc_html__('Select how many columns, This will work only with Grid type. Carousel will have full width 1 column', 'eyecare')
							),
							array(
								'name' => 'wc_testimonialsbox_limit',
								'label' => esc_html__('Loading Limit', 'eyecare'),
								'type' => 'text',
								'admin_label' => true,
								'description' => esc_html__('Leave Blank or put -1 for loading all testimonials.', 'eyecare')
							),
							array(
								'name' => 'wc_testimonialsbox_group',
								'label' => esc_html__('Group Of Testimonials', 'eyecare'),
								'type' => 'select',
								'options' => $testimonials_tax,
								'admin_label' => true,
								'description' => esc_html__('Select group of testimonials.', 'eyecare')
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
	
	
	if(!function_exists('wc_kc_testimonials_box_shortcode') && function_exists('wc_shortcode')):
	
	//adds shortcode with callback
	wc_shortcode('wc_kc_testimonials_box', 'wc_kc_testimonials_box_shortcode');
 	
	
	function wc_kc_testimonials_box_shortcode($atts){
		extract(wc_html_decode(shortcode_atts(array(
			//Parameters of Shortcode
			"wc_testimonialsbox_type" => "",
			"wc_testimonialsbox_columns" => "",
			"wc_testimonialsbox_limit" => "",
			"wc_testimonialsbox_group" => "",
			"_id" => "",
		), $atts)));
		
		//Setting Taxanomy if selected
		$display_tax = '';
		if(esc_attr($wc_testimonialsbox_group) != 'default') { 
			$display_tax['taxonomy'] 	= esc_html__('testimonials_group', 'eyecare');
			$display_tax['field'] 		= 'slug';
			$display_tax['terms'] 		= esc_attr($wc_testimonialsbox_group);
		}
		
		//post limit setting
		if(is_numeric($wc_testimonialsbox_limit)) {
			$posts_to_display = $wc_testimonialsbox_limit;	
		} else { 
			$posts_to_display = -1;
		}
		
		$post_args = array(
						'post_type' 		=> esc_html__('testimonial', 'eyecare'),
						'order' 			=> 'DESC',
						'posts_per_page' 	=> $posts_to_display,
						'tax_query' 		=> array($display_tax),
					);
					
		$testimonials_query = new WP_Query($post_args);
		
		
		//Loop starts
		if($testimonials_query->have_posts() ) {
			
			//setting available columns and wrappers
			if($wc_testimonialsbox_type == 'carousel_type' || $wc_testimonialsbox_type == '') { 
				
				if($testimonials_query->post_count == 1) { 
					$carousel_class = "";
				} else { 
					$carousel_class = " testimonials-carousel dots-style";
				}
				
				//Carousel Type.
				$testimonials_wrapper = "small-12 columns".$carousel_class;
				$testimonial_class = "testimonial";

			} elseif($wc_testimonialsbox_type == 'grid_type') { 
				$testimonials_wrapper = "testimonial-page test-wrap space-section";
				//Grid Type
				if($wc_testimonialsbox_columns == 'one_columns') { 
					$column_class = "medium-12 small-12 columns content-side";
				} elseif($wc_testimonialsbox_columns == 'two_columns') {
					$column_class = "medium-6 small-12 columns content-side";
				} elseif($wc_testimonialsbox_columns == 'three_columns') { 
					$column_class = "medium-4 small-12 columns content-side";
				} elseif($wc_testimonialsbox_columns == 'four_columns') { 
					$column_class = "medium-3 small-12 columns content-side";
				} elseif($wc_testimonialsbox_columns == 'six_columns') { 
					$column_class = "medium-2 small-12 columns content-side";
				}
				$testimonial_class = "testimonial";
			}
			
			$output = '<div class="row"><div id="'.esc_attr($_id).'" class="'.esc_attr($testimonials_wrapper).'">';
			
			while($testimonials_query->have_posts() ) {
				$testimonials_query->the_post();
				global $post;
				
				$testimonial_name 	= get_post_meta($post->ID, 'wc_testimonial_by', true);
				$testimonial_detail = get_post_meta($post->ID, 'wc_testimonial_detail', true);
				
				if($wc_testimonialsbox_type == 'grid_type') {
					$output .= '<div class="'.esc_attr($column_class).'">';
				}
				
				$output .= '<div class="'.esc_attr($testimonial_class).'">';
				
				
				$output .= '<div class="quote">';
                $output .= '<p>'.esc_html($testimonial_detail).'</p>';
                $output .= '</div>';
                $output .= '<div class="student">';
	            $output .= '<div class="photo">';
                               if(has_post_thumbnail()) {
									$output .= get_the_post_thumbnail($post->ID, 'wc-testimonial-thumb');
								}
                $output .= '</div>';
                $output .= '<p>'.esc_html($testimonial_name).'</p>';
                $output .= '<p>'.esc_html(get_the_title()).'</p>';
                $output .= '</div>';
				
				$output .= '</div><!-- testimonial /-->';
				
				if($wc_testimonialsbox_type == 'grid_type') {
					$output .= '</div>';
				}
			}//End while
			
			$output .= '</div></div>';		

			wp_reset_postdata();
		} else { 
			//No post found in testimonials
		} //End if loop
		
		//return output for work!
		return $output;
	}//End of short code callback function
	endif; //function exists	