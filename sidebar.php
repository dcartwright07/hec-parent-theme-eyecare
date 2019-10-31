<?php
	/**
	 * Sidebar Template
	 */
?>

<div class="medium-3 small-12 columns sidebar">
                
    <?php
		if(is_page()) { 
			//Page Sidebar if single page
			$wc_sidebar = 'page-sidebar';
		} else { 
			//Display Default Sidebar
			$wc_sidebar = 'primary-sidebar';	
		}
		
		if(function_exists('is_woocommerce') && is_woocommerce()) { 
			//Shop Sidebar if single page
			$wc_sidebar = 'shop-pages';	
		}
		
		if(is_active_sidebar($wc_sidebar)) { 
			dynamic_sidebar($wc_sidebar);
		}
	?>
    
</div><!-- right bar ends here /-->