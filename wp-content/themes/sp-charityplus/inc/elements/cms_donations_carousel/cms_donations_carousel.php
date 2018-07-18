<?php
vc_map(
	array(
		'name'        => esc_html__('CMS Donations Carousel', 'sp-charityplus'),
		'base'        => 'cms_donations_carousel',
		'class'       => 'vc-cms-donation',
		'category'    => esc_html__('CmsSuperheroes Shortcodes', 'sp-charityplus'),
		'description' => esc_html__('Donations Carousel','sp-charityplus'),
		'params'      => array(
	    	array(
				'type'        => 'textfield',
				'heading'     => esc_html__('Posts per page','sp-charityplus'),
				'param_name'  => 'posts_per_page',
				'value'       => '9',
				'description' => esc_html__('Number of post to show','sp-charityplus'),
				'group'       => esc_html__('Template', 'sp-charityplus')
	        ),
	        array(
				'type'        => 'dropdown',
				'heading'     => esc_html__('Number Row','sp-charityplus'),
				'description' => esc_html__( 'Choose number of row you want to show.', 'sp-charityplus' ),
				'param_name'  => 'number_row',
				'value'       => array(1,2,3,4,5,6,7,8,9,10),
				'std'         => 1,
				'group'       => esc_html__('Template', 'sp-charityplus')
	        ),
	        array(
				'type'       => 'textfield',
				'heading'    => esc_html__('Extra Class','sp-charityplus'),
				'param_name' => 'class',
				'value'      => '',
				'group'      => esc_html__('Template', 'sp-charityplus')
	        ),
	    	array(
				'type'        => 'cms_template',
				'param_name'  => 'cms_template',
				'shortcode'   => 'cms_donations',
				'admin_label' => true,
				'heading'     => esc_html__('Shortcode Template','sp-charityplus'),
				'group'       => esc_html__('Template', 'sp-charityplus'),
	        ),
	        array(
				'type'       => 'img',
				'heading'    => esc_html__('Layout Mode','sp-charityplus'),
				'param_name' => 'layout_mode',
				'value'      =>  array(
			        '1' => get_template_directory_uri().'/vc_params/layouts/cms-donation1.png',
			        '2' => get_template_directory_uri().'/vc_params/layouts/cms-donation2.png',
			        '3' => get_template_directory_uri().'/vc_params/layouts/cms-donation3.png',
			        '4' => get_template_directory_uri().'/vc_params/layouts/cms-donation4.png',
			        '5' => get_template_directory_uri().'/vc_params/layouts/cms-donation5.png',
			        '6' => get_template_directory_uri().'/vc_params/layouts/cms-donation6.png',
			    ),
				'std'   => '1',
				'group' => esc_html__('Layout','sp-charityplus'), 
			)
	    )
	)
);
class WPBakeryShortCode_cms_donations_carousel extends CmsShortCode{
	protected function content($atts, $content = null){
		global $wp_query,$post;
		$atts_extra = shortcode_atts(array(
            'cms_template' => 'cms_donations_carousel.php',
            'class' => '',
        ), $atts);
		$atts = array_merge($atts_extra, $atts);
		global $cms_carousel;
		//media script
		wp_enqueue_style( 'wp-mediaelement' );
		wp_enqueue_script( 'wp-mediaelement' );
		wp_enqueue_style('owl-carousel',get_template_directory_uri().'/assets/css/owl.carousel.css','','2.2.1','all');
		wp_enqueue_script('imagesloaded', '', array('jquery') ,'1.0',true);
        wp_enqueue_script('owl-carousel',get_template_directory_uri().'/assets/js/owl.carousel.min.js',array('jquery'),'2.2.1',true);
        wp_enqueue_script('owl-carousel-cms',get_template_directory_uri().'/assets/js/owl.carousel.cms.js',array('jquery'),'1.0.0',true);

        $html_id = cmsHtmlID('cms-donations-carousel');
        $atts['template'] = 'template-'.str_replace('.php','',$atts['cms_template']);
        
        $cms_carousel[$html_id] = array(
			'margin'             => 30,
			'loop'               => 'true',
			'mouseDrag'          => 'true',
			'nav'                => 'false',
			'dots'               => 'true',
			'autoplay'           => 'true',
			'autoplayTimeout'    => '500',
			'smartSpeed'         => '1000',
			'autoplayHoverPause' => 'true',
			'navText'            => '',
			'autoHeight'		 => 'true',
			'responsive'         => array(
        		0 => array(
        			"items" => 1,
        		),
	        	768 => array(
	        		"items" => 2,
	        		),
	        	992 => array(
	        		"items" => 3,
	        		),
	        	1200 => array(
	        		"items" => 3,
	        		)
	        	)
        );
        wp_localize_script('owl-carousel-cms', "cmscarousel", $cms_carousel);
        $atts['html_id'] = $html_id;
		return parent::content($atts, $content);
	}
}

?>