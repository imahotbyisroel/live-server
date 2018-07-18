<?php
vc_map(
	array(
		'name' 			=> esc_html__('CMS Single Fancy Box', 'sp-charityplus'),
	    'base' 			=> 'cms_fancybox_single',
	    'class' 		=> 'vc-cms-fancy-boxes',
	    'category' 		=> esc_html__('CmsSuperheroes Shortcodes', 'sp-charityplus'),
	    'params' 		=> array(
	    	array(
	            'type' 			=> 'textfield',
	            'heading' 		=> esc_html__('Title','sp-charityplus'),
	            'param_name' 	=> 'title',
	            'value' 		=> '',
	            'description' 	=> esc_html__('Title Of Fancy Icon Box','sp-charityplus'),
	            'group' 		=> esc_html__('General', 'sp-charityplus'),
	            'holder'		=> 'div'
	        ),
	        array(
	            'type' 			=> 'textarea',
	            'heading' 		=> esc_html__('Description','sp-charityplus'),
	            'param_name' 	=> 'description',
	            'value' 		=> '',
	            'description' 	=> esc_html__('Description Of Fancy Icon Box','sp-charityplus'),
	            'group' 		=> esc_html__('General', 'sp-charityplus')
	        ),
	        array(
	            'type' 			=> 'textfield',
	            'heading' 		=> esc_html__('Price','sp-charityplus'),
	            'param_name' 	=> 'price',
	            'value' 		=> '',
	            'description' 	=> esc_html__('Additional info, ex: 150$ - 180$','sp-charityplus'),
	            'group' 		=> esc_html__('General', 'sp-charityplus')
	        ),
	        
	        array(
	            'type' 			=> 'dropdown',
	            'heading' 		=> esc_html__('Content Align','sp-charityplus'),
	            'param_name' 	=> 'content_align',
	            'value' 		=> array(
	            	'Default' 	=> '',
	            	'Left' 		=> 'text-left',
	            	'Right' 	=> 'text-right',
	            	'Center' 	=> 'text-center'
	            ),
	            'std'			=> '',
	            'group' 		=> esc_html__('General', 'sp-charityplus')
	        ),
	        array(
	            'type' => 'vc_link',
	            'heading' => esc_html__('Choose your link','sp-charityplus'),
	            'param_name' => 'button_link',
	            'value' => '',
	            'group' => esc_html__('General','sp-charityplus'),
		    ),
	        /* Start Items */
	        /* Start Icon */
	        array(
				'type' 		=> 'dropdown',
				'heading' 	=> esc_html__( 'Icon library', 'sp-charityplus' ),
				'value' 	=> spcharityplus_icon_libs(),
				'param_name' 	=> 'icon_type',
				'description' 	=> esc_html__( 'Select icon library.', 'sp-charityplus' ),
				'group' 		=> esc_html__('Icon Settings', 'sp-charityplus')
			),
			array(
				'type' 			=> 'iconpicker',
				'heading' 		=> esc_html__( 'Icon Item', 'sp-charityplus' ),
				'param_name' 	=> 'icon_fontawesome',
	            'value' 		=> '',
				'settings' 		=> array(
					'emptyIcon' 	=> true, // default true, display an 'EMPTY' icon?
					'type' 			=> 'fontawesome',
					'iconsPerPage' 	=> 200, // default 100, how many icons per/page to display
				),
				'dependency' 	=> array(
					'element' 	=> 'icon_type',
					'value' 	=> 'fontawesome',
				),
				'description'	=> esc_html__( 'Select icon from library.', 'sp-charityplus' ),
				'group' 		=> esc_html__('Icon Settings', 'sp-charityplus')
			),
	        array(
				'type' 			=> 'iconpicker',
				'heading' 		=> esc_html__( 'Icon Item', 'sp-charityplus' ),
				'param_name' 	=> 'icon_openiconic',
	            'value' 		=> '',
				'settings' 		=> array(
					'emptyIcon' 	=> true, // default true, display an 'EMPTY' icon?
					'type' 			=> 'openiconic',
					'iconsPerPage' 	=> 200, // default 100, how many icons per/page to display
				),
				'dependency' 	=> array(
					'element' 	=> 'icon_type',
					'value' 	=> 'openiconic',
				),
				'description' 	=> esc_html__( 'Select icon from library.', 'sp-charityplus' ),
				'group' 		=> esc_html__('Icon Settings', 'sp-charityplus')
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon Item', 'sp-charityplus' ),
				'param_name' => 'icon_typicons',
	            'value' => '',
				'settings' => array(
					'emptyIcon' => true, // default true, display an 'EMPTY' icon?
					'type' => 'typicons',
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'typicons',
				),
				'description' => esc_html__( 'Select icon from library.', 'sp-charityplus' ),
				'group' => esc_html__('Icon Settings', 'sp-charityplus')
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon Item', 'sp-charityplus' ),
				'param_name' => 'icon_entypo',
	            'value' => '',
				'settings' => array(
					'emptyIcon' => true, // default true, display an 'EMPTY' icon?
					'type' => 'entypo',
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'entypo',
				),
				'description' => esc_html__( 'Select icon from library.', 'sp-charityplus' ),
				'group' => esc_html__('Icon Settings', 'sp-charityplus')
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon Item', 'sp-charityplus' ),
				'param_name' => 'icon_linecons',
	            'value' => '',
				'settings' => array(
					'emptyIcon' => true, // default true, display an 'EMPTY' icon?
					'type' => 'linecons',
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'linecons',
				),
				'description' => esc_html__( 'Select icon from library.', 'sp-charityplus' ),
				'group' => esc_html__('Icon Settings', 'sp-charityplus')
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon Item', 'sp-charityplus' ),
				'param_name' => 'icon_monosocial',
	            'value' => '',
				'settings' => array(
					'emptyIcon' => true, // default true, display an 'EMPTY' icon?
					'type' => 'monosocial',
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'monosocial',
				),
				'description' => esc_html__( 'Select icon from library.', 'sp-charityplus' ),
				'group' => esc_html__('Icon Settings', 'sp-charityplus')
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon Item', 'sp-charityplus' ),
				'param_name' => 'icon_material',
	            'value' => '',
				'settings' => array(
					'emptyIcon' => true, // default true, display an 'EMPTY' icon?
					'type' => 'material',
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'material',
				),
				'description' => esc_html__( 'Select icon from library.', 'sp-charityplus' ),
				'group' => esc_html__('Icon Settings', 'sp-charityplus')
			),
			array(
				'type'          => 'textfield',
				'heading'       => esc_html__('Icon Size','sp-charityplus'),
				'description'	=> esc_html__('Alternatively enter size in pixels (Example: 200x100 (Width x Height)). NOTE: just enter number only!','sp-charityplus'),
				'param_name'    => 'icon_size',
				'std'       	=> '27',
				'group'         => esc_html__('Icon Settings', 'sp-charityplus'),
		    ),
			/* End Icon */
			array(
				'type'       => 'attach_image',
				'heading'    => esc_html__('Image Item','sp-charityplus'),
				'param_name' => 'image',
				'group'      => esc_html__('Image Settings', 'sp-charityplus')
	        ),
	        array(
				'type'        => 'checkbox',
				'heading'     => esc_html__('Make image as icon','sp-charityplus'),
				'description' => esc_html__('If YES, the icon will removed and use image as icon!','sp-charityplus'),
				'param_name'  => 'image_icon',
				'default'     => false,
				'group'       => esc_html__('Image Settings', 'sp-charityplus'),
				'dependency'    => array(
				  'element'   	=> 'image',
				  'not_empty'     => true,
				),
	        ),
	        array(
				'type'          => 'dropdown',
				'class'         => '',
				'heading'       => esc_html__('Thumbnail Size','sp-charityplus'),
				'param_name'    => 'thumbnail_size',
				'value'         => spcharityplus_thumbnail_sizes(),
				'std'           => 'medium',
				'group'         => esc_html__('Image Settings', 'sp-charityplus'),
				'dependency'    => array(
				  'element'   => 'image',
				  'not_empty'     => true,
				),
		    ),
			array(
				'type'          => 'textfield',
				'class'         => '',
				'heading'       => esc_html__('Custom Thumbnail Size','sp-charityplus'),
				'description'   => esc_html__('Alternatively enter size in pixels (Example: 200x100 (Width x Height)).','sp-charityplus'),
				'param_name'    => 'thumbnail_size_custom',
				'value'         => '',
				'group'         => esc_html__('Image Settings', 'sp-charityplus'),
				'dependency'    => array(
				  'element'   => 'thumbnail_size',
				  'value'     => 'custom',
				),
			),
	       
	        /* End Items */
	    	array(
				'type'        => 'cms_template',
				'param_name'  => 'cms_template',
				'admin_label' => true,
				'heading'     => esc_html__('Shortcode Template','sp-charityplus'),
				'shortcode'   => 'cms_fancybox_single',
				'group'       => esc_html__('Template', 'sp-charityplus'),
	        ),
	        array(
		        'type' => 'img',
		        'heading' => esc_html__('Layout Mode','sp-charityplus'),
		        'param_name' => 'layout_mode',
		        'value' =>  array(
		            '1' => get_template_directory_uri().'/vc_params/layouts/cms-fancybox-single.png',
		            '2' => get_template_directory_uri().'/vc_params/layouts/cms-fancybox-single2.png',
		            '3' => get_template_directory_uri().'/vc_params/layouts/cms-fancybox-single3.png',
		            '4' => get_template_directory_uri().'/vc_params/layouts/cms-fancybox-single4.png',
		            '5' => get_template_directory_uri().'/vc_params/layouts/cms-fancybox-single5.png',
		            '6' => get_template_directory_uri().'/vc_params/layouts/cms-fancybox-single6.png',
		        ),
		        'std' => '1',
		        'group' => esc_html__('Template','sp-charityplus'),
		    ),
	        array(
	            'type' 			=> 'dropdown',
	            'heading' 		=> esc_html__('Color Mode','sp-charityplus'),
	            'param_name' 	=> 'color_mode',
	            'value' 		=> array(
	            	esc_html__('Default','sp-charityplus') 	=> '',
	            	esc_html__('Blue','sp-charityplus') 	=> 'blue',
	            	esc_html__('Green','sp-charityplus') 	=> 'green',
	            	esc_html__('Orange','sp-charityplus') 	=> 'orange',
	            ),
	            'std'			=> '',
	            'group' 		=> esc_html__('Template', 'sp-charityplus')
	        ),
		    
		    array(
				'type'       => 'textfield',
				'heading'    => esc_html__('Extra Class','sp-charityplus'),
				'param_name' => 'class',
				'value'      => '',
				'group'      => esc_html__('Template', 'sp-charityplus')
	        ),
	        array(
	            "type" => "css_editor",
	            "heading" => '',
	            "param_name" => "css",
	            "value" => "",
	            "group" => esc_html__("Design Options",'sp-charityplus'),
	      	),
	      	array(
				"type"       => "colorpicker",
				"heading"    => esc_html__("Icon Color",'sp-charityplus'),
				"param_name" => "icon_color",
				"value"      => "",
				'dependency' 	=> array(
					'element' 	=> 'layout_mode',
					'value' 	=> '5',
				),
				"group"      => esc_html__("Design Options",'sp-charityplus'),
	      	)
		)
	)
);
class WPBakeryShortCode_cms_fancybox_single extends CmsShortCode{
	protected function content($atts, $content = null){
		$atts_extra = shortcode_atts(array(
			'title'            => '',
			'description'      => '',
			'content_align'    => '',
			'button_link'      => '',
			'icon_type'        => 'fontawesome',
			'icon_fontawesome' => '',
			'icon_openiconic'  => '',
			'icon_typicons'    => '',
			'icon_entypo'      => '',
			'icon_linecons'    => '',
			'icon_monosocial'  => '',
			'icon_pe7stroke'   => '',
			'cms_template'     => 'cms_fancybox_single.php',
			'layout_mode'      => '1',
			'class'            => '',
		), $atts);
		$atts = array_merge($atts_extra,$atts);
		$atts['icon_type'] = isset($atts['icon_type'])?$atts['icon_type']:'fontawesome';
		$atts['description_item'] = isset($atts['description_item'])?$atts['description_item']:'';
		$atts['title_item'] = isset($atts['title_item'])?$atts['title_item']:'';
		switch ($atts['icon_type']) {
			case 'pe7stroke':
				wp_enqueue_style('pe-icon-7-stroke', get_template_directory_uri() . '/assets/css/pe-icon-7-stroke.css', array(), '1.2.0');
				break;
			default:
				vc_icon_element_fonts_enqueue( $atts['icon_type'] );
				break;
		}
        $html_id = cmsHtmlID('cms-fancy-box-single');
        $atts['template'] = 'template-'.str_replace('.php','',$atts['cms_template']). ' '. $atts['class'];
        $atts['html_id'] = $html_id;
		return parent::content($atts, $content);
	}
}

?>