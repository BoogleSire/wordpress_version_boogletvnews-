<?php
/**
 * Theme setup and shared presentation helpers.
 *
 * @package Boogle_News
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function boogle_news_setup() {
	load_theme_textdomain( 'boogle-news', get_template_directory() . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-logo', array(
		'height'      => 80,
		'width'       => 320,
		'flex-height' => true,
		'flex-width'  => true,
	) );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );

	register_nav_menus( array(
		'primary' => __( 'Primary navigation', 'boogle-news' ),
		'footer'  => __( 'Footer navigation', 'boogle-news' ),
	) );

	add_image_size( 'boogle-news-card', 720, 450, true );
	add_image_size( 'boogle-news-hero', 1600, 900, true );
}
add_action( 'after_setup_theme', 'boogle_news_setup' );

function boogle_news_assets() {
	$theme_version = wp_get_theme()->get( 'Version' );
	$css_path      = get_stylesheet_directory() . '/style.css';
	$js_path       = get_template_directory() . '/assets/js/theme.js';

	wp_enqueue_style(
		'boogle-news-style',
		get_stylesheet_uri(),
		array(),
		file_exists( $css_path ) ? (string) filemtime( $css_path ) : $theme_version
	);
	wp_enqueue_script(
		'boogle-news-theme',
		get_template_directory_uri() . '/assets/js/theme.js',
		array(),
		file_exists( $js_path ) ? (string) filemtime( $js_path ) : $theme_version,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'boogle_news_assets' );

function boogle_news_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'News sidebar', 'boogle-news' ),
		'id'            => 'news-sidebar',
		'description'   => __( 'Add search, category, or editorial widgets.', 'boogle-news' ),
		'before_widget' => '<section id="%1$s" class="widget-box %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer widgets', 'boogle-news' ),
		'id'            => 'footer-widgets',
		'description'   => __( 'Optional widgets displayed in the site footer.', 'boogle-news' ),
		'before_widget' => '<section id="%1$s" class="footer-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'boogle_news_widgets_init' );

function boogle_news_excerpt_length( $length ) {
	return 24;
}
add_filter( 'excerpt_length', 'boogle_news_excerpt_length', 999 );

function boogle_news_excerpt_more( $more ) {
	return '&hellip;';
}
add_filter( 'excerpt_more', 'boogle_news_excerpt_more' );

function boogle_news_category_label() {
	$categories = get_the_category();
	if ( ! empty( $categories ) ) {
		$category = $categories[0];
		printf(
			'<a class="story-category" href="%1$s">%2$s</a>',
			esc_url( get_category_link( $category->term_id ) ),
			esc_html( $category->name )
		);
	}
}

function boogle_news_post_meta() {
	?>
	<div class="post-meta">
		<span><?php echo esc_html( get_the_date() ); ?></span>
		<span class="meta-dot" aria-hidden="true">•</span>
		<span><?php
			printf(
				/* translators: %s: post author name. */
				esc_html__( 'By %s', 'boogle-news' ),
				esc_html( get_the_author() )
			);
		?></span>
	</div>
	<?php
}

function boogle_news_reading_time() {
	$content = get_post_field( 'post_content', get_the_ID() );
	$words   = str_word_count( wp_strip_all_tags( strip_shortcodes( $content ) ) );
	$minutes = max( 1, (int) ceil( $words / 220 ) );
	printf(
		/* translators: %d: estimated reading time in minutes. */
		esc_html__( '%d min read', 'boogle-news' ),
		$minutes
	);
}

function boogle_news_posts_per_page( $query ) {
	if ( ! is_admin() && $query->is_main_query() && ( $query->is_home() || $query->is_archive() || $query->is_search() ) ) {
		$query->set( 'posts_per_page', 9 );
	}
}
add_action( 'pre_get_posts', 'boogle_news_posts_per_page' );
