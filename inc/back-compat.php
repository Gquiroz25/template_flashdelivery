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
 * Function switch theme
 */
function wpicecold_switch_theme() {
	add_action( 'admin_notices', 'wpicecold_upgrade_notice' );
}
add_action( 'after_switch_theme', 'wpicecold_switch_theme' );

/**
 * Adds a message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * Twenty Seventeen on WordPress versions prior to 4.7.
 */
function wpicecold_upgrade_notice() {

	$message = sprintf(
		/* translators: %s: WordPress Version. */
		esc_html__( 'This theme requires at least WordPress version 5.0. You are running version %s. Please upgrade and try again.', 'ice-cold' ),
		esc_html( $GLOBALS['wp_version'] )
	);

	printf(
		/* translators: %s: Message requires wp version. */
		'<div class="error"><p>%s</p></div>',
		esc_html( $message )
	);
}

/**
 * Prevents the Customizer from being loaded on WordPress versions prior to 4.7.
 */
function wpicecold_customize() {
	wp_die(
		sprintf(
			/* translators: %s: WordPress Version. */
			esc_html__( 'wpicecold requires at least WordPress version 5.0. You are running version %s. Please upgrade and try again.', 'ice-cold' ),
			esc_html( $GLOBALS['wp_version'] )
		),
		'',
		array(
			'back_link' => true,
		)
	);
}
add_action( 'load-customize.php', 'wpicecold_customize' );

/**
 * Prevents the Theme Preview from being loaded on WordPress versions prior to 4.7.
 */
function wpicecold_preview() {
	// phpcs:ignore WordPress.Security.NonceVerification.Recommended
	if ( isset( $_GET['preview'] ) ) {
		wp_die(
			sprintf(
				/* translators: %s: WordPress Version. */
				esc_html__( 'wpicecold requires at least WordPress version 5.0. You are running version %s. Please upgrade and try again.', 'ice-cold' ),
				esc_html( $GLOBALS['wp_version'] )
			)
		);
	}
}
add_action( 'template_redirect', 'wpicecold_preview' );
