<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package SpyroPress
 * @subpackage CharityPlus
 * @since 1.0.0
 * @author Chinh Duong Manh
 */
/* get side-bar position. */
$sidebar = spcharityplus_get_sidebar();
get_header(); ?>
<div id="content-area" class="<?php spcharityplus_main_content_class($sidebar); ?>">
    <?php
        // Start the loop.
        while ( have_posts() ) : the_post();

            // Include the page content template.
            get_template_part( 'single-templates/content', 'page' );

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