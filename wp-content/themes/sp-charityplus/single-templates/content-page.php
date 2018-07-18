<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package SpyroPress
 * @subpackage CharityPlus
 * @since 1.0.0
 */
?>
<div id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="page-content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->
</div><!-- #post -->
