<?php
	/**
	 * This File contains all main functions
	 * for the theme. Do not Edit if you dont
	 * Know what you are doing.
	 *
	 * @Since Version: 1.0.0
	 * Version 1.0.0
	 */
	 
	
	/**
	 * Theme Version
	 * Initial Release 1.0.0
	 * 
	 * @version 1.0.0
	 */
	define('WC_VER', '1.0.0');
	
	
	/**
	 * Content Width
	 * Maximum Allowed Width
	 *
	 * @Since 1.0.0
	 */
	if (!isset( $content_width ) ) {
		$content_width = 1170;
	} //End if isset


	/**
	 * Running Main Functions
	 * Calls Main Functions for Theme
	 * 
	 * @Since 1.0.0
	 */
	if (!function_exists('wc_fireup')) {
		function wc_fireup() {
			//Calling main function
			wc_theme_support();
		} //function Ends
		add_action('after_setup_theme','wc_fireup');
	} // End if exists
	
	
	/**
	 * Theme Supports
	 * Define Features Theme Supports
	 * 
	 * @Since 1.0.0
	 */
	if (!function_exists('wc_theme_support')) {
		function wc_theme_support() {
			
			//Loads the theme's translated strings
			load_theme_textdomain('eyecare', get_template_directory().'/languages' );
			
			// Adds Title to Head
			add_theme_support('title-tag');
			
			// Add Support For Thumbnails
			add_theme_support('post-thumbnails');
			
			//Default Thumb Size
			set_post_thumbnail_size(175, 175, true);
			
			// Calling Another Function For custom Sizes
			wc_custom_thumb_sizes();
			
			// Add Support For RSS Feed
			add_theme_support('automatic-feed-links');
			
			// Adding post format support
			add_theme_support( 'post-formats',
				array(
					'video'
				)
			);
			
			//Custom logo
			add_theme_support('custom-logo', array(
				'height'      => 100,
				'width'       => 400,
				'flex-height' => true,
				'flex-width'  => true,
				'header-text' => array( 'site-title', 'site-description' ),
			));
			
			// Add Menu Support
			add_theme_support('menus');
			
			// registering Menus
			register_nav_menus(
				array(
					'top_navigation' 	=> esc_html__('Top Navigation Menu', 	'eyecare'),
					'main_navigation' 	=> esc_html__('Main Navigation Menu', 	'eyecare'),
					'footer_navigation' => esc_html__('Footer Navigation Menu', 'eyecare'),
				)
			);
			
			//add editor style
			add_editor_style('assets/css/editor-style.css');
		
		}// Function Ends.
	} //End if Exists


	/**
	 * Custom Thumb Sizes
	 * Sizes Theme Uses
	 * 
	 * @Since 1.0.0
	 */
	if(!function_exists('wc_custom_thumb_sizes')) { 
		function wc_custom_thumb_sizes() { 
			//Blog Post's Thumbnail for Blog Page/Single Post
			add_image_size('wc-blog-page', 870, 300, true );
			add_image_size('wc-blog-small', 370, 247, true );
			
			//Testimonials Thumb
			add_image_size("wc-testimonial-thumb", 165, 165, true);
			
			//Services Thumbnails
			add_image_size("wc-service-small-thumb", 380, 190, true);
			
			//Doctor Thumbnail
			add_image_size("wc-doctor-thumbnail", 300, 300, true);
		}// Ends wc_custom thumb sizes
	} // End if exists
	
	/**
	 * Main Site Scripts & Styles
	 * Add Scripts To Main Site
	 * Adds Styles to Main Site
	 * Adds Google Fonts to Site
	 *
	 * @Since 1.0.0
	 */
	if(!function_exists('wc_site_scripts_and_styles')) { 
		function wc_site_scripts_and_styles($hook) { 
		
			/***Registering Stylesheets***/
			$wc_headings_font 	= get_theme_mod('wc_headings_font');
			$wc_navigation_font = get_theme_mod('wc_navigation_font');
			$wc_primary_font 	= get_theme_mod('wc_main_font');
			
			if(empty($wc_headings_font) && empty($wc_navigation_font) && empty($wc_primary_font)) { 
				$wc_font_url = "https://fonts.googleapis.com/css?family=Lato:400,400i,700,700i%7CDroid+Sans:400,700";
			} else { 
				$fonts_array = array( 
								"headings_font" 	=> $wc_headings_font,
								"navigation_font" 	=> $wc_navigation_font,
								"primary_font" 		=> $wc_primary_font
							);
				$wc_font_url = wc_return_google_font_link($fonts_array);
			} //If empty fonts set Default Family.
	
			//setting up Google Font
			wp_enqueue_style('google-fonts', esc_url($wc_font_url), array(), WC_VER, 'all');
			
			$right_to_left = get_theme_mod("wc_righttoleft_enable");
			
			if(!empty($right_to_left) && $right_to_left == "on") { 
				//Adding foundation stylesheet
				wp_enqueue_style('foundation', get_template_directory_uri().'/assets/css/rtl/foundation.min.css', array(), WC_VER, 'all');
			} else { 
				//Adding foundation stylesheet
				wp_enqueue_style('foundation', get_template_directory_uri().'/assets/css/foundation.min.css', array(), WC_VER, 'all');
			}
			
			//Animation File
			wp_enqueue_style('animate', get_template_directory_uri().'/assets/css/animate.css', array(), WC_VER, 'all');
			
			//Font Awesome
			wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/assets/css/font-awesome.min.css', array(), WC_VER, 'all');
			
			//Owl Carousel File
			wp_enqueue_style('owl-carousel', get_template_directory_uri().'/assets/css/owl.carousel.css', array(), WC_VER, 'all');	
			//Lightbox CSS File
			wp_enqueue_style('lightbox', get_template_directory_uri().'/assets/css/lightbox.min.css', array(), WC_VER, 'all');
			
			//Main Theme Styles
			wp_enqueue_style('wc-styles', get_template_directory_uri().'/assets/css/theme-styles.css', array(), WC_VER, 'all');
			
			//Main Theme Styles
			wp_enqueue_style('wc-responsive-styles', get_template_directory_uri().'/assets/css/responsive-styles.css', array(), WC_VER, 'all');
			
			if(class_exists( 'WooCommerce' )):
				//Styles For WooCommerce
				wp_enqueue_style('wc-woocommerce', get_template_directory_uri().'/assets/css/woocommerce.css', array(), WC_VER, 'all');
			endif;
			
			//Register main stylesheet
			wp_enqueue_style( 'wc-main-stylesheet', get_stylesheet_uri(), array(), WC_VER, 'all');
			
			//Includes CSS file For RTL adjustments in Main stylesheet
			if(!empty($right_to_left) && $right_to_left == "on") { 
				//RTL Adjustments CSS file
				wp_enqueue_style('wc-stylesheet-rtl', get_template_directory_uri().'/assets/css/rtl/rtl-theme-styles.css', array(), WC_VER, 'all');
			}
			
			/***Registering Scripts***/
			//Foundation JavaScript
			wp_enqueue_script('foundation-js',  get_template_directory_uri().'/assets/js/foundation.min.js', array('jquery'), WC_VER, true);
	
			//Owl Carousel JavaScript
			wp_enqueue_script('owl-carousel-js',  get_template_directory_uri().'/assets/js/owl.carousel.min.js', array('jquery'), WC_VER, true);
			
			//LightBox JavaScript
			wp_enqueue_script('lightbox-js',  get_template_directory_uri().'/assets/js/lightbox.min.js', array('jquery'), WC_VER, true);     
			   	
			//Theme Main JavaScript
			if(!empty($right_to_left) && $right_to_left == "on") { 
				wp_enqueue_script('wc-main-js',  get_template_directory_uri().'/assets/js/rtl/webful.js', array('jquery'), WC_VER, true);
			} else { 
				wp_enqueue_script('wc-main-js',  get_template_directory_uri().'/assets/js/webful.js', array('jquery'), WC_VER, true);
			}
			
		} //Function Ends
		add_action('wp_enqueue_scripts', 'wc_site_scripts_and_styles');
	}// End if exists


	/**
	 * Option Tree CSS
	 * Styles Metaboxes
	 *
	 * @Since 1.0.0
	 */
	if(class_exists('OT_Loader' )):
		if (!function_exists( 'wc_ot_css' ) ) {
			function wc_ot_css($hook) {
			
				global $wp_styles;
				wp_enqueue_style( 'wc-admin-css',   get_template_directory_uri() . '/lib/admin/assets/css/wc-admin.css', array(), '' );
				$wp_styles->add_data( 'wc-admin-css', 'rtl', true );
			
			}//Function Ends.
			add_action( 'ot_admin_styles_after', 'wc_ot_css' );
		} //End if exists
	endif;

	/**
	 * Option Tree branding
	 * Logo For Theme Options Page
	 *
	 * @Since 1.0.0
	 */
	if(class_exists('OT_Loader' )): 
		if ( ! function_exists( 'wc_ot_header_logo_link' ) ) {
			function wc_ot_header_logo_link() {
			
				return '<img alt="Webful Creations Vision" src="' .  get_template_directory_uri()  . '/lib/admin/assets//images/logo.png">';
			
			} //Function Ends
			add_filter( 'ot_header_logo_link', 'wc_ot_header_logo_link' );
		} // end if exists
	endif;	
	
	
	/**
	 * Custom Styles
	 * Enqueu Custom Styles
	 * User Defined in Theme Options
	 *
	 * @Since 1.0.0
	 */
	if(class_exists('OT_Loader' )): 
		if(!function_exists('wc_custom_styles')) { 
			function wc_custom_styles() { 
				$custom_style = ot_get_option('wc_custom_css');
				
				if($custom_style != '') { 
					echo "<style type='text/css'>";
					echo esc_html($custom_style);
					echo "</style>";
				}//end if
				
			}//function ends
			add_action('wp_head', 'wc_custom_styles');
		}// End if Exists
	endif;

	/**
	 * Custom Scripts
	 * Enqueu Custom Scripts
	 * User Defined in Theme Options
	 *
	 * @Since 1.0.0
	 */
	if(class_exists('OT_Loader' )):
		if(!function_exists('wc_custom_scripts')) { 
			function wc_custom_scripts() { 
				$custom_scripts = ot_get_option('wc_custom_js');
				
				if($custom_scripts != '') { 
					echo "<script type='text/javascript'>";
					echo wp_kses_post($custom_scripts);
					echo "</script>";
				}//end if

			}//function ends
			add_action('wp_footer', 'wc_custom_scripts');
		} // End if exists
	endif;

	/**
	 * Functno: wc_comments_enque
	 * Enqueue Comment Reply Scripts
	 * Help to Load Comments reply
	 *
	 * @Since 1.0.0
	 */
	if(!function_exists('wc_comments_enque')) { 
		function wc_comments_enque() {
			if ( is_singular() ) {
				wp_enqueue_script( 'comment-reply' );	
			} 	
		}//Function Ends
		add_action('wp_head', 'wc_comments_enque');
	}//End if exists


	/**
	 * Sanitize Number
	 *
	 * @Since 1.0.0
	 */
	if(!function_exists('wc_check_number')) {
		function wc_check_number( $value ) {
			$value = (int) $value; // Force the value into integer type.
			return ( 0 < $value ) ? $value : '';
		}//Function Ends
	} // End if exists


	/**
	 * Sanitize Custom Values
	 *
	 * @Since 1.0.0
	 */
	if(!function_exists('wc_sanitize_values')) { 
		function wc_sanitize_values( $value ) {
		   if (! in_array($value, array('left_sidebar', 
		   								'right_sidebar', 
										'disable_sidebar',
										'one-widget', 
										'two-widgets', 
										'three-widgets', 
										'four-widgets', 
										'copyright-info', 
										'selective-social-icons',
										'footer-menu',
										'excerpt_content',
										'full_content')) ) {
			   $value = '';
		   }
			return $value;
		}//Function Ends.
	} // End if Exists


	/**
	 * Sanitize Checkbox
	 *
	 * @Since 1.0.0
	 */
	if(!function_exists('wc_sanitize_checkbox')) {
		function wc_sanitize_checkbox($value) { 
			if($value == 'on') { 
				return $value;
			} else { 
				return '';
			}
		} //End Function	 
	}// End if exists.


	/**
	 * Boxed Layout
	 * Returns array of Classes
	 *
	 * @Since 1.0.0
	 */
	if(!function_exists('wc_boxed_layout_class')) { 
		function wc_boxed_layout_class() { 
			global $post;
			
			$object_id = get_queried_object_id();
			if(class_exists('WooCommerce')):
			if(is_shop() || is_product() || is_product_category() || is_product_tag()) { 
				$object_id = get_option('woocommerce_shop_page_id');
			}
			endif;
			$page_enable_boxed 	= get_post_meta($object_id, 'wc_enable_boxed_layout', true); //Page Option Setting
			
			$boxed_layout 		= get_theme_mod("wc_go_boxed_en_boxed"); //Customizer Setting
			$box_class 			= "";
			$boxed_class 		= "";
			
			if($boxed_layout == 1) { 
				$box_class = "box";
				$boxed_class = " boxed";
			}
			if($page_enable_boxed == 'on') { 
				$box_class = "box";
				$boxed_class = " boxed";
			} else if($page_enable_boxed == 'off') { 
				$box_class = "";
				$boxed_class = "";	
			}
			
			$return_array = array( 
								"body_class"	=> $box_class,
								"boxed_class"	=> $boxed_class
							);
			return $return_array;
		}
	}

	/**
	 * Preloader Loader
	 *
	 * @Since 1.0.0
	 */	 
	if(!function_exists('wc_add_preloader')) { 
		function wc_add_preloader() { 
			if(get_theme_mod('wc_preloader_enable') == "on"):
				$output = "";
			else : 
				$output = '<!-- Page Preloader -->
							<div class="preloader">
								<div class="cssload-thecube">
									<div class="cssload-cube cssload-c1"></div>
									<div class="cssload-cube cssload-c2"></div>
									<div class="cssload-cube cssload-c4"></div>
									<div class="cssload-cube cssload-c3"></div>
								</div>
							</div>';
			endif;
			
			echo wp_kses_post($output);			
		}
		add_action("wc_after_body_start", "wc_add_preloader");
	} //End if exists


	/**
	 * Hex To RGBA Color
	 *
	 * Return RGB Color
	 * @Since 1.0.0
	 */
	if(!function_exists('wc_hex2rgba')) {
		function wc_hex2rgba($color, $opacity = false) {
		
			$default = 'rgb(0,0,0)';
		
			//Return default if no color provided
			if(empty($color))
				  return $default; 
		
			//Sanitize $color if "#" is provided 
			if ($color[0] == '#' ) {
				$color = substr( $color, 1 );
			}
	
			//Check if color has 6 or 3 characters and get values
			if (strlen($color) == 6) {
					$hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
			} elseif ( strlen( $color ) == 3 ) {
					$hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
			} else {
					return $default;
			}
	
			//Convert hexadec to rgb
			$rgb =  array_map('hexdec', $hex);
	
			//Check if opacity is set(rgba or rgb)
			if($opacity){
				if(abs($opacity) > 1)
					$opacity = 1.0;
				$output = 'rgba('.implode(",",$rgb).','.$opacity.')';
			} else {
				$output = 'rgb('.implode(",",$rgb).')';
			}
	
			//Return rgb(a) color string
			return $output;
		}//Function Ends
	}


	/**
	 * Theme Sidebars
	 *
	 * Default Sidebars Registration
	 * @Since 1.0.0
	 */
	if ( ! function_exists( 'wc_eyecare_sidebars' ) ) {
		function wc_eyecare_sidebars_init() {
			//Register Primary Sidebar
			register_sidebar(array(
				'name'          => esc_html__( 'Primary Sidebar', 'eyecare' ),
				'id'            => 'primary-sidebar',
				'description'   => esc_html__( 'Add Widgets to Blog/Primary Sidebar areas', 'eyecare'),
				'before_widget' => '<div id="%1$s" class="widget"><div class="no-title">',
				'after_widget'  => '</div></div>',
				'before_title'  => '</div><h2>',
				'after_title'   => '</h2><div class="widget-content">'
			));
			
			//Register Page Sidebar
			register_sidebar( array(
				'name'          => esc_html__( 'Page Sidebar', 'eyecare' ),
				'id'            => 'page-sidebar',
				'description'   => esc_html__( 'Add Widgets to Page Sidebar areas', 'eyecare'),
				'before_widget' => '<div id="%1$s" class="widget"><div class="no-title">',
				'after_widget'  => '</div></div>',
				'before_title'  => '</div><h2>',
				'after_title'   => '</h2><div class="widget-content">'
			) );
			
			//Woocommerce Sidebar
			if(class_exists( 'WooCommerce' )) {
				register_sidebar( array(
					'name'          => esc_html__( 'Shop Sidebar', 'eyecare'),
					'id'            => 'shop-pages',
					'description'   => esc_html__('Add Widget to Shop pages', "eyecare"),
					'before_widget' => '<div id="%1$s" class="widget"><div class="no-title">',
					'after_widget'  => '</div></div>',
					'before_title'  => '</div><h2>',
					'after_title'   => '</h2><div class="widget-content">'
				) );
			} //Shop Sidebar if woocommerce Exists.
			
			
			//Register Services Sidebar
			if(function_exists('wc_required_modules')):
				register_sidebar( array(
					'name'          => esc_html__('Services Sidebar', 'eyecare' ),
					'id'            => 'services-sidebar',
					'description'   => esc_html__( 'Add Widgets to Single Service Sidebar.', 'eyecare'),
					'before_widget' => '<div id="%1$s" class="widget"><div class="no-title">',
					'after_widget'  => '</div></div>',
					'before_title'  => '</div><h2>',
					'after_title'   => '</h2><div class="widget-content">'
				));
			endif;
			
			//Register Footer first widget
			register_sidebar( array(
				'name'          => esc_html__('Footer 1', 'eyecare' ),
				'id'            => 'footer-one',
				'description'   => esc_html__('Add Widget to Footer 1 Area', 'eyecare'),
				'before_widget' => '<div id="%1$s" class="footer-widget">',
				'after_widget'  => '</div>',
				'before_title'  => '<h2><i class="fa fa-eye" aria-hidden="true"></i>',
				'after_title'   => '</h2>'
			));
			
			//Register Footer Second widget
			register_sidebar( array(
				'name'          => esc_html__('Footer 2', 'eyecare' ),
				'id'            => 'footer-two',
				'description'   => esc_html__('Add Widget to Footer 2 Area', 'eyecare'),
				'before_widget' => '<div id="%1$s" class="footer-widget">',
				'after_widget'  => '</div>',
				'before_title'  => '<h2><i class="fa fa-eye" aria-hidden="true"></i>',
				'after_title'   => '</h2>'
			));
			
			//Register Footer thirs widget
			register_sidebar( array(
				'name'          => esc_html__('Footer 3', 'eyecare' ),
				'id'            => 'footer-three',
				'description'   => esc_html__('Add Widget to Footer 3 Area', 'eyecare'),
				'before_widget' => '<div id="%1$s" class="footer-widget">',
				'after_widget'  => '</div>',
				'before_title'  => '<h2><i class="fa fa-eye" aria-hidden="true"></i>',
				'after_title'   => '</h2>'
			));
					
			//Register Footer fourth widget
			register_sidebar( array(
				'name'          => esc_html__('Footer 4', 'eyecare' ),
				'id'            => 'footer-four',
				'description'   => esc_html__('Add Widget to Footer 4 Area', 'eyecare'),
				'before_widget' => '<div id="%1$s" class="footer-widget">',
				'after_widget'  => '</div>',
				'before_title'  => '<h2><i class="fa fa-eye" aria-hidden="true"></i>',
				'after_title'   => '</h2>'
			));
			
		} //Function Ends.
		add_action('widgets_init', 'wc_eyecare_sidebars_init');
	}


	/**
	 * Function Generate Page Title
	 *
	 * Return Page Title
	 * @Since 1.0.0
	 */
	if(!function_exists('wc_pages_titles')) { 
		function wc_pages_titles() {
			 
			global $post;
			$post_id = get_queried_object_id();
			static $title = '';
			$allowed_html = array(
								'span' => array(
											'class' => array()
											),
							);
			
			if(is_archive() && !is_tax() && !is_category() && !is_tag()) {  
				$title = get_the_archive_title();
			}
			
			if(is_author()) { 
				$title = get_the_archive_title();
			}
			
			//If Home is Blog Posts
			if(is_front_page() && is_home()) { 
				$title = esc_html__('Our Blog', 'eyecare');
			} 
			
			//PAge, single post, empty title.
			if(is_single() || is_page()) {
				$title = get_the_title($post_id);
			}
			
			//Blog Page Title
			if(is_home()) { 
				$title = esc_html__('Our Blog', 'eyecare');
			}
			
			if(is_category() || is_tax()) {
				$title = single_term_title("", FALSE);
			}
			
			if(is_tag()) {
				$title = single_term_title("", FALSE);
			}
			
			if(is_search()) {
				$title = esc_html__("Results for: ", "eyecare").get_search_query();
			}
			
			if(is_404()) {  
				$title = esc_html__("Error 404!", "eyecare");
			}
			
			//woocommerce titles
			if(class_exists('WooCommerce')):
				//If shop Page
				if(is_shop()) { 
					$shop_page_id 	= get_option('woocommerce_shop_page_id');
					$title 			= get_the_title($shop_page_id);
				}
				//Shop Category
				if(is_product_category() || is_product_tag()) { 
					$title = single_term_title("", FALSE);
				}
			endif; //woocommerce Titles ends.
			
			
			//if Empty title
			if(empty($title)) { 
				$title = get_the_title($post_id);		
			}
			
			echo wp_kses($title, $allowed_html);
		
		} //Function Ends.
	}


	/**
	 * Function Generate Breadcrumbs
	 *
	 * Return Page Breadcrumbs
	 * @Since 1.0.0
	 */
	if(!function_exists('wc_custom_breadcrumbs')) { 
		function wc_custom_breadcrumbs() {
			   
			// Settings
			$breadcrums_class   = 'breadcrumbs';
			$home_title         = esc_html__('Home', 'eyecare');
			$custom_taxonomy    = '';
			$allowed_html 		= array(
									'a' => array(
												'href' => array(),
												'title' => array()
												),
									'span' => array(
												'vcard' => array(),
												'class' => array(),
												'title' => array(),
											)			
								); 
			  
			// Get the query & post information
			global $post,$wp_query;
			
			// Do not display on the homepage
			if ( !is_front_page() ) {
			   
				// Build the breadcrums
				echo '<ul class="' . $breadcrums_class . '">';
				   
				// Home page
				echo '<li class="item-home"><a class="bread-link bread-home" href="' . esc_url(get_home_url()) . '" title="' . esc_attr($home_title) . '">' . esc_attr($home_title) . '</a></li>';
				   
				if ( is_archive() && !is_tax() && !is_category() && !is_tag() ) {
					  
					echo '<li class="item-current item-archive"><span class="show-for-sr">'.esc_html__("Current: ", "eyecare").'</span>' . wp_kses(get_the_archive_title(), $allowed_html) . '</li>';
					  
				} else if ( is_archive() && is_tax() && !is_category() && !is_tag() ) {
					  
					// If post is a custom post type
					$post_type = get_post_type();
					  
					// If it is a custom post type display name and link
					if($post_type != 'post') {
						  
						$post_type_object  = get_post_type_object($post_type);
						$post_type_archive = get_post_type_archive_link($post_type);
						
						if(!empty($post_type_object) && !empty($post_type_archive)):
						echo '<li class="item-cat item-custom-post-type-' . esc_attr($post_type) . '"><a class="bread-cat bread-custom-post-type-' . esc_attr($post_type) . '" href="' . esc_url($post_type_archive) . '" title="' . esc_attr($post_type_object->labels->name) . '">' . esc_html($post_type_object->labels->name). '</a></li>';
						endif;
					}
					  
					$custom_tax_name = get_queried_object()->name;
					echo '<li class="item-current item-archive"><span class="show-for-sr">'.esc_html__("Current: ", "eyecare").'</span>' . esc_html($custom_tax_name) . '</li>';
					  
				} else if ( is_single() ) {
					  
					// If post is a custom post type
					$post_type = get_post_type();
					  
					// If it is a custom post type display name and link
					if($post_type != 'post') {
						$post_type_object = get_post_type_object($post_type);
						$post_type_archive = get_post_type_archive_link($post_type);
					  
						echo '<li class="item-cat item-custom-post-type-' . esc_attr($post_type) . '"><a class="bread-cat bread-custom-post-type-' . esc_attr($post_type) . '" href="' . esc_url($post_type_archive) . '" title="' . esc_attr($post_type_object->labels->name) . '"> ' . esc_html($post_type_object->labels->name) . '</a></li>';
	
						$taxonomy_names = get_object_taxonomies( $post_type );
						
						if($post_type != 'attachment') {
							//Set Taxanomy 
							$custom_taxonomy = $taxonomy_names[0];	
						}
						
						//WooCoomerce
						if($post_type == 'product') { 
							$custom_taxonomy = "product_cat";
						}
					}
					  
					// Get post category info
					$category = get_the_category();
					 
					if(!empty($category)) {
					  
						// Get last category post is in
						$array_values = array_values($category);
						$last_category = end($array_values);
						  
						// Get parent any categories and create array
						$get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
						$cat_parents = explode(',',$get_cat_parents);
						  
						// Loop through parent categories and store in variable $cat_display
						$cat_display = '';
						foreach($cat_parents as $parents) {
							$cat_display .= '<li class="item-cat">'.wp_kses($parents, $allowed_html).'</li>';
						}
					}
					  
					// If it's a custom post type within a custom taxonomy
					$taxonomy_exists = taxonomy_exists($custom_taxonomy);
					if(empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists && !is_attachment()) {
						$taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
						
						if(!empty($taxonomy_terms)):
						$cat_id         = $taxonomy_terms[0]->term_id;
						$cat_nicename   = $taxonomy_terms[0]->slug;
						$cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
						$cat_name       = $taxonomy_terms[0]->name;
						endif;
					}
					  
					// Check if the post is in a category
					if(!empty($last_category)) {
						echo wp_kses_post($cat_display); //escaped while decarling
						echo '<li class="item-current item-' . esc_attr($post->ID) . '"><strong class="bread-current bread-' . esc_attr($post->ID) . '" title="' . esc_attr(get_the_title()) . '">' . esc_html(get_the_title()) . '</strong></li>';
						  
					// Else if post is in a custom taxonomy
					} else if(!empty($cat_id)) {
						echo '<li class="item-cat item-cat-' . esc_attr($cat_id) . ' item-cat-' . esc_attr($cat_nicename) . '"><a class="bread-cat bread-cat-' . esc_attr($cat_id) . ' bread-cat-' . esc_attr($cat_nicename) . '" href="' . esc_url($cat_link) . '" title="' . esc_attr($cat_name) . '"> ' . esc_html($cat_name) . '</a></li>';
						echo '<li class="item-current item-' . esc_attr($post->ID) . '"><strong class="bread-current bread-' . esc_attr($post->ID) . '" title="' . esc_attr(get_the_title()) . '">' . esc_html(get_the_title()) . '</strong></li>';
					  
					} else {
						  
						echo '<li class="item-current item-' . esc_attr($post->ID) . '"><strong class="bread-current bread-' . esc_attr($post->ID) . '" title="' . esc_attr(get_the_title()) . '">' . esc_html(get_the_title()) . '</strong></li>';
						  
					}
					  
				} else if ( is_category() ) {
					// Category page
					echo '<li class="item-current item-cat"><strong class="bread-current bread-cat">' . esc_html(single_cat_title('', false)) . '</strong></li>';
				} else if ( is_page() ) {
					   
					// Standard page
					if( $post->post_parent ){
						   
						// If child page, get parents 
						$anc = get_post_ancestors( $post->ID );
						   
						// Get parents in the right order
						$anc = array_reverse($anc);
						   
						// Parent page loop
						$parents = "";
						foreach ( $anc as $ancestor ) {
							$parents .= '<li class="item-parent item-parent-' . esc_attr($ancestor) . '"><a class="bread-parent bread-parent-' . esc_attr($ancestor) . '" href="' . esc_url(get_permalink($ancestor)) . '" title="' . esc_attr(get_the_title($ancestor)) . '">' . esc_html(get_the_title($ancestor)) . '</a></li>';
						}
						   
						// Display parent pages
						echo wp_kses_post($parents);
						   
						// Current page
						echo '<li class="item-current item-' . esc_attr($post->ID) . '"><strong title="' . esc_attr(get_the_title()) . '"> ' . esc_html(get_the_title()) . '</strong></li>';
						   
					} else {
						   
						// Just display current page if not parents
						echo '<li class="item-current item-' . esc_attr($post->ID) . '"><strong class="bread-current bread-' . esc_attr($post->ID) . '"> ' . esc_html(get_the_title()) . '</strong></li>';
						   
					}
					   
				} else if ( is_tag() ) {
					// Get tag information
					$term_id        = get_query_var('tag_id');
					$taxonomy       = 'post_tag';
					$args           = 'include=' . $term_id;
					$terms          = get_terms( $taxonomy, $args );
					$get_term_id    = $terms[0]->term_id;
					$get_term_slug  = $terms[0]->slug;
					$get_term_name  = $terms[0]->name;
					   
					// Display the tag name
					echo '<li class="item-current item-tag-' . esc_attr($get_term_id) . ' item-tag-' . esc_attr($get_term_slug) . '"><strong class="bread-current bread-tag-' . esc_attr($get_term_id) . ' bread-tag-' . esc_attr($get_term_slug) . '">' . esc_html__("Tag: ", "eyecare") . esc_html($get_term_name) . '</strong></li>';
				   
				} elseif ( is_day() ) {
					// Year link
					echo '<li class="item-year item-year-' . esc_attr(get_the_time('Y')) . '"><a class="bread-year bread-year-' . esc_attr(get_the_time('Y')) . '" href="' . esc_url(get_year_link( get_the_time('Y') )) . '" title="' . esc_attr(get_the_time('Y')) . '">' . esc_html(get_the_time('Y')) .  esc_html__("Archives", "eyecare").'</a></li>';
					// Month link
					echo '<li class="item-month item-month-' . esc_attr(get_the_time('m')) . '"><a class="bread-month bread-month-' . esc_attr(get_the_time('m')) . '" href="' . esc_url(get_month_link( get_the_time('Y'), get_the_time('m') )) . '" title="' . esc_attr(get_the_time('M')) . '">' . esc_html(get_the_time('M')) .  esc_html__("Archives", "eyecare").'</a></li>';
					// Day display
					echo '<li class="item-current item-' . esc_attr(get_the_time('j')) . '"><strong class="bread-current bread-' . esc_attr(get_the_time('j')) . '"> ' . esc_html(get_the_time('jS')) . ' ' . esc_html(get_the_time('M')) .  esc_html__("Archives", "eyecare").'</strong></li>';
				} else if ( is_month() ) {
					// Year link
					echo '<li class="item-year item-year-' . esc_attr(get_the_time('Y')) . '"><a class="bread-year bread-year-' . esc_attr(get_the_time('Y')) . '" href="' . esc_url(get_year_link( get_the_time('Y'))) . '" title="' . esc_attr(get_the_time('Y')) . '">' . esc_html(get_the_time('Y')) .  esc_html__("Archives", "eyecare").'</a></li>';
					// Month display
					echo '<li class="item-month item-month-' . esc_attr(get_the_time('m')) . '"><strong class="bread-month bread-month-' . esc_attr(get_the_time('m')) . '" title="' . esc_attr(get_the_time('M')) . '">' . esc_html(get_the_time('M')) .  esc_html__("Archives", "eyecare").'</strong></li>';
					   
				} else if ( is_year() ) {
					   
					// Display year archive
					echo '<li class="item-current item-current-' . esc_attr(get_the_time('Y')) . '"><strong class="bread-current bread-current-' . esc_attr(get_the_time('Y')) . '" title="' . esc_attr(get_the_time('Y')) . '">' . esc_html(get_the_time('Y')) .  esc_html__("Archives", "eyecare").'</strong></li>';
					   
				} else if ( is_author() ) {
					// Get the author information
					global $author;
					$userdata = get_userdata( $author );
					   
					// Display author name
					echo '<li class="item-current item-current-' . esc_attr($userdata->user_nicename) . '"><strong class="bread-current bread-current-' . esc_attr($userdata->user_nicename) . '" title="' . esc_attr($userdata->display_name) . '">' . esc_html__("Author", "eyecare") . esc_html($userdata->display_name).'</strong></li>';
				} else if ( get_query_var('paged') ) {
					// Paginated archives
					echo '<li class="item-current item-current-' . esc_attr(get_query_var('paged')) . '"><strong class="bread-current bread-current-' . esc_attr(get_query_var('paged')) . '" title="Page ' . esc_attr(get_query_var('paged')) . '">'.esc_html__('Page', "eyecare") . ' ' . esc_html(get_query_var('paged')) . '</strong></li>';
					   
				} else if ( is_search() ) {
					// Search results page
					echo '<li class="item-current item-current-' . esc_attr(get_search_query()) . '"><strong class="bread-current bread-current-' . esc_attr(get_search_query()) . '" title="' . esc_attr(get_search_query()) . '">'. esc_html__("Search results for: ", "eyecare") . esc_html(get_search_query()) . '</strong></li>';
				} elseif ( is_404() ) {
					// 404 page
					echo '<li>' . esc_html__("Error 404", "eyecare") . '</li>';
				}
			   
				echo '</ul>';
				   
			}     
			
		} //Function Ends
	}



	/**
	 * Generate Google Font Link
	 *
	 * Returns: Google Font Link
	 * @Since: 1.0.0
	 */
	if(!function_exists('wc_return_google_font_link')) { 
		function wc_return_google_font_link($fonts_input_array) { 
			
			$fonts_array = array( 
					'roboto'     => 'Roboto:400,700',
					'open-sans'  => 'Open+Sans:400,700',
					'slabo-27px' => 'Slabo+27px',
					'lato' 		 => 'Lato:400,700',
					'montserrat' => 'Montserrat:400,700',
					'raleway' 	 => 'Raleway:400,700',
					'lora' 		 => 'Lora:400,700',
					'oxygen' 	 => 'Oxygen:400,700',
					'arvo' 		 => 'Arvo:400,700',
					'oswald' 	 => 'Oswald:400,700',
					'pt-sans' 	 => 'PT+Sans:400,700',
					'droid-sans' => 'Droid+Sans:400,700',
					'dosis' 	 => 'Dosis:400,700',
					'noto-serif' => 'Noto+Serif:400,700',
					'poppins' 	 => 'Poppins:400,700',
			); //Declaring Array Ends.
			
			//Getting input Fonts
			$headings_font = $fonts_input_array["headings_font"];
			$navigation_font = $fonts_input_array["navigation_font"];
			$primary_font = $fonts_input_array["primary_font"];
			
			$output_fonts = array();
			
			//Setting Primary
			if(!empty($headings_font)) { 
				$output_fonts[] = $headings_font;	
			} else { 
				$output_fonts[] = "montserrat";	
			}
			
			//setting Navigation
			if(empty($navigation_font)) {
				//By default heading font used.
			} else if($navigation_font != $headings_font) { 
				$output_fonts[] = $navigation_font;
			}	
			
			//Setting Primary Font
			if(empty($primary_font)) { 
				$output_fonts[] = "lato";	
			} else if(($primary_font != $navigation_font) && ($primary_font != $headings_font)) { 
				$output_fonts[] = $primary_font;
			}
			
			$counter = 0;
			$output = '';
			
			foreach($output_fonts as $font_family) { 
				if($counter != 0) { 
					$output .= '%7C'.$fonts_array[$font_family];
				} else { 
					$output .= $fonts_array[$font_family];
				}
				$counter++;
			} //End foreach
			
			$output = 'https://fonts.googleapis.com/css?family='.$output;
			
			return $output;
		}//Function Ends.
	}



	/**
	 * Create Pagination
	 *
	 * Returns list of pagination Links
	 * @Since: 1.0.0
	 */
	if(!function_exists('wc_pagination')) {
		function wc_pagination() {
			global $wp_query;
			$total = $wp_query->max_num_pages;
			$allowed_html = array(
								'a' => array(
											'href' => array(),
											'title' => array()
											),
								'span' => array(
											'class' => array(),
											'title' => array(),
										)			
							);
	
			if ( $total > 1 )  {
				$paged = get_query_var('paged');
				if ( !$current_page = $paged ) {
					$current_page = 1;
				 }
				 
			$permalink_structure = get_option('permalink_structure');
			if( empty($permalink_structure) ) {
				$format = '?paged=%#%';
			} else {
				$format = 'page/%#%/';
			}
			$links_array = paginate_links(array(
				'base'      => @add_query_arg( 'paged', '%#%' ),
				'format'   => $format,
				'current'  => $current_page,
				'total'    => $total,
				'mid_size' => 4,
				'type'     => 'array'
			));
			} else { 
				$links_array = '';
			}
			
			if(!empty($links_array)) {
				$output = '<div class="pagination-container">
						   <ul class="pagination" role="menubar" aria-label="Pagination">';
				
				foreach($links_array as $link) { 
					$output .= '<li>';
					$output .= wp_kses($link, $allowed_html);
					$output .= '</li>';
				}
				
				$output .= '</ul>
							</div><!-- Pagination Ends -->';
				
				echo wp_kses_post($output);
			}//if links not empty
		}//wc_pagination ends.
	}



	/**
	 * Link Pages Filter
	 * Adds Filter to Link Pages
	 * on page deviders
	 * 
	 * @Since 1.0.0
	 */
	if(!function_exists('wc_wp_link_pages_link')) {
		function wc_wp_link_pages_link( $link ) {
			return '<li>' . $link . '</li>';
		}//Function Ends.
		add_filter( 'wp_link_pages_link',  'wc_wp_link_pages_link' );
	}



	/**
	 * Generating Read More 
	 * Link for Excerpt Posts
	 *
	 * @Since 1.0.0
	 */
	if(!function_exists('wc_excerpt_more') && get_theme_mod('wc_disable_readmorelink') != 'on') {
		function wc_excerpt_more( $more ) {
				return sprintf(' <a class="read-more" href="%1$s">%2$s</a>',
					esc_url(get_permalink( get_the_ID())),
					esc_html__('Read More...', 'eyecare')
				);
		}
		//Turn off if selected in Admin customization
		add_filter( 'excerpt_more', 'wc_excerpt_more' );		
	}



	/**
	 * Excerpt Length
	 * Default and Customized
	 *
	 * @Since 1.0.0
	 */
	if(!function_exists('wc_excerpt_length')) { 
		function wc_excerpt_length() {
			if(get_theme_mod('wc_excerpt_length_blog') != '') { 
				$length = get_theme_mod('wc_excerpt_length_blog');
				return $length;
			} else { 
				return 50;	
			}
		} //Function Ends
		add_filter('excerpt_length', 'wc_excerpt_length');
	}



	/**
	 * Custom Excerpt Length
	 * Takes Numbers
	 * Returns Excerpt
	 *
	 * @Since : 1.0.0
	 */
	if(!function_exists('wc_custom_excerpt_length')) {
		function wc_custom_excerpt_length($charlength) {
			$excerpt = get_the_excerpt();
			$charlength++;
		
			if (mb_strlen( $excerpt ) > $charlength ) {
				$subex = mb_substr( $excerpt, 0, $charlength - 5 );
				$exwords = explode(' ', $subex );
				$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
				if ( $excut < 0 ) {
					return mb_substr( $subex, 0, $excut );
				} else {
					return esc_html($subex);
				}
			} else {
				return esc_html($excerpt);
			}
		}//function ends
	}



	/**
	 * Comments Template
	 * Comments Layout
	 * Returns Comments
	 *
	 * @Since : 1.0.0
	 */
	if(!function_exists('wc_output_single_comment')) {
		function wc_output_single_comment( $comment, $args, $depth ) {
			$GLOBALS['comment'] = $comment;
			switch ( $comment->comment_type ) {
				case 'pingback' :
					?>
					<li class="trackback"><?php esc_html__( 'Trackback:', 'eyecare' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( esc_html__( 'Edit', 'eyecare' ), '<span class="edit-link">', '<span>' ); ?>
					<?php
					break;
				case 'trackback' :
					?>
					<li class="pingback"><?php esc_html_e( 'Pingback:', 'eyecare' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( esc_html__( 'Edit', 'eyecare' ), '<span class="edit-link">', '<span>' ); ?>
					<?php
					break;
				default :
					$author_id = $comment->user_id;
					$author_link = get_author_posts_url( $author_id );
					?>
					<li id="comment-<?php comment_ID(); ?>" <?php comment_class('comment_item'); ?>>
						<div class="comment_special_wrap">
						<div class="comment_author_avatar"><?php echo get_avatar( $comment, 75); ?></div>
						<div class="comment_content">
							<div class="comment_info"><?php esc_html_e("by", "eyecare"); ?>
								<span class="comment_author"><?php echo ($author_id ? '<a href="'.esc_url($author_link).'">' : '') . comment_author() . ($author_id ? '</a>' : ''); ?></span>
								<span class="comment_date"><span class="comment_date_label"><?php esc_html_e('Posted', 'eyecare'); ?></span> <span class="comment_date_value"><?php echo get_comment_date(get_option('date_format')); ?></span></span>
								<span class="comment_time"><?php echo get_comment_date(get_option('time_format')); ?></span>
							</div>
							<div class="comment_text_wrap">
								<?php if ( $comment->comment_approved == 0 ) { ?>
								<div class="comment_not_approved"><?php esc_html__( 'Your comment is awaiting moderation.', 'eyecare' ); ?></div>
								<?php } ?>
								<div class="comment_text"><?php comment_text(); ?></div>
							</div>
							<?php if ($depth < $args['max_depth']) { ?>
								<div class="comment_reply"><?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></div>
							<?php } ?>
						</div>
						</div>
					<?php
					break;
			}
		}//End function 
	}



	/**
	 * Decode 
	 * html-entities 
	 * in the shortcode 
	 * parameters
	 *
	 * @Since 1.0.0
	 */
	if (!function_exists('wc_html_decode')) {
		function wc_html_decode($prm) {
			if (is_array($prm) && count($prm) > 0) {
				foreach ($prm as $k=>$v) {
					if (is_string($v))
						$prm[$k] = htmlspecialchars_decode($v, ENT_QUOTES);
				}
			}
			return $prm;
		}//Function Ends
	}



	/**
	 * Body Classes 
	 * Add boxed Body class 
	 * If Enabled
	 *
	 * @Since 1.0.0
	 */
	if(!function_exists('wc_body_classes')):
		function wc_body_classes( $classes ) {
			
			$catch_boxed_values = wc_boxed_layout_class();
			$box_class		    = $catch_boxed_values['body_class'];
			
			$classes[] 			= $box_class;
			
			return $classes;
		}
		add_filter( 'body_class','wc_body_classes' );
	endif;


	/**
	 * Password Form 
	 * Styling Protected 
	 * Post Form
	 *
	 * @Since 1.0.0
	 */
	if(!function_exists("wc_password_form")) {
		function wc_password_form() {
			global $post;
			$label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
			
			$output  = '<form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">';
			$output .= '<h2>'.esc_html__( "To view this protected post, enter the password below:", "eyecare" ).'</h2>';
			$output .= '<div class="row"><div class="medium-6 small-12 columns"><div class="row collapse">';
			$output .= '<div class="small-10 columns"><input name="post_password" placeholder="'.esc_html__("Enter Password", "eyecare").'" id="' . $label . '" type="password" /></div>';
			$output .= '<div class="small-2 columns">';
			$output .= '<input type="submit" class="button primary" name="Submit" value="'.esc_attr__("Enter", "eyecare" ).'" />';
			$output .= '</div>';
			$output .= '</div></div></div><!-- Row Ends /-->';
			$output .= '</form>';
			
			return $output;
		}// Function Ends.
		
		add_filter( 'the_password_form', 'wc_password_form' );
	}
	
	
	/**
	 * Change Title
	 * Default Enter Title here to different Strings based on Screen
	 *
	 * @Since 1.0.0
	 * @Version 1.0.0
	 */
	function wc_change_title_screen($title ){
		$screen = get_current_screen();
		if  ('faq' == $screen->post_type) {
		  $title = esc_html__('Enter your question here', 'eyecare');
		}
		if('testimonial' == $screen->post_type) { 
			$title = esc_html__('Enter Testimonial Title e.g Cheif Executive, Some Company', 'eyecare');
		}
		return $title;
	} //Function ends 
	add_filter( 'enter_title_here', 'wc_change_title_screen'); //Filter Ends 
