<?php
//Custom rElated items page.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product, $woocommerce_loop, $post;

if ( empty( $product ) || ! $product->exists() ) {
	return;
}

$posts_per_page = 4;
$object_id = $post->id;

$related = wc_get_related_products($object_id, $posts_per_page);

if ( !$related ) {
	return;
}


$args = apply_filters( 'woocommerce_related_products_args', array(
	'post_type'            => 'product',
	'ignore_sticky_posts'  => 1,
	'no_found_rows'        => 1,
	'posts_per_page'       => "4",
	'post__in'             => $related,
	'post__not_in'         => array( $object_id )
) );

$products                    = new WP_Query( $args );
$woocommerce_loop['name']    = 'related';
$woocommerce_loop['columns'] = apply_filters( 'woocommerce_related_products_columns', "4");

if ( $products->have_posts() ) : ?>
	<div class="grey-bg our-store">
	<div>
		
        <div class="row">
        	<div class="section-title-wrapper">
                <div class="section-title">
                    <h2><?php esc_html_e("Related Products", "eyecare"); ?></h2>
                    <p><?php esc_html_e("We suggest you some related items.", "eyecare"); ?></p>
                </div>
            </div> <!-- Title Ends /-->
        </div>

		<?php woocommerce_product_loop_start(); ?>

			<?php while ( $products->have_posts() ) : $products->the_post(); ?>

				<div <?php post_class("medium-3 small-12 columns"); ?>>
                    <div class="single-product">
					<?php
                    /**
                     * woocommerce_before_shop_loop_item_title hook.
                     *
                     * @hooked woocommerce_show_product_loop_sale_flash - 10
                     * @hooked woocommerce_template_loop_product_thumbnail - 10
                     */
                     echo "<div class='product-img thumbnail'>";
                
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
                        do_action( 'woocommerce_after_shop_loop_item' );
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

			<?php endwhile; // end of the loop. ?>

		<?php woocommerce_product_loop_end(); ?>

	</div>
    </div>

<?php endif;

wp_reset_postdata();