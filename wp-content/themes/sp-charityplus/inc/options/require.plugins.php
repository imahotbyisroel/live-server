<?php
add_action( 'tgmpa_register', 'cms_theme_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
*/
function cms_theme_register_required_plugins() {

    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     * $plugins_url = 'http://spyropress.com/plugins/';
     * $plugins_url = get_stylesheet_directory() . '/inc/plugins/';
     * $plugins_url = 'http://zooka.io/plugins/';
     * SpeedUp wordpress site plugin:  Compress JPEG & PNG images
     */
    
    $plugins_url = 'http://spyropress.com/plugins/';

    $plugins = array(
        array(
            'name'               => esc_html__('Cmssuperheroes','sp-charityplus'),
            'slug'               => 'cmssuperheroes',
            'source'             => 'cmssuperheroesv2.zip',
            'required'           => true,
        ),
        array(
            'name'               => esc_html__('EF3-Framework','sp-charityplus'),
            'slug'               => 'EF3-Framework',
            'source'             => 'EF3-Framework.zip',
            'required'           => true,

        ),
        array(
            'name'               => esc_html__('Ef3 Import and Export','sp-charityplus'),
            'slug'               => 'ef3-import-and-export',
            'source'             => 'ef3-import-and-export.zip',
            'required'           => true,

        ),
        array(
            'name'               => esc_html__('Visual Composer','sp-charityplus'),
            'slug'               => 'js_composer',
            'source'             => 'js_composer.zip',
            'required'           => true,

        ),
        
        array(
            'name'               => esc_html__('News Twitter','sp-charityplus'),
            'slug'               => 'news-twitter',
            'source'             => 'news-twitter.zip',
            'required'           => true,

        ),
        array(
            'name'               => esc_html__('ZoDonations','sp-charityplus'),
            'slug'               => 'zodonations',
            'source'             => 'zodonations_spcharityplus.zip',
            'required'           => true,

        ),
        array(
            'name'               => esc_html__('Charixy Email','sp-charityplus'),
            'slug'               => 'zkCharixyEmail',
            'source'             => 'zkCharixyEmail.zip',
            'required'           => true,

        ),
        array(
            'name'               => esc_html__('Custom Post Type UI','sp-charityplus'),
            'slug'               => 'custom-post-type-ui',
            'required'           => true,

        ),
        
        array(
            'name'               => esc_html__('Breadcrumb NavXT','sp-charityplus'),
            'slug'               => 'breadcrumb-navxt',
            'required'           => true,

        ),
        array(
            'name'               => esc_html__('Revolution Slider','sp-charityplus'),
            'slug'               => 'revslider',
            'source'             => 'revslider.zip',
            'required'           => false,

        ),
        array(
            'name'               => esc_html__('Newsletter','sp-charityplus'),
            'slug'               => 'newsletter',
            'required'           => false,

        ),
        array(
            'name'               => esc_html__('Contact Form 7','sp-charityplus'),
            'slug'               => 'contact-form-7',
            'required'           => false,

        ),
        array(
            'name'               => esc_html__('WooCommerce','sp-charityplus'),
            'slug'               => 'woocommerce',
            'required'           => false,

        ),
        array(
            'name'               => esc_html__('WooCommerce Quantity Increment','sp-charityplus'),
            'slug'               => 'woocommerce-quantity-increment',
            'required'           => false,

        ),
        array(
            'name'               => esc_html__('YITH WooCommerce Compare','sp-charityplus'),
            'slug'               => 'yith-woocommerce-compare',
            'required'           => false,

        ),
        array(
            'name'               => esc_html__('YITH WooCommerce Multi-step Checkout','sp-charityplus'),
            'slug'               => 'yith-woocommerce-multi-step-checkout',
            'required'           => false,

        ),
        array(
            'name'               => esc_html__('YITH WooCommerce Quick View','sp-charityplus'),
            'slug'               => 'yith-woocommerce-quick-view',
            'required'           => false,

        ),
        array(
            'name'               => esc_html__('YITH WooCommerce Wishlist','sp-charityplus'),
            'slug'               => 'yith-woocommerce-wishlist',
            'required'           => false,

        ),
        array(
            'name'               => esc_html__('SoundCloud Shortcode','sp-charityplus'),
            'slug'               => 'soundcloud-shortcode',
            'required'           => false,

        ),
        array(
            'name'               => esc_html__('Instagram Feed','sp-charityplus'),
            'slug'               => 'instagram-feed',
            'required'           => false,

        ),
        array(
            'name'               => esc_html__('Regenerate Thumbnails','sp-charityplus'),
            'slug'               => 'regenerate-thumbnails',
            'required'           => false,

        ),
        array(
            'name'               => esc_html__('Thumbnail Cleaner','sp-charityplus'),
            'slug'               => 'thumbnail-cleaner',
            'required'           => false,

        ),
        
    );

    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
    */
    $config = array(
        'default_path' => $plugins_url,                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'      => array(
            'page_title'                      => esc_html__( 'Install Required Plugins', 'sp-charityplus' ),
            'menu_title'                      => esc_html__( 'Install Plugins', 'sp-charityplus' ),
            'installing'                      => esc_html__( 'Installing Plugin: %s', 'sp-charityplus' ), // %s = plugin name.
            'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'sp-charityplus' ),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'sp-charityplus' ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' , 'sp-charityplus' ), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' , 'sp-charityplus' ), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'sp-charityplus' ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'sp-charityplus' ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'sp-charityplus' ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'sp-charityplus' ), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'sp-charityplus' ), // %1$s = plugin name(s).
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'sp-charityplus' ),
            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins', 'sp-charityplus' ),
            'return'                          => esc_html__( 'Return to Required Plugins Installer', 'sp-charityplus' ),
            'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'sp-charityplus' ),
            'complete'                        => esc_html__( 'All plugins installed and activated successfully. %s', 'sp-charityplus' ), // %s = dashboard link.
            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );

    tgmpa( $plugins, $config );

}