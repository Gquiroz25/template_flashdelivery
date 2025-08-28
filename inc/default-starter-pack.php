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
 * Content starter pack. Load this content on the first view
 */
function wpicecold_starter_pack() {

	// Define and register starter content to showcase the theme on new sites.
	$starter_content = array(
		// Place three core-defined widgets in the sidebar area. Blog.
		'widgets'     => array(
			'sidebar-1'   => array(
				'text_business_info',
				'search',
				'meta',
				'text_about',
			),
			// Add the core-defined business info widget to the footer 1 area.
			'footer-1'    => array(
				'text_business_info',
			),
			// Put two core-defined widgets in the footer 2 area.
			'footer-2'    => array(
				'text_about',
				'search',
			),
			// Put two core-defined widgets in the footer 2 area.
			'footer-3'    => array(
				'text_business_info',
			),
			// Put two core-defined widgets in the footer 5 area.
			'footer-4'    => array(
				'calendar',
			),
			// Put a text widget in the top sidebar area.
			'sidebar-top' => array(
				// Widget ID.
				'my_text' => array(
					// Widget $id -> set when creating a Widget Class.
					'text',
					// Widget $instance -> settings.
					array(
						'title' => 'My Title',
						'text'  => 'My Text',
					),
				),
			),
		),
		// Specify the core-defined pages to create and add custom thumbnails to some of them.
		'posts'       => array(
			'home',
			'about',
			'contact',
			'blog',
			'homepage-section',
			'loremipsum'  => array(
				'thumbnail'    => '{{image-road}}',
				'post_type'    => 'page',
				'post_title'   => 'Lorem ipsum',
				'post_content' => '<h1>Lorem ipsum dolor.</h1><h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec purus feugiat, molestie ipsum et.</h5><div class="wp-block-button"><a class="wp-block-button__link" href="#">Ipsum dolor </a></div>',
			),
			'loremipsum2' => array(
				'thumbnail'    => '{{image-snow}}',
				'post_type'    => 'page',
				'post_title'   => 'Lorem ipsum',
				'post_content' => '<h1>Lorem ipsum dolor.</h1><h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec purus feugiat, molestie ipsum et.</h5><div class="wp-block-button"><a class="wp-block-button__link" href="#">Ipsum dolor </a></div>',
			),
			'news'        => array(
				'thumbnail'    => '{{image-fog}}',
				'post_type'    => 'page',
				'post_title'   => __( 'News', 'ice-cold' ),
				'post_content' => '<h1>Lorem ipsum dolor.</h1><h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec purus feugiat, molestie ipsum et.</h5><div class="wp-block-button"><a class="wp-block-button__link" href="#">Ipsum dolor </a></div>',
			),
		),
		// Create the custom image attachments used as post thumbnails for pages.
		'attachments' => array(
			'image-forest'  => array(
				'post_title' => __( 'Forest Image', 'ice-cold' ),
				'file'       => 'assets/images/road-snow.jpg', // URL relative to the template directory.
			),
			'image-fog'     => array(
				'post_title' => __( 'Fog Image', 'ice-cold' ),
				'file'       => 'assets/images/train-snow.jpg',
			),
			'image-snow'    => array(
				'post_title' => __( 'Snow Image', 'ice-cold' ),
				'file'       => 'assets/images/winter-road.jpg',
			),
			'image-contact' => array(
				'post_title' => __( 'Contact Image', 'ice-cold' ),
				'file'       => 'assets/images/computer-office.jpg',
			),
			'image-road'    => array(
				'post_title' => __( 'Road Image', 'ice-cold' ),
				'file'       => 'assets/images/fog-landscape.jpg',
			),
		),
		// Default to a static front page and assign the front and posts pages.
		'options'     => array(
			'show_on_front'  => 'page',
			'page_on_front'  => '{{home}}',
			'page_for_posts' => '{{blog}}',
			'header_image'   => get_theme_file_uri() . '/assets/images/snow-winter.jpg',
		),
		// Set the front page section theme mods to the IDs of the core-registered pages.
		'theme_mods'  => array(
			'panel_1'                                 => '{{homepage-section}}',
			'panel_2'                                 => '{{about}}',
			'panel_3'                                 => '{{blog}}',
			'panel_4'                                 => '{{contact}}',
			'panel_up_1'                              => '{{loremipsum}}',
			'panel_up_4'                              => '{{loremipsum2}}',
			'page_layout_blog_site'                   => 'one-column',
			'page_layout_frontpage'                   => 'one-column',
			'page_layout_frontpage_header_show'       => 'no',
			'colorscheme'                             => 'white',
			'header_size_full_front'                  => true,
			'header_border_size'                      => 6,
			'header_bottom_border_size'               => 3,
			'header_background_overlay_color_opacity' => 4,
			'header_grid_enable_disabled_checkbox'    => true,
			'page_header_blur'                        => 0,
		),
		// Set up nav menus for each of the two areas registered in the theme.
		'nav_menus'   => array(
			// Assign a menu to the "top" location.
			'top'    => array(
				'name'  => __( 'Top Menu', 'ice-cold' ),
				'items' => array(
					'link_home', // Note that the core "home" page is actually a link in case a static front page is not used.
					'page_about',
					'page_blog',
					'page_contact',
					'page_loremuipsum' => array(
						'type'      => 'post_type',
						'object'    => 'page',
						'object_id' => '{{loremipsum}}',
					),
				),
			),
			// Assign a menu to the "social" location.
			'social' => array(
				'name'  => __( 'Social Links Menu', 'ice-cold' ),
				'items' => array(
					'link_yelp',
					'link_facebook',
					'link_twitter',
					'link_instagram',
					'link_email',
				),
			),
		),
	);
	return apply_filters( 'wpicecold_starter_content', $starter_content );
}
