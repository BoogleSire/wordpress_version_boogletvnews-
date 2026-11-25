<?php
/**
 * Front page: latest featured story and recent headlines.
 *
 * @package Boogle_News
 */
get_header();
$boogle_featured_query = new WP_Query( array(
	'post_type'           => 'post',
	'posts_per_page'      => 1,
	'ignore_sticky_posts' => true,
	'no_found_rows'       => true,
) );
$boogle_featured_id = 0;
?>
<main id="main-content">
	<?php if ( $boogle_featured_query->have_posts() ) : ?>
		<section class="front-hero">
			<div class="wrap">
				<p class="section-kicker"><?php esc_html_e( 'Top story', 'boogle-news' ); ?></p>
				<?php while ( $boogle_featured_query->have_posts() ) : $boogle_featured_query->the_post(); $boogle_featured_id = get_the_ID(); ?>
					<article class="hero-card">
						<a class="hero-image" href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true">
							<?php if ( has_post_thumbnail() ) : ?>
								<?php the_post_thumbnail( 'boogle-news-hero', array( 'fetchpriority' => 'high' ) ); ?>
							<?php endif; ?>
						</a>
						<div class="hero-content">
							<?php boogle_news_category_label(); ?>
							<h1 class="hero-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
							<p class="hero-excerpt"><?php echo esc_html( get_the_excerpt() ); ?></p>
							<?php boogle_news_post_meta(); ?>
						</div>
					</article>
				<?php endwhile; ?>
			</div>
		</section>
	<?php endif; ?>
	<?php wp_reset_postdata(); ?>

	<div class="wrap home-content">
		<section aria-labelledby="latest-heading">
			<div class="section-heading">
				<h2 id="latest-heading"><?php esc_html_e( 'Latest stories', 'boogle-news' ); ?></h2>
				<a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ?: home_url( '/' ) ); ?>"><?php esc_html_e( 'Explore all', 'boogle-news' ); ?> &rarr;</a>
			</div>
			<div class="story-grid">
				<?php
				$boogle_latest = new WP_Query( array(
					'post_type'           => 'post',
					'posts_per_page'      => 6,
					'post__not_in'        => $boogle_featured_id ? array( $boogle_featured_id ) : array(),
					'ignore_sticky_posts' => true,
					'no_found_rows'       => true,
				) );
				if ( $boogle_latest->have_posts() ) :
					while ( $boogle_latest->have_posts() ) :
						$boogle_latest->the_post();
						get_template_part( 'template-parts/content', 'card' );
					endwhile;
				else :
					?>
					<div class="empty-state"><?php esc_html_e( 'No stories yet. Check back soon for the latest news.', 'boogle-news' ); ?></div>
				<?php endif; ?>
			</div>
		</section>
		<?php get_sidebar(); ?>
	</div>
</main>
<?php
wp_reset_postdata();
get_footer();
