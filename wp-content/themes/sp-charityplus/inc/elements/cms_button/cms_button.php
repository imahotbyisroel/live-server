<?php
vc_map(array(
    'name'          => 'CMS Button',
    'base'          => 'cms_button',
    'icon'          => 'cs_icon_for_vc',
    'category'      => esc_html__('CmsSuperheroes Shortcodes', 'sp-charityplus'),
    'description'   => esc_html__('Theme button style', 'sp-charityplus'),
    'params'        => array(
        
        array(
            'type'          => 'dropdown',
            'param_name'    => 'btn_align',
            'heading'       => esc_html__( 'Button Align', 'sp-charityplus' ),
            'value'         => array(
                esc_html__( 'Default', 'sp-charityplus' )  => '',
                esc_html__( 'Left', 'sp-charityplus' )     => 'text-left', 
                esc_html__( 'Right', 'sp-charityplus' )    => 'text-right',
                esc_html__( 'Center', 'sp-charityplus' )   => 'text-center',
            ),
            'std'           => '',
        ),
        array(
            'type'          => 'dropdown',
            'param_name'    => 'btn_block',
            'heading'       => esc_html__( 'Button Style', 'sp-charityplus' ),
            'value'         => array(
                esc_html__( 'Default', 'sp-charityplus' )  => '',
                esc_html__( 'Block', 'sp-charityplus' )    => 'btn-block', 
            ),
            'std'           => '',
        ),
        array(
            'type'          => 'param_group',
            'heading'       => esc_html__( 'Add Buttons', 'sp-charityplus' ),
            'param_name'    => 'values',
            'params'        => array(
                array(
                    'type'          => 'dropdown',
                    'param_name'    => 'btn_type',
                    'heading'       => esc_html__( 'Button Type', 'sp-charityplus' ),
                    'value'         => array(
                        esc_html__( 'Default', 'sp-charityplus' )     => 'btn',
                        esc_html__( 'Default Alt', 'sp-charityplus' ) => 'btn btn-alt',
                        esc_html__( 'Primary', 'sp-charityplus' )     => 'btn btn-primary',
                        esc_html__( 'Primary Alt', 'sp-charityplus' ) => 'btn btn-primary btn-alt',
                        esc_html__( 'White', 'sp-charityplus' )       => 'btn btn-white',
                        esc_html__( 'Alt White', 'sp-charityplus' )   => 'btn btn-white btn-alt',
                        esc_html__( 'Simple Link', 'sp-charityplus' ) => 'simple',
                    ),
                    'std'           => 'btn',
                    'admin_label'   => true
                ),
                array(
                    "type"          => "vc_link",
                    "heading"       => esc_html__("Choose your link",'sp-charityplus'),
                    "param_name"    => "button_link",
                    "value"         => "",
                ),
            ),
            'group'     => esc_html__('Buttons','sp-charityplus')
        )
    ),
));
if(class_exists('CmsShortCode')) {
    class WPBakeryShortCode_cms_button extends CmsShortCode {
        protected function content($atts, $content = null) {
            return parent::content($atts, $content);
        }
    }
}
?>