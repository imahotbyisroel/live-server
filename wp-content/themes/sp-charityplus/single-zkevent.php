<?php
/**
 * The Template for displaying all single posts
 *
 * @package ZookaStudio
 * @subpackage ZK Charixy
 * @author Chinh Duong Manh
 * @since 1.0.0
 */
$sidebar = spcharityplus_get_sidebar();

get_header(); 
?>
    <div id="content-area" class="<?php spcharityplus_main_content_class($sidebar); ?>">
        <?php
            // Start the loop.
            while ( have_posts() ) : the_post();

                // Include the single content template.
                get_template_part( 'single-templates/single/event', get_post_format() );

                // End the loop.
            endwhile;
        ?>
    </div>
<?php
get_footer(); ?>