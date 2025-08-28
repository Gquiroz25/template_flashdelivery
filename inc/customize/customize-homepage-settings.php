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
 * Homepage settings
 *
 * @param object $wp_customize WP Customzier Object.
 */
function wpicecold_customize_register_homepage_settings( $wp_customize ) {

	// Front Page Site Layout. Show option only on fronpage/static site.
	$wp_customize->add_setting(
		'page_layout_frontpage',
		array(
			'default'           => 'one-column',
			'sanitize_callback' => 'wpicecold_sanitize_page_layout',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		'page_layout_frontpage',
		array(
			'label'           => __( 'Page Layout Frontpage', 'ice-cold' ),
			'section'         => 'static_front_page',
			'type'            => 'radio',
			'description'     => __( 'Page layout', 'ice-cold' ),
			'active_callback' => 'wpicecold_is_static_front_page',
			'choices'         => array(
				'one-column' => __( 'One Column', 'ice-cold' ),
				'two-column' => __( 'Two Column', 'ice-cold' ),
			),
		)
	);

	// Heading on front page. Show option only on fronpage/static site.
	$wp_customize->add_setting(
		'page_layout_frontpage_header_show',
		array(
			'default'           => 'yes',
			'sanitize_callback' => 'wpicecold_sanitize_yes_no',
		)
	);

	$wp_customize->add_control(
		'page_layout_frontpage_header_show',
		array(
			'label'             => __( 'Show Heading on the front page', 'ice-cold' ),
			'section'           => 'static_front_page',
			'type'              => 'radio',
			'description'       => __( 'Show Heading on the front page.', 'ice-cold' ),
			'sanitize_callback' => 'wpicecold_sanitize_yes_no',
			'active_callback'   => 'wpicecold_is_static_front_page',
			'choices'           => array(
				'yes' => __( 'Yes', 'ice-cold' ),
				'no'  => __( 'No', 'ice-cold' ),
			),
		)
	);

	// Post per page. Show option only on fronpage/static site.
	$wp_customize->add_setting(
		'page_layout_frontpage_posts_per_page',
		array(
			'default'           => 3,
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'page_layout_frontpage_posts_per_page',
		array(
			'label'           => __( 'Post per page on the blog section', 'ice-cold' ),
			'section'         => 'static_front_page',
			'type'            => 'text',
			'description'     => __( 'Show recent blog posts.', 'ice-cold' ),
			'active_callback' => 'wpicecold_is_static_front_page',
		)
	);

	$num_sections = apply_filters( 'wpicecold_front_page_sections', 4 );

	// Create a setting and control for each of the sections available in the theme.
	for ( $i = 1; $i < ( 1 + $num_sections ); $i++ ) {
		$wp_customize->add_setting(
			'panel_' . $i,
			array(
				'default'           => false,
				'sanitize_callback' => 'absint',
			)
		);

		$wp_customize->add_control(
			'panel_' . $i,
			array(
				/* translators: %d: The front page section number. */
				'label'           => sprintf( __( 'Front Page Section %d Content', 'ice-cold' ), $i ),
				'description'     => ( 1 !== $i ? '' : __( 'Select pages to feature in each area from the dropdowns. Add an image to a section by setting a featured image in the page editor. Empty sections will not be displayed.', 'ice-cold' ) ),
				'section'         => 'static_front_page',
				'type'            => 'dropdown-pages',
				'allow_addition'  => true,
				'active_callback' => 'wpicecold_is_static_front_page',
			)
		);

		$wp_customize->selective_refresh->add_partial(
			'panel_' . $i,
			array(
				'selector'            => '#panel' . $i,
				'render_callback'     => 'wpicecold_front_page_section',
				'container_inclusive' => true,
			)
		);
	}

	// Create a setting and control for each of the sections/parallax available in the theme.
	for ( $i = 1; $i < ( 1 + $num_sections ); $i++ ) {
		$wp_customize->add_setting(
			'panel_up_' . $i,
			array(
				'default'           => false,
				'sanitize_callback' => 'absint',
			)
		);

		$wp_customize->add_control(
			'panel_up_' . $i,
			array(
				/* translators: %d: The front page section number. */
				'label'           => sprintf( __( 'Front Page Up Section for %d Panel', 'ice-cold' ), $i ),
				'description'     => ( 1 !== $i ? '' : __( 'Select pages to feature in each area from the dropdowns. Add an image to a section by setting a featured image in the page editor. Empty sections will not be displayed.', 'ice-cold' ) ),
				'section'         => 'static_front_page',
				'type'            => 'dropdown-pages',
				'allow_addition'  => true,
				'active_callback' => 'wpicecold_is_static_front_page',
			)
		);

		$wp_customize->selective_refresh->add_partial(
			'panel_up_' . $i,
			array(
				'selector'            => '#panelup' . $i,
				'render_callback'     => 'wpicecold_front_page_up_section',
				'container_inclusive' => true,
			)
		);
	}

	// Page Layout on blog post/sites.
	$wp_customize->add_setting(
		'page_layout_blog_site',
		array(
			'default'           => 'two-column',
			'sanitize_callback' => 'wpicecold_sanitize_page_layout',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		'page_layout_blog_site',
		array(
			'label'       => __( 'Blog/Site page layout', 'ice-cold' ),
			'section'     => 'static_front_page',
			'type'        => 'radio',
			'description' => __( 'Blog/Site page layout', 'ice-cold' ),
			'choices'     => array(
				'one-column' => __( 'One Column', 'ice-cold' ),
				'two-column' => __( 'Two Column', 'ice-cold' ),
			),
		)
	);

	// Enable preloader.
	$wp_customize->add_setting(
		'loader_page_jquery',
		array(
			'default'           => 'no',
			'sanitize_callback' => 'wpicecold_sanitize_yes_no',
		)
	);

	$wp_customize->add_control(
		'loader_page_jquery',
		array(
			'label'             => __( 'Show the preloader animation?', 'ice-cold' ),
			'section'           => 'static_front_page',
			'description'       => __( 'Show a gif animation before the site loads end.', 'ice-cold' ),
			'type'              => 'radio',
			'sanitize_callback' => 'wpicecold_sanitize_yes_no',
			'choices'           => array(
				'yes' => __( 'Yes', 'ice-cold' ),
				'no'  => __( 'No', 'ice-cold' ),
			),
		)
	);
}
