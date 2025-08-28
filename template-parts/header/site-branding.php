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
<div class="element-overlay container">
	<div class="row">
		<div class="col-md-12">
			<div class="site-branding-text">
				<?php if ( ( is_page() && ! is_front_page() ) || ( is_single() && ! is_front_page() ) ) : ?>
					<h1><?php esc_html( the_title() ); ?></h1>
					<?php
					elseif ( is_home() && is_front_page() ) :
						if ( is_active_sidebar( 'site-branding-text' ) ) :
							dynamic_sidebar( 'site-branding-text' );
						else :
							?>
							<h1><?php esc_html( bloginfo( 'name' ) ); ?></h1>
							<p class="site-description text-white"><?php echo esc_html( get_bloginfo( 'description', 'display' ) ); ?></p>
							<?php
						endif;
						?>
				<?php elseif ( is_home() && ! is_front_page() ) : ?>					
					<h1><?php single_post_title(); ?></h1>
				<?php elseif ( is_archive() ) : ?>
					<h1><?php the_archive_title(); ?></h1>
				<?php else : ?>
					<h1><?php esc_html( bloginfo( 'name' ) ); ?></h1>
					<p class="site-description text-white"><?php echo esc_html( get_bloginfo( 'description', 'display' ) ); ?></p>
				<?php endif; ?>
			</div><!-- /.site-branding-text -->
		</div>
	</div><!-- /.row -->
</div><!-- /.element-overlay container -->

<?php if ( is_home() || is_front_page() ) : ?>
<!-- Start slide-down-pl -->
<div class="slide-down-pl">
	<a href="#<?php echo esc_attr( ( is_home() ) ? 'main' : 'frontPost-' . get_option( 'page_on_front' ) ); ?>"><i class="fas fa-chevron-down animate__animated animate__infinite animate__pulse"></i></a>
</div>
<!-- End slide-down-pl -->
<?php endif; ?>
