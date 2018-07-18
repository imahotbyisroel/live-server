<?php
vc_map(array(
    'name' => 'CMS Testimonial Carousel',
    'base' => 'cms_testimonial_carousel',
    'icon' => 'cs_icon_for_vc',
    'category' => esc_html__('CmsSuperheroes Shortcodes', 'sp-charityplus'),
    'description' => esc_html__('Add clients testimonial', 'sp-charityplus'),
    'params' => array(
        //implode(',',spcharityplus_owl_settings()),
        array(
            'type'          => 'dropdown',
            'heading'       => esc_html__('Content Align','sp-charityplus'),
            'param_name'    => 'content_align',
            'value'         => array(
                'Default'       => 'text-default',
                'Text Left'     => 'text-left',
                'Text Right'    => 'text-right',
                'Text Center'   => 'text-center',
            ),
            'std'           => 'text-center',
        ),
        array(
            'type' => 'img',
            'heading' => esc_html__('Layout Mode','sp-charityplus'),
            'param_name' => 'layout_mode',
            'value' =>  array(
                '1' => get_template_directory_uri().'/vc_params/layouts/cms-testimonial.png',
            ),
            'std' => '1',
        ),
        array(
            'type'          => 'dropdown',
            'heading'       => esc_html__( 'Color Mode', 'sp-charityplus' ),
            'param_name'    => 'color_mode',
            'value'         => array(
                esc_html__('Default','sp-charityplus')     => '',
                esc_html__('White','sp-charityplus')     => 'white',
            ),
            'std'           => ''
        ),
        array(
            'type'          => 'colorpicker',
            'heading'       => esc_html__( 'Icon Quote Background Color', 'sp-charityplus' ),
            'description'   => esc_html__( 'Custom background color for icon quote', 'sp-charityplus' ),
            'param_name'    => 'quote_bg_color',
            'std'           => '',
            'edit_field_class' => 'vc_col-sm-6 vc_column',
        ),
        array(
            'type'          => 'colorpicker',
            'heading'       => esc_html__( 'Icon Quote Color', 'sp-charityplus' ),
            'description'   => esc_html__( 'Custom color for icon quote', 'sp-charityplus' ),
            'param_name'    => 'quote_color',
            'std'           => '',
            'edit_field_class' => 'vc_col-sm-6 vc_column',
        ),
        /* Testimonial Settings */
        array(
            'type'          => 'param_group',
            'heading'       => esc_html__( 'Add your testimonial', 'sp-charityplus' ),
            'param_name'    => 'values',
            'value'         => urlencode( json_encode( array(
                array(
                    'author_name' => esc_html__( 'John Smith', 'sp-charityplus' ),
                ),
            ) ) ),
            'params' => array(
                array(
                    'type'          => 'textfield',
                    'heading'       => esc_html__( 'Author name', 'sp-charityplus' ),
                    'param_name'    => 'author_name',
                    'admin_label'   => true,
                    'value'         => esc_html__('John Smith','sp-charityplus')
                ),
                array(
                    'type'          => 'textfield',
                    'heading'       => esc_html__( 'Author Position', 'sp-charityplus' ),
                    'param_name'    => 'author_position',
                    'value'         => esc_html__('Project Manager','sp-charityplus')
                ),
                array(
                    'type'          => 'textfield',
                    'heading'       => esc_html__( 'Author URL', 'sp-charityplus' ),
                    'param_name'    => 'author_url',
                ),
                array(
                    'type'          => 'attach_image',
                    'heading'       => esc_html__( 'Author Image', 'sp-charityplus' ),
                    'param_name'    => 'author_avatar',
                    'value'         => ''
                ),
                array(
                    'type'          => 'textarea',
                    'heading'       => esc_html__( 'Testimonial text', 'sp-charityplus' ),
                    'description'   => esc_html__('Press double ENTER to get line-break','sp-charityplus'),
                    'param_name'    => 'text',
                    'value'         => esc_html__('Donec euismod sem ac urna finibus, sit amet efficitur erat tem pus. Ut dapibus dictum turpis, vel faucibus erat posuere vitae icitur erat tem puna','sp-charityplus')
                ),
            ),
            'group' => esc_html__('Testimonial Item','sp-charityplus')
        ),
        /* Carousel Settings */
        array(
            'type'              => 'dropdown',
            'heading'           => esc_html__('XSmall Devices','sp-charityplus'),
            'param_name'        => 'xsmall_items',
            'edit_field_class'  => 'vc_col-sm-3 vc_carousel_item',
            'value'             => array(1,2,3,4,5,6),
            'std'               => 1,
            'group'             => esc_html__('Carousel Settings', 'sp-charityplus')
        ),
        array(
            'type'              => 'dropdown',
            'heading'           => esc_html__('Small Devices','sp-charityplus'),
            'param_name'        => 'small_items',
            'edit_field_class'  => 'vc_col-sm-3 vc_carousel_item',
            'value'             => array(1,2,3,4,5,6),
            'std'               => 1,
            'group'             => esc_html__('Carousel Settings', 'sp-charityplus')
        ),
        array(
            'type'              => 'dropdown',
            'heading'           => esc_html__('Medium Devices','sp-charityplus'),
            'param_name'        => 'medium_items',
            'edit_field_class'  => 'vc_col-sm-3 vc_carousel_item',
            'value'             => array(1,2,3,4,5,6),
            'std'               => 1,
            'group'             => esc_html__('Carousel Settings', 'sp-charityplus')
        ),
        array(
            'type'              => 'dropdown',
            'heading'           => esc_html__('Large Devices','sp-charityplus'),
            'param_name'        => 'large_items',
            'edit_field_class'  => 'vc_col-sm-3 vc_carousel_item',
            'value'             => array(1,2,3,4,5,6),
            'std'               => 1,
            'group'             => esc_html__('Carousel Settings', 'sp-charityplus')
        ),
        array(
            'type'          => 'textfield',
            'heading'       => esc_html__('Margin Items','sp-charityplus'),
            'param_name'    => 'margin',
            'value'         => '30',
            'group'         => esc_html__('Carousel Settings', 'sp-charityplus')
        ),
        array(
            'type'          => 'checkbox',
            'heading'       => esc_html__('Loop Items','sp-charityplus'),
            'param_name'    => 'loop',
            'std'           => 'false',
            'group'         => esc_html__('Carousel Settings', 'sp-charityplus')
        ),
        array(
            'type'          => 'checkbox',
            'heading'       => esc_html__('Mouse Drag','sp-charityplus'),
            'param_name'    => 'mousedrag',
            'std'           => 'true',
            'group'         => esc_html__('Carousel Settings', 'sp-charityplus')
        ),
        array(
            'type'          => 'checkbox',
            'heading'       => esc_html__('Pause On Hover','sp-charityplus'),
            'param_name'    => 'autoplayhoverpause',
            'std'           => 'true',
            'dependency'    => array(
                'element'   =>'autoplay',
                'value'     => 'true'
                ),
            'group'         => esc_html__('Carousel Settings', 'sp-charityplus')
        ),
        array(
            'type'          => 'checkbox',
            'heading'       => esc_html__('Show Next/Preview','sp-charityplus'),
            'param_name'    => 'nav',
            'std'           => 'true',
            'group'         => esc_html__('Carousel Settings', 'sp-charityplus')
        ),
        array(
            'type'          => 'checkbox',
            'heading'       => esc_html__('Show Dots','sp-charityplus'),
            'param_name'    => 'dots',
            'std'           => 'false',
            'group'         => esc_html__('Carousel Settings', 'sp-charityplus')
        ),
        array(
            'type'          => 'checkbox',
            'heading'       => esc_html__('Auto Play','sp-charityplus'),
            'param_name'    => 'autoplay',
            'std'           => 'true',
            'group'         => esc_html__('Carousel Settings', 'sp-charityplus')
        ),
        array(
            'type'          => 'textfield',
            'heading'       => esc_html__('Auto Play TimeOut','sp-charityplus'),
            'param_name'    => 'autoplaytimeout',
            'value'         => '2000',
            'dependency'    => array(
                'element'   => 'autoplay',
                'value'     => 'true'
            ),
            'group'         => esc_html__('Carousel Settings', 'sp-charityplus')
        ),
        array(
            'type'          => 'checkbox',
            'heading'       => esc_html__('Auto Height','sp-charityplus'),
            'param_name'    => 'autoheight',
            'std'           => 'true',
            'group'         => esc_html__('Carousel Settings', 'sp-charityplus')
        ),
        array(
            'type'          => 'textfield',
            'heading'       => esc_html__('Smart Speed','sp-charityplus'),
            'param_name'    => 'smartspeed',
            'value'         => '1000',
            'description'   => esc_html__('Speed scroll of each item','sp-charityplus'),
            'group'         => esc_html__('Carousel Settings', 'sp-charityplus')
        ),  
    )
));

global $cms_carousel;
$cms_carousel = array();
class WPBakeryShortCode_cms_testimonial_carousel extends CmsShortCode
{
    protected function content($atts, $content = null){
        $atts_extra = shortcode_atts(array(
            'xsmall_items'          => 1,
            'small_items'           => 1,
            'medium_items'          => 1,
            'large_items'           => 1,
            'margin'                => 30,
            'loop'                  => 'false',
            'mousedrag'             => 'true',
            'nav'                   => 'true',
            'nav_post'              => '',
            'dots'                  => 'false',
            'autoplay'              => 'true',
            'autoplaytimeout'       => '2000',
            'smartspeed'            => '1000',
            'autoplayhoverpause'    => 'true',
            /*'animate_in'            => 'slideInDown',
            'animate_out'           => 'slideOutDown',*/
            'autoheight'            => 'true'
        ), $atts);
        $atts = array_merge($atts_extra,$atts);
        global $cms_carousel;
        
        wp_enqueue_style('owl-carousel',get_template_directory_uri().'/assets/css/owl.carousel.css','','2.2.1','all');
        wp_enqueue_script('imagesloaded', '', array('jquery') ,'1.0',true);
        wp_enqueue_script('owl-carousel',get_template_directory_uri().'/assets/js/owl.carousel.min.js',array('jquery'),'2.2.1',true);
        wp_enqueue_script('owl-carousel-cms',get_template_directory_uri().'/assets/js/owl.carousel.cms.js',array('jquery'),'1.0.0',true);
        $html_id = cmsHtmlID('cms-testimonial-carousel');
        $atts['autoplaytimeout'] = isset($atts['autoplaytimeout']) ? (int)$atts['autoplaytimeout'] : 2000;
        $atts['smartspeed']      = isset($atts['smartspeed']) ? (int)$atts['smartspeed'] : 1000; 
        $nav_icon = array('<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>');
        if($atts['nav_post'] === 'nav-vertical-text') $nav_icon = array('<i class="fa fa-angle-left"></i> Prev','Next <i class="fa fa-angle-right"></i>');
        $cms_carousel[$html_id]     = array(
            'margin'                => $atts['margin'],
            'loop'                  => $atts['loop'],
            'mouseDrag'             => $atts['mousedrag'],
            'nav'                   => $atts['nav'],
            'nav_post'              => $atts['nav_post'],
            'dots'                  => $atts['dots'],
            'autoplay'              => $atts['autoplay'],
            'autoplayTimeout'       => $atts['autoplaytimeout'],
            'smartSpeed'            => $atts['smartspeed'],
            'autoplayHoverPause'    => $atts['autoplayhoverpause'],
            'navText'               => $nav_icon,
            'autoHeight'            => $atts['autoheight'],
            'responsive'    => array(
                0       => array(
                    'items' => (int)$atts['xsmall_items'],
                ),
                768     => array(
                    'items' => (int)$atts['small_items'],
                ),
                992     => array(
                    'items' => (int)$atts['medium_items'],
                ),
                1200    => array(
                    'items' => (int)$atts['large_items'],
                )
            )
        );
        wp_localize_script('owl-carousel-cms', 'cmscarousel', $cms_carousel);
        $atts['html_id'] = $html_id;
        return parent::content($atts, $content);
    }
}
?>