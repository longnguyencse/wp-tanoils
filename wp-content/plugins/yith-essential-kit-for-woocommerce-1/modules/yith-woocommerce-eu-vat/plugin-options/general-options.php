<?php
/**
 * This file belongs to the YIT Plugin Framework.
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly


$general_settings = array(
	array(
		'name' => __( 'General Settings', 'yith-woocommerce-eu-vat' ),
		'type' => 'title',
		'desc' => '',
		'id'   => 'ywev_general'
	),
	array(
		'name'    => __( 'Forbid EU VAT checkout', 'yith-woocommerce-eu-vat' ),
		'desc'    => __( 'Forbid EU VAT checkout.', 'yith-woocommerce-eu-vat' ),
		'id'      => 'ywev_forbid_checkout',
		'std'     => 'no',
		'default' => 'no',
		'type'    => 'checkbox'
	),
	array(
		'name'    => __( 'Show EU VAT warning', 'yith-woocommerce-eu-vat' ),
		'desc'    => __( 'If "Forbid EU VAT" checkout is selected, choose if a warning message should be shown during the checkout process.', 'yith-woocommerce-eu-vat' ),
		'id'      => 'ywev_show_forbid_warning',
		'std'     => 'no',
		'default' => 'no',
		'type'    => 'checkbox'
	),
	array(
		'name'    => __( 'EU VAT warning message', 'yith-woocommerce-eu-vat' ),
		'id'      => 'ywev_forbid_warning_message',
		'std'     => __( 'For EU area customers.<br>Due to EU VAT law terms, some product may be not purchasable.', 'yith-woocommerce-eu-vat' ),
		'default' => __( 'For EU area customers.<br>Due to EU VAT law terms, some product may be not purchasable.', 'yith-woocommerce-eu-vat' ),
		'css'     => 'width:80%; height: 90px;',
		'type'    => 'textarea',
	),
	array(
		'name'    => __( 'EU VAT error message', 'yith-woocommerce-eu-vat' ),
		'id'      => 'ywev_forbid_error_message',
		'default'     => __( "This order can't be accepted due to EU VAT laws. This shop doesn't allow EU area customers to purchase.", 'yith-woocommerce-eu-vat' ),
		'css'     => 'width:80%; height: 90px;',
		'type'    => 'textarea',
	),
	array( 'type' => 'sectionend', 'id' => 'ywev_general_end' )

);

$general_settings = apply_filters( 'yith_ywev_general_settings', $general_settings );

$options['general'] = array();


$options['general'] = array_merge( $options['general'], $general_settings );

return apply_filters( 'yith_ywev_tab_options', $options );

