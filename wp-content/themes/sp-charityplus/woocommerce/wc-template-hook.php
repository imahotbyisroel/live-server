<?php
/**
 * WooCommerce Template Hooks
 *
 * Action/filter hooks used for WooCommerce functions/templates.
 *
 * @author      Chinh Duong Manh
 * @category    Core
 * @package     WooCommerce/Templates
 * @version     3.0.x
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * Remove all default css style 
 * add_filter('woocommerce_enqueue_styles', '__return_empty_array');
*/
add_filter('woocommerce_enqueue_styles', '__return_empty_array');

/* Remove style of plugin WooCommerce Quantity Increment */
add_action('wp_enqueue_scripts', 'wcqi_dequeue_quantity');
function wcqi_dequeue_quantity()
{
    wp_dequeue_style('wcqi-css');
}

/**
 * Shop Title .
 * this theme removed it from woocommerce_before_main_content
 */
add_filter('woocommerce_show_page_title', '__return_false');

/**
 * Breadcrumbs.
 * this theme removed it from woocommerce_before_main_content
 * @see woocommerce_breadcrumb()
 */
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);
/**
 * Change placeholder image path
 * @since 1.0.0
 * @author Chinh Duong Manh
 * add_action( 'init', 'spcharityplus_woo_placeholder_thumbnail' );
 **/

function spcharityplus_woo_placeholder_thumbnail()
{
    add_filter('woocommerce_placeholder_img_src', 'spcharityplus_custom_woo_thumbnail_src');
    function spcharityplus_custom_woo_thumbnail_src($src)
    {
        $src = get_template_directory_uri() . '/assets/images/wc-no-image.jpg';
        return $src;
    }
}

/* Shop Loop Items */
/**
 * add custom colomns before shop loop start 
 * @since 1.0.0
 * @author Chinh Duong Manh
 * add_action('woocommerce_before_shop_loop','spcharityplus_wc_before_shop_loop',99999999999);
 * add_action('woocommerce_after_shop_loop','spcharityplus_wc_after_shop_loop',99999999999);
**/
if(!function_exists('spcharityplus_wc_before_shop_loop')){
    function spcharityplus_wc_before_shop_loop(){
        echo '<div class="woocommerce columns-'.loop_columns().'">';
    }
}

if(!function_exists('spcharityplus_wc_after_shop_loop')){
    function spcharityplus_wc_after_shop_loop(){
        echo '</div>';
    }
}
/**
 * custom class
*/
if(!function_exists('spcharityplus_wc_loop_class')){
    function spcharityplus_wc_loop_class($class = ''){
        $product = wc_get_product( get_the_ID() );
        if($product){
            $class[] = 'overlay-wrap';
        }
        return $class;
    }
}
//add_filter( 'post_class', 'spcharityplus_wc_loop_class' );
/**
 * Remove Counter / Sort order 
*/
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
/**
 * Change number of products per page to 9
 * @since 1.0.0
 * @author Chinh Duong Manh
 **/
function cms_loop_shop_per_page()
{
    global $spcharityplus_theme_options;
    if (isset($_REQUEST['loop_shop_per_page']) && !empty($_REQUEST['loop_shop_per_page'])) {
        return $_REQUEST['loop_shop_per_page'];
    } else {
        return isset($spcharityplus_theme_options['spcharityplus_wc_archive_per_page']) ? $spcharityplus_theme_options['spcharityplus_wc_archive_per_page'] : '9';
    }
}

add_filter('loop_shop_per_page', create_function('$cols', 'return cms_loop_shop_per_page();'), cms_loop_shop_per_page());

/**
 * Change number of products per row
 * @since 1.0.0
 * @author Chinh Duong Manh
 */
if (!function_exists('loop_columns')) {
    function loop_columns()
    {
        global $spcharityplus_theme_options;
        if (isset($_REQUEST['column']) && !empty($_REQUEST['column'])) {
            $cols = $_REQUEST['column'];
        } else {
            $cols = isset($spcharityplus_theme_options['spcharityplus_wc_archive_column']) ? $spcharityplus_theme_options['spcharityplus_wc_archive_column'] : '3';
        }
        return $cols;
    }
}
add_filter('loop_shop_columns', 'loop_columns');

/* add div wrap loop product */
if (!function_exists('spcharityplus_wc_loop_open')) {
    function spcharityplus_wc_loop_open()
    {
        echo '<div class="overlay-wrap">';
    }
}
add_action('woocommerce_before_shop_loop_item', 'spcharityplus_wc_loop_open', 0);

if (!function_exists('spcharityplus_wc_loop_close')) {
    function spcharityplus_wc_loop_close()
    {
        echo '</div>';
    }
}
add_action('woocommerce_after_shop_loop_item', 'spcharityplus_wc_loop_close', 99999);


/* add div wrap image */
if (!function_exists('spcharityplus_wc_loop_image_open')) {
    function spcharityplus_wc_loop_image_open()
    {
        echo '<div class="wc-img-wrap">';
    }
}
add_action('woocommerce_before_shop_loop_item_title', 'spcharityplus_wc_loop_image_open', 0);
remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open');
add_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_open', 1);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close');
add_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 11);

/**
 * Add div wrap conten in image
 * @since 1.0.0
 * @author Chinh Duong Manh
**/
if (!function_exists('spcharityplus_wc_loop_image_content_wrap')) {
    function spcharityplus_wc_loop_image_content_wrap()
    {
        echo '<div class="overlay text-center" style="background: rgba(255,255,255,0.68);"><div class="overlay-inner vertical-align">';
    }
}
add_action('woocommerce_before_shop_loop_item_title', 'spcharityplus_wc_loop_image_content_wrap', 12);


add_action('woocommerce_before_shop_loop_item_title','spcharityplus_wc_loop_image_content_icon_open', 13);
if (!function_exists('spcharityplus_wc_loop_image_content_icon_open')) {
    function spcharityplus_wc_loop_image_content_icon_open()
    {
        echo '<div class="icon-list icon-rounded">';
    }
}
/* add add to cart to image */
add_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart', 13);

add_action('woocommerce_before_shop_loop_item_title','spcharityplus_wc_loop_image_content_icon_close', 9996);
if (!function_exists('spcharityplus_wc_loop_image_content_icon_close')) {
    function spcharityplus_wc_loop_image_content_icon_close()
    {
        echo '</div>';
    }
}
/* change position of rating */
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
add_action('woocommerce_before_shop_loop_item_title','woocommerce_template_loop_rating', 9997);


if (!function_exists('spcharityplus_wc_loop_image_close')) {
    function spcharityplus_wc_loop_image_close()
    {
        echo '</div></div>';
        echo '</div>';
    }
}
add_action('woocommerce_before_shop_loop_item_title', 'spcharityplus_wc_loop_image_close', 9999);

/* remove add to cart after link closed */
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart');

/**
 * remove class button of add to cart button in loop 
 * @since 1.0.0
 * @author Chinh Duong Manh
 * add_filter('woocommerce_loop_add_to_cart_args', 'spcharityplus_wc_loop_add_to_cart_args_icon', 10, 2);
*/
function spcharityplus_wc_loop_add_to_cart_args_icon()
{
    global $product;
    return array(
        'quantity' => 1,
        'class'    => implode(' ', array_filter(array(
            'product_type_' . $product->get_type(),
            $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
            $product->supports('ajax_add_to_cart') ? 'ajax_add_to_cart fa fa-shopping-basket' : 'fa fa-shopping-basket',
        ))),
    );
}

/** 
 * Change add to cart text on loop 
 * 
 * @since 1.0.0
 * @author Chinh Duong Manh
 * add_filter('woocommerce_product_add_to_cart_text', 'spcharityplus_wc_loop_add_to_cart_text');
*/
function spcharityplus_wc_loop_add_to_cart_text()
{
    global $product;
    $product_type = $product->get_type();
    switch ($product_type) {
        case 'external':
            return '<i class="fa fa-shopping-basket"></i>';
            break;
        case 'grouped':
            return '<i class="fa fa-shopping-basket"></i>';
            break;
        case 'simple':
            return '<i class="fa fa-shopping-basket"></i>';
            break;
        case 'variable':
            return '<i class="fa fa-shopping-basket"></i>';
            break;
        default:
            return '<i class="fa fa-shopping-basket"></i>';
    }
}

/* custom sale flash */
if (!function_exists('spcharityplus_wc_sale_flash')) {
    function spcharityplus_wc_sale_flash()
    {
        echo '<span class="wc-onsale accent-bg"><span>' . esc_html__('Sale', 'sp-charityplus') . '</span></span>';
    }
}
add_filter('woocommerce_sale_flash', 'spcharityplus_wc_sale_flash');
/**
 * Change title structure
 * woocommerce_after_shop_loop_item hook.
 *
 * @hooked spcharityplus_woocommerce_template_loop_product_title - 10
 */
if (!function_exists('spcharityplus_woocommerce_template_loop_product_title')) {
    function spcharityplus_woocommerce_template_loop_product_title()
    {
        the_title('<h6 class="wc-loop-title"><a href="' . esc_url(get_the_permalink()) . '">', '</a></h6>');
    }
}
remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
add_action('woocommerce_shop_loop_item_title', 'spcharityplus_woocommerce_template_loop_product_title', 10);

/** 
 * 3rd extensions for WC
 * YITH Wishlish
 * YITH Compare
 * YITH Quick View
 * https://yithemes.com/
*/
/**
 * Add wishlist button to products archive page
 * after add_to_cart button 
 * add_action( 'woocommerce_after_shop_loop_item_title', array( WC_Wishlists_Plugin, 'add_to_wishlist_button' ), 10 );
*/
function spcharityplus_wc_products_wishlist(){
    echo do_shortcode('[yith_wcwl_add_to_wishlist]');
}
if(class_exists('YITH_WCWL')){
    add_action('woocommerce_before_shop_loop_item_title', 'spcharityplus_wc_products_wishlist', 14 );
}

/* Move compare / quick view button lacation */

/**
 * Move Compare button
*/
function spcharityplus_yith_compare(){
    echo do_shortcode('[yith_compare_button]');
}
if(class_exists('YITH_Woocompare_Frontend')){
    add_action('woocommerce_before_shop_loop_item_title', 'spcharityplus_yith_compare', 15 );
}
add_action( 'template_redirect', 'move_quick_view_button' );
function move_quick_view_button(){
    /**
     * Move Quick View button
    */
    if( class_exists( 'YITH_WCQV_Frontend' ) ) {
       remove_action( 'woocommerce_after_shop_loop_item', array( YITH_WCQV_Frontend(), 'yith_add_quick_view_button' ), 15 );
       add_action('woocommerce_before_shop_loop_item_title', array( YITH_WCQV_Frontend(), 'yith_add_quick_view_button' ), 16);
    }
}



/* Single Product */
    /* add div wrap image / summary */
    add_action('woocommerce_before_single_product_summary', 'woo_wrap_image_summary_open', 0);
    add_action('woocommerce_after_single_product_summary', 'woo_wrap_image_summary_close', 0);
    if(!function_exists('woo_wrap_image_summary_open')){
        function woo_wrap_image_summary_open(){
            echo '<div class="img-summary-wrap clearfix">';
        }
    }
    if(!function_exists('woo_wrap_image_summary_close')){
        function woo_wrap_image_summary_close(){
            echo '</div>';
        }
    }
    /* Change title structure */
    if ( ! function_exists( 'woocommerce_template_single_title' ) ) {
        /**
         * Output the product title.
         *
         * @subpackage  Product
         */
        function woocommerce_template_single_title() {
            the_title('<h2 class="product-title">','</h2>');
        }
    } 
    /* Add theme share */
    add_action('woocommerce_share', 'spcharityplus_post_share_list', 1);

    /* Remove description heading */
    add_filter( 'woocommerce_product_description_heading', 'woo_remove_description_heading' );
    function woo_remove_description_heading( ) {
        return '';
    }
    /* Remove additional heading */
    add_filter( 'woocommerce_product_additional_information_heading', 'woo_remove_additional_heading' );
    function woo_remove_additional_heading( ) {
        return '';
    }
    /** Change number of upsells output
     * Hooked woocommerce_after_single_product_summary 
    */
    remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
    add_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_upsells', 15 );

    if ( ! function_exists( 'woocommerce_output_upsells' ) ) {
        function woocommerce_output_upsells() {
            woocommerce_upsell_display( loop_columns(), loop_columns() );
        }
    }
    /** Change related product column, number output
     * Filter woocommerce_output_related_products_args
    */
    add_filter( 'woocommerce_output_related_products_args', 'spcharityplus_related_products_args' );
    function spcharityplus_related_products_args( $args ) {
        $args['posts_per_page'] = loop_columns();
        $args['columns'] = loop_columns();
        return $args;
    }

/* Cart Page */
    /* Change number of cross-sell product to show */
    add_filter( 'woocommerce_cross_sells_columns', 'spcharityplus_cross_sells_columns' );
    if(!function_exists('spcharityplus_cross_sells_columns')) {
        function spcharityplus_cross_sells_columns() {
            return loop_columns();
        }
    }
    add_filter( 'woocommerce_cross_sells_total', 'spcharityplus_cross_sells_per_page' );
    if(!function_exists('spcharityplus_cross_sells_per_page')){
        function spcharityplus_cross_sells_per_page() {
            return loop_columns();
        }
    }