<?php
/*****
Declaring Some Custom Controls to user for Customizer
*****/
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'wc_eyecare_Customize_Misc_Control' ) ) :
class wc_eyecare_Customize_Misc_Control extends WP_Customize_Control {
    public $settings = 'blogname';
    public $description = '';
 
 
    public function render_content() {
        switch ( $this->type ) {
            default:
            case 'text' :
                echo '<p class="description">'.esc_html($this->description). '</p>';
                break;
 
            case 'heading':
                echo '<span class="customize-control-title">' . esc_html( $this->label ) . '</span>';
                break;
 
            case 'line' :
                echo '<hr />';
                break;
        }
    }
}
endif;