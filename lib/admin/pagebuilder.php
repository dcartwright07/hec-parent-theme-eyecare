<?php
	/**
	 * This file includes Page Builder elements removing a file means removing an Element.
	 */
	
	
	/**
	 * Extend Row
	 *
	 * To add Special Classes
	 *
	 * @Since 1.0.0
	 */
	require_once(get_template_directory()."/lib/admin/pagebuilder/extend-row.php");
	
	
	/**
	 * Extend Column
	 *
	 * To add Special Classes
	 *
	 * @Since 1.0.0
	 */
	require_once(get_template_directory()."/lib/admin/pagebuilder/extend-columns.php");
	
	
	/**
	 * Section title
	 *
	 * Create Section of Title With Title and Description
	 *
	 * @Since 1.0.0
	 */
	require_once(get_template_directory()."/lib/admin/pagebuilder/section-title.php");
	
	
	/**
	 * Element Icon Box
	 *
	 * Adds Element For Icon Box
	 *
	 * @Since 1.0.0
	 */
	require_once(get_template_directory()."/lib/admin/pagebuilder/icon-box.php");
	
	
	/**
	 * Small banner box
	 *
	 * Adds Element For Banner
	 *
	 * @Since 1.0.0
	 */
	require_once(get_template_directory()."/lib/admin/pagebuilder/small-banner.php");
	
	
	/**
	 * Highlight banner box
	 *
	 * Adds Element For Banner
	 *
	 * @Since 1.0.0
	 */
	require_once(get_template_directory()."/lib/admin/pagebuilder/highlight-banner.php");
	
	
	/**
	 * Element Our Staff
	 *
	 * Adds Element For Staff
	 *
	 * @Since 1.0.0
	 */
	require_once(get_template_directory()."/lib/admin/pagebuilder/our-staff.php");
	
	
	/**
	 * Element Our Services
	 *
	 * Adds Element For Services
	 *
	 * @Since 1.0.0
	 */
	require_once(get_template_directory()."/lib/admin/pagebuilder/our-services.php");
	
	
	
	/**
	 * Element Optometrist Blog
	 *
	 * Adds Element For Optometrist Table
	 *
	 * @Since 1.0.0
	 */
	require_once(get_template_directory()."/lib/admin/pagebuilder/optometrist-blog.php");
	
	
	/**
	 * Element Price Block
	 *
	 * Adds Element For Pricing Table
	 *
	 * @Since 1.0.0
	 */
	require_once(get_template_directory()."/lib/admin/pagebuilder/price-table.php");
	
	
	/**
	 * Element Testimonials
	 *
	 * Adds Groupded and Carousel Element
	 *
	 * @Since 1.0.0
	 */
	require_once(get_template_directory()."/lib/admin/pagebuilder/testimonials.php");
	
	
	/**
	 * Element Faqs
	 *
	 * Adds Groupded and all Faq's Element
	 *
	 * @Since 1.0.0
	 */
	require_once(get_template_directory()."/lib/admin/pagebuilder/faqs.php");
	
	
	/**
	 * Element Carousel
	 *
	 * Carousel Element for brands
	 *
	 * @Since 1.0.0
	 */
	require_once(get_template_directory()."/lib/admin/pagebuilder/brands-carousel.php"); 
	
	
	/**
	 * Element Gallery
	 *
	 * Images Element for Gallery
	 *
	 * @Since 1.0.0
	 */
	require_once(get_template_directory()."/lib/admin/pagebuilder/gallery.php"); 
	
	
	 
	 /**
	  * Check if King Composer Active
	  *
	  * If active define Template path to add custom html.
	  *
	  * kc_add_map is function of king Composer which make sure Plugin is active.
	  */
	  
	  if(function_exists('kc_add_map')) { 
		add_action('init', 'kc_shortcodes_template_path', 99 );
 
		function kc_shortcodes_template_path(){
			global $kc;
			$kc->set_template_path( get_template_directory().'/lib/kc_templates/');
		}
	  } //Enf id