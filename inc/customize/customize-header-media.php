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
 * Custom media on header
 *
 * @param object $wp_customize WP Customzier Object.
 */
function wpicecold_customize_register_header_media( $wp_customize ) {

	// Blur Filter.
	$wp_customize->add_setting(
		'page_header_blur',
		array(
			'default'           => 0,
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'page_header_blur',
		array(
			'type'        => 'range',
			'section'     => 'header_image',
			'label'       => __( 'Image blur effect', 'ice-cold' ),
			'description' => __( 'Choose a size of the blur effect. (0=No Blur)', 'ice-cold' ),
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 10,
				'step' => 1,
			),
		)
	);

	// Header Image/Video Size checkbox.
	$wp_customize->add_setting(
		'header_size_full_front',
		array(
			'sanitize_callback' => 'wpicecold_sanitize_checkbox',
			'default'           => false,
		)
	);

	$wp_customize->add_control(
		'header_size_full_front',
		array(
			'type'        => 'checkbox',
			'section'     => 'header_image',
			'label'       => __( 'Full header size for image/video?', 'ice-cold' ),
			'description' => __( 'The image or video fill the first view on the website.', 'ice-cold' ),
		)
	);

	// Header Raster checkbox.
	$wp_customize->add_setting(
		'header_grid_enable_disabled_checkbox',
		array(
			'sanitize_callback' => 'wpicecold_sanitize_checkbox',
			'default'           => true,
		)
	);

	$wp_customize->add_control(
		'header_grid_enable_disabled_checkbox',
		array(
			'type'        => 'checkbox',
			'section'     => 'header_image',
			'label'       => __( 'Enable a grid on the picture or video', 'ice-cold' ),
			'description' => __( 'A grid is on the picture or video', 'ice-cold' ),
		)
	);

	// Header Raster checkbox.
	$wp_customize->add_setting(
		'header_grid_color_checkbox',
		array(
			'sanitize_callback' => 'wpicecold_sanitize_checkbox',
			'default'           => true,
		)
	);

	$wp_customize->add_control(
		'header_grid_color_checkbox',
		array(
			'type'        => 'checkbox',
			'section'     => 'header_image',
			'label'       => __( 'Enable overlay color on the picture or video', 'ice-cold' ),
			'description' => __( 'Here you can definied a overlay color', 'ice-cold' ),
		)
	);

	// Overlay color.
	$wp_customize->add_setting(
		'header_background_overlay_color',
		array(
			'default'           => '#628ed6',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'header_background_overlay_color',
			array(
				'label'       => __( 'Grid Color', 'ice-cold' ),
				'description' => __( 'Choose a overlay color', 'ice-cold' ),
				'section'     => 'header_image',
				'settings'    => 'header_background_overlay_color',
			)
		)
	);

	// Opacity overlay color.
	$wp_customize->add_setting(
		'header_background_overlay_color_opacity',
		array(
			'default'           => '4',
			'transport'         => 'refresh',
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'header_background_overlay_color_opacity',
		array(
			'type'        => 'range',
			'section'     => 'header_image',
			'label'       => __( 'Opacity overlay color', 'ice-cold' ),
			'description' => __( 'Choose a opacity for the overlay color', 'ice-cold' ),
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 10,
				'step' => 1,
			),
		)
	);
}
