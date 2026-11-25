<?php
/**
 * Static page template.
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
					<h1 class="article-title"><?php the_title(); ?></h1>
				</header>
				<div class="article-content"><?php the_content(); ?></div>
				<?php if ( comments_open() || get_comments_number() ) : ?>
					<section class="comments-area"><?php comments_template(); ?></section>
				<?php endif; ?>
			</article>
		<?php endwhile; ?>
	</div>
	<?php get_sidebar(); ?>
</main>
<?php get_footer(); ?>
