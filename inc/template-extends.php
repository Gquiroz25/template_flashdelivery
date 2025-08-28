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
 * Prints HTML with meta information for the categories, tags and comments.
 *
 * @return void
 */
function wpicecold_entry_footer() {

	/* translators: used between list items, there is a space after the comma. */
	$categories_list = get_the_category_list( __( ', ', 'ice-cold' ) );

	// Get Tags for posts.
	/* translators: used between list items, there is a space after the comma. */
	$tags_list = get_the_tag_list( '', __( ', ', 'ice-cold' ) );

	// We don't want to output .entry-footer if it will be empty, so make sure its not.
	// phpcs:ignore WordPress.Security.EscapeOutput
	if ( ( ( wpicecold_categorized_blog() && $categories_list ) || $tags_list ) || get_edit_post_link() ) {

		echo '<footer class="entry-footer">';

		if ( 'post' === get_post_type() ) {

			// phpcs:ignore WordPress.Security.EscapeOutput
			if ( ( $categories_list && wpicecold_categorized_blog() ) || $tags_list ) {
				echo '<span class="cat-tags-links">';

				// phpcs:ignore WordPress.Security.EscapeOutput
				if ( $categories_list && wpicecold_categorized_blog() ) {
					// phpcs:ignore WordPress.Security.EscapeOutput
					echo '<span class="cat-links"><i class="fas fa-folder"></i> <span class="screen-reader-text">' . esc_html__( 'Categories', 'ice-cold' ) . '</span>' . $categories_list . '</span>';
				}

				// phpcs:ignore WordPress.Security.EscapeOutput
				if ( $tags_list && ! is_wp_error( $tags_list ) ) {
					// phpcs:ignore WordPress.Security.EscapeOutput
					echo '<span class="tags-links"><i class="fas fa-hashtag"></i> <span class="screen-reader-text">' . esc_html__( 'Tags', 'ice-cold' ) . '</span>' . $tags_list . '</span>';
				}
				echo '</span>';
			}
		}
		echo '</footer> <!-- .entry-footer -->';
	}
}

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return integer
 */
function wpicecold_categorized_blog() {
	// Create an array of all the categories that are attached to posts.
	$categories = get_categories(
		array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			'number'     => 2,
		)
	);
	// Count the number of categories that are attached to the posts.
	$category_count = count( $categories );

	// Allow viewing case of 0 or 1 categories in post preview.
	if ( is_preview() ) {
		return true;
	}
	return $category_count > 1;
}
