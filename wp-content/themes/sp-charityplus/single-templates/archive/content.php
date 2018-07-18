<?php
/**
 * The default template for displaying content
 *
 * Used for index/archive/author/search.
 *
 * @package SpyroPress
 * @subpackage CharityPlus
 * @since 1.0.0
 */
?>

<article <?php post_class('entry-archive entry-standard'); ?>>
	<?php 
		spcharityplus_post_media();  
	?>
	<div class="entry-info">
		<?php spcharityplus_archive_header(); ?>
		<div class="archive-summary">
			<?php
			/* translators: %s: Name of current post */
			the_excerpt();

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'sp-charityplus' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );
			?>
		</div>
		<?php spcharityplus_archive_footer(); ?>
	</div>
</article>
