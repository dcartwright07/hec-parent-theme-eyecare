<?php
	//Getting Header
	get_header();
?>
    	
    <!-- Content section -->
    <div class="single-doctor-page module">
        <div class="row">
        	<?php
				$object_id = get_queried_object_id();
				
				//Getting Single Post Sidebar Position 
				$wc_sidebar_position_default = get_theme_mod("wc_disable_rightleft_optsidebar");
				$wc_sidebar_position_special = get_post_meta($object_id, "wc_innerpage_sidebar_position", true);
				
				if($wc_sidebar_position_special == "left_sidebar"  || 
				   $wc_sidebar_position_special == "right_sidebar" || 
				   $wc_sidebar_position_special == "disable_sidebar") { 
					$wc_sidebar_position = $wc_sidebar_position_special;
				} else { 
					$wc_sidebar_position = $wc_sidebar_position_default;
				}
			
				switch($wc_sidebar_position) { 
					case "left_sidebar":
						//left sidebar
						get_template_part('template-parts/sidebar/doctor-info-sidebar');
						//Getting posts sides
						get_template_part('template-parts/post-type/single-doctor');
						//Appiontment Form
						get_template_part('template-parts/sidebar/doctor-form-sidebar');
					break;

					case "right_sidebar":
						//Appiontment Form
						get_template_part('template-parts/sidebar/doctor-form-sidebar');
						//Getting posts sides
						get_template_part('template-parts/post-type/single-doctor');
						//Right sidebar
						get_template_part('template-parts/sidebar/doctor-info-sidebar');
					break;
					
					case "disable_sidebar":
						//Getting posts sides
						get_template_part('template-parts/post-type/single-doctor');
						//Appiontment Form
						get_template_part('template-parts/sidebar/doctor-form-sidebar');
					break;
					
					default:
						//left sidebar
						get_template_part('template-parts/sidebar/doctor-info-sidebar');
						//Getting posts sides
						get_template_part('template-parts/post-type/single-doctor');
						//Appiontment Form
						get_template_part('template-parts/sidebar/doctor-form-sidebar');
				}//Ends Switch
			?>
        </div><!-- Row Ends /-->
    </div>
    <!-- Content Section Ends /-->

	<?php
		$wc_default_test_status = get_theme_mod("wc_disable_testimonials");
		$wc_special_test_status = get_post_meta($object_id, "wc_testimonials_disable", true);
		
		/**
		 * Setting Behaviour for Testimonials
		 * Based on Default and Page Settings
		 *
		 * @Since 1.0.0
		 */
		 
		if(!empty($wc_special_test_status)) { 
			if($wc_special_test_status == 'on') { 
				$wc_testimonials_status = 'enable';
			} else { 
				$wc_testimonials_status = 'disable';
			}
		} else {
			if(empty($wc_default_test_status)) { 
				$wc_testimonials_status = 'enable';
			} else { 
				$wc_testimonials_status = 'disable';
			}
		} 
		
		if($wc_testimonials_status == "enable"):
		
		
		//getting taxonomy Ids from Customizer, and single Vet
		$default_testimonial_slug = get_theme_mod('wc_testimonials_group');
		$special_testimonial_slug = get_post_meta($object_id, 'wc_testimonials_group', true);
		
		//Setting preffered id
		if(!empty($special_testimonial_slug)) { 
			$group_id = $special_testimonial_slug;
		} else { 
			$group_id = $default_testimonial_slug;	
		}
		
		$taxonomy_array = '';
		
		//If id is not numeric or empty
		if(is_numeric($group_id)) { 
			$tax_array = array();
			$tax_array["taxonomy"] = esc_html__('testimonials_group', 'eyecare');
			$tax_array["field"] = 'term_id';
			$tax_array["terms"] = $group_id;
			
			$taxonomy_array = array($tax_array);
		}
		
	?>

	<!-- Our Team -->
    <div class="our-team module">
        <div class="section-title-wrapper row">
            <div class="section-title">
                <h2><?php esc_html_e("What", "eyecare"); ?> <span><?php esc_html_e("Patients Says", "eyecare"); ?></span></h2>
                <p><?php esc_html_e("We have great feedback about ", "eyecare"); ?><?php echo esc_html(get_the_title($object_id)); ?></p>
            </div>
        </div><!-- Section Title /-->
        
        <div class="row">
         <?php
		 	//getting testimonial posts
			$post_args = array(
				'post_type' => esc_html__('testimonial', 'eyecare'),
				'order' => 'DESC',
				'posts_per_page' => 2,
				'tax_query' => $taxonomy_array,
			);
			
			$testimonials_query = new WP_Query($post_args);

			//Loop starts
			if($testimonials_query->have_posts() ) {
				$output = '';
				while($testimonials_query->have_posts()) { 
					$testimonials_query->the_post();
					global $post;
				
					$testimonial_name 	= get_post_meta($post->ID, 'wc_testimonial_by', true);
					$testimonial_detail = get_post_meta($post->ID, 'wc_testimonial_detail', true);
				
					$output .= '<div class="testimonial medium-6 small-12 columns">';
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
            		$output .= '</div><!-- TEstimonial /-->';
				
				}//Endwhile	
				echo wp_kses_post($output);
			}//Endif
		 ?>   
            
                
        
        </div><!-- Row /-->
        
    </div>
    <!-- Our Team Ends /-->
    
    <?php 
		endif; 

	//Getting Footer
	get_footer();