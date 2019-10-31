<?php

$wc_column_background = $width = $css = $output = $col_class = $col_container_class = $col_id = '';

extract( $atts );

$attributes = array();
$style = array();
$classes = apply_filters( 'kc-el-class', $atts );

$classes[] = 'columns';
$classes[] = @kc_column_width_class( $width );

if(isset($wc_column_background)) { 
	if($wc_column_background == 'grey_background') {
		$classes[] = 'grey-bg';
	} elseif ($wc_column_background == 'dark_background') {
		$classes[] = 'transparent-background';
	} 	
}

if( !empty( $col_class ) )
	$classes[] = $col_class;

if( !empty( $col_id ) )
	$attributes[] = 'id="'. $col_id .'"';

if( count($style) > 0 )	
	$attributes[] = 'style="'.implode(';', $style).'"';

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

$col_container_class = !empty( $col_container_class ) ? $col_container_class.' kc-col-container' : 'kc-col-container';

echo '<div ' . implode( ' ', $attributes ) . '>'
		. '<div class="'.esc_attr( $col_container_class ).'">'
		. do_shortcode( str_replace('kc_column#', 'kc_column', $content ) )
		. '</div>'
		. '</div>';