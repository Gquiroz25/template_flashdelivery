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
<article id="frontPost-<?php the_ID(); ?>" <?php post_class( 'wpicecold-panel-startseite' ); ?> >
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
	<?php endif; ?>
	<div class="panel-content">
		<div class="container">
			<header class="entry-header">
			<?php ( 'no' === get_theme_mod( 'page_layout_frontpage_header_show' ) ) ? '' : the_title( '<h2 class="entry-title">', '</h2>' ); ?>
				<?php wpicecold_edit_link( get_the_ID() ); ?>
			</header><!-- /.entry-header -->
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
		</div><!-- /.container -->
	</div><!-- /.panel-content -->
</article><!-- /#post-<?php the_ID(); ?> -->
