<?php 
	//Getting Header header.php
	get_header();
?>	
		
        <!-- Content Area -->
	    <div class="content-section module pageerror">
            <div class="row">
                <h2><?php esc_html_e("404!", 				"eyecare"); ?></h2>
                <h3><?php esc_html_e("Page is not found!",  "eyecare"); ?></h3>
    
                <div class="clearfix"></div>
                
                <div class="medium-6 columns error-page-form">
                	
                    <form role="search" method="get" id="searchform"
    class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <div class="input-group">
                      <input name="s" id="s" class="input-group-field" placeholder="<?php esc_html_e("Enter your search term here so we can help you...", "eyecare"); ?>" type="text">
                      <div class="input-group-button">
                        <input id="searchsubmit" type="submit" class="button primary" value="<?php esc_html_e("Search", "eyecare"); ?>">
                      </div>
                    </div>
                    </form>
                </div>   
            </div>        
		</div>
	    <!-- Content Area Ends -->
		        
<?php
	//Getting footer.php
	get_footer();