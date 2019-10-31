<?php 
	/**
	 * Template Name: Modules
	 */

	//Getting Header header.php
	get_header();
?>
    
    <!-- Content Area -->
    <?php
        //Getting posts sides
        get_template_part('template-parts/post-type/moduled');
    ?>
    <!-- Content Area Ends -->
		
<?php
	//Getting footer.php
	get_footer();