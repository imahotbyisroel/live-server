<?php


function spcharityplus_direction(){
    $spcharityplus_direction = is_rtl() ? 'dir-right' : 'dir-left';
    return $spcharityplus_direction;
}

/* get pull left / right for RTL language */
function spcharityplus_pull_align(){
    $spcharityplus_pull_align = is_rtl() ? 'pull-right' : 'pull-left';
    return $spcharityplus_pull_align;
}
function spcharityplus_pull_align2(){
    $spcharityplus_pull_align = is_rtl() ? 'pull-left' : 'pull-right';
    return $spcharityplus_pull_align;
}

/**
 * add theme class to body tag
 * @since 1.0.0
 * @author Chinh Duong Manh
 */
add_filter( 'body_class', 'spcharityplus_body_class' );
function spcharityplus_body_class($class=''){
    global $spcharityplus_theme_options, $spcharityplus_meta_options;
    $class[] = is_rtl() ? 'rtl' : 'ltr';
    if(is_front_page()) $class[] = 'home';

    if(!isset($spcharityplus_theme_options) || empty($spcharityplus_theme_options['spcharityplus_header_layout'])) {
        $class[] = 'cms-header-default';
    }
    /* add header layout class. */
    if($spcharityplus_theme_options['spcharityplus_header_layout'])
        $class[] = 'cms-header-'.$spcharityplus_theme_options['spcharityplus_header_layout'];
    /* add header type class. */
    if($spcharityplus_theme_options['spcharityplus_header_ontop'] && !empty($spcharityplus_theme_options['spcharityplus_header_ontop_page']) && in_array(get_the_ID(), $spcharityplus_theme_options['spcharityplus_header_ontop_page'])){
        $class[] = ' header-ontop-next-no-padding';
    } elseif ($spcharityplus_theme_options['spcharityplus_header_ontop'] && empty($spcharityplus_theme_options['spcharityplus_header_ontop_page'])) {
        $class[] = '';
    } else {
        $class[] = '';
    }
    /* Button Style defined on header layout */
    switch ($spcharityplus_theme_options['spcharityplus_header_layout']) {
        case '5':
            $class[] = 'btn-style-rounded';
            break;
        case '3':
            $class[] = 'btn-style-rounded btn-shadow';
            break;
        case '2':
            $class[] = 'btn-style-rounded btn-shadow';
            break;
        default:
            $class[] = 'btn-style-default';
            break;
    }
    /* return body class */
    return $class;

}

/**
 * Page Loading .
 * @since 1.0.0
 * @author Chinh Duong Manh
 */
function spcharityplus_page_loading() {
    global $spcharityplus_theme_options;
    if(!isset($spcharityplus_theme_options)) return; 
    if($spcharityplus_theme_options['spcharityplus_page_loading']){
        echo '<div id="cms-loading" style="height:100vh;">';
        switch ($spcharityplus_theme_options['spcharityplus_page_loading_style']){
            case '2':
                echo '<div class="spinner wave">
                  <div class="ball ball-1"></div>
                  <div class="ball ball-2"></div>
                  <div class="ball ball-3"></div>
                  <div class="ball ball-4"></div>
                </div>';
                break;
            case '3':
                echo '<div class="spinner circus">
                  <div class="ball ball-1"></div>
                  <div class="ball ball-2"></div>
                  <div class="ball ball-3"></div>
                  <div class="ball ball-4"></div>
                </div>';
                break;
            case '4':
                echo '<div class="spinner atom">
                  <div class="ball ball-1"></div>
                  <div class="ball ball-2"></div>
                  <div class="ball ball-3"></div>
                  <div class="ball ball-4"></div>
                </div>';
                break;
            case '5':
                echo '<div class="spinner fussion">
                  <div class="ball ball-1"></div>
                  <div class="ball ball-2"></div>
                  <div class="ball ball-3"></div>
                  <div class="ball ball-4"></div>
                </div>';
                break;
            case '6':
                echo '<div class="spinner mitosis">
                  <div class="ball ball-1"></div>
                  <div class="ball ball-2"></div>
                  <div class="ball ball-3"></div>
                  <div class="ball ball-4"></div>
                </div>';
                break;
            case '7':
                echo '<div class="spinner flower">
                  <div class="ball ball-1"></div>
                  <div class="ball ball-2"></div>
                  <div class="ball ball-3"></div>
                  <div class="ball ball-4"></div>
                </div>';
                break;
            case '8':
                echo '<div class="spinner clock">
                  <div class="ball ball-1"></div>
                  <div class="ball ball-2"></div>
                  <div class="ball ball-3"></div>
                  <div class="ball ball-4"></div>
                </div>';
                break;
            case '9':
                echo '<div class="spinner washing-machine">
                  <div class="ball ball-1"></div>
                  <div class="ball ball-2"></div>
                  <div class="ball ball-3"></div>
                  <div class="ball ball-4"></div>
                </div>';
                break;
            case '10':
                echo '<div class="spinner pulse">
                  <div class="ball ball-1"></div>
                  <div class="ball ball-2"></div>
                  <div class="ball ball-3"></div>
                  <div class="ball ball-4"></div>
                </div>';
                break;
            default:
                echo '<div class="spinner newton">
                  <div class="ball ball-1"></div>
                  <div class="ball ball-2"></div>
                  <div class="ball ball-3"></div>
                  <div class="ball ball-4"></div>
                </div>';
                break;
        }
        echo '</div>';
    }
}

/**
 * Page Class
 * add html class to page
 * @since 1.0.0
 * @author Chinh Duong Manh
 */
function spcharityplus_page_class($class = ''){
    global $spcharityplus_theme_options;
    $classes = array();
    $classes[] = 'cms-page';
    /* add boxed class */
    if($spcharityplus_theme_options['spcharityplus_body_layout']) $classes[] = 'cms-boxed';
    echo join(' ',$classes);
}

/**
 * get header layout.
 * @since 1.0.0
 * @author Chinh Duong Manh
 */
function spcharityplus_header_layout(){
    global $spcharityplus_theme_options, $spcharityplus_meta_options;

    if(empty($spcharityplus_theme_options)){
        get_template_part('inc/header/header', '');
        return;
    }

    if(is_page() && !empty($spcharityplus_meta_options['spcharityplus_header_layout']))
        $spcharityplus_theme_options['spcharityplus_header_layout'] = $spcharityplus_meta_options['spcharityplus_header_layout'];

    /* load custom header template. */
    get_template_part('inc/header/header', $spcharityplus_theme_options['spcharityplus_header_layout']);
}
/**
 * get header class.
 * @since 1.0.0
 * @author Chinh Duong Manh
 */
function spcharityplus_header_class($class = ''){
    global $spcharityplus_theme_options;
    $classes = array();
    $classes[] = 'cms-header';
    $ontop_page = array();
    if($spcharityplus_theme_options['spcharityplus_header_ontop']) {
        if(isset($spcharityplus_theme_options['spcharityplus_header_ontop_page'])) $ontop_page = $spcharityplus_theme_options['spcharityplus_header_ontop_page'];
        if(!isset($spcharityplus_theme_options['spcharityplus_header_ontop_page'])){
            $classes[] = 'header-ontop';
            if($spcharityplus_theme_options['spcharityplus_header_sticky']) $classes[] = 'header-ontop-sticky';
        } else {
            if(in_array(get_the_ID(), $ontop_page)) {
                $classes[] = 'header-ontop';
                if($spcharityplus_theme_options['spcharityplus_header_sticky']) $classes[] = 'header-ontop-sticky';
            } elseif (!in_array(get_the_ID(), $ontop_page)) {
                $classes[] = 'header-default';
            } elseif (empty($ontop_page)) {
                $classes[] = 'header-ontop';
                if($spcharityplus_theme_options['spcharityplus_header_sticky']) $classes[] = 'header-ontop-sticky';
            }
        }
    } 
    if($spcharityplus_theme_options['spcharityplus_header_sticky']) $classes[] = 'sticky-on';

    if(!$spcharityplus_theme_options['spcharityplus_header_ontop'] && !$spcharityplus_theme_options['spcharityplus_header_sticky']) $classes[] = 'header-default';
    $classes[] = $class;
    echo join(' ',$classes);
}

/**
 * get Header Slider .
 */
function spcharityplus_header_rev_slider() {
    global $spcharityplus_theme_options;
    if (!class_exists('RevSlider') || !$spcharityplus_theme_options['spcharityplus_show_header_slider'] || empty($spcharityplus_theme_options['spcharityplus_header_slider'])) return;
        if(empty($spcharityplus_theme_options['spcharityplus_header_slider_page'])){
    ?>
        <div class="cms-header-rev-slider">
            <?php echo do_shortcode('[rev_slider alias="'.$spcharityplus_theme_options['spcharityplus_header_slider'].'"]'); ?>
        </div>
    <?php

        } elseif(in_array(get_the_ID(), $spcharityplus_theme_options['spcharityplus_header_slider_page'])) {
    ?>
        <div class="cms-header-rev-slider">
            <?php echo do_shortcode('[rev_slider alias="'.$spcharityplus_theme_options['spcharityplus_header_slider'].'"]'); ?>
        </div>
    <?php
        }
}
/* Header top */
function spcharityplus_header_top(){
    global $spcharityplus_theme_options, $spcharityplus_meta_options;
    if (isset($spcharityplus_meta_options['spcharityplus_page_header_top']) && !empty($spcharityplus_meta_options['spcharityplus_page_header_top'])) $spcharityplus_theme_options['spcharityplus_header_top'] = $spcharityplus_meta_options['spcharityplus_page_header_top'];
    if(!$spcharityplus_theme_options['spcharityplus_header_top']) return;
?>
    <div id="cms-header-top" class="hidden-md clearfix">
        <?php 
            $cls = 'col-md-12';
            if(is_active_sidebar( 'sidebar-header-top-1') && is_active_sidebar( 'sidebar-header-top-2')) $cls = 'col-md-6';  
            if(is_active_sidebar( 'sidebar-header-top-1')) {
                echo '<div class="'.esc_attr($cls).' text-sm-center">';
                    dynamic_sidebar( 'sidebar-header-top-1');
                echo '</div>';
            }
            if(is_active_sidebar( 'sidebar-header-top-2')) {
                echo '<div class="'.esc_attr($cls).' text-sm-center text-md-right">';
                    dynamic_sidebar( 'sidebar-header-top-2');
                echo '</div>';
            }
        ?>
    </div>
<?php 
}

function spcharityplus_header_top2(){
    global $spcharityplus_theme_options, $spcharityplus_meta_options;
    if (isset($spcharityplus_meta_options['spcharityplus_page_header_top']) && !empty($spcharityplus_meta_options['spcharityplus_page_header_top'])) $spcharityplus_theme_options['spcharityplus_header_top'] = $spcharityplus_meta_options['spcharityplus_page_header_top'];
?>
    <div id="cms-header-top" class="hidden-md clearfix">
        <div class="container">
            <div class="row">
                <?php 
                    if($spcharityplus_theme_options['spcharityplus_header_top']) $_cls = 'col-md-4'; else $_cls = 'col-md-12';
                    spcharityplus_header_logo($_cls, false, false);
                    if($spcharityplus_theme_options['spcharityplus_header_top']){
                        echo '<div class="col-md-8"><div class="row">';
                            $cls = 'col-md-12';
                            if(is_active_sidebar( 'sidebar-header-top-1') && is_active_sidebar( 'sidebar-header-top-2')) $cls = 'col-md-6';  
                            if(is_active_sidebar( 'sidebar-header-top-1')) {
                                echo '<div class="'.esc_attr($cls).' text-sm-center">';
                                    dynamic_sidebar( 'sidebar-header-top-1');
                                echo '</div>';
                            }
                            if(is_active_sidebar( 'sidebar-header-top-2')) {
                                echo '<div class="'.esc_attr($cls).' text-sm-center text-md-right">';
                                    dynamic_sidebar( 'sidebar-header-top-2');
                                echo '</div>';
                            }
                        echo '</div></div>';
                    }
                ?>
            </div>
        </div>
    </div>
<?php 
}

/**
 * get theme logo.
 */
function spcharityplus_header_logo($class = '', $show_ontop_logo = true, $show_sticky_logoo =  true){
    $classes = array();
    $classes[] = 'cms-header-logo';
    $classes[] = $class; 
    global $spcharityplus_theme_options, $spcharityplus_meta_options;
    echo '<div id="cms-header-logo" class="'.join(' ',$classes).'">';
        if(isset($spcharityplus_theme_options)) {
            $logo_text = isset($spcharityplus_theme_options['spcharityplus_main_logo_text']) && !empty($spcharityplus_theme_options['spcharityplus_main_logo_text']) ? $spcharityplus_theme_options['spcharityplus_main_logo_text'] : get_bloginfo('name');
            $slogan = isset($spcharityplus_theme_options['spcharityplus_main_logo_slogan']) && !empty($spcharityplus_theme_options['spcharityplus_main_logo_slogan']) ? $spcharityplus_theme_options['spcharityplus_main_logo_slogan'] : get_bloginfo('description');
            $title = esc_html($logo_text).' - '.esc_html($slogan);

            if(is_page() && !empty($spcharityplus_meta_options['spcharityplus_page_header_layout'])) $spcharityplus_theme_options['spcharityplus_header_layout'] = $spcharityplus_meta_options['spcharityplus_page_header_layout'];

            $home = home_url('/');

            $default_logo = !empty($spcharityplus_theme_options['spcharityplus_main_logo']['url']) ? $spcharityplus_theme_options['spcharityplus_main_logo']['url'] : get_template_directory_uri() . '/assets/images/logo'.$spcharityplus_theme_options['spcharityplus_header_layout'].'.png';
            $ontop_logo = !empty($spcharityplus_theme_options['spcharityplus_header_ontop_logo']['url']) ? $spcharityplus_theme_options['spcharityplus_header_ontop_logo']['url'] : get_template_directory_uri() . '/assets/images/logo-ontop.png';
            $sticky_logo = !empty($spcharityplus_theme_options['spcharityplus_header_sticky_logo']['url']) ? $spcharityplus_theme_options['spcharityplus_header_sticky_logo']['url'] : $ontop_logo ;

            echo '<a href="' . esc_url($home) . '" title="'.esc_html($title).'" class="header-'.esc_attr($spcharityplus_theme_options['spcharityplus_header_layout']).'">';
                switch ($spcharityplus_theme_options['spcharityplus_logo_type']) {
                    case '2':
                        /* Logo Text */
                        echo '<div class="logo-text">'.esc_html($logo_text).'</div>'; 
                        echo '<div class="logo-slogan">'.esc_html($slogan).'</div>';
   
                    break;
                    
                    default:
                        /* Main Logo */
                        if(!empty($default_logo)) echo '<img class="main-logo" alt="' . esc_attr($title). '" src="' . esc_url($default_logo) . '"/>'; 
                        /* On Top Logo */
                        if(!empty($ontop_logo) && $show_ontop_logo) {
                            echo '<img class="ontop-logo" alt="' . esc_attr($title). '" src="' . esc_url($ontop_logo) . '"/>';
                        }
                        /* Sticky Logo */
                        if(!empty($sticky_logo) && $show_sticky_logoo) echo '<img class="sticky-logo" alt="' . esc_attr($title). '" src="' . esc_url($sticky_logo) . '"/>';

                    break;
                }

            echo '</a>';
        } else {
            echo '<a class="default" href="' . esc_url(home_url('/')) . '" title="'.get_bloginfo('name').' - '.get_bloginfo('description').'"><img alt="' . get_bloginfo('name'). ' - '.get_bloginfo('description').'" src="' . get_template_directory_uri() . '/assets/images/logo.png"></a>';
        }
    echo '</div>';
}

/**
 * main navigation.
 */

function spcharityplus_header_navigation($class=''){
    global $spcharityplus_theme_options, $spcharityplus_meta_options;
    if(is_page_template('page-templates/page-maintenance.php') || is_page_template('page-templates/page-comingsoon.php')) return;
    $attr = array(
        'menu_class'        => 'cms-main-navigation',
        'container_class'   => 'cms-main-navigation',
        'theme_location'    => 'primary',
        'link_before'          => '<span class="menu-title">',
        'link_after'           => '</span>',
    );
    if(!empty($spcharityplus_theme_options['spcharityplus_header_menu'])){
        $attr['menu'] = $spcharityplus_theme_options['spcharityplus_header_menu'];
    }

    if(is_page() && !empty($spcharityplus_meta_options['spcharityplus_page_header_menu']))
        $attr['menu'] = $spcharityplus_meta_options['spcharityplus_page_header_menu'];

    /* enable mega menu. */
    if(class_exists('HeroMenuWalker')){ $attr['walker'] = new HeroMenuWalker(); }

    /* main nav. */
    echo '<nav id="cms-navigation" class="cms-navigation '.esc_attr($class).'">';
        wp_nav_menu( $attr );
    echo '</nav>';
}

/**
 * Header extra attributes search, tool menu, cart, ... icon
 * @since 1.0.0
 * @author Chinh Duong Manh
*/
function spcharityplus_header_extra($class = ''){
    $classes = array();
    $classes[] = $class;
    global $spcharityplus_theme_options;
    if ($spcharityplus_theme_options['spcharityplus_show_header_search'] || (isset($spcharityplus_theme_options['spcharityplus_show_header_wc_cart']) && $spcharityplus_theme_options['spcharityplus_show_header_wc_cart']) || $spcharityplus_theme_options['spcharityplus_show_header_tool'] ) { 
        $class .= ' has-extra';
    }
    echo '<div class="cms-nav-extra '.join(' ',$classes).'">';   
        echo '<div class="cms-header-popup clearfix">';
            spcharityplus_header_extra_attr_icon();
            spcharityplus_header_search();
            spcharityplus_header_wc_cart();
            spcharityplus_header_tools();
        echo '</div>';
    echo '</div>';
}

function spcharityplus_header_extra_attr_icon(){
    global $spcharityplus_theme_options, $woocommerce;

    if(is_page_template('page-templates/page-maintenance.php') || is_page_template('page-templates/page-comingsoon.php') ) return;
    echo '<div class="cms-nav-extra-icon">';
    if (isset($spcharityplus_theme_options) && $spcharityplus_theme_options['spcharityplus_show_header_search']  ){
    ?>
        <a href="javascript:void(0)" class="header-icon cms-header-height" data-display=".cms-search" data-no-display=".cms-tools, .cms-cart, .mobile-nav"><i class="fa fa-search"></i></a>
    <?php }
    if ( isset($spcharityplus_theme_options) && in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) && $spcharityplus_theme_options['spcharityplus_show_header_wc_cart'] ) {
        $count = WC()->cart->cart_contents_count;
        $count2 =  $woocommerce->cart->get_cart_contents_count();
    ?>
        <a href="javascript:void(0)" class="header-icon cms-header-height cart" data-display=".cms-cart" data-no-display=".cms-search, .cms-tools, .mobile-nav"><i class="fa fa-shopping-cart"><span class="cart_total"><?php echo esc_attr($count2);?></span></i></a>
    <?php }

    if (isset($spcharityplus_theme_options) && $spcharityplus_theme_options['spcharityplus_show_header_tool'] && is_active_sidebar('header-tool')){
        $display = $spcharityplus_theme_options['spcharityplus_show_header_tool_screen'];
        $class = '';
        if(!in_array(1, $display)) $class .=' hidden-xs';
        if(!in_array(2, $display)) $class .=' hidden-sm';
        if(!in_array(3, $display)) $class .=' hidden-md';
        if(!in_array(4, $display)) $class .=' hidden-lg';
        
    ?>
        <a href="javascript:void(0)" class="header-icon cms-header-height <?php echo esc_attr($class); ?>" data-display=".cms-tools" data-no-display=".cms-search, .cms-cart, .mobile-nav"><span class="tool-icon"><span></span><span></span><span></span></span></a>
    <?php }
        spcharityplus_header_donation();
    
        echo '<a id="cms-menu-mobile" class="header-icon cms-header-height hidden-lg" data-display=".mobile-nav" data-no-display=".cms-search, .cms-cart, .cms-tools" ><i class="fa fa-bars" title="'.esc_html__('Open Menu','sp-charityplus').'"></i></a>';
    echo '</div>';
}

/**
 * Add header Search icon
 * @since 1.0.0
 * @author Chinh Duong Manh
 */
function spcharityplus_header_search() {
    global $spcharityplus_theme_options;
    if(!isset($spcharityplus_theme_options)) return;

    if ($spcharityplus_theme_options['spcharityplus_show_header_search']){
    ?>
        <div class="popup cms-search">
            <?php get_search_form(); ?>
        </div>
    <?php
    } 
}
/**
 * Add Header WooCommerce Cart 
 * @since 1.0.0
 * @author Chinh Duong Manh
 */
function spcharityplus_header_wc_cart() { 
    global $spcharityplus_theme_options, $woocommerce;

    if(!isset($spcharityplus_theme_options) || !class_exists('WooCommerce')) return;

    if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) && $spcharityplus_theme_options['spcharityplus_show_header_wc_cart'] ) {
        $count = WC()->cart->cart_contents_count;
        $count2 =  $woocommerce->cart->get_cart_contents_count();
    ?>
        <div class="popup woocommerce cms-cart cms-mousewheel">
            <div class="cms-mousewheel-inner widget_shopping_cart">
                <div class="widget_shopping_cart_content">
                    <?php woocommerce_mini_cart(); ?>
                </div>
            </div>
        </div>
    
    <?php
    }
}
add_filter('add_to_cart_fragments', 'spcharityplus_add_to_cart_fragment', 10, 1 );
if(!function_exists('spcharityplus_add_to_cart_fragment')){
    function spcharityplus_add_to_cart_fragment( $fragments ) {
        global $woocommerce;
        ob_start();
        ?>
        <span class="cart_total"><?php echo esc_attr($woocommerce->cart->cart_contents_count); ?></span>
        <?php
        $fragments['.cart_total'] = ob_get_clean();
        return $fragments;
    }
}

/**
 * Add Header Tools icon
 * @since 1.0.0
 * @author Chinh Duong Manh
 */
function spcharityplus_header_tools() { 
    global $spcharityplus_theme_options;
    if ($spcharityplus_theme_options['spcharityplus_show_header_tool'] && is_active_sidebar('header-tool')){
    ?>
        <div class="popup cms-tools">
            <?php dynamic_sidebar('header-tool'); ?>
        </div>
    <?php
    }
}
/**
 * Add Header Donate Button 
 * @since 1.0.0
 * @author Chinh Duong Manh
 */
function spcharityplus_header_donation(){
    global $spcharityplus_theme_options, $spcharityplus_meta_options;
    if(!class_exists('ZoDonations') || !$spcharityplus_theme_options) return;
    switch ($spcharityplus_theme_options['spcharityplus_show_header_donate']) {
        case '1':
            $url = get_permalink(get_page_by_path($spcharityplus_theme_options['spcharityplus_header_donate_url']));
            break;
        case '2':
            $url = $spcharityplus_theme_options['spcharityplus_header_donate_url2'];
            break;
        default:
            $url = '';
            break;
    }
    switch ($spcharityplus_theme_options['spcharityplus_header_layout']) {
        case '2':
            $icon = '<i class="fa fa-heart-o"></i>&nbsp;&nbsp;';
            break;
        
        default:
            $icon = '';
            break;
    }
    if (!empty($url)){
    ?>
        <span class="cms-header-height donate-btn-wrap hidden-xs hidden-sm hidden-md">
            <?php switch ($spcharityplus_theme_options['spcharityplus_header_layout']) {
                case '4':
            ?>
                <a class="btn btn-primary btn-alt" href="<?php echo esc_url($url); ?>"><?php esc_html_e('Donate Now','sp-charityplus');?></a>
            <?php
                    break;
                case '3':
            ?>
                <a class="donate-btn" href="<?php echo esc_url($url); ?>"><?php echo wp_kses_post($icon); esc_html_e('Donate Now','sp-charityplus');?></a>
            <?php
                    break;
                default:
            ?>
                <a class="btn btn-primary" href="<?php echo esc_url($url); ?>"><?php echo wp_kses_post($icon); esc_html_e('Donate Now','sp-charityplus');?></a>
            <?php break; } ?>
        </span>
        <a class="header-icon cms-header-height hidden-lg" href="<?php echo esc_url($url); ?>"><i class="fa fa-money"></i></a>
    <?php }
}

/**
 * Page Title 
 * @since 1.0.0
 * @author Chinh Duong Manh
 */
function spcharityplus_page_title(){
    global $spcharityplus_theme_options, $spcharityplus_meta_options;
    $show_page_title = $layout = '1';
    /* default. */
    
    $content_align = '';
    $option = 'no-option';
    $page_title_containter_class = 'container';
    /* get theme options */
    if(isset($spcharityplus_theme_options)){
        $option = '';
        $show_page_title = $spcharityplus_theme_options['spcharityplus_page_title'];
    } 
    if(isset($spcharityplus_theme_options['spcharityplus_page_title_layout'])){
        $layout = $spcharityplus_theme_options['spcharityplus_page_title_layout'];
    }

    if(is_page() && isset($spcharityplus_meta_options['spcharityplus_page_title_bg']['background-image']) && !empty($spcharityplus_meta_options['spcharityplus_page_title_bg']['background-image'])) {
        $spcharityplus_theme_options['spcharityplus_page_title_bg']['background-image'] =  $spcharityplus_meta_options['spcharityplus_page_title_bg']['background-image'];
    }
    if(is_page() && isset($spcharityplus_meta_options['spcharityplus_page_title_bg']['background-color']) && !empty($spcharityplus_meta_options['spcharityplus_page_title_bg']['background-color'])) {
        $spcharityplus_theme_options['spcharityplus_page_title_bg']['background-color'] =  $spcharityplus_meta_options['spcharityplus_page_title_bg']['background-color'];
    }

    /* custom layout from page. */
    if(is_page() && !empty($spcharityplus_meta_options['spcharityplus_page_title_layout'])){
        $layout = $spcharityplus_meta_options['spcharityplus_page_title_layout'];
    } 

    $page_title_class = 'layout'.$layout.' '.$content_align.' '.$option;

    if(!$show_page_title || $layout == 'none' || is_404() ) return;
    ?>
    <div id="cms-page-title-wrapper" class="cms-page-title-wrapper <?php echo esc_attr($page_title_class);?>">
        <?php 
            if(is_page()){
                //echo '<img class="img-fit" src="'.esc_url($spcharityplus_theme_options['spcharityplus_page_title_bg']['background-image']).'" alt="" />';
            }
        ?>
        <div class="<?php echo esc_attr($page_title_containter_class); ?>">
        <div class="row">
        <?php switch ($layout){
            case 'none':
                break;
            case '1':
                ?>
                <div id="cms-page-title" class="col-md-12"><?php spcharityplus_get_page_title(); ?></div>
                <?php if(!is_front_page()) { ?>
                    <div id="cms-breadcrumb" class="col-md-12"><?php spcharityplus_get_bread_crumb(); ?></div>
                <?php
                    }
                break;
            case '2':
                ?>
                <?php if(!is_front_page()) { ?>
                <div id="cms-breadcrumb" class="col-md-12"><?php spcharityplus_get_bread_crumb(); ?></div>
                <?php } ?>
                <div id="cms-page-title" class="col-md-12"><?php spcharityplus_get_page_title();  ?></div>
                <?php
                break;
            case '3':
                ?>
                <div id="cms-page-title" class="col-md-6"><?php spcharityplus_get_page_title(); ?></div>
                <?php if(!is_front_page()) { ?>
                <div id="cms-breadcrumb" class="cms-breadcrumb col-md-6 text-md-right"><?php spcharityplus_get_bread_crumb(); ?></div>
                <?php
                    }
                break;
            case '4':
                ?>
                <?php if(!is_front_page()) { ?>
                <div id="cms-breadcrumb" class="cms-breadcrumb col-md-6"><?php spcharityplus_get_bread_crumb(); ?></div>
                <?php } ?>
                <div id="cms-page-title" class="col-md-6 text-md-right"><?php spcharityplus_get_page_title(); ?></div>
                <?php
                break;
            case '5':
                ?>
                <div id="cms-page-title" class="col-md-12"><?php spcharityplus_get_page_title(); ?></div>
                <?php
                break;
            case '6':
                ?>
                <div id="cms-breadcrumb" class="col-md-12"><?php spcharityplus_get_bread_crumb(); ?></div>
                <?php
                break;
        } ?>
        </div>
        </div>
    </div><!-- #page-title -->
    <?php
}

/**
 * page title text
 */
function spcharityplus_get_page_title(){
    global $spcharityplus_theme_options, $spcharityplus_meta_options;
    $options = '';
    if(!$spcharityplus_theme_options)  $options = 'no-option';
    echo '<h3 class="cms-page-title-text page-title-text '.esc_attr($options).'">';
    if (!is_archive()){
        /* page. */
        if(is_page()) :
            /* custom title. */
            if(!empty($spcharityplus_meta_options['spcharityplus_page_title_text'])):
                echo esc_html($spcharityplus_meta_options['spcharityplus_page_title_text']);
            else :
                the_title();
            endif;
        elseif (is_front_page()):
            esc_html_e('Our Blog', 'sp-charityplus');
        /* search */
        elseif (is_search()):
            printf( esc_html__( 'Search Results for: %s', 'sp-charityplus' ), '<span>' . get_search_query() . '</span>' );
        /* 404 */
        elseif (is_404()):
            esc_html_e( '404 Page', 'sp-charityplus');
        /* Single Portfolio */
        elseif(is_singular('zkportfolio') ):
            echo esc_html__('Single Case','sp-charityplus');
         /* Single Portfolio */
        elseif(is_singular('product') ):
            echo esc_html__('Single Product','sp-charityplus');
        /* other */
        else :
            the_title();
        endif;
    } else {
        /* category. */
        if ( is_category() ) :
            single_cat_title();
        /* tag. */     
        elseif ( is_tag() ) : 
            single_tag_title();
        /* author. */
        elseif ( is_author() ) :
            printf( esc_html__( 'Author: %s', 'sp-charityplus' ), '<span class="vcard">' . get_the_author() . '</span>' );
        /* date */
        elseif ( is_day() ) :
            printf( esc_html__( 'Day: %s', 'sp-charityplus' ), '<span>' . get_the_date() . '</span>' );
        elseif ( is_month() ) :
            printf( esc_html__( 'Month: %s', 'sp-charityplus' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'sp-charityplus' ) ) . '</span>' );
        elseif ( is_year() ) :
            printf( esc_html__( 'Year: %s', 'sp-charityplus' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'sp-charityplus' ) ) . '</span>' );
        /* post format */
        elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
            esc_html_e( 'Asides', 'sp-charityplus' );
        elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
            esc_html_e( 'Galleries', 'sp-charityplus');
        elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
            esc_html_e( 'Images', 'sp-charityplus');
        elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
            esc_html_e( 'Videos', 'sp-charityplus' );
        elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
            esc_html_e( 'Quotes', 'sp-charityplus' );
        elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
            esc_html_e( 'Links', 'sp-charityplus' );
        elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
            esc_html_e( 'Statuses', 'sp-charityplus' );
        elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
            esc_html_e( 'Audios', 'sp-charityplus' );
        elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
            esc_html_e( 'Chats', 'sp-charityplus' );
        /* woocommerce */
        elseif (function_exists('is_woocommerce') && is_woocommerce()):
            woocommerce_page_title();
        /* Custom taxonomy */
        elseif(is_tax() ):
            $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
            echo esc_html($term->name);
        /* Custom Post type */
        elseif(is_post_type_archive('zkportfolio') ):
            post_type_archive_title();
        elseif(is_post_type_archive('zkservice') ):
            post_type_archive_title();
        elseif(is_post_type_archive('zkteam') ):
            post_type_archive_title();
        elseif(is_post_type_archive('zkevent') ):
            esc_html_e( 'All Events', 'sp-charityplus' );
        elseif(is_post_type_archive('zodonations') ):
            esc_html_e( 'Our Campaigns', 'sp-charityplus' );
        else :
            /* other */
            the_title();
        endif;
    }
    echo '</h3>';
}

/**
 * Breadcrumb NavXT
 *
 * @since 1.0.0
 */
function spcharityplus_get_bread_crumb() {
    if(!function_exists('bcn_display')) return;
    bcn_display();
}

/**
 * Main Class
 * add main content HTML class
 * @since 1.0.0
 * @author Chinh Duong Manh
 */
function spcharityplus_main_class($class = ''){
    $classes = array();
    $classes[] = 'cms-main container';
    $classes[] = $class;
    echo join(' ', $classes);
}

/**
 * Main Content Layout
 * define page layout
 * @since 1.0.0
 * @author Chinh Duong Manh
 */
function spcharityplus_main_content_class($sidebar = 'sidebar-1', $class = ''){
    global $spcharityplus_theme_options, $spcharityplus_meta_options;
    $classes = array();
    $classes[] = 'content-area';
    $classes[] = $class;
    if(is_active_sidebar($sidebar)){
        if(isset($spcharityplus_theme_options)){
            if(!is_archive()){
                if(is_page()){
                    $_sidebar = $spcharityplus_theme_options['spcharityplus_page_layout'];
                    if(isset($spcharityplus_meta_options['spcharityplus_page_layout']) && !empty($spcharityplus_meta_options['spcharityplus_page_layout'])){
                        $_sidebar = $spcharityplus_meta_options['spcharityplus_page_layout'];
                    }
                } elseif (is_front_page()){
                   $_sidebar = $spcharityplus_theme_options['spcharityplus_archive_layout'];
                }
                /* search */
                elseif (is_search()){
                   $_sidebar = $spcharityplus_theme_options['spcharityplus_archive_layout'];
                }
                /* 404 */
                elseif (is_404()){
                    $_sidebar = $spcharityplus_theme_options['spcharityplus_archive_layout'];
                }
                /* Single Post */
                elseif(is_singular('post') ){
                    $_sidebar = $spcharityplus_theme_options['spcharityplus_single_post_layout'];
                }
                /* Single product */
                elseif (is_singular('product') ){
                    $_sidebar = 'right';
                } else {
                    $_sidebar = 'full';
                }
            } else {
                $_sidebar = $spcharityplus_theme_options['spcharityplus_archive_layout'];
            }
        } else {
            $_sidebar = 'right';
        }
    } else {
        $_sidebar = 'full';
    }
    switch ($_sidebar) {
        case 'left':
            $classes[] = 'col-md-9 pull-right';
            break;
        case 'right':
            $classes[] = 'col-md-9'; 
            break;
        default:
            $classes[] = 'col-md-12'; 
            break;
    }
    echo join(' ',$classes);
}
function spcharityplus_main_sidebar($sidebar = 'sidebar-1'){
    global $spcharityplus_theme_options, $spcharityplus_meta_options;
    $classes = array();
    $classes[] = 'sidebar-area col-md-3';
    
    if(isset($spcharityplus_theme_options)){
        if(!is_archive()){
            if(is_page()){
                if(isset($spcharityplus_meta_options['spcharityplus_page_layout']) && !empty($spcharityplus_meta_options['spcharityplus_page_layout'])){
                    $_sidebar = $spcharityplus_meta_options['spcharityplus_page_layout'];
                } else {
                    $_sidebar = $spcharityplus_theme_options['spcharityplus_page_layout'];
                }
            } elseif (is_front_page()){
               $_sidebar = $spcharityplus_theme_options['spcharityplus_archive_layout'];
            }
            /* search */
            elseif (is_search()){
               $_sidebar = $spcharityplus_theme_options['spcharityplus_archive_layout'];
            }
            /* 404 */
            elseif (is_404()){
                $_sidebar = $spcharityplus_theme_options['spcharityplus_archive_layout'];
            }
            /* Single Post */
            elseif (is_singular('post') ){
                $_sidebar = $spcharityplus_theme_options['spcharityplus_single_post_layout'];
            } 
            /* Single Product */
            elseif (is_singular('product') ){
                $_sidebar = 'right';
            } else {
                $_sidebar = 'full';
            }
        } else {
            $_sidebar = $spcharityplus_theme_options['spcharityplus_archive_layout'];
        }
    } else {
        $_sidebar = 'right';
    }
    if($_sidebar == 'full' || !is_active_sidebar($sidebar)) return;
    ?>
    <div id="sidebar-area" class="<?php echo join(' ', $classes); ?>">
        <?php dynamic_sidebar( $sidebar ); ?>
    </div><!-- #sidebar-area -->
<?php 
}

function spcharityplus_get_sidebar(){
    global $spcharityplus_theme_options, $spcharityplus_meta_options;
    
    if(!$spcharityplus_theme_options){
        $sidebar = 'sidebar-1';
    } else {
        if(is_archive()){
            if (function_exists('is_woocommerce') && is_woocommerce()){
                $sidebar = 'sidebar-shop';
            } else {
                $sidebar = $spcharityplus_theme_options['spcharityplus_archive_sidebar'];
            }
            
        } else {
            if(is_page()){
                if(isset($spcharityplus_meta_options['spcharityplus_page_sidebar']) && !empty($spcharityplus_meta_options['spcharityplus_page_sidebar'])) {
                    $sidebar = $spcharityplus_meta_options['spcharityplus_page_sidebar'];
                } else {
                    $sidebar = $spcharityplus_theme_options['spcharityplus_page_sidebar'];
                }
            } elseif(is_front_page()){
                $sidebar = $spcharityplus_theme_options['spcharityplus_archive_sidebar'];
                if(isset($spcharityplus_meta_options['spcharityplus_archive_sidebar'])) $sidebar = $spcharityplus_meta_options['spcharityplus_archive_sidebar'];
            } elseif(is_search()){
                $sidebar = $spcharityplus_theme_options['spcharityplus_archive_sidebar'];
                if(isset($spcharityplus_meta_options['spcharityplus_archive_sidebar'])) $sidebar = $spcharityplus_meta_options['spcharityplus_archive_sidebar'];
            } elseif (is_singular('post')) {
                if(isset($spcharityplus_theme_options['spcharityplus_single_post_sidebar'])) $sidebar = $spcharityplus_theme_options['spcharityplus_single_post_sidebar'];
            } elseif (function_exists('is_woocommerce') && is_woocommerce()){
                $sidebar = 'sidebar-shop';
            } else {
                $sidebar = '';
            }
        }
    }
    return $sidebar;
}

/**
 * Display an optional archive post layout.
 */
function spcharityplus_archive_layout(){
    global $spcharityplus_theme_options;
    $layout = '';
    if(isset($spcharityplus_theme_options)){
        $layout = $spcharityplus_theme_options['spcharityplus_archive_content_layout'];
    }
    return $layout;
}


/**
 * Display an optional archice post header.
 */
function spcharityplus_archive_header($heading_tag = 'h3'){
    global $paged;
    $icon_sticky = '';
    if(is_sticky() && $paged == '0'){
        $icon_sticky = '<i class="fa fa-thumb-tack"></i>&nbsp;';
    } 
    ?>
    <header class="archive-header">
        <?php spcharityplus_archive_detail(); ?>
        <?php the_title( '<'.$heading_tag.' class="archive-title"><a href="' . esc_url( get_permalink() ) . '">'.$icon_sticky, '</a></'.$heading_tag.'>' ); ?>
    </header>
<?php 
}

 /**
 * Display an optional archice post detail.
 */
function spcharityplus_archive_detail(){
    global $spcharityplus_theme_options;
    $comment_open = comments_open();
    ?>
    <ul class="archive-meta entry-meta <?php echo spcharityplus_direction(); ?>">

        <?php if($spcharityplus_theme_options['spcharityplus_archive_post_author'] || !$spcharityplus_theme_options): ?>

            <li class="detail-author"><?php esc_html_e('By', 'sp-charityplus'); ?> <?php the_author_posts_link(); ?></li>

        <?php endif; ?>
        <?php if($spcharityplus_theme_options['spcharityplus_archive_post_date'] || !$spcharityplus_theme_options): ?>

            <li class="detail-date"><a href="<?php echo get_day_link(get_the_time('Y'),get_the_time('m'),get_the_time('d')); ?>"><?php echo get_the_date(); ?></a></li>

        <?php endif; ?>
        <?php if(has_category() && ($spcharityplus_theme_options['spcharityplus_archive_post_category'])): ?>

            <li class="detail-terms"><?php the_terms( get_the_ID(), 'category', '<i class="fa fa-folder-open-o"></i> ', ' / ' ); ?></li>

        <?php endif; ?>

        <?php if($spcharityplus_theme_options['spcharityplus_archive_post_comment']  && $comment_open): ?>
            <li class="detail-comment"><i class="fa fa-comments-o"></i> <a class="cms-scroll" href="<?php the_permalink(); ?>#comments"><?php echo esc_html(comments_number('0','1','%')); ?> <?php esc_html_e('Comments', 'sp-charityplus'); ?></a></li>
        <?php endif; ?>
        <?php if($spcharityplus_theme_options['spcharityplus_archive_post_view']) : ?><li class="entry-view"><?php echo spcharityplus_get_post_views(get_the_ID(), true); ?></li><?php endif; ?>
        <?php if($spcharityplus_theme_options['spcharityplus_archive_post_like']) : ?><li class="entry-like"><?php post_favorite('', esc_html__('likes','sp-charityplus'), true);?></li><?php endif; ?>
        <?php edit_post_link(esc_html__('Edit','sp-charityplus'),'<li class="detail-edit"><i class="zmdi zmdi-edit"></i>','</a>','',''); ?>
        <?php if($spcharityplus_theme_options['spcharityplus_archive_post_share']) : ?><li class="entry-share <?php echo spcharityplus_pull_align2(); ?>"><?php spcharityplus_post_share(false,'','','left'); ?></li><?php endif; ?>
    </ul>
    <?php
}

function spcharityplus_post_meta_list($show_author = '', $show_date = '',  $show_category = '', $show_comment = '', $show_view = '', $show_like = '', $show_share = '', $class = 'archive-meta'){
    global $spcharityplus_direction, $spcharityplus_pull_align;
    $comment_open = comments_open();
    $post_type = get_post_type();
    $taxo = '';
    switch ($post_type) {
        case 'zkportfolio':
            $taxo = 'zkportfolio_cat';
            break;
        case 'zkevent':
            $taxo = 'zkvent_cat';
            break;
        case 'zkcharixyemail':
            $taxo = '';
            break;
        case 'zodonations':
            $taxo = 'zodonationcategory';
            break;
        case 'product':
            $taxo = 'product_cat';
            break;
        default:
            $taxo = 'category';
            break;
    }
?>
    <?php if($show_author || $show_date || $show_category || $show_comment || $show_view || $show_like || $show_share) : ?>
    <ul class="entry-meta  <?php echo esc_attr($class.' '.spcharityplus_direction());?>">
        <?php if($show_author) : ?>
            <li class="detail-author"><?php esc_html_e('By', 'sp-charityplus'); ?> <?php the_author_posts_link(); ?></li>
        <?php endif; ?>
        <?php if($show_date) : ?>
        <li class="detail-date"><?php spcharityplus_post_meta_archive_date_url();?></li>
        <?php endif; ?>
        <?php if($show_category) the_terms( get_the_ID(), $taxo , '<li class="detail-categories">', ' / ','</li>' ); ?>
        <?php if($show_comment && $comment_open) : ?>
        <li class="detail-comment"><a class="cms-scroll" href="<?php the_permalink(); ?>#comments"><?php echo esc_html(comments_number('0','1','%')); ?> <?php esc_html_e('Comments', 'sp-charityplus'); ?></a></li>
        <?php endif; ?>
        <?php if($show_view) : ?><li class="entry-view"><?php echo spcharityplus_get_post_views(get_the_ID(), true); ?></li><?php endif; ?>
        <?php if($show_like) : ?><li class="entry-like"><?php post_favorite('', esc_html__('likes','sp-charityplus'), true);?></li><?php endif; ?>
        <?php edit_post_link(esc_html__('Edit','sp-charityplus'),'<li class="detail-edit"><i class="zmdi zmdi-edit"></i>','</a>','',''); ?>
        <?php if($show_share) : ?><li class="entry-share <?php echo spcharityplus_pull_align2(); ?>"><?php spcharityplus_post_share(false,'','','left'); ?></li><?php endif; ?>

    </ul>
    <?php endif; ?>
<?php
}

function spcharityplus_post_meta_archive_date_url($echo = true, $link = true){   
    $post_type = get_post_type();
    $date = $archive_date_url = ''; 
    switch ($post_type) {
        case 'zkportfolio':
            $archive_date_url = '?post_type=zkportfolio&m='.get_the_time('Y').get_the_time('m').get_the_time('d');
            break;
        case 'product':
            $taxo = 'product_cat';
            $archive_date_url = '?post_type=product&m='.get_the_time('Y').get_the_time('m').get_the_time('d');
            break;
        default:
            $archive_date_url = get_day_link(get_the_time('Y'),get_the_time('m'),get_the_time('d'));
            break;
    }
    if($echo){
        if($link) echo '<a href="'.esc_url($archive_date_url).'">';
        echo get_the_date(get_option('date_format'));
        if($link) echo '</a>';
    } else {
        if($link) $date .= '<a href="'.esc_url($archive_date_url).'">';
        $date  .= get_the_date(get_option('date_format'));
        if($link) $date .= '</a>';
        return $date;
    }
}

/**
 * Display post share icon
 * 
 * @author Chinh Duong Manh
 * @since 1.0.0
 */
function spcharityplus_post_share($show_title = true, $before='', $after='', $pos = 'right'){
        global $post, $spcharityplus_theme_options;
        $url = get_the_permalink();
        $attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full', false);
        $image = esc_attr($attachment_image[0]);
        $title = get_the_title();
        if($spcharityplus_theme_options['spcharityplus_archive_post_share'] || $spcharityplus_theme_options['spcharityplus_single_post_share']){
        echo wp_kses_post($before);
    ?>
        <a tabindex="0" role="button" data-toggle="popover" data-trigger="focus" title="<?php esc_html_e('Share this post to ?','sp-charityplus'); ?>" data-content='<?php spcharityplus_post_share_content(); ?>' data-html="true" data-placement="<?php echo esc_attr($pos); ?>"><i class="accent-color zmdi zmdi-share"></i><?php if($show_title) : ?><span class="share-title"><?php esc_html_e('Share this','sp-charityplus'); ?></span><?php endif; ?></a>        

    <?php 
        echo wp_kses_post($after);
    }  
}

function spcharityplus_post_share_content(){
    global $post;
    $url = get_the_permalink();
    $attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full', false);
    $image = esc_attr($attachment_image[0]);
    $title = get_the_title();
    ?>
    <ul class="entry-socials-share-list list-inline clearfix">
        <li>
            <a class="twitter" title="<?php esc_html_e('Share this article to Twitter','sp-charityplus'); ?>"  target="_blank" href="https://twitter.com/home?status=<?php echo esc_html__('Check out this article','sp-charityplus');?>:%20<?php echo esc_attr($title);?>%20-%20<?php echo esc_url($url);?>">
                <i class="fa fa-twitter"></i>
            </a>
        </li>
        <li>
            <a class="facebook" title="<?php esc_html_e('Share this article to Facebook','sp-charityplus'); ?>" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url($url);?>">
                <i class="fa fa-facebook"></i>
            </a>
        </li>
        
        <li>
            <a class="google-plus" title="<?php esc_html_e('Share this article to GooglePlus','sp-charityplus'); ?>" target="_blank" href="https://plus.google.com/share?url=<?php echo esc_url($url);?>">
                <i class="fa fa-google-plus"></i>
            </a>
        </li>
        <li>
            <a class="linkedin" title="<?php esc_html_e('Share this article to Linkedin','sp-charityplus'); ?>" target="_blank" href="https://linkedin.com/shareArticle?url=<?php echo esc_url($url);?>">
                <i class="fa fa-linkedin"></i>
            </a>
        </li>
    </ul>
<?php
}

function spcharityplus_post_share_list(){
    global $post;
    $url = get_the_permalink();
    $attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full', false);
    $image = esc_attr($attachment_image[0]);
    $title = get_the_title();
    ?>
    <ul class="cms-social horizontal colored circle list-unstyled clearfix">
        <li>
            <a class="facebook" title="<?php esc_html_e('Share this article to Facebook','sp-charityplus'); ?>" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url($url);?>&t=<?php echo esc_html($title); ?>">
                <i class="fa fa-facebook"></i>
            </a>
        </li>
        <li>
            <a class="twitter" title="<?php esc_html_e('Share this article to Twitter','sp-charityplus'); ?>"  target="_blank" href="https://twitter.com/home?status=<?php echo esc_html__('Check out this article','sp-charityplus');?>:%20<?php echo esc_attr($title);?>%20-%20<?php echo esc_url($url);?>">
                <i class="fa fa-twitter"></i>
            </a>
        </li>
        
        <li>
            <a class="google-plus" title="<?php esc_html_e('Share this article to GooglePlus','sp-charityplus'); ?>" target="_blank" href="https://plus.google.com/share?url=<?php echo esc_url($url);?>">
                <i class="fa fa-google-plus"></i>
            </a>
        </li>
        <li>
            <a class="linkedin" title="<?php esc_html_e('Share this article to Linkedin','sp-charityplus'); ?>" target="_blank" href="https://linkedin.com/shareArticle?url=<?php echo esc_url($url);?>">
                <i class="fa fa-linkedin"></i>
            </a>
        </li>
        <li>
            <a class="pinterest" title="<?php esc_html_e('Share this article to Pinterest','sp-charityplus'); ?>" target="_blank" href="https://www.pinterest.com/pin/create/bookmarklet/?media=<?php echo esc_url($image);?>&url=<?php echo esc_url($url);?>&title=<?php echo esc_html($title);?>&description=<?php echo get_the_excerpt();?>">
                <i class="fa fa-pinterest"></i>
            </a>
        </li>
    </ul>
<?php
}

function spcharityplus_max_charlength($text = '', $charlength = '', $show_tip = false) {
    $charlength++;
    if ( mb_strlen( $text ) > $charlength ) {
        $subex = mb_substr( $text, 0, $charlength ); 
        $exwords = explode( ' ', $subex );
        $excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
        if ( $excut < 0 ) {
            echo mb_substr( $subex, 0, $excut );
        } else {
            echo esc_html($subex);
        }
        if($show_tip) echo '...';
    } else {
        echo esc_html($text);
    }
}
/**
 * Change default character lenght of the_excerpt().
 * the_excerpt
 */
function spcharityplus_excerpt_max_charlength($charlength, $show_tip = false) {
    $excerpt = get_the_excerpt();
    $charlength++;
    if ( mb_strlen( $excerpt ) > $charlength ) {
        $subex = mb_substr( $excerpt, 0, $charlength ); 
        $exwords = explode( ' ', $subex );
        $excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
        if ( $excut < 0 ) {
            echo mb_substr( $subex, 0, $excut );
        } else {
            echo esc_html($subex);
        }
        if($show_tip) echo '...';
    } else {
        echo esc_html($excerpt);
    }
}
/**
 * Display an optional post excerpt.
 * the_excerpt
 * add_filter( 'excerpt_length', 'spcharityplus_excerpt_length', 1 );
 */
function spcharityplus_post_excerpt($charlength = 210, $show_tip = false, $class = ''){
    $post_format = get_post_format();
    if($post_format === 'link') return;
    ?>
    <div class="archive-summary <?php echo esc_attr($class);?>"><?php spcharityplus_excerpt_max_charlength($charlength, $show_tip); ?></div>
    <?php
}
function spcharityplus_excerpt_length() {
    return 100;
}


/**
 * Get shortcode from content.
 * @since 1.0.0
 * @author Chinh Duong Manh
 */
function spcharityplus_getShortcodeFromContent($shortcode = '', $content = ''){
    
    preg_match("/\[".$shortcode."(.*)/", $content , $matches);
    
    return !empty($matches[0]) ? $matches[0] : null ;
}

/**
 * Display an optional post video.
 * @since 1.0.0
 * @author Chinh Duong Manh
 */
function spcharityplus_post_video($size = 'large', $default_thumb = false) {
    global $spcharityplus_theme_options, $spcharityplus_meta_options, $wp_embed;
    $content = apply_filters( 'the_content', get_the_content() );
    $media = $video = false;
    /* Get video playlist in content */
    $playlists = has_shortcode(get_the_content(), 'playlist');
    if($playlists){
        $playlist = spcharityplus_getShortcodeFromContent('playlist',get_the_content());
        $media = apply_filters( 'the_content', $playlist );
    } else {
        /* Only get video from the content if a playlist isn't present. */
        if ( false === strpos( $content, 'wp-playlist-script' ) ) {
            $video = get_media_embedded_in_content( $content, array( 'video', 'object', 'embed', 'iframe') );
        }
        if(!empty($video)) $media = $video[0];
    }
    /* no video. */
    if(empty($spcharityplus_meta_options['opt-video-type']) && empty($media)) {
        spcharityplus_post_thumbnail($size, $default_thumb);
        return;
    }

    /* has video */
    if(empty($spcharityplus_meta_options['opt-video-type'])){
       if(! empty( $media ) && !is_singular('post')) echo '<div class="entry-media entry-video video-in-content">'.balanceTags($media).'</div>';
    } else {
        echo '<div class="entry-media entry-video">';
            if($spcharityplus_meta_options['opt-video-type'] == 'local'){
                if(!empty($spcharityplus_meta_options['otp-video-local']['id'])){
                    $video = wp_get_attachment_metadata($spcharityplus_meta_options['otp-video-local']['id']);
                    $poster = !empty($spcharityplus_meta_options['otp-video-thumb']['url']) ? $spcharityplus_meta_options['otp-video-thumb']['url'] : $spcharityplus_meta_options['otp-video-local']['thumbnail'];
                    if(isset($video['audio'])){
                        echo do_shortcode('[playlist type="video" tracklist="false" ids="'.$spcharityplus_meta_options['otp-video-local']['id'].'"]');
                    } else {
                        $atts = array(
                            'src'    => esc_url($spcharityplus_meta_options['otp-video-local']['url']),
                            'poster' => esc_url($poster),
                            'width'  => esc_attr($spcharityplus_meta_options['otp-video-local']['width']),
                            'height' => esc_attr($spcharityplus_meta_options['otp-video-local']['height'])
                        );
                        echo wp_video_shortcode($atts);
                    }
                    
                } elseif(! empty( $media )) {
                    echo balanceTags($media);
                } else {
                    spcharityplus_post_thumbnail($size, $default_thumb,'','');
                }
                
            } elseif ($spcharityplus_meta_options['opt-video-type'] == 'youtube'){
                if(!empty($spcharityplus_meta_options['opt-video-youtube'])) {
                    echo do_shortcode($wp_embed->run_shortcode('[embed]'.esc_url($spcharityplus_meta_options['opt-video-youtube']).'[/embed]'));
                } elseif(! empty( $media )) {

                    echo balanceTags($media);
                } else {
                    spcharityplus_post_thumbnail($size, $default_thumb,'','');
                }
            } elseif ($spcharityplus_meta_options['opt-video-type'] == 'vimeo'){
                if(!empty($spcharityplus_meta_options['opt-video-vimeo'])) {
                    echo do_shortcode($wp_embed->run_shortcode('[embed]'.esc_url($spcharityplus_meta_options['opt-video-vimeo']).'[/embed]'));
                } elseif(! empty( $media )) {
                    echo balanceTags($media);
                } else {
                    spcharityplus_post_thumbnail($size, $default_thumb,'','');
                }
            }
        echo '</div>';
    }
}

/**
 * Display an optional post audio.
 * @since 1.0.0
 * @author Chinh Duong Manh
 */
function spcharityplus_post_audio($size = 'large', $default_thumb = false, $before = '<div class="entry-media entry-audio">', $after = '</div>') {
    global $spcharityplus_theme_options, $spcharityplus_meta_options;
    $content = apply_filters( 'the_content', get_the_content() );
    $audio = $media = $audio_opt = false;
    /* Get audio playlist in content */
    $playlists = has_shortcode(get_the_content(), 'playlist');
    /* get SoundCloud Shortcode */
    $soundcloud = spcharityplus_getShortcodeFromContent('soundcloud', get_the_content());
    if($playlists){
        $playlist = spcharityplus_getShortcodeFromContent('playlist',get_the_content());
        $media = apply_filters( 'the_content', $playlist );
    } else {
        /* Only get audio from the content if a playlist isn't present. */
        if ( false === strpos( $content, 'wp-playlist-script' ) ) {
            $audio = get_media_embedded_in_content( $content, array( 'audio') );
        }
        if(!empty($audio)) $media = $audio[0];
    }
    
    /* no audio. */
    if(empty($spcharityplus_meta_options['otp-audio']['id']) && empty($media) && empty($soundcloud)) {
        spcharityplus_post_thumbnail($size, $default_thumb);
        return;
    }
    if(isset($spcharityplus_meta_options['otp-audio'])){
        $audio_opt = wp_get_attachment_metadata($spcharityplus_meta_options['otp-audio']['id']);
    }
   
    if(empty($audio_opt)){
        if(!is_singular('post')){
            if($soundcloud) {
                echo wp_kses_post($before).do_shortcode($soundcloud).wp_kses_post($after);
            } elseif(! empty( $media )){
                echo balanceTags($before.$media.$after);
            }
        }
         
    } else {
        echo ''.$before;
            if(!empty($spcharityplus_meta_options['otp-audio']['id'])){
                if(isset($audio_opt['fileformat'])) {
                    switch ($audio_opt['fileformat']) {
                        case 'mp3':
                            $atts = array(
                                'src'    => esc_url($spcharityplus_meta_options['otp-audio']['url']),
                            );
                            echo wp_audio_shortcode($atts);
                            break;
                        case 'ogg':
                            $atts = array(
                                'src'    => esc_url($spcharityplus_meta_options['otp-audio']['url']),
                            );
                            echo wp_audio_shortcode($atts);
                            break;
                        default:
                            if(isset($audio_opt['audio'])){
                                echo do_shortcode('[playlist type="video" tracklist="false" ids="'.$spcharityplus_meta_options['otp-audio']['id'].'"]');
                            } else {
                                $atts = array(
                                    'src'    => esc_url($spcharityplus_meta_options['otp-audio']['url']),
                                    'poster' => esc_url($spcharityplus_meta_options['otp-audio']['thumbnail']),
                                    'width'  => esc_attr($spcharityplus_meta_options['otp-audio']['width']),
                                    'height' => esc_attr($spcharityplus_meta_options['otp-audio']['height'])
                                );
                                echo wp_video_shortcode($atts);
                            }
                            
                            break;
                    }
                } else {
                    echo '<img src="'.esc_url($spcharityplus_meta_options['otp-audio']['url']).'" alt="'.get_the_title().'" />';
                } 
            }
        echo ''.$after;
    }
}

/**
 * Display an optional post gallery.
 * @since 1.0.0
 * @author Chinh Duong Manh
 */
function spcharityplus_post_gallery($size = 'large', $default_thumb = false){
    global $spcharityplus_theme_options, $spcharityplus_meta_options;
    /* Get the gallery in content */
    $gallery_default = get_post_gallery();
    
    $post_type = get_post_type();
    switch ($post_type) {
        case 'zkgallery':
            $gallery_opt = isset($spcharityplus_meta_options['spcharityplus_gallery_gallery_img']) ? $spcharityplus_meta_options['spcharityplus_gallery_gallery_img'] : array();
            break;
        default:
            $gallery_opt = isset($spcharityplus_meta_options['opt-gallery']) ? $spcharityplus_meta_options['opt-gallery'] : array();
            break;
    }
    /* no gallery. */
    if(empty($gallery_opt) && empty($gallery_default)) {
        spcharityplus_post_thumbnail($size, $default_thumb);
        return;
    }
    if(empty($gallery_opt)){
       if(!is_singular('post')) echo '<div class="entry-media entry-gallery gallery-in-content">'.get_post_gallery().'</div>';
    } else {
        $array_id = explode(",", $gallery_opt);
         /* Load Pretty Photo (default of VC) */
        wp_enqueue_script('prettyphoto');
        wp_enqueue_style('prettyphoto');
        ?>
        <div id="carousel-<?php the_ID();?>" class="entry-media carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <?php $i = 0; ?>
                <?php foreach ($array_id as $image_id): ?>

                    <?php
                    $attachment_image = wp_get_attachment_image_src($image_id, $size, false);
                    if (function_exists('wpb_getImageBySize')){
                        $img = wpb_getImageBySize( array( 'attach_id' => $image_id, 'thumb_size' => $size ) );
                        $thumbnail = $img['thumbnail'];
                        $large_img_src = $img['p_img_large'][0]; 
                    } else {
                        $thumbnail = '<img src="'.$attachment_image[0].'" alt="" />';
                        $large_img_src = $attachment_image[0];
                    }
                    
                    
                    if($attachment_image[0] != ''):?>
                        <a class="item prettyphoto <?php if( $i == 0 ){ echo 'active'; } ?>" href="<?php echo esc_url($large_img_src);?>" data-gal="prettyPhoto[rel-<?php the_ID();?>]">
                            <?php echo wp_kses_post($thumbnail); ?>
                        </a>
                    <?php 
                    if($i==0) 
                    $i++; endif; ?>
                <?php endforeach; ?>
            </div>
            <a class="left carousel-control" href="#carousel-<?php the_ID();?>" role="button" data-slide="prev">
                <span class="fa fa-angle-left"></span>
            </a>
            <a class="right carousel-control" href="#carousel-<?php the_ID();?>" role="button" data-slide="next">
                <span class="fa fa-angle-right"></span>
            </a>
        </div>
        <?php
    }
}

/**
 * Display an optional post quote.
 * @since 1.0.0
 * @author Chinh Duong Manh
 */
function spcharityplus_post_quote($size = 'large', $default_thumb = true) {
    global $spcharityplus_theme_options, $spcharityplus_meta_options;
    $content_quote = $spcharityplus_quote = '';
    /* get quote in content */
    preg_match('/\<blockquote\>(.*)\<\/blockquote\>/s', get_the_content(), $content_blockquote);
    if(!empty($content_blockquote)) $content_quote = $content_blockquote[0];
    /* get quote from meta */
    if(isset($spcharityplus_meta_options['opt-quote-content']) && !empty($spcharityplus_meta_options['opt-quote-content'])) $spcharityplus_quote = $spcharityplus_meta_options['opt-quote-content'];

    if(empty($content_quote) && empty($spcharityplus_quote)){
        spcharityplus_post_thumbnail($size, $default_thumb);
        return;
    }

    $thumbnail_url = get_the_post_thumbnail_url( '', $size );
    $styles = array();
    if($thumbnail_url) {
        $styles[] = 'background-image:url('.esc_url($thumbnail_url).')';
    } else {
        $styles[] = 'background-image:url('.esc_url(get_template_directory_uri().'/assets/images/no-image.jpg').')';
    }
    if ( ! empty( $styles ) ) {
        $style = 'style="' . esc_attr( implode( ';', $styles ) ) . '"';
    } else {
        $style = '';
    }
    /* has quote */
    $quote_title = !empty($spcharityplus_meta_options['opt-quote-title']) ? ' <cite>'.esc_html($spcharityplus_meta_options['opt-quote-title']).'</cite>' : '';
    if(empty($spcharityplus_quote)){
        if($content_quote) {
            echo '<div class="entry-media entry-quote text-center color-white" ' . $style . '><div class="entry-quote-inner">';
                echo wp_kses_post($content_quote);
            echo '</div></div>';
        }
    } else {
       echo '<div class="entry-media entry-quote text-center color-white" ' . $style . '><div class="entry-quote-inner">';
        echo '<blockquote>'.esc_html($spcharityplus_quote).wp_kses_post($quote_title).'</blockquote>';
        echo '</div></div>';
    }
}

/**
 * Display an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index
 * views, or a div element when on single views.
 * @since 1.0.0
 * @author Chinh Duong Manh
 */

function spcharityplus_post_thumbnail($size = 'large', $default_thumb = false, $before = '<div class="entry-media entry-thumbnail">', $after = '</div>') {
    global $spcharityplus_theme_options, $spcharityplus_meta_options, $_wp_additional_image_sizes;
    $class = $thumbnail = '';
    /* Gallery from Meta */
    switch (get_post_type()) {
        case 'zkgallery':
            /* Get the gallery in content */
            $gallery_default = get_post_gallery();
            $gallery        = isset($spcharityplus_meta_options['spcharityplus_gallery_gallery']) ? $spcharityplus_meta_options['spcharityplus_gallery_gallery'] : '';
            break;
        default:
            $gallery = '';
            break;
    }
    /* Check post has thumbnail*/
    if( has_post_thumbnail() && !post_password_required() && !is_attachment() &&  wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), $size)){
        $class = ' has-thumbnail';
        if (function_exists('wpb_getImageBySize')){
            $img_id = get_post_thumbnail_id();
            $img = wpb_getImageBySize( array(
                'attach_id'  => $img_id,
                'thumb_size' => $size,
                'class'      => '',
            ));
            $thumbnail = $img['thumbnail'];
            $full_src = wp_get_attachment_image_src($img_id, 'full' );
            $thumbnail_src = $full_src[0];
        } else {
            $thumbnail = get_the_post_thumbnail(get_the_ID(),$size);
            $full_src = wp_get_attachment_image_src(get_the_ID(), 'full' );
            $thumbnail_src = $full_src[0];
        }
    } elseif (!empty($gallery)){
        $class = ' has-gallery';
        $gallery_ids = explode(',', $gallery);
        $img_id =  $gallery_ids[0];
        if (function_exists('wpb_getImageBySize')){
            $img = wpb_getImageBySize( array(
                'attach_id'  => $img_id,
                'thumb_size' => $size,
                'class'      => '',
            ));
            $thumbnail = $img['thumbnail'];
            $full_src = wp_get_attachment_image_src($img_id, 'full' );
            $thumbnail_src = $full_src[0];
        } else {
            $thumbnail = get_the_post_thumbnail(get_the_ID(),$size);
            $full_src = wp_get_attachment_image_src(get_the_ID(), 'full' );
            $thumbnail_src = $full_src[0];
        }

    } elseif ($default_thumb){
        $class = ' no-image';
        $thumbnail = '<img src="'.esc_url(get_template_directory_uri().'/assets/images/no-image.jpg').'" alt="'.get_the_title().'"  title="'.get_the_title().'" />';
        $thumbnail_src = get_template_directory_uri().'/assets/images/no-image.jpg';
    }
    if ( has_post_thumbnail() || $default_thumb ) {
        echo wp_kses_post($before.$thumbnail.$after);
    }
}

/**
 * Display an optional post Media.
 * @since 1.0.0
 * @author Chinh Duong Manh
 */
function spcharityplus_post_media($size = 'large', $default_thumb = false, $before = '<div class="entry-media entry-thumbnail">', $after = '</div>') {
    switch (get_post_format()) {
        case 'gallery':
            spcharityplus_post_gallery($size, $default_thumb, $before, $after);
            break;
        case 'quote':
            spcharityplus_post_quote($size, $default_thumb, $before, $after);
            break;
        case 'video':
            spcharityplus_post_video($size, $default_thumb, $before, $after);
            break;
        case 'audio':
            spcharityplus_post_audio($size, $default_thumb, $before, $after);
            break;
        default:
            spcharityplus_post_thumbnail($size, $default_thumb, $before, $after);
            break;
    }
}

/**
 * Display an optional archive post footer.
 * @since 1.0.0
 * @author Chinh Duong Manh
 */
function spcharityplus_archive_footer(){
    global $spcharityplus_theme_options, $spcharityplus_meta_options;
    ?>
    <footer class="archive-footer">
        <?php if(has_tag() && $spcharityplus_theme_options['spcharityplus_archive_archive_post_tags'] || !$spcharityplus_theme_options ): ?>
            <div class="tag-links <?php echo spcharityplus_direction(); ?>"><?php the_tags('', '' ); ?></div>
        <?php endif; ?>

        <?php if($spcharityplus_theme_options['spcharityplus_archive_post_readmore'] || !$spcharityplus_theme_options) { ?>
        <a class="archive-readmore" href="<?php the_permalink(); ?>"><?php esc_html_e('Read more', 'sp-charityplus') ?>&nbsp;&nbsp;&nbsp;<i class="zmdi zmdi-arrow-<?php echo is_rtl()?'left':'right';?>"></i></a>
        <?php } ?>
    </footer>
<?php
}

/**
 * Display an optional Single post.
 * @since 1.0.0
 * @author Chinh Duong Manh
 */
/**
 * Display an optional single post header.
 */
function spcharityplus_single_header(){
    global $spcharityplus_theme_options;
    $show_author = isset($spcharityplus_theme_options['spcharityplus_single_post_author']) ? $spcharityplus_theme_options['spcharityplus_single_post_author'] : 'true';
    $show_date = isset($spcharityplus_theme_options['spcharityplus_single_post_date']) ? $spcharityplus_theme_options['spcharityplus_single_post_date'] : 'true';
    ?>
    <header class="single-header">
        <?php spcharityplus_post_meta_list($show_author, $show_date, $spcharityplus_theme_options['spcharityplus_single_post_category'], $spcharityplus_theme_options['spcharityplus_single_post_comment'], $spcharityplus_theme_options['spcharityplus_single_post_view'], $spcharityplus_theme_options['spcharityplus_single_post_like'], $spcharityplus_theme_options['spcharityplus_single_post_share'],'single-meta'); ?>
        <?php the_title( '<h3 class="single-title">', '</h3>' ); ?>
    </header>
<?php 
}
/**
 * Display an optional single post footer.
 * @since 1.0.0
 * @author Chinh Duong Manh
 */
function spcharityplus_single_footer(){
    global $spcharityplus_theme_options, $spcharityplus_meta_options;
    if($spcharityplus_theme_options['spcharityplus_single_post_tags'] || !$spcharityplus_theme_options ): ?>
        <?php the_tags( '<footer class="single-footer"><div class="tag-links">', '', '</div></footer>' ); ?>
    <?php endif; ?>    
<?php
}


/**
* Display navigation to next/previous post when applicable.
*
* @since 1.0.0
*/
function spcharityplus_post_nav() {
    global $post, $spcharityplus_theme_options;
    if($spcharityplus_theme_options && !$spcharityplus_theme_options['spcharityplus_single_post_nav']) return;
    // Don't print empty markup if there's nowhere to navigate.
    $previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
    $next     = get_adjacent_post( false, '', false );
    if ( ! $next && ! $previous)
        return;
    ?>
    <nav class="navigation post-navigation" role="navigation">
        <div class="nav-links clearfix">
            <?php
            $prev_post = get_previous_post();
            if (!empty( $prev_post )): ?>
              <a class="post-prev <?php echo spcharityplus_pull_align(); ?>" href="<?php echo get_permalink( $prev_post->ID ); ?>"><i class="fa fa-angle-<?php echo is_rtl()?'right':'left'; ?>"></i>&nbsp;&nbsp;<?php echo esc_attr($prev_post->post_title); ?></a>
            <?php endif; ?>
            <?php
            $next_post = get_next_post();
            if ( is_a( $next_post , 'WP_Post' ) ) { ?>
              <a class="post-next <?php echo spcharityplus_pull_align2(); ?>" href="<?php echo get_permalink( $next_post->ID ); ?>"><?php echo get_the_title( $next_post->ID ); ?>&nbsp;&nbsp;<i class="fa fa-angle-<?php echo is_rtl()?'left':'right'; ?>"></i></a>
            <?php } ?>

            </div><!-- .nav-links -->
    </nav><!-- .navigation -->
    <?php
}

/**
 * Display single post Author.
 * @since 1.0.0
 * @author Chinh Duong Manh
 */
function spcharityplus_author_info(){
    global $spcharityplus_theme_options;
    if(!$spcharityplus_theme_options) return;
    if($spcharityplus_theme_options['spcharityplus_single_post_author_info']){
        $user_info = get_userdata(get_the_author_meta('ID'));
?>    
    <div class="entry-author clearfix">
        <div class="author-avatar text-xs-center">
            <?php 
                $default_avatar = get_template_directory_uri().'/assets/images/avatar.png';
                echo get_avatar(get_the_author_meta('ID'), 100, '', get_the_author(), array('class' => 'img-circle')); ?>
        </div>
        <div class="author-info text-xs-center">
            <h5 class="author-name"><?php the_author(); ?></h5>
            <h6 class="author-roles"><?php echo '' . implode(' / ', $user_info->roles); ?></h6>
            <div class="author-bio"><?php the_author_meta('description'); ?></div>
            <div class="author-email"><?php the_author_meta('email'); ?></div>
            <div class="user-meta">
                <a class="facebook" href="<?php the_author_meta('user_facebook'); ?>"><i class="fa fa-facebook"></i></a>
                <a class="twitter" href="<?php the_author_meta('user_twitter'); ?>"><i class="fa fa-twitter"></i></a>
                <a class="gplus" href="<?php the_author_meta('user_gplus'); ?>"><i class="fa fa-google-plus"></i></a>
            </div>
        </div>
    </div>
<?php   
    }
}

/**
 * Display single post related
 * 
 * @author Chinh Duong Manh
 * @since 1.0.0
 */
function spcharityplus_post_related(){
    global $post, $spcharityplus_theme_options;
    if(!$spcharityplus_theme_options) return;
    //for use in the loop, list 2 posts related to first tag on current post
    $show_post_related = $spcharityplus_theme_options['spcharityplus_single_post_related'];
    $tag_tax_name = spcharityplus_get_custom_post_tag_taxonomy();
//    $tags = wp_get_post_tags($post->ID);
    $tags = get_the_terms($post->ID,$tag_tax_name);
    if ($tags && $show_post_related) {
        $_tag = array();
        foreach ($tags as $tag) {
            $_tag[] = $tag->slug;
        }
        wp_enqueue_style('owl-carousel', get_template_directory_uri() . '/assets/css/owl.carousel.css','','2.2.1','all');
        wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', 'jquery', '2.2.1', TRUE);
        wp_register_script('owl-carousel-cms', get_template_directory_uri() . '/assets/js/owl.carousel.cms.js', 'owl-carousel', '1.0', TRUE);

        $cms_carousel['cms-single-post-related'] = array(
            'loop'                  => 'true',
            'mouseDrag'             => 'true',
            'nav'                   => 'false',
            'dots'                  => 'false',
            'margin'                => '50',
            'autoplay'              => 'true',
            'autoplayTimeout'       => '1000',
            'smartSpeed'            => '1500',
            'autoplayHoverPause'    => 'false',
            'autoHeight'            => 'true',   
            'navText'               => array('<i class="fa fa-arrow-left"></i>','<i class="fa fa-arrow-right"></i>'),
            'items'                 => '2',
            'responsive' => array(
                0 => array(
                    "items" => 1,
                ),
                768 => array(
                    "items" => 2,
                ),
                992 => array(
                    "items" => 2,
                ),
                1200 => array(
                    "items" => 2,
                )
            )
        );
        wp_localize_script('owl-carousel-cms', "cmscarousel", $cms_carousel);
        wp_enqueue_script('owl-carousel-cms');

        $args=array(
            'post_type' => 'post',
            'tax_query' => array(
                array(
                    'taxonomy' => 'post_tag',
                    'field'    => 'slug',
                    'terms'    => $_tag,
                ),
            ),
            'post__not_in'          => array($post->ID),
            'posts_per_page'        => 3,
            'ignore_sticky_posts'   => 1
        );

        $related_query = new WP_Query($args);
        if( $related_query->have_posts() ) {
            echo '<div class="entry-related">';
            echo '<h4 class="related-title">'.esc_html__('Related Posts','sp-charityplus').'</h4>';
            echo '<div class="cms-carousel owl-carousel" id="cms-single-post-related">';
            while ($related_query->have_posts()) : $related_query->the_post(); 
                get_template_part( 'single-templates/single/content-related', get_post_format() );
            endwhile;
            echo '</div></div>';
        }
        wp_reset_postdata();
    }
}

function spcharityplus_get_custom_post_tag_taxonomy()
{
    $post = get_post();
    $tax_names = get_object_taxonomies($post);
    $result = 'post_tag';
    if(is_array($tax_names))
    {
        foreach ($tax_names as $name)
            if(strpos($name,'tag') !== false)
            {
                $result = $name;
                break;
            }
    }
    return $result;
}
/* Add Custom Comment */
function spcharityplus_comment_list($comment, $args, $depth) {
    if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }
    $comment_class = empty( $args['has_children'] ) ? '' : 'parent';
    $comment_class .= ' '.spcharityplus_direction();
    ?>
    <<?php echo esc_attr($tag) ?> <?php comment_class($comment_class);?> id="comment-<?php comment_ID() ?>">
        <?php if ( 'div' != $args['style'] ) : ?>
            <div id="div-comment-<?php comment_ID() ?>" class="comment-body clearfix">
        <?php endif; ?>
        <div class="comment-avatar">
            <?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'], '' , get_comment_author() , array('class'=>'img-circle') ); ?>
        </div>
        <div class="comment-content">
            <h5 class="comment-author"><?php echo get_comment_author_link(); ?></h5>
            <div class="comment-meta">
                <?php if ( $comment->comment_approved == '0' ) : ?>
                    <em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.','sp-charityplus' ); ?></em>
                <?php endif; ?>
                <?php printf( _x( '%s ago', '%s = human-readable time difference', 'sp-charityplus' ), human_time_diff( get_comment_time( 'U' ), current_time( 'timestamp' ) ) ); ?>
            </div>
            <?php comment_text(); ?>
            <div class="reply">
                <?php edit_comment_link( esc_html__( 'Edit','sp-charityplus' ), '  ', '' );?>
                <?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
            </div>
        </div>
    <?php if ( 'div' != $args['style'] ) : ?>
    </div>
    <?php endif; ?>
    <?php
}


/* Custom Post Type 
 * All function used for custom post type used in this theme
*/
/**
 * ZoDonations
 * Display single zodonation related
 * 
 * @author Chinh Duong Manh
 * @since 1.0.0
 */
function spcharityplus_campaign_related(){
    global $post;
    //for use in the loop, list 4 posts related to first tag on current post
    if(taxonomy_exists('zotags'))    {
        $tags = get_the_terms( get_the_ID(), 'zotags' );
        $taxonomy = 'zotags';
    } else {
        $tags = get_the_terms( get_the_ID(), 'zodonationcategory' );
        $taxonomy = 'zodonationcategory';
    }
    if(!$tags) return;
    $_tag = array();
    foreach ($tags as $tag) {
        $_tag[] = $tag->slug;
    }
    $args=array(
        'post_type' => 'zodonations',
        'tax_query' => array(
            array(
                'taxonomy' => $taxonomy,
                'field'    => 'slug',
                'terms'    => $_tag,
            ),
        ),
        'post__not_in'        => array($post->ID),
        'posts_per_page'      => 4,
        'ignore_sticky_posts' => 1
    );
    $related_query = new WP_Query($args);
    
    if( $related_query->have_posts() ) {
        echo '<h4 class="rl-title">'.esc_html__('Related Campaigns','sp-charityplus').'</h4>';
        echo '<div class="cms-donate-related" id="cms-donate-related">';
        while ($related_query->have_posts()) : $related_query->the_post();
            $id= get_the_ID();
            $donation_info = apply_filters('zk_get_donation_info', $id);
            extract(wp_parse_args($donation_info, array(
                "currency"        => "USD",
                "symbol"          => "$",
                "symbol_position" => 0,
                "remaining"       => "",
                "raised_percent"  => 0,
                "raised"          => "$0",
                "goal"            => "$20,000",
                "donors"          => 0
            )));
            if($raised_percent > 100){
                $progress = 100;
            } else {
                $progress = $raised_percent;
            }
        ?>  
            <div class="donate-related-item">
            <?php spcharityplus_post_thumbnail('large', true); ?>
            <div class="donation-wrap">
                <div class="raised raised-progress-bar" data-progress="<?php echo esc_attr($raised_percent);?>">
                    <div class="raised-progress-bar-bg accent-bg" style="width: <?php echo esc_attr($raised_percent.'%');?>;"></div>
                    <div class="raised-progress-bar-value accent-bg primary-color" style="<?php echo is_rtl()?'right':'left';?>:<?php echo esc_attr($progress.'%');?>;"><?php echo esc_attr($raised_percent.'%'); ?></div>
                </div>
            </div>
            <?php the_title('<h4 class="donate-title"><a href="'.get_the_permalink().'">','</a></h4>') ?>
            <div><?php spcharityplus_post_excerpt('76', true); ?></div>
            </div>
        <?php
        endwhile;
        echo '</div>';
    }
    wp_reset_postdata();
}

/**
 * Extra Option
 * @since 1.0.0
 * @author Chinh Duong Manh
*/
function spcharityplus_social($class = ''){
    global $spcharityplus_theme_options, $spcharityplus_meta_options;

    if(empty($spcharityplus_theme_options['spcharityplus_social_number']))
        return;
?>
    <aside class="cms-social <?php echo esc_attr($class);?>">
        <?php   
            for($i = 1 ; $i <= $spcharityplus_theme_options['spcharityplus_social_number'] ; $i++){
                if(!empty($spcharityplus_theme_options['spcharityplus_social_link_'.$i]) && !empty($spcharityplus_theme_options['spcharityplus_social_icon_'.$i]))
                echo '<a target="_blank" href="' . $spcharityplus_theme_options['spcharityplus_social_link_'.$i] . '"><i class="' . $spcharityplus_theme_options['spcharityplus_social_icon_'.$i] . '"></i></a>';
            }
        ?>
    </aside>
<?php 
}

/**
 * footer layout
 * @since 1.0.0
 * @author Chinh Duong Manh
 */
function spcharityplus_footer_class($class = ''){
    $classes = array();
    $classes[] = 'cms-footer';
    $classes[] = $class;
    global $spcharityplus_meta_options;
    echo  join( ' ', $classes );
}

/* Footer top */
function spcharityplus_footer_top($layout = 'layout1'){
    global $spcharityplus_theme_options, $spcharityplus_meta_options;
    /* Default theme option */
    if(!$spcharityplus_theme_options || empty($spcharityplus_theme_options['spcharityplus_footer_top_column'])) return;
    /* remove footer top section on some page */
    if(isset($spcharityplus_meta_options['spcharityplus_enable_page_footer_top']) && $spcharityplus_meta_options['spcharityplus_enable_page_footer_top']) return;
    /* layout */
    if(isset($spcharityplus_theme_options['spcharityplus_footer_top_layout'])) $layout = 'layout'.$spcharityplus_theme_options['spcharityplus_footer_top_layout'];

    if(is_page() && isset($spcharityplus_meta_options['spcharityplus_footer_top_layout']) && !empty($spcharityplus_meta_options['spcharityplus_footer_top_layout'])){
        $layout = 'layout'.$spcharityplus_meta_options['spcharityplus_footer_top_layout'];
    }
    
    $footer_bt_layout = '';
    if($spcharityplus_theme_options){
        $footer_bt_layout = $spcharityplus_theme_options['spcharityplus_footer_bottom_layout'];
    }

    $_class = "";
    $grid = round(12 / $spcharityplus_theme_options['spcharityplus_footer_top_column']);
    $_class = 'col-md-'.$grid.' col-lg-'.$grid ;
    if ( is_active_sidebar( 'sidebar-footer-top-1') || is_active_sidebar('sidebar-footer-top-2') || is_active_sidebar('sidebar-footer-top-3') || is_active_sidebar('sidebar-footer-top-4' )  || is_active_sidebar('sidebar-footer-top-5' ) ) {
?>
    <div id="cms-footer-top" class="cms-footer-top <?php echo esc_attr($layout); ?>">
        <div class="container">
            <div class="row">
            <?php   
                switch ($layout) {
                    case 'layout4':
                        for($i = 1 ; $i <= $spcharityplus_theme_options['spcharityplus_footer_top_column'] ; $i++){
                            if($i === 1) {
                                $cls = 'col-md-4';
                            } elseif ($i === 2){
                                $cls = 'col-md-2';
                            } elseif ($i === 3 || $i === 4) {
                                $cls = 'col-md-3';
                            } else {
                                $cls = 'col-md-12';
                            }
                            if ( is_active_sidebar( 'sidebar-footer-top-' . $i ) ){
                                echo '<div class="' . esc_html($cls) . ' footer-top-wg col-'.$i.'"><div class="footer-top-wg-inner">';
                                    dynamic_sidebar( 'sidebar-footer-top-' . $i );
                                    /* Social 
                                     * Footer bottom layout 2 
                                    */
                                    if ($i == 1 && ($footer_bt_layout === '2') && $spcharityplus_theme_options['spcharityplus_social_footer']){
                                        spcharityplus_social();
                                    }
                                echo '</div></div>';
                            }
                        }
                        break;
                    case 'layout3':
                        for($i = 1 ; $i <= $spcharityplus_theme_options['spcharityplus_footer_top_column'] ; $i++){
                            if ( is_active_sidebar( 'sidebar-footer-top-' . $i ) ){
                                echo '<div class="' . esc_html($_class) . ' footer-top-wg col-'.$i.'">';
                                    dynamic_sidebar( 'sidebar-footer-top-' . $i );
                                    /* Social 
                                     * Footer bottom layout 4 
                                    */
                                    if ($i == $spcharityplus_theme_options['spcharityplus_footer_top_column'] && ($footer_bt_layout === '4') && $spcharityplus_theme_options['spcharityplus_social_footer']){
                                        spcharityplus_social();
                                    }
                                echo "</div>";
                            }
                        }
                        break;
                    case 'layout2':
                        $ft_grid = $ft_grid2 = '';
                        if($spcharityplus_theme_options['spcharityplus_footer_top_column'] == '1'){
                            $ft_grid = 'col-md-12';
                        } elseif($spcharityplus_theme_options['spcharityplus_footer_top_column'] == '2'){
                            $ft_grid = 'col-md-6';
                        } elseif($spcharityplus_theme_options['spcharityplus_footer_top_column'] == '3'){
                            $ft_grid = 'col-md-4';
                        } elseif($spcharityplus_theme_options['spcharityplus_footer_top_column'] == '4'){
                            $ft_grid = 'col-md-4';
                            $ft_grid2 = 'col-md-12';
                        } elseif($spcharityplus_theme_options['spcharityplus_footer_top_column'] == '5'){
                            $ft_grid = 'col-md-4';
                            $ft_grid2 = 'col-md-6';
                        }
                        for($i = 1 ; $i <= $spcharityplus_theme_options['spcharityplus_footer_top_column'] ; $i++){
                            if ( $i <= 3 && is_active_sidebar( 'sidebar-footer-top-' . $i ) ){
                                echo '<div class="' . esc_html($ft_grid) . ' footer-top-wg col-'.$i.'">';
                                    dynamic_sidebar( 'sidebar-footer-top-' . $i );
                                echo "</div>";
                            } elseif (is_active_sidebar( 'sidebar-footer-top-' . $i)) {
                                if($i === 4) echo '<div class="line-break col-md-12 clearfix"></div>';
                                echo '<div class="' . esc_html($ft_grid2) . ' footer-top-wg col-'.$i.'">';
                                    dynamic_sidebar( 'sidebar-footer-top-' . $i );
                                    /* Social 
                                     * Footer bottom layout 2 
                                    */
                                    if ($i === 4 && ($footer_bt_layout === '2' || $footer_bt_layout === '3') && $spcharityplus_theme_options['spcharityplus_social_footer']){
                                        spcharityplus_social();
                                    }
                                echo "</div>";
                            }
                        }
                        break;
                    
                    default:
                        for($i = 1 ; $i <= $spcharityplus_theme_options['spcharityplus_footer_top_column'] ; $i++){
                            if ( is_active_sidebar( 'sidebar-footer-top-' . $i ) ){
                                echo '<div class="' . esc_html($_class) . ' footer-top-wg col-'.$i.'">';
                                    dynamic_sidebar( 'sidebar-footer-top-' . $i );
                                    /* Social 
                                     * Footer bottom layout 2 
                                    */
                                    if ($i === 1 && ($footer_bt_layout === '2' || $footer_bt_layout === '3') && $spcharityplus_theme_options['spcharityplus_social_footer']){
                                        spcharityplus_social();
                                    }
                                echo "</div>";
                            }
                        }
                        break;
                }
                
            ?>
            </div>
        </div>
    </div>
<?php
    }
}


/** Footer Bottom 
*/
function spcharityplus_footer_bottom( $class = ''){
    $classes = array();
    $classes[] = 'cms-footer-bottom';
    $classes[] = $class;
    $footer_bt_layout = '';
    global $spcharityplus_theme_options, $spcharityplus_meta_options;
    if($spcharityplus_theme_options){
        $footer_bt_layout = $spcharityplus_theme_options['spcharityplus_footer_bottom_layout'];
        $classes[] = 'layout'.$footer_bt_layout;
    }
    
    ?>
     <div id="cms-footer-bottom" class="<?php echo join(' ', $classes); ?>">
        <?php switch ($footer_bt_layout) {
            case '4':
        ?>
            <div class="container text-center">
                <?php 
                    if(!isset($spcharityplus_theme_options)){
                        echo '<aside class="default text-sm-center">';
                            printf( esc_html__('&copy; %s %s by %s. All Rights Reserved.','sp-charityplus'), date('Y') , get_bloginfo('name'), '<a href="'.esc_url('https://themeforest.net/user/spyropress').'">'.esc_html__('SpyroPress','sp-charityplus').'</a>');
                        echo '</aside>';
                    } else {
                        /* Widget area */
                        dynamic_sidebar( 'sidebar-footer-bottom');
                        /* Copyright text */
                        echo '<aside class="copy-right">';
                            if(!empty($spcharityplus_theme_options['spcharityplus_footer_bottom_copyright'])) {
                                echo wp_kses_post($spcharityplus_theme_options['spcharityplus_footer_bottom_copyright']);
                            } else {
                                printf( esc_html__('&copy; %s %s by %s. All Rights Reserved.','sp-charityplus'), date('Y') , get_bloginfo('name'), '<a href="'.esc_url('https://themeforest.net/user/spyropress').'">'.esc_html__('SpyroPress','sp-charityplus').'</a>');
                            }
                        echo '</aside>';
                        /* payment icon */
                        echo '<aside class="payment-icon text-center">'.sprintf('<img src="%s" alt="" />',esc_url(get_template_directory_uri().'/assets/images/footer/payment-icon.jpg')).'</aside>';
                    }
                ?>
            </div>
        <?php
                break;
            case '3':
        ?>
            <div class="container">

                <?php 
                    if(!isset($spcharityplus_theme_options)){
                        echo '<aside class="default text-sm-center">';
                            printf( esc_html__('&copy; %s %s by %s. All Rights Reserved.','sp-charityplus'), date('Y') , get_bloginfo('name'), '<a href="'.esc_url('https://themeforest.net/user/spyropress').'">'.esc_html__('SpyroPress','sp-charityplus').'</a>');
                        echo '</aside>';
                    } else {
                        ?>
                        <div class="row">
                            
                            <div class="col-md-6 text-sm-center">
                                <?php 
                                    /* Widget area */
                                    dynamic_sidebar( 'sidebar-footer-bottom');
                                ?>
                            </div>
                            <div class="col-md-6 text-md-right text-sm-center">
                                <?php 
                                    /* Copyright text */
                                    echo '<aside class="copy-right">';
                                        if(!empty($spcharityplus_theme_options['spcharityplus_footer_bottom_copyright'])) {
                                            echo wp_kses_post($spcharityplus_theme_options['spcharityplus_footer_bottom_copyright']);
                                        } else {
                                            printf( esc_html__('&copy; %s %s by %s. All Rights Reserved.','sp-charityplus'), date('Y') , get_bloginfo('name'), '<a href="'.esc_url('https://themeforest.net/user/spyropress').'">'.esc_html__('SpyroPress','sp-charityplus').'</a>');
                                        }
                                    echo '</aside>';
                                ?>
                            </div>
                        </div>
                <?php    }
                ?>
            </div>
        <?php
                break;
            case '2':
        ?>
            <div class="container">

                <?php 
                    if(!isset($spcharityplus_theme_options)){
                        echo '<aside class="default text-sm-center">';
                            printf( esc_html__('&copy; %s %s by %s. All Rights Reserved.','sp-charityplus'), date('Y') , get_bloginfo('name'), '<a href="'.esc_url('https://themeforest.net/user/spyropress').'">'.esc_html__('SpyroPress','sp-charityplus').'</a>');
                        echo '</aside>';
                    } else {
                        ?>
                        <div class="row">
                            <div class="col-md-6">
                                <?php 
                                    /* Copyright text */
                                    echo '<aside class="copy-right">';
                                        if(!empty($spcharityplus_theme_options['spcharityplus_footer_bottom_copyright'])) {
                                            echo wp_kses_post($spcharityplus_theme_options['spcharityplus_footer_bottom_copyright']);
                                        } else {
                                            printf( esc_html__('&copy; %s %s by %s. All Rights Reserved.','sp-charityplus'), date('Y') , get_bloginfo('name'), '<a href="'.esc_url('https://themeforest.net/user/spyropress').'">'.esc_html__('SpyroPress','sp-charityplus').'</a>');
                                        }
                                    echo '</aside>';
                                ?>
                            </div>
                            <div class="col-md-6 text-md-right">
                                <?php 
                                    /* Widget area */
                                    dynamic_sidebar( 'sidebar-footer-bottom');
                                ?>
                            </div>
                        </div>
                <?php    }
                ?>
            </div>
        <?php
                break;
            default:
        ?>
            <div class="container text-center">
                <?php 
                    if(!isset($spcharityplus_theme_options)){
                        echo '<aside class="default text-sm-center">';
                            printf( esc_html__('&copy; %s %s by %s. All Rights Reserved.','sp-charityplus'), date('Y') , get_bloginfo('name'), '<a href="'.esc_url('https://themeforest.net/user/spyropress').'">'.esc_html__('SpyroPress','sp-charityplus').'</a>');
                        echo '</aside>';
                    } else {
                        /* Social */
                        if ($spcharityplus_theme_options['spcharityplus_social_footer']){
                            spcharityplus_social();
                        }
                        /* Widget area */
                        dynamic_sidebar( 'sidebar-footer-bottom');
                        /* Copyright text */
                        echo '<aside class="copy-right">';
                            if(!empty($spcharityplus_theme_options['spcharityplus_footer_bottom_copyright'])) {
                                echo wp_kses_post($spcharityplus_theme_options['spcharityplus_footer_bottom_copyright']);
                            } else {
                                printf( esc_html__('&copy; %s %s by %s. All Rights Reserved.','sp-charityplus'), date('Y') , get_bloginfo('name'), '<a href="'.esc_url('https://themeforest.net/user/spyropress').'">'.esc_html__('SpyroPress','sp-charityplus').'</a>');
                            }
                        echo '</aside>';
                    }
                ?>
            </div>
        <?php
                break;
        } ?>
        
    </div>
<?php }

function spcharityplus_back_to_top(){
    global $spcharityplus_theme_options;

    $_back_to_top = false;

    if(isset($spcharityplus_theme_options['spcharityplus_backtotop']))
        $_back_to_top = $spcharityplus_theme_options['spcharityplus_backtotop'];

    if($_back_to_top)
        echo '<div class="ef3-back-to-top"><i class="fa fa-arrow-circle-up"></i></div>';
}

/**
 * ZK Event 
 * all function for post type ZKEvent
 * @author Chinh Duong Manh
 * @since 1.0.0
*/
/* Get Event Meta */
function spcharityplus_event_meta($show_btn = ''){
    global $spcharityplus_theme_options, $spcharityplus_meta_options;
    $post_type = get_post_type();
    switch ($post_type) {
        case 'zkevent':
            $show_event_attr = true;
            break;
        
        default:
            $show_event_attr = false;
            break;
    }
    if($show_event_attr && !empty($spcharityplus_meta_options['spcharityplus_event_time_date']) || !empty($spcharityplus_meta_options['spcharityplus_event_time_start']) || !empty($spcharityplus_meta_options['spcharityplus_event_time_end']) && $show_btn){
        echo '<ul class="event-meta list-unstyled">';
            
            if(!empty($spcharityplus_meta_options['spcharityplus_event_add'])) echo '<li><i class="accent-color zmdi zmdi-pin"></i><span class="map-add">'.esc_attr($spcharityplus_meta_options['spcharityplus_event_add']).'</span></li>';
            if(!empty($spcharityplus_meta_options['spcharityplus_event_time_start']) || !empty($spcharityplus_meta_options['spcharityplus_event_time_end'])) {
                echo '<li><i class="accent-color zmdi zmdi-time"></i>';
                if(!empty($spcharityplus_meta_options['spcharityplus_event_time_start'])) echo esc_attr($spcharityplus_meta_options['spcharityplus_event_time_start']);
                if(!empty($spcharityplus_meta_options['spcharityplus_event_time_end'])) echo ' - '.esc_attr($spcharityplus_meta_options['spcharityplus_event_time_end']);
                echo '</li>';
            }
            if(!empty($spcharityplus_meta_options['spcharityplus_event_time_date'])) echo '<li><i class="accent-color zmdi zmdi-calendar-note"></i>'.date_format(date_create($spcharityplus_meta_options['spcharityplus_event_time_date']),get_option('date_format')).'</li>';
            if($show_btn && function_exists('zk_show_ticket_button')) {
                echo '<li class="event-btn">';
                zk_show_ticket_button( get_the_ID() );
                echo '</li>';
            }
        echo '</ul>';
    }
}
function spcharityplus_event_meta2($show_btn = ''){
    global $spcharityplus_theme_options, $spcharityplus_meta_options;
    
    if(!empty($spcharityplus_meta_options['spcharityplus_event_time_date']) || !empty($spcharityplus_meta_options['spcharityplus_event_time_start'])){
        echo '<div class="event-meta inline-block rounded accent-bg">';
        if(!empty($spcharityplus_meta_options['spcharityplus_event_time_date'])) echo date_format(date_create($spcharityplus_meta_options['spcharityplus_event_time_date']),get_option('date_format'));
        if(!empty($spcharityplus_meta_options['spcharityplus_event_time_start'])) echo esc_attr(' - '.$spcharityplus_meta_options['spcharityplus_event_time_start']);
        echo '</div>';
    }
}
/* Get Event Meta for widget Recent Post */
function spcharityplus_event_meta_wg($show_btn = ''){
    global $spcharityplus_theme_options, $spcharityplus_meta_options;
    $post_type = get_post_type();
    switch ($post_type) {
        case 'zkevent':
            $show_event_attr = true;
            break;
        
        default:
            $show_event_attr = false;
            break;
    }
    if($show_event_attr && !empty($spcharityplus_meta_options['spcharityplus_event_time_date']) || !empty($spcharityplus_meta_options['spcharityplus_event_time_start']) || !empty($spcharityplus_meta_options['spcharityplus_event_time_end']) && $show_btn){
        echo '<ul class="wg-meta list-unstyled list-inline">';
            if(!empty($spcharityplus_meta_options['spcharityplus_event_time_start'])) {
                echo '<li>'.esc_attr($spcharityplus_meta_options['spcharityplus_event_time_start']).'</li>';
            }
            if(!empty($spcharityplus_meta_options['spcharityplus_event_time_date'])) echo '<li>&nbsp;/&nbsp;'.date_format(date_create($spcharityplus_meta_options['spcharityplus_event_time_date']),get_option('date_format')).'</li>';
            if(!empty($spcharityplus_meta_options['spcharityplus_event_add'])) echo '<li>&nbsp;/&nbsp;'.esc_attr($spcharityplus_meta_options['spcharityplus_event_add']).'</li>';
        echo '</ul>';
    }
}
/* Get thumbnail size for single event */
function spcharityplus_single_event_thumbnail(){
    global $spcharityplus_theme_options;
    if(isset($spcharityplus_theme_options['spcharityplus_single_event_layout']) && $spcharityplus_theme_options['spcharityplus_single_event_layout'] != '2'){
        if(is_active_sidebar('sidebar-event')){
            $thumbnail_size = 'large';
        } else {
            $thumbnail_size = 'post-thumbnail';
        }
    } else {
        $thumbnail_size = 'post-thumbnail';
    }
    return $thumbnail_size;
}
/* Show Event counter down time */
function spcharityplus_event_countdown($show_btn = true){
    global $spcharityplus_theme_options, $spcharityplus_meta_options;
    /* spcharityplus_event_time_start , spcharityplus_event_time_end */
    if(!empty($spcharityplus_meta_options['spcharityplus_event_time_date'])) {
        $time = $spcharityplus_meta_options['spcharityplus_event_time_date'].' '.$spcharityplus_meta_options['spcharityplus_event_time_start'];
        $date_sever = date_i18n('Y-m-d G:i:s');   
        $gmt_offset = get_option( 'gmt_offset' );
?>
    <div class="event-countdown has-box-shadow text-center clearfix">
        <div class="cms-countdown">
            <div class="cms-countdown-bar cms-countdown-time  clearfix" data-count="<?php echo esc_attr($time ? date('Y,m,d,H,i,s', strtotime($time)) : ''); ?>" data-timezone="<?php echo esc_attr($gmt_offset); ?>"></div>
        </div>
        <?php 
            if($show_btn && function_exists('zk_show_ticket_button')) {
                echo '<div class="event-btn">';
                zk_show_ticket_button( get_the_ID() );
                echo '</div>';
            }
        ?>
    </div>
<?php
    }
}

/* Show Event Map
 * this function just work on single event page
*/
function spcharityplus_event_gmap(){
    global $spcharityplus_theme_options, $spcharityplus_meta_options;
    if(!empty($spcharityplus_meta_options['spcharityplus_event_gmap']) && !empty($spcharityplus_meta_options['spcharityplus_event_add'])){
        echo '<div id="zkEventMap" style="width: 100%; height: 420px;"></div>';
    }
}
/* Show Event Facebook link 
 * this function just work on single event page
*/
function spcharityplus_event_fb($before='', $after=''){
    global $spcharityplus_theme_options, $spcharityplus_meta_options;
     if(!empty($spcharityplus_meta_options['spcharityplus_event_fb'])){
        echo wp_kses_post($before);
        printf('<a href="%s" title="%s" target="_blank" class="btn btn-primary">%s</a>',esc_url($spcharityplus_meta_options['spcharityplus_event_fb']),  esc_html__('Facebook Page','sp-charityplus'), esc_html__('Facebook Page','sp-charityplus'));
        echo wp_kses_post($after);
     }
}
/**
 * List of thumbnails size
 * @since 1.0.0
 * @author Chinh Duong Manh
 */
function spcharityplus_thumbnail_sizes() {
    $spcharityplus_thumbnail_sizes = $spcharityplus_default_thumbnail_sizes = $spcharityplus_shop_thumbnail_sizes = $spcharityplus_custom_thumbnail_sizes = array();
    $spcharityplus_default_thumbnail_sizes = array(
        esc_html__( 'Post Thumbnail', 'sp-charityplus' )             => 'post-thumbnail',
        esc_html__( 'Medium', 'sp-charityplus' )                     => 'medium',
        esc_html__( 'Large', 'sp-charityplus' )                      => 'large',
        esc_html__( 'Full', 'sp-charityplus' )                       => 'full',
        esc_html__( 'Thumbnail', 'sp-charityplus' )                  => 'thumbnail',
    );
    if(class_exists('WooCommerce')){
        $spcharityplus_shop_thumbnail_sizes = array(
            esc_html__( 'Shop Catalog', 'sp-charityplus' )              => 'shop_catalog',
            esc_html__( 'Shop Single', 'sp-charityplus' )               => 'shop_single',
            esc_html__( 'Shop Thumbnail', 'sp-charityplus' )            => 'shop_thumbnail',
        );
    }
    $spcharityplus_custom_thumbnail_sizes = array(
        esc_html__( 'Custom', 'sp-charityplus' )                 => 'custom',
    );

    $spcharityplus_thumbnail_sizes = $spcharityplus_default_thumbnail_sizes + $spcharityplus_shop_thumbnail_sizes + $spcharityplus_custom_thumbnail_sizes;

    return $spcharityplus_thumbnail_sizes;
}

function spcharityplus_thumbnail_sizes_page_option() {
    $spcharityplus_thumbnail_sizes = $spcharityplus_default_thumbnail_sizes = $spcharityplus_shop_thumbnail_sizes = $spcharityplus_custom_thumbnail_sizes = array();
    $spcharityplus_default_thumbnail_sizes = array(
        'post-thumbnail'            => esc_html__( 'Post Thumbnail', 'sp-charityplus' ),
        'medium'                    => esc_html__( 'Medium', 'sp-charityplus' ),
        'large'                     => esc_html__( 'Large', 'sp-charityplus' ),
        'full'                      => esc_html__( 'Full', 'sp-charityplus' ),
        'thumbnail'                 => esc_html__( 'Thumbnail', 'sp-charityplus' ),
    );
    if(class_exists('WooCommerce')){
        $spcharityplus_shop_thumbnail_sizes = array(
            'shop_catalog'      => esc_html__( 'Shop Catalog', 'sp-charityplus' ),
            'shop_single'       => esc_html__( 'Shop Single', 'sp-charityplus' ),
            'shop_thumbnail'    => esc_html__( 'Shop Thumbnail', 'sp-charityplus' ),
        );
    }

    $spcharityplus_thumbnail_sizes = $spcharityplus_default_thumbnail_sizes + $spcharityplus_shop_thumbnail_sizes;

    return $spcharityplus_thumbnail_sizes;
}

/**
 * Get size information for all currently-registered image sizes.
 *
 * @global $_wp_additional_image_sizes
 * @uses   get_intermediate_image_sizes()
 * @return array $sizes Data for all currently-registered image sizes.
 */
function spcharityplus_get_image_sizes() {
    global $_wp_additional_image_sizes;
    $sizes = array();
    foreach ( get_intermediate_image_sizes() as $_size ) {
        if ( in_array( $_size, array('thumbnail', 'medium', 'medium_large', 'large') ) ) {
            $sizes[ $_size ]['width']  = get_option( "{$_size}_size_w" );
            $sizes[ $_size ]['height'] = get_option( "{$_size}_size_h" );
            $sizes[ $_size ]['crop']   = (bool) get_option( "{$_size}_crop" );
        } elseif ( isset( $_wp_additional_image_sizes[ $_size ] ) ) {
            $sizes[ $_size ] = array(
                'width'  => $_wp_additional_image_sizes[ $_size ]['width'],
                'height' => $_wp_additional_image_sizes[ $_size ]['height'],
                'crop'   => $_wp_additional_image_sizes[ $_size ]['crop'],
            );
        }
    }
    return $sizes;
}

/**
 * Get size information for a specific image size.
 *
 * @uses   spcharityplus_get_image_sizes()
 * @param  string $size The image size for which to retrieve data.
 * @return bool|array $size Size data about an image size or false if the size doesn't exist.
 */
function spcharityplus_get_image_size( $size ) {
    $sizes = spcharityplus_get_image_sizes();

    if ( isset( $sizes[ $size ] ) ) {
        return $sizes[ $size ];
    }
    return false;
}

/**
 * Get the width of a specific image size.
 *
 * @uses   spcharityplus_get_image_size()
 * @param  string $size The image size for which to retrieve data.
 * @return bool|string $size Width of an image size or false if the size doesn't exist.
 */
function spcharityplus_get_image_width( $size ) {
    if ( ! $size = spcharityplus_get_image_size( $size ) ) {
        return false;
    }
    if ( isset( $size['width'] ) ) {
        return $size['width'];
    }
    return false;
}

/**
 * Get the height of a specific image size.
 *
 * @uses   spcharityplus_get_image_size()
 * @param  string $size The image size for which to retrieve data.
 * @return bool|string $size Height of an image size or false if the size doesn't exist.
 */
function spcharityplus_get_image_height( $size ) {
    if ( ! $size = spcharityplus_get_image_size( $size ) ) {
        return false;
    }
    if ( isset( $size['height'] ) ) {
        return $size['height'];
    }
    return false;
}

/* OWL Carousel Setting 
 * All option will use in element use OWL Carousel Libs
*/
function spcharityplus_owl_settings(){
    return $owl_settings;
}
/* Icon font libs */
function spcharityplus_icon_libs(){
    $spcharityplus_icon_libs = array(
        /* From VC */
        esc_html__( 'Font Awesome', 'sp-charityplus' )   => 'fontawesome',
        esc_html__( 'Open Iconic', 'sp-charityplus' )    => 'openiconic',
        esc_html__( 'Typicons', 'sp-charityplus' )       => 'typicons',
        esc_html__( 'Entypo', 'sp-charityplus' )         => 'entypo',
        esc_html__( 'Linecons', 'sp-charityplus' )       => 'linecons',
        esc_html__( 'Mono Social', 'sp-charityplus' )    => 'monosocial',
        esc_html__( 'Material', 'sp-charityplus' )       => 'material',
    );
    return $spcharityplus_icon_libs;
}
/* OWL Nav & Dots */
function spcharityplus_carousel_nav_style(){
    $spcharityplus_carousel_nav_style = array(
        esc_html__('Default','sp-charityplus')            => '',
        esc_html__('Top Left','sp-charityplus')           => 'nav-tleft',
        esc_html__('Top Right','sp-charityplus')          => 'nav-tright',
        esc_html__('Bottom Left','sp-charityplus')        => 'nav-left',
        esc_html__('Bottom Right','sp-charityplus')       => 'nav-right',
        esc_html__('Vertical Outside','sp-charityplus')   => 'nav-vertical',
        esc_html__('Vertical Inside','sp-charityplus')    => 'nav-vertical inside',
        esc_html__('Vertical with Text','sp-charityplus') => 'nav-vertical-text',
    );
    return $spcharityplus_carousel_nav_style;
}

function spcharityplus_carousel_dots_style(){
    $spcharityplus_carousel_dots_style = array(
        esc_html__('Default','sp-charityplus')   => '',
        esc_html__('Thumbnail','sp-charityplus') => 'dots-thumbnail',
        esc_html__('Progress','sp-charityplus')  => 'dots-progress',
    );
    return $spcharityplus_carousel_dots_style;
}