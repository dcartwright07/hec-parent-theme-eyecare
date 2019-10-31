<?php
	/**
	 * This file contains 
	 * metabox and functionality 
	 * for Page Layout
	 *
	 * @Since 1.0.0
	 */
	
	if(!function_exists('wc_page_layout_boxes')):
	add_action( 'admin_init', 'wc_page_layout_boxes' );

	/**
	 * Meta Boxes Page Layout.
	 *
	 * This file handles Metaboxes for posts and other for page layout.
	 *
	 * @since     1.0
	 */
	function wc_page_layout_boxes() {
	  
	  /**
	   * Create a custom meta boxes array that we pass to 
	   * the OptionTree Meta Box API Class.
	   */
	   
		$wc_page_layout_array = array(
			'id'          => 'wc_page_layout',
			'title'       => esc_html__('Page Layout/Style', 'eyecare' ),
			'desc'        => '',
			'pages'       => array('post', 'page', 'service', 'optometrist'),
			'context'     => 'normal',
			'priority'    => 'high',
			'fields'      => array(
					array(
						'label'       => esc_html__('Top Bar', 'eyecare' ),
						'id'          => 'wc_topbar_section',
						'type'        => 'tab'
					),
					array(
						'label'       => esc_html__('Display Top Bar', 'eyecare' ),
						'id'          => 'wc_topbar_enable',
						'type'        => 'on-off',
						'desc'        => esc_html__( 'Disable or Enable Top Bar on this page/post', 'eyecare' ),
						'std'         => ''
				     ),
				 	 array(
						'label'       => esc_html__('Display on Left Side', 'eyecare' ),
						'id'          => 'wc_topbar_ls_display',
						'type'        => 'radio',
						'desc'        => esc_html__('For Text Field, or Social Icons, go to Customizer >> top bar and select icons, and text for text field.', 'eyecare' ),
						'choices'     => array( 
										  array(
											'value'       => 'text-field',
											'label'       => esc_html__( 'Text Field', 'eyecare' ),
											'src'         => ''
										  ),
										  array(
											'value'       => 'top-menu',
											'label'       => esc_html__( 'Top Menu', 'eyecare' ),
											'src'         => ''
										  ),
										  array(
											'value'       => 'selective-icons',
											'label'       => esc_html__('Selective Social Icons', 'eyecare'),
											'src'         => ''
										  ),
									)	  
				  ),
				 	 array(
						'label'       => esc_html__('Display on Right Side', 'eyecare' ),
						'id'          => 'wc_topbar_rs_display',
						'type'        => 'radio',
						'desc'        => esc_html__('For Text Field, or Social Icons, go to Customizer >> top bar and select icons, and text for text field.', 'eyecare' ),
						'choices'     => array( 
										  array(
											'value'       => 'text-field',
											'label'       => esc_html__( 'Text Field', 'eyecare' ),
											'src'         => ''
										  ),
										  array(
											'value'       => 'top-menu',
											'label'       => esc_html__( 'Top Menu', 'eyecare' ),
											'src'         => ''
										  ),
										  array(
											'value'       => 'selective-icons',
											'label'       => esc_html__('Selective Social Icons', 'eyecare'),
											'src'         => ''
										  ),
									)	  
				  ),
				  array(
					'label'       => esc_html__('Background Color', 'eyecare' ),
					'id'          => 'wc_topbar_sty_bgcolor',
					'type'        => 'colorpicker',
					'desc'        => esc_html__( 'Use Appearance >> Customize for default behaviour', 'eyecare' ),
					'std'         => ''
				  ),
				  array(
					'label'       => esc_html__('Border Color', 'eyecare' ),
					'id'          => 'wc_topbar_sty_bordercolor',
					'type'        => 'colorpicker',
					'desc'        => esc_html__( 'Use Appearance >> Customize for default behaviour', 'eyecare' ),
					'std'         => ''
				  ),
				  array(
					'label'       => esc_html__('Links Color', 'eyecare' ),
					'id'          => 'wc_topbar_sty_linkscolor',
					'type'        => 'colorpicker',
					'desc'        => esc_html__( 'Use Appearance >> Customize for default behaviour', 'eyecare' ),
					'std'         => ''
				  ),
				  array(
					'label'       => esc_html__('Links Hover Color', 'eyecare' ),
					'id'          => 'wc_topbar_sty_linkhovercolor',
					'type'        => 'colorpicker',
					'desc'        => esc_html__( 'Use Appearance >> Customize for default behaviour', 'eyecare' ),
					'std'         => ''
				  ),
				  array(
					'label'       => esc_html__('Text Color', 'eyecare' ),
					'id'          => 'wc_topbar_sty_txtcolor',
					'type'        => 'colorpicker',
					'desc'        => esc_html__( 'Use Appearance >> Customize for default behaviour', 'eyecare' ),
					'std'         => ''
				  ),
				  array(
						'label'       => esc_html__('Header Options', 'eyecare' ),
						'id'          => 'wc_header_section',
						'type'        => 'tab'
					),
				   array(
						'label'       => esc_html__('Select Header Type:', 'eyecare' ),
						'id'          => 'wc_header_type_display',
						'type'        => 'radio',
						'desc'        => esc_html__('If you selected header type 2 Go to Appearance >> Customize >> Header to set value for right section.', 'eyecare' ),
						'choices'     => array( 
										  array(
											'value'       => 'type-one',
											'label'       => esc_html__( 'Type1: (Left Side Logo, Right side Navigation)', 'eyecare' ),
											'src'         => ''
										  ),
										  array(
											'value'       => 'type-two',
											'label'       => esc_html__('Type2: (Left Logo, Right Text Field, Full width Nav)', 'eyecare' ),
											'src'         => ''
										  ),
										  array(
											'value'       => 'type-three',
											'label'       => esc_html__('Type3: (Left right Information boxes, Center Logo Centered Navigation.)', 'eyecare' ),
											'src'         => ''
										  ),
									)	  
				  ),
				  array(
					'label'       => esc_html__('Header Background Color', 'eyecare' ),
					'id'          => 'wc_header_sty_bgcolor',
					'type'        => 'colorpicker',
					'desc'        => esc_html__( 'Use Appearance >> Customize for default behaviour', 'eyecare' ),
					'std'         => ''
				  ),
				  array(
					'label'       => esc_html__('Link Color', 'eyecare' ),
					'id'          => 'wc_header_sty_linkcolor',
					'type'        => 'colorpicker',
					'desc'        => esc_html__( 'Use Appearance >> Customize for default behaviour', 'eyecare' ),
					'std'         => ''
				  ),
				  array(
					'label'       => esc_html__('Active/Hover Background Color', 'eyecare' ),
					'id'          => 'wc_header_sty_activebordercolor',
					'type'        => 'colorpicker',
					'desc'        => esc_html__( 'Use Appearance >> Customize for default behaviour', 'eyecare' ),
					'std'         => ''
				  ),
				  array(
					'label'       => esc_html__('Active/Hover Link Color', 'eyecare' ),
					'id'          => 'wc_header_sty_activelinkcolor',
					'type'        => 'colorpicker',
					'desc'        => esc_html__( 'Use Appearance >> Customize for default behaviour', 'eyecare' ),
					'std'         => ''
				  ),
				  array(
					'label'       => esc_html__('Sub Menu Background Color', 'eyecare' ),
					'id'          => 'wc_header_sty_submbgcolor',
					'type'        => 'colorpicker',
					'desc'        => esc_html__( 'Use Appearance >> Customize for default behaviour', 'eyecare' ),
					'std'         => ''
				  ),
				  array(
					'label'       => esc_html__('Sub Menu Link Color', 'eyecare' ),
					'id'          => 'wc_header_sty_submlinkcolor',
					'type'        => 'colorpicker',
					'desc'        => esc_html__( 'Use Appearance >> Customize for default behaviour', 'eyecare' ),
					'std'         => ''
				  ),
				  array(
					'label'       => esc_html__('Sub Menu Link Hover Color', 'eyecare' ),
					'id'          => 'wc_header_sty_submlinkhvrcolor',
					'type'        => 'colorpicker',
					'desc'        => esc_html__( 'Use Appearance >> Customize for default behaviour', 'eyecare' ),
					'std'         => ''
				  ),
				  array(
					'label'       => esc_html__('Header Type2 Navigation Background Color', 'eyecare' ),
					'id'          => 'wc_header_sty_type2bgcolor',
					'type'        => 'colorpicker',
					'desc'        => esc_html__( 'Use Appearance >> Customize for default behaviour', 'eyecare' ),
					'std'         => ''
				  ),
				  array(
					'label'       => esc_html__('Title Section', 'eyecare' ),
					'id'          => 'wc_title_section',
					'type'        => 'tab'
				  ),
				  array(
					'label'       => esc_html__('Display Title Section', 'eyecare' ),
					'id'          => 'wc_display_title_section',
					'type'        => 'on-off',
					'desc'        => esc_html__( 'Disable or Enable Title Section on this page/post', 'eyecare' ),
					'std'         => ''
				  ),
				  array(
					'label'       => esc_html__('Title Section Background', 'eyecare' ),
					'id'          => 'wc_background_title_section',
					'type'        => 'upload',
					'desc'        => esc_html__( 'Use Appearance >> customize for default Background on all pages', 'eyecare' ),
					'std'         => ''
				  ),
				  array(
					'label'       => esc_html__('Display Breadcrumbs?', 'eyecare' ),
					'id'          => 'wc_display_breadcrumbs',
					'type'        => 'on-off',
					'desc'        => esc_html__( 'Disable or Enable Breadcrumbs use Appearance >> Customize for default behaviour', 'eyecare' ),
					'std'         => ''
				  ),
				  array(
					'label'       => esc_html__('Background Color', 'eyecare' ),
					'id'          => 'wc_bgcolor_title_section',
					'type'        => 'colorpicker',
					'desc'        => esc_html__( 'Use Appearance >> Customize for default behaviour', 'eyecare' ),
					'std'         => ''
				  ),
				  array(
					'label'       => esc_html__('Text/Link Color', 'eyecare' ),
					'id'          => 'wc_txt_link_color_title_section',
					'type'        => 'colorpicker',
					'desc'        => esc_html__( 'Use Appearance >> Customize for default behaviour', 'eyecare' ),
					'std'         => ''
				  ),
				  
				  
			  array(
				'label'       => esc_html__('Sidebar Options', 'eyecare' ),
				'id'          => 'wc_sidebar_options',
				'type'        => 'tab'
			  ),
				  array(
					'label'       => esc_html__('Sidebar Position', 'eyecare' ),
					'id'          => 'wc_innerpage_sidebar_position',
					'type'        => 'radio-image',
					'desc'        => esc_html__('From Appearance >> Menu default position can set.', 'eyecare' ),
					'choices'     => array( 
										  array(
											'value'       => 'left_sidebar',
											'label'       => esc_html__( 'Left Sidebar', 'eyecare' ),
											'src'         => get_template_directory_uri().'/assets/images/layout/left-sidebar.png'
										  ),
										  array(
											'value'       => 'right_sidebar',
											'label'       => esc_html__( 'Right Sidebar', 'eyecare' ),
											'src'         => get_template_directory_uri().'/assets/images/layout/right-sidebar.png'
										  ),
										  array(
											'value'       => 'disable_sidebar',
											'label'       => esc_html__( 'Disable Sidebar', 'eyecare'),
											'src'         => get_template_directory_uri().'/assets/images/layout/full-width.png'
										  ),
									)	  
				  ),
				  
			  array(
				'label'       => esc_html__('Call to Action', 'eyecare' ),
				'id'          => 'wc_footer_calltoaction_options',
				'type'        => 'tab'
			  ),
				  array(
					'label'       => esc_html__('Display Call To Action Box?', 'eyecare' ),
					'id'          => 'wc_display_calltoaction',
					'type'        => 'on-off',
					'desc'        => esc_html__( 'Use Appearance >> Customize for default behaviour', 'eyecare' ),
					'std'         => ''
				  ),
				  array(
					'label'       => esc_html__('Background Color', 'eyecare' ),
					'id'          => 'wc_bgcolor_calltoaction',
					'type'        => 'colorpicker',
					'desc'        => esc_html__( 'Use Appearance >> Customize for default behaviour', 'eyecare' ),
					'std'         => ''
				  ),
				  array(
					'label'       => esc_html__('Text/Button Color', 'eyecare' ),
					'id'          => 'wc_txtbutton_calltoaction',
					'type'        => 'colorpicker',
					'desc'        => esc_html__( 'Use Appearance >> Customize for default behaviour', 'eyecare' ),
					'std'         => ''
				  ),
				  array(
					'label'       => esc_html__('Text/Button Hover/Text Highlight Color', 'eyecare' ),
					'id'          => 'wc_hovercolor_calltoaction',
					'type'        => 'colorpicker',
					'desc'        => esc_html__( 'Use Appearance >> Customize for default behaviour', 'eyecare' ),
					'std'         => ''
				  ),
				  array(
					'label'       => esc_html__('Side Image Call to Action', 'eyecare' ),
					'id'          => 'wc_cta_side_image',
					'type'        => 'upload',
					'desc'        => esc_html__( 'Use Appearance >> customize for default Background on all pages', 'eyecare' ),
					'std'         => ''
				  ),
				  array(
					'label'       => esc_html__( 'Left Text', 'eyecare'),
					'id'          => 'wc_leftcontent_calltoaction',
					'type'        => 'textarea',
					'desc'        => esc_html__( 'Wrap in &lt;span&gt;xxx-xx-xxx&lt;/span&gt; To highlight Text', 'eyecare' )
				  ),
				  array(
					'label'       => esc_html__( 'Right button Text', 'eyecare'),
					'id'          => 'wc_btntxt_calltoaction',
					'type'        => 'text',
					'desc'        => esc_html__( 'Use Appearance >> Customize for default behaviour', 'eyecare' )
				  ),
				  array(
					'label'       => esc_html__( 'Right Button Link', 'eyecare'),
					'id'          => 'wc_btnlink_calltoaction',
					'type'        => 'text',
					'desc'        => esc_html__( 'Use Appearance >> Customize for default behaviour', 'eyecare' )
				  ),
			  array(
				'label'       => esc_html__('Footer Top Area', 'eyecare' ),
				'id'          => 'wc_footertop_options',
				'type'        => 'tab'
			  ),
				  array(
					'label'       => esc_html__('Display Footer Top Area?', 'eyecare' ),
					'id'          => 'wc_display_footertop',
					'type'        => 'on-off',
					'desc'        => esc_html__( 'Use Appearance >> Customize for default behaviour', 'eyecare' ),
					'std'         => ''
				  ),
				  array(
					'label'       => esc_html__('Footer Background', 'eyecare' ),
					'id'          => 'wc_background_footer',
					'type'        => 'upload',
					'desc'        => esc_html__( 'Use Appearance >> customize for default options', 'eyecare' ),
					'std'         => ''
				  ),
				  array(
					'label'       => esc_html__('Background Color', 'eyecare' ),
					'id'          => 'wc_bgcolor_footer',
					'type'        => 'colorpicker',
					'desc'        => esc_html__( 'Use Appearance >> Customize for default behaviour', 'eyecare' ),
					'std'         => ''
				  ),
				  array(
					'label'       => esc_html__('Footer Widgets', 'eyecare' ),
					'id'          => 'wc_footertop_widgets',
					'type'        => 'radio',
					'desc'        => esc_html__('From Appearance >> Menu default position can set.', 'eyecare' ),
					'choices'     => array( 
										  array(
											'value'       => 'two-widgets',
											'label'       => esc_html__( 'Two Widgets', 'eyecare' ),
											'src'         => ''
										  ),
										  array(
											'value'       => 'three-widgets',
											'label'       => esc_html__( 'Three Widgets', 'eyecare' ),
											'src'         => ''
										  ),
										  array(
											'value'       => 'four-widgets',
											'label'       => esc_html__('Four Widgets', 'eyecare'),
											'src'         => ''
										  ),
									)	  
				  ),
				  array(
					'label'       => esc_html__('Heading Color', 'eyecare' ),
					'id'          => 'wc_headingcolor_footer',
					'type'        => 'colorpicker',
					'desc'        => esc_html__( 'Use Appearance >> Customize for default behaviour', 'eyecare' ),
					'std'         => ''
				  ),
				  array(
					'label'       => esc_html__('Text Color', 'eyecare' ),
					'id'          => 'wc_textcolor_footer',
					'type'        => 'colorpicker',
					'desc'        => esc_html__( 'Use Appearance >> Customize for default behaviour', 'eyecare' ),
					'std'         => ''
				  ),
				  array(
					'label'       => esc_html__('Links Color', 'eyecare' ),
					'id'          => 'wc_linkcolor_footer',
					'type'        => 'colorpicker',
					'desc'        => esc_html__( 'Use Appearance >> Customize for default behaviour', 'eyecare' ),
					'std'         => ''
				  ),
				  array(
					'label'       => esc_html__('Link Hover Color', 'eyecare' ),
					'id'          => 'wc_hover_footer',
					'type'        => 'colorpicker',
					'desc'        => esc_html__( 'Use Appearance >> Customize for default behaviour', 'eyecare' ),
					'std'         => ''
				  ),
			
			array(
				'label'       => esc_html__('Footer Bottom Area', 'eyecare' ),
				'id'          => 'wc_footerbottom_options',
				'type'        => 'tab'
			  ),	  
				  array(
					'label'       => esc_html__('Display Footer Bottom Area?', 'eyecare' ),
					'id'          => 'wc_display_footerbottom',
					'type'        => 'on-off',
					'desc'        => esc_html__( 'Use Appearance >> Customize for default behaviour', 'eyecare' ),
					'std'         => ''
				  ),
				  array(
						'label'       => esc_html__('Display on Left Side', 'eyecare' ),
						'id'          => 'wc_footer_bottom_ls_display',
						'type'        => 'radio',
						'desc'        => esc_html__('For Copyright info, or Social Icons, go to Customizer >> footer bottomnd select icons, and text for text field.', 'eyecare' ),
						'choices'     => array( 
										  array(
											'value'       => 'copyright-info',
											'label'       => esc_html__( 'Copyright Info', 'eyecare' ),
											'src'         => ''
										  ),
										  array(
											'value'       => 'footer-menu',
											'label'       => esc_html__( 'Footer Menu', 'eyecare' ),
											'src'         => ''
										  ),
										  array(
											'value'       => 'selective-social-icons',
											'label'       => esc_html__('Selective Social Icons', 'eyecare'),
											'src'         => ''
										  ),
									)	  
				  ),
				  array(
						'label'       => esc_html__('Display on Right Side', 'eyecare' ),
						'id'          => 'wc_footer_bottom_rs_display',
						'type'        => 'radio',
						'desc'        => esc_html__('For Copyright info, or Social Icons, go to Customizer >> footer bottomnd select icons, and text for text field.', 'eyecare' ),
						'choices'     => array( 
										  array(
											'value'       => 'copyright-info',
											'label'       => esc_html__( 'Copyright Info', 'eyecare' ),
											'src'         => ''
										  ),
										  array(
											'value'       => 'footer-menu',
											'label'       => esc_html__( 'Footer Menu', 'eyecare' ),
											'src'         => ''
										  ),
										  array(
											'value'       => 'selective-social-icons',
											'label'       => esc_html__('Selective Social Icons', 'eyecare'),
											'src'         => ''
										  ),
									)	  
				  ),
				  array(
					'label'       => esc_html__('Background Color', 'eyecare' ),
					'id'          => 'wc_bgcolor_footerbottom',
					'type'        => 'colorpicker',
					'desc'        => esc_html__( 'Use Appearance >> Customize for default behaviour', 'eyecare' ),
					'std'         => ''
				  ),
				  array(
					'label'       => esc_html__('Text/Links Color', 'eyecare' ),
					'id'          => 'wc_textlink_footerbottom',
					'type'        => 'colorpicker',
					'desc'        => esc_html__( 'Use Appearance >> Customize for default behaviour', 'eyecare' ),
					'std'         => ''
				  ),
				  array(
					'label'       => esc_html__('Link Hover Color', 'eyecare' ),
					'id'          => 'wc_hover_footerbottom',
					'type'        => 'colorpicker',
					'desc'        => esc_html__( 'Use Appearance >> Customize for default behaviour', 'eyecare' ),
					'std'         => ''
				  ),
				  
				  //Tab For Boxed Layout
				  array(
					'label'       => esc_html__('Boxed Layout', 'eyecare' ),
					'id'          => 'wc_page_layout',
					'type'        => 'tab'
				  ),
				  array(
					'label'       => esc_html__('Enable Boxed Layout', 'eyecare' ),
					'id'          => 'wc_enable_boxed_layout',
					'type'        => 'on-off',
					'desc'        => esc_html__( 'Enable Boxed Layout', 'eyecare' ),
					'std'         => ''
				  ),
				  array(
					'label'       => esc_html__('Select Background Image', 'eyecare' ),
					'id'          => 'wc_boxedlayout_bg_image',
					'type'        => 'upload',
					'desc'        => esc_html__( 'Leave Blank to use apperance >> Customize Image.', 'eyecare' ),
					'std'         => ''
				  ),
				  array(
					'label'       => esc_html__('Background Color', 'eyecare' ),
					'id'          => 'wc_boxedlayout_bg_color',
					'type'        => 'colorpicker',
					'desc'        => esc_html__( 'Leave blank to use appearance >> customize color', 'eyecare' ),
					'std'         => ''
				  ),
		)
	  );
	  
  
	/**
	 * Register our meta boxes using the 
	 * ot_register_meta_box() function.
	 * if plugin is installed
	 */
	if ( function_exists( 'ot_register_meta_box' ) )
		ot_register_meta_box($wc_page_layout_array);
	}
	endif;