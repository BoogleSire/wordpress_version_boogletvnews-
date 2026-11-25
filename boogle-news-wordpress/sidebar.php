<?php
/**
 * News sidebar.
 *
 * @package Boogle_News
 */
?>
<aside class="sidebar" aria-label="<?php esc_attr_e( 'News sidebar', 'boogle-news' ); ?>">
	<?php if ( is_active_sidebar( 'news-sidebar' ) ) : ?>
		<?php dynamic_sidebar( 'news-sidebar' ); ?>
	<?php else : ?>
		<section class="widget-box">
			<h2><?php esc_html_e( 'Browse topics', 'boogle-news' ); ?></h2>
			<ul><?php wp_list_categories( array( 'title_li' => '', 'show_count' => false, 'number' => 8, 'depth' => 1 ) ); ?></ul>
		</section>
		<section class="widget-box">
			<h2><?php esc_html_e( 'Most recent', 'boogle-news' ); ?></h2>
			<ul>
				<?php
				$boogle_sidebar_posts = new WP_Query( array(
					'post_type'           => 'post',
					'posts_per_page'      => 4,
					'ignore_sticky_posts' => true,
					'no_found_rows'       => true,
				) );
				while ( $boogle_sidebar_posts->have_posts() ) :
					$boogle_sidebar_posts->the_post();
					?>
					<li class="sidebar-post">
						<a class="sidebar-thumb" href="<?php the_permalink(); ?>">
							<?php if ( has_post_thumbnail() ) : ?>
								<?php the_post_thumbnail( 'thumbnail', array( 'loading' => 'lazy' ) ); ?>
							<?php endif; ?>
						</a>
						<div>
							<a class="sidebar-post-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							<span class="sidebar-date"><?php echo esc_html( get_the_date() ); ?></span>
						</div>
					</li>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			</ul>
		</section>
	<?php endif; ?>
</aside>
