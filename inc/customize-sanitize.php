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

/**
 * Sanitize the page layout options.
 *
 * @param string $input Input for the check.
 */
function wpicecold_sanitize_menue_position( $input ) {
	$valid = array(
		'fixed-top'    => __( 'fixed-top', 'ice-cold' ),
		'fixed-bottom' => __( 'fixed-bottom', 'ice-cold' ),
		'sticky-top'   => __( 'sticky-top', 'ice-cold' ),
		'none'         => __( 'none', 'ice-cold' ),
	);

	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	}

	return '';
}

/**
 * Sanitize the page layout options.
 *
 * @param string $input Input for the check.
 */
function wpicecold_sanitize_page_layout( $input ) {
	$valid = array(
		'one-column' => __( 'One Column', 'ice-cold' ),
		'two-column' => __( 'Two Column', 'ice-cold' ),
	);

	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	}

	return '';
}

/**
 * Sanitize yes or no options
 *
 * @param string $input Input for the check.
 */
function wpicecold_sanitize_yes_no( $input ) {
	$valid = array(
		'yes' => __( 'Yes', 'ice-cold' ),
		'no'  => __( 'No', 'ice-cold' ),
	);

	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	}
	return '';
}

/**
 * Sanitize boolean for checkbox.
 *
 * @param bool $checked Whether or not a box is checked.
 * @return bool
 */
function wpicecold_sanitize_checkbox( $checked = null ) {
	return (bool) isset( $checked ) && true === $checked;
}


/**
 * Sanitize the colorscheme.
 *
 * @param string $input Colorhex.
 */
function wpicecold_sanitize_colorscheme( $input ) {
	$valid = array( 'light', 'dark', 'white', 'custom' );

	if ( in_array( $input, $valid, true ) ) {
		return $input;
	}

	return 'light';
}

/**
 * Render the site title for the selective refresh partial.
 */
function wpicecold_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 */
function wpicecold_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Return whether we're previewing the front page and it's a static page.
 *
 * @return bool
 */
function wpicecold_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}


