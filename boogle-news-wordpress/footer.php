<?php
/**
 * The footer template.
 *
 * @package Boogle_News
 */
?>
<footer class="site-footer">
	<div class="wrap footer-main">
		<div>
			<a class="brand footer-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<span>
					<span class="brand-name">Boogle<span>TV</span></span>
					<span class="brand-tagline"><?php esc_html_e( 'News & Gist Hub', 'boogle-news' ); ?></span>
				</span>
			</a>
			<p class="footer-copy"><?php echo esc_html( get_bloginfo( 'description' ) ); ?></p>
		</div>
		<?php if ( is_active_sidebar( 'footer-widgets' ) ) : ?>
			<?php dynamic_sidebar( 'footer-widgets' ); ?>
		<?php else : ?>
			<section class="footer-widget">
				<h2><?php esc_html_e( 'Explore', 'boogle-news' ); ?></h2>
				<?php
				wp_nav_menu( array(
					'theme_location' => 'footer',
					'container'      => false,
					'fallback_cb'    => false,
					'menu_class'     => '',
				) );
				?>
			</section>
			<section class="footer-widget">
				<h2><?php esc_html_e( 'Stay in the know', 'boogle-news' ); ?></h2>
				<p class="footer-copy"><?php esc_html_e( 'Fresh headlines and stories from across the topics that matter.', 'boogle-news' ); ?></p>
				<a href="<?php echo esc_url( get_bloginfo( 'rss2_url' ) ); ?>"><?php esc_html_e( 'Subscribe to RSS', 'boogle-news' ); ?> &rarr;</a>
			</section>
		<?php endif; ?>
	</div>
	<div class="footer-bottom">
		<div class="wrap footer-bottom-inner">
			<span>&copy; <?php echo esc_html( wp_date( 'Y' ) ); ?> <?php echo esc_html( get_bloginfo( 'name' ) ); ?></span>
			<span><?php esc_html_e( 'Independent voices. Stories that move.', 'boogle-news' ); ?></span>
		</div>
	</div>
</footer>
<button class="back-to-top" id="backToTop" type="button" aria-label="<?php esc_attr_e( 'Back to top', 'boogle-news' ); ?>">&uarr;</button>
<?php wp_footer(); ?>
</body>
</html>
