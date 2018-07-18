<?php
vc_map(array(
    'name'          => 'CMS Team Carousel',
    'base'          => 'cms_team_carousel',
    'icon'          => 'cs_icon_for_vc',
    'category'      => esc_html__('CmsSuperheroes Shortcodes', 'sp-charityplus'),
    'description'   => esc_html__('Add your team member', 'sp-charityplus'),
    'params'        => array(
        /* Template Settings */
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
            'type'          => 'animation_style',
            'class'         => '',
            'heading'       => esc_html__('Overlay Animation In Style','sp-charityplus'),
            'param_name'    => 'animation_in',
            'std'           => 'fadeIn',
        ),
        array(
            'type'          => 'animation_style',
            'class'         => '',
            'heading'       => esc_html__('Overlay Animation Out Style','sp-charityplus'),
            'param_name'    => 'animation_out',
            'std'           => 'fadeOut',
        ),
        /* Members Settings */
        array(
            'type'          => 'dropdown',
            'heading'       => esc_html__('Member image size','sp-charityplus'),
            'param_name'    => 'thumbnail_size',
            'value'         => spcharityplus_thumbnail_sizes(),
            'std'           => 'medium',
            'group'         => esc_html__('Members','sp-charityplus'),
        ),
        array(
            'type'          => 'textfield',
            'heading'       => esc_html__('Custom member image size','sp-charityplus'),
            'description'   => esc_html__('Alternatively enter size in pixels (Example: 200x100 (Width x Height)).','sp-charityplus'),
            'param_name'    => 'thumbnail_size_custom',
            'value'         => '',
            'group'         => esc_html__('Members','sp-charityplus'),
            'dependency'    => array(
                'element'   => 'thumbnail_size',
                'value'     => 'custom',
            ),
        ),
        array(
            'type'          => 'checkbox',
            'heading'       => esc_html__('Member image circle','sp-charityplus'),
            'param_name'    => 'thumbnail_circle',
            'std'           => 'false',
            'group'         => esc_html__('Members', 'sp-charityplus')
        ),
        array(
            'type'          => 'param_group',
            'heading'       => esc_html__( 'Add Member', 'sp-charityplus' ),
            'param_name'    => 'values',
            'params'        => array(
                array(
                    'type'          => 'attach_image',
                    'heading'       => esc_html__( 'Image', 'sp-charityplus' ),
                    'param_name'    => 'image',
                ),
                array(
                    'type'          => 'textfield',
                    'heading'       => esc_html__( 'Name', 'sp-charityplus' ),
                    'param_name'    => 'name',
                    'admin_label'   => true,
                ),
                array(
                    'type'          => 'textfield',
                    'heading'       => esc_html__( 'Position', 'sp-charityplus' ),
                    'param_name'    => 'position',
                ),
                array(
                    'type'          => 'textarea',
                    'heading'       => esc_html__( 'Description', 'sp-charityplus' ),
                    'param_name'    => 'slogan',
                ),
                array(
                    'type'          => 'param_group',
                    'heading'       => esc_html__( 'Member Social', 'sp-charityplus' ),
                    'param_name'    => 'social_values',
                    'params'        => array(
                        array(
                            'type'          => 'iconpicker',
                            'heading'       => esc_html__( 'Social icon', 'sp-charityplus' ),
                            'param_name'    => 'social_icon',
                            'admin_label'   => true,
                        ),
                        array(
                            'type'          => 'vc_link',
                            'heading'       => esc_html__( 'Enter social link', 'sp-charityplus' ),
                            'param_name'    => 'social_link',
                        ),
                    ),
                ),
                array(
                    'type'          => 'vc_link',
                    'heading'       => esc_html__( 'Link', 'sp-charityplus' ),
                    'param_name'    => 'image_link',
                    'description'   => esc_html__( 'Enter link for member.', 'sp-charityplus' ),
                ),
            ),
            'group'     => esc_html__('Members','sp-charityplus')
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
            'std'               => 2,
            'group'             => esc_html__('Carousel Settings', 'sp-charityplus')
        ),
        array(
            'type'              => 'dropdown',
            'heading'           => esc_html__('Medium Devices','sp-charityplus'),
            'param_name'        => 'medium_items',
            'edit_field_class'  => 'vc_col-sm-3 vc_carousel_item',
            'value'             => array(1,2,3,4,5,6),
            'std'               => 3,
            'group'             => esc_html__('Carousel Settings', 'sp-charityplus')
        ),
        array(
            'type'              => 'dropdown',
            'heading'           => esc_html__('Large Devices','sp-charityplus'),
            'param_name'        => 'large_items',
            'edit_field_class'  => 'vc_col-sm-3 vc_carousel_item',
            'value'             => array(1,2,3,4,5,6),
            'std'               => 4,
            'group'             => esc_html__('Carousel Settings', 'sp-charityplus')
        ),
        array(
            'type'        => 'dropdown',
            'heading'     => esc_html__('Number Row','sp-charityplus'),
            'description' => esc_html__( 'Choose number of row you want to show.', 'sp-charityplus' ),
            'param_name'  => 'number_row',
            'value'       => array(1,2,3,4,5,6,7,8,9,10),
            'std'         => 1,
            'group'       => esc_html__('Carousel Settings', 'sp-charityplus')
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
            'heading'       => esc_html__('Show Nav','sp-charityplus'),
            'param_name'    => 'nav',
            'std'           => 'false',
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
            'value'         => '500',
            'dependency'    => array(
                'element'   => 'autoplay',
                'value'     => 'true'
            ),
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
    )
));

class WPBakeryShortCode_cms_team_carousel extends CmsShortCode
{
    protected function content($atts, $content = null)
    {
        $atts_extra = shortcode_atts(array(
            'xsmall_items'          => 1,
            'small_items'           => 2,
            'medium_items'          => 3,
            'large_items'           => 4,
            'number_row'            => 1,
            'margin'                => 30,
            'loop'                  => 'false',
            'mousedrag'             => 'true',
            'nav'                   => 'false',
            'dots'                  => 'false',
            'autoplay'              => 'true',
            'autoplaytimeout'       => '500',
            'smartspeed'            => '1000',
            'autoplayhoverpause'    => 'true',
        ), $atts);
        $atts = array_merge($atts_extra,$atts);

        global $cms_carousel;
        
        wp_enqueue_style('owl-carousel',get_template_directory_uri().'/assets/css/owl.carousel.css','','2.2.1','all');
        wp_enqueue_script('imagesloaded', '', array('jquery') ,'1.0',true);
        wp_enqueue_script('owl-carousel',get_template_directory_uri().'/assets/js/owl.carousel.min.js',array('jquery'),'2.2.1',true);
        wp_enqueue_script('owl-carousel-cms',get_template_directory_uri().'/assets/js/owl.carousel.cms.js',array('jquery'),'1.0.0',true);

        $html_id = cmsHtmlID('cms-team-carousel');
        $atts['autoplaytimeout'] = isset($atts['autoplaytimeout']) ? (int)$atts['autoplaytimeout'] : 5000;
        $atts['smartspeed']      = isset($atts['smartspeed']) ? (int)$atts['smartspeed'] : 1000; 
        $cms_carousel[$html_id]  = array(
            'margin'             => $atts['margin'],
            'loop'               => $atts['loop'],
            'mouseDrag'          => $atts['mousedrag'],
            'nav'                => $atts['nav'],
            'dots'               => $atts['dots'],
            'autoplay'           => $atts['autoplay'],
            'autoplayTimeout'    => $atts['autoplaytimeout'],
            'smartSpeed'         => $atts['smartspeed'],
            'autoplayHoverPause' => $atts['autoplayhoverpause'],
            'navText'            => array('<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right "></i>'),
            'dotscontainer'      => $html_id.' .cms-dots',
            'autoHeight'         => true,
            'stagePadding'       => 5,
            'responsive'         => array(
                0 => array(
                    'items' => 1,
                ),
                480 => array(
                    'items' => (int)$atts['xsmall_items'],
                ),
                768 => array(
                    'items' => (int)$atts['small_items'],
                ),
                992 => array(
                    'items' => (int)$atts['medium_items'],
                ),
                1200 => array(
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