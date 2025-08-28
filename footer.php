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
 * The template for displaying the footer
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Ice-Cold
 *
 * @since 1.0.0
 *
 * @version 1.0.0
 */

?>
		<footer class="site-footer" role="contentinfo">
			<div class="content_logo"><img src="https://flashdelivery.cl/img/flash-logo-blanco2.png"></div>
			<div class="container">
				<?php
				get_template_part( 'template-parts/footer/footer', 'widgets' );
				?>
				<div class="footer-bottom clearfix">
				<?php
				$widget_active = ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) || is_active_sidebar( 'footer-4' ) ? true : false );
				if ( has_nav_menu( 'social' ) ) :
					?>
					<nav class="social-navigation" style="<?php echo ( ! $widget_active ? 'border: none;' : '' ); ?>" role="navigation" aria-label="<?php esc_attr_e( 'Footer Social Links Menu', 'ice-cold' ); ?>">
						<?php
							wp_nav_menu(
								array(
									'theme_location' => 'social',
									'menu_class'     => 'social-links-menu',
									'depth'          => 1,
									'link_before'    => '<span class="screen-reader-text">',
									'link_after'     => '</span>' . wpicecold_get_icon( array( 'icon' => 'link' ) ),
								)
							);
						?>
					</nav><!-- /.social-navigation -->
					<?php
				endif;
				get_template_part( 'template-parts/footer/site', 'info' );
				?>
				</div><!-- /.footer-bottom -->
			</div><!-- /.container -->
		</footer><!-- #colophon -->
<!-- To the top -->
<a href="#" class="up_scrollup" style="display: hidden;"><i class="fa fa-chevron-up"></i></a>
<!-- End: To the top -->
<?php wp_footer(); ?>
</body>
</html>
