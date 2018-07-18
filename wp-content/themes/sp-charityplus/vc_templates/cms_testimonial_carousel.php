
<?php
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $title
 * @var $values
 * Shortcode class
 * @var $this WPBakeryShortCode_cms_images_carousel
 */
/* get Shortcode custom value */
    extract(shortcode_atts(array(
        'content_align'  => 'text-center',
        'layout_mode'    => '1',
        'color_mode'     => '',
        'quote_bg_color' => '',
        'quote_color'    => '',
        'nav_post'       => '',
        'nav'            => true,
        'dots'           => false
    ), $atts));


$testimonial = vc_map_get_attributes( $this->getShortcode(), $atts );
$values = (array) vc_param_group_parse_atts( $testimonial['values'] );
if(!isset($values[0]['text'])){
    echo '<p class="require required">'.esc_html__('Please add a testimonial text!','sp-charityplus').'</p>';
    return;
}
$css_class = 'layout'.$layout_mode.' '.$color_mode.' '.$content_align;
$show_nav = $nav ? 'has-nav' : '';
$show_dots = $dots ? 'has-dots' : '';
$thumbnail = $style = '';
$styles = array();
if($quote_bg_color) $styles[] = 'background-color:'.$quote_bg_color;
if($quote_color) $styles[] = 'color:'.$quote_color;
if(!empty($styles)) $style = 'style="'.implode(';', $styles).'"';
$lquote = is_rtl() ? '&ldquo;' : '&rdquo;';
$rquote = is_rtl() ? '&rdquo;' : '&ldquo;';

?>
<div class="cms-testimonial-wrap <?php echo esc_attr($css_class); ?>">
    <div class="cms-carousel owl-carousel <?php echo esc_attr($show_nav.' '.$show_dots.' '.$nav_post.' '.$color_mode);?>" id="<?php echo esc_attr($atts['html_id']);?>">
        <?php
            switch ($layout_mode) {
                default:
                    foreach($values as $value){
                        if(isset($value['text']) && !empty($value['text'])){
                            echo '<div class="cms-carousel-item">';
                                echo '<div class="cms-testimonial-content">';
                                    if(isset($value['text'])) echo '<div class="description"><span class="l-quote" '.$style.'>'.esc_html($lquote).'</span>'.esc_html($value['text']).'<span class="r-quote" '.$style.'>'.esc_html($rquote).'</span></div>';
                                echo '</div>';
                                echo '<div class="author-info">';
                                    if(isset($value['author_avatar'])) {
                                        $img = wpb_getImageBySize( array(
                                            'attach_id' => $value['author_avatar'],
                                            'thumb_size' => '100',
                                            'class' => 'img-circle avatar',
                                        ));
                                        echo wp_kses_post('<span class="author-avatar">'.$img['thumbnail'].'</span>');
                                    }
                                    if(isset($value['author_name'])) echo '<h4 class="author-name color-'.esc_attr($color_mode).'">'.esc_attr($value['author_name']).'</h4>';
                                    if(isset($value['author_position'])) echo '<span class="author-position">'.esc_attr($value['author_position']).'</span>';
                                    if(isset($value['author_url'])) echo ' - <a class="author-url accent-color" href="'.esc_url($value['author_url']).'">'.esc_html($value['author_url']).'</a>';
                                echo '</div>';
                            echo '</div>';
                        }
                    }
                break;
            }
        ?>
    </div>
</div>
