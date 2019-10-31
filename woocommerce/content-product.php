<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}

	/*
	 * Products Per Row Settings
	 * Theme's Default Function
	 */
	
	$default_columns = get_theme_mod('products_perrow_shop');
	
	if(!is_woocommerce()) { 
		$default_columns = "four-products";
	}
		
	switch($default_columns) { 
		case 'two-products':
			$classes = "medium-6 small-12 columns";
		break;
		
		case 'three-products':
			$classes = "large-4 medium-6 small-12 columns";	
		break;
		
		case 'four-products':
			$classes = "large-3 medium-6 small-12 columns";
		break;
		
		default: 
			$classes = "large-4 medium-6 small-12 columns";
	}
?>
<div <?php post_class($classes); ?>>
	<div class="single-product">
	<?php
	/**
	 * woocommerce_before_shop_loop_item_title hook.
	 *
	 * @hooked woocommerce_show_product_loop_sale_flash - 10
	 * @hooked woocommerce_template_loop_product_thumbnail - 10
	 */
	 echo "<div class='product-img thumbnail'>";
		
		
		/**
		 * Hook: woocommerce_before_shop_loop_item.
		 *
		 * @hooked woocommerce_template_loop_product_link_open - 10
		 */
		do_action( 'woocommerce_before_shop_loop_item' );
		

		echo "<a href='".esc_url(get_the_permalink())."'>";
		do_action( 'woocommerce_before_shop_loop_item_title' );
 	 	echo "</a>";
		/*
		 * Theme Specefied Function
		 *
		 * Responsible to call Wishlist Button, Product main page icon, and Share icons.
		 *
		 */
		wc_woocommerce_share_buttons();
		
	 echo "<div class='add-to-cart-top'>";
	 	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
		do_action( 'woocommerce_after_shop_loop_item');
	 echo "</div>"; //ADd to cart button wrappe rEnds
	 echo "</div>"; // Product Thumbnail ends.
	/**
	 * woocommerce_shop_loop_item_title hook.
	 *
	 * @hooked woocommerce_template_loop_product_title - 10
	 */
	 
	 echo '<div class="product-info">';
	do_action( 'woocommerce_shop_loop_item_title' );

	/**
	 * woocommerce_after_shop_loop_item_title hook.
	 *
	 * @hooked woocommerce_template_loop_rating - 5
	 * @hooked woocommerce_template_loop_price - 10
	 */
	do_action( 'woocommerce_after_shop_loop_item_title' );
	echo '</div>';//End Product info
	?>
	</div><!-- Single Product /-->
</div><!-- Product Column /-->