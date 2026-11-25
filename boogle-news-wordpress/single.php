<?php
/**
 * Single post template.
 *
 * @package Boogle_News
 */
get_header();
?>
<main id="main-content" class="wrap single-layout">
	<div>
		<?php while ( have_posts() ) : the_post(); ?>
			<article <?php post_class(); ?>>
				<header class="article-header">
					<?php boogle_news_category_label(); ?>
					<h1 class="article-title"><?php the_title(); ?></h1>
					<?php if ( has_excerpt() ) : ?>
						<p class="article-lede"><?php echo esc_html( get_the_excerpt() ); ?></p>
					<?php endif; ?>
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
						<span class="meta-dot" aria-hidden="true">•</span>
						<span><?php boogle_news_reading_time(); ?></span>
					</div>
				</header>
				<?php if ( has_post_thumbnail() ) : ?>
					<figure class="article-featured">
						<?php the_post_thumbnail( 'boogle-news-hero' ); ?>
						<?php if ( get_the_post_thumbnail_caption() ) : ?>
							<figcaption><?php echo esc_html( get_the_post_thumbnail_caption() ); ?></figcaption>
						<?php endif; ?>
					</figure>
				<?php endif; ?>
				<div class="article-content">
					<?php the_content(); ?>
					<?php
					wp_link_pages( array(
						'before' => '<nav class="page-links">' . esc_html__( 'Pages:', 'boogle-news' ),
						'after'  => '</nav>',
					) );
					?>
				</div>
				<?php if ( has_tag() ) : ?>
					<footer class="article-footer">
						<div class="article-tags"><?php the_tags( '', '', '' ); ?></div>
					</footer>
				<?php endif; ?>
				<div class="author-card">
					<?php echo get_avatar( get_the_author_meta( 'ID' ), 56 ); ?>
					<div>
						<strong><?php the_author(); ?></strong>
						<p><?php echo esc_html( get_the_author_meta( 'description' ) ?: __( 'Contributor at Boogle TV News.', 'boogle-news' ) ); ?></p>
					</div>
				</div>
				<nav class="post-navigation" aria-label="<?php esc_attr_e( 'Post navigation', 'boogle-news' ); ?>">
					<div><?php previous_post_link( '<span>%link</span>', '<span>' . esc_html__( 'Previous story', 'boogle-news' ) . '</span>%title' ); ?></div>
					<div><?php next_post_link( '<span>%link</span>', '<span>' . esc_html__( 'Next story', 'boogle-news' ) . '</span>%title' ); ?></div>
				</nav>
				<?php if ( comments_open() || get_comments_number() ) : ?>
					<section class="comments-area"><?php comments_template(); ?></section>
				<?php endif; ?>
			</article>
		<?php endwhile; ?>
	</div>
	<?php get_sidebar(); ?>
</main>
<?php get_footer(); ?>
