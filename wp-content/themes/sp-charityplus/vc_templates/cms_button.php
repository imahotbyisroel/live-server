<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $thumbnail_size
 * @var $thumbnail_size_custom
 * @var $values
 * Shortcode class
 * @var $this WPBakeryShortCode_cms_team_carousel
 */

extract(shortcode_atts(array(
    'btn_align'         => '',
    'btn_block'         => '',
    'values'            => '',
), $atts));

$buttons = vc_map_get_attributes( $this->getShortcode(), $atts );
$values = (array) vc_param_group_parse_atts( $buttons['values'] );

$wrapper_attributes[] = 'class="cms-button-wrapper '.esc_attr($btn_align).'"';
?>
<div <?php echo implode( ' ', $wrapper_attributes ); ?>><?php
foreach($values as $value){
    $btn_type = $value['btn_type'];
    /* parse button_link */
    if(isset($value['button_link'])){
        $button_link = vc_build_link($value['button_link']);
        $button_link = ( $button_link == '||' ) ? '' : $button_link;  
        if ( strlen( $button_link['url'] ) > 0 ) {
            $a_href = $button_link['url'];
            $a_title = $button_link['title'];
            $a_target = strlen( $button_link['target'] ) > 0 ? $button_link['target'] : '_self';
        }
        if(!empty($a_href) && !empty($a_title)){
            switch ($btn_type) {
                case 'simple':
                ?>
                    <a class="<?php echo esc_attr($btn_type.' '.$btn_block); ?> cms-scroll" href="<?php echo esc_url( $a_href ); ?>" title="<?php echo esc_attr( $a_title ); ?>" target="<?php echo trim( esc_attr( $a_target ) ); ?>"><?php echo esc_attr( $a_title );?>&nbsp;&nbsp;&nbsp;<i class="zmdi zmdi-arrow-<?php echo is_rtl()?'left':'right';?>"></i></a>
                <?php
                    break;                
                default:
                ?>
                    <a class="<?php echo esc_attr($btn_type.' '.$btn_block); ?> cms-scroll" href="<?php echo esc_url( $a_href ); ?>" title="<?php echo esc_attr( $a_title ); ?>" target="<?php echo trim( esc_attr( $a_target ) ); ?>"><span><?php echo esc_attr( $a_title );?></span></a>
                <?php
                    break;
            }
        ?>
            
        <?php 
        }
    }
}
?></div>


