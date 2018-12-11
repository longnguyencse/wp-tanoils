<?php

class NM_Color_Filters {

	function __construct() {
		add_action( 'init', array( $this, 'init' ) );
		add_action( 'init', array( $this, 'update_check' ) );
	}
	
	/**
	 * Init actions and filters.
	 *
	 */
	function init() {
		if ( ! class_exists( 'WooCommerce' ) ) {
			add_action( 'admin_notices', array( $this, 'notice_no_woocommerce' ) );
			
			return false;
		}
	
		$this->register_taxonomy(); // Register product color taxonomy
		
		add_action( 'product_color_edit_form_fields', array( $this, 'product_color_edit_form_fields' ), 10, 2 );
		add_action( 'product_color_add_form_fields', array( $this, 'product_color_add_form_fields' ), 10, 2 );
		add_action( 'edited_product_color', array( $this, 'save_product_color' ), 10, 2);
		add_action( 'created_product_color', array( $this, 'save_product_color' ), 10, 2);
		add_action( 'product_color_edit_form', array( $this, 'product_color_edit_colorpicker_js' ), 10, 2 );
		add_action( 'product_color_add_form', array( $this, 'product_color_edit_colorpicker_js' ), 10, 2 );
		add_action( 'admin_enqueue_scripts', array( $this, 'load_custom_css_js' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'plugin_scripts' ) );
		add_action( 'admin_footer', array( $this, 'add_colors_admin_side' ) );
	}
	
	/*
     * Notice message when WooCommerce plugin is not activated
     */
	function notice_no_woocommerce() {
	?>
        <div class="message error"><p><?php printf( __( 'Color Filters by <a href="%s" target="_blank">Elementous</a> is enabled but not effective. It requires <a href="%s" target="_blank">WooCommerce</a> plugin in order to work.', 'elm' ), 'https://www.elementous.com', 'http://www.woothemes.com/woocommerce/' ); ?></p></div>
    <?php
	}

	/**
	 * Front-end display CSS.
	 *
	 */
	function plugin_scripts() {
		wp_enqueue_style( 'color-filters', CF_PLUGIN_URL . '/assets/css/color-filters.css' );
	}
	
	/**
	 * Load CSS and JS files for color picker.
	 *
	 * @param string $hook
	 */
	function load_custom_css_js( $hook ) {
		if ( 'edit-tags.php' != $hook && 'term.php' != $hook ) {
			return;
		}

		if ( isset( $_GET['taxonomy'] ) && $_GET['taxonomy'] == 'product_color' ) {	
			global $pagenow;

			wp_register_style( 'css_colorpicker', CF_PLUGIN_URL . '/assets/css/colorpicker.min.css' );
			wp_enqueue_style( 'css_colorpicker' );
			
			wp_register_style( 'color_filters', CF_PLUGIN_URL . '/assets/css/admin.css' );
			wp_enqueue_style( 'color_filters' );
				
			wp_enqueue_script( 'js_colorpicker', CF_PLUGIN_URL . '/assets/js/colorpicker.min.js' );
		}
	}
	
	/**
	 * Save color taxonomy and update its color in the database.
	 *
	 * @param integer $term_id
	 */
	function save_product_color( $term_id ) {
		$color = @sanitize_text_field( $_POST['normal_fill'] );
		
		$saved_colors = get_option( 'nm_taxonomy_colors' );
		
		// Quick edit
		// Do not overwrite color with empty value when saving via quick edit
		if ( @ !empty( $saved_colors[$term_id] ) && !$color )
			return;
		
		$saved_colors[$term_id] = $color;
		
		update_option( 'nm_taxonomy_colors', $saved_colors );
	}
	
	/**
	 * Add extra fields for product color to add color taxonomy screen.
	 *
	 * @param object $tag
	 */
	function product_color_add_form_fields( $tag ) {
	
		$term_id = @$tag->term_id;
		
		$color = '';
		
		if ( $term_id ) {
			$saved_colors = get_option( 'nm_taxonomy_colors' );
			$color = @$saved_colors[$term_id];
		}
			
?>
	
		<div class="form-field term-color-wrap cf-color-filters">
			<label for="normal_fill_color_picker">Color</label>
			<div>
				<div id="normal_fill_color_picker" class="colorSelector small-text"><div></div></div>
				
				<input class="cf-color small-text" name="normal_fill" id="normal_fill_color" type="text" value="<?php echo $color; ?>" size="40" />
				<br /><br />
			</div>
		</div>

<?php
	}

	/**
	 * Add extra fields for product color to edit color taxonomy screen.
	 *
	 * @param object $tag
	 */
	function product_color_edit_form_fields( $tag ) {
	
		$term_id = @$tag->term_id;
		
		$color = '';
		
		if ( $term_id ) {
			$saved_colors = get_option( 'nm_taxonomy_colors' );
			$color = @$saved_colors[$term_id];
		}
			
?>
	
		<tr class="form-field term-color-wrap cf-color-filters">
			<th scope="row"><label for="normal_fill_color_picker">Color</label></th>
				<td><div id="normal_fill_color_picker" class="colorSelector small-text"><div></div></div>
				
				<input class="cf-color small-text" name="normal_fill" id="normal_fill_color" type="text" value="<?php echo $color; ?>" size="40" />
				<br /><br />
			</td>
		</tr>

<?php
	}
	
	/**
	 * Add extra JavaScript code to handle color picker in the back-end.
	 *
	 */
	function product_color_edit_colorpicker_js() {
?>
	<script type="text/javascript">
		jQuery( document ).ready(function( $ ) {
			if ( jQuery().ColorPicker ) {
					jQuery( '.cf-color-filters' ).each( function () {
						var option_id = jQuery( this ).find( '.cf-color' ).attr( 'id' );
						var color = jQuery( this ).find( '.cf-color' ).val();
						var picker_id = option_id += '_picker';

						jQuery( '#' + picker_id ).children( 'div' ).css( 'backgroundColor', color );
						jQuery( '#' + picker_id ).ColorPicker({
							color: color,
							onShow: function ( colpkr ) {
								jQuery( colpkr ).fadeIn( 200 );
								return false;
							},
							onHide: function ( colpkr ) {
								jQuery( colpkr ).fadeOut( 200 );
								return false;
							},
							onChange: function ( hsb, hex, rgb ) {
								jQuery( '#' + picker_id ).children( 'div' ).css( 'backgroundColor', '#' + hex );
								jQuery( '#' + picker_id ).next( 'input' ).attr( 'value', '#' + hex );
							
							}
						});
					});
				}
			});
		</script>
<?php
	}
	
	/**
	 * Add color to its text in admin side.
	 *
	 */
	function add_colors_admin_side() {
		global $post, $pagenow;
	
		$colors = get_option( 'nm_taxonomy_colors' );
		
		if ( $colors && $pagenow == 'post.php' || $pagenow == 'post-new.php'  && get_post_type( $post ) == 'product' ) :
	?>
		<script type="text/javascript">
			jQuery( document ).ready(function( $ ) {
				<?php foreach( $colors as $term_id => $color_code ) : ?>
				jQuery('#product_color-<?php echo $term_id; ?>, #popular-product_color-<?php echo $term_id; ?>').prepend('<div style="width:20px;height:15px;background:<?php echo $color_code; ?>;float: left;margin: 5px 5px 0 0;"></div>');
				<?php endforeach; ?>
			});
		</script>
	<?php
		endif;
	}
	
	/**
	 * Add new taxonomy, make it hierarchical. This is the main taxonomy which handles product color.
	 *
	 */
	function register_taxonomy() {
		$labels = array(
			'name'              => _x( 'Colors', 'Color', 'elm' ),
			'singular_name'     => _x( 'Color', 'Color', 'elm' ),
			'search_items'      => __( 'Search Colors', 'elm' ),
			'all_items'         => __( 'All Colors', 'elm' ),
			'parent_item'       => __( 'Parent Color', 'elm' ),
			'parent_item_colon' => __( 'Parent Color:', 'elm' ),
			'edit_item'         => __( 'Edit Color', 'elm' ),
			'update_item'       => __( 'Update Color', 'elm' ),
			'add_new_item'      => __( 'Add New Color', 'elm' ),
			'new_item_name'     => __( 'New Color Name', 'elm' ),
			'menu_name'         => __( 'Colors', 'elm' ),
		);
	 
		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'product-color' )
		);
	 
		register_taxonomy( 'product_color', array( 'product' ), $args );
	
	}
	
	/**
	 * Install plugin.
	 *
	 */
	function install() {
		if ( get_option( 'nm_color_filters' ) != 'installed' ) {
			update_option( 'nm_color_filters', 'installed' );
			update_option( 'elm_color_filters_version', CF_VERSION );
		}
		
		// Register taxonomy here so that we can flush permalink rules
		$this->register_taxonomy();
		
		flush_rewrite_rules();
	}
	
	/**
	 * Handle updates.
	 *
	 */
	function update_check() {
		if ( ! get_option( 'elm_color_filters_version' ) ) {
			update_option( 'elm_color_filters_version', CF_VERSION );
		}
	}
}

