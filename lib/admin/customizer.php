<?php
/**
 * Contains methods for customizing the eyecare Theme's customization screen.
 * 
 * @since eyecare 1.0.0
 */

if(!class_exists('WC_eyecare_Customize')){ 
class WC_eyecare_Customize {
   /**
    * @since 1.0.0
	* 
    * Adding Theme Customizer Options
	* And Controls
	*/
   
   public static function wc_register($wp_customize) {

	  require_once(get_template_directory() . '/lib/admin/customizer/general-options.php'); // General Options
	  require_once(get_template_directory() . '/lib/admin/customizer/top-bar.php'); // Top Bar Options
	  require_once(get_template_directory() . '/lib/admin/customizer/header.php'); // Header Options
	  require_once(get_template_directory() . '/lib/admin/customizer/typography.php'); // Header Options
	  require_once(get_template_directory() . '/lib/admin/customizer/inner-pages.php'); // Inner Pages panel Customizations
	  require_once(get_template_directory() . '/lib/admin/customizer/title-section.php'); // Title Section Customizations
	  require_once(get_template_directory() . '/lib/admin/customizer/blog-page.php'); // Blog Page Settings
	  
	  if(class_exists( 'WooCommerce' )) {
	  	require_once(get_template_directory() . '/lib/admin/customizer/wc-shop-page.php'); //Shop Page Settings
	  }
	  require_once(get_template_directory() . '/lib/admin/customizer/default-page.php'); // Default Page Settings
	  
	  if(function_exists('wc_required_modules')){	
	  	require_once(get_template_directory() . '/lib/admin/customizer/services-post-type.php'); // Single Service Settings
		require_once(get_template_directory() . '/lib/admin/customizer/single-optometrist.php'); // Single Optometrist Settings
	  }
	  
	  require_once(get_template_directory() . '/lib/admin/customizer/single-post.php'); // Blog Page Settings
	  require_once(get_template_directory() . '/lib/admin/customizer/site-identity.php'); // Site Identity Options	
	  
	  require_once(get_template_directory() . '/lib/admin/customizer/footer-options.php'); // Footer Options
	  require_once(get_template_directory() . '/lib/admin/customizer/call-to-action.php'); // Call To Action Options
	  require_once(get_template_directory() . '/lib/admin/customizer/footer-information-boxes.php'); // Footer Top Options
	  require_once(get_template_directory() . '/lib/admin/customizer/footer-top.php'); // Footer Top Options
	  require_once(get_template_directory() . '/lib/admin/customizer/footer-bottom.php'); //Footer Bottom Options
   }//register function ends


} // Class Ends.

// Setup the Theme Customizer settings and controls...
add_action('customize_register' , array('WC_eyecare_Customize' , 'wc_register'));

} //If class Exists