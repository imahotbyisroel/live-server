<?php 
    extract( shortcode_atts( array(
        'height_lg'  => '',
        'height_md' => '',
        'height_sm' => '',
        'height_xs' => '',
    ),$atts));
    $html_id = 'cms-empty-space-'.uniqid(true);
    $values = (array) vc_param_group_parse_atts( $atts['values'] );
    $pattern = '/^(\d*(?:\.\d+)?)\s*(px|\%|in|cm|mm|em|rem|ex|pt|pc|vw|vh|vmin|vmax)?$/';
    $class = $css_class = $cms_empty_space_css = '';
    foreach($values as $value){
        $screen_size = $value['screen_size'];
        $screen_size_height = $value['height'];
        if(isset($screen_size) && !empty($screen_size)){
            /* allowed metrics: http://www.w3schools.com/cssref/css_units.asp */
            /* get screen size width */
            $regexr_screen_size_width = preg_match( $pattern, $screen_size, $matches );
            $value_screen_size_width  = isset( $matches[1] ) ? (float) $matches[1] : (float) WPBMap::getParam( 'cms_empty_space', $screen_size );
            $unit_screen_size_width   = isset( $matches[2] ) ? $matches[2] : 'px';
            $screen_size_width        = $value_screen_size_width . $unit_screen_size_width;
            /* get space height on screen size */
            $regexr_screen_size_height = preg_match( $pattern, $screen_size_height, $matches );
            $value_screen_size_height  = isset( $matches[1] ) ? (float) $matches[1] : (float) WPBMap::getParam( 'cms_empty_space', $screen_size_height );
            $unit_screen_size_height   = isset( $matches[2] ) ? $matches[2] : 'px';
            $height_screen_size = $value_screen_size_height . $unit_screen_size_height;

            $class = 'w-'.$screen_size;
            $css_class .= 'w-'.$screen_size.' ';
            $height_screen_size_css = '#'.$html_id ;
            $cms_empty_space_css .= ' @media (max-width: '.$screen_size_width.'){'.$height_screen_size_css.' {height:'.$height_screen_size.';}}';
        }
    }
    
    wp_enqueue_script( 'cms_custom_css', get_template_directory_uri().'/assets/js/cms_custom_css.js', array(),'1.0.0',true );
    global $translation_array;
    if(empty($translation_array)){
        $translation_array = array();
    }
    $translation_array[$html_id] = array( 'css' => $cms_empty_space_css );
    wp_localize_script( 'cms_custom_css', 'cms_custom_css_object', $translation_array );
?>
<div id="<?php echo esc_attr($html_id);?>"  class="cms-custom-css <?php echo esc_attr($css_class);?>"></div>