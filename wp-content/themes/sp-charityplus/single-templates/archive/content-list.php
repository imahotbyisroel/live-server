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

<article <?php post_class('entry-archive entry-list row'); ?>>
	<div class="col-sm-5">
		<?php 
			spcharityplus_post_media('medium');  
		?>
	</div>
	<div class="col-sm-7">
		<div class="entry-info">
		<?php spcharityplus_archive_header('h4'); ?>
		<div class="entry-summary">
			<?php
			/* translators: %s: Name of current post */
			spcharityplus_post_excerpt(155);

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
	</div>
</article>
