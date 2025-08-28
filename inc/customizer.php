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
 * Registry Settings
 *
 * @param object $wp_customize Customizer Object.
 * @return void
 */
function wpicecold_customize_register( $wp_customize ) {

	// Add partials.
	$wp_customize->get_setting( 'blogname' )->transport         = 'refresh';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'refresh';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'refresh';

	$wp_customize->selective_refresh->add_partial(
		'blogname',
		array(
			'selector'        => '.site-title a',
			'render_callback' => 'wpicecold_customize_partial_blogname',
		)
	);

	$wp_customize->selective_refresh->add_partial(
		'blogdescription',
		array(
			'selector'        => '.site-description',
			'render_callback' => 'wpicecold_customize_partial_blogdescription',
		)
	);

	/**
	 * Custom colors
	 */
	// phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
	require get_template_directory() . '/inc/customize/customize-color.php';
	wpicecold_customize_register_color( $wp_customize );

	/**
	 * Nav options
	 */
	// phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
	require get_template_directory() . '/inc/customize/customize-nav.php';
	wpicecold_customize_register_nav( $wp_customize );

	/**
	 * Post Settings
	 */
	// phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
	require get_template_directory() . '/inc/customize/customize-post.php';
	wpicecold_customize_register_post( $wp_customize );

	/**
	 * Site settings
	 */
	// phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
	require get_template_directory() . '/inc/customize/customize-page.php';
	wpicecold_customize_register_page( $wp_customize );

	/**
	 * Header-Medien Options
	 */
	// phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
	require get_template_directory() . '/inc/customize/customize-header-media.php';
	wpicecold_customize_register_header_media( $wp_customize );

	/**
	 * Homepage Settings
	 */
	// phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
	require get_template_directory() . '/inc/customize/customize-homepage-settings.php';
	wpicecold_customize_register_homepage_settings( $wp_customize );

}
add_action( 'customize_register', 'wpicecold_customize_register' );
