<?php
/**
 * The template for displaying Search Results pages
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
        if ( have_posts() ) :
            while ( have_posts() ) : the_post();

                get_template_part( 'single-templates/archive/content', spcharityplus_archive_layout() );

            endwhile; // end of the loop.

            /* blog nav. */
            spcharityplus_paging_nav();

        else :
            /* content none. */
            get_template_part( 'single-templates/content', 'none' );

        endif; 
    ?>
</div>
<?php
    get_sidebar();
?>

<?php get_footer(); ?>