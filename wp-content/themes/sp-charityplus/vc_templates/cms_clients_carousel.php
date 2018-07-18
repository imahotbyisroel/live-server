
<?php
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $thumbnail_size
 * @var $thumbnail_size_custom
 * @var $values
 * Shortcode class
 * @var $this WPBakeryShortCode_cms_clients_carousel
 */
$values = $thumbnail_class = '';

/* get Shortcode custom value */
extract(shortcode_atts(array(
    'number_row'            => '1',
    'thumbnail_size'        => 'medium',
    'thumbnail_size_custom' => '',
    'layout_mode'           => 1,
), $atts));

$clients = vc_map_get_attributes( $this->getShortcode(), $atts );
$values = (array) vc_param_group_parse_atts( $clients['values'] );
if(empty($values[0])) {
    echo '<p class="require required">'.esc_html__('Please add a client logo!','sp-charityplus').'</p>';
    return;
}

/* Image Size */
$custom_size = false;
if ($thumbnail_size === 'custom'){
    $custom_size = true;
    $thumbnail_size = $thumbnail_size_custom;
}
$count = count($values);
$i=1;
$j=0;
?>
<div class="cms-clients-wrap text-center">
    <div class="cms-carousel owl-carousel <?php echo esc_attr($atts['nav']) ? 'has-nav' : ''; ?>" id="<?php echo esc_attr($atts['html_id']);?>" data-equal=".owl-item"> 
        <?php
            foreach($values as $value){
                $j++; 
                if($i > $number_row) $i=1;
                /* parse image_link */
                $link = false;
                if(isset($value['image_link'])){
                    $image_link = vc_build_link( $value['image_link']);
                    $image_link = ( $image_link == '||' ) ? '' : $image_link;
                    
                    if ( strlen( $image_link['url'] ) > 0 ) {
                        $link = true;
                        $a_href = $image_link['url'];
                        $a_title = $image_link['title'] ? $image_link['title'] : '';
                        $a_target = strlen( $image_link['target'] ) > 0 ? str_replace(' ','',$image_link['target']) : '_self';
                    }
                }
                if(isset($value['image'])) {
                    if($i==1) echo '<div class="client-item">';                    
                        if($link) echo '<a class="client-logo" href="'.esc_url($a_href).'" title="'.esc_attr($a_title).'" target="'.esc_attr($a_target).'">';
                            $img = wpb_getImageBySize( array(
                                'attach_id' => $value['image'],
                                'thumb_size' => $thumbnail_size,
                                'class' => 'team-image'.$thumbnail_class,
                            ));
                            $thumbnail = $img['thumbnail'];
                            echo balanceTags($thumbnail);
                        if($link) echo '</a>';
                    if($i == $number_row || $j==$count) echo '</div>';
                    $i ++;
                }
            }
        ?>
    </div>
</div>
