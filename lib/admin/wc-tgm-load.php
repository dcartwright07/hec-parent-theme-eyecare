<?php
/** Defining Required or Neccessary Plugins for Theme **/

require_once(get_template_directory() . '/lib/admin/class-tgm-plugin-activation.php');

add_action( 'tgmpa_register', 'wc_dentalcare_register_required_plugins' );

/** Register the required plugins for this theme **/

function wc_dentalcare_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		//Plugin from local directory
		array(
			'name'               => esc_html__('WebfulCreations Utilities', 'eyecare'), // The plugin name.
			'slug'               => 'wc_utilities', // The plugin slug (typically the folder name).
			'source'             => 'https://www.webfulcreations.com/dl/wc_utilities.zip', // The plugin source.
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'force_activation'   => false,
			'force_deactivation' => false,
		),
		
		//Plugin from local directory
		array(
			'name'               => esc_html__('Slider Revolution', 'eyecare'), // The plugin name.
			'slug'               => 'revslider', // The plugin slug (typically the folder name).
			'source'             => 'https://www.webfulcreations.com/dl/revslider.zip', // The plugin source.
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'force_activation'   => false,
			'force_deactivation' => false,
		),

		// Contact Form 7 From wordpress Reproistry
		array(
			'name'      => esc_html__('Contact Form 7', 'eyecare'),
			'slug'      => 'contact-form-7',
			'required'  => false,
		),
		//Option Tree Plugin From WordPress Reproistry
		array(
			'name'      => esc_html__('OptionTree', 'eyecare'),
			'slug'      => 'option-tree',
			'required'  => true,
		),
		//King Composer wordpress Reproistry
		array(
			'name'      => esc_html__('Page Builder: KingComposer', 'eyecare'),
			'slug'      => 'kingcomposer',
			'required'  => true,
		),
		array(
			'name'      => esc_html__('WooCommerce', 'eyecare'),
			'slug'      => 'woocommerce',
			'required'  => false,
		),
	);

	/*
	 * Configurations for Installation Page
	 *
	 */
	$config = array(
		'id'           => 'eyecare',       	   // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}
