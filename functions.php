<?php
	/**
	 * Main Theme Function File, Includes files of functions in those files.
	 * Functions are devided in different files to keep code readable.
	 */
	
	
	/**
	 * Core Functions
	 * File have some main functions
	 *
	 * @Since 1.0.0
	 * Version 1.0.0
	 */
	require_once(get_template_directory() . '/lib/core-functions.php');
	
	
	/**
	 * Plugins Loader File
	 * Help Installing Required Plugins
	 *
	 * @Since 1.0.0
	 * Version 1.0.0
	 */
	require_once(get_template_directory() . '/lib/admin/wc-tgm-load.php');
	
	
	/**
	 * Page Builder Templates
	 * King Composer Elements and extensions
	 *
	 * @Since 1.0.0
	 * Version 1.0.0
	 */
	require_once(get_template_directory().'/lib/admin/pagebuilder.php'); 
	
	/**
	 * Widget
	 * Time Table
	 *
	 * @Since 1.0.0
	 * Version 1.0.0
	 */
	require_once(get_template_directory() . '/lib/admin/widgets/time_table.php');
	
	
	/**
	 * Widget
	 * Contact Widget
	 *
	 * @Since 1.0.0
	 * Version 1.0.0
	 */
	require_once(get_template_directory() . '/lib/admin/widgets/contact_widget.php');
	
	
	/**
	 * Menu Walker
	 * Adds some required attributes to Menus. 
	 * And structure it
	 *
	 * @Since 1.0.0
	 * Version 1.0.0
	 */
	require_once(get_template_directory() . '/lib/wc_walker_nav_menu.php');
	
	
	/**
	 * Metaboxes
	 * Post Optinos Metaboxes 
	 *
	 * @Since 1.0.0
	 * Version 1.0.0
	 */
	require_once(get_template_directory() .'/lib/admin/metaboxes.php');
	
	
	/**
	 * Generated CSS
	 * From Metaboxes and From Customizer 
	 *
	 * @Since 1.0.0
	 * Version 1.0.0
	 */
	require_once(get_template_directory() .'/lib/admin/generated-css.php');
	
	
	/**
	 * Customizer Optinos
	 * Including Customizer Option Files 
	 *
	 * @Since 1.0.0
	 * Version 1.0.0
	 */
	require_once(get_template_directory() .'/lib/admin/customizer.php');
	
	
	/**
	 * Additional Customizer Types
	 * Files to add new customizer Types 
	 *
	 * @Since 1.0.0
	 * Version 1.0.0
	 */
	require_once(get_template_directory() .'/lib/admin/custom-customizer-types.php');
	require_once(get_template_directory() .'/lib/admin/custom-customizer-multi-checkboxes.php');
	
	
	
	/**
	 * WooCommerce Settings
	 * Configurations for Products/Store
	 *
	 * @Since 1.0.0
	 * Version 1.0.0
	 */
	require_once(get_template_directory().'/lib/admin/custom-post-types.php'); 
	
	
	
	/**
	 * WooCommerce Settings
	 * Configurations for Products/Store
	 *
	 * @Since 1.0.0
	 * Version 1.0.0
	 */
	require_once(get_template_directory().'/lib/woocommerce_config.php');
	
	
	
	/**
	 * Option Tree Files
	 * Including Files and setting up Option Tree
	 *
	 * @Since 1.0.0
	 * Version 1.0.0
	 */
	if(class_exists('OT_Loader' )): 
		require_once(get_template_directory() . '/lib/admin/theme-options.php');
	
		//Filter for option tree settings
		add_filter( 'ot_show_pages', '__return_false' );
		add_filter( 'ot_show_new_layout', '__return_false' );
		add_filter( 'ot_post_formats', '__return_true');
	endif;	