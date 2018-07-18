<?php
vc_map(
	array(
		'name'     => esc_html__('CMS Carousel', 'sp-charityplus'),
		'base'     => 'cms_carousel',
		'class'    => 'vc-cms-carousel',
		'category' => esc_html__('CmsSuperheroes Shortcodes', 'sp-charityplus'),
		'params'   => array(
	    	array(
				'type'       => 'loop',
				'heading'    => esc_html__('Source','sp-charityplus'),
				'param_name' => 'source',
				'settings'   => array(
					'size'     => array('hidden' => false, 'value' => 10),
					'order_by' => array('value' => 'date')
	            ),
	            'group' 	 => esc_html__('Source Settings', 'sp-charityplus'),
	        ),
	        array(
		        'type' => 'img',
		        'heading' => esc_html__('Layout Mode','sp-charityplus'),
		        'param_name' => 'layout_mode',
		        'value' =>  array(
		            '1' => get_template_directory_uri().'/assets/images/archive/content.jpg',
		            '2' => get_template_directory_uri().'/vc_params/layouts/cms-carousel2.png',
		            '3' => get_template_directory_uri().'/vc_params/layouts/cms-carousel3.png',
		        ),
		        'std' => '1',
		        'group' => esc_html__('Template','sp-charityplus'),
		    ),
			array(
				'type'                            => 'dropdown',
				'heading'                         => esc_html__('Content Align','sp-charityplus'),
				'param_name'                      => 'content_align',
				'value'                           => array(
				esc_html__('Default','sp-charityplus') => '',
				esc_html__('Left','sp-charityplus')    => 'text-left',
				esc_html__('Right','sp-charityplus')   => 'text-right',
				esc_html__('Center','sp-charityplus')  => 'text-center',
				),
				'std'                             => '',
				'group'                           => esc_html__('Template', 'sp-charityplus')
	        ),
	        array(
				'type'        => 'cms_template',
				'param_name'  => 'cms_template',
				'shortcode'   => 'cms_carousel',
				'admin_label' => true,
				'heading'     => esc_html__('Shortcode Template','sp-charityplus'),
				'group'       => esc_html__('Template', 'sp-charityplus'),
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
			
			/* Carousel Settings */
	        array(
				'type'             => 'dropdown',
				'heading'          => esc_html__('XSmall Devices','sp-charityplus'),
				'param_name'       => 'xsmall_items',
				'edit_field_class' => 'vc_col-sm-3 vc_carousel_item',
				'value'            => array(1,2,3,4,5,6,7,8,9,10,11,12),
				'std'              => 1,
				'group'            => esc_html__('Carousel Settings', 'sp-charityplus')
	        ),
	    	array(
				'type'             => 'dropdown',
				'heading'          => esc_html__('Small Devices','sp-charityplus'),
				'param_name'       => 'small_items',
				'edit_field_class' => 'vc_col-sm-3 vc_carousel_item',
				'value'            => array(1,2,3,4,5,6,7,8,9,10,11,12),
				'std'              => 1,
				'group'            => esc_html__('Carousel Settings', 'sp-charityplus')
	        ),
	        array(
				'type'             => 'dropdown',
				'heading'          => esc_html__('Medium Devices','sp-charityplus'),
				'param_name'       => 'medium_items',
				'edit_field_class' => 'vc_col-sm-3 vc_carousel_item',
				'value'            => array(1,2,3,4,5,6,7,8,9,10,11,12),
				'std'              => 1,
				'group'            => esc_html__('Carousel Settings', 'sp-charityplus')
	        ),
	        array(
				'type'             => 'dropdown',
				'heading'          => esc_html__('Large Devices','sp-charityplus'),
				'param_name'       => 'large_items',
				'edit_field_class' => 'vc_col-sm-3 vc_carousel_item',
				'value'            => array(1,2,3,4,5,6,7,8,9,10,11,12),
				'std'              => 1,
				'group'            => esc_html__('Carousel Settings', 'sp-charityplus')
	        ),
	        array(
				'type'       => 'textfield',
				'heading'    => esc_html__('Margin Items','sp-charityplus'),
				'param_name' => 'margin',
				'value'      => '30',
				'group'      => esc_html__('Carousel Settings', 'sp-charityplus')
	        ),
	        array(
				'type'       => 'checkbox',
				'heading'    => esc_html__('Loop Items','sp-charityplus'),
				'param_name' => 'loop',
				'std'    	 => 'false',
				'group'      => esc_html__('Carousel Settings', 'sp-charityplus')
	        ),
	        array(
				'type'       => 'checkbox',
				'heading'    => esc_html__('Center','sp-charityplus'),
				'param_name' => 'center',
				'std'    	 => 'false',
				'group'      => esc_html__('Carousel Settings', 'sp-charityplus')
	        ),
	        array(
				'type'       => 'checkbox',
				'heading'    => esc_html__('Mouse Drag','sp-charityplus'),
				'param_name' => 'mousedrag',
				'std'	 	 => 'true',
	            'group' 	 => esc_html__('Carousel Settings', 'sp-charityplus')
	        ),
	        array(
				'type'       => 'checkbox',
				'heading'    => esc_html__('Touch Drag','sp-charityplus'),
				'param_name' => 'touchdrag',
				'std'	 	 => 'true',
	            'group' 	 => esc_html__('Carousel Settings', 'sp-charityplus')
	        ),
	        array(
				'type'       => 'checkbox',
				'heading'    => esc_html__('Pull Drag','sp-charityplus'),
				'param_name' => 'pulldrag',
				'std'	 	 => 'true',
	            'group' 	 => esc_html__('Carousel Settings', 'sp-charityplus')
	        ),
	        array(
				'type'       => 'checkbox',
				'heading'    => esc_html__('Free Drag','sp-charityplus'),
				'param_name' => 'freedrag',
				'std'	 	 => 'false',
	            'group' 	 => esc_html__('Carousel Settings', 'sp-charityplus')
	        ),
	        array(
				'type'       => 'textfield',
				'heading'    => esc_html__('Stage Padding','sp-charityplus'),
				'param_name' => 'stagepadding',
				'value'	 	 => '0',
	            'group' 	 => esc_html__('Carousel Settings', 'sp-charityplus')
	        ),
	        array(
				'type'       => 'checkbox',
				'heading'    => esc_html__('Merge','sp-charityplus'),
				'param_name' => 'merge',
				'std'    	 => 'false',
				'group'      => esc_html__('Carousel Settings', 'sp-charityplus')
	        ),
	        array(
				'type'       => 'checkbox',
				'heading'    => esc_html__('Merge Fit','sp-charityplus'),
				'param_name' => 'mergefit',
				'std'    	 => 'true',
				'group'      => esc_html__('Carousel Settings', 'sp-charityplus')
	        ),
	        array(
				'type'       => 'checkbox',
				'heading'    => esc_html__('auto Width','sp-charityplus'),
				'param_name' => 'autowidth',
				'std'    	 => 'false',
				'group'      => esc_html__('Carousel Settings', 'sp-charityplus')
	        ),
	        array(
				'type'       => 'textfield',
				'heading'    => esc_html__('start Position','sp-charityplus'),
				'param_name' => 'startposition',
				'value'    	 => '0',
				'group'      => esc_html__('Carousel Settings', 'sp-charityplus')
	        ),
	        array(
				'type'       => 'checkbox',
				'heading'    => esc_html__('Show Nav','sp-charityplus'),
				'param_name' => 'nav',
				'std'    	 => 'false',
				'group'      => esc_html__('Carousel Settings', 'sp-charityplus')
	        ),
	        array(
				'type'       => 'checkbox',
				'heading'    => esc_html__('rewind','sp-charityplus'),
				'param_name' => 'rewind',
				'std'    	 => 'true',
				'group'      => esc_html__('Carousel Settings', 'sp-charityplus')
	        ),

	        array(
				'type'       => 'dropdown',
				'heading'    => esc_html__('Nav Position','sp-charityplus'),
				'param_name' => 'nav_pos',
				'value'      => spcharityplus_carousel_nav_style(),
				'std'   	=> '',
				'dependency' => array(
	            	'element'=>'nav',
	            	'value' => 'true'
	            ),
				'group' 	=> esc_html__('Carousel Settings', 'sp-charityplus')
	        ),
	        /* Start Left Icon */
	        array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Prev Icon library', 'sp-charityplus' ),
				'value'       => spcharityplus_icon_libs(),
				'param_name'  => 'l_icon_type',
				'std'         => 'fontawesome',
				'description' => esc_html__( 'Select icon library.', 'sp-charityplus' ),
				'dependency'  => array(
					'element'     => 'nav',
					'value'       => 'true',
				),
				'group'       => esc_html__('Carousel Settings', 'sp-charityplus')
			),

			array(
				'type'         => 'iconpicker',
				'heading'      => esc_html__( 'Prev Icon', 'sp-charityplus' ),
				'param_name'   => 'l_icon_fontawesome',
				'value'        => '',
				'settings'     => array(
				'emptyIcon'    => true, // default true, display an 'EMPTY' icon?
				'type'         => 'fontawesome',
				'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency'   => array(
				'element'      => 'l_icon_type',
				'value'        => 'fontawesome',
				),
				'description'  => esc_html__( 'Select icon from library.', 'sp-charityplus' ),
				'group'        => esc_html__('Carousel Settings', 'sp-charityplus')
			),
	        array(
				'type'         => 'iconpicker',
				'heading'      => esc_html__( 'Prev Icon', 'sp-charityplus' ),
				'param_name'   => 'l_icon_openiconic',
				'value'        => '',
				'settings'     => array(
				'emptyIcon'    => true, // default true, display an 'EMPTY' icon?
				'type'         => 'openiconic',
				'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency'   => array(
				'element'      => 'l_icon_type',
				'value'        => 'openiconic',
				),
				'description'  => esc_html__( 'Select icon from library.', 'sp-charityplus' ),
				'group'        => esc_html__('Carousel Settings', 'sp-charityplus')
			),
			array(
				'type'         => 'iconpicker',
				'heading'      => esc_html__( 'Prev Icon', 'sp-charityplus' ),
				'param_name'   => 'l_icon_typicons',
				'value'        => '',
				'settings'     => array(
				'emptyIcon'    => true, // default true, display an 'EMPTY' icon?
				'type'         => 'typicons',
				'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency'   => array(
				'element'      => 'l_icon_type',
				'value'        => 'typicons',
				),
				'description'  => esc_html__( 'Select icon from library.', 'sp-charityplus' ),
				'group'        => esc_html__('Carousel Settings', 'sp-charityplus')
			),
			array(
				'type'         => 'iconpicker',
				'heading'      => esc_html__( 'Prev Icon', 'sp-charityplus' ),
				'param_name'   => 'l_icon_entypo',
				'value'        => '',
				'settings'     => array(
				'emptyIcon'    => true, // default true, display an 'EMPTY' icon?
				'type'         => 'entypo',
				'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency'   => array(
				'element'      => 'l_icon_type',
				'value'        => 'entypo',
				),
				'description'  => esc_html__( 'Select icon from library.', 'sp-charityplus' ),
				'group'        => esc_html__('Carousel Settings', 'sp-charityplus')
			),
			array(
				'type'         => 'iconpicker',
				'heading'      => esc_html__( 'Prev Icon', 'sp-charityplus' ),
				'param_name'   => 'l_icon_linecons',
				'value'        => '',
				'settings'     => array(
				'emptyIcon'    => true, // default true, display an 'EMPTY' icon?
				'type'         => 'linecons',
				'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency'   => array(
				'element'      => 'l_icon_type',
				'value'        => 'linecons',
				),
				'description'  => esc_html__( 'Select icon from library.', 'sp-charityplus' ),
				'group'        => esc_html__('Carousel Settings', 'sp-charityplus')
			),
			array(
				'type'         => 'iconpicker',
				'heading'      => esc_html__( 'Prev Icon', 'sp-charityplus' ),
				'param_name'   => 'l_icon_monosocial',
				'value'        => '',
				'settings'     => array(
				'emptyIcon'    => true, // default true, display an 'EMPTY' icon?
				'type'         => 'monosocial',
				'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency'   => array(
				'element'      => 'l_icon_type',
				'value'        => 'monosocial',
				),
				'description'  => esc_html__( 'Select icon from library.', 'sp-charityplus' ),
				'group'        => esc_html__('Carousel Settings', 'sp-charityplus')
			),
			array(
				'type'         => 'iconpicker',
				'heading'      => esc_html__( 'Prev Icon', 'sp-charityplus' ),
				'param_name'   => 'l_icon_material',
				'value'        => '',
				'settings'     => array(
					'emptyIcon'    => true, // default true, display an 'EMPTY' icon?
					'type'         => 'material',
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency'   => array(
					'element'      => 'l_icon_type',
					'value'        => 'material',
				),
				'description'  => esc_html__( 'Select icon from library.', 'sp-charityplus' ),
				'group'        => esc_html__('Carousel Settings', 'sp-charityplus')
			),
			/* End Left Icon */
			/* Start Right Icon */
	        array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Next Icon library', 'sp-charityplus' ),
				'value'       => spcharityplus_icon_libs(),
				'param_name'  => 'r_icon_type',
				'std'         => 'fontawesome',
				'description' => esc_html__( 'Select icon library.', 'sp-charityplus' ),
				'dependency'  => array(
				'element'     => 'nav',
				'value'       => 'true',
				),
				'group'       => esc_html__('Carousel Settings', 'sp-charityplus')
			),
			array(
				'type'         => 'iconpicker',
				'heading'      => esc_html__( 'Next Icon', 'sp-charityplus' ),
				'param_name'   => 'r_icon_fontawesome',
				'value'        => '',
				'settings'     => array(
				'emptyIcon'    => true, // default true, display an 'EMPTY' icon?
				'type'         => 'fontawesome',
				'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency'   => array(
				'element'      => 'r_icon_type',
				'value'        => 'fontawesome',
				),
				'description'  => esc_html__( 'Select icon from library.', 'sp-charityplus' ),
				'group'        => esc_html__('Carousel Settings', 'sp-charityplus')
			),
	        array(
				'type'         => 'iconpicker',
				'heading'      => esc_html__( 'Next Icon', 'sp-charityplus' ),
				'param_name'   => 'r_icon_openiconic',
				'value'        => '',
				'settings'     => array(
				'emptyIcon'    => true, // default true, display an 'EMPTY' icon?
				'type'         => 'openiconic',
				'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency'   => array(
				'element'      => 'r_icon_type',
				'value'        => 'openiconic',
				),
				'description'  => esc_html__( 'Select icon from library.', 'sp-charityplus' ),
				'group'        => esc_html__('Carousel Settings', 'sp-charityplus')
			),
			array(
				'type'         => 'iconpicker',
				'heading'      => esc_html__( 'Next Icon', 'sp-charityplus' ),
				'param_name'   => 'r_icon_typicons',
				'value'        => '',
				'settings'     => array(
				'emptyIcon'    => true, // default true, display an 'EMPTY' icon?
				'type'         => 'typicons',
				'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency'   => array(
				'element'      => 'r_icon_type',
				'value'        => 'typicons',
				),
				'description'  => esc_html__( 'Select icon from library.', 'sp-charityplus' ),
				'group'        => esc_html__('Carousel Settings', 'sp-charityplus')
			),
			array(
				'type'         => 'iconpicker',
				'heading'      => esc_html__( 'Next Icon', 'sp-charityplus' ),
				'param_name'   => 'r_icon_entypo',
				'value'        => '',
				'settings'     => array(
				'emptyIcon'    => true, // default true, display an 'EMPTY' icon?
				'type'         => 'entypo',
				'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency'   => array(
				'element'      => 'r_icon_type',
				'value'        => 'entypo',
				),
				'description'  => esc_html__( 'Select icon from library.', 'sp-charityplus' ),
				'group'        => esc_html__('Carousel Settings', 'sp-charityplus')
			),
			array(
				'type'         => 'iconpicker',
				'heading'      => esc_html__( 'Next Icon', 'sp-charityplus' ),
				'param_name'   => 'r_icon_linecons',
				'value'        => '',
				'settings'     => array(
				'emptyIcon'    => true, // default true, display an 'EMPTY' icon?
				'type'         => 'linecons',
				'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency'   => array(
				'element'      => 'r_icon_type',
				'value'        => 'linecons',
				),
				'description'  => esc_html__( 'Select icon from library.', 'sp-charityplus' ),
				'group'        => esc_html__('Carousel Settings', 'sp-charityplus')
			),
			array(
				'type'         => 'iconpicker',
				'heading'      => esc_html__( 'Next Icon', 'sp-charityplus' ),
				'param_name'   => 'r_icon_monosocial',
				'value'        => '',
				'settings'     => array(
				'emptyIcon'    => true, // default true, display an 'EMPTY' icon?
				'type'         => 'monosocial',
				'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency'   => array(
				'element'      => 'r_icon_type',
				'value'        => 'monosocial',
				),
				'description'  => esc_html__( 'Select icon from library.', 'sp-charityplus' ),
				'group'        => esc_html__('Carousel Settings', 'sp-charityplus')
			),
			array(
				'type'         => 'iconpicker',
				'heading'      => esc_html__( 'Next Icon', 'sp-charityplus' ),
				'param_name'   => 'r_icon_material',
				'value'        => '',
				'settings'     => array(
				'emptyIcon'    => true, // default true, display an 'EMPTY' icon?
				'type'         => 'material',
				'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency'   => array(
				'element'      => 'r_icon_type',
				'value'        => 'material',
				),
				'description'  => esc_html__( 'Select icon from library.', 'sp-charityplus' ),
				'group'        => esc_html__('Carousel Settings', 'sp-charityplus')
			),
			/* End Nav Icon */
	        array(
				'type'       => 'checkbox',
				'heading'    => esc_html__('Show Dots','sp-charityplus'),
				'param_name' => 'dots',
				'std'        => 'false',
				'group'      => esc_html__('Carousel Settings', 'sp-charityplus')
	        ),
	        array(
				'type'       => 'dropdown',
				'heading'    => esc_html__('Dots Style','sp-charityplus'),
				'param_name' => 'dot_style',
				'value'      => spcharityplus_carousel_dots_style(),
				'std'   	=> '',
				'dependency' => array(
	            	'element'=>'dots',
	            	'value' => 'true'
	            ),
				'group' 	=> esc_html__('Carousel Settings', 'sp-charityplus')
	        ),
	        array(
				'type'       => 'checkbox',
				'heading'    => esc_html__('Auto Play','sp-charityplus'),
				'param_name' => 'autoplay',
				'std'        => 'true',
				'group'      => esc_html__('Carousel Settings', 'sp-charityplus')
	        ),

	        array(
				'type'       => 'textfield',
				'heading'    => esc_html__('Auto Play TimeOut','sp-charityplus'),
				'param_name' => 'autoplaytimeout',
				'value'      => '1000',
				'dependency' => array(
					'element' =>'autoplay',
					'value'   => 'true'
	            ),
	            'group' 	 => esc_html__('Carousel Settings', 'sp-charityplus')
	        ),
	        array(
				'type'       => 'checkbox',
				'heading'    => esc_html__('Auto Height','sp-charityplus'),
				'param_name' => 'autoheight',
				'std'        => 'true',
				'group'      => esc_html__('Carousel Settings', 'sp-charityplus')
	        ),
	        array(
				'type'        => 'textfield',
				'heading'     => esc_html__('Smart Speed','sp-charityplus'),
				'param_name'  => 'smartspeed',
				'value'       => '1000',
				'description' => esc_html__('Speed scroll of each item','sp-charityplus'),
				'group'       => esc_html__('Carousel Settings', 'sp-charityplus')
	        ),
	        array(
				'type'       => 'checkbox',
				'heading'    => esc_html__('Pause On Hover','sp-charityplus'),
				'param_name' => 'autoplayhoverpause',
				'dependency' => array(
					'element' =>'autoplay',
					'value'   => 'true'
	            	),
				'std'   	 => 'true',
				'group' 	 => esc_html__('Carousel Settings', 'sp-charityplus')
	        ),
	        array(
				'type'       => 'checkbox',
				'heading'    => esc_html__('Enable MouseWheel','sp-charityplus'),
				'param_name' => 'mousewheel',
				'std'   	 => 'false',
				'group' 	 => esc_html__('Carousel Settings', 'sp-charityplus')
	        ),
	        array(
			    'type'          => 'animation_style',
			    'class'         => '',
			    'heading'       => esc_html__('Animation In','sp-charityplus'),
			    'param_name'    => 'owlanimation_in',
			    'std'           => '',
			    'group'         => esc_html__('Carousel Settings','sp-charityplus'),
			),
			array(
			    'type'          => 'animation_style',
			    'class'         => '',
			    'heading'       => esc_html__('Animation Out','sp-charityplus'),
			    'param_name'    => 'owlanimation_out',
			    'std'           => '',
			    'group'         => esc_html__('Carousel Settings','sp-charityplus'),
			),
	        /* Add filter */
			array(
			    'type'          => 'checkbox',
			    'class'         => '',
			    'heading'       => esc_html__('Show Filter','sp-charityplus'),
			    'description'   => esc_html__('If YES, show a filter menu','sp-charityplus'),
			    'param_name'    => 'filter',
			    'std'           => 'false',
			    'group'         => esc_html__('Filter','sp-charityplus'),
			),
			array(
			    'type'          => 'dropdown',
			    'edit_field_class' => 'vc_col-sm-6 vc_column',
			    'heading'       => esc_html__('Filter Align','sp-charityplus'),
			    'param_name'    => 'filter_align',
			    'group'         => esc_html__('Filter','sp-charityplus'),
			    'value'         => array(
			        esc_html__('Default','sp-charityplus')   => '',
			        esc_html__('Left','sp-charityplus')      => 'text-left',
			        esc_html__('Right','sp-charityplus')     => 'text-right',
			        esc_html__('Center','sp-charityplus')    => 'text-center',
			    ),
			    'std'           => 'text-center',
			    'dependency'    => array(
			        'element'   => 'filter',
			        'value'     => 'true',
			    ),
			),
			array(
			    'type'          => 'textfield',
			    'edit_field_class' => 'vc_col-sm-6 vc_column',
			    'heading'       => esc_html__('Filter All Text','sp-charityplus'),
			    'param_name'    => 'all_text',
			    'value'         => 'All',
			    'group'         => esc_html__('Filter','sp-charityplus'),
			    'dependency'    => array(
			        'element'   => 'filter',
			        'value'     => 'true',
			    ),
			),
			array(
			    'type'          => 'colorpicker',
			    'edit_field_class' => 'vc_col-sm-6 vc_column',
			    'heading'       => esc_html__('Filter Color','sp-charityplus'),
			    'param_name'    => 'filter_color',
			    'group'         => esc_html__('Filter','sp-charityplus'),
			    'dependency'    => array(
			        'element'   => 'filter',
			        'value'     => 'true',
			    ),
			),
			array(
			    'type'          => 'colorpicker',
			    'edit_field_class' => 'vc_col-sm-6 vc_column',
			    'heading'       => esc_html__('Filter Color Hover','sp-charityplus'),
			    'param_name'    => 'filter_color_hover',
			    'group'         => esc_html__('Filter','sp-charityplus'),
			    'dependency'    => array(
			        'element'   => 'filter',
			        'value'     => 'true',
			    ),
			),
			
	    )
	)
);
global $cms_carousel;
$cms_carousel = array();
class WPBakeryShortCode_cms_carousel extends CmsShortCode{
	protected function content($atts, $content = null){
		//default value
		$atts_extra = shortcode_atts(array(
			'source'             => '',
			'layout_mode'		 => 1,
			'xsmall_items'       => 1,
			'small_items'        => 1,
			'medium_items'       => 1,
			'large_items'        => 1,
			'margin'             => 30,
			'loop'               => 'false',
			'mousedrag'          => 'true',
			'nav'                => 'true',
			'nav_pos'            => '',
			'dots'               => 'false',
			'dot_style'          => '',
			'autoplay'           => 'true',
			'autoheight'         => 'true',
			'autoplaytimeout'    => '1000',
			'smartspeed'         => '1000',
			'autoplayhoverpause' => 'true',
			'mousewheel'		 => 'false',
			'owlanimation_in'	 => '',
			'owlanimation_out'	 => '',
			'l_icon_type'        => 'fontawesome', 
			'l_icon_fontawesome' => 'fa fa-angle-left',
			'l_icon_openiconic'  => '',
			'l_icon_typicons'    => '',
			'l_icon_entypoicons' => '',
			'l_icon_linecons'    => '',
			'l_icon_entypo'      => '',
			'l_icon_pe7stroke'   => '',
			'l_icon_dashicons'   => '',
			'r_icon_type'        => 'fontawesome',
			'r_icon_fontawesome' => 'fa fa-angle-right',
			'r_icon_openiconic'  => '',
			'r_icon_typicons'    => '',
			'r_icon_entypoicons' => '',
			'r_icon_linecons'    => '',
			'r_icon_entypo'      => '',
			'r_icon_pe7stroke'   => '',
			'r_icon_dashicons'   => '',
			'cms_template'       => 'cms_carousel.php',
			'not__in'            => 'false',
			'content_align'      => '',
			'class'              => '',
		), $atts);

		$atts = array_merge($atts_extra,$atts);
		global $cms_carousel;
		//icon lib
		switch ($atts['l_icon_type']) {
			default:
				vc_icon_element_fonts_enqueue( $atts['l_icon_type'] );
			break;
		}
		switch ($atts['r_icon_type']) {
			default:
				vc_icon_element_fonts_enqueue( $atts['r_icon_type'] );
				break;
		}
		$l_icon_name = 'l_icon_' . $atts['l_icon_type'];
    	$l_iconClass = $atts[$l_icon_name];
		$r_icon_name = 'r_icon_' . $atts['r_icon_type'];
    	$r_iconClass = $atts[$r_icon_name];
    	
		wp_enqueue_style('owl-carousel',get_template_directory_uri().'/assets/css/owl.carousel.css','','2.2.1','all');
		wp_enqueue_script('owl-carousel',get_template_directory_uri().'/assets/js/owl.carousel.min.js',array('jquery'),'2.2.1',true);
		if($atts['mousewheel']){
			wp_enqueue_script('mousewheel',get_template_directory_uri().'/assets/libs/mousewheel/jquery.mousewheel.min.js',array('jquery'),'3.1.11',true);
		}
		wp_enqueue_script('owl-carousel-cms',get_template_directory_uri().'/assets/js/owl.carousel.cms.js',array('jquery'),'1.0.0',true);
		/* Load pretty Photo */
		wp_enqueue_script('prettyphoto');
    	wp_enqueue_style('prettyphoto');

		$source = $atts['source'];
        if(isset($atts['not__in']) and $atts['not__in'] == 'true'){
        	list($args, $post) = vc_build_loop_query($source, get_the_ID());
        	
        }else{
        	list($args, $post) = vc_build_loop_query($source);
        }
        $atts['posts'] = $post;
        $html_id = cmsHtmlID('cms-carousel');
        $atts['mergefit'] = isset($atts['mergefit']) ? $atts['mergefit'] : false;
        $atts['autoplaytimeout'] = isset($atts['autoplaytimeout'])?(int)$atts['autoplaytimeout']:5000;
        $atts['smartspeed'] = isset($atts['smartspeed'])?(int)$atts['smartspeed']:1000;
        $nav_icon = array('<i class="'.$l_iconClass.'"></i>','<i class="'.$r_iconClass.'"></i>');
        if($atts['nav_pos'] === 'nav-vertical-text') $nav_icon = array('<i class="'.$l_iconClass.'"></i> Prev','Next <i class="'.$r_iconClass.'"></i>');
        switch ($atts['layout_mode']) {
        	case '2':
        		$navContainer = '.navContainer';
        		break;
        	
        	default:
        		$navContainer = '';
        		break;
        }
        switch ($atts['dot_style']) {
        	case 'dots-thumbail':
        		$dotsdata = 'true';
        		break;
        	default:
        		$dotsdata = 'false';
        		break;
        }
        $cms_carousel[$html_id] = array(
        	'items'				 => (int)$atts['large_items'],
			'margin'             => $atts['margin'],
			'loop'               => $atts['loop'],
			'mouseDrag'          => $atts['mousedrag'],

			'nav'                => $atts['nav'],
			'navText'            => $nav_icon,
			'navContainer'	 	 => $navContainer,
			'navContainerClass'	 => 'owl-nav clearfix',

			'dots'               => $atts['dots'],
			//'dotsContainer'		 => '.dotsContainer',
			'dotsClass'			 => 'owl-dots clearfix',
			'dotsData'			 => $dotsdata,

			'autoplay'           => $atts['autoplay'],
			'autoplayTimeout'    => $atts['autoplaytimeout'],
			'smartSpeed'         => $atts['smartspeed'],
			'autoplayHoverPause' => $atts['autoplayhoverpause'],

			'autoHeight'         => $atts['autoheight'],
			'stagePadding'		 => 0,
			
			'animateIn'	 		 => $atts['owlanimation_in'],
			'animateOut'	 	 => $atts['owlanimation_out'],
			'responsive'         => array(
        		0 => array(
        			'items' => (int)$atts['xsmall_items'],
        		),
	        	768 => array(
	        		'items' => (int)$atts['small_items'],
	        	),
	        	992 => array(
	        		'items' => (int)$atts['medium_items'],
	        	),
	        	1200 => array(
	        		'items' => (int)$atts['large_items'], 
	        	)
	        )
        );
        wp_localize_script('owl-carousel-cms', 'cmscarousel', $cms_carousel);
        $atts['template'] = 'template-'.str_replace('.php','',$atts['cms_template']). ' '. $atts['class']. ' '. $atts['content_align'] . ' '.$atts['nav_pos'];
        if($atts['mousewheel']) $atts['template'] .= ' cms-carousel-mousewheel';
        $atts['html_id'] = $html_id; 
		return parent::content($atts, $content);
	}
}

?>