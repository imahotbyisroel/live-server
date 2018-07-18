<?php 
$taxonomiesForFilter = array();
$vcTaxonomiesTypes = vc_taxonomies_types();
if ( is_array( $vcTaxonomiesTypes ) && ! empty( $vcTaxonomiesTypes ) ) {
    foreach ( $vcTaxonomiesTypes as $t => $data ) {
        if ( 'post_format' !== $t && is_object( $data ) ) {
            $taxonomiesForFilter[ $data->labels->name . '(' . $t . ')' ] = $t;
        }
    }
}
vc_add_param('cms_grid', array(
    'type'          => 'dropdown',
    'class'         => '',
    'heading'       => esc_html__('Content Align','sp-charityplus'),
    'param_name'    => 'content_align',
    'value'         => array(
        esc_html__('Default','sp-charityplus')   => '',
        esc_html__('Left','sp-charityplus')      => 'text-left',
        esc_html__('Right','sp-charityplus')     => 'text-right',
        esc_html__('Center','sp-charityplus')    => 'text-center',
    ),
    'std'           => '',
    'group'         => esc_html__('Source Settings','sp-charityplus'),
));
/* Template Tab */
vc_add_param('cms_grid', array(
    'type'          => 'dropdown',
    'class'         => '',
    'heading'       => esc_html__('Paging Mode','sp-charityplus'),
    'param_name'    => 'paging_mode',
    'value'         => array(
        esc_html__('None','sp-charityplus')        => '',
        esc_html__('Default','sp-charityplus')     => '1',
        esc_html__('Dots','sp-charityplus')        => '2',
        esc_html__('Load More','sp-charityplus')   => '3',
    ),
    'std'           => '1',
    'group'         => esc_html__('Template','sp-charityplus'),
));
vc_add_param('cms_grid', array(
    'type'          => 'vc_link',
    'class'         => '',
    'heading'       => esc_html__('Show All Link','sp-charityplus'),
    'param_name'    => 'show_all_link',
    'std'           => '',
    'group'         => esc_html__('Template','sp-charityplus'),
));
vc_add_param('cms_grid',array(
    'type'          => 'dropdown',
    'param_name'    => 'btn_type',
    'heading'       => esc_html__( 'Button Type', 'sp-charityplus' ),
    'value'         => array(
        esc_html__( 'Default', 'sp-charityplus' )     => 'btn',
        esc_html__( 'Primary', 'sp-charityplus' )     => 'btn btn-primary',
    ),
    'std'           => 'btn',
    'group'         => esc_html__('Template','sp-charityplus'),
));
/* Layout Tab */
vc_remove_param('cms_grid','layout');
vc_add_param('cms_grid', array(
    'type' => 'dropdown',
    'heading' => esc_html__('Layout Type','sp-charityplus'),
    'param_name' => 'layout',
    'value' => array(
        'Basic' => 'basic',
        'Masonry' => 'masonry',
        ),
    'group' => esc_html__('Layout', 'sp-charityplus')
));

vc_add_param('cms_grid',array(
    'type' => 'img',
    'heading' => esc_html__('Layout Mode','sp-charityplus'),
    'param_name' => 'layout_mode',
    'value' =>  array(
        '1' => get_template_directory_uri().'/assets/images/archive/content.jpg',
        '2' => get_template_directory_uri().'/assets/images/archive/content-list.jpg',
        '3' => get_template_directory_uri().'/vc_params/layouts/cms-grid3.png',
    ),
    'std' => '1',
    'group' => esc_html__('Layout','sp-charityplus'), 
));
/* Grid Tab */
$layout_grid = array('3');
vc_remove_param('cms_grid','col_xs');
vc_add_param('cms_grid',array(
    'type' => 'dropdown',
    'heading' => esc_html__('Columns XS Devices','sp-charityplus'),
    'param_name' => 'col_xs',
    'edit_field_class' => 'vc_col-sm-3 vc_column',
    'value' => array(1,2,3,4,6,12),
    'std' => 1,
    'dependency'    => array(
        'element'   => 'layout_mode',
        'value'     => $layout_grid,
    ),
    'group' => esc_html__('Grid','sp-charityplus')
));
vc_remove_param('cms_grid','col_sm');
vc_add_param('cms_grid',array(
    'type' => 'dropdown',
    'heading' => esc_html__('Columns SM Devices','sp-charityplus'),
    'param_name' => 'col_sm',
    'edit_field_class' => 'vc_col-sm-3 vc_column',
    'value' => array(1,2,3,4,6,12),
    'std' => 2,
    'dependency'    => array(
        'element'   => 'layout_mode',
        'value'     => $layout_grid,
    ),
    'group' => esc_html__('Grid','sp-charityplus')
));
vc_remove_param('cms_grid','col_md');
vc_add_param('cms_grid',array(
    'type' => 'dropdown',
    'heading' => esc_html__('Columns MD Devices','sp-charityplus'),
    'param_name' => 'col_md',
    'edit_field_class' => 'vc_col-sm-3 vc_column',
    'value' => array(1,2,3,4,6,12),
    'std' => 3,
    'dependency'    => array(
        'element'   => 'layout_mode',
        'value'     => $layout_grid,
    ),
    'group' => esc_html__('Grid','sp-charityplus')
));
vc_remove_param('cms_grid','col_lg');
vc_add_param('cms_grid',array(
    'type' => 'dropdown',
    'heading' => esc_html__('Columns LG Devices','sp-charityplus'),
    'param_name' => 'col_lg',
    'edit_field_class' => 'vc_col-sm-3 vc_column',
    'value' => array(1,2,3,4,6,12),
    'std' => 4,
    'dependency'    => array(
        'element'   => 'layout_mode',
        'value'     => $layout_grid,
    ),
    'group' => esc_html__('Grid','sp-charityplus')
));
/* Filter Tab */
vc_remove_param('cms_grid','filter');
vc_add_param('cms_grid',array(
    'type' => 'dropdown',
    'heading' => esc_html__('Enable Filter','sp-charityplus'),
    'param_name' => 'filter',
    'value' => array(
        esc_html__('Enable','sp-charityplus')  => '1',
        esc_html__('Disable','sp-charityplus') => '0'
    ),
    'group' => esc_html__('Filter', 'sp-charityplus'),
    'std'   => 0
));
vc_add_param('cms_grid',array(
    'type'        => 'dropdown',
    'heading'     => esc_html__( 'Filter by', 'sp-charityplus' ),
    'param_name'  => 'filter_source',
    'value'       => $taxonomiesForFilter,
    'std'         => 'category',
    'group'       => esc_html__('Filter','sp-charityplus'),
    'save_always' => true,
    'description' => esc_html__( 'Select filter source.', 'sp-charityplus' ),
    'dependency'    => array(
        'element'   => 'filter',
        'value'     => '1',
    ),
));
vc_add_param('cms_grid', array(
    'type'             => 'dropdown',
    'edit_field_class' => 'vc_col-sm-6 vc_column',
    'heading'          => esc_html__('Filter Align','sp-charityplus'),
    'param_name'       => 'filter_align',
    'group'            => esc_html__('Filter','sp-charityplus'),
    'value'            => array(
        esc_html__('Default','sp-charityplus')   => '',
        esc_html__('Left','sp-charityplus')      => 'text-left',
        esc_html__('Right','sp-charityplus')     => 'text-right',
        esc_html__('Center','sp-charityplus')    => 'text-center',
    ),
    'std'           => 'text-center',
    'dependency'    => array(
        'element'   => 'filter',
        'value'     => '1',
    ),
));
vc_add_param('cms_grid', array(
    'type'             => 'textfield',
    'edit_field_class' => 'vc_col-sm-6 vc_column',
    'heading'          => esc_html__('Filter All Text','sp-charityplus'),
    'param_name'       => 'all_text',
    'value'            => 'All',
    'group'            => esc_html__('Filter','sp-charityplus'),
    'dependency'    => array(
        'element'   => 'filter',
        'value'     => '1',
    ),
));
vc_add_param('cms_grid', array(
    'type'             => 'colorpicker',
    'edit_field_class' => 'vc_col-sm-6 vc_column',
    'heading'          => esc_html__('Filter Color','sp-charityplus'),
    'param_name'       => 'filter_color',
    'group'            => esc_html__('Filter','sp-charityplus'),
    'dependency'    => array(
        'element'   => 'filter',
        'value'     => '1',
    ),
));
vc_add_param('cms_grid', array(
    'type'             => 'colorpicker',
    'edit_field_class' => 'vc_col-sm-6 vc_column',
    'heading'          => esc_html__('Filter Color Hover','sp-charityplus'),
    'param_name'       => 'filter_color_hover',
    'group'            => esc_html__('Filter','sp-charityplus'),
    'dependency'    => array(
        'element'   => 'filter',
        'value'     => '1',
    ),
));
/* Template Options */
vc_add_param('cms_grid', array(
    'type'          => 'colorpicker',
    'class'         => '',
    'heading'       => esc_html__('Item Background','sp-charityplus'),
    'param_name'    => 'item_bg',
    'std'           => '',
    'group'         => esc_html__('Template Options','sp-charityplus'),
));
vc_add_param('cms_grid', array(
    'type'          => 'colorpicker',
    'class'         => '',
    'heading'       => esc_html__('Title color','sp-charityplus'),
    'description'   => esc_html__('This option just work when item background color is set','sp-charityplus'),
    'param_name'    => 'title_color',
    'std'           => '',
    'group'         => esc_html__('Template Options','sp-charityplus'),
    'dependency'    => array(
        'element'       => 'item_bg',
        'not_empty'     => true,
    ),
));
vc_add_param('cms_grid', array(
    'type'          => 'colorpicker',
    'class'         => '',
    'heading'       => esc_html__('Text color','sp-charityplus'),
    'description'   => esc_html__('This option just work when item background color is set','sp-charityplus'),
    'param_name'    => 'text_color',
    'std'           => '',
    'group'         => esc_html__('Template Options','sp-charityplus'),
    'dependency'    => array(
        'element'       => 'item_bg',
        'not_empty'     => true,
    ),
));
vc_add_param('cms_grid', array(
    'type'          => 'textfield',
    'class'         => '',
    'heading'       => esc_html__('Item Space','sp-charityplus'),
    'description'   => esc_html__('Enter space between each item. Default is 30. NOTE: Just enter number only, default unit is px','sp-charityplus'),
    'param_name'    => 'item_space',
    'std'           => '',
    'group'         => esc_html__('Template Options','sp-charityplus'),
    'dependency'    => array(
        'element'   => 'layout_mode',
        'value'     => $layout_grid,
    ),
));

vc_add_param('cms_grid', array(
    'type'          => 'animation_style',
    'class'         => '',
    'heading'       => esc_html__('Overlay Animation In Style','sp-charityplus'),
    'param_name'    => 'animation_in',
    'std'           => '',
    'group'         => esc_html__('Template Options','sp-charityplus'),
    'dependency'    => array(
        'element'   => 'show_media',
        'value'     => 'true',
    ),
));
vc_add_param('cms_grid', array(
    'type'          => 'animation_style',
    'class'         => '',
    'heading'       => esc_html__('Overlay Animation Out Style','sp-charityplus'),
    'param_name'    => 'animation_out',
    'std'           => '',
    'group'         => esc_html__('Template Options','sp-charityplus'),
    'dependency'    => array(
        'element'   => 'show_media',
        'value'     => 'true',
    ),
));
vc_add_param('cms_grid', array(
    'type'          => 'colorpicker',
    'class'         => '',
    'heading'       => esc_html__('Overlay Background','sp-charityplus'),
    'param_name'    => 'overlay_bg',
    'std'           => '',
    'group'         => esc_html__('Template Options','sp-charityplus'),
    'dependency'    => array(
        'element'   => 'show_media',
        'value'     => 'true',
    ),
));
vc_add_param('cms_grid', array(
    'type'          => 'dropdown',
    'class'         => '',
    'heading'       => esc_html__('Thumbnail Size','sp-charityplus'),
    'param_name'    => 'thumbnail_size',
    'value'         => spcharityplus_thumbnail_sizes(),
    'std'           => 'large',
    'group'         => esc_html__('Template Options','sp-charityplus'),
));
vc_add_param('cms_grid', array(
    'type'          => 'textfield',
    'class'         => '',
    'heading'       => esc_html__('Custom Thumbnail Size','sp-charityplus'),
    'description'   => esc_html__('Alternatively enter size in pixels (Example: 200x100 (Width x Height)).','sp-charityplus'),
    'param_name'    => 'thumbnail_size_custom',
    'value'         => '',
    'group'         => esc_html__('Template Options','sp-charityplus'),
    'dependency'    => array(
        'element'   => 'thumbnail_size',
        'value'     => 'custom',
    ),
));

vc_add_param('cms_grid', array(
    'type'          => 'checkbox',
    'class'         => '',
    'heading'       => esc_html__('Show Date','sp-charityplus'),
    'param_name'    => 'show_date',
    'std'           => 'true',
    'group'         => esc_html__('Template Options','sp-charityplus'),
));
vc_add_param('cms_grid', array(
    'type'          => 'checkbox',
    'class'         => '',
    'heading'       => esc_html__('Show Author','sp-charityplus'),
    'param_name'    => 'show_author',
    'std'           => 'true',
    'group'         => esc_html__('Template Options','sp-charityplus'),
));
vc_add_param('cms_grid', array(
    'type'          => 'checkbox',
    'class'         => '',
    'heading'       => esc_html__('Show Category','sp-charityplus'),
    'param_name'    => 'show_category',
    'std'           => 'false',
    'group'         => esc_html__('Template Options','sp-charityplus'),
));
vc_add_param('cms_grid', array(
    'type'          => 'checkbox',
    'class'         => '',
    'heading'       => esc_html__('Show Tags','sp-charityplus'),
    'param_name'    => 'show_tags',
    'std'           => 'false',
    'group'         => esc_html__('Template Options','sp-charityplus'),
));
vc_add_param('cms_grid', array(
    'type'          => 'checkbox',
    'class'         => '',
    'heading'       => esc_html__('Show Comment','sp-charityplus'),
    'param_name'    => 'show_comment',
    'std'           => 'false',
    'group'         => esc_html__('Template Options','sp-charityplus'),
));
vc_add_param('cms_grid', array(
    'type'          => 'checkbox',
    'class'         => '',
    'heading'       => esc_html__('Show View','sp-charityplus'),
    'param_name'    => 'show_view',
    'std'           => 'false',
    'group'         => esc_html__('Template Options','sp-charityplus'),
));
vc_add_param('cms_grid', array(
    'type'          => 'checkbox',
    'class'         => '',
    'heading'       => esc_html__('Show Like','sp-charityplus'),
    'param_name'    => 'show_like',
    'std'           => 'false',
    'group'         => esc_html__('Template Options','sp-charityplus'),
));
vc_add_param('cms_grid', array(
    'type'          => 'checkbox',
    'class'         => '',
    'heading'       => esc_html__('Show Share','sp-charityplus'),
    'param_name'    => 'show_share',
    'std'           => 'false',
    'group'         => esc_html__('Template Options','sp-charityplus'),
));
vc_add_param('cms_grid', array(
    'type'          => 'checkbox',
    'class'         => '',
    'heading'       => esc_html__('Show Excerpt','sp-charityplus'),
    'description'   => esc_html__('Show excerpt text in all item','sp-charityplus'),
    'param_name'    => 'show_excerpt',
    'std'           => 'true',
    'group'         => esc_html__('Template Options','sp-charityplus'),
));

vc_add_param('cms_grid', array(
    'type'          => 'textfield',
    'class'         => '',
    'heading'       => esc_html__('Maximum character length show in Excerpt','sp-charityplus'),
    'param_name'    => 'excerpt_lenght',
    'std'           => '200',
    'group'         => esc_html__('Template Options','sp-charityplus'),
    'dependency'    => array(
        'element'   => 'show_excerpt',
        'value'     => 'true',
    ),
));
vc_add_param('cms_grid', array(
    'type'          => 'checkbox',
    'class'         => '',
    'heading'       => esc_html__('Show Popup Gallery','sp-charityplus'),
    'param_name'    => 'show_popup',
    'std'           => 'false',
    'group'         => esc_html__('Template Options','sp-charityplus'),
));
vc_add_param('cms_grid', array(
    'type'          => 'checkbox',
    'class'         => '',
    'heading'       => esc_html__('Show Readmore','sp-charityplus'),
    'param_name'    => 'show_readmore',
    'std'           => 'true',
    'group'         => esc_html__('Template Options','sp-charityplus'),
));
?>