<?php
/**
 * Main posts index and archive fallback.
 *
 * @package Boogle_News
 */
get_header();
?>
<main id="main-content" class="wrap archive-layout">
	<section>
		<header class="page-header">
			<p class="section-kicker"><?php esc_html_e( 'The latest', 'boogle-news' ); ?></p>
			<h1 class="page-title"><?php echo esc_html( is_home() ? __( 'Latest stories', 'boogle-news' ) : get_the_archive_title() ); ?></h1>
			<?php the_archive_description( '<div class="archive-description">', '</div>' ); ?>
		</header>
		<?php if ( have_posts() ) : ?>
			<div class="story-grid">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'template-parts/content', 'card' ); ?>
				<?php endwhile; ?>
			</div>
			<?php the_posts_pagination( array(
				'mid_size'  => 1,
				'prev_text' => __( '&larr; Newer', 'boogle-news' ),
				'next_text' => __( 'Older &rarr;', 'boogle-news' ),
				'class'     => 'pagination',
			) ); ?>
		<?php else : ?>
			<div class="empty-state">
				<h2><?php esc_html_e( 'No stories found', 'boogle-news' ); ?></h2>
				<p><?php esc_html_e( 'Try a different search or browse the latest headlines.', 'boogle-news' ); ?></p>
				<?php get_search_form(); ?>
			</div>
		<?php endif; ?>
	</section>
	<?php get_sidebar(); ?>
</main>
<?php get_footer(); ?>
