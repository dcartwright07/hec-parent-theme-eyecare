<?php
	/*
	 * This file includes an Element to Kind Composer for Icon box.
	 */
	 
 	
	if(!function_exists('wc_optometrist_blog') && function_exists('wc_required_modules')):
	add_action('init', 'wc_optometrist_blog', 99 );
	
	function wc_optometrist_blog() {
	 
		if(function_exists('kc_add_map')) { 
			kc_add_map(
				array(
					'wc_kc_optometrist_blog' => array(
						'name' => esc_html__('Blog Posts', 'eyecare'),
						'description' => esc_html__('Add Blog Posts Style.', 'eyecare'),
						'icon' => 'fa-newspaper-o',
						'category' => esc_html__('Optometrist', 'eyecare'),
						'params' => array(
							array(
								'name' => 'wc_educblog_categories',
								'label' => esc_html__('Select Categories', 'eyecare'),
								'type' => 'post_taxonomy',
								'admin_label' => true,
								'description' => esc_html__('Select categories leave blank to featch from all.', 'eyecare')
							),
							array(
								'name' => 'wc_educblog_limit',
								'label' => esc_html__('Limit Posts', 'eyecare'),
								'type' => 'number_slider',  // USAGE RADIO TYPE
								'options' => array(    // REQUIRED
									'min' => -1,
									'max' => 10,
									'unit' => '',
									'show_input' => true
								),
								'admin_label' => true,
								'description' => esc_html__('Select -1 to Featch all Posts.', 'eyecare')
							),
							array(
								'name' => 'wc_educblog_columns',
								'label' => esc_html__('Columns To Show', 'eyecare'),
								'type' => 'select',
								'options' => array(
												'one-column' 	=> esc_html__('One Per Row', 'eyecare'),
												'two-column' 	=> esc_html__('Two Per Row', 'eyecare'),
												'three-column' 	=> esc_html__('Three Per Row', 'eyecare'),
												'four-column' 	=> esc_html__('Four Per Row', 'eyecare'),
												'six-column' 	=> esc_html__('Six Per Row', 'eyecare'),
											),
								'admin_label' => true,
								'description' => esc_html__('Select number of columns you want to display.', 'eyecare')
							),
							array(
								'name' => 'wc_educblog_special_appearance',
								'label' => esc_html__('Special Apperaance', 'eyecare'),
								'type' => 'checkbox',
								'options' => array(
												'yes' => esc_html__('Yes', 'eyecare'),
											),
								'admin_label' => true,
								'description' => esc_html__('If Checked Special Appearance for Posts, two main Columns, 1st column with big post, second column with 3 small posts stacked.', 'eyecare')
							),
							array(
								'name' => 'wc_educblog_excerpt_length',
								'label' => esc_html__('Excerpt Length', 'eyecare'),
								'type' => 'text',
								'admin_label' => true,
								'description' => esc_html__('Enter the Length of Excerpt you want to display.', 'eyecare')
							),
							array(
								'name' => 'wc_educblog_hide_meta',
								'label' => esc_html__('Hide Meta Data', 'eyecare'),
								'type' => 'checkbox',
								'options' => array(
												'yes' => esc_html__('Yes', 'eyecare'),
											),
								'admin_label' => true,
								'description' => esc_html__('If Checked meta data will hide.', 'eyecare')
							),
							array(
								'name' => 'wc_educblog_blog_button_link',
								'label' => esc_html__('Blog Button Link', 'eyecare'),
								'type' => 'text',
								'admin_label' => true,
								'description' => esc_html__('Enter the link of your posts page.', 'eyecare')
							),
							array(
								'name' => 'wc_educblog_blog_button_text',
								'label' => esc_html__('Blog Button Text', 'eyecare'),
								'type' => 'text',
								'admin_label' => true,
								'description' => esc_html__('Enter the text of your Visit blog button. If left blank button will not display.', 'eyecare')
							),
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
	
	
	if(!function_exists('wc_kc_optometrist_blog_shortcode') && function_exists('wc_shortcode')):
	
	//adds shortcode with callback
	wc_shortcode('wc_kc_optometrist_blog', 'wc_kc_optometrist_blog_shortcode');
 	
	
	function wc_kc_optometrist_blog_shortcode($atts){
		extract(wc_html_decode(shortcode_atts(array(
			//Parameters of Shortcode
			"wc_educblog_categories" 			=> "",
			"wc_educblog_columns" 				=> "",
			"wc_educblog_blog_button_link" 		=> "",
			"wc_educblog_blog_button_text" 		=> "",
			"wc_educblog_limit" 				=> "",
			"wc_educblog_excerpt_length" 		=> "",
			"wc_educblog_hide_meta" 			=> "",
			"wc_educblog_special_appearance" 	=> "",
			"_id" 								=> "",
		), $atts)));
		
		//set_escerpt length
		if(is_numeric($wc_educblog_excerpt_length)) { 
			$excerpt_length = $wc_educblog_excerpt_length;
		} else { 
			$excerpt_length = 90;
		}
		
		//Set posts to display:
		if(is_numeric($wc_educblog_limit)) { 
			$posts_to_display = $wc_educblog_limit;
		} else {
			$posts_to_display = 3;	
		}
		
		//setting categories to fetch data from.
		if(!empty($wc_educblog_categories)) {
			$categories_array 	= explode(',', $wc_educblog_categories);
			$category_fetch 	= '';
			$post_type 			= '';
			$counter 			= 1; 
			foreach($categories_array as $category) { 
				$category_array = explode(':', $category);	
				$post_type 		= $category_array[0];
				if($counter == '1') { 
					$category_fetch .= isset($category_array[1]) ? $category_array[1] : null;
				} else { 
					$category_fetch .= ','.$category_array[1];
				}
				$counter++;
			}
		} else { 
			$category_fetch = '';
		}
		
		//if Default type not set
		if(!isset($post_type)) { 
			$post_type = 'post';
		}
		
		//setting Columns classes 
		$column_class = $wrapper_class = '';
		if(!empty($wc_educblog_columns)) { 
			switch($wc_educblog_columns) {
				case 'one-column': 
					$column_class = 'medium-12 small-12 columns news';
					$wrapper_class = 'posts-wrapper row news-style2';
					$featured_img_class = 'post-thumb medium-6 small-12 columns';
					$blog_info_class = 'post-content medium-6 small-12 columns';
				break;
				
				case 'two-column': 
					$column_class = 'medium-6 small-12 columns news';
					$wrapper_class = 'posts-wrapper row';
					$featured_img_class = 'post-thumb';
					$blog_info_class = 'post-content';
				break;
				
				case 'three-column': 
					$column_class = 'medium-6 large-4 small-12 columns news';
					$wrapper_class = 'posts-wrapper row';
					$featured_img_class = 'post-thumb';
					$blog_info_class = 'post-content';
				break;
				
				case 'four-column': 
					$column_class = 'large-3 medium-6 small-12 columns news';
					$wrapper_class = 'posts-wrapper row';
					$featured_img_class = 'post-thumb';
					$blog_info_class = 'post-content';
				break;
				
				case 'six-column': 
					$column_class = 'large-2 medium-6 small-12 columns news';
					$wrapper_class = 'posts-wrapper row';
					$featured_img_class = 'post-thumb';
					$blog_info_class = 'post-content';
				break;
				
				default:
					$column_class 		= 'medium-6 small-12 columns news';
					$wrapper_class 		= 'posts-wrapper row';
					$featured_img_class = 'post-thumb';
					$blog_info_class 	= 'post-content';
			}//switch Ends
		}//End setting columns
		
		
		//Working on Output Here
		
		//Post Arguments To FEtch
		$post_args = array(
					'post_type' 			=> $post_type,
					'posts_per_page' 		=> $posts_to_display,
					'ignore_sticky_posts' 	=> 1,
					'category_name' 		=> $category_fetch,
				);
					
		$posts_query = new WP_Query($post_args);
		
		// The Loop
		if($posts_query->have_posts()) {
			$output = '<div id="'.esc_attr($_id).'" class="latest-news '.esc_attr($wrapper_class).'">';
			$post_counter = 0;
			
			if($wc_educblog_special_appearance == "yes") {
				
				//Special Appearance Loop
				while ($posts_query->have_posts() ) {
					$posts_query->the_post();
					global $post;
					
					
					if($post_counter == 0 || $post_counter == 1):	
						$output .= '<div class="large-6 medium-12 small-12 columns">';
					endif;
					
					if($post_counter >= 1) :
						$output .= '<div class="small-post">';
					endif;
					
					if(has_post_thumbnail()) {
						$post_class = "has-post-thumbnail special-appearance";	
					} else { 
						$post_class = "no-post-thumbnail special-appearance";
					}
					$output .= '<div class="post '.esc_attr($post_class).'">';
				
					$image_output = '';
					if(has_post_thumbnail()) {
						$image_output .= '<div class="'.esc_attr($featured_img_class).'">';
						$image_output .= '<a href="'.esc_url(get_the_permalink()).'">';
						$image_output .= get_the_post_thumbnail($posts_query->ID, 'wc-blog-small');
						$image_output .= '</a></div>';
					}
                
	                $block_output = '<div class="'.esc_attr($blog_info_class).'">';
				
					$categories = get_the_category();
					if (!empty( $categories )  && $post_counter == 0) {
						$block_output .= '<div class="category-block">';
						$block_output .= '<a href="'.esc_url(get_category_link($categories[0]->term_id)).'">'.esc_html($categories[0]->name).'</a>';
						$block_output .= '</div><!-- Category Block /-->';
					} //Get and Print First Category Title with Link
				
	                $block_output .= '<h4><a href="'.esc_url(get_the_permalink()).'">'.esc_html(get_the_title()).'</a></h4>';
					
				
					if($post_counter == 0) { 
						//$excerpt_length stay Default	
					} else { 
						$excerpt_length = 90;
					}
					
					$block_output .= '<p>'.strip_tags(wc_custom_excerpt_length($excerpt_length)).'<a href="'.esc_url(get_the_permalink()).'">'.esc_html__('Read More', 'eyecare').'&raquo;</a></p>';
					
					if($wc_educblog_hide_meta != 'yes' && $post_counter == 0) {			
						$block_output .= '<div class="post-meta"><ul class="menu"><li><i class="fa fa-clock-o" aria-hidden="true"></i> <a href="'.esc_url(get_the_permalink()).'">'.esc_html(get_the_time(get_option( 'date_format'))).'</a></li><li><i class="fa fa-user" aria-hidden="true"></i> '.wp_kses_post(get_the_author_posts_link()).' </li><li><i class="fa fa-comments" aria-hidden="true"></i> <a href="'.esc_url(get_comments_link()).'">'.get_comments_number().' '.esc_html__("Comments", 'eyecare').'</a></li></ul></div>';
					}
					
	                $block_output .= '</div>';
					
					$output .= $image_output.$block_output;
				
					$output .= '</div><!-- Post ends -->';
					
					if($post_counter >= 1) :
						$output .= '</div><!-- Small Post /-->';
					endif;
					
					$post_counter++;
					
					if($post_counter == 1 || $posts_to_display == $post_counter) { 
						$output .= '</div><!-- Column Ends /-->';
					}
				
				}// Special Apperance Loop Ends
			
			} else {
			
				//No Special Appearance Loop
				while ($posts_query->have_posts() ) {
					$posts_query->the_post();
					global $post;
				
					$output .= '<div class="'.esc_attr($column_class).'">';
					if(has_post_thumbnail()) {
						$post_class = "has-post-thumbnail";	
					} else { 
						$post_class = "no-post-thumbnail";
					}
					$output .= '<div class="post '.esc_attr($post_class).'">';
				
					$image_output = '';
					if(has_post_thumbnail()) {
						$image_output .= '<div class="'.esc_attr($featured_img_class).'">';
						$image_output .= '<a href="'.esc_url(get_the_permalink()).'">';
						$image_output .= get_the_post_thumbnail($posts_query->ID, 'wc-blog-small');
						$image_output .= '</a></div>';
					}
                
	                $block_output = '<div class="'.esc_attr($blog_info_class).'">';
				
					$categories = get_the_category();
					if ( ! empty( $categories ) ) {
						$block_output .= '<div class="category-block">';
						$block_output .= '<a href="'.esc_url(get_category_link($categories[0]->term_id)).'">'.esc_html($categories[0]->name).'</a>';
						$block_output .= '</div><!-- Category Block /-->';
					} //Get and Print First Category Title with Link
				
					$block_output .= '<h4><a href="'.esc_url(get_the_permalink()).'">'.esc_html(get_the_title()).'</a></h4>';
					
					$block_output .= '<p>'.strip_tags(wc_custom_excerpt_length($excerpt_length)).'<a href="'.esc_url(get_the_permalink()).'">'.esc_html__('Read More', 'eyecare').'&raquo;</a></p>';
					
					if($wc_educblog_hide_meta != 'yes') {			
						$block_output .= '<div class="post-meta"><ul class="no-bullet"><li><i class="fa fa-clock-o" aria-hidden="true"></i> <a href="'.esc_url(get_the_permalink()).'">'.esc_html(get_the_time(get_option( 'date_format'))).'</a></li><li><i class="fa fa-user" aria-hidden="true"></i> '.wp_kses_post(get_the_author_posts_link()).' </li><li><i class="fa fa-comments" aria-hidden="true"></i> <a href="'.esc_url(get_comments_link()).'">'.get_comments_number().' '.esc_html__("Comments", 'eyecare').'</a></li></ul></div>';
					}
					
					$block_output .= '</div>';
					
					$output .= $image_output.$block_output;
					
					$output .= '</div><!-- Post ends -->';
					$output .= '</div><!-- news Ends /-->';
					$post_counter++;
				}// No Special Appearance Loop Ends
			
			} //if Special Appearance condition Ends
			
			$output .= '<div class="clearfix"></div>';
			$output .= '</div><!-- main wrapper ends -->';
			
			if(!empty($wc_educblog_blog_button_text)) {
				$output .= '<div class="load-more text-center">';
				$output .= '<a href="'.esc_url($wc_educblog_blog_button_link).'" class="button primary bordered-dark">'.esc_html($wc_educblog_blog_button_text).'</a>';
				$output .= '</div><!-- Load more /-->';
			}//If load more button active.
			
			wp_reset_postdata();
		} // End loop If
		

		//return output for work!
		return $output;
	}//End of short code callback function
	endif; //function exists