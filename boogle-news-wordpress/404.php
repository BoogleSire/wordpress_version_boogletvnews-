<?php
/**
 * Not found template.
 *
 * @package Boogle_News
 */
get_header();
?>
<main id="main-content" class="wrap archive-layout">
	<section class="empty-state">
		<p class="section-kicker"><?php esc_html_e( '404 / Not found', 'boogle-news' ); ?></p>
		<h1 class="page-title"><?php esc_html_e( 'This story took a detour.', 'boogle-news' ); ?></h1>
		<p><?php esc_html_e( 'The page may have moved. Search the site or head back to the latest news.', 'boogle-news' ); ?></p>
		<?php get_search_form(); ?>
		<p><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Back to the front page', 'boogle-news' ); ?> &rarr;</a></p>
	</section>
	<?php get_sidebar(); ?>
</main>
<?php get_footer(); ?>
