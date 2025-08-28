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
 * Get Breadcrumb as html
 */
function wpicecold_get_breadcrumb() {

	// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	$defaults = array();
	// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	$defaults['delimiter'] = ' &raquo; ';
	// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	$defaults['wrap_before'] = '<nav class="thbreadcrumb">';
	// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	$defaults['wrap_after'] = '</nav>';
	// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	$defaults['before'] = '';
	// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	$defaults['after'] = '';

	if ( wpicecold_is_woocommerce_activated() ) {

		woocommerce_breadcrumb( $defaults );

	} else {

		// Get the defaults values.
		$home = __( 'Home', 'ice-cold' );

		// Is home or another page for the start.
		if ( ! is_home() && ! is_front_page() || is_paged() ) {

			// Echo Warp.
			// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			echo $defaults['wrap_before'];

			global $post;

			// get first link.
			// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			echo '<a href="' . esc_url( home_url() ) . '">' . $home . '</a>' . $defaults['delimiter'] . '';

			// Link are in the category site.
			if ( is_category() ) {

				global $wp_query;

				$cat_obj = $wp_query->get_queried_object();

				$this_cat = $cat_obj->term_id;

				$this_cat = get_category( $this_cat );

				$parent_cat = get_category( $this_cat->parent );

				if ( ! $this_cat->parent ) :
					// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					echo esc_html( get_category_parents( $parent_cat, true, '' ) . $defaults['delimiter'] . '' );
				endif;

				// get category link.
				// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				echo $defaults['before'] . esc_html( single_cat_title( '', false ) ) . $defaults['after'];

			} elseif ( is_day() ) {

				// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				echo '<a href="' . esc_url( get_year_link( get_the_time( 'Y' ) ) ) . '">' . esc_html( get_the_time( 'Y' ) ) . '</a>' . $defaults['delimiter'] . '';

				// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				echo '<a href="' . esc_url( get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) ) . '">' . esc_html( get_the_time( 'F' ) ) . '</a>' . $defaults['delimiter'] . '';

				// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				echo $defaults['before'] . esc_html( get_the_time( 'd' ) ) . $defaults['after'];

			} elseif ( is_month() ) {

				// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				echo '<a href="' . esc_url( get_year_link( get_the_time( 'Y' ) ) ) . '">' . esc_html( get_the_time( 'Y' ) ) . '</a>' . $defaults['delimiter'] . '';

				// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				echo $defaults['before'] . esc_html( get_the_time( 'F' ) ) . $defaults['after'];

			} elseif ( is_year() ) {

				// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				echo $defaults['before'] . esc_html( get_the_time( 'Y' ) ) . $defaults['after'];

			} elseif ( is_single() && ! is_attachment() ) {
				if ( get_post_type() !== 'post' ) {

					$post_type = get_post_type_object( get_post_type() );

					$slug = $post_type->rewrite;

					// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					echo '<a href="' . esc_url( home_url() ) . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>' . $defaults['delimiter'] . '';

					// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					echo $defaults['before'] . esc_html( get_the_title() ) . $defaults['after'];

				} else {

					$cat = get_the_category();

					$cat = $cat[0];

					// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					echo get_category_parents( $cat, true, '' . $defaults['delimiter'] . '' );

					// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					echo $defaults['before'] . esc_html( get_the_title() ) . $defaults['after'];

				}
			} elseif ( ! is_single() && ! is_page() && get_post_type() !== 'post' && ! is_404() && ! is_search() ) {

				$post_type = get_post_type_object( get_post_type() );

				// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				echo $defaults['before'] . $post_type->labels->singular_name . $defaults['after'];

			} elseif ( is_attachment() ) {

				$parent = get_post( $post->post_parent );

				$cat = get_the_category( $parent->ID );

				$cat = $cat[0];

				// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				echo esc_html( get_category_parents( $cat, true, '' . $defaults['delimiter'] . '' ) );

				// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				echo '<a href="' . esc_url( get_permalink( $parent ) ) . '">' . $parent->post_title . '</a>' . $defaults['delimiter'] . '';

				// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				echo $defaults['before'] . esc_html( get_the_title() ) . $defaults['after'];

			} elseif ( is_page() && ! $post->post_parent ) {

				// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				echo $defaults['before'] . esc_html( get_the_title() ) . $defaults['after'];

			} elseif ( is_page() && $post->post_parent ) {

				$parent_id = $post->post_parent;

				$breadcrumbs = array();

				while ( $parent_id ) {

					$page = get_post( $parent_id );

					$breadcrumbs[] = '<a href="' . esc_url( get_permalink( $page->ID ) ) . '">' . esc_html( get_the_title( $page->ID ) ) . '</a>';

					$parent_id = $page->post_parent;
				}

				$breadcrumbs = array_reverse( $breadcrumbs );

				foreach ( $breadcrumbs as $crumb ) :
					// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					echo $crumb . '' . $defaults['delimiter'] . '';
				endforeach;

				// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				echo $defaults['before'] . esc_html( get_the_title() ) . $defaults['after'];

			} elseif ( is_search() ) {

				// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				echo $defaults['before'] . esc_html_e( 'Result for your search', 'ice-cold' ) . ' "' . get_search_query() . '"' . $defaults['after'];

			} elseif ( is_tag() ) {

				// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				echo $defaults['before'] . esc_html_e( 'Result for your keywords', 'ice-cold' ) . ' "' . single_tag_title( '', false ) . '"' . $defaults['after'];

			} elseif ( is_404() ) {

				// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				echo $defaults['before'] . esc_html_e( 'Error 404', 'ice-cold' ) . $defaults['after'];
			}
			if ( get_query_var( 'paged' ) ) {

				if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) :
					// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					echo ' ( ';
				endif;

				// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				echo ': ' . esc_html_e( 'Site', 'ice-cold' ) . ' ' . get_query_var( 'paged' );

				if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) :
					// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					echo ' )';
				endif;

			}
			// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			echo $defaults['wrap_after'];
		}
	}
}
