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
 * The template for the front page
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
<!-- Begin Front Page -->
<main role="main" id="main" class="site-main-frontpage">
		<?php
		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/page/content', 'front-page' );
			endwhile;
			else :
				get_template_part( 'template-parts/post/content', 'none' );
		endif;
			?>

		<?php
		if ( 0 !== wpicecold_panel_count() || is_customize_preview() ) : // If we have pages to show.
			$num_sections = apply_filters( 'wpicecold_front_page_sections', 4 );

			global $wpicecoldcounter;

			for ( $i = 1; $i < ( 1 + $num_sections ); $i++ ) {

				$wpicecoldcounter = $i;

				// Show up box.
				wpicecold_front_page_up_section( null, $i );

				// Show main panels.
				wpicecold_front_page_section( null, $i );

			}
	endif;
		?>
	<?php
	if ( is_active_sidebar( 'sidebar-partner' ) ) :
		?>
	<div id="sidebar-panel-partner" class="sidebar-partner">
		<div class="trenner-panel"></div>
		<div class="container sidebar-partner-content">
		<?php
			dynamic_sidebar( 'sidebar-partner' );
		?>
		</div>
	</div>
		<?php
endif;
	?>
</main><!-- /#main -->
<!-- End Front Page -->
<?php
get_footer();
