<?php
vc_map(array(
    'name'          => 'CMS Instagram Feed',
    'base'          => 'cms_instagram_feed',
    'icon'          => 'cs_icon_for_vc',
    'category'      => esc_html__('CmsSuperheroes Shortcodes', 'sp-charityplus'),
    'description'   => esc_html__('Show Instagram photo', 'sp-charityplus'),
    'params'        => array(
        array(
            'type'          => 'textfield',
            'param_name'    => 'name',
            'heading'       => esc_html__( 'Your name on Instagram', 'sp-charityplus' ),
            'value'         => 'charityplus',
            'holder'        => 'div'
        ),
        array(
            'type'          => 'textfield',
            'param_name'    => 'num',
            'heading'       => esc_html__( 'Number of image', 'sp-charityplus' ),
            'description'  => sprintf( esc_html__( 'You need make all config in %s before you can use this element', 'sp-charityplus' ), '<a target="_blank" href="'.admin_url('?page=sb-instagram-feed').'">' . esc_html__( 'Instagram Feed', 'sp-charityplus' ) . '</a>' ),
            'value'       => '5',
        ),
        array(
            'type'          => 'textfield',
            'param_name'    => 'cols',
            'heading'       => esc_html__( 'Number of Columns', 'sp-charityplus' ),
            'value'       => '5',
        ),
        array(
            'type'          => 'textfield',
            'param_name'    => 'el_class',
            'heading'       => esc_html__( 'Custom Class', 'sp-charityplus' ),
            'value'         => '',
        ),
    ),
));

class WPBakeryShortCode_cms_instagram_feed extends CmsShortCode
{
    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}
?>