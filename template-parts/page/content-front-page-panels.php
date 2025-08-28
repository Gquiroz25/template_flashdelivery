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

// Get counter.
global $wpicecoldcounter;

?>
<article id="panel<?php echo esc_html( $wpicecoldcounter ); ?>" <?php post_class( 'wpicecold-panel ' ); ?> >
	<?php
	// Check Thumbnail and set a parallax effect.
	if ( has_post_thumbnail() ) :
		$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'featured-image' );
		// Calculate aspect ratio: h / w * 100%.
		$ratio = $thumbnail[2] / $thumbnail[1] * 100;
		?>
	<div class="panel-image" style="background-image: url(<?php echo esc_url( $thumbnail[0] ); ?>);">
		<div class="panel-image-prop" style="padding-top: <?php echo esc_attr( $ratio ); ?>%"></div>
	</div><!-- /.panel-image -->
	<?php else : ?>
	<div class="trenner-panel"></div>
	<?php endif; ?>
	<div class="panel-content">
		<div class="container">
			<?php if ( 'two-column' === get_theme_mod( 'page_layout_frontpage', 'one-column' ) ) : ?>
			<div class="row">
				<div class="col-md-6 panel-col">
			<?php endif; ?>
			<header class="entry-header">
				<?php
					$idtitel   = '' . str_replace( ' ', '-', strtolower( get_the_title() ) );
					$htmlanker = '<h2 class="entry-title" id="' . $idtitel . '">';
					the_title( $htmlanker, '</h2>' );
				?>
				<?php wpicecold_edit_link( get_the_ID() ); ?>
			</header><!-- /.entry-header -->
			<?php if ( 'two-column' === get_theme_mod( 'page_layout_frontpage', 'one-column' ) ) : ?>
				</div><!-- /.col -->
				<div class="col-md-6 panel-col">
			<?php endif; ?>
				<div class="entry-content">
					<?php
						the_content(
							sprintf(
								/* translators: %s: Post Link */
								esc_html__( 'Continue reading %1', 'ice-cold' ),
								'<i class="fas fa-angle-right"></i><span class="screen-reader-text"> "' . get_the_title() . '"</span>'
							)
						);
						?>
				</div><!-- /.entry-content -->
			<?php
			// Show recent blog posts if is blog posts page (Note that get_option returns a string, so we're casting the result as an int).
			if ( get_the_ID() === (int) get_option( 'page_for_posts' ) ) :
				// Size post of site.
				$post_per_page = (int) get_theme_mod( 'page_layout_frontpage_posts_per_page', '3' );
				// Show three most recent posts.
				$recent_posts = new WP_Query(
					array(
						'posts_per_page'      => $post_per_page,
						'post_status'         => 'publish',
						'ignore_sticky_posts' => true,
						'no_found_rows'       => true,
					)
				);

				if ( $recent_posts->have_posts() ) :
					?>
					<div class="recent-posts">
						<?php
						while ( $recent_posts->have_posts() ) :
							$recent_posts->the_post();
							get_template_part( 'template-parts/post/content', 'excerpt' );
						endwhile;
						wp_reset_postdata();
						?>
					</div><!-- .recent-posts -->
				<?php endif; ?>
				<p class="link-more">
					<a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ); ?>" class="more-link"><?php esc_html_e( 'All posts', 'ice-cold' ); ?>
						<span class="screen-reader-text"> <?php esc_html_e( 'All posts', 'ice-cold' ); ?> </span> <i class="fas fa-angle-right"></i>
					</a>
				</p>
			<?php endif; ?>
			<?php if ( 'two-column' === get_theme_mod( 'page_layout_frontpage', 'one-column' ) ) : ?>
					</div><!-- /.col -->
				</div><!-- /.row -->
			<?php endif; ?>
		</div><!-- /.container -->
	</div><!-- /.panel-content -->
</article><!-- /#post-<?php the_ID(); ?> -->
