<?php
vc_map(array(
    'name' => 'CMS Empty Space',
    'base' => 'cms_empty_space',
    'icon' => 'cs_icon_for_vc',
    'category' => esc_html__('CmsSuperheroes Shortcodes', 'sp-charityplus'),
    'description' => esc_html__('Add custom space', 'sp-charityplus'),
    'params' => array(
        array(
            'type' => 'param_group',
            'heading' => esc_html__( 'Add Custom Screen Size', 'sp-charityplus' ),
            'param_name' => 'values',
            'value'         => urlencode( json_encode( array(
                array(
                    'screen_size' => '',
                ),
            ) ) ),
            'params' => array(
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Add your screen size', 'sp-charityplus' ),
                    'param_name' => 'screen_size',
                    'description'       => esc_html__('Enter your screen size, ex: 1920px (Note: CSS measurement units allowed).','sp-charityplus'),
                    'admin_label' => true,
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Empty space height', 'sp-charityplus' ),
                    'param_name' => 'height',
                    'description'       => esc_html__('Enter empty space height (Note: CSS measurement units allowed).','sp-charityplus'),
                ),
            ),
        ),
    ),
));

class WPBakeryShortCode_cms_empty_space extends CmsShortCode
{
    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}
?>