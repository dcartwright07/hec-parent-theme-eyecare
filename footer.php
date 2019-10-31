		<?php
			//add TEmplate For Call to Action
			get_template_part("template-parts/footer/call-to-action"); 
		?>
        
        <!-- Footer -->
        <div class="footer">
            <?php
				//Add template for Foote rInformation Boxes
				get_template_part("template-parts/footer/footer-information-boxes");
				
				//add Template For Footer Top
				get_template_part("template-parts/footer/footer-top"); 

				//add Template For Footer Bottom
				get_template_part("template-parts/footer/footer-bottom"); 
			?>
        </div>
        <!-- Footer Ends here /-->
        
    </div>
    <!-- Main Container /-->
	
	<?php
		if(get_theme_mod('wc_scrollup_disable') != 'on') {
			 
			echo wp_kses(
					'<a href="#top" id="top" class="animated fadeInUp start-anim"><i class="fa fa-angle-up"></i></a>', 
					array(
							'a' => array(
										'href'  => array(),
										'id'    => array(),
										'class' => array()
									),
							'i'  =>	array( 
										'class' => array()
							),
						)
					);	
		}
	?>
    
    <?php
		/**
		 * Main Function
		 * Loads Files
		 * And Scripts
		 */
		wp_footer();
	?>
</body>
</html>