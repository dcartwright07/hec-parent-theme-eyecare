<?php
/*
 * Initialize the custom Theme Options.
 */
add_action( 'init', 'wc_custom_theme_options' );

/*
 * Build the custom settings & update OptionTree.
 *
 * @return    void
 * @since     1.0
 */
function wc_custom_theme_options() {

  /* OptionTree is not loaded yet, or this is not an admin request */
  if ( ! function_exists( 'ot_settings_id' ) || ! is_admin() ) { 
  		return false;
  }

  /*
   * Get a copy of the saved settings array. 
   */
  $saved_settings = get_option( ot_settings_id(), array() );
  
  /*
   * Custom settings array that will eventually be 
   * passes to the OptionTree Settings API Class.
   */
  $custom_settings = array( 
    'contextual_help' => array( 
      'content'       => array( 
        array(
          'id'        => 'wc_option_types_help',
          'title'     => esc_html__( 'Additional Codes', 'eyecare' ),
          'content'   => '<p>' . esc_html__( 'Add additional code to site. CSS and JS', 'eyecare' ) . '</p>'
        )
      ),
      'sidebar'       => '<p>' . esc_html__( 'Sidebar content goes here!', 'eyecare' ) . '</p>'
    ),
    'sections'        => array( 
      array(
        'id'          => 'wc_custom_options',
        'title'       => esc_html__( 'Additional Code', 'eyecare' )
      )
    ),
    'settings'        => array( 
      
      array(
        'id'          => 'wc_custom_css',
        'label'       => esc_html__( 'Custom CSS', 'eyecare' ),
        'desc'        => '<p>' . esc_html__("Custom CSS box does not need starting and closing style tags.", "eyecare") . '</p>',
        'type'        => 'css',
        'section'     => 'wc_custom_options',
        'rows'        => '20',
      ),
      array(
        'id'          => 'wc_custom_js',
        'label'       => esc_html__( 'JavaScript', 'eyecare' ),
        'desc'        => '<p>' . esc_html__( 'Custom javascript Does not require starting and closing script tags.', 'eyecare' ) . '</p>',
        'type'        => 'javascript',
        'section'     => 'wc_custom_options',
        'rows'        => '20',
      ),
      array(
        'id'          => 'wc_theme_customize_options',
        'label'       => esc_html__( 'Theme Customize Options', 'eyecare' ),
        'desc'        => esc_html__( 'This theme use wordpress default Apperance >> Customize for customize options.', 'eyecare' ),
        'type'        => 'textblock-titled',
        'section'     => 'wc_custom_options',
      )
    )
  );
  
  /* allow settings to be filtered before saving */
  $custom_settings = apply_filters( ot_settings_id() . '_args', $custom_settings );
  
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( ot_settings_id(), $custom_settings ); 
  }
  
  /* Lets OptionTree know the UI Builder is being overridden */
  global $ot_has_custom_theme_options;
  $ot_has_custom_theme_options = true;
  
}