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
 * Customize Colors
 *
 * @param object $wp_customize WP Customzier Object.
 */
function wpicecold_customize_register_color( $wp_customize ) {

	$wp_customize->add_setting(
		'colorscheme',
		array(
			'default'           => 'white',
			'sanitize_callback' => 'wpicecold_sanitize_colorscheme',
		)
	);

	$wp_customize->add_control(
		'colorscheme',
		array(
			'type'     => 'radio',
			'label'    => __( 'Color Scheme', 'ice-cold' ),
			'choices'  => array(
				'light' => __( 'Light', 'ice-cold' ),
				'dark'  => __( 'Dark', 'ice-cold' ),
				'white' => __( 'White', 'ice-cold' ),
			),
			'section'  => 'colors',
			'priority' => 5,
		)
	);

	// Color Border.
	$wp_customize->add_setting(
		'main_color',
		array(
			'default'           => '#186ca0',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'main_color',
			array(
				'label'       => __( 'Main Color', 'ice-cold' ),
				'description' => esc_html__( 'Main color for everything. Title, Links , Borders on pages or posts.', 'ice-cold' ),
				'section'     => 'colors',
				'settings'    => 'main_color',
				'priority'    => 9,
			)
		)
	);

	// Border-size.
	$wp_customize->add_setting(
		'header_border_size',
		array(
			'default'           => 6,
			'transport'         => 'refresh',
			'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control(
		'header_border_size',
		array(
			'type'        => 'range',
			'section'     => 'colors',
			'label'       => __( 'Header top border size', 'ice-cold' ),
			'description' => __( 'Choose a border size', 'ice-cold' ),
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 10,
				'step' => 1,
			),
		)
	);

	// Border-size Bottom Header.
	$wp_customize->add_setting(
		'header_bottom_border_size',
		array(
			'default'           => 3,
			'transport'         => 'refresh',
			'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control(
		'header_bottom_border_size',
		array(
			'type'        => 'range',
			'section'     => 'colors',
			'label'       => __( 'Header bottom border size', 'ice-cold' ),
			'description' => __( 'Choose a border size', 'ice-cold' ),
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 10,
				'step' => 1,
			),
		)
	);

	// Background color Footer.
	$wp_customize->add_setting(
		'footer_bg_color',
		array(
			'default'           => '#2c3e50',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'footer_bg_color',
			array(
				'label'       => __( 'Footer Background Color', 'ice-cold' ),
				'description' => esc_html__( 'Background color', 'ice-cold' ),
				'section'     => 'colors',
				'settings'    => 'footer_bg_color',
			)
		)
	);

	// Color Footer.
	$wp_customize->add_setting(
		'footer_color',
		array(
			'default'           => '#fff',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		'footer_color',
		array(
			'label'       => __( 'Footer Text Color', 'ice-cold' ),
			'description' => esc_html__( 'Text color', 'ice-cold' ),
			'section'     => 'colors',
			'priority'    => 10,
			'type'        => 'color',
		)
	);
}
