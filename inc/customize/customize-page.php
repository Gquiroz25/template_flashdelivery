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
 * Page Settings
 *
 * @param object $wp_customize WP Customzier Object.
 */
function wpicecold_customize_register_page( $wp_customize ) {

	$wp_customize->add_section(
		'page_settings',
		array(
			'title'    => __( 'Page settings', 'ice-cold' ),
			'priority' => 130,
		)
	);

	// Show thunbnail on site.
	$wp_customize->add_setting(
		'page_show_thumbnail',
		array(
			'default'           => 'yes',
			'sanitize_callback' => 'wpicecold_sanitize_yes_no',
		)
	);

	$wp_customize->add_control(
		'page_show_thumbnail',
		array(
			'label'             => __( 'Show the thumbnail on the page?', 'ice-cold' ),
			'section'           => 'page_settings',
			'description'       => __( 'Show a thumbnail on the page.', 'ice-cold' ),
			'type'              => 'radio',
			'choices'           => array(
				'no'  => __( 'No', 'ice-cold' ),
				'yes' => __( 'Yes', 'ice-cold' ),
			),
			'sanitize_callback' => 'wpicecold_sanitize_yes_no',
		)
	);
}
