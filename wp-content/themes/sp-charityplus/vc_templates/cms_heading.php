<?php
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}
extract(shortcode_atts(array(
    'text_align'          => '',
    'layout_mode'         => '1',
    'add_gradient_bg'     => false, 
    'letter_spacing'      => '',
    'st_letter_spacing'   => '',
    'desc_letter_spacing' => '',
    'css_heading'         => '',  
    'css_subheading'         => '',  
    'css_desc'         => '',  
), $atts));

/**
 * Shortcode attributes
 * @var $atts
 * @var $source
 * @var $text
 * @var $link
 * @var $google_fonts
 * @var $font_container
 * @var $el_class
 * @var $css
 * @var $css_animation
 * @var $font_container_data - returned from $this->getAttributes
 * @var $google_fonts_data - returned from $this->getAttributes
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Custom_heading
 */

$css_heading_cls =  trim(preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'cms-heading cms-heading'.$layout_mode.' ' . vc_shortcode_custom_css_class( $css_heading, ' ' ), $this->settings['base'], $atts ) ) ) ;

$css_subheading_cls =  trim(preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'sub-heading ' . vc_shortcode_custom_css_class( $css_subheading, ' ' ), $this->settings['base'], $atts ) ) ) ;


$css_desc_cls =  trim(preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'desccription ' . vc_shortcode_custom_css_class( $css_desc, ' ' ), $this->settings['base'], $atts ) ) ) ;



$source = $text = $link = $google_fonts = $font_container = $st_google_fonts = $st_font_container = $desc_font_container = $el_class = $css = $css_animation = $font_container_data = $google_fonts_data = $st_font_container_data = $st_google_fonts_data = $add_icon = $icon = $icon_font_container_data = '';
// This is needed to extract $font_container_data and $google_fonts_data
extract( $this->getAttributes( $atts ) );

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

/* Icon */
$icon_name = "icon_" . $icon_type;
$iconClass = isset($atts[$icon_name]) ? $atts[$icon_name]: '';

/**
 * @var $css_class
 */
extract( $this->getStyles( $el_class . $this->getCSSAnimation( $css_animation ), $css, $google_fonts_data, $font_container_data, $st_google_fonts_data, $st_font_container_data, $desc_font_container_data, $atts, $icon_font_container_data ) );

$settings = get_option( 'wpb_js_google_fonts_subsets' );
if ( is_array( $settings ) && ! empty( $settings ) ) {
    $subsets = '&subset=' . implode( ',', $settings );
} else {
    $subsets = '';
}

if ( ( ! isset( $atts['use_theme_fonts'] ) || 'yes' !== $atts['use_theme_fonts'] ) && isset( $google_fonts_data['values']['font_family'] ) ) {
    wp_enqueue_style( 'vc_google_fonts_' . vc_build_safe_css_class( $google_fonts_data['values']['font_family'] ), '//fonts.googleapis.com/css?family=' . $google_fonts_data['values']['font_family'] . $subsets );
}
/* sub heading */
if ( ( ! isset( $atts['st_use_theme_fonts'] ) || 'yes' !== $atts['st_use_theme_fonts'] ) && isset( $st_google_fonts_data['values']['font_family'] ) ) {
    wp_enqueue_style( 'vc_google_fonts_' . vc_build_safe_css_class( $st_google_fonts_data['values']['font_family'] ), '//fonts.googleapis.com/css?family=' . $st_google_fonts_data['values']['font_family'] . $subsets );
}

$css_class .= ' layout'.$layout_mode;
if($add_gradient_bg) $css_class .= ' has-gradirent-bg';

if(!empty($text_align)) $css_class .= ' text-'.$text_align;
if(!empty($letter_spacing)){
    $letter_spacing = $letter_spacing/1000;
    $styles[] = 'letter-spacing:'.$letter_spacing.'em';
}
if ( ! empty( $styles ) ) {
    $style = 'style="' . esc_attr( implode( ';', $styles ) ) . '"';
} else {
    $style = '';
}
if($add_icon){
    if ( ! empty( $icon_styles ) ) {
        $icon_style = 'style="' . esc_attr( implode( ';', $icon_styles ) ) . '"';
    } else {
        $icon_style = '';
    }
    $icon = '<span class="'.$iconClass.'" '.$icon_style.'></span>&nbsp;&nbsp;&nbsp;';
}
if(!empty($st_letter_spacing)){
    $st_letter_spacing = $st_letter_spacing/1000;
    $st_styles[] = 'letter-spacing:'.$st_letter_spacing.'em';
}
if ( ! empty( $st_styles ) ) {
    $st_style = 'style="' . esc_attr( implode( ';', $st_styles ) ) . '"';
} else {
    $st_style = '';
}

if(!empty($desc_letter_spacing)){
    $desc_letter_spacing = $desc_letter_spacing/1000;
    $desc_styles[] = 'letter-spacing:'.$desc_letter_spacing.'em';
}
if ( ! empty( $desc_styles ) ) {
    $desc_style = 'style="' . esc_attr( implode( ';', $desc_styles ) ) . '"';
} else {
    $desc_style = '';
}

if ( 'post_title' === $source ) {
    $text = get_the_title( get_the_ID());
}
if ( ! empty( $link ) ) {
    $link = vc_build_link( $link );
    if(!empty($link['url'])){
        $text = '<a href="' . esc_attr( $link['url'] ) . '"' . ( $link['target'] ? ' target="' . esc_attr( $link['target'] ) . '"' : '' ) . ( $link['rel'] ? ' rel="' . esc_attr( $link['rel'] ) . '"' : '' ) . ( $link['title'] ? ' title="' . esc_attr( $link['title'] ) . '"' : '' ) . $style . '>' . $text . '</a>';
    }
}

$output = $heading = $sub_heading = $desccription = $xicon = '';


if(!empty($text)) $heading = '<' . $font_container_data['values']['tag'] . ' class="'.esc_attr($css_heading_cls).'" ' . $style . ' >'.$icon.$text.'</' . $font_container_data['values']['tag'] . '>';

if(!empty($st_text)) $sub_heading = '<' . $st_font_container_data['values']['tag'] . ' class="'.esc_attr($css_subheading_cls).'" ' . $st_style . ' >'.$st_text.'</' . $st_font_container_data['values']['tag'] . '>';

if(!empty($desc_text)) $desccription = '<' . $desc_font_container_data['values']['tag'] . ' class="'.esc_attr($css_desc_cls).'" ' . $desc_style . ' >'.$desc_text.'</' . $desc_font_container_data['values']['tag'] . '>';
switch ($layout_mode) {
    default:
        $output .= '<div class="' . esc_attr( $css_class ) . '" >';
        $output .= $heading;
        $output .= $sub_heading;
        $output .= $desccription;
        $output .= '</div>';
        break;
}
       
echo wp_kses_post($output);
