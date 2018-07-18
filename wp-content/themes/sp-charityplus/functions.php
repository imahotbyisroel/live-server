<?php
/**
 * CharityPlus functions and definitions
 *
 * Sets up the theme and provides some helper functions, which are used
 * in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook.
 *
 * For more information on hooks, actions, and filters, @link http://codex.wordpress.org/Plugin_API
 *
 * @package SpyroPress
 * @subpackage CharityPlus
 * @since 1.0.0
 */

// Set up the content width value based on the theme's design and stylesheet.
if (!isset($content_width))
    $content_width = 1170;

/**
 * SP ChariyPlus setup.
 *
 * Sets up theme defaults and registers the various WordPress features that
 * SP ChariyPlus supports.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To add a Visual Editor stylesheet.
 * @uses add_theme_support() To add support for post thumbnails, automatic feed links,
 *    custom background, and post formats.
 * @uses register_nav_menu() To add support for navigation menus.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since 1.0.0
 */
function spcharityplus_setup()
{

    // load language.
    load_theme_textdomain('sp-charityplus', get_template_directory() . '/languages');

    // Adds title tag
    add_theme_support("title-tag");

    // Add woocommerce
    add_theme_support('woocommerce');

    // Adds custom header
    add_theme_support('custom-header');

    // Adds RSS feed links to <head> for posts and comments.
    add_theme_support('automatic-feed-links');

    // This theme supports a variety of post formats.
    add_theme_support('post-formats', array('video', 'audio', 'gallery', 'quote'));

    // This theme uses wp_nav_menu() in one location.
    register_nav_menu('primary', esc_html__('Primary Menu', 'sp-charityplus'));

    /*
     * This theme supports custom background color and image,
     * and here we also set up the default background color.
     */
    add_theme_support('custom-background', array('default-color' => 'ffffff',));

    // This theme uses a custom image size for featured images, displayed on "standard" posts.
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(1170, 500, true); // Limited height, hard crop
    /* Change default image thumbnail sizes in wordpress */
    update_option('large_size_w', 810);
    update_option('large_size_h', 500);
    update_option('large_crop', 1); /* limited width/height, hard crop */
    update_option('medium_size_w', 570);
    update_option('medium_size_h', 430);
    update_option('medium_crop', 1); /* limited width/height, hard crop */
    update_option('thumbnail_size_w', 200);
    update_option('thumbnail_size_h', 200);
    update_option('thumbnail_crop', 1); /* limited width/height, hard crop */
    /*
     * This theme styles the visual editor to resemble the theme style,
     * specifically font, colors, icons, and column width.
     */
    add_editor_style(array('assets/css/editor-style.css'));
}

add_action('after_setup_theme', 'spcharityplus_setup');

/**
 * Enqueue scripts and styles for front-end.
 * @author Chinh Duong Manh
 * @since CMS SuperHeroes 1.0
 */
function spcharityplus_front_end_scripts()
{

    global $wp_styles, $spcharityplus_meta_options;
    /** ------------------------------------------ JS ----------------------------------------- */
    /* one page. */
    if (is_page() && isset($spcharityplus_meta_options['page_one_page']) && $spcharityplus_meta_options['page_one_page']) {
        wp_register_script('jquery.singlePageNav', get_template_directory_uri() . '/assets/js/jquery.singlePageNav.js', array('jquery'), '1.2.0');
        wp_localize_script('jquery.singlePageNav', 'one_page_options', array('filter' => '.is-one-page', 'speed' => $spcharityplus_meta_options['page_one_page_speed']));
        wp_enqueue_script('jquery.singlePageNav');
    }

    /* Adds JavaScript Bootstrap. */
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '3.3.7');

    /* Add main.js */
    wp_enqueue_script('spcharityplus_main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0.0', true);

    /* Add menu.js */
    wp_enqueue_script('spcharityplus_menu', get_template_directory_uri() . '/assets/js/menu.js', array('jquery'), '1.0.0', true);

    /* Comment */
    if (is_singular() && comments_open() && get_option('thread_comments'))
        wp_enqueue_script('comment-reply');
    /* Single Event */
    if (is_singular('zkevent') && !empty($spcharityplus_meta_options['spcharityplus_event_gmap']) && !empty($spcharityplus_meta_options['spcharityplus_event_add'])) {
        $script_options = array(
            'map_marker' => get_template_directory_uri() . '/assets/images/map-marker.png',
        );
        wp_enqueue_script('zk-charixy-event', get_template_directory_uri() . '/assets/js/zkevent.js', array('jquery'), '1.0.0', true);
        wp_enqueue_script('zkEventMap', 'https://maps.googleapis.com/maps/api/js', array('zk-charixy-event'), '', true);
        wp_localize_script('zk-charixy-event', 'CMSOptions', $script_options);
        /* CountDown Libs */
        wp_enqueue_script('cms-plugin', get_template_directory_uri() . '/assets/js/jquery.plugin.min.js', array('jquery'), '2.0.2', false);
        wp_enqueue_script('cms-countdown', get_template_directory_uri() . '/assets/js/jquery.countdown.min.js', array('cms-plugin'), '2.0.2', true);
    }
    /** ------------------------------------------ CSS ----------------------------------------- */

    /* Loads Bootstrap stylesheet. */
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', '', '3.3.7');
    /* Load Animate stylesheet. */
    wp_enqueue_style('animate-css', get_template_directory_uri() . '/assets/css/animate.min.css', array(), '3.5.1');
    /* Loads FontAwesome stylesheet. */
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', '', '4.7.0');
    /* Loads material-design-iconic-font stylesheet. */
    wp_enqueue_style('material-design-iconic-font', 'https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css', '', '2.2.0');
    /* Loads our main stylesheet. */
    //wp_enqueue_style('spcharityplus_style', get_stylesheet_uri(), '', '1.0.0');

    /* Loads the Internet Explorer specific stylesheet. */
    wp_enqueue_style('spcharityplus_ie', get_template_directory_uri() . '/assets/css/ie.css', '', '1.0.0');

    /* ie */
    $wp_styles->add_data('spcharityplus_ie', 'conditional', 'lt IE 11');

    /* Load static css*/
    wp_enqueue_style('spcharityplus_static', get_template_directory_uri() . '/assets/css/static.css', '', '1.0.0');

    /* Remove style from 3rd plugin */
    /*wp_deregister_style('cms-plugin-stylesheet');
    wp_deregister_style('contact-form-7');
    wp_deregister_style('sb_instagram_styles');
    wp_deregister_style('rs-plugin-settings');
    wp_deregister_style('jquery-colorbox');
    wp_deregister_style('yith-quick-view');
    wp_deregister_style('woocommerce_prettyPhoto_css');
    wp_deregister_style('jquery-selectBox');
    wp_deregister_style('yith-wcwl-main');
    wp_deregister_style('yith-wcwl-font-awesome');
    wp_deregister_style('newsletter-subscription');
    wp_deregister_style('custom-dynamic');*/

}

add_action('wp_enqueue_scripts', 'spcharityplus_front_end_scripts');

/**
 * load admin scripts.
 *
 * @author Chinh Duong Manh
 */
function spcharityplus_admin_scripts()
{

    /* Loads FontAwesome stylesheet. */
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), '4.7.0');
    /* Adds style for admin */
    wp_enqueue_style('spcharityplus_admin_css', get_template_directory_uri() . '/assets/css/cms-admin.css', array(), '1.0.0');

    $screen = get_current_screen();

    /* load js for edit post. */
    if ($screen->post_type == 'post') {
        /* post format select. */
        wp_enqueue_script('post-format', get_template_directory_uri() . '/assets/js/post-format.js', array(), '1.0.0', true);
    }
}

add_action('admin_enqueue_scripts', 'spcharityplus_admin_scripts');

/**
 * Register sidebars.
 *
 * Registers our main widget area and the front page widget areas.
 *
 * @since Fox
 */
function spcharityplus_widgets_init()
{

    global $spcharityplus_theme_options;
    /* Main Sidebar */
    register_sidebar(array(
        'name'          => esc_html__('Main Sidebar', 'sp-charityplus'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Appears on posts and pages except the optional Front Page template, which has its own widgets', 'sp-charityplus'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h4 class="wg-title"><span>',
        'after_title'   => '</span></h4>',
    ));
    /* WooCommerce Sidebar */
    if (class_exists('WooCommerce')) {
        register_sidebar(array(
            'name'          => esc_html__('Shop Sidebar', 'sp-charityplus'),
            'id'            => 'sidebar-shop',
            'description'   => esc_html__('Appears on shop page', 'sp-charityplus'),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h4 class="wg-title"><span>',
            'after_title'   => '</span></h4>',
        ));
    }

    /* Header Top */
    if (isset($spcharityplus_theme_options['spcharityplus_header_top']) && $spcharityplus_theme_options['spcharityplus_header_top']) {
        register_sidebar(array(
            'name'          => esc_html__('Header Top 1', 'sp-charityplus'),
            'id'            => 'sidebar-header-top-1',
            'description'   => esc_html__('Appears in Top Left of the site', 'sp-charityplus'),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h4 class="wg-title">',
            'after_title'   => '</h4>',
        ));
        register_sidebar(array(
            'name'          => esc_html__('Header Top 2', 'sp-charityplus'),
            'id'            => 'sidebar-header-top-2',
            'description'   => esc_html__('Appears in Top Right of the site', 'sp-charityplus'),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h4 class="wg-title">',
            'after_title'   => '</h4>',
        ));
    }

    /* Header Tools */
    if (isset($spcharityplus_theme_options['spcharityplus_show_header_tool']) && $spcharityplus_theme_options['spcharityplus_show_header_tool']) {
        register_sidebar(array(
            'name'          => esc_html__('Header Tools', 'sp-charityplus'),
            'id'            => 'header-tool',
            'description'   => esc_html__('Appears in right side of the site when you click on Header TooLs icon', 'sp-charityplus'),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h4 class="wg-title">',
            'after_title'   => '</h4>',
        ));
    }
    /* Footer Top */
    if (isset($spcharityplus_theme_options['spcharityplus_footer_top_column']) && !empty($spcharityplus_theme_options['spcharityplus_footer_top_column'])) {

        for ($i = 1; $i <= $spcharityplus_theme_options['spcharityplus_footer_top_column']; $i++) {
            register_sidebar(array(
                'name'          => sprintf(esc_html__('Footer Top %s', 'sp-charityplus'), $i),
                'id'            => 'sidebar-footer-top-' . $i,
                'description'   => esc_html__('Appears on Footer Top area', 'sp-charityplus'),
                'before_widget' => '<aside id="%1$s" class="widget %2$s">',
                'after_widget'  => '</aside>',
                'before_title'  => '<h4 class="wg-title">',
                'after_title'   => '</h4>',
            ));
        }
    }

    /* Footer Bottom  */
    register_sidebar(array(
        'name'          => esc_html__('Footer Bottom', 'sp-charityplus'),
        'id'            => 'sidebar-footer-bottom',
        'description'   => esc_html__('Appears on Footer Bottom area', 'sp-charityplus'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h4 class="wg-title">',
        'after_title'   => '</h4>',
    ));
    /* Widget for Mega Menu */
    if (isset($spcharityplus_theme_options) && !empty($spcharityplus_theme_options['spcharityplus_enable_mega_menu']) && !empty($spcharityplus_theme_options['spcharityplus_mega_menu_wg'])) {
        for ($i = 1; $i <= $spcharityplus_theme_options['spcharityplus_mega_menu_wg']; $i++) {
            register_sidebar(array(
                'name'          => sprintf(esc_html__('Mega Menu Widget %s', 'sp-charityplus'), $i),
                'id'            => 'megamenu-' . $i,
                'description'   => esc_html__('Add widget here then go to Menu manager and choose the widget you want to show!', 'sp-charityplus'),
                'before_widget' => '<aside id="%1$s" class="widget wg-megamenu %2$s">',
                'after_widget'  => '</aside>',
                'before_title'  => '<div class="wg-megamenu-title">',
                'after_title'   => '</div>',
            ));
        }
    }
}

add_action('widgets_init', 'spcharityplus_widgets_init');
/**
 * Add widgets
 * @author Chinh Duong Manh
 * @since 1.0.0
 */
require(get_template_directory() . '/inc/widgets/cms_recent_post.php');
require(get_template_directory() . '/inc/widgets/cms_social.php');

/**
 * Display navigation to next/previous comments when applicable.
 *
 * @since 1.0.0
 */
function spcharityplus_comment_nav()
{
    // Are there comments to navigate through?
    if (get_comment_pages_count() > 1 && get_option('page_comments')) :
        ?>
        <nav class="navigation comment-navigation" role="navigation">
            <h2 class="screen-reader-text"><?php esc_html_e('Comment navigation', 'sp-charityplus'); ?></h2>
            <div class="nav-links">
                <?php
                if ($prev_link = get_previous_comments_link(esc_html__('Older Comments', 'sp-charityplus'))) :
                    printf('<div class="nav-previous">%s</div>', $prev_link);
                endif;

                if ($next_link = get_next_comments_link(esc_html__('Newer Comments', 'sp-charityplus'))) :
                    printf('<div class="nav-next">%s</div>', $next_link);
                endif;
                ?>
            </div><!-- .nav-links -->
        </nav><!-- .comment-navigation -->
        <?php
    endif;
}

/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @since 1.0.0
 */
function spcharityplus_paging_nav($class = '')
{
    $classes = array();
    $classes[] = 'paging-navigation';
    $classes[] = $class . ' clearfix';
    // Don't print empty markup if there's only one page.
    if ($GLOBALS['wp_query']->max_num_pages < 2) {
        return;
    }

    $paged = get_query_var('paged') ? intval(get_query_var('paged')) : 1;
    $pagenum_link = html_entity_decode(get_pagenum_link());
    $query_args = array();
    $url_parts = explode('?', $pagenum_link);

    if (isset($url_parts[1])) {
        wp_parse_str($url_parts[1], $query_args);
    }

    $pagenum_link = remove_query_arg(array_keys($query_args), $pagenum_link);
    $pagenum_link = trailingslashit($pagenum_link) . '%_%';

    // Set up paginated links.
    $links = paginate_links(array(
        'base'      => $pagenum_link,
        'total'     => $GLOBALS['wp_query']->max_num_pages,
        'current'   => $paged,
        'mid_size'  => 1,
        'add_args'  => array_map('urlencode', $query_args),
        'prev_text' => '<i class="fa fa-angle-left"></i>',
        'next_text' => '<i class="fa fa-angle-right"></i>',
    ));

    if ($links) :

        ?>
        <nav class="<?php echo join(' ', $classes); ?>">
            <div class="loop-pagination">
                <?php echo wp_kses_post($links); ?>
            </div>
        </nav>
        <?php
    endif;
}


/**
 * Add Post view count
 * @since 1.0.0
 * @author Chinh Duong Manh
 */
function spcharityplus_set_post_views($postID)
{
    $count_key = 'spcharityplus_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

function spcharityplus_track_post_views($post_id)
{
    if (!is_single()) return;
    if (empty ($post_id)) {
        global $post;
        $post_id = $post->ID;
    }
    spcharityplus_set_post_views($post_id);
}

add_action('wp_head', 'spcharityplus_track_post_views');

function spcharityplus_get_post_views($postID, $show_text = true)
{
    $count_key = 'spcharityplus_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        $text = esc_html__('view', 'sp-charityplus');
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        if ($show_text) {
            return '<i class="fa fa-eye"></i> 0' . ' ' . esc_html($text);
        } else {
            return '<i class="fa fa-eye"></i> 0';
        }

    }
    if ($count <= '1') {
        $text = esc_html__('view', 'sp-charityplus');
        if ($show_text) {
            return '<i class="fa fa-eye"></i> 1' . ' ' . esc_html($text);
        } else {
            return '<i class="fa fa-eye"></i> 1';
        }
    } else {
        $text = esc_html__('views', 'sp-charityplus');
        $count = convert_unit_number($count);
        if ($show_text) {
            return '<i class="fa fa-eye"></i> ' . esc_attr($count) . ' ' . esc_html($text);
        } else {
            return '<i class="fa fa-eye"></i> ' . esc_attr($count);
        }
    }
}

function convert_unit_number($number)
{
    if (!is_numeric($number))
        return '0';
    $units = array(
        '1000'    => array(
            'add'      => 'K',
            'decimals' => 1,
        ),
        '1000000' => array(
            'add'      => 'M',
            'decimals' => 2
        )
    );
    $result = $number;
    foreach ($units as $unit => $option) {
        if ($number < $unit)
            break;
        $decimals_val = pow(10, $option['decimals']);
        $number_use = intval(($number / $unit) * $decimals_val);
        $result = $number_use / $decimals_val;
        $result .= $option['add'];
    }
    return $result;

}


/* core functions. */
require_once(get_template_directory() . '/inc/functions.php');

/**
 * theme actions.
 */

/* add footer back to top. */
add_action('wp_footer', 'spcharityplus_back_to_top');


add_filter('cms-shorcode-list', 'spcharityplus_shortcodes');
/**
 * support shortcodes
 * @return array
 */
function spcharityplus_shortcodes()
{
    return array(
        'cms_grid',
        'cms_counter_single'
    );
}

/**
 * Custom VC element of plugin CMSSuperHeroes
 * Add new elements for VC
 * @author Chinh Duong Manh
 * @since 1.0.0
 */
add_action('vc_before_init', 'spcharityplus_vc_before');
function spcharityplus_vc_before()
{
    /* Add new theme's Elements */
    if (class_exists('CmsShortCode')) {
        require(get_template_directory() . '/inc/elements/cms_button/cms_button.php');
        require(get_template_directory() . '/inc/elements/cms_carousel/cms_carousel.php');
        require(get_template_directory() . '/inc/elements/cms_clients_carousel/cms_clients_carousel.php');
        require(get_template_directory() . '/inc/elements/cms_donations/cms_donations.php');
        require(get_template_directory() . '/inc/elements/cms_donations_carousel/cms_donations_carousel.php');
        require(get_template_directory() . '/inc/elements/cms_empty_space/cms_empty_space.php');
        require(get_template_directory() . '/inc/elements/cms_events/cms_events.php');
        require(get_template_directory() . '/inc/elements/cms_fancybox_single/cms_fancybox_single.php');
        require(get_template_directory() . '/inc/elements/cms_heading/cms_heading.php');
        require(get_template_directory() . '/inc/elements/cms_news/cms_news.php');
        require(get_template_directory() . '/inc/elements/cms_team_carousel/cms_team_carousel.php');
        require(get_template_directory() . '/inc/elements/cms_testimonial_carousel/cms_testimonial_carousel.php');
        /**
         * Element based on 3rd plugin
         * @ instagram feed https://wordpress.org/plugins/instagram-feed/
         */

        if (function_exists('display_instagram')) {
            require(get_template_directory() . '/inc/elements/cms_instagram_feed/cms_instagram_feed.php');
        }
    }
    /*
		* This theme add some extra param for default VC Element
		* see below to how to do it
		* require( get_template_directory() . '/vc_params/vc_customs.php' );
	*/
    require(get_template_directory() . '/vc_params/vc_customs.php');
}

/* Custom News Twitter template */
add_filter('znews_twitter/widget/template', 'spcharityplus_news_twitter');
function spcharityplus_news_twitter()
{
    return get_template_directory() . '/inc/widgets/news_tweets.php';
}

/* convert dates to readable format */
if (!function_exists('spcharityplus_relative_time')) {
    function spcharityplus_relative_time($a)
    {
        //get current timestampt
        $b = strtotime("now");
        //get timestamp when tweet created
        $c = strtotime($a);
        //get difference
        $d = $b - $c;
        //calculate different time values
        $minute = 60;
        $hour = $minute * 60;
        $day = $hour * 24;
        $week = $day * 7;

        if (is_numeric($d) && $d > 0) {
            //if less then 3 seconds
            if ($d < 3)
                return esc_html__('right now', 'sp-charityplus');
            //if less then minute
            if ($d < $minute)
                return floor($d) . esc_html__(' seconds ago', 'sp-charityplus');
            //if less then 2 minutes
            if ($d < $minute * 2)
                return esc_html__('1 minute ago', 'sp-charityplus');
            //if less then hour
            if ($d < $hour)
                return floor($d / $minute) . esc_html__(' minutes ago', 'sp-charityplus');
            //if less then 2 hours
            if ($d < $hour * 2)
                return esc_html__('1 hour ago', 'sp-charityplus');
            //if less then day
            if ($d < $day)
                return floor($d / $hour) . esc_html__(' hours ago', 'sp-charityplus');
            //if more then day, but less then 2 days
            if ($d > $day && $d < $day * 2)
                return esc_html__('yesterday', 'sp-charityplus');
            //if less then year
            if ($d < $day * 365)
                return floor($d / $day) . esc_html__(' days ago', 'sp-charityplus');
            //else return more than a year
            return esc_html__('over a year ago', 'sp-charityplus');
        }
    }
}
/* Custom VC ROW Layout */


/**
 * Custom WooCommerce template function
 * @author Chinh Duong Manh
 * @since 1.0.0
 */
if (class_exists('WooCommerce')) {
    /* Custom WooCommerce Hook  */
    require get_template_directory() . '/woocommerce/wc-template-hook.php';
}

/**
 * Change default woocommerce thumbnails size
 * This action need to do when active Woo, so it can not add in if(class_exists('Woocommerce'))
 * @since 1.0.0
 * @author Chinh Duong Manh
 */

add_action('init', 'spcharityplus_change_default_woo_thumb_size');
function spcharityplus_change_default_woo_thumb_size()
{
    register_activation_hook('woocommerce/woocommerce.php', 'spcharityplus_woo_image_dimensions');
}

function spcharityplus_woo_image_dimensions()
{
    global $pagenow;

    $catalog = array(
        'width'  => '570',    // px
        'height' => '570',    // px
        'crop'   => 1        // true
    );
    $single = array(
        'width'  => '570',    // px
        'height' => '646',    // px
        'crop'   => 1        // true
    );
    $thumbnail = array(
        'width'  => '200',    // px
        'height' => '200',    // px
        'crop'   => 1        // false
    );
    /* Image sizes */
    update_option('shop_catalog_image_size', $catalog);       /* Product category thumbs */
    update_option('shop_single_image_size', $single);         /* Single product image */
    update_option('shop_thumbnail_image_size', $thumbnail);   /* Image gallery thumbs */
}

/**
 * Define woocommerce thumbnails size after switch theme
 * This action need to do when active THEME, so it can not add in if(class_exists('Woocommerce'))
 * @since 1.0.0
 * @author Chinh Duong Manh
 */
function spcharityplus_switch_theme_woo_image_dimensions()
{
    global $pagenow;

    if (!isset($_GET['activated']) || $pagenow != 'themes.php') {
        return;
    }
    $catalog = array(
        'width'  => '570',    // px
        'height' => '570',    // px
        'crop'   => 1        // true
    );
    $single = array(
        'width'  => '570',    // px
        'height' => '646',    // px
        'crop'   => 1        // true
    );
    $thumbnail = array(
        'width'  => '100',    // px
        'height' => '120',    // px
        'crop'   => 1        // false
    );
    // Image sizes
    update_option('shop_catalog_image_size', $catalog);        // Product category thumbs
    update_option('shop_single_image_size', $single);        // Single product image
    update_option('shop_thumbnail_image_size', $thumbnail);    // Image gallery thumbs
}

add_action('after_switch_theme', 'spcharityplus_switch_theme_woo_image_dimensions', 1);

/**
 * Call default WC single image gallery
 */
function spcharityplus_wc_single_gallery()
{
    global $spcharityplus_theme_options;
    if (isset($spcharityplus_theme_options['spcharityplus_wc_single_gallery']) && !empty($spcharityplus_theme_options['spcharityplus_wc_single_gallery'])) {
        $gal = $spcharityplus_theme_options['spcharityplus_wc_single_gallery'];
    } else {
        $gal = 2;
    }
    switch ($gal) {
        case '3':
            /* Zoom */
            add_theme_support('wc-product-gallery-zoom');
            add_theme_support('wc-product-gallery-lightbox');
            add_theme_support('wc-product-gallery-slider');
            break;
        case '2':
            /* Slider and Lightbox */
            add_theme_support('wc-product-gallery-lightbox');
            add_theme_support('wc-product-gallery-slider');
            break;
        default:
            /* Lightbox Only*/
            add_theme_support('wc-product-gallery-lightbox');
            break;
    }
}

add_action('after_setup_theme', 'spcharityplus_wc_single_gallery');

/**
 * Custom ZoDonations  template function
 * @author Chinh Duong Manh
 * @since 1.0.0
 */

/* Custom ZoDonations Archive */
function get_zodonations_posts($query)
{
    if (!is_admin() && $query->is_main_query() && is_post_type_archive('zodonations')) {
        $query->set('posts_per_page', '9');
    }
}

add_action('pre_get_posts', 'get_zodonations_posts');

/**
 * Call global wp_query for loop
 */
function spcharityplus_get_posts($args = array())
{
    global $wp_query;
    $wp_query = new WP_Query($args);
    return $wp_query;
}


/* Custom VC Grid Builder Element:  Post Title
*/
function spcharityplus_vc_post_title()
{
    return array(
        'type'        => 'dropdown',
        'heading'     => esc_html__('Add link', 'sp-charityplus'),
        'param_name'  => 'link',
        'value'       => array(
            esc_html__('None', 'sp-charityplus')                      => 'none',
            esc_html__('Post link', 'sp-charityplus')                 => 'post_link',
            esc_html__('Post author', 'sp-charityplus')               => 'post_author',
            esc_html__('Large image', 'sp-charityplus')               => 'image',
            esc_html__('Large image (prettyPhoto)', 'sp-charityplus') => 'image_lightbox',
            esc_html__('Spcharityplus Custom Media Link', 'sp-charityplus')         => 'spcharityplus_custom_media_link',
            esc_html__('Custom', 'sp-charityplus')                    => 'custom',
        ),
        'description' => esc_html__('Select link option.', 'sp-charityplus'),
    );
}

add_filter('vc_gitem_add_link_param', 'spcharityplus_vc_post_title');



function spcharityplus_vc_post_title_image_link_filter($image_block, $link)
{
    if ($link !== 'spcharityplus_custom_media_link')
        return $image_block;
    $image_block = '<a data-trigger="spcharityplus_custom_media_link" href="{{ post_link_url }}" 
        title="{{ post_title }}" class="vc_gitem-link vc-zone-link"></a>';
    return $image_block;
}
add_filter('vc_gitem_zone_image_block_link', 'spcharityplus_vc_post_title_image_link_filter', 10, 3);
function spcharityplus_vc_gitem_create_link_filter($link,$attrs,$css_class)
{
    if($attrs['link']!=='spcharityplus_custom_media_link')
        return $link;
    $link = 'a data-trigger="spcharityplus_custom_media_link" href="{{ post_link_url }}" class="' . esc_attr( $css_class ) . '"';
    return $link;
}
add_filter('vc_gitem_post_data_get_link_link', 'spcharityplus_vc_gitem_create_link_filter', 10, 2);


add_action('wp_ajax_spcharityplus_get_custom_media_link', 'spcharityplus_ajax_get_custom_media_link');
add_action('wp_ajax_nopriv_spcharityplus_get_custom_media_link', 'spcharityplus_ajax_get_custom_media_link');
function spcharityplus_ajax_get_custom_media_link()
{
    $data = $_POST['targets'];
    if (!is_array($data)) {
        echo '0';
        exit();
    }
    $result = array();
    foreach ($data as $key => $url) {
        $result[$key] = array(
            'old' => $url,
            'new' => spcharityplus_get_custom_media_link_by_url($url)
        );
    }
    echo json_encode($result);
    exit();
}

function spcharityplus_get_custom_media_link_by_url($url)
{
    $id = url_to_postid($url);
    $link = get_post_meta($id, 'spcharityplus_custom_media_link', true);
    if (is_string($link))
        return $link;
    if(is_array($link))
        return $link[0];
    return '';
}

function spcharityplus_add_custom_media_fields($form_fields, $post)
{

    $media_custom_fields = "spcharityplus_custom_media_link";

    $form_fields[$media_custom_fields] = array(
        'label' => esc_html__('Spcharityplus Custom Media Link', 'sp-charityplus'),
        'value' => get_post_meta($post->ID, $media_custom_fields, true)
    );

    return $form_fields;
}

add_filter('attachment_fields_to_edit', 'spcharityplus_add_custom_media_fields', null, 2);

/**
 * Save our new media field
 *
 * @param object $post
 * @param object $attachment
 *
 * @return array
 */
function spcharityplus_save_custom_media_fields($post, $attachment)
{

    $media_custom_fields = 'spcharityplus_custom_media_link';

    if (!empty($attachment[$media_custom_fields]))
        update_post_meta($post['ID'], $media_custom_fields, $attachment[$media_custom_fields]);
    else
        delete_post_meta($post['ID'], $media_custom_fields);

    return $post;
}

add_filter('attachment_fields_to_save', 'spcharityplus_save_custom_media_fields', null, 2);

function spcharityplus_show_zodonations_content()
{
    global $post;
    echo wp_kses_post($post->post_content);
}