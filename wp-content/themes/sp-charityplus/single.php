<?php
/**
 * The Template for displaying all single posts
 *
 * @package SpyroPress
 * @subpackage CharityPlus
 * @since 1.0.0
 */
/* get side-bar position. */
$sidebar = spcharityplus_get_sidebar();

get_header(); ?>

<div id="content-area" class="<?php spcharityplus_main_content_class($sidebar); ?>">
    <?php
        // Start the loop.
        while ( have_posts() ) : the_post();

            // Include the single content template.
            get_template_part( 'single-templates/single/content', get_post_format() );

            // Get single post nav.
            spcharityplus_post_nav();
            // Post author 
            spcharityplus_author_info();
            // Post related 
            spcharityplus_post_related();
            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;

            // End the loop.
        endwhile;
    ?>
</div>
<?php
    get_sidebar();
?>

<?php get_footer(); ?>