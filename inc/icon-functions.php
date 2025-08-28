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
 * Get icon
 *
 * @param array $args array of settings.
 * @return string htmlcode of the icon
 */
function wpicecold_get_icon( $args = array() ) {
	if ( empty( $args ) ) {
		return __( 'Please define default parameters in the form of an array.', 'ice-cold' );
	}

	// Define an icon.
	if ( false === array_key_exists( 'icon', $args ) ) {
		return __( 'Please define an SVG icon filename.', 'ice-cold' );
	}

	// Set defaults.
	$defaults = array(
		'icon'     => '',
		'title'    => '',
		'desc'     => '',
		'fallback' => false,
	);

	// Parse args.
	$args     = wp_parse_args( $args, $defaults );
	$iconhtml = '<i class="' . esc_attr( $args['icon'] ) . '"></i>';
	return $iconhtml;
}

/**
 * Display icons in social links menu.
 *
 * @param string  $item_output Items.
 * @param object  $item Item.
 * @param integer $depth Depth.
 * @param object  $args ARGS.
 * @return string htmlcode of menu
 */
function wpicecold_nav_menu_social_icons( $item_output, $item, $depth, $args ) {
	// Get supported social icons.
	$social_icons = wpicecold_social_links_icons();
	if ( 'social' === $args->theme_location ) {
		foreach ( $social_icons as $attr => $value ) {
			if ( false !== strpos( $item_output, $attr ) ) {
				$item_output = str_replace( $args->link_after, '</span>' . wpicecold_get_icon( array( 'icon' => esc_attr( $value ) ) ), $item_output );
			}
		}
	}
	return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'wpicecold_nav_menu_social_icons', 10, 4 );

/**
 * Add dropdown icon if menu item has children.
 *
 * @param string  $title Add title.
 * @param object  $item Item.
 * @param object  $args ARG.
 * @param integer $depth Depth.
 * @return string htmlcode
 */
function wpicecold_dropdown_icon_to_menu_link( $title, $item, $args, $depth ) {
	if ( 'top' === $args->theme_location ) {
		foreach ( $item->classes as $value ) {
			if ( 'menu-item-has-children' === $value || 'page_item_has_children' === $value ) {
				$title = $title . wpicecold_get_icon( array( 'icon' => 'angle-down' ) );
			}
		}
	}

	return $title;
}
add_filter( 'nav_menu_item_title', 'wpicecold_dropdown_icon_to_menu_link', 10, 4 );

/**
 * Returns an array of supported social links (URL and icon name).
 *
 * @return array array of icons
 */
function wpicecold_social_links_icons() {
	// Supported social links icons.
	$social_links_icons = array(
		'behance.net'     => 'fab fa-behance',
		'codepen.io'      => 'fab fa-codepen',
		'deviantart.com'  => 'fab fa-deviantart',
		'digg.com'        => 'fab fa-digg',
		'docker.com'      => 'fab fa-dockerhub',
		'dribbble.com'    => 'fab fa-dribbble',
		'dropbox.com'     => 'fab fa-dropbox',
		'facebook.com'    => 'fab fa-facebook-f',
		'flickr.com'      => 'fab fa-flickr',
		'foursquare.com'  => 'fab fa-foursquare',
		'plus.google.com' => 'fab fa-google-plus',
		'github.com'      => 'fab fa-github',
		'instagram.com'   => 'fab fa-instagram',
		'linkedin.com'    => 'fab fa-linkedin',
		'mailto:'         => 'far fa-envelope',
		'medium.com'      => 'fab fa-medium',
		'pinterest.com'   => 'fab fa-pinterest-p',
		'pscp.tv'         => 'fab fa-periscope',
		'getpocket.com'   => 'fab fa-get-pocket',
		'reddit.com'      => 'fab fa-reddit-alien',
		'skype.com'       => 'fab fa-skype',
		'skype:'          => 'fab fa-skype',
		'slideshare.net'  => 'fab fa-slideshare',
		'snapchat.com'    => 'fab fa-snapchat-ghost',
		'soundcloud.com'  => 'fab fa-soundcloud',
		'spotify.com'     => 'fab fa-spotify',
		'stumbleupon.com' => 'fab fa-stumbleupon',
		'tumblr.com'      => 'fab fa-tumblr',
		'twitch.tv'       => 'fab fa-twitch',
		'twitter.com'     => 'fab fa-twitter',
		'vimeo.com'       => 'fab fa-vimeo',
		'vine.co'         => 'fab fa-vine',
		'vk.com'          => 'fab fa-vk',
		'wordpress.org'   => 'fab fa-wordpress-simple',
		'wordpress.com'   => 'fab fa-wordpress-simple',
		'yelp.com'        => 'fab fa-yelp',
		'youtube.com'     => 'fab fa-youtube',
	);
	return apply_filters( 'wpicecold_social_links_icons', $social_links_icons );
}
