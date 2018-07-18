<?php
/**
 * All code here copied from VC_Custom_Heading Element
 * if need update just copy from VC version then overrite this file.
 * IMPORTANT: CharityPlus theme just added new option for add icon before title 
 * and Subtitle
 * and Description
 * @author Chinh Duong Manh
 * @since 1.0.0
*/

vc_map(array(
    'name'        => 'CMS Heading',
    'base'        => 'cms_heading',
    'icon'        => 'cs_icon_for_vc',
    'category'    => esc_html__('CmsSuperheroes Shortcodes', 'sp-charityplus'),
    'description' => esc_html__('Add Custom Heading', 'sp-charityplus'),
    'params'      => array(
        array(
            'type'       => 'dropdown',
            'heading'    => esc_html__( 'Text source', 'sp-charityplus' ),
            'param_name' => 'source',
            'value'      => array(
                esc_html__( 'Custom text', 'sp-charityplus' )        => '',
                esc_html__( 'Post or Page Title', 'sp-charityplus' ) => 'post_title',
            ),
            'std'         => '',
            'description' => esc_html__( 'Select text source.', 'sp-charityplus' ),
        ),
        array(
            'type'       => 'dropdown',
            'heading'    => esc_html__( 'Text Align', 'sp-charityplus' ),
            'param_name' => 'text_align',
            'value'      => array(
                esc_html__( 'Default', 'sp-charityplus' )      => '',
                esc_html__( 'Text Left', 'sp-charityplus' )    => 'left',
                esc_html__( 'Text Right', 'sp-charityplus' )   => 'right',
                esc_html__( 'Text Center', 'sp-charityplus' )  => 'center',
                esc_html__( 'Text Justify', 'sp-charityplus' ) => 'justify',
            ),
            'std'         => '',
            'description' => esc_html__( 'Select text alignment.', 'sp-charityplus' ),
        ),
        array(
            'type' => 'img',
            'heading' => esc_html__('Layout Mode','sp-charityplus'),
            'param_name' => 'layout_mode',
            'value' =>  array(
                '1' => get_template_directory_uri().'/vc_params/layouts/cms-heading1.png',
                '2' => get_template_directory_uri().'/vc_params/layouts/cms-heading2.png',
            ),
            'std' => '1',
        ),
        vc_map_add_css_animation(),
        array(
            'type'        => 'textfield',
            'heading'     => esc_html__( 'Extra class name', 'sp-charityplus' ),
            'param_name'  => 'el_class',
            'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'sp-charityplus' ),
        ),
        array(
            'type'        => 'textarea',
            'heading'     => esc_html__( 'Text', 'sp-charityplus' ),
            'param_name'  => 'text',
            'admin_label' => true,
            'value'       => esc_html__( 'This is CMS custom heading element', 'sp-charityplus' ),
            'description' => esc_html__( 'Note: If you are using non-latin characters be sure to activate them under Settings/Visual Composer/General Settings.', 'sp-charityplus' ),
            'dependency'  => array(
                'element'  => 'source',
                'is_empty' => true,
            ),
            'group'         => esc_html__('Title','sp-charityplus')
        ),
        array(
            'type'        => 'vc_link',
            'heading'     => esc_html__( 'URL (Link)', 'sp-charityplus' ),
            'param_name'  => 'link',
            'description' => esc_html__( 'Add link to custom heading.', 'sp-charityplus' ),
            'group'         => esc_html__('Title','sp-charityplus')
        ),
        array(
            'type'       => 'font_container',
            'param_name' => 'font_container',
            'value'      => 'tag:h2',
            'settings'   => array(
                'fields'    => array(
                    'tag'                     => 'h2',
                    'font_size'               => '',
                    'line_height'             => '',
                    'color',
                    'tag_description'         => esc_html__( 'Select element tag.', 'sp-charityplus' ),
                    'font_size_description'   => esc_html__( 'Enter font size.', 'sp-charityplus' ),
                    'line_height_description' => esc_html__( 'Enter line height.', 'sp-charityplus' ),
                    'color_description'       => esc_html__( 'Select heading color.', 'sp-charityplus' ),
                ),
            ),
            'group'         => esc_html__('Title','sp-charityplus')
        ),
       
        array(
            'type'       => 'textfield',
            'heading'    => esc_html__( 'Letter Spacing', 'sp-charityplus' ),
            'param_name' => 'letter_spacing',
            'value'         => '',
            'description' => esc_html__( 'Enter letter spacing. NOTE: Just enter the number, ex: 30 or -30', 'sp-charityplus' ),
            'group'         => esc_html__('Title','sp-charityplus')
        ),
        array(
            'type'        => 'checkbox',
            'heading'     => esc_html__( 'Use theme default font family?', 'sp-charityplus' ),
            'param_name'  => 'use_theme_fonts',
            'value'       => array( esc_html__( 'Yes', 'sp-charityplus' ) => 'yes' ),
            'std'         => 'yes',
            'description' => esc_html__( 'Use font family from the theme.', 'sp-charityplus' ),
            'group'       => esc_html__('Title','sp-charityplus')
        ),
        array(
            'type'       => 'google_fonts',
            'param_name' => 'google_fonts',
            'value'      => '',
            'settings'   => array(
                'fields' => array(
                    'font_family'             =>'Roboto Slab',
                    'font_style'              =>'300 light regular:300:normal', 
                    'font_family_description' => esc_html__( 'Select font family.', 'sp-charityplus' ),
                    'font_style_description'  => esc_html__( 'Select font styling.', 'sp-charityplus' ),
                ),
            ),
            'dependency' => array(
                'element'            => 'use_theme_fonts',
                'value_not_equal_to' => 'yes',
            ),
            'group'         => esc_html__('Title','sp-charityplus')
        ),

        array(
            'type'        => 'checkbox',
            'heading'     => esc_html__( 'Add icon ?', 'sp-charityplus' ),
            'param_name'  => 'add_icon',
            'std'         => false,
            'description' => esc_html__( 'Add a icon before the text', 'sp-charityplus' ),
            'group'       => esc_html__( 'Title', 'sp-charityplus' ),
        ),
        array(
            'type'       => 'css_editor',
            'heading'    => esc_html__( 'Custom Design', 'sp-charityplus' ),
            'param_name' => 'css_heading',
            'group'       => esc_html__('Title', 'sp-charityplus')
        ),
        array(
            'type'      => 'dropdown',
            'heading'   => esc_html__( 'Icon library', 'sp-charityplus' ),
            'value'     => array(
                esc_html__( 'Font Awesome', 'sp-charityplus' ) => 'fontawesome',
                esc_html__( 'Open Iconic', 'sp-charityplus' )  => 'openiconic',
                esc_html__( 'Typicons', 'sp-charityplus' )     => 'typicons',
                esc_html__( 'Entypo', 'sp-charityplus' )       => 'entypo',
                esc_html__( 'Linecons', 'sp-charityplus' )     => 'linecons',
                esc_html__( 'Mono Social', 'sp-charityplus' )  => 'monosocial',
            ),
            'param_name'    => 'icon_type',
            'dependency'    => array(
                'element'   => 'add_icon',
                'value'     => 'true',
            ),
            'description'   => esc_html__( 'Select icon library.', 'sp-charityplus' ),
            'group'         => esc_html__('Title Icon', 'sp-charityplus')
        ),
        array(
            'type'          => 'iconpicker',
            'heading'       => esc_html__( 'Icon Item', 'sp-charityplus' ),
            'param_name'    => 'icon_fontawesome',
            'value'         => '',
            'settings'      => array(
                'emptyIcon'     => true, // default true, display an 'EMPTY' icon?
                'type'          => 'fontawesome',
                'iconsPerPage'  => 200, // default 100, how many icons per/page to display
            ),
            'dependency'    => array(
                'element'   => 'icon_type',
                'value'     => 'fontawesome',
            ),
            'description'   => esc_html__( 'Select icon from library.', 'sp-charityplus' ),
            'group'         => esc_html__('Title Icon', 'sp-charityplus')
        ),
        array(
            'type'          => 'iconpicker',
            'heading'       => esc_html__( 'Icon Item', 'sp-charityplus' ),
            'param_name'    => 'icon_openiconic',
            'value'         => '',
            'settings'      => array(
                'emptyIcon'     => true, // default true, display an 'EMPTY' icon?
                'type'          => 'openiconic',
                'iconsPerPage'  => 200, // default 100, how many icons per/page to display
            ),
            'dependency'    => array(
                'element'   => 'icon_type',
                'value'     => 'openiconic',
            ),
            'description'   => esc_html__( 'Select icon from library.', 'sp-charityplus' ),
            'group'         => esc_html__('Title Icon', 'sp-charityplus')
        ),
        array(
            'type'         => 'iconpicker',
            'heading'      => esc_html__( 'Icon Item', 'sp-charityplus' ),
            'param_name'   => 'icon_typicons',
            'value'        => '',
            'settings'     => array(
                'emptyIcon'    => true, // default true, display an 'EMPTY' icon?
                'type'         => 'typicons',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency'   => array(
                'element'      => 'icon_type',
                'value'        => 'typicons',
            ),
            'description'  => esc_html__( 'Select icon from library.', 'sp-charityplus' ),
            'group'        => esc_html__('Title Icon', 'sp-charityplus')
        ),
        array(
            'type'         => 'iconpicker',
            'heading'      => esc_html__( 'Icon Item', 'sp-charityplus' ),
            'param_name'   => 'icon_entypo',
            'value'        => '',
            'settings'     => array(
                'emptyIcon'    => true, // default true, display an 'EMPTY' icon?
                'type'         => 'entypo',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency'   => array(
                'element'      => 'icon_type',
                'value'        => 'entypo',
            ),
            'description'  => esc_html__( 'Select icon from library.', 'sp-charityplus' ),
            'group'        => esc_html__('Title Icon', 'sp-charityplus')
        ),
        array(
            'type'         => 'iconpicker',
            'heading'      => esc_html__( 'Icon Item', 'sp-charityplus' ),
            'param_name'   => 'icon_linecons',
            'value'        => '',
            'settings'     => array(
                'emptyIcon'    => true, // default true, display an 'EMPTY' icon?
                'type'         => 'linecons',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency'   => array(
                'element'      => 'icon_type',
                'value'        => 'linecons',
            ),
            'description'  => esc_html__( 'Select icon from library.', 'sp-charityplus' ),
            'group'        => esc_html__('Title Icon', 'sp-charityplus')
        ),
        array(
            'type'         => 'iconpicker',
            'heading'      => esc_html__( 'Icon Item', 'sp-charityplus' ),
            'param_name'   => 'icon_monosocial',
            'value'        => '',
            'settings'     => array(
                'emptyIcon'    => true, // default true, display an 'EMPTY' icon?
                'type'         => 'monosocial',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency'   => array(
                'element'      => 'icon_type',
                'value'        => 'monosocial',
            ),
            'description'  => esc_html__( 'Select icon from library.', 'sp-charityplus' ),
            'group'        => esc_html__('Title Icon', 'sp-charityplus')
        ),
        array(
            'type'       => 'font_container',
            'param_name' => 'icon_font_container',
            'value'      => 'font_size:200%',
            'settings'   => array(
                'fields'    => array(
                    'font_size',
                    'color',
                    'font_size_description'   => esc_html__( 'Enter icon font size.', 'sp-charityplus' ),
                    'color_description'       => esc_html__( 'Select icon color.', 'sp-charityplus' ),
                ),
            ),
            'dependency' => array(
                'element' => 'add_icon',
                'value'   => 'true',
            ),
            'group'       => esc_html__('Title Icon', 'sp-charityplus')
        ),


        /* Sub title */
        array(
            'type'        => 'textarea',
            'heading'     => esc_html__( 'Sub text', 'sp-charityplus' ),
            'param_name'  => 'st_text',
            'admin_label' => true,
            'value'       => '',
            'description' => esc_html__( 'Note: If you are using non-latin characters be sure to activate them under Settings/Visual Composer/General Settings.', 'sp-charityplus' ),
            'group'         => esc_html__('Sub Title','sp-charityplus')
        ),
        array(
            'type'       => 'font_container',
            'param_name' => 'st_font_container',
            'value'      => 'tag:h4',
            'settings'   => array(
                'fields'    => array(
                    'tag'                     => 'h4',
                    'font_size'               => '',
                    'line_height'             => '',
                    'color',
                    'tag_description'         => esc_html__( 'Select element tag.', 'sp-charityplus' ),
                    'font_size_description'   => esc_html__( 'Enter font size.', 'sp-charityplus' ),
                    'line_height_description' => esc_html__( 'Enter line height.', 'sp-charityplus' ),
                    'color_description'       => esc_html__( 'Select heading color.', 'sp-charityplus' ),
                ),
            ),
            'group'         => esc_html__('Sub Title','sp-charityplus')
        ),
        array(
            'type'       => 'textfield',
            'heading'    => esc_html__( 'Letter Spacing', 'sp-charityplus' ),
            'param_name' => 'st_letter_spacing',
            'value'      => '',
            'description' => esc_html__( 'Enter letter spacing. NOTE: Just enter the number, ex: 30 or -30', 'sp-charityplus' ),
            'group'         => esc_html__('Sub Title','sp-charityplus')
        ),
        array(
            'type'        => 'checkbox',
            'heading'     => esc_html__( 'Use theme default font family?', 'sp-charityplus' ),
            'param_name'  => 'st_use_theme_fonts',
            'value'       => array( esc_html__( 'Yes', 'sp-charityplus' ) => 'yes' ),
            'std'         => 'yes',
            'description' => esc_html__( 'Use font family from the theme.', 'sp-charityplus' ),
            'group'         => esc_html__('Sub Title','sp-charityplus')
        ),
        array(
            'type'       => 'google_fonts',
            'param_name' => 'st_google_fonts',
            'value'      => '',
            'settings'   => array(
                'fields' => array(
                    'font_family'             =>'Roboto Slab',
                    'font_style'              =>'300 light regular:300:normal', 
                    'font_family_description' => esc_html__( 'Select font family.', 'sp-charityplus' ),
                    'font_style_description'  => esc_html__( 'Select font styling.', 'sp-charityplus' ),
                ),
            ),
            'dependency' => array(
                'element'            => 'st_use_theme_fonts',
                'value_not_equal_to' => 'yes',
            ),
            'group'         => esc_html__('Sub Title','sp-charityplus')
        ),
        array(
            'type'       => 'css_editor',
            'heading'    => esc_html__( 'CSS box', 'sp-charityplus' ),
            'param_name' => 'css_subheading',
            'group'       => esc_html__('Sub Title', 'sp-charityplus')
        ),
        /* Description */
        array(
            'type'        => 'textarea',
            'heading'     => esc_html__( 'Description text', 'sp-charityplus' ),
            'param_name'  => 'desc_text',
            'value'       => '',
            'description' => esc_html__( 'Note: If you are using non-latin characters be sure to activate them under Settings/Visual Composer/General Settings.', 'sp-charityplus' ),
            'group'         => esc_html__('Description','sp-charityplus')
        ),
        array(
            'type'       => 'font_container',
            'param_name' => 'desc_font_container',
            'value'      => 'tag:div',
            'settings'   => array(
                'fields'    => array(
                    'tag'                     => 'div',
                    'font_size'               => '',
                    'line_height'             => '',
                    'color',
                    'tag_description'         => esc_html__( 'Select element tag.', 'sp-charityplus' ),
                    'font_size_description'   => esc_html__( 'Enter font size.', 'sp-charityplus' ),
                    'line_height_description' => esc_html__( 'Enter line height.', 'sp-charityplus' ),
                    'color_description'       => esc_html__( 'Select heading color.', 'sp-charityplus' ),
                ),
            ),
            'group'         => esc_html__('Description','sp-charityplus')
        ),
        array(
            'type'       => 'textfield',
            'heading'    => esc_html__( 'Letter Spacing', 'sp-charityplus' ),
            'param_name' => 'desc_letter_spacing',
            'value'      => '',
            'description' => esc_html__( 'Enter letter spacing. NOTE: Just enter the number, ex: 30 or -30', 'sp-charityplus' ),
            'group'         => esc_html__('Description','sp-charityplus')
        ),
        array(
            'type'       => 'css_editor',
            'heading'    => esc_html__( 'CSS box', 'sp-charityplus' ),
            'param_name' => 'css_desc',
            'group'       => esc_html__('Description', 'sp-charityplus')
        ),
        
        /* Other */
        array(
            'type'       => 'css_editor',
            'heading'    => esc_html__( 'CSS box', 'sp-charityplus' ),
            'param_name' => 'css',
            'group'      => esc_html__( 'Design Options', 'sp-charityplus' ),
        ),        
    )
));

class WPBakeryShortCode_cms_heading extends CmsShortCode{
    
    /**
     * Defines fields names for google_fonts, font_container and etc
     * @since 4.4
     * @var array
     */
    protected $fields = array(
        'google_fonts'   => 'google_fonts',
        'font_container' => 'font_container',
        'st_google_fonts'   => 'st_google_fonts',
        'st_font_container' => 'st_font_container',
        'desc_font_container' => 'desc_font_container',
        'el_class'       => 'el_class',
        'css'            => 'css',
        'text'           => 'text',
        'st_text'           => 'st_text',
        'desc_text'           => 'desc_text',
        'add_icon'       => false,
        'icon_type'      => 'fontawesome',
        'icon_font_container' => 'icon_font_container',
    );

    /**
     * Used to get field name in vc_map function for google_fonts, font_container and etc..
     *
     * @param $key
     *
     * @since 4.4
     * @return bool
     */
    protected function getField( $key ) {
        return isset( $this->fields[ $key ] ) ? $this->fields[ $key ] : false;
    }

    /**
     * Get param value by providing key
     *
     * @param $key
     *
     * @since 4.4
     * @return array|bool
     */
    protected function getParamData( $key ) {
        return WPBMap::getParam( $this->shortcode, $this->getField( $key ) );
    }

    /**
     * Parses shortcode attributes and set defaults based on vc_map function relative to shortcode and fields names
     *
     * @param $atts
     *
     * @since 4.3
     * @return array
     */
    public function getAttributes( $atts ) {
        /**
         * Shortcode attributes
         * @var $text
         * @var $google_fonts
         * @var $font_container
         * @var $st_google_fonts
         * @var $st_font_container
         * @var $el_class
         * @var $link
         * @var $css
         * @var $icon_font_container
         */
        $atts = vc_map_get_attributes( $this->getShortcode(), $atts );
        extract( $atts );

        /**
         * Get default values from VC_MAP.
         **/
        $google_fonts_field = $this->getParamData( 'google_fonts' );
        $font_container_field = $this->getParamData( 'font_container' );

        $font_container_obj = new Vc_Font_Container();
        $google_fonts_obj = new Vc_Google_Fonts();
        $font_container_field_settings = isset( $font_container_field['settings'], $font_container_field['settings']['fields'] ) ? $font_container_field['settings']['fields'] : array();
        $google_fonts_field_settings = isset( $google_fonts_field['settings'], $google_fonts_field['settings']['fields'] ) ? $google_fonts_field['settings']['fields'] : array();
        $font_container_data = $font_container_obj->_vc_font_container_parse_attributes( $font_container_field_settings, $font_container );
        $google_fonts_data = strlen( $google_fonts ) > 0 ? $google_fonts_obj->_vc_google_fonts_parse_attributes( $google_fonts_field_settings, $google_fonts ) : '';
        
        /* Title Icon */
        $icon_font_container_field = $this->getParamData( 'icon_font_container' );
        $icon_font_container_field_settings = isset( $icon_font_container_field['settings'], $icon_font_container_field['settings']['fields'] ) ? $icon_font_container_field['settings']['fields'] : array();
        $icon_font_container_data = $font_container_obj->_vc_font_container_parse_attributes( $icon_font_container_field_settings, $icon_font_container );

        /* Sub Title */
        $st_google_fonts_field = $this->getParamData( 'st_google_fonts' );
        $st_font_container_field = $this->getParamData( 'st_font_container' );
        $st_font_container_obj = new Vc_Font_Container();
        $st_google_fonts_obj = new Vc_Google_Fonts();
        $st_font_container_field_settings = isset( $st_font_container_field['settings'], $st_font_container_field['settings']['fields'] ) ? $st_font_container_field['settings']['fields'] : array();
        $st_google_fonts_field_settings = isset( $st_google_fonts_field['settings'], $st_google_fonts_field['settings']['fields'] ) ? $st_google_fonts_field['settings']['fields'] : array();
        $st_font_container_data = $st_font_container_obj->_vc_font_container_parse_attributes( $st_font_container_field_settings, $st_font_container );
        $st_google_fonts_data = strlen( $st_google_fonts ) > 0 ? $st_google_fonts_obj->_vc_google_fonts_parse_attributes( $st_google_fonts_field_settings, $st_google_fonts ) : '';

        /* Description  */
        $desc_font_container_field = $this->getParamData( 'desc_font_container' );
        $desc_font_container_obj = new Vc_Font_Container();
        $desc_font_container_field_settings = isset( $desc_font_container_field['settings'], $desc_font_container_field['settings']['fields'] ) ? $desc_font_container_field['settings']['fields'] : array();
        $desc_font_container_data = $desc_font_container_obj->_vc_font_container_parse_attributes( $desc_font_container_field_settings, $desc_font_container );

        $el_class = $this->getExtraClass( $el_class );

        return array(
            'text'                     => isset( $text ) ? $text : '',
            'google_fonts'             => $google_fonts,
            'font_container'           => $font_container,
            'font_container_data'      => $font_container_data,
            'google_fonts_data'        => $google_fonts_data,

            'st_text'                     => isset( $st_text ) ? $st_text : '',
            'st_google_fonts'             => $st_google_fonts,
            'st_font_container'           => $st_font_container,
            'st_font_container_data'      => $st_font_container_data,
            'st_google_fonts_data'        => $st_google_fonts_data,

            'desc_text'                     => isset( $desc_text ) ? $desc_text : '',
            'desc_font_container'           => $desc_font_container,
            'desc_font_container_data'      => $desc_font_container_data,

            'el_class'                 => $el_class,
            'css'                      => $css,
            'link'                     => ( 0 === strpos( $link, '|' ) ) ? false : $link,
            'add_icon'                 => $add_icon,
            'icon_type'                => $icon_type,
            'icon_font_container_data' => $icon_font_container_data,
        );
    }

    /**
     * Parses google_fonts_data and font_container_data to get needed css styles to markup
     *
     * @param $el_class
     * @param $css
     * @param $google_fonts_data
     * @param $font_container_data
     * @param $icon_font_container_data
     * @param $atts
     *
     * @since 4.3
     * @return array
     */
    public function getStyles( $el_class, $css, $google_fonts_data, $font_container_data, $st_google_fonts_data, $st_font_container_data,  $desc_font_container_data, $atts, $icon_font_container_data ) {
        $styles = array();
        if ( ! empty( $font_container_data ) && isset( $font_container_data['values'] ) ) {
            foreach ( $font_container_data['values'] as $key => $value ) {
                if ( 'tag' !== $key && 'text_align' !== $key && strlen( $value ) ) {
                    if ( preg_match( '/description/', $key ) ) {
                        continue;
                    }
                    if ( 'font_size' === $key || 'line_height' === $key ) {
                        $value = preg_replace( '/\s+/', '', $value );
                    }
                    if ( 'font_size' === $key ) {
                        $pattern = '/^(\d*(?:\.\d+)?)\s*(px|\%|in|cm|mm|em|rem|ex|pt|pc|vw|vh|vmin|vmax)?$/';
                        // allowed metrics: http://www.w3schools.com/cssref/css_units.asp
                        $regexr = preg_match( $pattern, $value, $matches );
                        $value = isset( $matches[1] ) ? (float) $matches[1] : (float) $value;
                        $unit = isset( $matches[2] ) ? $matches[2] : 'px';
                        $value = $value . $unit;
                    }
                    if ( strlen( $value ) > 0 ) {
                        $styles[] = str_replace( '_', '-', $key ) . ': ' . $value;
                    }
                }
            }
        }
        if ( ( ! isset( $atts['use_theme_fonts'] ) || 'yes' !== $atts['use_theme_fonts'] ) && ! empty( $google_fonts_data ) && isset( $google_fonts_data['values'], $google_fonts_data['values']['font_family'], $google_fonts_data['values']['font_style'] ) ) {
            $google_fonts_family = explode( ':', $google_fonts_data['values']['font_family'] );
            $styles[] = 'font-family:' . $google_fonts_family[0];
            $google_fonts_styles = explode( ':', $google_fonts_data['values']['font_style'] );
            $styles[] = 'font-weight:' . $google_fonts_styles[1];
            $styles[] = 'font-style:' . $google_fonts_styles[2];
        }

        /* Sub Heading */
        $st_styles = array();
        if ( ! empty( $st_font_container_data ) && isset( $st_font_container_data['values'] ) ) {
            foreach ( $st_font_container_data['values'] as $key => $value ) {
                if ( 'tag' !== $key && 'text_align' !== $key && strlen( $value ) ) {
                    if ( preg_match( '/description/', $key ) ) {
                        continue;
                    }
                    if ( 'font_size' === $key || 'line_height' === $key ) {
                        $value = preg_replace( '/\s+/', '', $value );
                    }
                    if ( 'font_size' === $key ) {
                        $pattern = '/^(\d*(?:\.\d+)?)\s*(px|\%|in|cm|mm|em|rem|ex|pt|pc|vw|vh|vmin|vmax)?$/';
                        // allowed metrics: http://www.w3schools.com/cssref/css_units.asp
                        $regexr = preg_match( $pattern, $value, $matches );
                        $value = isset( $matches[1] ) ? (float) $matches[1] : (float) $value;
                        $unit = isset( $matches[2] ) ? $matches[2] : 'px';
                        $value = $value . $unit;
                    }
                    if ( strlen( $value ) > 0 ) {
                        $st_styles[] = str_replace( '_', '-', $key ) . ': ' . $value;
                    }
                }
            }
        }
        if ( ( ! isset( $atts['st_use_theme_fonts'] ) || 'yes' !== $atts['st_use_theme_fonts'] ) && ! empty( $st_google_fonts_data ) && isset( $st_google_fonts_data['values'], $st_google_fonts_data['values']['font_family'], $st_google_fonts_data['values']['font_style'] ) ) {
            $st_google_fonts_family = explode( ':', $st_google_fonts_data['values']['font_family'] );
            $st_styles[] = 'font-family:' . $st_google_fonts_family[0];
            $st_google_fonts_styles = explode( ':', $st_google_fonts_data['values']['font_style'] );
            $st_styles[] = 'font-weight:' . $st_google_fonts_styles[1];
            $st_styles[] = 'font-style:' . $st_google_fonts_styles[2];
        }
        /* Description */
        $desc_styles = array();
        if ( ! empty( $desc_font_container_data ) && isset( $desc_font_container_data['values'] ) ) {
            foreach ( $desc_font_container_data['values'] as $key => $value ) {
                if ( 'tag' !== $key && 'text_align' !== $key && strlen( $value ) ) {
                    if ( preg_match( '/description/', $key ) ) {
                        continue;
                    }
                    if ( 'font_size' === $key || 'line_height' === $key ) {
                        $value = preg_replace( '/\s+/', '', $value );
                    }
                    if ( 'font_size' === $key ) {
                        $pattern = '/^(\d*(?:\.\d+)?)\s*(px|\%|in|cm|mm|em|rem|ex|pt|pc|vw|vh|vmin|vmax)?$/';
                        // allowed metrics: http://www.w3schools.com/cssref/css_units.asp
                        $regexr = preg_match( $pattern, $value, $matches );
                        $value = isset( $matches[1] ) ? (float) $matches[1] : (float) $value;
                        $unit = isset( $matches[2] ) ? $matches[2] : 'px';
                        $value = $value . $unit;
                    }
                    if ( strlen( $value ) > 0 ) {
                        $desc_styles[] = str_replace( '_', '-', $key ) . ': ' . $value;
                    }
                }
            }
        }
        
        /* Icon */
        $icon_styles = array();
        if ( ! empty( $icon_font_container_data ) && isset( $icon_font_container_data['values'] ) ) {
            foreach ( $icon_font_container_data['values'] as $key => $value ) {
                if ( 'tag' !== $key && 'text_align' !== $key  && strlen( $value ) ) {
                    if ( preg_match( '/description/', $key ) ) {
                        continue;
                    }
                    if ( 'font_size' === $key  ) {
                        $value = preg_replace( '/\s+/', '', $value );
                    }
                    if ( 'font_size' === $key ) {
                        $pattern = '/^(\d*(?:\.\d+)?)\s*(px|\%|in|cm|mm|em|rem|ex|pt|pc|vw|vh|vmin|vmax)?$/';
                        // allowed metrics: http://www.w3schools.com/cssref/css_units.asp
                        $regexr = preg_match( $pattern, $value, $matches );
                        $value = isset( $matches[1] ) ? (float) $matches[1] : (float) $value;
                        $unit = isset( $matches[2] ) ? $matches[2] : 'px';
                        $value = $value . $unit;
                    }
                    if ( strlen( $value ) > 0 ) {
                        $icon_styles[] = str_replace( '_', '-', $key ) . ': ' . $value;
                    }
                }
            }
        }

        /**
         * Filter 'VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG' to change vc_custom_heading class
         *
         * @param string - filter_name
         * @param string - element_class
         * @param string - shortcode_name
         * @param array - shortcode_attributes
         *
         * @since 4.3
         */
        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'cms-heading-wrap ' . $el_class . vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

        return array(
            'css_class'   => trim( preg_replace( '/\s+/', ' ', $css_class ) ),
            'styles'      => $styles,
            'st_styles'      => $st_styles,
            'desc_styles'      => $desc_styles,
            'icon_styles' => $icon_styles,
        );
    }
}
?>