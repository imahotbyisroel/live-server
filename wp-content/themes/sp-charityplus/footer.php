<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package SpyroPress
 * @subpackage CharityPlus
 * @since 1.0.0
 */
?>
            </div> <!-- #cms-main > .row -->
        </main><!-- #cms-main -->
        <footer id="cms-footer" class="<?php spcharityplus_footer_class(); ?>">
            <?php 
                spcharityplus_footer_top();
                spcharityplus_footer_bottom(); 
            ?>
        </footer><!-- #cms-footer -->
    </div> <!-- #cms-page -->
    <?php wp_footer(); ?>
</body>
</html>