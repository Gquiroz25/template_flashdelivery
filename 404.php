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
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Ice-Cold
 *
 * @since 1.0.0
 *
 * @version 1.0.0
 */

get_header();

?>
<main id="main" class="site-main-page" role="main">
	<div class="container">
		<div id="primary" class="content-area row">
			<div class="col-md-12">
				<?php wpicecold_get_breadcrumb(); ?>
			</div>
			<section class="error-404 not-found site-main col-md-12">
				<div class="page-content">
					<header class="page-header">
						<h1 class="page-title entry-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'ice-cold' ); ?></h1>
					</header><!-- .page-header -->
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'ice-cold' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->
		</div><!-- /#primary -->
	</div><!-- /.container -->
</main><!-- /main -->
<?php
get_footer();
