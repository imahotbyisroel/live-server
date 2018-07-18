<?php
/**
 * ReduxFramework Sample Config File
 * For full documentation, please visit: http://docs.reduxframework.com/
 */
if (! class_exists('Redux')) {
    return;
}

$show_wc_cart = $show_rev_slider = $show_rev_slider_list = $show_rev_slider_page = $show_donate = $show_donate_url = $show_donate_url2 = '';
if(class_exists('WooCommerce')){
    $show_wc_cart = array(
        'title'     => esc_html__('Show Cart', 'sp-charityplus'),
        'subtitle'      => esc_html__('Show/Hide cart icon', 'sp-charityplus'),
        'id'        => 'spcharityplus_show_header_wc_cart',
        'type'      => 'switch',
        'default'   => false,
    );
}

if(class_exists('RevSlider')){
    $show_rev_slider = array(
        'title'     => esc_html__('Revolution Slider', 'sp-charityplus'),
        'subtitle'      => esc_html__('Show a Revolution Slider before Main Header', 'sp-charityplus'),
        'id'        => 'spcharityplus_show_header_slider',
        'type'      => 'switch',
        'default'   => false,
    ); 

    $show_rev_slider_list = array(
        'id'        => 'spcharityplus_header_slider',
        'title'     => esc_html__('Slider', 'sp-charityplus'),
        'placeholder'  => esc_html__('select a slider for header', 'sp-charityplus'),
        'default'   => 'home',
        'type'      => 'select',
        'options'   => spcharityplus_get_list_rev_slider(),
        'required'  => array( 0 => 'spcharityplus_show_header_slider', 1 => '=', 2 => '1' )
    );
    $show_rev_slider_page = array(
        'id'        => 'spcharityplus_header_slider_page',
        'title'     => esc_html__('Show Slider on page ?', 'sp-charityplus'),
        'type'      => 'select',
        'data'      => 'pages',
        'multi'     => 'true',
        'placeholder'   => esc_html__('Select page you want to show slider','sp-charityplus'),
        'required'  => array( 0 => 'spcharityplus_header_slider', 1 => '!=', 2 => '' )
    );
}

/* Show Donate Button */
if(class_exists('ZoDonations')){
    $show_donate = array(
        'title'     => esc_html__('Show Donate Button', 'sp-charityplus'),
        'subtitle'  => esc_html__('Show/Hide donate button', 'sp-charityplus'),
        'id'        => 'spcharityplus_show_header_donate',
        'type'      => 'button_set',
        'options'  => array(
            0      => esc_html__('Hide', 'sp-charityplus'),
            1      => esc_html__('Internal Link', 'sp-charityplus'),
            2      => esc_html__('Extalnal Link', 'sp-charityplus')
        ),
        'default'   => 0,
    );
    $show_donate_url = array(
        'title'     => esc_html__('Donate Button Link', 'sp-charityplus'),
        'subtitle'  => esc_html__('Choose an exiting page', 'sp-charityplus'),
        'id'        => 'spcharityplus_header_donate_url',
        'type'      => 'select',
        'options'   => spcharityplus_list_page(),
        'required'  => array( 0 => 'spcharityplus_show_header_donate', 1 => '=', 2 => '1' )
    );
    $show_donate_url2 = array(
        'title'     => esc_html__('Donate Button Link', 'sp-charityplus'),
        'subtitle'  => esc_html__('Enter your url', 'sp-charityplus'),
        'id'        => 'spcharityplus_header_donate_url2',
        'type'      => 'text',
        'placeholder'   => 'http://your-url.com',
        'required'  => array( 0 => 'spcharityplus_show_header_donate', 1 => '=', 2 => '2' )
    );
}

// This line is only for altering the demo. Can be easily removed.
$opt_name = apply_filters('opt_name', 'spcharityplus_theme_options');

$theme = wp_get_theme(); // For use with some settings. Not necessary.

$args = array(
    // TYPICAL -> Change these values as you need/desire
    'opt_name' => $opt_name,
    // This is where your data is stored in the database and also becomes your global variable name.
    'display_name' => $theme->get('Name'),
    // Name that appears at the top of your panel
    'display_version' => $theme->get('Version'),
    // Version that appears at the top of your panel
    'menu_type' => 'menu',
    // Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
    'allow_sub_menu' => true,
    // Show the sections below the admin menu item or not
    'menu_title' => $theme->get('Name'),
    'page_title' => $theme->get('Name'),
    // You will need to generate a Google API key to use this feature.
    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
    'google_api_key' => '',
    // Set it you want google fonts to update weekly. A google_api_key value is required.
    'google_update_weekly' => false,
    // Must be defined to add google fonts to the typography module
    'async_typography' => false,
    // Use a asynchronous font on the front end or font string
    // 'disable_google_fonts_link' => true, // Disable this in case you want to create your own google fonts loader
    'admin_bar' => false,
    // Show the panel pages on the admin bar
    'admin_bar_icon' => 'dashicons-smiley',
    // Choose an icon for the admin bar menu
    'admin_bar_priority' => 50,
    // Choose an priority for the admin bar menu
    'global_variable' => '',
    // Set a different name for your global variable other than the opt_name
    'dev_mode' => false,
    // Show the time the page took to load, etc
    'update_notice' => true,
    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
    'customizer' => true,
    // Enable basic customizer support
    // 'open_expanded' => true, // Allow you to start the panel in an expanded way initially.
    'disable_save_warn' => true, // Disable the save warning when a user changes a field

    // OPTIONAL -> Give you extra features
    'page_priority' => null,
    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
    'page_parent' => 'themes.php',
    // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    'page_permissions' => 'manage_options',
    // Permissions needed to access the options panel.
    'menu_icon' => 'dashicons-dashboard',
    // Specify a custom URL to an icon
    'last_tab' => '',
    // Force your panel to always open to a specific tab (by id)
    'page_icon' => 'dashicons-smiley',
    // Icon displayed in the admin panel next to your menu_title
    'page_slug' => '',
    // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
    'save_defaults' => true,
    // On load save the defaults to DB before user clicks save or not
    'default_show' => false,
    // If true, shows the default value next to each field that is not the default value.
    'default_mark' => '',
    // What to print by the field's title if the value shown is default. Suggested: *
    'show_import_export' => true,
    // Shows the Import/Export panel when not used as a field.

    // CAREFUL -> These options are for advanced use only
    'transient_time' => 60 * MINUTE_IN_SECONDS,
    'output' => true,
    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
    'output_tag' => true,
    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
    // 'footer_credit' => '', // Disable the footer credit of Redux. Please leave if you can help it.

    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
    'database' => '',
    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
    'use_cdn' => true,
    // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

    // HINTS
    'hints' => array(
        'icon' => 'el el-question-sign',
        'icon_position' => 'right',
        'icon_color' => 'lightgray',
        'icon_size' => 'normal',
        'tip_style' => array(
            'color' => 'red',
            'shadow' => true,
            'rounded' => false,
            'style' => ''
        ),
        'tip_position' => array(
            'my' => 'top left',
            'at' => 'bottom right'
        ),
        'tip_effect' => array(
            'show' => array(
                'effect' => 'slide',
                'duration' => '500',
                'event' => 'mouseover'
            ),
            'hide' => array(
                'effect' => 'slide',
                'duration' => '500',
                'event' => 'click mouseleave'
            )
        )
    )
);

Redux::setArgs($opt_name, $args);

/**
 * General
 * 
 * @author Chinh Duong Manh
 * @since 1.0.0
 */
Redux::setSection($opt_name, array(
    'title'     => esc_html__('General', 'sp-charityplus'),
    'heading'   => '',
    'icon'      => 'dashicons dashicons-admin-home',
    'fields'    => array(
        array(
            'title'    => esc_html__('Boxed Layout', 'sp-charityplus'),
            'subtitle' => esc_html__('make your site is boxed?', 'sp-charityplus'),
            'id'       => 'spcharityplus_body_layout',
            'type'     => 'button_set',
            'options'  => array(
                0      => esc_html__('Default', 'sp-charityplus'),
                1      => esc_html__('Boxed', 'sp-charityplus')
            ),
            'default'  => 0
        ),
        array(
            'title'     => esc_html__('Boxed width', 'sp-charityplus'),
            'subtitle'  => esc_html__('This option just applied for screen larger than value you enter here!', 'sp-charityplus'),
            'id'        => 'spcharityplus_body_width',
            'type'      => 'dimensions',
            'units'     => array('px'),
            'height'    => false,
            'default'   => array(
                'width' => '1200px',
                'units' => 'px'
            ),
            'required'  => array( 
                array( 'spcharityplus_body_layout', '=', 1), 
            ),
        ),
        array(
            'title'     => esc_html__('Background', 'sp-charityplus'),
            'subtitle'  => esc_html__('Choose background style', 'sp-charityplus'),
            'id'        => 'spcharityplus_body_bg',
            'type'      => 'background',
            'default'   => array(),
            'output'    => array('body')
        ),
        
        array(
            'title'     => esc_html__('Padding', 'sp-charityplus'),
            'subtitle'  => esc_html__('Choose padding for BODY tag', 'sp-charityplus'),
            'id'        => 'spcharityplus_body_padding',
            'type'      => 'spacing',
            'mode'      => 'padding',
            'units'     => array('px'),     
            'default'   => array(),
            'output'    => array('body')
        ),
    )
));
/**
 * Extra
 * 
 * @author Chinh Duong Manh
 * @since 1.0.0
 */
Redux::setSection($opt_name, array(
    'title'     => esc_html__('Extra', 'sp-charityplus'),
    'heading'   => '',
    'icon'      => 'dashicons dashicons-plus-alt',
    'subsection'=> true,
    'fields'    => array(
        array(
            'title'     => esc_html__('Enable Page Loading', 'sp-charityplus'),
            'subtitle'  => '',
            'id'        => 'spcharityplus_page_loading',
            'type'      => 'switch',
            'default'   => false
        ),
        array(
            'title'     => esc_html__('Page Loadding Style','sp-charityplus'),
            'subtitle'  => esc_html__('Select Style Page Loadding.','sp-charityplus'),
            'id'        => 'spcharityplus_page_loading_style',
            'type'      => 'select',
            'options'   => array(
                '1' => esc_html__('Newtons cradle','sp-charityplus'),
                '2' => esc_html__('Wave','sp-charityplus'),
                '3' => esc_html__('Circus','sp-charityplus'),
                '4' => esc_html__('Atom','sp-charityplus'),
                '5' => esc_html__('Fussion','sp-charityplus'),
                '6' => esc_html__('Mitosis','sp-charityplus'),
                '7' => esc_html__('Flower','sp-charityplus'),
                '8' => esc_html__('Clock','sp-charityplus'),
                '9' => esc_html__('Washing machine','sp-charityplus'),
                '10' => esc_html__('Pulse','sp-charityplus'),
            ),
            
            'default'   => '1',
            'required'  => array( 0 => 'spcharityplus_page_loading', 1 => '=', 2 => 1 )
        ) ,
        array(
            'title'     => esc_html__('Enable Back To Top', 'sp-charityplus'),
            'subtitle'  => '',
            'id'        => 'spcharityplus_backtotop',
            'type'      => 'switch',
            'default'   => false
        ),
    )
));

/**
 * Styling
 * 
 * @author Chinh Duong Manh
 * @since 1.0.0
 */
Redux::setSection($opt_name, array(
    'title'     => esc_html__('Theme Color', 'sp-charityplus'),
    'icon'      => 'dashicons dashicons-art',
    'fields'    => array(
        array(
            'title'     => esc_html__('Primary Color', 'sp-charityplus'),
            'subtitle'  => esc_html__('Choose your primary color.', 'sp-charityplus'),
            'id'        => 'spcharityplus_primary_color',
            'type'      => 'link_color',
            'hover'     => false,
            'active'    => false,
            'default'   => array()
        ),
        array(
            'title'     => esc_html__('Accent Color', 'sp-charityplus'),
            'subtitle'  => esc_html__('Choose your accent color.', 'sp-charityplus'),
            'id'        => 'spcharityplus_accent_color',
            'type'      => 'link_color',
            'hover'     => false,
            'active'    => false,
            'default'   => array()
        )
    )
));
/**
 * Typography
 * 
 * @author Chinh Duong Manh
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Typography', 'sp-charityplus'),
    'heading' => '',
    'icon' => 'el-icon-text-width',
    'fields' => array(
        array(
            'id'                =>  'spcharityplus_font_body',
            'type'              =>  'typography',
            'title'             =>  esc_html__('Body Font', 'sp-charityplus'),
            'google'            =>  true,
            'font-backup'       =>  true,
            'all_styles'        =>  true,
            'text-transform'    =>  true,
            'letter-spacing'    =>  true,
            'output'            =>  array('body'),
            'units'             =>  'px',
            'subtitle'          =>  esc_html__('Typography option with each property can be called individually.', 'sp-charityplus'),
            'default'           =>  array()
        )
    )
));
/**
 * Heading Font
 * 
 * @author Chinh Duong Manh
 * @since 1.0.0
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Heading', 'sp-charityplus'),
    'heading' => esc_html__('Choose style for all heading style', 'sp-charityplus'),
    'icon' => 'el-icon-text-width',
    'subsection' => true,
    'fields' => array(
        array(
            'id'                => 'spcharityplus_heading_h1',
            'type'              => 'typography',
            'title'             => esc_html__('H1', 'sp-charityplus'),
            'subtitle'          => esc_html__('Typography option with each property can be called individually.', 'sp-charityplus'),
            'description'       => esc_html__('If not choose any option here, all style for h1 will applied by default theme style.', 'sp-charityplus'),
            'google'            => true,
            'font-backup'       => true,
            'all_styles'        => true,
            'text-transform'    => true,
            'letter-spacing'    => true,
            'output'            => array('h1, .h1, h1 a, .h1 a'),
            'units'             => 'px',
            'default'           => array(
            )
        ),
        array(
            'id'                =>              'spcharityplus_heading_h2',
            'type'              =>              'typography',
            'title'             =>               esc_html__('H2', 'sp-charityplus'),
            'subtitle'          =>              esc_html__('Typography option with each property can be called individually.', 'sp-charityplus'),
            'description'       =>              esc_html__('If not choose any option here, all style for h2 will applied by default theme style.', 'sp-charityplus'),
            'google'            =>              true,
            'font-backup'       =>              true,
            'all_styles'        =>              true,
            'text-transform'    =>              true,
            'letter-spacing'    =>              true,
            'output'            =>              array('h2, .h2, h2 a, .h2 a'),
            'units'             =>              'px',
            'default'           => array(
            )
        ),
        array(
            'id'                =>              'spcharityplus_heading_h3',
            'type'              =>              'typography',
            'title'             =>               esc_html__('H3', 'sp-charityplus'),
            'subtitle'          =>              esc_html__('Typography option with each property can be called individually.', 'sp-charityplus'),
            'description'       =>              esc_html__('If not choose any option here, all style for h3 will applied by default theme style.', 'sp-charityplus'),
            'google'            =>              true,
            'font-backup'       =>              true,
            'all_styles'        =>              true,
            'text-transform'    =>              true,
            'letter-spacing'    =>              true,
            'output'            =>              array('h3, .h3, h3 a, .h3 a'),
            'units'             =>              'px',
            'default'           => array(
            )
        ),
        array(
            'id'                =>              'spcharityplus_heading_h4',
            'type'              =>              'typography',
            'title'             =>               esc_html__('H4', 'sp-charityplus'),
            'subtitle'          =>              esc_html__('Typography option with each property can be called individually.', 'sp-charityplus'),
            'description'       =>              esc_html__('If not choose any option here, all style for h4 will applied by default theme style.', 'sp-charityplus'),
            'google'            =>              true,
            'font-backup'       =>              true,
            'all_styles'        =>              true,
            'text-transform'    =>              true,
            'letter-spacing'    =>              true,
            'output'            =>              array('h4, .h4, h4 a, .h4 a'),
            'units'             =>              'px',
            'default'           => array(
            )
        ),
        array(
            'id'                =>              'spcharityplus_heading_h5',
            'type'              =>              'typography',
            'title'             =>               esc_html__('H5', 'sp-charityplus'),
            'subtitle'          =>              esc_html__('Typography option with each property can be called individually.', 'sp-charityplus'),
            'description'       =>              esc_html__('If not choose any option here, all style for h5 will applied by default theme style.', 'sp-charityplus'),
            'google'            =>              true,
            'font-backup'       =>              true,
            'all_styles'        =>              true,
            'text-transform'    =>              true,
            'letter-spacing'    =>              true,
            'output'            =>              array('h5, .h5, h5 a, .h5 a'),
            'units'             =>              'px',
            'default'           => array(
            )
        ),
        array(
            'id'                =>              'spcharityplus_heading_h6',
            'type'              =>              'typography',
            'title'             =>              esc_html__('H6', 'sp-charityplus'),
            'subtitle'          =>              esc_html__('Typography option with each property can be called individually.', 'sp-charityplus'),
            'description'       =>              esc_html__('If not choose any option here, all style for h6 will applied by default theme style.', 'sp-charityplus'),
            'google'            =>              true,
            'font-backup'       =>              true,
            'all_styles'        =>              true,
            'text-transform'    =>              true,
            'letter-spacing'    =>              true,
            'output'            =>              array('h6, .h6, h6 a, .h6 a'),
            'units'             =>              'px',
            'default'           => array(
            )
        ),
    )
));

/* extra font. */
$custom_font_1 = Redux::getOption($opt_name, 'spcharityplus_extra_font_selector');
$custom_font_1 = !empty($custom_font_1) ? explode(',', $custom_font_1) : array();

$custom_font_2 = Redux::getOption($opt_name, 'spcharityplus_extra_font_selector2');
$custom_font_2 = !empty($custom_font_2) ? explode(',', $custom_font_2) : array();

Redux::setSection($opt_name, array(
    'title' => esc_html__('Extra Fonts', 'sp-charityplus'),
    'icon' => 'el el-fontsize',
    'subsection' => true,
    'fields' => array(
        array(
            'id'            => 'spcharityplus_extra_font',
            'type'          => 'typography',
            'title'         => esc_html__('Custom Font', 'sp-charityplus'),
            'google'        => true,
            'font-backup'   => true,
            'all_styles'    => true,
            'color'         => false,
            'font-style'    => false,
            'font-weight'   => false,
            'font-size'     => false,
            'line-height'   => false,
            'text-align'    => false,
            'output'        =>  $custom_font_1,
            'units'         => 'px',
            'subtitle'      => esc_html__('Choose a font for some special place.', 'sp-charityplus'),
            'default'       => array(
            )
        ),
        array(
            'id'        => 'spcharityplus_extra_font_selector',
            'type'      => 'textarea',
            'title'     => esc_html__('Selector', 'sp-charityplus'),
            'subtitle'  => esc_html__('add html tags ID or class (body,a,.class-name,#id-name)', 'sp-charityplus'),
            'validate'  => 'no_html',
            'default'   => '',
        ),
        array(
            'id'            => 'spcharityplus_extra_font2',
            'type'          => 'typography',
            'title'         => esc_html__('Custom Font 2', 'sp-charityplus'),
            'google'        => true,
            'font-backup'   => true,
            'all_styles'    => true,
            'color'         => false,
            'font-style'    => false,
            'font-weight'   => false,
            'font-size'     => false,
            'line-height'   => false,
            'text-align'    => false,
            'output'        =>  $custom_font_2,
            'units'         => 'px',
            'subtitle'      => esc_html__('Choose a font for some special place.', 'sp-charityplus'),
            'default'       => array(
            )
        ),
        array(
            'id'        => 'spcharityplus_extra_font_selector2',
            'type'      => 'textarea',
            'title'     => esc_html__('Selector', 'sp-charityplus'),
            'subtitle'  => esc_html__('add html tags ID or class (body,a,.class-name,#id-name)', 'sp-charityplus'),
            'validate'  => 'no_html',
            'default'   => '',
        )
    )
));
/**
 * Header 
 * @author Chinh Duong Manh
 * @since 1.0.0
*/
Redux::setSection($opt_name, array(
    'title' => esc_html__('Header', 'sp-charityplus'),
    'icon' => 'el-icon-credit-card',
    'fields' => array(
        array(
            'id'        => 'spcharityplus_header_layout',
            'title'     => esc_html__('Layouts', 'sp-charityplus'),
            'subtitle'  => esc_html__('select a layout for header', 'sp-charityplus'),
            'default'   => '',
            'type'      => 'image_select',
            'options'   => array(
                ''  => get_template_directory_uri().'/assets/images/header/v1.jpg',
                '2' => get_template_directory_uri().'/assets/images/header/v2.jpg',
                '3' => get_template_directory_uri().'/assets/images/header/v3.jpg',
                '4' => get_template_directory_uri().'/assets/images/header/v4.jpg',
                '5' => get_template_directory_uri().'/assets/images/header/v5.jpg',
            )
        ),
        $show_rev_slider,
        $show_rev_slider_list,
        $show_rev_slider_page,
        array(
            'title'    => esc_html__('Header Height', 'sp-charityplus'),
            'subtitle' => esc_html__('Add height for header.', 'sp-charityplus'),
            'id'       => 'spcharityplus_header_height',
            'type'     => 'dimensions',
            'units'    => array('px'),
            'width'    => false,
            'default'  => array(),
            'required' => array( 0 => 'spcharityplus_header_layout', 1 => '!=', 2 => 'v6' )
        ),
        array(
            'id'       => 'spcharityplus_header_menu',
            'type'     => 'select',
            'title'    => esc_html__('Header Menu', 'sp-charityplus'),
            'subtitle' => esc_html__('Choose the menu will show on header.', 'sp-charityplus'),
            'options'  => spcharityplus_get_nav_menu(),
            'default'  => 'all-pages',
        ),
        array(
            'title'    => esc_html__('Mega Menu', 'sp-charityplus'),
            'subtitle' => esc_html__('Enable mega menu', 'sp-charityplus'),
            'id'       => 'spcharityplus_enable_mega_menu',
            'type'     => 'switch',
            'default'  => false,
        ),
        array(
            'title'     => esc_html__('Widget for Mega menu', 'sp-charityplus'),
            'desc'      => esc_html__('You need manager widget in Widget Manager to get what you want to show in mega menu!', 'sp-charityplus'),
            'id'        => 'spcharityplus_mega_menu_wg',
            'type'      => 'slider',
            'min'       => 4,
            'max'       => 20,
            'default'   => 4,
            'display_value'     => 'label',
            'required'  => array('spcharityplus_enable_mega_menu', '=', 1)
        ),
        array(
            'title'    => esc_html__('Show Search', 'sp-charityplus'),
            'subtitle' => esc_html__('Show/Hide search icon', 'sp-charityplus'),
            'id'       => 'spcharityplus_show_header_search',
            'type'     => 'switch',
            'default'  => true,
        ),
        $show_wc_cart,
        array(
            'title'       => esc_html__('Show Tools', 'sp-charityplus'),
            'subtitle'    => esc_html__('Show/Hide tool icon', 'sp-charityplus'),
            'description' => esc_html__('When this options is ON, you need to add a widget to Header Tools area via Widget Manager', 'sp-charityplus'),
            'id'          => 'spcharityplus_show_header_tool',
            'type'        => 'switch',
            'default'     => false,
        ),
        array(
            'title'       => esc_html__('Show Tools on screen', 'sp-charityplus'),
            'description' => esc_html__('Tools icon show on what screen display', 'sp-charityplus'),
            'id'          => 'spcharityplus_show_header_tool_screen',
            'type'        => 'button_set',
            'multi'       => true,
            'options' => array(
                '1' => esc_html__('Extra Small','sp-charityplus'), 
                '2' => esc_html__('Small','sp-charityplus'), 
                '3' => esc_html__('Medium','sp-charityplus'), 
                '4' => esc_html__('Large','sp-charityplus'), 
             ), 
            'default' => array('1', '2', '3'),
            'required'  => array('spcharityplus_show_header_tool', '=', 1)
        ),
        $show_donate,
        $show_donate_url,
        $show_donate_url2
    )
));

/* Header TOP section Option */
Redux::setSection($opt_name, array(
    'title'         => esc_html__('Header Top', 'sp-charityplus'),
    'heading'       => '',
    'icon'          => 'el-icon-credit-card',
    'subsection'    => true,
    'fields'        => array(
        array(
            'desc'      => esc_html__('This option just work on Header Layout 3, 5', 'sp-charityplus'),
            'id'        => 'spcharityplus_header_top_warning',
            'type'      => 'info',
            'style'     => 'warning',
            'required'  => array( 
                array('spcharityplus_header_layout', '=', array('','2','4')),
            )
        ),

        array(
            'title'     => esc_html__('Enable', 'sp-charityplus'),
            'desc'      => esc_html__('When this option is ON, you need to manage widget in Widget Manager too!', 'sp-charityplus'),
            'id'        => 'spcharityplus_header_top',
            'type'      => 'switch',
            'default'   => false,
            'required' => array(
                array('spcharityplus_header_layout', '=', array('3','5'))
            )
        ),
        
        array(
            'title'     => esc_html__('Typography', 'sp-charityplus'),
            'subtitle'      => esc_html__('Choose typography style', 'sp-charityplus'),
            'id'        => 'spcharityplus_header_top_typo',
            'type'      => 'typography',
            'default'   => array(),
            'output'    => '#cms-header-top',

            'required' => array( 'spcharityplus_header_top', '=', true )
        ),
        array(
            'title'     => esc_html__('Heading Typography', 'sp-charityplus'),
            'subtitle'      => esc_html__('Choose style for heading tag: H1 -> H6', 'sp-charityplus'),
            'id'        => 'spcharityplus_header_top_typo_heading',
            'type'      => 'typography',
            'text-transform'    => true,
            'letter-spacing'    => true,
            'default'   => array(),
            'output'    => array(
                '#cms-header-top .wg-title',
                '#cms-header-top .widget-title',
                '#cms-header-top h1',
                '#cms-header-top h1 a',
                '#cms-header-top h2',
                '#cms-header-top h2 a',
                '#cms-header-top h3',
                '#cms-header-top h3 a',
                '#cms-header-top h4',
                '#cms-header-top h4 a',
                '#cms-header-top h5',
                '#cms-header-top h5 a',
                '#cms-header-top h6',
                '#cms-header-top h6 a',
            ),
            'required' => array( 'spcharityplus_header_top', '=', true )
        ),
        array(
            'title'     => esc_html__('Link Color', 'sp-charityplus'),
            'subtitle'      => esc_html__('Choose color style for \'a\' tag', 'sp-charityplus'),
            'id'        => 'spcharityplus_header_top_link',
            'type'      => 'link_color',
            'default'   => array(),
            'output'    => '#cms-header-top a',
            'required' => array( 'spcharityplus_header_top', '=', true )
        ),
        array(
            'title'     => esc_html__('Padding', 'sp-charityplus'),
            'desc'      => esc_html__('Choose space style: Top, Right, Bottom, Left', 'sp-charityplus'),
            'id'        => 'spcharityplus_header_top_padding',
            'type'      => 'spacing',
            'mode'      => 'padding',
            'units'     => array('px'),
            'default'   => array(),
            'output'    => '#cms-header-top > div',
            'required' => array( 'spcharityplus_header_top', '=', true )
        ),
        array(
            'title'     => esc_html__('Background Color', 'sp-charityplus'),
            'desc'      => esc_html__('Choose background color style', 'sp-charityplus'),
            'id'        => 'spcharityplus_header_top_background',
            'type'      => 'color_rgba',
            'default'   => array(),
            'output'    => array(
                'background-color' => '.cms-header-5 #cms-header-top'
            ),
            'required' => array( 
                array('spcharityplus_header_top', '=', true ),
                array('spcharityplus_header_layout', '=', '5' )
            )
        ),
    )
));
/* Logo Option */
Redux::setSection($opt_name, array(
    'title'         => esc_html__('Logo', 'sp-charityplus'),
    'heading'       => '',
    'icon'          => 'el-icon-picture',
    'subsection'    => true,
    'fields'        => array(
        
        array(
            'id'        => 'spcharityplus_logo_type',
            'title'     => esc_html__('Logo Type', 'sp-charityplus'),
            'subtitle'  => esc_html__('Choose your logo is Text or Image', 'sp-charityplus'),
            'default'   => '1',
            'type'      => 'select',
            'options'   => array(
                '1'     => esc_html__('Image','sp-charityplus'),
                '2'     => esc_html__('Text','sp-charityplus'),
            )
        ),
        array(
            'title'     => esc_html__('Logo Width', 'sp-charityplus'),
            'subtitle'  => esc_html__('Fixed width for logo!', 'sp-charityplus'),
            'id'        => 'spcharityplus_logo_size',
            'type'      => 'dimensions',
            'units'     => array('px'),
            'height'    => false,
            'default'   => array(
            ),
            'output'    => '',
        ),
        array(
            'title'     => esc_html__('Logo Image', 'sp-charityplus'),
            'subtitle'  => esc_html__('Select an image file for your logo.', 'sp-charityplus'),
            'id'        => 'spcharityplus_main_logo',
            'type'      => 'media',
            'url'       => true,
            'default'   => array(),
            'required'  => array( 
                array( 'spcharityplus_logo_type', '=', 1), 
            ),
        ),
        
        array(
            'title'     => esc_html__('Logo Text', 'sp-charityplus'),
            'subtitle'  => esc_html__('Enter the text for your logo.', 'sp-charityplus'),
            'id'        => 'spcharityplus_main_logo_text',
            'type'      => 'text',
            'required'  => array( 
                array( 'spcharityplus_logo_type', '=', 2), 
            ),
        ),
        array(
            'title'     => esc_html__('Slogan', 'sp-charityplus'),
            'subtitle'  => esc_html__('Enter the text for your slogan.', 'sp-charityplus'),
            'id'        => 'spcharityplus_main_logo_slogan',
            'type'      => 'text',
        ),
    )
));
/* Header Default */
Redux::setSection($opt_name, array(
    'title'         => esc_html__('Header Default', 'sp-charityplus'),
    'heading'       => '',
    'icon'          => 'el-icon-credit-card',
    'subsection'    => true,
    'fields'        => array(
        array(
            'title'     => esc_html__('Background Color', 'sp-charityplus'),
            'subtitle'  => esc_html__('choose Background color style.', 'sp-charityplus'),
            'id'        => 'spcharityplus_header_bg_color',
            'type'      => 'color_rgba',
            'default'   => array(),
            'output'    => array(
                'background-color' => '.header-default',
            ),
        ),
        array(
            'title'     => esc_html__('Background Image', 'sp-charityplus'),
            'subtitle'  => esc_html__('choose Background image style.', 'sp-charityplus'),
            'id'        => 'spcharityplus_header_bg',
            'type'      => 'background',
            'background-color'  => false,
            'default'   => array(),
            'output'    => array('.header-default')
        ),
        array(
            'title'     => esc_html__('Typography', 'sp-charityplus'),
            'subtitle'  => esc_html__('This option just applied for Menu first level', 'sp-charityplus'),
            'id'        => 'spcharityplus_header_typo',
            'type'      => 'typography',
            'text-transform'    => true,
            'letter-spacing'    => true,
            'line-height'       => false,
            'color'             => false,
            'text-align'        => false,
            'font-style'        => false,
            'default'           => array(),
            'output'    => array('.cms-nav-extra','div.cms-main-navigation > ul > li > a')
        ),
        array(
            'title'     => esc_html__('Link Color', 'sp-charityplus'),
            'subtitle'  => esc_html__('This option just applied for Menu first level', 'sp-charityplus'),
            'id'        => 'spcharityplus_header_fl_color',
            'type'      => 'link_color',
            'default'   => array(),
            'output'    => array()
        ),
    )
));

/* Header on Top */
Redux::setSection($opt_name, array(
    'title'         => esc_html__('Header on Top', 'sp-charityplus'),
    'heading'       => '',
    'icon'          => 'el-icon-credit-card',
    'subsection'    => true,
    'fields'        => array(
        array(
            'title'     => esc_html__('Header on Top', 'sp-charityplus'),
            'subtitle'  => esc_html__('enable on top header.', 'sp-charityplus'),
            'id'        => 'spcharityplus_header_ontop',
            'type'      => 'switch',
            'default'   => false,
        ),
        array(
            'id'        => 'spcharityplus_header_ontop_page',
            'title'     => esc_html__('Page', 'sp-charityplus'),
            'type'      => 'select',
            'data'      => 'pages',
            'multi'     => 'true',
            'placeholder'   => esc_html__('Choose page you want applied Header On Top. If empty, Header On Top will applied for all page','sp-charityplus'),
            'required'  => array( 0 => 'spcharityplus_header_ontop', '=', 1 )
        ),
        array(
            'title'     => esc_html__('Logo Image', 'sp-charityplus'),
            'subtitle'  => esc_html__('Select an image file for your logo.', 'sp-charityplus'),
            'id'        => 'spcharityplus_header_ontop_logo',
            'type'      => 'media',
            'url'       => true,
            'default'   => array(),
            'required'  => array( 
                array( 'spcharityplus_header_ontop', '=', 1), 
                array( 'spcharityplus_logo_type', '=', 1), 
            ),
        ),
        array(
            'title'     => esc_html__('Background Color', 'sp-charityplus'),
            'subtitle'  => esc_html__('choose Background color style.', 'sp-charityplus'),
            'id'        => 'spcharityplus_header_ontop_bg_color',
            'type'      => 'color_rgba',
            'default'   => array(),
            'required'  => array( 
                array( 'spcharityplus_header_ontop', '=', 1), 
            ),
            'output'    => array(
                'background-color' => '#cms-header.header-ontop'
            ),
        ),
        array(
            'title'     => esc_html__('Background Image', 'sp-charityplus'),
            'subtitle'  => esc_html__('choose Background image style.', 'sp-charityplus'),
            'id'        => 'spcharityplus_header_ontop_bg',
            'type'      => 'background',
            'background-color'  => false,
            'default'   => array(),
            'required'  => array( 
                array( 'spcharityplus_header_ontop', '=', 1), 
            ),
            'output'    => array(),
        ),
        array(
            'title'     => esc_html__('Typography', 'sp-charityplus'),
            'subtitle'  => esc_html__('This option just applied for Menu first level', 'sp-charityplus'),
            'id'        => 'spcharityplus_header_ontop_typo',
            'type'      => 'typography',
            'text-transform'    => true,
            'letter-spacing'    => true,
            'line-height'       => false,
            'color'             => false,
            'text-align'        => false,
            'font-style'        => false,
            'font-weight'       => false,
            'default'           => array(),
            'required'  => array( 
                array( 'spcharityplus_header_ontop', '=', 1), 
            ),
            'output'    => array()
        ),
        array(
            'title'     => esc_html__('Link Color', 'sp-charityplus'),
            'subtitle'  => esc_html__('This option just applied for Menu first level', 'sp-charityplus'),
            'id'        => 'spcharityplus_header_ontop_fl_color',
            'type'      => 'link_color',
            'default'   => array(),
            'required'  => array( 
                array( 'spcharityplus_header_ontop', '=', 1), 
            ),
            'output'    => array()
        ),
    )
));
/* Sticky Header */
Redux::setSection($opt_name, array(
    'title'      => esc_html__('Sticky Header', 'sp-charityplus'),
    'heading'    => '',
    'icon'       => 'el-icon-credit-card',
    'subsection' => true,
    'fields'     => array(
        array(
            'title'     => esc_html__('Sticky Header', 'sp-charityplus'),
            'subtitle'  => esc_html__('enable sticky header.', 'sp-charityplus'),
            'id'        => 'spcharityplus_header_sticky',
            'type'      => 'switch',
            'default'   => false,
        ),
        array(
            'title'     => esc_html__('Select Logo', 'sp-charityplus'),
            'subtitle'  => esc_html__('Select an image file for your logo.', 'sp-charityplus'),
            'id'        => 'spcharityplus_header_sticky_logo',
            'type'      => 'media',
            'url'       => true,
            'default'   => array(),
            'required'  => array( 
                array( 'spcharityplus_header_sticky', '=', true), 
                array( 'spcharityplus_logo_type', '=', 1), 
            ),
        ),
        /* Sticky header default */
        array(
            'title'     => esc_html__('Background Color', 'sp-charityplus'),
            'subtitle'  => esc_html__('choose Background color style.', 'sp-charityplus'),
            'id'        => 'spcharityplus_header_sticky_bg_color',
            'type'      => 'color_rgba',
            'default'   => array(),
            'required'  => array( 
                array( 'spcharityplus_header_sticky', '=', true),
                array( 'spcharityplus_header_layout', '!=', '3'),
            ),
            'output'    => array(
                'background-color' => '#cms-header.header-sticky'
            ),
        ),
        array(
            'title'     => esc_html__('Background Image', 'sp-charityplus'),
            'subtitle'  => esc_html__('choose Background image style.', 'sp-charityplus'),
            'id'        => 'spcharityplus_header_sticky_bg',
            'type'      => 'background',
            'background-color'  => false,
            'default'   => array(),
            'required'  => array( 
                array( 'spcharityplus_header_sticky', '=', true),
                array( 'spcharityplus_header_layout', '!=', '3'),
            ),
            'output'    => array('#cms-header.header-sticky'),
        ),
        /* Sticky header layout 3*/
        array(
            'title'     => esc_html__('Background Color', 'sp-charityplus'),
            'subtitle'  => esc_html__('choose Background color style.', 'sp-charityplus'),
            'id'        => 'spcharityplus_header3_sticky_bg_color',
            'type'      => 'color_rgba',
            'default'   => array(),
            'required'  => array( 
                array( 'spcharityplus_header_sticky', '=', true), 
                array( 'spcharityplus_header_layout', '=', '3'), 
            ),
            'output'    => array(
                'background-color' => '.cms-header-3 #cms-header.header-sticky .nav-wrap'
            ),
        ),
        array(
            'title'     => esc_html__('Background Image', 'sp-charityplus'),
            'subtitle'  => esc_html__('choose Background image style.', 'sp-charityplus'),
            'id'        => 'spcharityplus_header3_sticky_bg',
            'type'      => 'background',
            'background-color'  => false,
            'default'   => array(),
            'required'  => array( 
                array( 'spcharityplus_header_sticky', '=', true),
                array( 'spcharityplus_header_layout', '=', '3'),
            ),
            'output'    => array('.cms-header-3 #cms-header.header-sticky .nav-wrap'),
        ),
        array(
            'title'     => esc_html__('Typography', 'sp-charityplus'),
            'subtitle'  => esc_html__('This option just applied for Menu first level', 'sp-charityplus'),
            'id'        => 'spcharityplus_header_sticky_typo',
            'type'      => 'typography',
            'text-transform'    => true,
            'letter-spacing'    => true,
            'line-height'       => false,
            'color'             => false,
            'text-align'        => false,
            'font-style'        => false,
            'font-weight'       => false,
            'default'           => array(),
            'required'  => array( 
                array( 'spcharityplus_header_sticky', '=', 1), 
            ),
            'output'    => array()
        ),
        array(
            'title'     => esc_html__('Link Color', 'sp-charityplus'),
            'subtitle'  => esc_html__('This option just applied for Menu first level', 'sp-charityplus'),
            'id'        => 'spcharityplus_header_sticky_fl_color',
            'type'      => 'link_color',
            'default'   => array(),
            'required'  => array( 
                array( 'spcharityplus_header_sticky', '=', 1), 
            ),
            'output'    => array()
        ),
    )
));

/* Dropdown & Mobile Menu */
Redux::setSection($opt_name, array(
    'title'      => esc_html__('Dropdown & Mobile', 'sp-charityplus'),
    'heading'    => esc_html__('All style in this section will apply for Dropdown & Mobile Menu','sp-charityplus'),
    'icon'       => 'dashicons dashicons-networking',
    'subsection' => true,
    'fields'     => array(
        array(
            'title'     => esc_html__('Background', 'sp-charityplus'),
            'subtitle'  => esc_html__('Choose background style.', 'sp-charityplus'),
            'id'        => 'spcharityplus_header_dropdown_mobile_bg',
            'type'      => 'background',
            'default'   => array(
                'background-color'      => ''
            ),
            'output'    => array()
        ),
        array(
            'title'     => esc_html__('Typography', 'sp-charityplus'),
            'subtitle'  => esc_html__('Choose typography style.', 'sp-charityplus'),
            'id'        => 'spcharityplus_header_dropdown_mobile_typo',
            'type'      => 'typography',
            'text-transform'    => true,
            'letter-spacing'    => true,
            'color'             => false,
            'default'   => array(),
            'output'    => array()
        ),
        array(
            'title'     => esc_html__('Link Color', 'sp-charityplus'),
            'subtitle'  => esc_html__('Choose color for menu in Dropdown & Mobile', 'sp-charityplus'),
            'id'        => 'spcharityplus_header_dropdown_mobile_color',
            'type'      => 'link_color',
            'default'   => array(),
            'output'    => array()
        ),
    )
));
/**
 * Page Title & BC
 *
 * @author Chinh Duong Manh
 * @since 1.0.0
 */
Redux::setSection($opt_name, array(
    'title'     => esc_html__('Page Title & BC', 'sp-charityplus'),
    'icon'      => 'el-icon-map-marker',
    'fields'    => array(
        array(
            'title'     => esc_html__('Enable Page title and Breadcrumb', 'sp-charityplus'),
            'subtitle'  => '',
            'id'        => 'spcharityplus_page_title',
            'type'      => 'switch',
            'default'   => true
        ),
        array(
            'id'        => 'spcharityplus_page_title_layout',
            'title'     => esc_html__('Layouts', 'sp-charityplus'),
            'subtitle'  => esc_html__('select a layout for page title', 'sp-charityplus'),
            'default'   => '1',
            'type'      => 'image_select',
            'options'   => array(
                '1' => get_template_directory_uri().'/assets/images/pagetitle/pt-s-1.png',
                '2' => get_template_directory_uri().'/assets/images/pagetitle/pt-s-2.png',
                '3' => get_template_directory_uri().'/assets/images/pagetitle/pt-s-3.png',
                '4' => get_template_directory_uri().'/assets/images/pagetitle/pt-s-4.png',
                '5' => get_template_directory_uri().'/assets/images/pagetitle/pt-s-5.png',
                '6' => get_template_directory_uri().'/assets/images/pagetitle/pt-s-6.png',
            ),
            'required'  => array( 
                array( 'spcharityplus_page_title', '=', 1), 
            ),
        ),
        array(
            'id'        => 'spcharityplus_page_title_align',
            'title'     => esc_html__('Content Align', 'sp-charityplus'),
            'subtitle'  => esc_html__('choose text align for page title', 'sp-charityplus'),
            'default'   => 'text-start',
            'type'      => 'select',
            'options'   => array(
                'text-start'    => esc_html__('Default','sp-charityplus'),
                'text-left'     => esc_html__('Left','sp-charityplus'),
                'text-right'    => esc_html__('Right','sp-charityplus'),
                'text-center'   => esc_html__('Center','sp-charityplus'),
            ),
            'required'  => array( 
                array( 'spcharityplus_page_title', '=', 1),
            )
        ),
        array(
            'id'        => 'spcharityplus_page_title_bg',
            'title'     => esc_html__('Background', 'sp-charityplus'),
            'subtitle'  => esc_html__('Choose background style', 'sp-charityplus'),
            'default'   => array(),
            'type'      => 'background',
            'output'    => array('#cms-page-title-wrapper'),
            'required'  => array( 
                array( 'spcharityplus_page_title', '=', 1), 
            ),
        ),
        array(
            'id'        => 'spcharityplus_page_title_bg_overlay',
            'title'     => esc_html__('Overlay Background', 'sp-charityplus'),
            'subtitle'  => esc_html__('Choose overlay background color', 'sp-charityplus'),
            'default'   => array(),
            'type'      => 'color_rgba',
            'output'    => array(
                'background-color' => '#cms-page-title-wrapper:before'
            ),
            'required'  => array( 
                array( 'spcharityplus_page_title', '=', 1), 
            ),
        ),
        array(
            'id'        => 'spcharityplus_page_title_padding',
            'title'     => esc_html__('Padding', 'sp-charityplus'),
            'subtitle'  => esc_html__('Enter padding', 'sp-charityplus'),
            'type'      => 'spacing',
            'mode'      => 'padding',
            'units'     => array('px'),
            'default'   => array(),
            'output'    => array('#cms-page-title-wrapper'),
            'required'  => array( 
                array( 'spcharityplus_page_title', '=', 1), 
            ),
        ),
        array(
            'id'        => 'spcharityplus_page_title_margin',
            'title'     => esc_html__('Margin', 'sp-charityplus'),
            'subtitle'  => esc_html__('Enter margin', 'sp-charityplus'),
            'type'      => 'spacing',
            'mode'      => 'margin',
            'units'     => array('px'),
            'default'   => array(),
            'output'    => array('#cms-page-title-wrapper'),
            'required'  => array( 
                array( 'spcharityplus_page_title', '=', 1), 
            ),
        ),
    )
));

/* Page title  */
Redux::setSection($opt_name, array(
    'icon'          => 'el-icon-random',
    'title'         => esc_html__('Page title', 'sp-charityplus'),
    'heading'       => '',
    'subsection'    => true,
    'fields'        => array(
        array(
            'title'     => esc_html__('Typography for page title', 'sp-charityplus'),
            'id'        => 'spcharityplus_pagetitle_typo',
            'type'      => 'typography',
            'text-transform'    => true,
            'letter-spacing'    => true,
            'text-align'        => false,
            'default'   => array(),
            'output'    => array('.cms-page-title-text')
        )
    )
));

/* Breadcrumb */
Redux::setSection($opt_name, array(
    'icon' => 'el-icon-random',
    'title' => esc_html__('Breadcrumb', 'sp-charityplus'),
    'subsection' => true,
    'fields' => array(
        array(
            'title'     => esc_html__('Typography for Breadcrumb', 'sp-charityplus'),
            'id'        => 'spcharityplus_breadcrumb_typo',
            'type'      => 'typography',
            'text-transform'    => true,
            'letter-spacing'    => true,
            'text-align'        => false,
            'default'   => array(),
            'output'    => array('#cms-breadcrumb')
        ),
        array(
            'title'     => esc_html__('Link Color', 'sp-charityplus'),
            'id'        => 'spcharityplus_breadcrumb_link_color',
            'type'      => 'link_color',
            'active'    => false,
            'default'   => array(),
            'output'    => array('#cms-breadcrumb a')
        )
    )
));
/**
 * Main Content
 *
 * @author Chinh Duong Manh
 * @since 1.0.0
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Content', 'sp-charityplus'),
    'icon' => 'el el-website',
    'fields' => array(
        array(
            'title'     => esc_html__('Background', 'sp-charityplus'),
            'subtitle'  => esc_html__('Choose background style', 'sp-charityplus'),
            'id'        => 'spcharityplus_main_bg',
            'type'      => 'background',
            'default'   => array(),
            'output'    => array('#cms-main')
        ),
        array(
            'title'     => esc_html__('Padding', 'sp-charityplus'),
            'subtitle'  => esc_html__('Choose space for: Top, Right, Bottom, Left', 'sp-charityplus'),
            'id'        => 'spcharityplus_main_padding',
            'type'      => 'spacing',
            'mode'      => 'padding',
            'units'     => array('px'),
            'default'   => array(),
            'output'    => array('#cms-main')
        ),
    )
));
/**
 * Page Options
 *
 * @author Chinh Duong Manh
 * @since 1.0.0
 */
Redux::setSection($opt_name, array(
    'title'         => esc_html__('Page Options', 'sp-charityplus'),
    'icon'          => 'dashicons dashicons-schedule',
    'subsection'    => true,
    'fields'        => array(
        array(
            'id'        => 'spcharityplus_page_layout',
            'title'     => esc_html__('Page layout', 'sp-charityplus'),
            'description'  => esc_html__('This layout apply for page template layout', 'sp-charityplus'),
            'type'      => 'button_set',
            'options' => array(
                'left'     => esc_html__('Left Sidebar','sp-charityplus'), 
                'full'     => esc_html__('No Sidebar','sp-charityplus'),
                'right'     => esc_html__('Right Sidebar','sp-charityplus'), 
            ), 
            'default'   => 'full',
        ),
        array(
            'id'        => 'spcharityplus_page_sidebar',
            'title'     => esc_html__('Sidebar', 'sp-charityplus'),
            'placeholder'  => esc_html__('select a widget area for page', 'sp-charityplus'),
            'type'      => 'select',
            'data'      => 'sidebars',
            'default'   => 'sidebar-1',
            'required'  => array( 0 => 'spcharityplus_page_layout', 1 => '!=', 2 => 'full' )
        )
    )
));
/**
 * Blog Options
 *
 * @author Chinh Duong Manh
 * @since 1.0.0
 */
Redux::setSection($opt_name, array(
    'title'         => esc_html__('Archives Options', 'sp-charityplus'),
    'icon'          => 'dashicons dashicons-schedule',
    'subsection'    => true,
    'fields'        => array(
        array(
            'id'        => 'spcharityplus_archive_layout',
            'title'     => esc_html__('Archives page layout', 'sp-charityplus'),
            'description'  => esc_html__('This layout apply for archives page: Recent Post, Category, Tag, Author, Search result, Taxonomy, ...', 'sp-charityplus'),
            'type'      => 'button_set',
            'options' => array(
                'left'     => esc_html__('Left Sidebar','sp-charityplus'), 
                'full'     => esc_html__('No Sidebar','sp-charityplus'),
                'right'     => esc_html__('Right Sidebar','sp-charityplus'), 
            ), 
            'default'   => 'right',
        ),
        array(
            'id'        => 'spcharityplus_archive_sidebar',
            'title'     => esc_html__('Sidebar', 'sp-charityplus'),
            'placeholder'  => esc_html__('select a widget area for archive page', 'sp-charityplus'),
            'type'      => 'select',
            'data'      => 'sidebars',
            'default'   => 'sidebar-1',
            'required'  => array( 0 => 'spcharityplus_archive_layout', 1 => '!=', 2 => 'full' )
        ),
        array(
            'id'        => 'spcharityplus_archive_content_layout',
            'title'     => esc_html__('Content Layouts', 'sp-charityplus'),
            'subtitle'  => esc_html__('select a layout for content', 'sp-charityplus'),
            'default'   => 'default',
            'type'      => 'image_select',
            'options'   => array(
                '' => get_template_directory_uri().'/assets/images/archive/content.jpg',
                'list' => get_template_directory_uri().'/assets/images/archive/content-list.jpg',
            ),
            'default'   => ''
        ),
        array(
            'title'     => esc_html__('Show Author', 'sp-charityplus'),
            'subtitle'  => esc_html__('Show/Hide post author', 'sp-charityplus'),
            'id'        => 'spcharityplus_archive_post_author',
            'type'      => 'switch',
            'default'   => true,
        ),
        array(
            'title'     => esc_html__('Show Date', 'sp-charityplus'),
            'subtitle'  => esc_html__('Show/Hide post date', 'sp-charityplus'),
            'id'        => 'spcharityplus_archive_post_date',
            'type'      => 'switch',
            'default'   => true,
        ),
        array(
            'title'     => esc_html__('Show Category', 'sp-charityplus'),
            'subtitle'  => esc_html__('Show/Hide post categories', 'sp-charityplus'),
            'id'        => 'spcharityplus_archive_post_category',
            'type'      => 'switch',
            'default'   => false,
        ),
        array(
            'title'     => esc_html__('Show tags', 'sp-charityplus'),
            'subtitle'  => esc_html__('Show/Hide post tags', 'sp-charityplus'),
            'id'        => 'spcharityplus_archive_archive_post_tags',
            'type'      => 'switch',
            'default'   => false,
        ),
        array(
            'title'     => esc_html__('Show Comment', 'sp-charityplus'),
            'subtitle'  => esc_html__('Show/Hide post comment count', 'sp-charityplus'),
            'id'        => 'spcharityplus_archive_post_comment',
            'type'      => 'switch',
            'default'   => false,
        ),
        array(
            'title'     => esc_html__('Show Views', 'sp-charityplus'),
            'subtitle'  => esc_html__('Show/Hide post view count', 'sp-charityplus'),
            'id'        => 'spcharityplus_archive_post_view',
            'type'      => 'switch',
            'default'   => false,
        ),
        array(
            'title'     => esc_html__('Show Like', 'sp-charityplus'),
            'subtitle'  => esc_html__('Show/Hide post Like count', 'sp-charityplus'),
            'id'        => 'spcharityplus_archive_post_like',
            'type'      => 'switch',
            'default'   => false,
        ),
        array(
            'title'     => esc_html__('Show Share', 'sp-charityplus'),
            'subtitle'  => esc_html__('Show/Hide share to', 'sp-charityplus'),
            'id'        => 'spcharityplus_archive_post_share',
            'type'      => 'switch',
            'default'   => false,
        ),
        array(
            'title'     => esc_html__('Read More', 'sp-charityplus'),
            'subtitle'  => esc_html__('Show/Hide Read More button', 'sp-charityplus'),
            'id'        => 'spcharityplus_archive_post_readmore',
            'type'      => 'switch',
            'default'   => true,
        ),
    )
));


/**
 * Single Post
 *
 * @author Chinh Duong Manh
 * @since 1.0.0
 */
Redux::setSection($opt_name, array(
    'title'         => esc_html__('Single Post', 'sp-charityplus'),
    'icon'          => 'dashicons dashicons-align-left',
    'subsection'    => true,
    'fields'        => array(
        array(
            'title'     => esc_html__('Single Layout', 'sp-charityplus'),
            'subtitle'  => esc_html__('Choose a layout for single post page', 'sp-charityplus'),
            'id'        => 'spcharityplus_single_post_layout',
            'type'      => 'button_set',
            'options'   => array(
                'left'     => esc_html__('Left Sidebar','sp-charityplus'),
                'full'     => esc_html__('No Sidebar','sp-charityplus'),
                'right'     => esc_html__('Right Sidebar','sp-charityplus'),
            ),
            'default'   => 'right',
        ),
        array(
            'id'        => 'spcharityplus_single_post_sidebar',
            'title'     => esc_html__('Sidebar', 'sp-charityplus'),
            'placeholder'  => esc_html__('select a widget area for single post page', 'sp-charityplus'),
            'type'      => 'select',
            'data'      => 'sidebars',
            'default'   => 'sidebar-1',
            'required'  => array( 0 => 'spcharityplus_single_post_layout', 1 => '!=', 2 => 'full' )
        ),
        array(
            'title'     => esc_html__('Show Date', 'sp-charityplus'),
            'subtitle'  => esc_html__('Show/Hide post date', 'sp-charityplus'),
            'id'        => 'spcharityplus_single_post_date',
            'type'      => 'switch',
            'default'   => true,
        ),
        array(
            'title'     => esc_html__('Show Author', 'sp-charityplus'),
            'subtitle'  => esc_html__('Show/Hide post author', 'sp-charityplus'),
            'id'        => 'spcharityplus_single_post_author',
            'type'      => 'switch',
            'default'   => true,
        ),
        array(
            'title'     => esc_html__('Show Category', 'sp-charityplus'),
            'subtitle'  => esc_html__('Show/Hide post categories', 'sp-charityplus'),
            'id'        => 'spcharityplus_single_post_category',
            'type'      => 'switch',
            'default'   => false,
        ),
        array(
            'title'     => esc_html__('Show tags', 'sp-charityplus'),
            'subtitle'  => esc_html__('Show/Hide post tags', 'sp-charityplus'),
            'id'        => 'spcharityplus_single_post_tags',
            'type'      => 'switch',
            'default'   => true,
        ),
        array(
            'title'     => esc_html__('Show Comment', 'sp-charityplus'),
            'subtitle'  => esc_html__('Show/Hide post comment count', 'sp-charityplus'),
            'id'        => 'spcharityplus_single_post_comment',
            'type'      => 'switch',
            'default'   => true,
        ),
        array(
            'title'     => esc_html__('Show Views', 'sp-charityplus'),
            'subtitle'  => esc_html__('Show/Hide post view count', 'sp-charityplus'),
            'id'        => 'spcharityplus_single_post_view',
            'type'      => 'switch',
            'default'   => false,
        ),
        array(
            'title'     => esc_html__('Show Like', 'sp-charityplus'),
            'subtitle'  => esc_html__('Show/Hide post Like count', 'sp-charityplus'),
            'id'        => 'spcharityplus_single_post_like',
            'type'      => 'switch',
            'default'   => false,
        ),
        array(
            'title'     => esc_html__('Show share', 'sp-charityplus'),
            'subtitle'  => esc_html__('Show/Hide icon to social site, like: facebook, twitter, google plus and linkedin', 'sp-charityplus'),
            'id'        => 'spcharityplus_single_post_share',
            'type'      => 'switch',
            'default'   => false,
        ),

        array(
            'title'     => esc_html__('Show about author', 'sp-charityplus'),
            'subtitle'  => esc_html__('Show/Hide author information', 'sp-charityplus'),
            'id'        => 'spcharityplus_single_post_author_info',
            'type'      => 'switch',
            'default'   => false,
        ),
        
        array(
            'title'     => esc_html__('Show Next / Preview Post', 'sp-charityplus'),
            'subtitle'  => esc_html__('Show/Hide Next / Preview link to other post', 'sp-charityplus'),
            'id'        => 'spcharityplus_single_post_nav',
            'type'      => 'switch',
            'default'   => true,
        ),

        array(
            'title'     => esc_html__('Show Related Post', 'sp-charityplus'),
            'subtitle'  => esc_html__('Show/Hide related post. Related post using Post Tag', 'sp-charityplus'),
            'id'        => 'spcharityplus_single_post_related',
            'type'      => 'switch',
            'default'   => false,
        ),
    )
));

/**
 * Extra Options
 *
 * Add some extra config for button, social media, ...
 * @author Chinh Duong Manh
 * @since 1.0.0
 */
Redux::setSection($opt_name, array(
    'title'         => esc_html__('Extra Options', 'sp-charityplus'),
    'heading'       => '',
    'icon'          => 'dashicons dashicons-plus-alt',
    'fields'        => array(
    )
));

/* Default */
Redux::setSection($opt_name, array(
    'title'         => esc_html__('Default Button', 'sp-charityplus'),
    'heading'       => esc_html__('Choose style for Default Button', 'sp-charityplus'),
    'icon'          => 'dashicons dashicons-editor-bold',
    'subsection'    => true,
    'fields'        => array(
        array(
            'title'     => esc_html__('Typography', 'sp-charityplus'),
            'subtitle'  => esc_html__('all style for: font-family, font-size, ...', 'sp-charityplus'),
            'id'        => 'spcharityplus_btn_default_typo',
            'type'      => 'typography',
            'text-transform'    => true,
            'letter-spacing'    => true,
            'color'             => false,
            'default'   => array(),
            'output'    => array()
        ),
        array(
            'title'     => esc_html__('Text Color', 'sp-charityplus'),
            'subtitle'  => esc_html__('choose style for color text of button', 'sp-charityplus'),
            'id'        => 'spcharityplus_btn_default_color',
            'type'      => 'link_color',
            'active'    => false,
            'default'   => array(),
            'output'    => array()
        ),
        array(
            'title'    => esc_html__('Border', 'sp-charityplus'),
            'subtitle' => esc_html__('Choose border style for default button', 'sp-charityplus'),
            'id'       => 'spcharityplus_btn_default_border',
            'type'     => 'border',
            'all'      => false,
            'output'   => array('.btn-default'),
            'default'  => array(
                'border-style'  => 'none'
            )
        ),
        array(
            'title'    => esc_html__('Border Radius', 'sp-charityplus'),
            'subtitle'     => esc_html__('This option will apply for button radius: Top, Right, Bottom, Left', 'sp-charityplus'),
            'id'       => 'spcharityplus_btn_default_border_radius',
            'type'     => 'dimensions',
            'height'   => false,
            'units'    => array('px'),
            'default'  => array(),
        ),
        array(
            'title'     => esc_html__('Background', 'sp-charityplus'),
            'subtitle'  => esc_html__('background style default', 'sp-charityplus'),
            'id'        => 'spcharityplus_btn_default_bg',
            'type'      => 'background',
            'default'   => array(),
            'output'    => array()
        ),
        array(
            'title'     => '',
            'subtitle'  => esc_html__('background style on mouse over', 'sp-charityplus'),
            'id'        => 'spcharityplus_btn_default_bg_hover',
            'type'      => 'background',
            'default'   => array(),
            'output'    => array()
        ),
    )
));
/* Primary */
Redux::setSection($opt_name, array(
    'title'         => esc_html__('Primary Button', 'sp-charityplus'),
    'heading'       => esc_html__('Choose style for Primary Button', 'sp-charityplus'),
    'icon'          => 'dashicons dashicons-editor-bold',
    'subsection'    => true,
    'fields'        => array(
        array(
            'title'     => esc_html__('Typography', 'sp-charityplus'),
            'subtitle'  => esc_html__('all style for: font-family, font-size, ...', 'sp-charityplus'),
            'id'        => 'spcharityplus_btn_primary_typo',
            'type'      => 'typography',
            'text-transform'    => true,
            'letter-spacing'    => true,
            'color'             => false,
            'default'   => array(),
            'output'    => array()
        ),
        array(
            'title'     => esc_html__('Text Color', 'sp-charityplus'),
            'subtitle'  => esc_html__('choose style for color text of button', 'sp-charityplus'),
            'id'        => 'spcharityplus_btn_primary_color',
            'type'      => 'link_color',
            'active'    => false,
            'default'   => array(),
            'output'    => array()
        ),
        array(
            'title'    => esc_html__('Border', 'sp-charityplus'),
            'subtitle' => esc_html__('Choose border style for primary button', 'sp-charityplus'),
            'id'       => 'spcharityplus_btn_primary_border',
            'type'     => 'border',
            'all'      => false,
            'output'   => array('.btn-primary'),
            'default'  => array(
                 'border-style'  => 'none'
            )
        ),
        array(
            'title'    => esc_html__('Border Radius', 'sp-charityplus'),
            'subtitle'     => esc_html__('This option will apply for button radius: Top, Right, Bottom, Left', 'sp-charityplus'),
            'id'       => 'spcharityplus_btn_primary_border_radius',
            'type'     => 'dimensions',
            'height'   => false,
            'units'    => array('px'),
            'default'  => array(),
        ),
        array(
            'title'     => esc_html__('Background', 'sp-charityplus'),
            'subtitle'  => esc_html__('background style default', 'sp-charityplus'),
            'id'        => 'spcharityplus_btn_primary_bg',
            'type'      => 'background',
            'default'   => array(),
            'output'    => array()
        ),
        array(
            'title'     => '',
            'subtitle'  => esc_html__('background style on mouse over', 'sp-charityplus'),
            'id'        => 'spcharityplus_btn_primary_bg_hover',
            'type'      => 'background',
            'default'   => array(),
            'output'    => array()
        ),
    )
));

/* Social Media  */

Redux::setSection($opt_name, array(
    'title'         => esc_html__('Social Link', 'sp-charityplus'),
    'heading'       => '',
    'icon'          => 'dashicons dashicons-share',
    'subsection'    => true,
    'fields'        => array(
        array(
            'title'     => esc_html__('Show in Header top', 'sp-charityplus'),
            'subtitle'  => esc_html__('Show all social link in Header Top section', 'sp-charityplus'),
            'id'        => 'spcharityplus_social_header_top',
            'type'      => 'switch',
            'default'   => false,
            'required'  => array( 
                array( 'spcharityplus_header_top', '=', 1),
                array( 'spcharityplus_social_number', '!=', 0), 
            ),
        ),
        array(
            'title'     => esc_html__('Show in Header', 'sp-charityplus'),
            'subtitle'  => esc_html__('Show all social link in Header section (beside the Main Navigation) ', 'sp-charityplus'),
            'id'        => 'spcharityplus_social_in_header',
            'type'      => 'switch',
            'default'   => false,
            'required'  => array( 
                array( 'spcharityplus_social_number', '!=', 0), 
            ),
        ),
        array(
            'title'     => esc_html__('Show in Footer', 'sp-charityplus'),
            'subtitle'  => esc_html__('Show all social link in Footer section', 'sp-charityplus'),
            'id'        => 'spcharityplus_social_footer',
            'type'      => 'switch',
            'default'   => true,
            'required'  => array( 
                array( 'spcharityplus_social_number', '!=', 0), 
            ),
        ),
        array(
            'title'     => esc_html__('Number of Social', 'sp-charityplus'),
            'subtitle'  => esc_html__('Choose the number of social link you want to use.', 'sp-charityplus'),
            'id'        => 'spcharityplus_social_number',
            'type'      => 'slider',
            "default"   => 5,
            "min"       => 0,
            "step"      => 1,
            "max"       => 10,
            'display_value' => 'label',
        ),
        array(
            'title'     => esc_html__('Link 1', 'sp-charityplus'),
            'subtitle'  => esc_html__('Enter a link', 'sp-charityplus'),
            'id'        => 'spcharityplus_social_link_1',
            'type'      => 'text',
            'default'   => 'https://facebook.com',
            'required'  => array( 
                array( 'spcharityplus_social_number', '!=', 0), 
            ),
        ),
        array(
            'title'     => esc_html__('Icon 1 class', 'sp-charityplus'),
            'subtitle'  => esc_html__('Enter class name of FontAwesome, ex: fa fa-facebook', 'sp-charityplus'),
            'id'        => 'spcharityplus_social_icon_1',
            'type'      => 'text',
            'default'   => 'fa fa-facebook',
            'required'  => array( 
                array( 'spcharityplus_social_number', '!=', 0), 
            ),
        ),
        array(
            'title'     => esc_html__('Link 2', 'sp-charityplus'),
            'subtitle'  => esc_html__('Enter a link', 'sp-charityplus'),
            'id'        => 'spcharityplus_social_link_2',
            'type'      => 'text',
            'default'   => 'https://twitter.com',
            'required'  => array( 
                array( 'spcharityplus_social_number', '=', array('2','3','4','5','6','7','8','9','10'))
            ),
        ),
        array(
            'title'     => esc_html__('Icon 2 class', 'sp-charityplus'),
            'subtitle'  => esc_html__('Enter class name of FontAwesome, ex: fa fa-facebook', 'sp-charityplus'),
            'id'        => 'spcharityplus_social_icon_2',
            'type'      => 'text',
            'default'   => 'fa fa-twitter',
            'required'  => array( 
                array( 'spcharityplus_social_number', '=', array('2','3','4','5','6','7','8','9','10')), 
            ),
        ),
        array(
            'title'     => esc_html__('Link 3', 'sp-charityplus'),
            'subtitle'  => esc_html__('Enter a link', 'sp-charityplus'),
            'id'        => 'spcharityplus_social_link_3',
            'type'      => 'text',
            'default'   => 'https://dribbble.com',
            'required'  => array( 
                array( 'spcharityplus_social_number', '=', array('3','4','5','6','7','8','9','10'))
            ),
        ),
        array(
            'title'     => esc_html__('Icon 3 class', 'sp-charityplus'),
            'subtitle'  => esc_html__('Enter class name of FontAwesome, ex: fa fa-facebook', 'sp-charityplus'),
            'id'        => 'spcharityplus_social_icon_3',
            'type'      => 'text',
            'default'   => 'fa fa-dribbble',
            'required'  => array( 
                array( 'spcharityplus_social_number', '=', array('3','4','5','6','7','8','9','10')), 
            ),
        ),
        array(
            'title'     => esc_html__('Link 4', 'sp-charityplus'),
            'subtitle'  => esc_html__('Enter a link', 'sp-charityplus'),
            'id'        => 'spcharityplus_social_link_4',
            'type'      => 'text',
            'default'   => 'https://plus.google.com',
            'required'  => array( 
                array( 'spcharityplus_social_number', '=', array('4','5','6','7','8','9','10'))
            ),
        ),
        array(
            'title'     => esc_html__('Icon 4 class', 'sp-charityplus'),
            'subtitle'  => esc_html__('Enter class name of FontAwesome, ex: fa fa-facebook', 'sp-charityplus'),
            'id'        => 'spcharityplus_social_icon_4',
            'type'      => 'text',
            'default'   => 'fa fa-google-plus',
            'required'  => array( 
                array( 'spcharityplus_social_number', '=', array('4','5','6','7','8','9','10')), 
            ),
        ),
        array(
            'title'     => esc_html__('Link 5', 'sp-charityplus'),
            'subtitle'  => esc_html__('Enter a link', 'sp-charityplus'),
            'id'        => 'spcharityplus_social_link_5',
            'type'      => 'text',
            'default'   => 'https://instagram.com',
            'required'  => array( 
                array( 'spcharityplus_social_number', '=', array('5','6','7','8','9','10'))
            ),
        ),
        array(
            'title'     => esc_html__('Icon 5 class', 'sp-charityplus'),
            'subtitle'  => esc_html__('Enter class name of FontAwesome, ex: fa fa-facebook', 'sp-charityplus'),
            'id'        => 'spcharityplus_social_icon_5',
            'type'      => 'text',
            'default'   => 'fa fa-instagram',
            'required'  => array( 
                array( 'spcharityplus_social_number', '=', array('5','6','7','8','9','10')), 
            ),
        ),
        array(
            'title'     => esc_html__('Link 6', 'sp-charityplus'),
            'subtitle'  => esc_html__('Enter a link', 'sp-charityplus'),
            'id'        => 'spcharityplus_social_link_6',
            'type'      => 'text',
            'default'   => '',
            'required'  => array( 
                array( 'spcharityplus_social_number', '=', array('6','7','8','9','10'))
            ),
        ),
        array(
            'title'     => esc_html__('Icon 6 class', 'sp-charityplus'),
            'subtitle'  => esc_html__('Enter class name of FontAwesome, ex: fa fa-facebook', 'sp-charityplus'),
            'id'        => 'spcharityplus_social_icon_6',
            'type'      => 'text',
            'default'   => '',
            'required'  => array( 
                array( 'spcharityplus_social_number', '=', array('6','7','8','9','10')), 
            ),
        ),
        array(
            'title'     => esc_html__('Link 7', 'sp-charityplus'),
            'subtitle'  => esc_html__('Enter a link', 'sp-charityplus'),
            'id'        => 'spcharityplus_social_link_7',
            'type'      => 'text',
            'default'   => '',
            'required'  => array( 
                array( 'spcharityplus_social_number', '=', array('7','8','9','10'))
            ),
        ),
        array(
            'title'     => esc_html__('Icon 7 class', 'sp-charityplus'),
            'subtitle'  => esc_html__('Enter class name of FontAwesome, ex: fa fa-facebook', 'sp-charityplus'),
            'id'        => 'spcharityplus_social_icon_7',
            'type'      => 'text',
            'default'   => '',
            'required'  => array( 
                array( 'spcharityplus_social_number', '=', array('7','8','9','10')), 
            ),
        ),
        array(
            'title'     => esc_html__('Link 8', 'sp-charityplus'),
            'subtitle'  => esc_html__('Enter a link', 'sp-charityplus'),
            'id'        => 'spcharityplus_social_link_8',
            'type'      => 'text',
            'default'   => '',
            'required'  => array( 
                array( 'spcharityplus_social_number', '=', array('8','9','10'))
            ),
        ),
        array(
            'title'     => esc_html__('Icon 8 class', 'sp-charityplus'),
            'subtitle'  => esc_html__('Enter class name of FontAwesome, ex: fa fa-facebook', 'sp-charityplus'),
            'id'        => 'spcharityplus_social_icon_8',
            'type'      => 'text',
            'default'   => '',
            'required'  => array( 
                array( 'spcharityplus_social_number', '=', array('8','9','10')), 
            ),
        ),
        array(
            'title'     => esc_html__('Link 9', 'sp-charityplus'),
            'subtitle'  => esc_html__('Enter a link', 'sp-charityplus'),
            'id'        => 'spcharityplus_social_link_9',
            'type'      => 'text',
            'default'   => '',
            'required'  => array( 
                array( 'spcharityplus_social_number', '=', array('9','10'))
            ),
        ),
        array(
            'title'     => esc_html__('Icon 9 class', 'sp-charityplus'),
            'subtitle'  => esc_html__('Enter class name of FontAwesome, ex: fa fa-facebook', 'sp-charityplus'),
            'id'        => 'spcharityplus_social_icon_9',
            'type'      => 'text',
            'default'   => '',
            'required'  => array( 
                array( 'spcharityplus_social_number', '=', array('9','10')), 
            ),
        ),
        array(
            'title'     => esc_html__('Link 10', 'sp-charityplus'),
            'subtitle'  => esc_html__('Enter a link', 'sp-charityplus'),
            'id'        => 'spcharityplus_social_link_10',
            'type'      => 'text',
            'default'   => '',
            'required'  => array( 
                array( 'spcharityplus_social_number', '=', array('10'))
            ),
        ),
        array(
            'title'     => esc_html__('Icon 10 class', 'sp-charityplus'),
            'subtitle'  => esc_html__('Enter class name of FontAwesome, ex: fa fa-facebook', 'sp-charityplus'),
            'id'        => 'spcharityplus_social_icon_10',
            'type'      => 'text',
            'default'   => '',
            'required'  => array( 
                array( 'spcharityplus_social_number', '=', array('10')), 
            ),
        ),
    )
));
/**
 * Footer
 *
 * @author Chinh Duong Manh
 * @since 1.0.0
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Footer', 'sp-charityplus'),
    'icon' => 'el el-icon-credit-card',
    'fields' => array(
        array(
            'title'     => esc_html__('Border', 'sp-charityplus'),
            'subtitle'  => esc_html__('Choose border style', 'sp-charityplus'),
            'id'        => 'spcharityplus_footer_border',
            'type'      => 'border',
            'all'       => 'false',
            'units'      => array('px'),
            'default'   => array(
                'border-style'  => 'none'
            ),
            'output'    => array('#cms-footer') 
        ),
        array(
            'title'     => esc_html__('Margin', 'sp-charityplus'),
            'subtitle'  => esc_html__('Enter outer spacing', 'sp-charityplus'),
            'id'        => 'spcharityplus_footer_margin',
            'type'      => 'spacing',
            'mode'      => 'margin',
            'units'      => array('px'),
            'default'   => array(
                'margin-top'  =>  ''
            ),
            'output'    => array('#cms-footer') 
        ),
        
    )
));
Redux::setSection($opt_name, array(
    'title' => esc_html__('Footer Top', 'sp-charityplus'),
    'icon' => '',
    'subsection' => true,
    'fields' => array(
        
        array(
            'title'     => esc_html__('Columns', 'sp-charityplus'),
            'desc'      => esc_html__('When you choose this option, you need manager widget in Widget Manager too!', 'sp-charityplus'),
            'id'        => 'spcharityplus_footer_top_column',
            'type'      => 'slider',
            'min'       => 0,
            'max'       => 5,
            'default'   => 0,
            'display_value'     => 'label'
        ),
        array(
            'title' => esc_html__('Layout', 'sp-charityplus'),
            'subtitle' => esc_html__('Choose footer top layout', 'sp-charityplus'),
            'id' => 'spcharityplus_footer_top_layout',
            'type'      => 'image_select',
            'options'   => array(
                '1' => get_template_directory_uri().'/assets/images/footer/ft1.png',
                '2' => get_template_directory_uri().'/assets/images/footer/ft2.png',
                '3' => get_template_directory_uri().'/assets/images/footer/ft3.png',
                '4' => get_template_directory_uri().'/assets/images/footer/ft4.png',
            ),
            'default'   => '1',
            'required'  => array( 
                array( 'spcharityplus_footer_top_column', '!=', 0), 
            ),
        ),
        array(
           'id'       => 'spcharityplus_footer_top_layout1',
           'type'     => 'section',
           'title'    => esc_html__('Layout 1', 'sp-charityplus'),
           'subtitle' => esc_html__('Choose style for layout 1', 'sp-charityplus'),
           'indent'   => true,
           'required'  => array( 
                array( 'spcharityplus_footer_top_column', '!=', 0), 
            ),
        ),
            array(
                'title'     => esc_html__('Typography', 'sp-charityplus'),
                'id'        => 'spcharityplus_footer_top_typo',
                'type'      => 'typography',
                'text-transform'    => true,
                'letter-spacing'    => true,
                'default'   => array(),
                'output'    => array('#cms-footer-top.layout1'),
                'required'  => array( 
                    array( 'spcharityplus_footer_top_column', '!=', 0), 
                ),
            ),
            array(
                'title'     => esc_html__('Heading Typography', 'sp-charityplus'),
                'id'        => 'spcharityplus_footer_top_typo_heading',
                'type'      => 'typography',
                'text-transform'    => true,
                'letter-spacing'    => true,
                'line-height'       => false,
                'default'   => array(),
                'output'    => array(
                    '#cms-footer-top.layout1 .wg-title',
                    '#cms-footer-top.layout1 .widget-title',
                    '#cms-footer-top.layout1 h1',
                    '#cms-footer-top.layout1 h2',
                    '#cms-footer-top.layout1 h3',
                    '#cms-footer-top.layout1 h4',
                    '#cms-footer-top.layout1 h5',
                    '#cms-footer-top.layout1 h6',
                ),
                'required'  => array( 
                    array( 'spcharityplus_footer_top_column', '!=', 0), 
                ),
            ),
            array(
                'title'     => esc_html__('Link Color', 'sp-charityplus'),
                'id'        => 'spcharityplus_footer_top_link_color',
                'type'      => 'link_color',
                'active'    => false,
                'default'   => array(),
                'output'    => array('#cms-footer-top.layout1 a'),
                'required'  => array( 
                    array( 'spcharityplus_footer_top_column', '!=', 0), 
                ),
            ),
            array(
                'title' => esc_html__('Background', 'sp-charityplus'),
                'subtitle' => esc_html__('Choose background style', 'sp-charityplus'),
                'id' => 'spcharityplus_footer_top_bg',
                'type' => 'background',
                'default' => array(),
                'output'    => array('#cms-footer-top.layout1'),
                'required'  => array( 
                    array( 'spcharityplus_footer_top_column', '!=', 0), 
                ),
            ),
            array(
                'title'     => esc_html__('Padding', 'sp-charityplus'),
                'subtitle'  => esc_html__('Enter spacing', 'sp-charityplus'),
                'id'        => 'spcharityplus_footer_top_padding',
                'type'      => 'spacing',
                'mode'      => 'padding',
                'units'      => array('px'),
                'default'   => array(),
                'output'    => array('#cms-footer-top.layout1'),
                'required'  => array( 
                    array( 'spcharityplus_footer_top_column', '!=', 0), 
                ),
            ),
            array(
                'title'     => esc_html__('Margin', 'sp-charityplus'),
                'subtitle'  => esc_html__('Enter spacing', 'sp-charityplus'),
                'id'        => 'spcharityplus_footer_top_margin',
                'type'      => 'spacing',
                'mode'      => 'margin',
                'units'      => array('px'),
                'default'   => array(),
                'output'    => array('#cms-footer-top.layout1'),
                'required'  => array( 
                    array( 'spcharityplus_footer_top_column', '!=', 0), 
                ),
            ),
        /* Layout 2 */
        array(
           'id'       => 'spcharityplus_footer_top_layout2',
           'type'     => 'section',
           'title'    => esc_html__('Layout 2', 'sp-charityplus'),
           'subtitle' => esc_html__('Choose style for layout 2', 'sp-charityplus'),
           'indent'   => true,
           'required'  => array( 
                array( 'spcharityplus_footer_top_column', '!=', 0), 
            ),
        ),
            array(
                'title'     => esc_html__('Typography', 'sp-charityplus'),
                'id'        => 'spcharityplus_footer_top_typo2',
                'type'      => 'typography',
                'text-transform'    => true,
                'letter-spacing'    => true,
                'default'   => array(),
                'output'    => array('#cms-footer-top.layout2'),
                'required'  => array( 
                    array( 'spcharityplus_footer_top_column', '!=', 0), 
                ),
            ),
            array(
                'title'     => esc_html__('Heading Typography', 'sp-charityplus'),
                'id'        => 'spcharityplus_footer_top_typo_heading2',
                'type'      => 'typography',
                'text-transform'    => true,
                'letter-spacing'    => true,
                'line-height'       => false,
                'default'   => array(),
                'output'    => array(
                    '#cms-footer-top.layout2 .wg-title',
                    '#cms-footer-top.layout2 .widget-title',
                    '#cms-footer-top.layout2 h1',
                    '#cms-footer-top.layout2 h2',
                    '#cms-footer-top.layout2 h3',
                    '#cms-footer-top.layout2 h4',
                    '#cms-footer-top.layout2 h5',
                    '#cms-footer-top.layout2 h6',
                ),
                'required'  => array( 
                    array( 'spcharityplus_footer_top_column', '!=', 0), 
                ),
            ),
            array(
                'title'     => esc_html__('Link Color', 'sp-charityplus'),
                'id'        => 'spcharityplus_footer_top_link_color2',
                'type'      => 'link_color',
                'active'    => false,
                'default'   => array(),
                'output'    => array('#cms-footer-top.layout2 a'),
                'required'  => array( 
                    array( 'spcharityplus_footer_top_column', '!=', 0), 
                ),
            ),
            array(
                'title' => esc_html__('Background', 'sp-charityplus'),
                'subtitle' => esc_html__('Choose background style', 'sp-charityplus'),
                'id' => 'spcharityplus_footer_top_bg2',
                'type' => 'background',
                'default' => array(),
                'output'    => array('#cms-footer-top.layout2'),
                'required'  => array( 
                    array( 'spcharityplus_footer_top_column', '!=', 0), 
                ),
            ),
            array(
                'title'     => esc_html__('Padding', 'sp-charityplus'),
                'subtitle'  => esc_html__('Enter spacing', 'sp-charityplus'),
                'id'        => 'spcharityplus_footer_top_padding2',
                'type'      => 'spacing',
                'mode'      => 'padding',
                'units'      => array('px'),
                'default'   => array(),
                'output'    => array('#cms-footer-top.layout2'),
                'required'  => array( 
                    array( 'spcharityplus_footer_top_column', '!=', 0), 
                ),
            ),
            array(
                'title'     => esc_html__('Margin', 'sp-charityplus'),
                'subtitle'  => esc_html__('Enter spacing', 'sp-charityplus'),
                'id'        => 'spcharityplus_footer_top_margin2',
                'type'      => 'spacing',
                'mode'      => 'margin',
                'units'      => array('px'),
                'default'   => array(),
                'output'    => array('#cms-footer-top.layout2'),
                'required'  => array( 
                    array( 'spcharityplus_footer_top_column', '!=', 0), 
                ),
            ),
    )
));
Redux::setSection($opt_name, array(
    'title' => esc_html__('Footer Bottom', 'sp-charityplus'),
    'icon' => '',
    'subsection' => true,
    'fields' => array(
        array(
            'title' => esc_html__('Layout', 'sp-charityplus'),
            'subtitle' => esc_html__('Choose layout for where you want to show copyright text and Social link', 'sp-charityplus'),
            'id' => 'spcharityplus_footer_bottom_layout',
            'type'      => 'image_select',
            'options'   => array(
                '1' => get_template_directory_uri().'/assets/images/footer/bt1.png',
                '2' => get_template_directory_uri().'/assets/images/footer/bt2.png',
                '3' => get_template_directory_uri().'/assets/images/footer/bt3.png',
                '4' => get_template_directory_uri().'/assets/images/footer/bt4.png',
            ),
            'default'   => '1'
        ),
        array(
            'subtitle' => esc_html__('Enter your copyright text', 'sp-charityplus'),
            'id' => 'spcharityplus_footer_bottom_copyright',
            'type' => 'textarea',
            'title' => esc_html__('Copyright', 'sp-charityplus'),
            'validate' => 'html',
            'allow_html' => array('span', 'a'),
            'default' => '',
        ),
        array(
           'id'       => 'spcharityplus_footer_bottom_layout1',
           'type'     => 'section',
           'title'    => esc_html__('Layout 1', 'sp-charityplus'),
           'subtitle' => esc_html__('Choose style for layout 1', 'sp-charityplus'),
           'indent'   => true 
        ),
            array(
                'title'     => esc_html__('Typography', 'sp-charityplus'),
                'id'        => 'spcharityplus_footer_bottom_typo',
                'type'      => 'typography',
                'text-transform'    => true,
                'letter-spacing'    => true,
                'text-align'        => false,
                'default'           => array(),
                'output'    => array('#cms-footer-bottom.layout1')
            ),
            array(
                'title'     => esc_html__('Link Color', 'sp-charityplus'),
                'id'        => 'spcharityplus_footer_bottom_link_color',
                'type'      => 'link_color',
                'default'   => array(),
                'output'    => array('#cms-footer-bottom.layout1 a')
            ),
            array(
                'title' => esc_html__('Background', 'sp-charityplus'),
                'subtitle' => esc_html__('Choose background style', 'sp-charityplus'),
                'id' => 'spcharityplus_footer_bottom_bg',
                'type' => 'background',
                'default' => array(),
                'output'    => array('#cms-footer-bottom.layout1')
            ),
            array(
                'title'     => esc_html__('Padding', 'sp-charityplus'),
                'subtitle'  => esc_html__('Enter spacing', 'sp-charityplus'),
                'id'        => 'spcharityplus_footer_bottom_padding',
                'type'      => 'spacing',
                'mode'      => 'padding',
                'units'      => array('px'),
                'default'   => array(),
                'output'    => array('#cms-footer-bottom.layout1')
            ),
            array(
                'title'     => esc_html__('Margin', 'sp-charityplus'),
                'subtitle'  => esc_html__('Enter spacing', 'sp-charityplus'),
                'id'        => 'spcharityplus_footer_bottom_margin',
                'type'      => 'spacing',
                'mode'      => 'margin',
                'units'      => array('px'),
                'default'   => array(),
                'output'    => array('#cms-footer-bottom.layout1')
            ),
    )
));

/**
 * Optimal Core
 * 
 * Optimal options for theme. optimal speed
 * @author Chinh Duong Manh
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Optimal Core', 'sp-charityplus'),
    'icon' => 'el-icon-idea',
    'fields' => array(
        array(
            'subtitle' => esc_html__('no minimize , generate css over time...', 'sp-charityplus'),
            'id' => 'spcharityplus_dev_mode',
            'type' => 'switch',
            'title' => esc_html__('Dev Mode (not recommended)', 'sp-charityplus'),
            'default' => false
        )
    )
));