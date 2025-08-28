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
 * The template for displaying comments
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Ice-Cold
 *
 * @since 1.0.0
 *
 * @version 1.0.0
 */

/**
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) :
	?>
	<p class="nopassword"><?php esc_html_e( 'This post is password protected. Enter the password to view any comments.', 'ice-cold' ); ?></p>
	<?php
	return;
endif;
?>
<div id="comments" class="comments-area">
	<?php
	if ( have_comments() ) :
		?>
		<h2 class="comments-title">
		<i class="far fa-comment"></i>
			<?php

			$comments_number = get_comments_number();
			if ( '1' === $comments_number ) {

				esc_html_e( 'One comment', 'ice-cold' );

			} else {

				printf(
					/* translators: %s: comment count number. */
					esc_html( _nx( '%s comment', '%s comments', $comments_number, 'Comments title', 'ice-cold' ) ),
					esc_html( number_format_i18n( $comments_number ) )
				);

			}

			?>
		</h2>
		<ol class="comment-list">
			<?php
				wp_list_comments(
					array(
						'avatar_size' => 100,
						'style'       => 'ol',
						'short_ping'  => true,
						'reply_text'  => __( 'Reply', 'ice-cold' ),
					)
				);
			?>
		</ol>
		<?php
		the_comments_pagination(
			array(
				'prev_text' => '<i class="fas fa-arrow-left"></i> ' . __( 'Previous', 'ice-cold' ) . '',
				'next_text' => '<i class="fas fa-arrow-right"></i> ' . __( 'Next', 'ice-cold' ) . '',
			)
		);
	endif;
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
		?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'ice-cold' ); ?></p>
		<?php
	endif;
	comment_form();
	?>
</div><!-- /#comments -->
