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
 * Navigation options
 *
 * @param object $wp_customize WP Customzier Object.
 */
function wpicecold_customize_register_nav( $wp_customize ) {

	$wp_customize->add_section(
		'nav_options',
		array(
			'title'    => __( 'Navigation Options', 'ice-cold' ),
			'priority' => 130,
		)
	);

	// Menu position.
	$wp_customize->add_setting(
		'page_header_menue_fixed',
		array(
			'default'           => 'none',
			'sanitize_callback' => 'wpicecold_sanitize_menue_position',
		)
	);

	$wp_customize->add_control(
		'page_header_menue_fixed',
		array(
			'label'       => __( 'Navigation Fixed', 'ice-cold' ),
			'section'     => 'nav_options',
			'type'        => 'radio',
			'choices'     => array(
				'fixed-top'    => __( 'fixed-top', 'ice-cold' ),
				'fixed-bottom' => __( 'fixed-bottom', 'ice-cold' ),
				'sticky-top'   => __( 'sticky-top', 'ice-cold' ),
				'none'         => __( 'none', 'ice-cold' ),
			),
			'description' => __( 'Choose Navigation Position', 'ice-cold' ),
		)
	);

	// Menu opacity.
	$wp_customize->add_setting(
		'nav_opacity',
		array(
			'default'           => '10',
			'transport'         => 'refresh',
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'nav_opacity',
		array(
			'type'        => 'range',
			'section'     => 'nav_options',
			'label'       => __( 'Opacity of the menu', 'ice-cold' ),
			'description' => __( 'Choose a opacity', 'ice-cold' ),
			'input_attrs' => array(
				'min'  => 1,
				'max'  => 10,
				'step' => 1,
			),
		)
	);
}
