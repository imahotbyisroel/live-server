<?php
/**
 * The default template for displaying content
 *
 * Used for single event
 *
 * @package SP Charity Plus
 * @since 1.0.0
 */

$thumbnail_size = spcharityplus_single_event_thumbnail();
$has_excerpt = has_excerpt();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="event-media flex-list clearfix">
		<div class="col-md-8 nopadding">
			<?php 
				/**
				 * function spcharityplus_post_media()
				 * @param: thumbnail size
				*/
				spcharityplus_post_media($thumbnail_size, true);
			?>
		</div>
		<div class="col-md-4 has-box-shadow text-center">
			<?php spcharityplus_event_meta(true); ?>
		</div>
	</div>
	<?php 
		the_title('<h3>','</h3>');
	?>

	<div class="entry-content">
		<?php

			if($has_excerpt) echo '<p class="entry-excerpt">'.get_the_excerpt().'</p>';

			the_content();

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'sp-charityplus' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php 
		/* Show CountDown */
		spcharityplus_event_countdown();
		/* Show Google Map */
		spcharityplus_event_gmap();
	?>
	<div class="event-footer">
		<?php
			/* Show event facebook */
			spcharityplus_event_fb('<span class="event-fb">','</span>');
			/* Show share */
			spcharityplus_post_share( true ,'<span class="event-share">','</span>','left');
		?>
	</div>
</article><!-- #post-## -->
