<?php

/**
 * Auto create css from Meta Options.
 * 
 * @author Chinh Duong Manh
 * @version 1.0.0
 */
class SPCharityPlus_DynamicCss
{

    function __construct()
    {
        add_action('wp_enqueue_scripts', array($this, 'generate_css'));
    }

    /**
     * generate css inline.
     *
     * @since 1.0.0
     */
    public function generate_css()
    {

        wp_enqueue_style('custom-dynamic',get_template_directory_uri() . '/assets/css/custom-dynamic.css');

        $_dynamic_css = $this->css_render();

        wp_add_inline_style('custom-dynamic', $_dynamic_css);
    }

    /**
     * header css
     *
     * @since 1.0.0
     * @return string
     */
    public function css_render()
    {
        global $spcharityplus_theme_options, $spcharityplus_meta_options; 
        ob_start();

        /* custom css. */
        if(is_page()){
            /* Page Title */
            if(isset($spcharityplus_meta_options['spcharityplus_page_title_layout']) && $spcharityplus_meta_options['spcharityplus_page_title_layout'] != '' && $spcharityplus_meta_options['spcharityplus_page_title_layout'] != 'none'){
                /* Overlay color */
                if(!empty($spcharityplus_meta_options['spcharityplus_page_title_bg_overlay'])){ 
                    $page_title_style_overlay = '#cms-page #cms-page-title-wrapper:before{';
                    $page_title_style_overlay .= 'background-color:'.$spcharityplus_meta_options['spcharityplus_page_title_bg_overlay']['rgba'].';';
                    $page_title_style_overlay .= '}';
                    echo esc_html($page_title_style_overlay);
                }
                /* background */
                if(!empty($spcharityplus_meta_options['spcharityplus_page_title_bg']['background-color']) || !empty($spcharityplus_meta_options['spcharityplus_page_title_bg']['background-image'])){
                    $page_title_style = '#cms-page #cms-page-title-wrapper{';
                    $page_title_style .= 'background-color:'.$spcharityplus_meta_options['spcharityplus_page_title_bg']['background-color'].';';
                    $page_title_style .= 'background-image:url('.$spcharityplus_meta_options['spcharityplus_page_title_bg']['background-image'].');';
                    $page_title_style .= 'background-position:'.$spcharityplus_meta_options['spcharityplus_page_title_bg']['background-position'].';';
                    $page_title_style .= 'background-size:'.$spcharityplus_meta_options['spcharityplus_page_title_bg']['background-size'].';';
                    $page_title_style .= 'background-repeat:'.$spcharityplus_meta_options['spcharityplus_page_title_bg']['background-repeat'].';';
                    $page_title_style .= 'background-attachment:'.$spcharityplus_meta_options['spcharityplus_page_title_bg']['background-attachment'].';';
                    $page_title_style .= '}';

                    echo esc_html($page_title_style);
                }
                /* Padding */
                if(!empty($spcharityplus_meta_options['spcharityplus_page_title_padding'])){
                    $page_title_style_padding = '#cms-page #cms-page-title-wrapper{';
                    if(!empty($spcharityplus_meta_options['spcharityplus_page_title_padding']['padding-top'])) $page_title_style_padding .= 'padding-top:'.$spcharityplus_meta_options['spcharityplus_page_title_padding']['padding-top'].';';
                    if(!empty($spcharityplus_meta_options['spcharityplus_page_title_padding']['padding-right'])) $page_title_style_padding .= 'padding-right:'.$spcharityplus_meta_options['spcharityplus_page_title_padding']['padding-right'].';';
                    if(!empty($spcharityplus_meta_options['spcharityplus_page_title_padding']['padding-bottom'])) $page_title_style_padding .= 'padding-bottom:'.$spcharityplus_meta_options['spcharityplus_page_title_padding']['padding-bottom'].';';
                    if(!empty($spcharityplus_meta_options['spcharityplus_page_title_padding']['padding-left'])) $page_title_style_padding .= 'padding-left:'.$spcharityplus_meta_options['spcharityplus_page_title_padding']['padding-left'].';';
                    $page_title_style_padding .= '}';
                    echo esc_html($page_title_style_padding);
                }
                /* Margin */
                if(!empty($spcharityplus_meta_options['spcharityplus_page_title_margin'])){
                    $page_title_style_margin = '#cms-page #cms-page-title-wrapper{';
                    if($spcharityplus_meta_options['spcharityplus_page_title_margin']['margin-top']!='') $page_title_style_margin .= 'margin-top:'.$spcharityplus_meta_options['spcharityplus_page_title_margin']['margin-top'].';';
                    if($spcharityplus_meta_options['spcharityplus_page_title_margin']['margin-right']!='') $page_title_style_margin .= 'margin-right:'.$spcharityplus_meta_options['spcharityplus_page_title_margin']['margin-right'].';';
                    if($spcharityplus_meta_options['spcharityplus_page_title_margin']['margin-bottom']!='') $page_title_style_margin .= 'margin-bottom:'.$spcharityplus_meta_options['spcharityplus_page_title_margin']['margin-bottom'].';';
                    if($spcharityplus_meta_options['spcharityplus_page_title_margin']['margin-left']!='') $page_title_style_margin .= 'margin-left:'.$spcharityplus_meta_options['spcharityplus_page_title_margin']['margin-left'].';';
                    $page_title_style_margin .= '}';
                    echo esc_html($page_title_style_margin);
                }
            }
            /* Footer */
            
                /* Margin */
                
                if(!empty($spcharityplus_meta_options['spcharityplus_page_footer_margin'])){
                    $page_footer_margin = '#cms-page #cms-footer{';
                    if($spcharityplus_meta_options['spcharityplus_page_footer_margin']['margin-top']!='') $page_footer_margin .= 'margin-top:'.$spcharityplus_meta_options['spcharityplus_page_footer_margin']['margin-top'].';';
                    if($spcharityplus_meta_options['spcharityplus_page_footer_margin']['margin-right']!='') $page_footer_margin .= 'margin-right:'.$spcharityplus_meta_options['spcharityplus_page_footer_margin']['margin-right'].';';
                    if($spcharityplus_meta_options['spcharityplus_page_footer_margin']['margin-bottom']!='') $page_footer_margin .= 'margin-bottom:'.$spcharityplus_meta_options['spcharityplus_page_footer_margin']['margin-bottom'].';';
                    if($spcharityplus_meta_options['spcharityplus_page_footer_margin']['margin-left']!='') $page_footer_margin .= 'margin-left:'.$spcharityplus_meta_options['spcharityplus_page_footer_margin']['margin-left'].';';
                    $page_footer_margin .= '}';
                    echo esc_html($page_footer_margin);
                }
        }
        return ob_get_clean();
    }
}

new SPCharityPlus_DynamicCss();