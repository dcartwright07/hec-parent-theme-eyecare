<?php
	//Add themeSupport for Woocommerce
	if(class_exists( 'WooCommerce' )):
		//Add Support For WooCommerce in Theme.
		add_action('after_setup_theme', 'wc_woocommerce_support');
		function wc_woocommerce_support() {
			add_theme_support( 'woocommerce' );
		}
		
		//Enable product Zoom ability
		add_theme_support( 'wc-product-gallery-zoom' );
		//Enable Product Lightbox
		add_theme_support( 'wc-product-gallery-lightbox' );
	
		// Products to display
		$default_products = 9;
		$user_selected = get_theme_mod('products_perpage_shop');
		if(is_numeric($user_selected)) { 
			$default_products = $user_selected;	
		}
		add_filter( 'loop_shop_per_page', create_function( '$cols', 'return '.$default_products.';' ), 20 );
		
		//remove default title from woocommerce pages.		
		function wc_hide_woo_page_title() {
			return false;
		}
		add_filter('woocommerce_show_page_title' , 'wc_hide_woo_page_title');
		
		//Changing Title HTML Product Page
		function wc_woocommerce_title_section() {
			global $product;
			echo '<h6 class="loop-title"><a href="'.esc_url(get_the_permalink()).'">'.esc_html(get_the_title()).'</a></h6>';
		}
	
		// Removing old Title HTML
		remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
	
		// Add new html title Section
		add_action('woocommerce_shop_loop_item_title', 'wc_woocommerce_title_section', 10);
		
		//if Function does not exist
		if(!function_exists('wc_woocommerce_share_buttons')) { 
			function wc_woocommerce_share_buttons($echo_share = 'true') {
				global $product;
				
				$output = '<div class="pro-buttons"><ul>';
				$output .= '<li><a href="https://www.facebook.com/sharer/sharer.php?u='.esc_url(get_the_permalink()).'" title="'.esc_html__('Share on Facebook', 'eyecare').'Add to wish list"><i class="fa fa-facebook"></i></a></li>';
				$output .= '<li><a href="https://twitter.com/home?status='.esc_url(get_the_permalink()).'" title="'.esc_html__('Share on Twitter', 'eyecare').'Share With Friends"><i class="fa fa-twitter"></i></a></li>';
				$output .= '<li><a href="https://plus.google.com/share?url='.esc_url(get_the_permalink()).'" title="'.esc_html__('Share on Google Plus', 'eyecare').'"><i class="fa fa-google"></i></a></li>';
				$output .= '</ul></div>';
				
				if($echo_share == "true") { 
					echo wp_kses_post($output);
				} else { 
					return $output;
				}
			}//Functno Ends
		}//Function Exists/Not
			
	endif; //Woocommerce Active.