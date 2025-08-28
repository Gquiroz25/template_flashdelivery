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

?>
<!-- Start Article -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_sticky() ) {
			echo '<i class="fas fa-fire" style="color:orange;"></i>';
		}
		if ( 'post' === get_post_type() && ! is_sticky() ) {
			echo '<div class="entry-meta">';
			if ( is_single() ) {
				wpicecold_edit_link();
			} else {
				// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				echo wpicecold_time_link();
				wpicecold_edit_link();
			}
			echo '</div><!-- .entry-meta -->';
		}

		if ( is_single() ) {
			the_title( '<h1 class="entry-title">', '</h1>' );
		} elseif ( is_front_page() && is_home() ) {
			the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
		} else {
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		}
		?>
	</header><!-- /.entry-header -->
	<?php
	// Get thumbnail.
	if ( '' !== get_the_post_thumbnail() ) {
		?>
		<div class="post-thumbnail">
			<?php if ( ! is_single() ) { ?>
				<a href="<?php esc_url( the_permalink() ); ?>">
			<?php } ?>
			<?php the_post_thumbnail( 'wpicecold-featured-image' ); ?>
			<?php if ( ! is_single() ) { ?>
				</a>
			<?php } ?>
		</div><!-- .post-thumbnail -->
		<?php
	}
	?>

	<div class="entry-content">
	<?php
	if ( ! is_single() ) {
		if ( 'yes' === get_theme_mod( 'post_show_the_excerpt', 'yes' ) ) {
			the_excerpt();
		} else {
			the_content(
				sprintf(
					/* translators: %s: Post Title */
					esc_html__( 'Continue reading %1', 'ice-cold' ),
					'<i class="fas fa-angle-right"></i><span class="screen-reader-text"> "' . get_the_title() . '"</span>'
				)
			);
		}
	} else {
			the_content(
				sprintf(
					/* translators: %s: Post Title */
					esc_html__( 'Continue reading %1', 'ice-cold' ),
					'<i class="fas fa-angle-right"></i><span class="screen-reader-text"> "' . get_the_title() . '"</span>'
				)
			);
	}
	wp_link_pages(
		array(
			'before'      => '<div class="page-links">' . esc_attr__( 'Pages:', 'ice-cold' ),
			'after'       => '</div>',
			'link_before' => '<span class="page-number">',
			'link_after'  => '</span>',
			/* translators: %: page number. */
			'pagelink'    => esc_html__( 'Page %', 'ice-cold' ),
		)
	);
	?>
	</div><!-- /.entry-content -->
	<?php
	if ( is_single() ) {
		wpicecold_entry_footer();
	}
	?>
</article><!-- /#post-<?php the_ID(); ?> -->
<!-- End Article -->

