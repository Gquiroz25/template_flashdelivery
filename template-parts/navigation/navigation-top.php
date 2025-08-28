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

// Get menu pos.
$header_placing = get_theme_mod( 'page_header_menue_fixed', 'none' );

// Get colorshema.
switch ( get_theme_mod( 'colorscheme', 'white' ) ) {
	case 'dark':
		$color_shema = 'navbar-dark bg-dark';
		break;
	case 'light':
		$color_shema = 'navbar-light bg-light';
		break;
	case 'white':
		$color_shema = 'navbar-white bg-white';
		break;
}
?>
<!-- Main Menu -->
<nav id="site-navigation" class="navbar-main navbar <?php echo esc_attr( $header_placing ); ?> navbar-expand-lg <?php echo esc_attr( $color_shema ); ?> ">
	<div class="container">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainnavbar" aria-controls="mainnavbar" aria-expanded="false" aria-label="Toggle navigation">
			<span class="sr-only"><?php esc_html_e( 'Toggle navigation', 'ice-cold' ); ?></span>  
			<span class="navbar-toggler-icon"></span>
		</button>
		<div id="mainnavbranding" class="navbar-branding float-left brand-logo-header">
		<?php
		if ( has_custom_logo() ) {
			$logo_nav = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' );
			?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<div class="logo"></div>
	
			</a>
			<?php
		} else {
			$description = get_bloginfo( 'description', 'display' );
			?>
			<p class="site-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
			</p>
			<p class="site-description">
				<?php
				echo esc_html( $description );
				?>
			</p>
			<?php
		}
		?>
		</div>
		<div id="mainnavbar" class="collapse navbar-collapse justify-content-end">
		<?php
		if ( has_nav_menu( 'top' ) ) {
			wp_nav_menu(
				array(
					'theme_location' => 'top',
					'menu_id'        => 'top-menu',
					'depth'          => 3,
					'container'      => 'ul',
					'menu_class'     => 'main-menu navbar-nav',
				)
			);
		}
		?>
		</div>
		<?php
		// add cart link and symbol.
		if ( wpicecold_is_woocommerce_activated() ) {
			wpicecold_cart_link();
		}
		?>
	</div><!-- Container END -->
</nav>
<!-- Main Menu End -->
