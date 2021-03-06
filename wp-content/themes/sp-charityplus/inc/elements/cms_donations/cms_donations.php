<?php
vc_map(
	array(
		'name'        => esc_html__('CMS Donations', 'sp-charityplus'),
		'base'        => 'cms_donations',
		'class'       => 'vc-cms-donation',
		'category'    => esc_html__('CmsSuperheroes Shortcodes', 'sp-charityplus'),
		'description' => esc_html__('Donations Grid','sp-charityplus'),
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
			    ),
				'std'   => '1',
				'group' => esc_html__('Layout','sp-charityplus'), 
			)
	    )
	)
);
class WPBakeryShortCode_cms_donations extends CmsShortCode{
	protected function content($atts, $content = null){
		global $wp_query,$post;
		$atts_extra = shortcode_atts(array(
            'cms_template' => 'cms_donations.php',
            'class' => '',
        ), $atts);
		$atts = array_merge($atts_extra, $atts);

		//media script
		wp_enqueue_style( 'wp-mediaelement' );
		wp_enqueue_script( 'wp-mediaelement' );
		wp_enqueue_script('cms-grid-pagination',get_template_directory_uri().'/assets/js/cmsgrid.pagination.js',array('jquery'),'1.0.0',true);
		
        $html_id = cmsHtmlID('cms-donations');
        $atts['template'] = 'template-'.str_replace('.php','',$atts['cms_template']);
        $atts['html_id'] = $html_id;
		return parent::content($atts, $content);
	}
}

?>