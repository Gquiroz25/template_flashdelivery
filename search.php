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
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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
			<section class="search-site site-main col-md-<?php echo esc_attr( ( 'one-column' === get_theme_mod( 'page_layout_blog_site', 'two-column' ) ) ? '12' : '8' ); ?>">
				<div class="page-content">
					<header class="page-header">
						<?php if ( have_posts() ) : ?>
							<h1 class="page-title entry-title">
							<?php
								printf(
									/* translators: %s: search term. */
									esc_html__( 'Search Results for: "%s"', 'ice-cold' ),
									'<span>' . esc_html( get_search_query() ) . '</span>'
								);
							?>
							</h1>
							<p><small>
							<?php
								printf(
									esc_html(
										/* translators: %d: the number of search results. */
										_n(
											'We found %d result for your search.',
											'We found %d results for your search.',
											(int) $wp_query->found_posts,
											'ice-cold'
										)
									),
									(int) $wp_query->found_posts
								);
							?>
							</p></small>
						<?php else : ?>
							<h1 class="page-title entry-title"><?php esc_html_e( 'Nothing Found', 'ice-cold' ); ?></h1>
						<?php endif; ?>
					</header><!-- .page-header -->
					<?php
					if ( have_posts() ) :
						while ( have_posts() ) :
							the_post();
							get_template_part( 'template-parts/post/content', 'excerpt' );
						endwhile;
						the_posts_pagination(
							array(
								'prev_text'          => '<i class="fas fa-arrow-left"></i> ' . esc_html__( 'Previous page', 'ice-cold' ),
								'next_text'          => esc_html__( 'Next page', 'ice-cold' ) . ' <i class="fas fa-arrow-right"></i> ',
								'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'ice-cold' ) . ' </span>',
							)
						);
						else :
							?>
						<main id="main" class="site-main" role="main">
							<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'ice-cold' ); ?></p>
							<?php
								get_search_form();
							?>
						</main><!-- #main -->
					<?php endif; ?>
				<?php echo ( have_posts() ? '' : '</div><!-- /.page-content -->' ); ?>
			</section><!-- /.section -->
			<?php ( 'one-column' === get_theme_mod( 'page_layout_blog_site', 'two-column' ) ) ? '' : get_sidebar(); ?>
		</div><!-- /.primary -->
	</div><!-- /.container -->
</main><!-- /main -->
<?php
get_footer();
