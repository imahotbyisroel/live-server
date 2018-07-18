<?php
/**
 * The default template for displaying content
 *
 * Used for single post related
 *
 * @package SpyroPress
 * @subpackage CharityPlus
 * @since 1.0.0
 */
?>

<article <?php post_class('related-item'); ?>>
	<?php 
		spcharityplus_post_media();  
	?>
	<div class="entry-info">
	<?php spcharityplus_archive_header('h4'); ?>
	<div class="entry-summary">
		<?php
			spcharityplus_post_excerpt('140', false)
		?>
	</div>
	<?php spcharityplus_archive_footer(); ?>
	</div>
</article>
