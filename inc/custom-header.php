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
 * Set up the WordPress core custom header feature.
 */
function wpicecold_custom_header_setup() {

	add_theme_support(
		'custom-header',
		apply_filters(
			'wpicecold_custom_header_args',
			array(
				'default-image' => get_template_directory_uri() . '/assets/images/snow-winter.jpg',
				'width'         => 1920,
				'height'        => 1280,
				'flex-width'    => true,
				'flex-height'   => true,
				'video'         => true,
				'header-text'   => false,
			)
		)
	);

	register_default_headers(
		array(
			'default-image'          => array(
				'url'           => '%s/assets/images/snow-winter.jpg',
				'thumbnail_url' => '%s/assets/images/snow-winter.jpg',
				'description'   => __( 'Default Header Winter', 'ice-cold' ),
			),
			'default-image-fog'      => array(
				'url'           => '%s/assets/images/computer-office.jpg',
				'thumbnail_url' => '%s/assets/images/computer-office.jpg',
				'description'   => __( 'Default Header Image Computer', 'ice-cold' ),
			),
			'default-image-snow'     => array(
				'url'           => '%s/assets/images/fog-landscape.jpg',
				'thumbnail_url' => '%s/assets/images/fog-landscape.jpg',
				'description'   => __( 'Default Header Image Fog', 'ice-cold' ),
			),
			'default-image-computer' => array(
				'url'           => '%s/assets/images/road-snow.jpg',
				'thumbnail_url' => '%s/assets/images/road-snow.jpg',
				'description'   => __( 'Default Header Image Road', 'ice-cold' ),
			),
		)
	);

}
add_action( 'after_setup_theme', 'wpicecold_custom_header_setup' );


add_filter( 'header_video_settings', 'my_header_video_settings' );

/**
 * Default settings for the video settings
 *
 * @param array $settings settings.
 * @return array
 */
function my_header_video_settings( $settings ) {
	$settings['minWidth']  = 680;
	$settings['minHeight'] = 400;
	return $settings;
}


