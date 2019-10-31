<?php
/**
 * Contains Methods which create Custom CSS
 * From Metaboxes and Customizer
 *
 * @since 1.0.0
 */	
 
 class Wc_eyecare_Generated_CSS { 
	
	//Function Check if Special CSS available.
	public static function wc_check_special($field_name) { 
		$return = '';
		global $wp_query;
		$post_id = $wp_query->get_queried_object_id();
		
		if(class_exists('WooCommerce') && is_shop()){
			$post_id = get_option('woocommerce_shop_page_id');
		}
	  
	    $mod = get_post_meta($post_id, $field_name, true);
		
		if(empty($mod)) { 
			return FALSE;
		} else { 
			return TRUE;
		}
	}
	
   //Function to Generate CSS output
   public static function wc_generated_header_output() {
	   global $wp_query;
		$post_id = $wp_query->get_queried_object_id();
		
		if(class_exists('WooCommerce') && is_shop()){
			$post_id = get_option('woocommerce_shop_page_id');
		}
		
		//Font Family array Defination
		$font_family_array = array( 
				'roboto'     => "'Roboto', sans-serif",
				'open-sans'  => "'Open Sans', sans-serif",
				'slabo-27px' => "'Slabo 27px', serif",
				'lato' 		 => "'Lato', sans-serif",
				'montserrat' => "'Montserrat', sans-serif",
				'raleway' 	 => "'Raleway', sans-serif",
				'lora' 		 => "'Lora', serif",
				'oxygen' 	 => "'Oxygen', sans-serif",
				'arvo' 		 => "'Arvo', serif",
				'oswald' 	 => "'Oswald', sans-serif",
				'pt-sans' 	 => "'PT Sans', sans-serif",
				'droid-sans' => "'Droid Sans', sans-serif",
				'dosis' 	 => "'Dosis', sans-serif",
				'noto-serif' => "'Noto Serif', serif",
				'poppins' 	 => "'Poppins', sans-serif",
			); //Declaring Array Ends.
      ?>
      <!--Customizer CSS--> 
      <style type="text/css">
           <?php
		   		/**
				 * Typography CSS
				 * Font Family CSS
				 */
		  		$wc_headings_font 	= get_theme_mod('wc_headings_font');
				$wc_navigation_font = get_theme_mod('wc_navigation_font');
				$wc_primary_font 	= get_theme_mod('wc_main_font');
				
				//setting Headings Font
				if(!empty($wc_headings_font)) { 
					$family = $font_family_array[$wc_headings_font];
					echo "h1,h2,h3,h4,h5,h6, h2 a, h3 a, h4 a, h5 a, h6 a, h1 span, h2 span, h3 span, h4 span, h5 span, .tabs li a, .accordion-title, .pricing-table .title { font-family: ".$family."; }";
				}
				
				//Setting Navigation Font
				if(!empty($wc_navigation_font)) { 
					$family = $font_family_array[$wc_navigation_font];
					echo ".top-bar { font-family:".$family."; }";
				}
				
				//setting Primary Font family
				if(!empty($wc_primary_font)) { 
					$family = $font_family_array[$wc_primary_font];
					echo "body {font-family: ".$family."; }";
				}
				
				
				/**
				 * General Colors
				 * Content Area
				 */
				self::wc_generate_css('body', 'background-color', 'wc_go_colors_bodybg', '0', 'customizer');
				self::wc_generate_css('h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, h1 span , h2 span, h3 span, h4 span, h5 span, h6 span', 'color', 'wc_go_colors_headingsclr', '0', 'customizer');
				self::wc_generate_css('label, p, ul, ol, a, blockquote, input, textarea, select, [type=date], [type=text], [type=email], span, strong, div', 'color', 'wc_go_colors_txtcolor', '0', 'customizer');
				self::wc_generate_css('a', 'color', 'wc_go_colors_linksclr', '0', 'customizer');
				self::wc_generate_css('a:hover', 'color', 'wc_go_colors_linkshvrclr', '0', 'customizer');
				
				
				 
		   		/**
				 * Generates CSS for Box Layout
				 */
				if(self::wc_check_special('wc_boxedlayout_bg_color')) { 
					self::wc_generate_css('body.box', 'background-color', 'wc_boxedlayout_bg_color', '0', 'metabox');
				} else { 
					self::wc_generate_css('body.box', 'background-color', 'wc_go_boxed_bgcolor', '0', 'customizer');
				} //Boxed BG color

		   		if(self::wc_check_special('wc_boxedlayout_bg_image')) {
					self::wc_generate_css('body.box', 'background-image', 'wc_boxedlayout_bg_image', '0', 'metabox');
				} else { 
					self::wc_generate_css('body.box', 'background-image', 'wc_go_boxed_bgimage', '0', 'customizer');
				} //Boxed BG image
				
				
				//Appointment form Dr
				self::wc_generate_css('.inner-column', 'background-color', 'wc_appointment_bg_color', '0', 'customizer');
				
				
				/**
				 * Preloader Colors
				 */
				self::wc_generate_css('.preloader',	'background-color', 'wc_preloader_pagebg', 	'0', 'customizer');
				self::wc_generate_css('.cssload-thecube .cssload-cube:before',	'background-color', 'wc_preloader_color', 	'0', 'customizer'); 
		   
		   
		   
		   		/**
				 * Scroll Up Colors
				 */
				self::wc_generate_css('#top',		'background-color', 'wc_scrollup_bgcolor', 			 '0', 'customizer');
				self::wc_generate_css('#top',		'border-color', 	'wc_scrollup_arrowcolor', 		 '0', 'customizer');  
		   		self::wc_generate_css('#top',		'color', 			'wc_scrollup_arrowcolor', 		 '0', 'customizer');
				self::wc_generate_css('#top:hover',	'background-color', 'wc_scrollup_hover_bgcolor', 	 '0', 'customizer');
				self::wc_generate_css('#top:hover',	'border-color', 	'wc_scrollup_hover_arrowcolor',  '0', 'customizer');  
		   		self::wc_generate_css('#top:hover', 'color', 			'wc_scrollup_hover_arrowcolor',  '0', 'customizer');
				
				
				
				/**
				 * CSS for Top Bar
				 */
				if(self::wc_check_special('wc_topbar_sty_bgcolor')) { 
					self::wc_generate_css('.topBar', 'background-color', 'wc_topbar_sty_bgcolor', '0', 'metabox');
				} else { 
					self::wc_generate_css('.topBar', 'background-color', 'wc_topbar_sty_bgcolor', '0', 'customizer');
				} //Top Bar BG color
				
				if(self::wc_check_special('wc_topbar_sty_bordercolor')) { 
					self::wc_generate_css('.topBar', 'border-color', 'wc_topbar_sty_bordercolor', '0', 'metabox');
				} else { 
					self::wc_generate_css('.topBar', 'border-color', 'wc_topbar_sty_bordercolor', '0', 'customizer');
				} //Top Bar Border color
				
				if(self::wc_check_special('wc_topbar_sty_linkscolor')) { 
					self::wc_generate_css('.topBar a, .topBar ul li a', 'color', 'wc_topbar_sty_linkscolor', '0', 'metabox');
				} else { 
					self::wc_generate_css('.topBar a, .topBar ul li a', 'color', 'wc_topbar_sty_linkcolor', '0', 'customizer');
				} //Top Bar Link color
				
				if(self::wc_check_special('wc_topbar_sty_linkhovercolor')) { 
					self::wc_generate_css('.topBar a:hover, .topBar ul li a:hover', 'color', 'wc_topbar_sty_linkhovercolor', '0', 'metabox');
				} else { 
					self::wc_generate_css('.topBar a:hover, .topBar ul li a:hover', 'color', 'wc_topbar_sty_linkhovercolor', '0', 'customizer');
				} //Top Bar Link Hover color
				
				if(self::wc_check_special('wc_topbar_sty_txtcolor')) { 
					self::wc_generate_css('.topBar, .topBar p, .topBar ul li, .topBar strong', 'color', 'wc_topbar_sty_txtcolor', '0', 'metabox');
				} else { 
					self::wc_generate_css('.topBar, .topBar p, .topBar ul li, .topBar strong', 'color', 'wc_topbar_sty_textcolor', '0', 'customizer');
				} //Top Bar Text color
				
				
				
				/**
				 * Header Styling
				 * Header colors/style
				 */
				if(self::wc_check_special('wc_header_sty_bgcolor')) { 
					self::wc_generate_css('.header', 'background-color', 'wc_header_sty_bgcolor', '0', 'metabox');
				} else { 
					self::wc_generate_css('.header', 'background-color', 'wc_header_sty_bgcolor', '0', 'customizer');
				} //Background Color 
				
				if(self::wc_check_special('wc_header_sty_linkcolor')) { 
					self::wc_generate_css('.navigation .search-wrap a, .navigation .top-bar ul li a, .nav-dark .top-bar ul li a, .nav-dark .search-wrap a', 'color', 'wc_header_sty_linkcolor', '0', 'metabox');
				} else { 
					self::wc_generate_css('.navigation .search-wrap a, .navigation .top-bar ul li a, .nav-dark .top-bar ul li a, .nav-dark .search-wrap a', 'color', 'wc_header_sty_linkcolor', '0', 'customizer');
				} //link Color

				if(self::wc_check_special('wc_header_sty_activebordercolor')) { 
					self::wc_generate_css('.header .is-active a, .navigation .is-active a, .top-bar ul li a:hover', 'background-color', 'wc_header_sty_activebordercolor', '1', 'metabox');
				} else { 
					self::wc_generate_css('.header .is-active a, .navigation .is-active a, .top-bar ul li a:hover', 'background-color', 'wc_header_sty_hoverbgcolor', '1', 'customizer');
				}//Active/Hover link border color
				
				if(self::wc_check_special('wc_header_sty_activelinkcolor')) { 
					self::wc_generate_css('.navigation .search-wrap a:hover, .navigation .top-bar ul li a:hover, .header .is-active a, .top-bar ul li a:hover, .search-wrap a:hover', 'color', 'wc_header_sty_activelinkcolor', '1', 'metabox');
					self::wc_generate_css('.navigation .top-bar .dropdown.menu>li.opens-right>.is-dropdown-submenu', 'border-top-color', 'wc_header_sty_activelinkcolor', '1', 'metabox');
				} else { 
					self::wc_generate_css('.navigation .search-wrap a:hover, .navigation .top-bar ul li a:hover, .header .is-active a, .top-bar ul li a:hover, .search-wrap a:hover', 'color', 'wc_header_sty_hoverlinkcolor', '1', 'customizer');
					self::wc_generate_css('.navigation .top-bar .dropdown.menu>li.opens-right>.is-dropdown-submenu', 'border-top-color', 'wc_header_sty_hoverlinkcolor', '1', 'customizer');
				}//Active/Hover Link Color
				
				if(self::wc_check_special('wc_header_sty_submbgcolor')) { 
					self::wc_generate_css('.top-bar .submenu li a', 'background-color', 'wc_header_sty_submbgcolor', '1', 'metabox');
				} else { 
					self::wc_generate_css('.top-bar .submenu li a', 'background-color', 'wc_header_sty_subme_bgcolor', '1', 'customizer');
				}//Sub Menu Background Color
				
				if(self::wc_check_special('wc_header_sty_submlinkcolor')) { 
					self::wc_generate_css('.header .is-active .submenu li a, .top-bar .submenu li a', 'color', 'wc_header_sty_submlinkcolor', '1', 'metabox');
				} else { 
					self::wc_generate_css('.header .is-active .submenu li a, .top-bar .submenu li a', 'color', 'wc_header_sty_subme_linkcolor', '1', 'customizer');
				}//Sub Menu Link Color
				
				if(self::wc_check_special('wc_header_sty_submlinkhvrcolor')) { 
					self::wc_generate_css('.navigation .is-active .submenu li a:hover, .header .is-active .submenu li a:hover, .header .is-active .submenu li a:hover, .top-bar .submenu li a:hover', 'color', 'wc_header_sty_submlinkhvrcolor', '1', 'metabox');
				} else { 
					self::wc_generate_css('.navigation .is-active .submenu li a:hover, .header .is-active .submenu li a:hover, .top-bar .submenu li a:hover', 'color', 'wc_header_sty_subme_linkhvrcolor', '1', 'customizer');
				}//Sub Menu Link Hover Color
				
				if(self::wc_check_special('wc_header_sty_type2bgcolor')) { 
					self::wc_generate_css('.navigation', 'background-color', 'wc_header_sty_type2bgcolor', '0', 'metabox');
				} else { 
					self::wc_generate_css('.navigation', 'background-color', 'wc_header_sty_typetwo_bgcolor', '0', 'customizer');
				}//Header Type 2 NAv bg color
				
				
				
				/**
				 * Title Section
				 * Styles and Colors
				 */
				if(self::wc_check_special('wc_background_title_section')) { 
					self::wc_generate_css('.title-section::after', 'background-image', 'wc_background_title_section', '0', 'metabox');
				} else { 
					self::wc_generate_css('.title-section::after', 'background-image', 'wc_title_background_image', '0', 'customizer');
				}//Background Image
				
				if(self::wc_check_special('wc_bgcolor_title_section')) { 
					$hexcolor = get_post_meta($post_id, "wc_bgcolor_title_section", true);
					if($hexcolor != '') { 
						$rgbacolor = wc_hex2rgba($hexcolor, '0.7');
						echo '.title-section { 
							background-color:'.$rgbacolor.' !important;
						}';
					}
				} else { 
					$hexcolor = get_theme_mod("wc_titlesection_background_color");
					if($hexcolor != '') { 
						$rgbacolor = wc_hex2rgba($hexcolor, '0.7');
						echo '.title-section { 
							background-color:'.$rgbacolor.' !important;
						}';
					}
				}//Background Color
				
				if(self::wc_check_special('wc_txt_link_color_title_section')) { 
					self::wc_generate_css('.title-section h1, .title-section h1 span, .breadcrumbs li, .breadcrumbs li span, .breadcrumbs li a, .breadcrumbs li:not(:last-child):after', 'color', 'wc_txt_link_color_title_section', '0', 'metabox');
				} else { 
					self::wc_generate_css('.title-section h1, .title-section h1 span, .breadcrumbs li, .breadcrumbs li span, .breadcrumbs li a, .breadcrumbs li:not(:last-child):after', 'color', 'wc_titlesection_linkstext_color', '0', 'customizer');
				}//Text link color
				
				

				/**
				 * Call to Action
				 * Styling and Colors
				 */
				if(self::wc_check_special('wc_bgcolor_calltoaction')) { 
					self::wc_generate_css('.call-to-action', 'background-color', 'wc_bgcolor_calltoaction', '0', 'metabox');
				} else { 
					self::wc_generate_css('.call-to-action', 'background-color', 'wc_footer_cta_bgcolor', '0', 'customizer');
				} //Background Color
				
				if(self::wc_check_special('wc_txtbutton_calltoaction')) { 
					self::wc_generate_css('.call-to-action h2, .call-to-action i, .call-to-action .button', 'color', 'wc_txtbutton_calltoaction', '0', 'metabox');
					self::wc_generate_css('.call-to-action i, .call-to-action .bordered-light', 'border-color', 'wc_txtbutton_calltoaction', '0', 'metabox');
				} else { 
					self::wc_generate_css('.call-to-action h2, .call-to-action i, .call-to-action .button', 'color', 'wc_footer_cta_txtcolor', '0', 'customizer');
					self::wc_generate_css('.call-to-action i, .call-to-action .bordered-light', 'border-color', 'wc_footer_cta_txtcolor', '0', 'customizer');
				} //Text/Button Color
				
				if(self::wc_check_special('wc_hovercolor_calltoaction')) { 
					self::wc_generate_css('.call-to-action h2 span', 'color', 'wc_hovercolor_calltoaction', '0', 'metabox');
					self::wc_generate_css('.call-to-action .bordered-light:hover', 'background-color', 'wc_hovercolor_calltoaction', '0', 'metabox');
				} else { 
					self::wc_generate_css('.call-to-action h2 span', 'color', 'wc_footer_cta_hovertxtcolor', '0', 'customizer');
					self::wc_generate_css('.call-to-action .bordered-light:hover', 'background-color', 'wc_footer_cta_hovertxtcolor', '0', 'customizer');
				} //Text/Button Hover/ Highlight Color
				
				
				
				/**
				 * Footer Top
				 * Stylings and Colors
				 */
				if(self::wc_check_special('wc_background_footer')) {
					self::wc_generate_css('.footer::after', 'background-image', 'wc_background_footer', '0', 'metabox');
				} else { 
					self::wc_generate_css('.footer::after', 'background-image', 'wc_footer_top_bgimg', '0', 'customizer');
				} //Background Image
				
				if(self::wc_check_special('wc_bgcolor_footer')) { 
					$hexcolor = get_post_meta($post_id, 'wc_bgcolor_footer', true);
					$rgbacolor = wc_hex2rgba($hexcolor, '0.9');
					echo '.footer { 
						background-color:'.$rgbacolor.' !important;
					}';
				} else { 
					$hexcolor = get_theme_mod('wc_footer_top_bgclr');
					if(!empty($hexcolor)):
					$rgbacolor = wc_hex2rgba($hexcolor, '0.9');
					echo '.footer { 
						background-color:'.$rgbacolor.' !important;
					}';
					endif;
				} //Background Color
				
				if(self::wc_check_special('wc_headingcolor_footer')) { 
					self::wc_generate_css('.footer h2, .footer h3, .footer h4, .footer h5, .footer h6', 'color', 'wc_headingcolor_footer', '0', 'metabox');
					self::wc_generate_css('.tx-div', 'background-color', 'wc_headingcolor_footer', '0', 'metabox');
				} else { 
					self::wc_generate_css('.footer h2, .footer h3, .footer h4, .footer h5, .footer h6', 'color', 'wc_footer_top_headingclr', '0', 'customizer');
					self::wc_generate_css('.tx-div', 'background-color', 'wc_footer_top_headingclr', '0', 'customizer');
				} //Heading Color
				
				if(self::wc_check_special('wc_textcolor_footer')) { 
					self::wc_generate_css('.footer, .footer p, .footer label, .footer span, .footer div, .office-hours li, .address i, .address h4', 'color', 'wc_textcolor_footer', '0', 'metabox');
					self::wc_generate_css('.footer .address i', 'border-color', 'wc_textcolor_footer', '0', 'metabox');
				} else { 
					self::wc_generate_css('.footer, .footer p, .footer label, .footer span, .footer div, .office-hours li, .address i, .address h4', 'color', 'wc_footer_top_txtclr', '0', 'customizer');
					self::wc_generate_css('.footer .address i', 'border-color', 'wc_footer_top_txtclr', '0', 'customizer');
				} //Text Color Footer
				
				if(self::wc_check_special('wc_linkcolor_footer')) { 
					self::wc_generate_css('.footer a', 'color', 'wc_linkcolor_footer', '0', 'metabox');
					self::wc_generate_css('.footer .primary.bordered-light', 'border-color', 'wc_linkcolor_footer', '0', 'metabox');
					self::wc_generate_css('.footer .primary.bordered-light', 'color', 'wc_linkcolor_footer', '0', 'metabox');
				} else { 
					self::wc_generate_css('.footer a', 'color', 'wc_footer_top_linkclr', '0', 'customizer');
					self::wc_generate_css('.footer .primary.bordered-light', 'border-color', 'wc_footer_top_linkclr', '0', 'customizer');
					self::wc_generate_css('.footer .primary.bordered-light', 'color', 'wc_footer_top_linkclr', '0', 'customizer');
				}//Link Color Footer
				
				
				if(self::wc_check_special('wc_hover_footer')) {
					self::wc_generate_css('.footer a:hover', 'color', 'wc_hover_footer', '0', 'metabox');
				} else { 
					self::wc_generate_css('.footer a:hover', 'color', 'wc_footer_top_linkhvrclr', '0', 'customizer');
				}//Link Hover Footer Color
				
				
				/**
				 * Footer Bottom
				 * Styling and Colors
				 */
				if(self::wc_check_special('wc_bgcolor_footerbottom')) {
					self::wc_generate_css('.footerbottom', 'background-color', 'wc_bgcolor_footerbottom', '0', 'metabox');
				} else { 
					self::wc_generate_css('.footerbottom', 'background-color', 'wc_footer_bottom_bgcolor', '0', 'customizer');
				} //Background Color
				
				if(self::wc_check_special('wc_textlink_footerbottom')) {
					self::wc_generate_css('.footerbottom p, .footerbottom, .footerbottom div, .footerbottom li, .footerbottom li a, .footerbottom a', 'color', 'wc_textlink_footerbottom', '0', 'metabox');
				} else { 
					self::wc_generate_css('.footerbottom p, .footerbottom, .footerbottom div, .footerbottom li, .footerbottom li a, .footerbottom a', 'color', 'wc_footer_bottom_linkcolor', '0', 'customizer');
				} //text link Color
				
				if(self::wc_check_special('wc_hover_footerbottom')) {
					self::wc_generate_css('.footerbottom li a:hover, .footerbottom a:hover, .footerbottom a', 'color', 'wc_hover_footerbottom', '0', 'metabox');
				} else { 
					self::wc_generate_css('.footerbottom li a:hover, .footerbottom a:hover', 'color', 'wc_footer_bottom_linkhvrcolor', '0', 'customizer');
				} //Link Hover
				
				
				/**
				 * Single Course
				 * Reservation Form
				 */
				self::wc_generate_css('.seminar-events::after', 'background-image', 'wc_courses_form_bg_img', '0', 'customizer');
				
				$hexcolor = get_theme_mod('wc_courses_form_bg_clr'); //Bg Color
				if(!empty($hexcolor)):
				$rgbacolor = wc_hex2rgba($hexcolor, '0.9');
				echo '.seminar-events { 
					background-color:'.$rgbacolor.' !important;
				}';
				endif;
						
		   ?>
      </style> 
      <!--/Customizer CSS-->
      <?php
   }
 	
 
    //Accepts Parameters and Generate CSS
    public static function wc_generate_css( $selector, $style, $mod_name, $priority, $type, $prefix='', $postfix='', $echo=true ) {
		$return = '';
		global $wp_query;
		$post_id = $wp_query->get_queried_object_id();
		
		if(class_exists('WooCommerce') && is_shop()){
			$post_id = get_option('woocommerce_shop_page_id');
		}
	  	
		if($type == "customizer") { 
			$mod = get_theme_mod($mod_name);
		} else { 
			$mod = get_post_meta($post_id, $mod_name, true);
		}
	    

      if ( ! empty( $mod ) ) {
		  if($priority == 1) { 
				$priority = ' !important';
		  } else { 
		  	$priority = '';
		  }
		  if($style == 'background-image') { 
		  	$return = $selector.'{ background-image:url('.$mod.');}';
		  } else {
			 $return = sprintf('%s { %s:%s%s; }',
				$selector,
				$style,
				$prefix.$mod.$postfix,
				$priority
			 );
		 }
         if ( $echo ) {
            echo esc_attr($return);
         }
      }
      return $return;
    }//End of function wc_generate_css()
 
 }
 
 // Output custom CSS to live site
add_action('wp_head' , array('Wc_eyecare_Generated_CSS' , 'wc_generated_header_output'));