<?php
/**
 * Author: triopsi
 * Author URI: http://wiki.profoxi.de
 * License: GPL3
 * License URI: https://www.gnu.org/licenses/gpl-3.0
 *
 * Ice-Cold is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 *
 * Ice-Cold is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with wpicecold. If not, see https://www.gnu.org/licenses/gpl-3.0.
 *
 * @package Ice-Cold
 *
 * @since 1.0.0
 *
 * @version 1.0.0
 */

?>
<?php

/**
 * Query WooCommerce activation
 *
 * @return bool
 */
function wpicecold_is_woocommerce_activated() {
	return class_exists( 'WooCommerce' ) ? true : false;
}

/**
 * Validates whether the Woo Cart instance is available in the request
 *
 * @return object
 */
function wpicecold_woo_cart_available() {
	$woo = WC();
	return $woo instanceof \WooCommerce && $woo->cart instanceof \WC_Cart;
}

/**
 * Cart Fragments
 * Ensure cart contents update when products are added to the cart via AJAX
 *
 * @param  array $fragments Fragments to refresh via AJAX.
 * @return array            Fragments to refresh via AJAX
 */
function wpicecold_cart_link_fragment( $fragments ) {
	global $woocommerce;
	ob_start();
	wpicecold_cart_link();
	$fragments['a.cart-customlocation'] = ob_get_clean();

	return $fragments;
}

/**
 * Cart Link
 * Displayed a link to the cart including the number of items present
 *
 * @return void
 */
function wpicecold_cart_link() {
	if ( ! wpicecold_woo_cart_available() ) {
		return;
	}
	?>
	<a class="cart-customlocation <?php echo ( WC()->cart->get_cart_contents_count() >= 1 ) ? 'animate__infinite animate__animated animate__pulse' : ''; ?>" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'ice-cold' ); ?>">
		<i class="fas fa-shopping-cart"></i> 
		<?php if ( WC()->cart->get_cart_contents_count() >= 1 ) { ?>
			<span class="badge badge-secondary"><?php echo wp_kses_data( WC()->cart->get_cart_contents_count() ); ?></span>
		<?php } ?>
	</a>
	<?php
}

add_filter( 'woocommerce_add_to_cart_fragments', 'wpicecold_cart_link_fragment' );
