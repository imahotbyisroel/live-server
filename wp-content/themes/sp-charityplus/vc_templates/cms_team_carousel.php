
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
 * @var $this WPBakeryShortCode_cms_team_carousel
 */
$values = $thumbnail_class = $link_open = $link_close = $item_overlay_bg = $social_icon = '';
$social_align = is_rtl()?'text-left':'text-right';
$css_class = 'cms-team-wrap';
/* get Shortcode custom value */
extract(shortcode_atts(array(
    'content_align'             => 'text-center',
    'animation_in'              => 'fadeIn',
    'animation_out'             => 'fadeOut',
    'overlay_bg'                => '',
    'thumbnail_size'            => 'medium',
    'thumbnail_size_custom'     => '',
    'thumbnail_circle'          => false,
    'layout_mode'               => 1,
    'number_row'                => 1
), $atts));
if(!empty($overlay_bg)){
    $item_overlay_bg = 'style="background-color:'.$overlay_bg.';"';
}
$css_class .= ' '.$content_align;
/* Image Size */
$custom_size = false;
if ($thumbnail_size === 'custom'){
    $custom_size = true;
    $thumbnail_size = $thumbnail_size_custom;
}
if($thumbnail_circle) $thumbnail_class .= ' img-circle';

$member = vc_map_get_attributes( $this->getShortcode(), $atts );
$values = (array) vc_param_group_parse_atts( $member['values'] );
if(empty($values[0])) {
    echo '<p class="require required">'.esc_html__('Please add a member!','sp-charityplus').'</p>';
    return;
}

?>
<div class="<?php echo esc_attr($css_class);?>">
    <div class="cms-carousel owl-carousel <?php echo esc_attr($atts['nav']) ? 'has-nav' : ''; ?> <?php echo esc_attr($atts['dots']) ? 'has-dots' : ''; ?>" id="<?php echo esc_attr($atts['html_id']);?>"> 
        <?php
            $i=1;
            $j=0;
            $count = count($values);
            foreach($values as $value){
                $j++;
                if($i > $number_row) $i=1;
                if($i==1): 
                ?>
                <div class="cms-team-item-wrap">
                <?php endif ;
                echo '<div class="cms-team-item overlay-wrap">';
               
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
                    if($link){
                        $link_open = '<a href="'.esc_url($a_href).'" title="'.esc_attr($a_title).'" target="'.esc_attr($a_target).'">';
                        $link_close = '</a>';
                    }

                    /* Get social */
                    if(isset($value['social_values'])){
                        $socials_list = '';
                        $socials = (array) vc_param_group_parse_atts( $value['social_values']);
                        foreach($socials as $social){
                            if(isset($social['social_icon'])) $social_icon = '<i class="'.$social['social_icon'].'"></i>';
                            /* parse social link */
                            $social_link = false;
                            if(isset($social['social_link'])){
                                $social_icon_link = vc_build_link( $social['social_link'] );
                                $social_icon_link = ( $social_icon_link == '||' ) ? '' : $social_icon_link;
                                if ( strlen( $social_icon_link['url'] ) > 0 ) {
                                    $social_link = true;
                                    $social_href = $social_icon_link['url'];
                                    $social_title = $social_icon_link['title'] ? $social_icon_link['title'] : '';
                                    $social_target = strlen( $social_icon_link['target'] ) > 0 ? str_replace(' ','',$social_icon_link['target']) : '_self';
                                }
                            }
                            if($social_link){
                                $social_link_open = '<a href="'.esc_url($social_href).'" title="'.esc_attr($social_title).'" target="'.esc_attr($social_target).'">';
                                $social_link_close = '</a>';
                                $socials_list .= $social_link_open.$social_icon.$social_link_close;
                            }     
                        }
                    }
                    echo '<div class="cms-team-media">';
                        if(isset($value['image'])) {  
                            $img = wpb_getImageBySize( array(
                                'attach_id' => $value['image'],
                                'thumb_size' => $thumbnail_size,
                                'class' => 'team-image'.$thumbnail_class,
                            ));
                            $thumbnail = $img['thumbnail'];
                            echo wp_kses_post($thumbnail);
                        }
                        echo '<div class="overlay animated '.esc_attr($thumbnail_class).'" data-animation-in="'.esc_attr($animation_in).'" data-animation-out="'.esc_attr($animation_out).'" '.wp_kses_post($item_overlay_bg).'>
                            <div class="overlay-inner center-align">
                                <div class="icon-list">';
                                    if(isset($value['social_values']))  echo '<div class="cms-team-socials '.esc_attr($social_align).'">'.wp_kses_post($socials_list).'</div>';
                        echo '</div></div></div>';
                    echo '</div>';
                    echo '<div class="cms-team-info">';
                        echo '<div class="cms-team-info-header">';
                            if(isset($value['name']))  echo '<h5>'.wp_kses_post($link_open).esc_html($value['name']).wp_kses_post($link_close).'</h5>';
                            if(isset($value['position']))   echo '<div class="position">'.esc_html($value['position']).'</div>';
                        echo '</div>';
                        echo '<div class="cms-team-info-content">';
                            if(isset($value['slogan']))     echo '<div class="description">'.esc_html($value['slogan']).'</div>';
                            
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
                if($i == $number_row || $j == $count): ?>
                </div>
                <?php endif; 
                $i ++; 
            }
        ?>
    </div>
</div>
