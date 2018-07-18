<?php
/**
 * The template for displaying Archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, SP ChariyPlus already
 * has tag.php for Tag archives, category.php for Category archives, and
 * author.php for Author archives.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package SpyroPress
 * @subpackage CharityPlus
 * @since 1.0.0
 */
/* get side-bar position. */
$sidebar = spcharityplus_get_sidebar();

$id= get_the_ID();
$donation_info = apply_filters('zk_get_donation_info', $id);
extract(wp_parse_args($donation_info, array(
    "currency"        => "USD",
    "symbol"          => "$",
    "symbol_position" => 0,
    "remaining"       => "",
    "raised_percent"  => 0,
    "raised"          => "$0",
    "goal"            => "$20,000",
    "donors"          => 0
)));
if($raised_percent > 100){
    $progress = 100;
} else {
    $progress = $raised_percent;
}

get_header(); ?>

    <div id="content-area" class="<?php spcharityplus_main_content_class($sidebar); ?>">
        <div class="row single-donation">
            <div class="col-md-8">
            <div class="single-donate-content">
                <?php spcharityplus_post_thumbnail('large', true); ?>
                <div class="donation-wrap">
                    <div class="raised raised-progress-bar" data-progress="<?php echo esc_attr($raised_percent);?>">
                        <div class="raised-progress-bar-bg accent-bg" style="width: <?php echo esc_attr($raised_percent.'%');?>;"></div>

                        <div class="raised-progress-bar-value accent-bg primary-color" style="<?php echo is_rtl()?'right':'left';?>:<?php echo esc_attr($progress.'%');?>;"><?php echo esc_attr($raised_percent.'%'); ?></div>
                    </div>
                    <div class="donation-info">
                        <div class="donation-meta row">
                            <div class="col-sm-6">
                                <span class="accent-color"><?php echo esc_attr($raised.' '); ?></span> <?php esc_html_e('Raised of', 'sp-charityplus'); ?>
                                <span class="green-color"><?php  echo esc_attr($goal.' '); ?></span> <?php esc_html_e('Goal', 'sp-charityplus'); ?>
                            </div>
                            <div class="remaining col-sm-3"><?php echo esc_attr($remaining) ?></div>
                            <div class="col-sm-3 text-sm-right text-md-right">
                                <?php echo do_shortcode('[zodonations_form el_class="btn btn-primary" label_btn="'.esc_html__('Donate Now','sp-charityplus').'" donation_id="'.get_the_ID().'"]') ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php the_title('<h3 class="donate-title">','</h3>') ?>
                <div><?php spcharityplus_show_zodonations_content() ?></div>
                <?php 
                    if ( comments_open() ) :
                        comments_template();
                    endif;
                ?>
            </div>
            </div>
            <div class="col-md-4">
            <div class="single-donate-sidebar">
                <?php spcharityplus_campaign_related(); ?>
            </div>
            </div>
        </div>
    </div>
<?php
get_sidebar();
?>

<?php get_footer(); ?>