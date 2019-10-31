<?php 
	//Getting Header header.php
	get_header();
?>
        <!-- Content Area -->
	    <div class="content-area shop module">
            <div class="row">
            	<?php
					$default_setting 	= get_theme_mod('wc_disable_rightleft_shoppage');
					$post_id 			= get_option('woocommerce_shop_page_id');
					$post_special 		= get_post_meta($post_id, 'wc_innerpage_sidebar_position', true);
					
					$sidebar_position = '';
					if($post_special != '') {
						$sidebar_position = $post_special;	
					} else if($default_setting != '') { 
						$sidebar_position = $default_setting;
					}
					
					if(is_product()) { 
						$sidebar_position = "disable_sidebar";	
					}
					
					if($sidebar_position == 'left_sidebar') { 
						//left sidebar
						get_sidebar();
						//Getting posts sides
						echo '<div class="medium-9 small-12 columns our-store">';
							woocommerce_content();
						echo '</div>';
					} else if($sidebar_position == 'right_sidebar' || $sidebar_position == '') { 
						//Getting posts sides
						echo '<div class="medium-9 small-12 columns our-store">';
							woocommerce_content();
						echo '</div>';
						//Right sidebar
						get_sidebar();
					} else if($sidebar_position == 'disable_sidebar') { 
						//No Sidebar
						echo '<div class="medium-12 small-12 columns our-store">';
							woocommerce_content();
						echo '</div>';
					}
				?>
            </div>
        </div>
    	<!-- Content Area Ends -->
		<?php 
			if(is_product()) {
				get_template_part('woocommerce/woocommerce_related_items');
			}
		?>	
<?php
	//Getting footer.php
	get_footer();