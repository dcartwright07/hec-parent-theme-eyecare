<?php
/**
 * The template for displaying product search form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/product-searchform.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<form role="search" method="get" class="woocommerce-product-search search_form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="text" class="search_field" placeholder="<?php esc_html_e('Search products &hellip;', 'eyecare'); ?>" value="<?php echo esc_attr(get_search_query()); ?>" name="s" title="<?php esc_html_e('Search for:', 'eyecare'); ?>" />
	<button type="submit" class="button primary"><i class="fa fa-search"></i></button>

	<input type="hidden" name="post_type" value="product" />
</form>	
