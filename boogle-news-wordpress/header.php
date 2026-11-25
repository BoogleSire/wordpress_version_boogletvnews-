<?php
/**
 * The header template.
 *
 * @package Boogle_News
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="theme-color" content="#11131a">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link" href="#main-content"><?php esc_html_e( 'Skip to content', 'boogle-news' ); ?></a>
<div class="reading-progress" id="readingProgress" aria-hidden="true"></div>

<div class="topline">
	<div class="wrap topline-inner">
		<span class="topline-date"><?php echo esc_html( wp_date( get_option( 'date_format' ) ) ); ?></span>
		<span class="topline-note"><strong><?php esc_html_e( 'Boogle TV News', 'boogle-news' ); ?></strong> &mdash; <?php esc_html_e( 'Your daily briefing, made lively.', 'boogle-news' ); ?></span>
	</div>
</div>

<header class="site-header">
	<div class="wrap header-inner">
		<div class="site-branding">
			<?php if ( has_custom_logo() ) : ?>
				<?php the_custom_logo(); ?>
			<?php else : ?>
				<a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<span>
						<span class="brand-name">Boogle<span>TV</span></span>
						<span class="brand-tagline"><?php esc_html_e( 'News & Gist Hub', 'boogle-news' ); ?></span>
					</span>
				</a>
			<?php endif; ?>
		</div>
		<button class="menu-toggle" type="button" aria-expanded="false" aria-controls="primary-navigation">
			<span class="screen-reader-text"><?php esc_html_e( 'Toggle navigation', 'boogle-news' ); ?></span>
			<span aria-hidden="true">☰</span>
		</button>
		<nav class="primary-nav" id="primary-navigation" aria-label="<?php esc_attr_e( 'Primary navigation', 'boogle-news' ); ?>">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'primary',
				'container'      => false,
				'menu_class'     => 'menu',
				'fallback_cb'    => 'wp_page_menu',
				'depth'          => 2,
			) );
			?>
		</nav>
		<div class="header-search">
			<?php get_search_form(); ?>
		</div>
	</div>
</header>

<?php
$boogle_breaking_args = array(
	'post_type'           => 'post',
	'posts_per_page'      => 5,
	'ignore_sticky_posts' => true,
	'no_found_rows'       => true,
	'category_name'       => 'breaking',
);
$boogle_breaking = new WP_Query( $boogle_breaking_args );
if ( ! $boogle_breaking->have_posts() ) {
	$boogle_breaking = new WP_Query( array(
		'post_type'           => 'post',
		'posts_per_page'      => 5,
		'ignore_sticky_posts' => true,
		'no_found_rows'       => true,
	) );
}
?>
<div class="breaking" aria-label="<?php esc_attr_e( 'Breaking news headlines', 'boogle-news' ); ?>">
	<div class="wrap breaking-inner">
		<span class="breaking-label"><?php esc_html_e( 'Breaking', 'boogle-news' ); ?></span>
		<div class="ticker">
			<div class="ticker-track">
				<div class="ticker-group">
					<?php while ( $boogle_breaking->have_posts() ) : $boogle_breaking->the_post(); ?>
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					<?php endwhile; ?>
				</div>
				<div class="ticker-group" aria-hidden="true">
					<?php while ( $boogle_breaking->have_posts() ) : $boogle_breaking->the_post(); ?>
						<a href="<?php the_permalink(); ?>" tabindex="-1"><?php the_title(); ?></a>
					<?php endwhile; ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php wp_reset_postdata(); ?>
