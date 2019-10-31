<?php

$wc_row_background = $output = $css_data = $css = '';

$cont_class = array( 'wc-row' );
$element_attributes = array();

extract($atts);

$css_classes = apply_filters( 'kc-el-class', $atts );

$css_classes[] = 'kc-row-container module';

if( $css != '' )
	$css_classes[] = $css;
	
if( !empty( $atts['row_class'] ) )
	$css_classes[] = $atts['row_class'];

if( !empty( $atts['full_height'] ) )
{
	if( $atts['content_placement'] == 'middle' )
		$element_attributes[] = 'data-kc-fullheight="middle-content"';
	else $element_attributes[] = 'data-kc-fullheight="true"';
	
}

if( empty($atts['column_align']) )
    $atts['column_align'] = 'center';

if( !empty( $atts['equal_height'] ) ){
    $element_attributes[] = 'data-kc-equalheight="true"';
    $element_attributes[] = 'data-kc-equalheight-align="'. $atts['column_align'] .'"';
}
	


if( isset( $atts['use_container'] ) && $atts['use_container'] == 'yes' )
	$cont_class[] = 'row';

if( !empty( $atts['container_class'] ) )
	$cont_class[] = ' '.$atts['container_class'];

if( !empty( $atts['css'] ) )
	$css_classes[] = $atts['css'];

/**
*Check video background
*/

if( $atts['video_bg'] === 'yes' )
{
	$video_bg_url = $atts['video_bg_url'];

	$has_video_bg = kc_youtube_id_from_url( $video_bg_url );

	if( !empty( $has_video_bg ) )
	{
		$css_classes[] = 'kc-video-bg';
		$element_attributes[] = 'data-kc-video-bg="' . esc_attr( $video_bg_url ) . '"';
		$css_data .= 'position: relative;';
	}
}


if( !empty( $atts['row_id'] ) )
	$element_attributes[] = 'id="' . esc_attr( $atts['row_id'] ) . '"';


if( empty( $has_video_bg ) )
{
	if( !empty( $atts['parallax'] ) )
	{

		$element_attributes[] = 'data-kc-parallax="true"';

		if( $atts['parallax'] == 'yes-new' )
		{
			$bg_image_id = $atts['parallax_image'];
			$bg_image = wp_get_attachment_image_src( $bg_image_id, 'full' );
			$css_data .= "background-image:url('".$bg_image[0]."');";
		}
	}
}

if(isset($wc_row_background)) { 
	if($wc_row_background == 'grey_background') {
		$css_classes[] = 'grey-bg';
	} elseif ($wc_row_background == 'dark_background') {
		$css_classes[] = 'transparent-background';
	} 	
}


$css_class = implode(' ', $css_classes);
$element_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . '"';

if( !empty( $css_data ) )
	$element_attributes[] = 'style="' . esc_attr( trim( $css_data ) ) . '"';

echo '<div ' . implode( ' ', $element_attributes ) . '>';

echo '<div class="' . esc_attr(implode( ' ', $cont_class)) . '">';

echo '<div class="kc-wrap-columns">'.do_shortcode( str_replace( 'kc_row#', 'kc_row', $content ) ).'</div>';

echo '</div>';

echo '</div>';