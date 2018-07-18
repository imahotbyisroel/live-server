<?php
/**
 * Meta box config file
 */
if (! class_exists('MetaFramework')) {
    return;
}

$args = array(
    // TYPICAL -> Change these values as you need/desire
    'opt_name' => apply_filters('opt_meta', 'spcharityplus_meta_options'),
    // Set a different name for your global variable other than the opt_name
    'dev_mode' => false,
    // Allow you to start the panel in an expanded way initially.
    'open_expanded' => false,
    // Disable the save warning when a user changes a field
    'disable_save_warn' => true,
    // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
    'save_defaults' => false,

    'output' => false,
    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
    'output_tag' => false,
    // Show the time the page took to load, etc
    'update_notice' => false,
    // 'disable_google_fonts_link' => true, // Disable this in case you want to create your own google fonts loader
    'admin_bar' => false,
    // Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
    'allow_sub_menu' => false,
    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
    'customizer' => false,
    // What to print by the field's title if the value shown is default. Suggested: *
    'show_import_export' => false,
    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
    'use_cdn' => false,
    // save meta to multiple keys.
    'meta_mode' => 'multiple'
);

// -> Set Option To Panel.
MetaFramework::setArgs($args);

add_action('admin_init', 'spcharityplus_meta_boxs');

MetaFramework::init();

function spcharityplus_meta_boxs()
{

    /** page options */
    MetaFramework::setMetabox(array(
        'id' => '_page_main_options',
        'label' => esc_html__('Page Setting', 'sp-charityplus'),
        'post_type' => 'page',
        'context' => 'advanced',
        'priority' => 'default',
        'open_expanded' => false,
        'sections' => array(
            array(
                'title' => esc_html__('Page Options', 'sp-charityplus'),
                'id' => 'tab-page-header',
                'icon' => 'el el-credit-card',
                'fields' => array(
                    array(
                        'id'          => 'spcharityplus_page_layout',
                        'title'       => esc_html__('Page layout', 'sp-charityplus'),
                        'description' => esc_html__('This layout apply for page template layout', 'sp-charityplus'),
                        'type'        => 'button_set',
                        'options'     => array(
                            ''          => esc_html__('Default','sp-charityplus'), 
                            'left'      => esc_html__('Left Sidebar','sp-charityplus'), 
                            'full'      => esc_html__('No Sidebar','sp-charityplus'),
                            'right'     => esc_html__('Right Sidebar','sp-charityplus'), 
                        ), 
                        'default'   => '',
                    ),
                    array(
                        'id'          => 'spcharityplus_page_sidebar',
                        'title'       => esc_html__('Sidebar', 'sp-charityplus'),
                        'placeholder' => esc_html__('select a widget area for page', 'sp-charityplus'),
                        'description' => esc_html__('Leave blank  to load default sidebar from theme option', 'sp-charityplus'),
                        'type'        => 'select',
                        'data'        => 'sidebars',
                        'default'     => '',
                        'required'    => array( 0 => 'spcharityplus_page_layout', 1 => '=', 2 => array('left','right') )
                    )
                )
            ),
            array(
                'title' => esc_html__('Header', 'sp-charityplus'),
                'id' => 'tab-page-header',
                'icon' => 'el el-credit-card',
                'fields' => array(
                    array(
                        'id' => 'spcharityplus_page_header_layout',
                        'title' => esc_html__('Layouts', 'sp-charityplus'),
                        'subtitle' => esc_html__('select a layout for header', 'sp-charityplus'),
                        'default' => '',
                        'type' => 'image_select',
                        'options' => array(
                            '' => get_template_directory_uri() . '/assets/images/header/default.jpg',
                        ),
                    ),
                    array(
                        'id' => 'spcharityplus_page_header_menu',
                        'type' => 'select',
                        'title' => esc_html__('Select Menu', 'sp-charityplus'),
                        'subtitle' => esc_html__('custom menu for current page', 'sp-charityplus'),
                        'options' => spcharityplus_get_nav_menu(),
                        'default' => '',
                    ),
                )
            ),
            array(
                'title' => esc_html__('Page Title & BC', 'sp-charityplus'),
                'id' => 'tab-page-title-bc',
                'icon' => 'el el-map-marker',
                'fields' => array(
                    array(
                        'id' => 'spcharityplus_page_title_layout',
                        'title' => esc_html__('Layouts', 'sp-charityplus'),
                        'subtitle' => esc_html__('select a layout for page title', 'sp-charityplus'),
                        'default' => '',
                        'type' => 'image_select',
                        'options' => array(
                            '' => get_template_directory_uri() . '/assets/images/pagetitle/pt-s-default.png',
                            'none' => get_template_directory_uri() . '/assets/images/pagetitle/pt-s-0.png',
                            '1' => get_template_directory_uri() . '/assets/images/pagetitle/pt-s-1.png',
                            '2' => get_template_directory_uri() . '/assets/images/pagetitle/pt-s-2.png',
                            '3' => get_template_directory_uri() . '/assets/images/pagetitle/pt-s-3.png',
                            '4' => get_template_directory_uri() . '/assets/images/pagetitle/pt-s-4.png',
                            '5' => get_template_directory_uri() . '/assets/images/pagetitle/pt-s-5.png',
                            '6' => get_template_directory_uri() . '/assets/images/pagetitle/pt-s-6.png',
                        ), 
                    ),
                    array(
                        'id' => 'spcharityplus_page_title_text',
                        'type' => 'text',
                        'title' => esc_html__('Custom Title', 'sp-charityplus'),
                        'subtitle' => esc_html__('Custom current page title.', 'sp-charityplus'),
                        'required'  => array( 
                            array('spcharityplus_page_title_layout', '!=', 'none' ),
                        )
                    ),
                    array(
                        'id'        => 'spcharityplus_page_title_bg',
                        'type'      => 'background',
                        'title'     => esc_html__('Custom Background', 'sp-charityplus'),
                        'subtitle'  => esc_html__('Custom current page title background.', 'sp-charityplus'),
                        'default'   => '',
                        'required'  => array( 
                            array('spcharityplus_page_title_layout', '!=', '' ),
                            array('spcharityplus_page_title_layout', '!=', 'none' ),
                        )
                    ),
                    array(
                        'id'        => 'spcharityplus_page_title_bg_overlay',
                        'title'     => esc_html__('Overlay Background', 'sp-charityplus'),
                        'subtitle'  => esc_html__('Choose overlay background color', 'sp-charityplus'),
                        'type'      => 'color_rgba',
                        'default'   => array(),
                        'required'  => array( 
                            array('spcharityplus_page_title_layout', '!=', '' ),
                            array('spcharityplus_page_title_layout', '!=', 'none' ), 
                        ),
                    ),
                    array(
                        'id'        => 'spcharityplus_page_title_padding',
                        'title'     => esc_html__('Padding', 'sp-charityplus'),
                        'subtitle'  => esc_html__('Choose a space', 'sp-charityplus'),
                        'type'      => 'spacing',
                        'mode'      => 'padding',
                        'units'     => array('px'),
                        'required'  => array( 
                            array('spcharityplus_page_title_layout', '!=', '' ),
                            array('spcharityplus_page_title_layout', '!=', 'none' ),  
                        ),
                        'default'   => array(),
                    ),
                    array(
                        'id'        => 'spcharityplus_page_title_margin',
                        'title'     => esc_html__('Margin', 'sp-charityplus'),
                        'subtitle'  => esc_html__('Choose a space', 'sp-charityplus'),
                        'type'      => 'spacing',
                        'mode'      => 'margin',
                        'units'     => array('px'),
                        'required'  => array( 
                            array('spcharityplus_page_title_layout', '!=', '' ),
                            array('spcharityplus_page_title_layout', '!=', 'none' ), 
                        ),
                        'default'   => array(),
                    ),
                )
            ),
            array(
                'title'     => esc_html__('Footer', 'sp-charityplus'),
                'heading'   => '',
                'id'        => 'tab-footer',
                'icon'      => 'el el-credit-card',
                'fields'    => array(
                    array(
                        'title'     => esc_html__('Margin', 'sp-charityplus'),
                        'subtitle'  => esc_html__('Custom footer outer space', 'sp-charityplus'),
                        'id'        => 'spcharityplus_page_footer_margin',
                        'type'      => 'spacing',
                        'mode'      => 'margin',
                        'units'     => array('px'),
                        'default'   => array(),
                    ),

                )
            ),
            array(
                'title' => esc_html__('One Page', 'sp-charityplus'),
                'id' => 'tab-one-page',
                'icon' => 'el el-download-alt',
                'fields' => array(
                    array(
                        'subtitle' => esc_html__('Enable one page mode for current page.', 'sp-charityplus'),
                        'id' => 'page_one_page',
                        'type' => 'switch',
                        'title' => esc_html__('Enable', 'sp-charityplus'),
                        'default' => false,
                    ),
                    array(
                        'id'            => 'page_one_page_speed',
                        'type'          => 'slider',
                        'title'         => esc_attr__( 'Speed', 'sp-charityplus' ),
                        'default'       => 1000,
                        'min'           => 500,
                        'step'          => 100,
                        'max'           => 5000,
                        'display_value' => 'text',
                        'required' => array('page_one_page', '=', 1)
                    ),
                )
            )
        )
    ));

    /** post options */
    MetaFramework::setMetabox(array(
        'id' => '_page_post_format_options',
        'label' => esc_html__('Post Format', 'sp-charityplus'),
        'post_type' => 'post',
        'context' => 'advanced',
        'priority' => 'default',
        'open_expanded' => true,
        'sections' => array(
            array(
                'title' => '',
                'id' => 'color-Color',
                'icon' => 'el el-laptop',
                'fields' => array(
                    array(
                        'id' => 'opt-video-type',
                        'type' => 'select',
                        'title' => esc_html__('Select Video Type', 'sp-charityplus'),
                        'subtitle' => esc_html__('Local video, Youtube, Vimeo', 'sp-charityplus'),
                        'options' => array(
                            'local' => esc_html__('Upload', 'sp-charityplus'),
                            'youtube' => esc_html__('Youtube', 'sp-charityplus'),
                            'vimeo' => esc_html__('Vimeo', 'sp-charityplus'),
                        )
                    ),
                    array(
                        'id' => 'otp-video-local',
                        'type' => 'media',
                        'url' => true,
                        'mode' => false,
                        'title' => esc_html__('Local Video', 'sp-charityplus'),
                        'subtitle' => esc_html__('Upload video media using the WordPress native uploader', 'sp-charityplus'),
                        'required' => array('opt-video-type', '=', 'local')
                    ),
                    array(
                        'id' => 'opt-video-youtube',
                        'type' => 'text',
                        'title' => esc_html__('Youtube', 'sp-charityplus'),
                        'subtitle' => esc_html__('Load video from Youtube.', 'sp-charityplus'),
                        'placeholder' => esc_html__('https://youtu.be/iNJdPyoqt8U', 'sp-charityplus'),
                        'required' => array('opt-video-type', '=', 'youtube')
                    ),
                    array(
                        'id' => 'opt-video-vimeo',
                        'type' => 'text',
                        'title' => esc_html__('Vimeo', 'sp-charityplus'),
                        'subtitle' => esc_html__('Load video from Vimeo.', 'sp-charityplus'),
                        'placeholder' => esc_html__('https://vimeo.com/155673893', 'sp-charityplus'),
                        'required' => array('opt-video-type', '=', 'vimeo')
                    ),
                    array(
                        'id' => 'otp-video-thumb',
                        'type' => 'media',
                        'url' => true,
                        'mode' => false,
                        'title' => esc_html__('Video Thumb', 'sp-charityplus'),
                        'subtitle' => esc_html__('Upload thumb media using the WordPress native uploader', 'sp-charityplus'),
                        'required' => array('opt-video-type', '=', 'local')
                    ),
                    array(
                        'id' => 'otp-audio',
                        'type' => 'media',
                        'url' => true,
                        'mode' => false,
                        'title' => esc_html__('Audio Media', 'sp-charityplus'),
                        'subtitle' => esc_html__('Upload audio media using the WordPress native uploader', 'sp-charityplus'),
                    ),
                    array(
                        'id' => 'opt-gallery',
                        'type' => 'gallery',
                        'title' => esc_html__('Add/Edit Gallery', 'sp-charityplus'),
                        'subtitle' => esc_html__('Create a new Gallery by selecting existing or uploading new images using the WordPress native uploader', 'sp-charityplus'),
                    ),
                    array(
                        'id' => 'opt-quote-title',
                        'type' => 'text',
                        'title' => esc_html__('Quote Title', 'sp-charityplus'),
                        'subtitle' => esc_html__('Quote title or quote name...', 'sp-charityplus'),
                    ),
                    array(
                        'id' => 'opt-quote-content',
                        'type' => 'textarea',
                        'title' => esc_html__('Quote Content', 'sp-charityplus'),
                    ),
                )
            ),
        )
    ));
    /** EVENTS options */
    MetaFramework::setMetabox(array(
        'id'            => '_page_event_options',
        'label'         => esc_html__('Event Details', 'sp-charityplus'),
        'post_type'     => 'zkevent',
        'context'       => 'advanced',
        'priority'      => 'default',
        'open_expanded' => false,
        'sections'      => array(
                array(
                    'title'     => esc_html__('Address', 'sp-charityplus'),
                    'heading'   => '',
                    'id'        => 'event_add',
                    'icon'      => 'el el-map-marker',
                    'fields'    => array(
                        array(
                            'id'            => 'spcharityplus_event_add',
                            'type'          => 'text',
                            'rows'          => '20',
                            'default'       => '',
                            'placeholder'   => esc_html__('Event address','sp-charityplus'),
                        ),
                        array(
                            'id'            => 'spcharityplus_event_gmap',
                            'type'          => 'switch',
                            'rows'          => '20',
                            'default'       => true,
                            'title'         => esc_html__('Google Map','sp-charityplus'),
                            'subtitle'      => esc_html__('Show / Hide google map on single event page','sp-charityplus'),
                        ),
                    )
                ),
                array(
                    'title'     => esc_html__('Time', 'sp-charityplus'),
                    'heading'   => '',
                    'id'        => 'event_time',
                    'icon'      => 'el el-time',
                    'fields'    => array(
                        array(
                            'id'            => 'spcharityplus_event_time_date',
                            'type'          => 'date',
                            'rows'          => '20',
                            'default'       => '',
                            'title'         => esc_html__('Event Date', 'sp-charityplus'),
                            'subtitle'      => esc_html__('Choose a date for this event', 'sp-charityplus'),
                            'placeholder'   => esc_html__('Click to enter a date','sp-charityplus'),
                        ),
                        array(
                            'id'          => 'spcharityplus_event_time_start',
                            'type'        => 'text',
                            'title'       => esc_html__('Start Time', 'sp-charityplus'),
                            'subtitle'    => esc_html__('Enter time start event', 'sp-charityplus'),
                            'placeholder' => '09:00 am',
                            'default'     => '',
                        ),
                        array(
                            'id'        => 'spcharityplus_event_time_end',
                            'type'      => 'text',
                            'title'     => esc_html__('End Time', 'sp-charityplus'),
                            'subtitle'  => esc_html__('Enter time end event', 'sp-charityplus'),
                            'placeholder' => '11:00 am',
                            'default'   => '',
                        ),
                    )
                ),
                array(
                    'title'     => esc_html__('Additional Info', 'sp-charityplus'),
                    'heading'   => '',
                    'id'        => 'event_additional_info',
                    'icon'      => 'el el-info-circle',
                    'fields'    => array(
                        array(
                            'id'            => 'spcharityplus_event_fb',
                            'type'          => 'text',
                            'rows'          => '20',
                            'default'       => 'https://facebook.com',
                            'title'     => esc_html__('Facebook Page', 'sp-charityplus'),
                            'subtitle'  => esc_html__('Enter facebook page url for this event', 'sp-charityplus'),
                            'placeholder'   => esc_html__('https://facebook.com','sp-charityplus'),
                        ),
                    )
                ),
            ),
        )
    );
}