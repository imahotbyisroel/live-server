<?php
/**
 * The default template for displaying content
 *
 * Used for index/archive/author/search.
 *
 * @package SpyroPress
 * @subpackage CharityPlus
 * @since 1.0.0
 */
?>

<article <?php post_class('col-md-4 archive-donate'); ?>>
    <div class="archive-inner">
    <?php
    $id= get_the_ID();
    $donation_info = apply_filters('zk_get_donation_info', $id);
    extract(wp_parse_args($donation_info, array(
        "currency"        => "USD",
        "symbol"          => "$",
        "symbol_position" => 0,
        "remaining"       => "",
        "raised_percent"  => 50,
        "raised"          => "$0",
        "goal"            => "$20,000",
        "donors"          => 0
    )));
    if($raised_percent > 100){
        $progress = 100;
    } else {
        $progress = round($raised_percent);
    }
    ?>
    <?php 
        spcharityplus_post_thumbnail('330x230', true);
    ?>
    <div class="raided text-center">
        <div class="pie-wrapper progress-<?php echo esc_attr($progress);?>">
            <span class="percent-label"><?php echo esc_attr($raised_percent.'%');?></span>
            <div class="pie">
              <div class="left-side half-circle"></div>
              <div class="right-side half-circle"></div>
            </div>
            <div class="shadow"></div>
        </div>
    </div>
    <?php
        the_title('<h4><a href="'.get_the_permalink().'">','</a></h4>'); 
        spcharityplus_post_excerpt('76', true);
    ?>
    
    <div class="donation-info">
        <div> <?php echo do_shortcode('[zodonations_form el_class="btn btn-default" label_btn="'.esc_html__('Donate Now','sp-charityplus').'" donation_id="'.get_the_ID().'"]') ?> <?php echo esc_attr('&nbsp;&nbsp;&nbsp;&nbsp;'.$remaining) ?> </div>
        <div class="donation-meta">
            <span class="accent-color"><?php echo esc_attr($raised); ?></span> <?php esc_html_e('Raised of', 'sp-charityplus'); ?>
            <span class="green-color"><?php  echo esc_attr($goal); ?></span> <?php esc_html_e('Goal', 'sp-charityplus'); ?>
        </div>
    </div>
    </div>
</article>