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
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Ice-Cold
 *
 * @since 1.0.0
 *
 * @version 1.0.0
 */

get_header();

?>
<!-- Begin woocommerce -->
<main id="main" class="site-main-page page-main-template" role="main">
	<div class="container">
		<div id="primary" class="content-area row">
			<div class="col-md-12">
			<?php

			// Get the breadcrumb.
			wpicecold_get_breadcrumb();

			// Get the shop content.
			woocommerce_content();

			?>
			</div><!-- /.col -->
		</div><!-- #primary -->
	</div><!-- /.container -->
</main><!-- /#main -->
<!-- End woocommerce -->
<?php
get_footer();
