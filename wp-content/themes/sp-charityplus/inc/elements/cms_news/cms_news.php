<?php
vc_map(
	array(
		'name' => esc_html__('CMS News', 'sp-charityplus'),
	    'base' => 'cms_news',
	    'class' => 'vc-cms-grid',
	    'category' => esc_html__('CmsSuperheroes Shortcodes', 'sp-charityplus'),
	    'params' => array(
	    	array(
	            'type' => 'loop',
	            'heading' => esc_html__('Source','sp-charityplus'),
	            'param_name' => 'source',
	            'settings' => array(
	                'size' => array('hidden' => false, 'value' => 10),
	                'order_by' => array('value' => 'date')
	            ),
	            'group' => esc_html__('Source Settings', 'sp-charityplus'),
	        ),
	        array(
	            'type' => 'textfield',
	            'heading' => esc_html__('Extra Class','sp-charityplus'),
	            'param_name' => 'class',
	            'value' => '',
	            'group' => esc_html__('Template', 'sp-charityplus')
	        ),
	    	array(
	            'type' => 'cms_template',
	            'param_name' => 'cms_template',
	            'shortcode' => 'cms_news',
	            'admin_label' => true,
	            'heading' => esc_html__('Shortcode Template','sp-charityplus'),
	            'group' => esc_html__('Template', 'sp-charityplus'),
	        ),
	        array(
				'type'       => 'img',
				'heading'    => esc_html__('Layout Mode','sp-charityplus'),
				'param_name' => 'layout_mode',
				'value'      =>  array(
			        '1' => get_template_directory_uri().'/vc_params/layouts/cms-news1.png',
			        '2' => get_template_directory_uri().'/vc_params/layouts/cms-news2.png',
			    ),
				'std'   => '1',
				'group' => esc_html__('Layout','sp-charityplus'), 
			)
	    )
	)
);
class WPBakeryShortCode_cms_news extends CmsShortCode{
	protected function content($atts, $content = null){
		global $wp_query,$post;
		$atts_extra = shortcode_atts(array(
            'source' => '',
            'not__in'=> 'false', 
            'cms_template' => 'cms_news.php',
            'class' => '',
                ), $atts);
		$atts = array_merge($atts_extra, $atts);

		//media script
		wp_enqueue_style( 'wp-mediaelement' );
		wp_enqueue_script( 'wp-mediaelement' );
		wp_enqueue_script('cms-grid-pagination',get_template_directory_uri().'/assets/js/cmsgrid.pagination.js',array('jquery'),'1.0.0',true);
		
        $html_id = cmsHtmlID('cms-news');
        $source = $atts['source'];
        if (get_query_var('paged')){ 
        	$paged = get_query_var('paged'); 
        }
	    elseif(get_query_var('page')){ 
	    	$paged = get_query_var('page'); 
	    }
	    else{ 
	    	$paged = 1; 
	    }
        if(isset($atts['not__in']) && $atts['not__in']){
	    	list($args, $wp_query) = vc_build_loop_query($source, get_the_ID());
	    }
        else{
        	list($args, $wp_query) = vc_build_loop_query($source);
        }
        //default categories selected
        $args['cat_tmp'] = isset($args['cat'])?$args['cat']:'';
        // if select term on custom post type, move term item to cat.
        if(strstr($source, 'tax_query')){
        	$source_a = explode('|', $source);
        	foreach ($source_a as $key => $value) {
        		$tmp = explode(':', $value);
        		if($tmp[0] == 'tax_query'){
        			$args['cat_tmp'] = $tmp[1];
        		}
        	}
        }
	    if($paged > 1){
	    	$args['paged'] = $paged;
	    	$wp_query = new WP_Query($args);
	    }
        $atts['cat'] = isset($args['cat_tmp'])?$args['cat_tmp']:'';
        $atts['limit'] = isset($args['posts_per_page'])?$args['posts_per_page']:5;
        /* get posts */
        $atts['posts'] = $wp_query;
        
        $atts['item_class'] = 'cms-news-item';
        $atts['grid_class'] = 'cms-news';
        $class = $atts['class'];
        $atts['template'] = 'template-'.str_replace('.php','',$atts['cms_template']). ' '. $class;
        $atts['html_id'] = $html_id;
		return parent::content($atts, $content);
	}
}

?>