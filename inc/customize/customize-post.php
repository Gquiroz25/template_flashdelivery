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
 * Blog Settings
 *
 * @param object $wp_customize WP Customzier Object.
 */
function wpicecold_customize_register_post( $wp_customize ) {

	$wp_customize->add_section(
		'post_settings',
		array(
			'title'    => __( 'Post settings', 'ice-cold' ),
			'priority' => 130,
		)
	);

	// Show Author infobox on post view.
	$wp_customize->add_setting(
		'post_show_authorbox',
		array(
			'default'           => 'yes',
			'sanitize_callback' => 'wpicecold_sanitize_yes_no',
		)
	);

	$wp_customize->add_control(
		'post_show_authorbox',
		array(
			'label'             => __( 'Show author information box?', 'ice-cold' ),
			'section'           => 'post_settings',
			'description'       => __( 'Show the author information box. The name, description and the social media channels as link.', 'ice-cold' ),
			'type'              => 'radio',
			'choices'           => array(
				'no'  => __( 'No', 'ice-cold' ),
				'yes' => __( 'Yes', 'ice-cold' ),
			),
			'sanitize_callback' => 'wpicecold_sanitize_yes_no',
		)
	);

	// Show exerpt on blog page.
	$wp_customize->add_setting(
		'post_show_the_excerpt',
		array(
			'default'           => 'yes',
			'sanitize_callback' => 'wpicecold_sanitize_yes_no',
		)
	);

	$wp_customize->add_control(
		'post_show_the_excerpt',
		array(
			'label'             => __( 'Show the excerpt on the blog site?', 'ice-cold' ),
			'section'           => 'post_settings',
			'description'       => __( 'Show the excerpt or the full content on the blog site?', 'ice-cold' ),
			'type'              => 'radio',
			'choices'           => array(
				'no'  => __( 'No', 'ice-cold' ),
				'yes' => __( 'Yes', 'ice-cold' ),
			),
			'sanitize_callback' => 'wpicecold_sanitize_yes_no',
		)
	);
}
