<?php

class Wc_Walker_Nav_Menu extends Walker_Nav_Menu {
    // Displays start of a level. E.g '<ul>'
    // @see Walker::start_lvl()
    function start_lvl(&$output, $depth=0, $args=array()) {
        $indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"child-nav menu vertical\">\n";
    }
 	
	function start_el(&$output, $item, $depth=0, $args=array(), $id=0) {

            if( $depth == 0) {
                    $output .= "<li class='single-sub parent-nav'>";
            }               
            if( $depth == 1 || $depth == 2) {
                    $output .= "<li>";
            }
            $attributes  = '';
            ! empty( $item->attr_title ) and $attributes .= ' title="' . esc_attr( $item->attr_title ) .'"';
            ! empty( $item->target )and $attributes .= ' target="' . esc_attr( $item->target ) .'"';
            ! empty( $item->xfn )and $attributes .= ' rel="' . esc_attr( $item->xfn ) .'"';
            ! empty( $item->url )and $attributes .= ' href="' . esc_attr( $item->url ) .'"';

            $title = apply_filters( 'the_title', $item->title, $item->ID );

            global $wpdb;
            $query = $wpdb->prepare("SELECT COUNT(*) FROM $wpdb->posts WHERE post_status ='publish' AND post_type='nav_menu_item' AND post_parent=%d", $item->ID);
            $child_count = $wpdb->get_var($query);

            if($child_count > 0) { /* THE MENU ELEMENT HAS CHILDREN */
                 $item_output = 
                    "<a $attributes class='menu'>"
                    . $title
                    . '</a> ';
            } else {
                    $item_output = 
                    "<a $attributes>"
                    . $title
                    . '</a> ';
            }

            $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth);

    }
}