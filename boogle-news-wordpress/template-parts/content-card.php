<?php
/**
 * Reusable story card.
 *
 * @package Boogle_News
 */
?>
<article <?php post_class( 'story-card' ); ?>>
	<a class="story-image" href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true">
		<?php if ( has_post_thumbnail() ) : ?>
			<?php the_post_thumbnail( 'boogle-news-card', array( 'loading' => 'lazy' ) ); ?>
		<?php endif; ?>
	</a>
	<div class="story-card-body">
		<?php boogle_news_category_label(); ?>
		<h3 class="story-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<p class="story-excerpt"><?php echo esc_html( get_the_excerpt() ); ?></p>
		<?php boogle_news_post_meta(); ?>
	</div>
</article>
