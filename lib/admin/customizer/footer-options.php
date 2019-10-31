<?php
	//Footer Options Panel	 
	$wp_customize->add_panel('wc_footer_panel', array(
		'title' 		=> esc_html__('Footer Settings Styles/Layout', 'eyecare' ),
		'description' 	=> esc_html__('Manage Footer Settings Styles and Layouts', 'eyecare' ),
		'priority' 		=> 70,
	));