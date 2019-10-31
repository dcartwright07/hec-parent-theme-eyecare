<?php
/**
 * Adds eyecare Contact widget.
 */
if(!class_exists('WC_Contact_Widget')): 
class WC_Contact_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'wc_contact_widget', // Base ID
			esc_html__('EyeCare - Contact', 'eyecare'), // Widget Name
			array( 'description' => esc_html__('EyeCare Footer Contact Widget', 'eyecare' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo wp_kses_post($args['before_widget']);
		if ( ! empty( $instance['title'] ) ) {
			echo wp_kses_post($args['before_title']) . wp_kses_post(apply_filters( 'widget_title', $instance['title'] )) . wp_kses_post($args['after_title']);
		}
		
		echo '<ul class="address">';

		//Getting up Address
		$address_title = $instance['address_title'];
		$address = $instance['address'];
		
		if(!empty($address)) { 
			echo "<li>";			
			echo "<h4><i class='fa fa-home'></i>".esc_html($address_title)."</h4>";					
			echo "<p>".esc_html($address)."</p>";	
			echo "</li>";
		}
		
		//Getting up Phone
		$phone_title = $instance['phone_title'];
		$phone = $instance['phone'];
		
		if(!empty($phone)) { 
			echo "<li>";			
			echo "<h4><i class='fa fa-mobile'></i>".esc_html($phone_title)."</h4>";					
			echo "<p>".esc_html($phone)."</p>";	
			echo "</li>";
		}
		
		//Getting up Phone
		$email_title = $instance['email_title'];
		$email = $instance['email'];
		
		if(!empty($email)) { 
			echo "<li>";			
			echo "<h4><i class='fa fa-envelope'></i>".esc_html($email_title)."</h4>";					
			echo "<p>".esc_html($email)."</p>";	
			echo "</li>";
		}

		echo '</ul>';
		
		//Social Icons if Enabled
		if($instance['enable_icons'] == "1") {  
			echo "<hr>";
            echo "<div class='socialicons'>";
			esc_html_e("Social:", "eyecare");     
			       
			$facebook_link 		= get_theme_mod('wc_socialoptions_fb_field', 'http://facebook.com/');
			$twitter_link 		= get_theme_mod('wc_socialoptions_tw_field', 'http://twitter.com');
			$linkedin_link 		= get_theme_mod('wc_socialoptions_lin_field', 'http://linkedin.com');
			$instagram_field 	= get_theme_mod('wc_socialoptions_in_field', 'http://instagram.com');
			$googleplus_field 	= get_theme_mod('wc_socialoptions_gp_field', 'http://plus.google.com/');
			$youtube_field 		= get_theme_mod('wc_socialoptions_yt_field', 'http://www.youtube.com'); 
		
		
			 if($facebook_link != "") : 
		        echo '<a href="'.esc_url($facebook_link).'"><i class="fa fa-facebook"></i></a>';
        	 endif; 
			 if($twitter_link != "") :
		        echo '<a href="'.esc_url($twitter_link).'"><i class="fa fa-twitter"></i></a>';
       		endif; 
			if($linkedin_link != "") : 
		        echo '<a href="'.esc_url($linkedin_link).'"><i class="fa fa-linkedin"></i></a>';
        	endif;
         	if($instagram_field != "") :
		        echo '<a href="'.esc_url($instagram_field).'"><i class="fa fa-instagram"></i></a>';
        	 endif;
        	if($googleplus_field != "") :
		        echo '<a href="'.esc_url($googleplus_field).'"><i class="fa fa-google-plus"></i></a>';
        	endif;
        	if($youtube_field != "") :
		        echo '<a href="'.esc_url($youtube_field).'"><i class="fa fa-youtube"></i></a>';
        	endif;
			
            echo "</div>";
		}
		echo wp_kses_post($args['after_widget']);
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Our Location', 'eyecare' );
			
		$address_title = ! empty( $instance['address_title'] ) ? $instance['address_title'] : esc_html__( 'Address', 'eyecare');
		$address = ! empty( $instance['address'] ) ? $instance['address'] : esc_html__( '132 Jefferson Avenue, Suite 22, Redwood City, CA 94872, USA', 'eyecare');
		
		//Phone Fields
		$phone_title = ! empty( $instance['phone_title'] ) ? $instance['phone_title'] : esc_html__( 'Phone', 'eyecare');
		$phone = ! empty( $instance['phone'] ) ? $instance['phone'] : esc_html__( '123-123-1234', 'eyecare');
		
		//Email Fields
		$email_title = ! empty( $instance['email_title'] ) ? $instance['email_title'] : esc_html__( 'Email', 'eyecare');
		$email = ! empty( $instance['email'] ) ? $instance['email'] : esc_html__( 'ateeq@yoursite.com', 'eyecare');
		
		?>
        <p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'eyecare' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
        
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id('address_title')); ?>"><?php esc_attr_e('Address Title:', 'eyecare'); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('address_title')); ?>" name="<?php echo esc_attr( $this->get_field_name('address_title')); ?>" type="text" value="<?php echo esc_attr($address_title); ?>">
		</p>

        <p>
		<label for="<?php echo esc_attr( $this->get_field_id('address')); ?>"><?php esc_attr_e('Address:', 'eyecare'); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('address')); ?>" name="<?php echo esc_attr( $this->get_field_name('address')); ?>" type="text" value="<?php echo esc_attr($address); ?>">
		</p>
        
        <p>
		<label for="<?php echo esc_attr( $this->get_field_id('phone_title')); ?>"><?php esc_attr_e('Phone Title:', 'eyecare'); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('phone_title')); ?>" name="<?php echo esc_attr( $this->get_field_name('phone_title')); ?>" type="text" value="<?php echo esc_attr($phone_title); ?>">
		</p>

        <p>
		<label for="<?php echo esc_attr( $this->get_field_id('phone')); ?>"><?php esc_attr_e('Phone:', 'eyecare'); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('phone')); ?>" name="<?php echo esc_attr( $this->get_field_name('phone')); ?>" type="text" value="<?php echo esc_attr($phone); ?>">
		</p>        
        
        <p>
		<label for="<?php echo esc_attr( $this->get_field_id('email_title')); ?>"><?php esc_attr_e('Email Title:', 'eyecare'); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('email_title')); ?>" name="<?php echo esc_attr( $this->get_field_name('email_title')); ?>" type="text" value="<?php echo esc_attr($email_title); ?>">
		</p>

        <p>
		<label for="<?php echo esc_attr( $this->get_field_id('email')); ?>"><?php esc_attr_e('Email:', 'eyecare'); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('email')); ?>" name="<?php echo esc_attr( $this->get_field_name('email')); ?>" type="text" value="<?php echo esc_attr($email); ?>">
		</p>        
        
        <p>
		<label for="<?php echo esc_attr( $this->get_field_id('enable_icons')); ?>"><?php esc_attr_e('Enable Social Icons:', 'eyecare'); ?></label>
         <?php 
		 	if(isset($instance['enable_icons']) && $instance['enable_icons'] == "1") { 
				$checked = "checked";
			} else { 
				$checked = "";
			}
		 ?>	
         <input class="widefat" type="checkbox" id="<?php echo esc_attr( $this->get_field_id('email')); ?>" <?php echo esc_attr($checked); ?> name="<?php echo esc_attr( $this->get_field_name('enable_icons')); ?>" value="1" />
		<small><?php esc_html_e("To set URls of Social icons please go to Appearance >> Customize Section.", "eyecare"); ?></small>
		</p>
        
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] 		= ( ! empty( $new_instance['title'] ) ) ? wp_kses_post( $new_instance['title'] ) : '';
		
		$instance['address_title'] = ( ! empty( $new_instance['address_title'] ) ) ? strip_tags( $new_instance['address_title']) : '';
		$instance['address'] = ( ! empty( $new_instance['address'] ) ) ? strip_tags( $new_instance['address']) : '';	
		
		//PHone Titles
		$instance['phone_title'] = ( ! empty( $new_instance['phone_title'] ) ) ? strip_tags( $new_instance['phone_title']) : '';
		$instance['phone'] = ( ! empty( $new_instance['phone'] ) ) ? strip_tags( $new_instance['phone']) : '';
		
		//Email Titles
		$instance['email_title'] = ( ! empty( $new_instance['email_title'] ) ) ? strip_tags( $new_instance['email_title']) : '';
		$instance['email'] = ( ! empty( $new_instance['email'] ) ) ? strip_tags( $new_instance['email']) : '';
		
		$instance['enable_icons'] = ( ! empty( $new_instance['enable_icons'] ) ) ? strip_tags( $new_instance['enable_icons']) : '';
		
		return $instance;
	}

} // class Foo_Widget
endif; //Class exist/not

// register Contact widget
function wc_register_contact_widget() {
    register_widget('WC_Contact_Widget');
}
add_action( 'widgets_init', 'wc_register_contact_widget' );