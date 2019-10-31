<?php
/**
 * Adds eyecare TimeTable widget.
 */
if(!class_exists('WC_Time_Table')): 
class WC_Time_Table extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'wc_time_table', // Base ID
			esc_html__('EyeCare - Time Table', 'eyecare'), // Widget Name
			array( 'description' => esc_html__('EyeCare Footer Time Table Widget', 'eyecare' ), ) // Args
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

		
		echo '<ul class="vertical office-hours">';

		//Getting up Address
		$rows 	= array(); //Define empty array
		$rows[] = $instance['timetable_row1'];
		$rows[] = $instance['timetable_row2'];
		$rows[] = $instance['timetable_row3'];
		$rows[] = $instance['timetable_row4'];
		$rows[] = $instance['timetable_row5'];
		$rows[] = $instance['timetable_row6'];
		
		foreach($rows as $row) {
			if(!empty($row)) { 
				echo "<li>";
				echo wp_kses_post($row);
				echo "</li>";
			}//Not Empty	
		} //foreach Ends
		
		echo '</ul>';
		
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
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Office Hours', 'eyecare' );
		
		$timetable_row1 = ! empty( $instance['timetable_row1'] ) ? $instance['timetable_row1'] : esc_html__('Monday: <span>09:00 - 17:00</span>', 'eyecare');
		$timetable_row2 = ! empty( $instance['timetable_row2'] ) ? $instance['timetable_row2'] : esc_html__('Tuseday: <span>09:00 - 17:00</span>', 'eyecare');
		$timetable_row3 = ! empty( $instance['timetable_row3'] ) ? $instance['timetable_row3'] : esc_html__('Wednesday: <span>09:00 - 17:00</span>', 'eyecare');
		$timetable_row4 = ! empty( $instance['timetable_row4'] ) ? $instance['timetable_row4'] : esc_html__('Thursday: <span>09:00 - 17:00</span>', 'eyecare');
		$timetable_row5 = ! empty( $instance['timetable_row5'] ) ? $instance['timetable_row5'] : esc_html__('Friday: <span>09:00 - 17:00</span>', 'eyecare');
		$timetable_row6 = ! empty( $instance['timetable_row6'] ) ? $instance['timetable_row6'] : esc_html__('Saturday, Sunday: <span>Closed</span>', 'eyecare');
		?>
        <p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'eyecare' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
        
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id('timetable_row1')); ?>"><?php esc_attr_e('First Row:', 'eyecare'); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('timetable_row1')); ?>" name="<?php echo esc_attr( $this->get_field_name('timetable_row1')); ?>" type="text" value="<?php echo esc_attr($timetable_row1); ?>">
		</p>
        
        <p>
		<label for="<?php echo esc_attr( $this->get_field_id('timetable_row2')); ?>"><?php esc_attr_e('Second Row:', 'eyecare'); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('timetable_row2')); ?>" name="<?php echo esc_attr( $this->get_field_name('timetable_row2')); ?>" type="text" value="<?php echo esc_attr($timetable_row2); ?>">
		</p>
        
        <p>
		<label for="<?php echo esc_attr( $this->get_field_id('timetable_row3')); ?>"><?php esc_attr_e('Third Row:', 'eyecare'); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('timetable_row3')); ?>" name="<?php echo esc_attr( $this->get_field_name('timetable_row3')); ?>" type="text" value="<?php echo esc_attr($timetable_row3); ?>">
		</p>
        
        <p>
		<label for="<?php echo esc_attr( $this->get_field_id('timetable_row4')); ?>"><?php esc_attr_e('Fourth Row:', 'eyecare'); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('timetable_row4')); ?>" name="<?php echo esc_attr( $this->get_field_name('timetable_row4')); ?>" type="text" value="<?php echo esc_attr($timetable_row4); ?>">
		</p>
        
        <p>
		<label for="<?php echo esc_attr( $this->get_field_id('timetable_row5')); ?>"><?php esc_attr_e('Fifth Row:', 'eyecare'); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('timetable_row5')); ?>" name="<?php echo esc_attr( $this->get_field_name('timetable_row5')); ?>" type="text" value="<?php echo esc_attr($timetable_row5); ?>">
		</p>
        
        <p>
		<label for="<?php echo esc_attr( $this->get_field_id('timetable_row6')); ?>"><?php esc_attr_e('Sixth Row:', 'eyecare'); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('timetable_row6')); ?>" name="<?php echo esc_attr( $this->get_field_name('timetable_row6')); ?>" type="text" value="<?php echo esc_attr($timetable_row6); ?>">
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
		$instance 					= array();
		$instance['title'] 			= ( ! empty( $new_instance['title'] ) ) 		 ? wp_kses_post( $new_instance['title'] ) : '';
		$instance['timetable_row1'] = ( ! empty( $new_instance['timetable_row1'] ) ) ? wp_kses_post( $new_instance['timetable_row1']) : '';
		$instance['timetable_row2'] = ( ! empty( $new_instance['timetable_row2'] ) ) ? wp_kses_post( $new_instance['timetable_row2']) : '';	
		$instance['timetable_row3'] = ( ! empty( $new_instance['timetable_row3'] ) ) ? wp_kses_post( $new_instance['timetable_row3']) : '';
		$instance['timetable_row4'] = ( ! empty( $new_instance['timetable_row4'] ) ) ? wp_kses_post( $new_instance['timetable_row4']) : '';
		$instance['timetable_row5'] = ( ! empty( $new_instance['timetable_row5'] ) ) ? wp_kses_post( $new_instance['timetable_row5']) : '';
		$instance['timetable_row6'] = ( ! empty( $new_instance['timetable_row6'] ) ) ? wp_kses_post( $new_instance['timetable_row6']) : '';
		
		return $instance;
	}

} // class Foo_Widget
endif; //Class exist/not

// register Contact widget
function wc_register_timetable_widget() {
    register_widget('WC_Time_Table');
}
add_action( 'widgets_init', 'wc_register_timetable_widget' );