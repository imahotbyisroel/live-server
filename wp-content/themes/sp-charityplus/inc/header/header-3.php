<?php
/**
 * @package SpyroPress
 * @subpackage CharityPlus
 * @since 1.0.0
 */
$pull_align = spcharityplus_pull_align();
$pull_align2 = spcharityplus_pull_align2();
?>

<div id="cms-header" class="<?php spcharityplus_header_class(); ?>">
    <div class="container">
    	<div class="container-inner">
    		<?php spcharityplus_header_logo('col-xs-6 col-sm-4 col-md-3 col-lg-2 accent-bg text-center'); ?>
    		<div class="col-xs-6 col-sm-8 col-md-9 col-lg-10 nopadding">
    			<?php 
    				spcharityplus_header_top();
		        ?>
		        <div class="nav-wrap clearfix">
		        	<?php 
		        		spcharityplus_header_extra($pull_align2);
			            spcharityplus_header_navigation();   
			        ?>
		        </div>
    		</div>
    	</div>
    </div>
</div>