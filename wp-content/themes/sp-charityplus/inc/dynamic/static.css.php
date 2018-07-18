<?php

/**
 * Auto create .css file from Theme Options
 * @author Chinh Duong Manh
 * @version 1.0.0
 */
class SPCharityPlus_StaticCss
{

    public $scss;
    
    function __construct()
    {
        if(!class_exists('scssc'))
            return;

        /* scss */
        $this->scss = new scssc();
        
        /* set paths scss */
        $this->scss->setImportPaths(get_template_directory() . '/assets/scss/');
             
        /* generate css over time */
		add_action('wp', array($this, 'generate_over_time'));
        
        /* save option generate css */
       	add_action("redux/options/spcharityplus_theme_options/saved", array($this,'generate_file'));
    }
	
    public function generate_over_time(){
    	
    	global $spcharityplus_theme_options;

    	if (!empty($spcharityplus_theme_options) && $spcharityplus_theme_options['spcharityplus_dev_mode']){
    	    $this->generate_file();
    	}
    }
    /**
     * generate css file.
     *
     * @since 1.0.0
     */
    public function generate_file()
    {
        global $spcharityplus_theme_options, $wp_filesystem;
        
        if (empty($wp_filesystem) || !isset($spcharityplus_theme_options))
            return;
            
        $options_scss = get_template_directory() . '/assets/scss/options.scss';

        /* delete files options.scss */
        $wp_filesystem->delete($options_scss);

        /* write options to scss file */
        $wp_filesystem->put_contents($options_scss, $this->css_render(), FS_CHMOD_FILE); // Save it

        /* minimize CSS styles */
        if (!$spcharityplus_theme_options['spcharityplus_dev_mode'])
            $this->scss->setFormatter('scss_formatter_compressed');

        /* compile scss to css */
        $css = $this->scss_render();

        $file = "static.css";

        $file = get_template_directory() . '/assets/css/' . $file;

        /* delete files static.css */
        $wp_filesystem->delete($file);

        /* write static.css file */
        $wp_filesystem->put_contents($file, $css, FS_CHMOD_FILE); // Save it
    }
    
    /**
     * scss compile
     * 
     * @since 1.0.0
     * @return string
     */
    public function scss_render(){
        /* compile scss to css */
        return $this->scss->compile('@import "master.scss"');
    }
    
    /**
     * main css
     *
     * @since 1.0.0
     * @return string
     */
    public function css_render()
    {
        global $spcharityplus_theme_options, $spcharityplus_meta_options;
        ob_start();

        
        switch ($spcharityplus_theme_options['spcharityplus_header_layout']) {
            case '5':
                $primary_color         = '#212325';
                $accent_color          = '#e33844';
                $btn_radius            = '3px';
                $extra_font            = 'Roboto'; 
                break;
            case '4':
                $primary_color         = '#212325';
                $accent_color          = '#8bca4e';
                $btn_radius            = '0';
                $extra_font            = 'Roboto'; 
                break;
            case '3':
                $primary_color         = '#212325';
                $accent_color          = '#fbb122';
                $btn_radius            = '3px';
                $extra_font            = 'Roboto';
                break;
            case '2':
                $primary_color         = '#212325';
                $accent_color          = '#54b551';
                $btn_radius            = '3px';
                $extra_font            = 'Roboto'; 
                break;
            
            default:
                $primary_color         = '#212325';
                $accent_color          = '#fbb122';
                $btn_radius            = '0';
                $extra_font            = 'Roboto Slab';
                break;
        }

        $accent_color_hover    = $accent_color;
        $accent_color_active   = $accent_color;
        $body_bg               = '#FFFFFF';
        $main_bg               = '#FFFFFF';
        $body_color            = '#3b3d3e'; 
        $body_font_family      = 'Roboto';
        $body_font_size        = '15px'; 
        $header_height         = '100px';
        $header_width          = '300px';
        $header_top_bg         = 'transparent';
        $logo_w                = '214px';
        $dropdown_mobile_bg    = '#FFFFFF';
        $dropdown_mobile_color = '#242729';
        
        
        /* Boxed width */
        echo '$boxed_width:'.(!empty($spcharityplus_theme_options['spcharityplus_body_width']['width']) ? esc_attr($spcharityplus_theme_options['spcharityplus_body_width']['width']) : '1200px').';';

        /* Theme Color */
        echo '$primary_color:'.(!empty($spcharityplus_theme_options['spcharityplus_primary_color']['regular']) ? esc_attr($spcharityplus_theme_options['spcharityplus_primary_color']['regular']) : $primary_color).';';
        echo '$accent_color:'.(!empty($spcharityplus_theme_options['spcharityplus_accent_color']['regular']) ? esc_attr($spcharityplus_theme_options['spcharityplus_accent_color']['regular']) : $accent_color) .';';
        /* Typography */
        echo '$extra_font:'.(!empty($spcharityplus_theme_options['spcharityplus_extra_font']['font-family']) ? esc_attr($spcharityplus_theme_options['spcharityplus_extra_font']['font-family']) : $extra_font).';';
        echo '$extra_font2:'.(!empty($spcharityplus_theme_options['spcharityplus_extra_font2']['font-family']) ? esc_attr($spcharityplus_theme_options['spcharityplus_extra_font2']['font-family']) : $body_font_family).';';
        /* BODY */
        echo '$body_color:'.(!empty($spcharityplus_theme_options['spcharityplus_font_body']['color']) ? esc_attr($spcharityplus_theme_options['spcharityplus_font_body']['color']) : $body_color).';';
        echo '$body_font_size:'.(!empty($spcharityplus_theme_options['spcharityplus_font_body']['font-size']) ? esc_attr($spcharityplus_theme_options['spcharityplus_font_body']['font-size']) : $body_font_size).';';
        echo '$body_font_family:'.(!empty($spcharityplus_theme_options['spcharityplus_font_body']['font-family']) ? esc_attr($spcharityplus_theme_options['spcharityplus_font_body']['font-family']) : $body_font_family).';';
        echo '$body_bg_color:'.(!empty($spcharityplus_theme_options['spcharityplus_body_bg']['background-color']) ? esc_attr($spcharityplus_theme_options['spcharityplus_body_bg']['background-color']) : $body_bg).';';
        /* Content area */
        echo '$content_bg_color:'.(!empty($spcharityplus_theme_options['spcharityplus_main_bg']['background-color']) ? esc_attr($spcharityplus_theme_options['spcharityplus_main_bg']['background-color']) : $main_bg).';';
        
        /* Header */
        echo '$spcharityplus_header_height:'.(!empty($spcharityplus_theme_options['spcharityplus_header_height']['height']) ? esc_attr($spcharityplus_theme_options['spcharityplus_header_height']['height']) : $header_height).';';
        echo '$spcharityplus_header_width:'.(!empty($spcharityplus_theme_options['spcharityplus_header_width']['width']) ? esc_attr($spcharityplus_theme_options['spcharityplus_header_width']['width']) : $header_width).';';
            /* Default */
            echo '$menu_default_link_color:'.(!empty($spcharityplus_theme_options['spcharityplus_header_fl_color']['regular']) ? esc_attr($spcharityplus_theme_options['spcharityplus_header_fl_color']['regular']) : $primary_color).';';
            echo '$menu_default_link_color_hover:'.(!empty($spcharityplus_theme_options['spcharityplus_header_fl_color']['hover']) ? esc_attr($spcharityplus_theme_options['spcharityplus_header_fl_color']['hover']) : $accent_color).';' ;
            echo '$menu_default_link_color_active:'.(!empty($spcharityplus_theme_options['spcharityplus_header_fl_color']['active']) ? esc_attr($spcharityplus_theme_options['spcharityplus_header_fl_color']['active']) : $accent_color_active).';';
            /* On Top */
            echo '$menu_ontop_link_color:'.(!empty($spcharityplus_theme_options['spcharityplus_header_ontop_fl_color']['regular']) ? esc_attr($spcharityplus_theme_options['spcharityplus_header_ontop_fl_color']['regular']) : '#ffffff').';';
            echo '$menu_ontop_link_color_hover:'.(!empty($spcharityplus_theme_options['spcharityplus_header_ontop_fl_color']['hover']) ? esc_attr($spcharityplus_theme_options['spcharityplus_header_ontop_fl_color']['hover']) : $accent_color).';' ;
            echo '$menu_ontop_link_color_active:'.(!empty($spcharityplus_theme_options['spcharityplus_header_ontop_fl_color']['active']) ? esc_attr($spcharityplus_theme_options['spcharityplus_header_ontop_fl_color']['active']) : $accent_color_active).';';
            /* Sticky  */
            echo '$menu_sticky_link_color:'.(!empty($spcharityplus_theme_options['spcharityplus_header_sticky_fl_color']['regular']) ? esc_attr($spcharityplus_theme_options['spcharityplus_header_sticky_fl_color']['regular']) : '#ffffff').';';
            echo '$menu_sticky_link_color_hover:'.(!empty($spcharityplus_theme_options['spcharityplus_header_sticky_fl_color']['hover']) ? esc_attr($spcharityplus_theme_options['spcharityplus_header_sticky_fl_color']['hover']) : $accent_color).';' ;
            echo '$menu_sticky_link_color_active:'.(!empty($spcharityplus_theme_options['spcharityplus_header_sticky_fl_color']['active']) ? esc_attr($spcharityplus_theme_options['spcharityplus_header_sticky_fl_color']['active']) : $accent_color_active).';';
            /* Menu Mobile */
            echo '$dropdown_bg_color:'.(!empty($spcharityplus_theme_options['spcharityplus_header_dropdown_mobile_bg']['background-color']) ? esc_attr($spcharityplus_theme_options['spcharityplus_header_dropdown_mobile_bg']['background-color']) : $dropdown_mobile_bg) .';';

            echo '$dropdown_link_color:'.(!empty($spcharityplus_theme_options['spcharityplus_header_dropdown_mobile_color']['regular']) ? esc_attr($spcharityplus_theme_options['spcharityplus_header_dropdown_mobile_color']['regular']) : $dropdown_mobile_color ) .';';
            echo '$dropdown_link_color_hover:'.(!empty($spcharityplus_theme_options['spcharityplus_header_dropdown_mobile_color']['hover']) ? $spcharityplus_theme_options['spcharityplus_header_dropdown_mobile_color']['hover'] : $accent_color).';';
            echo '$dropdown_link_color_active:'.(!empty($spcharityplus_theme_options['spcharityplus_header_dropdown_mobile_color']['active']) ? $spcharityplus_theme_options['spcharityplus_header_dropdown_mobile_color']['active'] : $accent_color_active).';';
        /* Dropdown BG */
        echo '$dropdown_bg:'.(!empty($spcharityplus_theme_options['spcharityplus_header_dropdown_mobile_bg']['color']) ? esc_attr($spcharityplus_theme_options['spcharityplus_header_dropdown_mobile_bg']['color']) : $dropdown_mobile_bg).';';
        /* Page Title */
            echo '$page_title_color:'.(!empty($spcharityplus_theme_options['spcharityplus_pagetitle_typo']['color']) ? esc_attr($spcharityplus_theme_options['spcharityplus_pagetitle_typo']['color']) : '#ffffff' ) .';';
        /* Button Default */
        echo '$btn_default_bg:'.(!empty($spcharityplus_theme_options['spcharityplus_btn_default_bg']['background-color']) ? esc_attr($spcharityplus_theme_options['spcharityplus_btn_default_bg']['background-color']) : $primary_color) .';';
        echo '$btn_default_radius:'.(!empty($spcharityplus_theme_options['spcharityplus_btn_default_border_radius']['width']) ? esc_attr($spcharityplus_theme_options['spcharityplus_btn_default_border_radius']['width']) : $btn_radius) .';';

        /* Button Primary */
        echo '$btn_primary_bg:'.(!empty($spcharityplus_theme_options['spcharityplus_btn_primary_bg']['background-color']) ? esc_attr($spcharityplus_theme_options['spcharityplus_btn_primary_bg']['background-color']) : $accent_color) .';';
        echo '$btn_primary_border:'.(!empty($spcharityplus_theme_options['spcharityplus_btn_primary_border']['border-color']) ? esc_attr($spcharityplus_theme_options['spcharityplus_btn_primary_border']['border-color']) : $accent_color) .';';
        echo '$btn_primary_radius:'.(!empty($spcharityplus_theme_options['spcharityplus_btn_primary_border_radius']['width']) ? esc_attr($spcharityplus_theme_options['spcharityplus_btn_primary_border_radius']['width']) : $btn_radius) .';';

        return ob_get_clean();
    }
}

new SPCharityPlus_StaticCss();