<?php
/**
 * @package SpyroPress
 * @subpackage CharityPlus
 * @since 1.0.0
 */
$pull_align = spcharityplus_pull_align();
$pull_align2 = spcharityplus_pull_align2();
spcharityplus_header_top2();
?>

<div id="cms-header" class="<?php spcharityplus_header_class(); ?>">
    <div class="container">
    	<?php 
            spcharityplus_header_logo($pull_align. ' hidden-lg');
            spcharityplus_header_extra($pull_align2);
            spcharityplus_header_navigation();   
        ?>
    </div>
</div>