<?php
/* Replace dev site url with curren site url 
 * replace in content options, post meta
*/
add_action('ef3-import-start', 'spcharityplus_import_start',10,2);
function spcharityplus_import_start($id, $part){
    global $wp_filesystem;
    $file = $part . 'content/content-data.xml';
    $data = file_get_contents($file);
    $data = preg_replace(
        array(
            '/http:\/\/dev\.joomexp\.com\/wordpress\/sp-charityplus/',
            '/http:\/\/dev\.joomexp\.com\/wordpress\/sp-charityplus2/',
            '/http:\/\/dev\.joomexp\.com\/wordpress\/sp-charityplus3/',
            '/http:\/\/dev\.joomexp\.com\/wordpress\/sp-charityplus4/',
            '/http:\/\/dev\.joomexp\.com\/wordpress\/sp-charityplus5/',
        ), 
        site_url(), 
        $data
    );
    $wp_filesystem ->put_contents($file, $data);
}

/**
 * Replace Content
 * remove query
 * Replace dev site url with curren site url in content
*/
function str_replace_assoc( $replace, $subject) { 
   return str_replace(array_keys($replace), array_values($replace), $subject);    
}
function spcharityplus_replace_content($replaces, $attachment){
    /**
     * $replace
     * fixed vc_link param when use in VC Param
    */
    $replace = array( 
        ':' => '%3A', 
        '/' => '%2F' 
    );
    /**
     * $replace2
     * fixed vc_link param when use in VC Param Group
    */
    $replace2 = array( 
        ':' => '%253A', 
        '/' => '%252F' 
    );
    $new_site_url = get_site_url();
    $btn_link_url = str_replace_assoc($replace, $new_site_url);
    $btn_link_url2 = str_replace_assoc($replace2, $new_site_url);
    return array(
        '/category="(.+?)"/'                                                 => 'category=""',
        '/category:"(.+?)"/'                                                 => '',
        '/tax_query:/'                                                       => 'remove_query:',
        '/categories:/'                                                      => 'remove_query:',
        '/http%3A%2F%2Fdev.joomexp.com%2Fwordpress%2Fsp-charityplus%2F%3F/'  => $btn_link_url.'%2F%3F',
        '/http%3A%2F%2Fdev.joomexp.com%2Fwordpress%2Fsp-charityplus2%2F%3F/' => $btn_link_url.'%2F%3F',
        '/http%3A%2F%2Fdev.joomexp.com%2Fwordpress%2Fsp-charityplus3%2F%3F/' => $btn_link_url.'%2F%3F',
        '/http%3A%2F%2Fdev.joomexp.com%2Fwordpress%2Fsp-charityplus4%2F%3F/' => $btn_link_url.'%2F%3F',
        '/http%3A%2F%2Fdev.joomexp.com%2Fwordpress%2Fsp-charityplus5%2F%3F/' => $btn_link_url.'%2F%3F',
        '/http%253A%252F%252Fdev.joomexp.com%252Fwordpress%252Fsp-charityplus/' => $btn_link_url2
    );
}
add_filter('ef3-replace-content', 'spcharityplus_replace_content', 10 , 2);
/** 
 * Replace Theme Option Name 
 * Replace theme option name with default theme option name from framework
*/
add_filter('ef3-theme-options-opt-name', 'spcharityplus_set_demo_opt_name');
function spcharityplus_set_demo_opt_name(){
    return 'spcharityplus_theme_options';
}

/* Replace Theme Option 
 * replace default theme option after import sample data
*/
add_filter('ef3-replace-theme-options', 'spcharityplus_replace_theme_options');
function spcharityplus_replace_theme_options(){
    return array(
        'spcharityplus_dev_mode' => 0,
    );
}

/** 
 * Remove Create Demo
 * remove create demo content screen
*/
add_filter('ef3-enable-create-demo', 'spcharityplus_enable_create_demo');
function spcharityplus_enable_create_demo(){
    return false;
}

/**
 * update widget custom menu at import sample data time 
 *
 * @author Chinh Duong Manh
 * @since 1.0.0
*/
add_action('ef3-import-finish','spcharityplus_update_widget_data_for_menu');
function spcharityplus_update_widget_data_for_menu() { 
$settings = array(
    'header-tool'           => array('Useful Links'),
    'sidebar-footer-top-1'  => array('Useful Links'),
    'sidebar-footer-top-2'  => array('Useful Links'),
    'sidebar-footer-top-3'  => array('Useful Links'),
    'sidebar-footer-top-4'  => array('Useful Links'),
    'sidebar-footer-top-5'  => array('Useful Links'),
    'megamenu-1'            => array('Useful Links'),
    'megamenu-2'            => array('Useful Links'),
    'megamenu-3'            => array('Useful Links'),
    'megamenu-4'            => array('Useful Links'),
    'megamenu-5'            => array('Useful Links'),
    'sidebar-footer-bottom' => array('Footer Bottom Menu'),
    
);
 if(!empty($settings)){
  foreach($settings as  $sbarid =>$nav_arr_name){
   // get menu id unassign
   $sidebars_widgets = wp_get_sidebars_widgets();
   $widget_ids = $sidebars_widgets[$sbarid];
   
   if( !$widget_ids ) {
    return ;
   }
   $icr=0;
   foreach( $widget_ids as $id ) {
    $wdgtvar = 'widget_'._get_widget_id_base( $id );
    $idvar = _get_widget_id_base( $id );
    $instance = get_option( $wdgtvar );
    $idbs = str_replace( $idvar.'-', '', $id );
    if(isset($instance[$idbs]['nav_menu'])){
     // get current menu id
     $nav = wp_get_nav_menu_object($nav_arr_name[$icr]);
     $mn_id = $nav->term_id;
     // update menu id to widget
     $instance[$idbs]['nav_menu'] = $mn_id;
     update_option( $wdgtvar, $instance );
     $icr++;
    }
   }   
  }   
 }
}
/**
 * Set woo page.
 *
 * get array woo page title and update options.
 *
 * @author Chinh Duong Manh
 * @since 1.0.0
 */
function spcharityplus_set_woo_page(){
    
    $woo_pages = array(
        'woocommerce_shop_page_id' => 'Shop',
        'woocommerce_cart_page_id' => 'Cart',
        'woocommerce_checkout_page_id' => 'Checkout',
        'woocommerce_myaccount_page_id' => 'My Account'
    );
    
    foreach ($woo_pages as $key => $woo_page){
    
        $page = get_page_by_title($woo_page);
    
        if(!isset($page->ID))
            return ;
             
        update_option($key, $page->ID);
    
    }
}

add_action('ef3-import-finish', 'spcharityplus_set_woo_page');

