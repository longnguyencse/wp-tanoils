<?php

/**
 * Product Color Filters widget.
 *
 */
class NM_Color_Filters_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress
	 */
	function __construct() {
		parent::__construct(
			'nm_color_filters', // Base ID
			__('WooCommerce Color Filters', 'elm'), // Name
			array( 'description' => __( 'WooCommerce product color filters.', 'elm' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments
	 * @param array $instance Saved values from database
	 */
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );

		echo $args['before_widget'];
		if ( ! empty( $title ) )
			echo $args['before_title'] . $title . $args['after_title'];
			
		if ( $instance[ 'hide_empty' ] ) {
			$hide_empty = true;
		} else {
			$hide_empty = false;
		}
			
		$get_terms = get_terms( 'product_color', apply_filters( 'elm_cf_get_terms_args', array( 'hide_empty' => $hide_empty ) ) );
		
		if ( $get_terms ) {
		
		$saved_colors = get_option( 'nm_taxonomy_colors' );
?>
<div class="color-filters-wrap">
<?php 

	foreach( $get_terms as $term ) { 
		$color = @$saved_colors[$term->term_id];
		
		if ( !empty( $color ) ) {
			$style = apply_filters( 'elm_cf_color_style_attribute', 'style="background: ' . $color . ';"' );
		} else {
			$style = '';
		}
		
		$color_item_inline_css = '';
		
		if ( $instance['layout'] == 'color' ) 
			$color_item_inline_css .= apply_filters( 'elm_cf_color_item_inline_css', 'width: 20%;' );
?>

		<div class="color-item" style="<?php echo $color_item_inline_css; ?>">
		
			<?php if ( $instance['layout'] == 'color_and_text' ) { ?>
				<div class="color-wrap">
					<div class="rcorners" <?php echo $style; ?>><a href="<?php echo esc_url( get_term_link( $term ) ); ?>"><!-- --></a></div>
				</div>
				
				<span class="color-link color_and_text_link">
					<a href="<?php echo esc_url( get_term_link( $term ) ); ?>"><?php 
					
					echo $term->name;
					
					if ( $instance['product_count'] ) {
						echo ' ('. $term->count .')';
					}

					?></a>
				</span>
			<?php } else if ( $instance['layout'] == 'color' ) { 
			
			?>
				<div class="color-wrap">
					<div class="rcorners" <?php echo $style; ?>><a href="<?php echo esc_url( get_term_link( $term ) ); ?>"><!-- --></a></div>
				</div>
			<?php 
			} else if ( $instance['layout'] == 'text' ) { 
			?>	
				<span class="color-link">
					<a href="<?php echo esc_url( get_term_link( $term ) ); ?>"><?php 
					
					echo $term->name;
					
					if ( $instance['product_count'] ) {
						echo ' ('. $term->count .')';
					}

					?></a>
				</span>
			<?php } ?>
				
		</div>

<?php } ?>
		</div>
<?php
		}
		
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database
	 */
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		} else {
			$title = __( 'Color Filters', 'elm' );
		}
		
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		
		<p>
		<label for="<?php echo $this->get_field_id( 'Layout' ); ?>"><?php _e( 'Layout:' ); ?></label><br />
		<select id="<?php echo $this->get_field_id( 'layout' ); ?>" name="<?php echo $this->get_field_name( 'layout' ); ?>" class="widefat">
		<?php
		$options = array( 'color_and_text' => __('Color and text', 'elm'), 'color' => __('Color', 'elm'), 'text' => __('Text', 'elm') );
				
		foreach ( $options as $key => $value ) :
			$selected = ( $instance[ 'layout' ] == $key ) ? 'selected' : '';
		
			echo '<option value="'. $key .'" '. $selected .'>'. $value .'</option>' . "\r\n";
		endforeach;
		?>
		</select> 
		</p>
		
		<p>
		<input id="<?php echo $this->get_field_id( 'hide_empty' ); ?>" name="<?php echo $this->get_field_name( 'hide_empty' ); ?>" type="checkbox" value="1" <?php checked( 1, @$instance[ 'hide_empty' ] ); ?> />
		<label for="<?php echo $this->get_field_id( 'hide_empty' ); ?>"><?php _e( 'Hide empty', 'elm' ); ?></label>
		</p>
		
		<p>
		<input id="<?php echo $this->get_field_id( 'product_count' ); ?>" name="<?php echo $this->get_field_name( 'product_count' ); ?>" type="checkbox" value="1" <?php checked( 1, @$instance[ 'product_count' ] ); ?> />
		<label for="<?php echo $this->get_field_id( 'product_count' ); ?>"><?php _e( 'Include the number of assigned products', 'elm' ); ?></label>
		</p>
		
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved
	 * @param array $old_instance Previously saved values from database
	 *
	 * @return array Updated safe values to be saved
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['layout'] = ( ! empty( $new_instance['layout'] ) ) ? strip_tags( $new_instance['layout'] ) : '';
		$instance['hide_empty'] = ( ! empty( $new_instance['hide_empty'] ) ) ? strip_tags( $new_instance['hide_empty'] ) : '';
		$instance['product_count'] = ( ! empty( $new_instance['product_count'] ) ) ? strip_tags( $new_instance['product_count'] ) : '';
		
		return $instance;
	}
}

add_action('widgets_init',
     create_function('', 'return register_widget("NM_Color_Filters_Widget");')
);