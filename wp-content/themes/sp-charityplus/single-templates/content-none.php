<?php
/**
 * The template for displaying a "No posts found" message
 *
 * @package SpyroPress
 * @subpackage CharityPlus
 * @since 1.0.0
 */
?>
<article id="post-0" class="post no-results not-found">
	<div class="entry-header">
		<h2 class="entry-title"><?php esc_html_e( 'Nothing Found', 'sp-charityplus' ); ?></h2>
	</div>
	<div class="entry-content">
		<p><?php esc_html_e( 'Apologies, but no results were found. Perhaps searching will help find a related post.', 'sp-charityplus' ); ?></p>

		<?php get_search_form(); ?>

	</div><!-- .entry-content -->
</article><!-- #post-0 -->