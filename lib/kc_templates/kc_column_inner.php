<?php

$wc_column_inner_background = $output = $width = $col_in_class = $col_in_class_container = $css = $col_id = '';
$attributes = array();

extract( $atts );

$classes = apply_filters( 'kc-el-class', $atts );
$classes[] = 'columns';
$classes[] = @kc_column_width_class( $width );

if(isset($wc_column_inner_background)) { 
	if($wc_column_inner_background == 'grey_background') {
		$classes[] = 'grey-bg';
	} elseif ($wc_column_inner_background == 'dark_background') {
		$classes[] = 'transparent-background';
	} 	
}

if( !empty( $col_in_class ) )
	$classes[] = $col_in_class;

if( !empty( $css ) )
	$classes[] = $css;

$col_in_class_container = !empty($col_in_class_container)?$col_in_class_container.' kc_wrapper kc-col-inner-container':'kc_wrapper kc-col-inner-container';


if( !empty( $col_id ) )
	$attributes[] = 'id="'. $col_id .'"';

$classes_vet = array();

foreach($classes as $class_new) { 
	
	$class_parts = array(); //empty array
	
	if(strpos($class_new, '_')) {
		$class_parts = explode('_', $class_new);
		if(strpos($class_parts[1], '-')) {
			$class_parts = explode('-', $class_parts[1]);
		}
	}
	
	$class_prefix = '';
	if(!empty($class_parts[1])) {
		if($class_parts[1] == 'sm' || $class_parts[1] == 'of') { 
			$class_prefix = 'small';
		}
	}
	
	$class_suffix = '';
	if(!empty($class_parts[2])) {
		$class_suffix = $class_parts[2];
	}
	
	if($class_suffix == '1' || $class_suffix == '2' || $class_suffix == '3' || $class_suffix == '4'
	   || $class_suffix == '5' || $class_suffix == '6' || $class_suffix == '7' || $class_suffix == '8'
	   || $class_suffix == '9' || $class_suffix == '10' || $class_suffix == '11' || $class_suffix == '12') { 
		//This is column Class
		$classes_vet[] = $class_prefix.'-12';
	} else { 
		$classes_vet[] = $class_new;
	}
}//foreach ends.

$classes = $classes_vet;

$attributes[] = 'class="' . esc_attr( trim( implode(' ', $classes) ) ) . '"';

echo 	'<div ' . implode( ' ', $attributes ) . '>'
		. '<div class="'.trim( esc_attr( $col_in_class_container ) ).'">'
		. do_shortcode( str_replace('kc_column_inner#', 'kc_column_inner', $content ) )
		. '</div>'
		. '</div>';