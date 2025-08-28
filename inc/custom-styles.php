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
 * Add inline style on page
 */
function wpicecold_border_style_color() {

	$main_color                           = get_theme_mod( 'main_color', '#186ca0' );
	$header_border_size                   = get_theme_mod( 'header_border_size', '6' );
	$header_bottom_border_size            = get_theme_mod( 'header_bottom_border_size', '3' );
	$footer_bg_color                      = get_theme_mod( 'footer_bg_color', '#2c3e50' );
	$footer_color                         = get_theme_mod( 'footer_color', '#fff' );
	$header_grid_enable_disabled_checkbox = get_theme_mod( 'header_grid_enable_disabled_checkbox', true );
	$header_grid_color_checkbox           = get_theme_mod( 'header_grid_color_checkbox', true );
	$header_background_overlay_color      = get_theme_mod( 'header_background_overlay_color', '#186ca0' );
	$custom_css                           = '';

	if ( $main_color ) :

		// Main Color.
		$custom_css .= '
		a,
		a:link,
		.table a,
		.dl dd a,
		table a:hover, 
		table a:focus, 
		a:hover, 
		a:focus, 
		dl dd a:hover, 
		dl dd a:focus,
		.entry-content a,
		.entry-content a:hover,
		.entry-content a:focus,
		h1.page-title,
		h1.entry-title,
		h1.page-title,
		h1.entry-title,
		.content-area h2.widget-title a,
		table#wp-calendar tbody a,
		table#wp-calendar tbody a:hover,
		table#wp-calendar tbody a:focus,
		td#prev a:focus,
		td#next a:focus,
		td#prev a:hover,
		td#next a:hover,
		.comments-area a,
		.comments-area a:hover,
		.comments-area a:focus,
		.pingback a.url,
		.trackback a.url,
		.comments-title,
		.blog-author h6 a,
		.blog-author h6 a:hover,
		.blog-author h6 a:focus,
		.page-links a .page-number,
		.post-navigation .nav-previous a,
		.post-navigation .nav-next a,
		.post-navigation .nav-previous a:hover,
		.post-navigation .nav-next a:hover,
		.post-navigation .nav-previous a:focus,
		.post-navigation .nav-next a:focus,
		a.more-link,
		.entry-footer a,
		.textwidget p a,
		.entry-footer a:link,
		.entry-footer a:hover,
		.entry-footer a:focus,
		h2.entry-title, h2.page-title,
		.edit-link a,
		.thbreadcrumb a,
		h1.entry-title a, 
		h2.entry-title a,
		h3.entry-title a,
		h1.entry-title a:focus,
		h1.entry-title a:hover, 
		h2.entry-title a:focus, 
		h2.entry-title a:hover, 
		h3.entry-title a:focus, 
		h3.entry-title a:hover,
		span.current,
		a.page-numbers,
		.dots,
		a.page-numbers:focus,
		a.page-numbers:hover,
		.entry-content .page-links a .page-number:focus, 
		.entry-content .page-links a .page-number:hover, 
		.entry-content .page-links a:focus, 
		.entry-content .page-links a:hover,
		.entry-content span.current,
		.wp-block-separator,
		.widget ul li a,
		.widget ul li a:focus, 
		.widget ul li a:hover,
		.site-title a,
		.navbar-nav > li.current-menu-item > a, 
		.navbar-nav > li.current > a, 
		.navbar-nav > li.current_page_ancestor > a, 
		.navbar-nav > li:hover > a,
		.menu-item-has-children .sub-menu li a:hover,
		.navbar-nav li a:hover{
			color: ' . esc_attr( $main_color ) . ';
		}';

		$custom_css .= '
		.is-style-outline > .wp-block-button__link:not(.has-background), 
		.wp-block-button__link.is-style-outline:not(.has-background){
			color: ' . esc_attr( $main_color ) . ' !important;
		}';

		$custom_css .= '
		.trenner-panel,
		.site-footer{
			border-top: 3px solid ' . esc_attr( $main_color ) . ';
		}';

		$custom_css .= '
		.wp-block-quote {
			border-left: 4px solid ' . esc_attr( $main_color ) . ';
		}';

		$custom_css .= '
		.comments-pagination, 
		.pagination,
		.entry-footer {
			border-top: 1px solid ' . esc_attr( $main_color ) . ';
		}';

		$custom_css .= '
		.site-main-page .sticky {
			border: 1px dotted ' . esc_attr( $main_color ) . ';
		}';

		$custom_css .= '
		table#wp-calendar thead th {
			border-bottom: 2px solid ' . esc_attr( $main_color ) . ';
		}';

		$custom_css .= '
		.up_scrollup,
		.sidebar-top,
		.btn, 
		.btn-primary, 
		.wp-block-button__link,
		.btn-primary:hover,
		.wp-block-button__link:hover,
		.wp-block-button__link:focus,
		main button, 
		main input[type="button"], 
		main input[type="submit"],
		.social-navigation a,
		.social-navigation a:focus, 
		.social-navigation a:hover,
		.woocommerce #respond input#submit, 
		.woocommerce #respond input#submit.alt, 
		.woocommerce a.button, 
		.woocommerce a.button.alt, 
		.woocommerce button.button, 
		.woocommerce button.button.alt, 
		.woocommerce input.button, 
		.woocommerce input.button.alt,
		.woocommerce #respond input#submit.alt:hover, 
		.woocommerce #respond input#submit:hover, 
		.woocommerce a.button.alt:hover, 
		.woocommerce a.button:hover, 
		.woocommerce button.button.alt:hover, 
		.woocommerce button.button:hover, 
		.woocommerce input.button.alt:hover, 
		.woocommerce input.button:hover,
		.reply a,
		.reply a:hover,
		.reply a:focus,
		.widget-search-button:focus, 
		.widget-search-button:hover{
			background-color: ' . esc_attr( $main_color ) . ';
		}';

		$custom_css .= '
		.widget-search-button:focus, 
		.widget-search-button:hover,
		.form-control:focus {
			border-color: ' . esc_attr( $main_color ) . ';
		}';

		$custom_css .= '
		.form-control:focus {
			box-shadow: 0 0 0 .2rem ' . wpicecold_hex2rgba( esc_attr( $main_color ), 0.25 ) . ';
		}';

		$custom_css .= '
		.content-area h2.widget-title {
			border-left: 5px solid ' . esc_attr( $main_color ) . ';
			background-color: ' . esc_attr( $footer_bg_color ) . ';
		}';

		$custom_css .= '.site-info {
			border-top: 1px dotted ' . esc_attr( $main_color ) . ';
		}';

		$custom_css .= '
		.menu-item-has-children .sub-menu,
		.menu-item-has-children .sub-menu .menu-item-has-children .sub-menu {
			border-top: 2px solid ' . esc_attr( $main_color ) . ';
		}';

		$custom_css .= '
		.menu-item-has-children:focus-within .sub-menu li, 
		.menu-item-has-children:hover .sub-menu li {
			border-bottom: 1px solid ' . esc_attr( $main_color ) . ';
		}';

		if ( $header_border_size > 0 ) :
			$custom_css .= '.navbar-main,
						.site-footer{
							border-bottom: ' . esc_attr( $header_border_size ) . 'px solid ' . esc_attr( $main_color ) . ';
						}';
		endif;

		if ( $header_bottom_border_size > 0 ) :
			$custom_css .= '.site-header{
							border-bottom: ' . esc_attr( $header_bottom_border_size ) . 'px solid ' . esc_attr( $main_color ) . ';
						}';
		endif;

	endif;

	// Footer CSS.
	$custom_css .= '
	.site-footer{
			background-color: ' . esc_attr( $footer_bg_color ) . ';
	}';

	$custom_css .= '
	.site-footer,
	.site-footer h2.widget-title,
	.site-footer .textwidget p a, 
	.site-footer .widget ul li a,
	a.privacy-policy-link,
	a.privacy-policy-link:link,
	.site-info a,
	.site-info span[role="separator"],
	.site-info a:hover,
	.site-info a:focus{
			color: ' . esc_attr( $footer_color ) . ';
	}';

	// Header Media.
	// Enable grid.
	if ( $header_grid_enable_disabled_checkbox ) :

		$custom_css .= '.grid-mask {
			display: block;
		}';

	endif;

	if ( $header_grid_color_checkbox ) :
		$custom_css .= '.header-background-overlay {
			background: ' . esc_attr( $header_background_overlay_color ) . ';
			opacity: ' . ( esc_attr( get_theme_mod( 'header_background_overlay_color_opacity', '4' ) ) / 10 ) . ';
		}';

	endif;

	$custom_css .= '.navbar-main {
			opacity: ' . ( esc_attr( get_theme_mod( 'nav_opacity', '10' ) ) / 10 ) . ';
		}';

	// Add custom css.
	wp_add_inline_style( 'wpicecold-site-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'wpicecold_border_style_color' );
