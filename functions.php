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
 * Ice-Cold functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Ice-Cold
 *
 * @since 1.0.0
 *
 * @version 1.0.0
 */

/**
 * Ice-Cold only works in WordPress 5.0 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '5.0', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}

/**
 * Theme Setup
 */
function wpicecold_setup() {

	// load language.
	load_theme_textdomain( 'ice-cold', get_template_directory() . '/lang' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// This feature enables plugins and themes to manage the document title tag.
	// This should be used in place of wp_title() function.
	add_theme_support( 'title-tag' );

	// add support "thumbnails".
	add_theme_support( 'post-thumbnails' );

	// register image size for page featured image.
	add_image_size( 'wpicecold-featured-image', 2000, 1200, true );

	// register nav.
	register_nav_menus(
		array(
			'top'    => __( 'Top Menu', 'ice-cold' ),
			'social' => __( 'Social Links Menu', 'ice-cold' ),
		)
	);

	// This feature allows the use of HTML5 markup.
	add_theme_support(
		'html5',
		array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'script',
			'style',
		)
	);

	// This feature enables Post Formats support for a theme.
	add_theme_support(
		'post-formats',
		array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
			'gallery',
			'audio',
		)
	);

	// Add theme support for Custom Logo.
	add_theme_support(
		'custom-logo',
		array(
			'width'       => 250,
			'height'      => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		array(
			'default-color' => 'ffffff',
			'default-image' => '',
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Load regular editor styles into the new block-based editor.
	add_theme_support( 'editor-styles' );

	// Load default block styles.
	add_theme_support( 'wp-block-styles' );

	// Add support for responsive embeds.
	add_theme_support( 'responsive-embeds' );

	// Add Woocommerce Support.
	add_theme_support( 'woocommerce' );

	// Woocommerce Product gallery features (zoom, swipe, lightbox).
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

	// Add Editor CSS.
	add_editor_style( get_theme_file_uri( '/assets/css/editor-style.css' ) );

	// load starter Content.
	add_theme_support( 'starter-content', wpicecold_starter_pack() );
}
add_action( 'after_setup_theme', 'wpicecold_setup' );

/**
 * Register widget area.
 */
function wpicecold_widgets_init() {

	register_sidebar(
		array(
			'name'          => __( 'Top Header Sidebar', 'ice-cold' ),
			'id'            => 'sidebar-top',
			'description'   => __( 'Add widgets here to appear in your sidebar on all pages.', 'ice-cold' ),
			'before_widget' => '<section id="%1$s" class="widget-top %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 style="display:none;" class="widget-top-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Branding Sidebar', 'ice-cold' ),
			'id'            => 'site-branding-text',
			'description'   => __( 'Add widgets here to appear in your branding content', 'ice-cold' ),
			'before_widget' => '<section id="%1$s" class="widget-branding %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 style="display:none;" class="widget-top-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Blog Sidebar', 'ice-cold' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'ice-cold' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer 1', 'ice-cold' ),
			'id'            => 'footer-1',
			'description'   => __( 'Add widgets here to appear in your footer.', 'ice-cold' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer 2', 'ice-cold' ),
			'id'            => 'footer-2',
			'description'   => __( 'Add widgets here to appear in your footer.', 'ice-cold' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer 3', 'ice-cold' ),
			'id'            => 'footer-3',
			'description'   => __( 'Add widgets here to appear in your footer.', 'ice-cold' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer 4', 'ice-cold' ),
			'id'            => 'footer-4',
			'description'   => __( 'Add widgets here to appear in your footer.', 'ice-cold' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Additional Bottom Sidebar', 'ice-cold' ),
			'id'            => 'sidebar-partner',
			'description'   => __( 'Add widgets here to appear in your sidebar on the bottom of your blog and pages.', 'ice-cold' ),
			'before_widget' => '<section id="%1$s" class="widget-top %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 style="display:none;" class="widget-top-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'wpicecold_widgets_init' );

/**
 * Sets the content width in pixels, based on the theme's design and stylesheet.
 */
function wpicecold_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wpicecold_content_width', 600 );
}
add_action( 'after_setup_theme', 'wpicecold_content_width', 0 );


/**
 * Create the continue reading link for excerpt.
 *
 * @param string $link String Page link.
 */
function wpicecold_excerpt_more( $link ) {

	if ( is_admin() ) {
		return $link;
	}

	$link = sprintf(
		'<p class="link-more"><a href="%1$s" class="more-link">%2$s <i class="fas fa-angle-right"></i></a></p>',
		esc_url( get_permalink( get_the_ID() ) ),
		sprintf(
			/* translators: %s : Name of current post. */
			esc_html__( 'Continue reading %s', 'ice-cold' ),
			the_title( '<span class="screen-reader-text">', '</span>', false )
		)
	);

	return ' &hellip; ' . $link;
}

add_filter( 'excerpt_more', 'wpicecold_excerpt_more' );


/**
 * Handles JavaScript detection.
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 */
function wpicecold_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js' )})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'wpicecold_javascript_detection', 0 );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function wpicecold_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'wpicecold_pingback_header' );

/**
 * Use front-page.php when Front page displays is set to a static page.
 *
 * @param string $template Templatename.
 */
function wpicecold_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template', 'wpicecold_front_page_template' );

/**
 * Modifies tag cloud widget arguments to display all tags in the same font size
 * and use list format for better accessibility.
 *
 * @param array $args array of args.
 */
function wpicecold_widget_tag_cloud_args( $args ) {
	$args['largest']  = 1;
	$args['smallest'] = 1;
	$args['unit']     = 'em';
	$args['format']   = 'list';
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'wpicecold_widget_tag_cloud_args' );

/**
 * Get unique ID.
 *
 * This is a PHP implementation of Underscore's uniqueId method. A static variable
 * contains an integer that is incremented with each call. This number is returned
 * with the optional prefix. As such the returned value is not universally unique,
 * but it is unique across the life of the PHP process.
 *
 * @param string $prefix string of prefix for uniq string.
 */
function wpicecold_unique_id( $prefix = '' ) {
	static $id_counter = 0;
	if ( function_exists( 'wp_unique_id' ) ) {
		return wp_unique_id( $prefix );
	}
	return $prefix . (string) ++$id_counter;
}

/**
 * Checks to see if we're on the front page or not.
 */
function wpicecold_is_frontpage() {
	return ( is_front_page() && ! is_home() );
}

/**
 * Returns an accessibility-friendly link to edit a post or page.
 */
function wpicecold_edit_link() {
	edit_post_link(
		sprintf(
			/* translators: %s : Post title. */
			esc_html__( '[Edit %s]', 'ice-cold' ),
			'<span class="screen-reader-text">' . get_the_title() . '</span> <i class="fas fa-edit"></i>'
		),
		'<span class="edit-link">',
		'</span>'
	);
}

/**
 * Posted on edit on text
 * Returns an accessibility-friendly link
 */
function wpicecold_time_link() {

	$time_string = '<time class="entry-date published updated" datetime="%1$s" alt="published"><i class="far fa-clock"></i> %2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s" alt="published" ><i class="far fa-clock"></i> %2$s</time>
		<time class="updated" datetime="%3$s" alt="updated"><i class="fas fa-history"></i> %4$s</time>';
	}

	$time_string = sprintf(
		$time_string,
		get_the_date( DATE_W3C ),
		get_the_date(),
		get_the_modified_date( DATE_W3C ),
		get_the_modified_date()
	);

	$urleditpostonlink = sprintf(
		'<span class="screen-reader-text">%1$s</span><a href="%2$s" class="posted-on-link edit-on-link">%3$s</a>',
		__( 'Posted on', 'ice-cold' ),
		esc_url( get_permalink() ),
		$time_string
	);

	return $urleditpostonlink;
}

/**
 * Add authorbox in a post
 */
function wpicecold_author_meta() {
	?>
<div class="blog-author">
	<div class="media">
		<div class="pull-left">
			<?php echo get_avatar( get_the_author_meta( 'ID' ), 200 ); ?>
		</div>
		<div class="media-body">
			<h6><?php the_author_link(); ?></h6>
			<p><?php the_author_meta( 'description' ); ?></p>
			<ul class="blog-author-social">
				<?php
				$facebook_profile = get_the_author_meta( 'facebook_profile' );
				if ( $facebook_profile && ! empty( $facebook_profile ) ) :
					?>
				<li class="facebook"><a href="<?php echo esc_url( $facebook_profile ); ?>"><i class="fab fa-facebook"></i></a></li>
					<?php
				endif;
				$linkedin_profile = get_the_author_meta( 'linkedin_profile' );
				if ( $linkedin_profile && ! empty( $linkedin_profile ) ) :
					?>
				<li class="linkedin"><a href="<?php echo esc_url( $linkedin_profile ); ?>"><i class="fab fa-linkedin"></i></a></li>
					<?php
				endif;
				$twitter_profile = get_the_author_meta( 'twitter_profile' );
				if ( $twitter_profile && ! empty( $twitter_profile ) ) :
					?>
				<li class="twitter"><a href="<?php echo esc_url( $twitter_profile ); ?>"><i class="fab fa-twitter"></i></a></li>
					<?php
				endif;
				$google_profile = get_the_author_meta( 'google_profile' );
				if ( $google_profile && ! empty( $google_profile ) ) :
					?>
				<li class="googleplus"><a href="<?php echo esc_url( $google_profile ); ?>"><i class="fab fa-google-plus"></i></a></li>
					<?php
				endif;
				?>
			</ul>
		</div>
	</div>	
</div><!-- /.blog-author -->
	<?php
}

/**
 * Count our number of active panels.
 * Primarily used to see if we have any panels active, duh.
 */
function wpicecold_panel_count() {
	$panel_count  = 0;
	$num_sections = apply_filters( 'wpicecold_front_page_sections', 4 );
	for ( $i = 1; $i < ( 1 + $num_sections ); $i++ ) {
		if ( get_theme_mod( 'panel_' . $i ) ) {
			$panel_count++;
		}
	}
	return $panel_count;
}

/**
 * Display a front page section.
 *
 * @param object  $partial Partial object.
 * @param integer $id Counter.
 */
function wpicecold_front_page_section( $partial = null, $id = 0 ) {

	if ( is_a( $partial, 'WP_Customize_Partial' ) ) {

		global $wpicecoldcounter;

		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		$id = str_replace( 'panel_', '', $partial->id );

		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		$wpicecoldcounter = $id;
	}

	// phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
	global $post; // Modify the global post object before setting up post data.

	// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	if ( get_theme_mod( 'panel_' . $id ) ) {

		// phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
		$post = get_post( get_theme_mod( 'panel_' . $id ) );

		setup_postdata( $post );

		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		set_query_var( 'panel', $id );

		get_template_part( 'template-parts/page/content', 'front-page-panels' );

		wp_reset_postdata();

	} elseif ( is_customize_preview() ) {

		$text_front_page = sprintf(
			/* translators: %s : number of panel. */
			esc_html__( 'Front Page Section %s Placeholder', 'ice-cold' ),
			// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			$id
		);

		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		echo '<article class="panel-placeholder panel wpicecold-panel' . $id . '" id="panel' . $id . '"><span class="wpicecold-panel-title">' . esc_html( $text_front_page ) . '</span></article>';

	}
}

/**
 * Display a front page section.
 *
 * @param object  $partial Partial object.
 * @param integer $id Counter.
 */
function wpicecold_front_page_up_section( $partial = null, $id = 0 ) {

	if ( is_a( $partial, 'WP_Customize_Partial' ) ) {

		global $wpicecoldcounter;

		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		$id = str_replace( 'panel_up_', '', $partial->id );

		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		$wpicecoldcounter = $id;
	}

	// phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
	global $post; // Modify the global post object before setting up post data.

	if ( get_theme_mod( 'panel_up_' . $id ) ) {

		// phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
		$post = get_post( get_theme_mod( 'panel_up_' . $id ) );

		setup_postdata( $post );

		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		set_query_var( 'panel_up', $id );

		get_template_part( 'template-parts/page/content', 'front-page-panels-two' );

		wp_reset_postdata();

	} elseif ( is_customize_preview() ) {

		$text_front_page = sprintf(
			/* translators: %s : number of panel. */
			esc_html__( 'Front Page Section %s Up Placeholder', 'ice-cold' ),
			// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			$id
		);
		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		echo '<article class="wpicecold-panel-up wpicecold-panel-up' . $id . '" id="panelup' . $id . '"><span class="wpicecold-panel-title">' . esc_html( $text_front_page ) . '</span></article>';
	}
}


/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes string of css classes.
 */
function wpicecold_body_classes( $classes ) {

	// Add class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Add class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Add class if we're viewing the Customizer for easier styling of theme options.
	if ( is_customize_preview() ) {
		$classes[] = 'wpicecold-customizer';
	}

	// Add class on front page.
	if ( is_front_page() && 'posts' !== get_option( 'show_on_front' ) ) {
		$classes[] = 'wpicecold-front-page';
	}

	// Add class on front page blog.
	if ( is_home() && is_front_page() ) {
		$classes[] = 'wpicecold-front-page-blog';
	}

	// Add class for full image size.
	if ( get_theme_mod( 'header_size_full_front', false ) ) {
		$classes[] = 'wpicecold-front-image-full-size';
	}

	// Add a class if there is a custom header.
	if ( has_header_image() ) {
		$classes[] = 'has-header-image';
	}

	// Add class if sidebar is used.
	if ( is_active_sidebar( 'sidebar-1' ) && ! is_page() ) {
		$classes[] = 'has-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'wpicecold_body_classes' );

/**
 * Enqueues scripts and styles.
 */
function wpicecold_scripts() {

	// Add Bootrap CSS.
	wp_enqueue_style( 'wpicecold-bootstrap', get_theme_file_uri( '/assets/css/bootstrap/bootstrap.min.css' ), array(), '4.6.0', 'all' );

	// Add Font Awesome stylesheet 5.12.2 free solid+brand.
	wp_enqueue_style( 'wpicecold-fontawesome-style', get_theme_file_uri( '/assets/css/font-awesome/all.min.css' ), array(), '5.15.2', 'all' );

	// Add CSS ANIMATE.
	wp_enqueue_style( 'wpicecold-animate-css', get_theme_file_uri( '/assets/css/animate/animate.min.css' ), array(), '4.1.1', 'all' );

	// Add Theme stylesheet.
	wp_enqueue_style( 'wpicecold-style', get_stylesheet_uri(), array(), '1.0.0', 'all' );

	// Add Secondary theme style.
	if ( ! is_admin() ) {
		wp_enqueue_style( 'wpicecold-site-style', get_theme_file_uri( '/assets/css/website/site-style.min.css' ), array(), '1.0.0', 'all' );
	}

	// Add Bootrap Bundle JS.
	wp_enqueue_script( 'wpicecold-bootstrap-js', get_theme_file_uri( '/assets/js/bootstrap/bootstrap.min.js' ), array( 'jquery' ), '4.6.0', false );

	// Add To The top JS.
	wp_enqueue_script( 'wpicecold-tothetop-js', get_theme_file_uri( '/assets/js/to_the_top.min.js' ), array( 'jquery' ), '1.0.0', true );

	// Add Navigate JS.
	wp_enqueue_script( 'wpicecold-nav-js', get_theme_file_uri( '/assets/js/navigation.min.js' ), array( 'jquery' ), '1.0.0', true );

	// Add GIF Loader.
	if ( get_theme_mod( 'loader_page_jquery' ) === 'yes' ) {

		// Add Loader JS.
		wp_enqueue_script( 'wpicecold-page-loader-js', get_theme_file_uri( '/assets/js/page-loader.min.js' ), array(), '1.0.0', true );

	}

	// Add Front Page JS.
	if ( is_front_page() ) {

		// Add to the section with smoothing scroll.
		wp_enqueue_script( 'wpicecold-smoothscroll-js', get_theme_file_uri( '/assets/js/smooth_scroll.min.js' ), array( 'jquery' ), '1.0.0', true );

	}

	// Add JS to the frontpage for wide image.
	if ( get_theme_mod( 'header_size_full_front', false ) && is_front_page() ) {

		// Add to the section with smoothing scroll.
		wp_enqueue_script( 'wpicecold-front-page-media-js', get_theme_file_uri( '/assets/js/front-page-media.min.js' ), array( 'jquery' ), '1.0.0', true );

	}

	// Add Reply JS and Style.
	if ( is_singular() && comments_open() ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wpicecold_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Load Starterpack
 */
require get_template_directory() . '/inc/default-starter-pack.php';

/**
 * Load woocommercefunctions
 */
require get_template_directory() . '/inc/woocommerce-functions.php';

/**
 * Load breadcrumb
 */
require get_template_directory() . '/inc/breadcrumb-function.php';

/**
 * Load sanitizes
 */
require get_template_directory() . '/inc/customize-sanitize.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Icons
 */
require get_template_directory() . '/inc/icon-functions.php';

/**
 * Custom template tags for this theme
 */
require get_template_directory() . '/inc/template-extends.php';

/**
 * Custom styles for this theme
 */
require get_template_directory() . '/inc/custom-styles.php';

/**
 * Load Helper
 */
require get_template_directory() . '/inc/custom-helper.php';
