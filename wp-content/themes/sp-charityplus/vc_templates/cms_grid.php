<?php 
    /* get Shortcode custom value */
    extract(shortcode_atts(array(
        'layout'                => 'basic',
        'filter'                => '0',
        'content_align'         => '',
        'item_bg'               => '',
        'title_color'           => '',
        'text_color'            => '',
        'item_space'            => '30',
        'animation_in'          => '',
        'animation_out'         => '',
        'overlay_bg'            => '',
        'show_title'            => false,
        'thumbnail_size'        => 'large',
        'thumbnail_size_custom' => '',
        'thumbnail_size_auto'   => true,
        'show_date'             => true,
        'show_author'           => true,
        'show_view'             => false,
        'show_like'             => false,
        'show_share'            => false,
        'show_comment'          => false,
        'show_tags'             => false,
        'show_category'         => false,
        'show_excerpt'          => true,
        'show_popup'            => false,
        'show_readmore'         => true,
        'paging_mode'           => '1',
        'layout_mode'           => '1',
        'filter_source'         => 'category',
        'filter_align'          => 'text-center',
        'all_text'              => 'All',
        'filter_color'          => '',
        'filter_color_hover'    => '',
        'excerpt_lenght'        => '183',
        'show_all_link'         => '',
        'btn_type'              => 'btn'
    ), $atts));
    /* Post Query */
    $posts = $atts['posts'];   
    $count = 0;
    $_category = array();
    if(!isset($atts['cat']) || $atts['cat']==''){
        $terms = get_terms($filter_source);
        foreach ($terms as $cat){
            $_category[] = $cat->term_id;
        }
    } else {
        $_category  = explode(',', $atts['cat']);
    }
    $atts['categories'] = $_category;
    if($layout != 'basic') $atts['grid_class'] .= ' cms-grid-masonry';
    $atts['grid_class'] .= ' row clearfix';
    $item_class = $_item_class = '';
    if($item_bg) {
        $item_class .=' has-custom-bg';
    }
    $item_class .= ' '.$content_align.' ';

    /* Item Background */
    $item_overlay_bg = $item_bg_color = $content_padding = $title_style = '' ;
    if(!empty($item_bg)){
        $item_bg_color = 'style="background-color:'.$item_bg.';';
        if($text_color) $item_bg_color .= 'color:'.$text_color.';';
        $item_bg_color .= '"';
        if($title_color) $title_style = 'style="color:'.$title_color.';"';
    }
    if(!empty($overlay_bg)){
        $item_overlay_bg = 'style="background-color:'.$overlay_bg.';"';
    }
    /* Image Size */
    if ($thumbnail_size === 'custom'){
        $thumbnail_size = $thumbnail_size_custom;
        $image_size = explode('x', $thumbnail_size);
        $image_size_w = $image_size[0];
        $image_size_h = isset($image_size[1]) ? $image_size[1] : $image_size[0];
    } else {
        $image_size_w = spcharityplus_get_image_width($thumbnail_size);
        $image_size_h = spcharityplus_get_image_height($thumbnail_size);
    }

    wp_enqueue_script('modernizr', get_template_directory_uri().'/assets/js/modernizr.min.js', array('jquery'));
    wp_enqueue_script('waypoints', get_template_directory_uri().'/assets/js/waypoints.min.js', array('jquery'));
    wp_enqueue_script('jquery-shuffle', get_template_directory_uri().'/assets/js/jquery.shuffle.js', array('jquery','modernizr','imagesloaded'));
    wp_enqueue_script('cms-jquery-shuffle', get_template_directory_uri().'/assets/js/jquery.shuffle.cms.js', array('jquery-shuffle'));
    if($paging_mode == '3'){
        $atts['grid_class'] .= ' cms-grid-masonry';
        /* js, css for load more */
        wp_register_script( 'cms-loadmore-js', get_template_directory_uri().'/assets/js/cms_loadmore.js', array('jquery') ,'1.0',true);
        // What page are we on? And what is the pages limit?
        global $wp_query;
        $max = $wp_query ->max_num_pages;
        $limit = $atts['limit'];
        $paged = ( get_query_var('paged') > 1 ) ? get_query_var('paged') : 1;
        // Add some parameters for the JS.
        $current_id =  str_replace('-','_',$atts['html_id']);
        wp_localize_script(
            'cms-loadmore-js',
            'cms_more_obj'.$current_id,
            array(
                'startPage' => $paged,
                'maxPages'  => $max,
                'total'     => $wp_query->found_posts,
                'perpage'   => $limit,
                'nextLink'  => next_posts($max, false),
                'masonry'   => 'masonry'
            )
        );
        wp_enqueue_script( 'cms-loadmore-js');
    }

    /* Show All Link */
    $use_link = false; 
    if(!empty($show_all_link)){
        $button_link = vc_build_link( $show_all_link );
        $button_link = ( $button_link == '||' ) ? '' : $button_link;
        if ( strlen( $button_link['url'] ) > 0 ) {
            $use_link = true; 
            $a_href = $button_link['url'] ? $button_link['url'] : '';
            $a_title = $button_link['title'] ? $button_link['title'] : esc_html__('View All','sp-charityplus') ;
            $a_target = strlen( $button_link['target'] ) > 0 ? $button_link['target'] : '_self';
        }
    }
    /* item space */
    $item_space_padding = $item_space/2;
    $style_item_space = '';

    /* Load pretty Photo */
    if($show_popup) {
        wp_enqueue_script('prettyphoto');
        wp_enqueue_style('prettyphoto');
    }
    $placeholder_thumbnail = true;
    /**
     * Custom Grid layout
    */
    switch ($layout_mode){
        case '3':
            $style_item_space = 'style="padding-left:'.$item_space_padding.'px; padding-right:'.$item_space_padding.'px; margin-bottom:'.$item_space.'px;"';
            $item_class .= $atts['item_class'];
            break;
        default :
            $item_class .= 'cms-grid-item col-md-12';
            break;
    }
?>
<div class="cms-grid-wraper <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <?php if($filter):?>
        <div class="cms-grid-filter <?php echo esc_attr($filter_align);?>">
            <ul class="cms-filter-category list-unstyled list-inline extra-font <?php echo esc_attr('layout-'.$layout_mode);?>">
                <li><a class="active" data-color="<?php echo esc_attr($filter_color);?>" data-color-hover="<?php echo esc_attr($filter_color_hover);?>" href="#" data-group="all"><?php echo esc_attr($all_text); ?></a></li>
                <?php 
                if(is_array($atts['categories']))
                foreach($atts['categories'] as $category):?>
                    <?php $term = get_term( $category, $filter_source );?>
                    <li><a href="#" data-color="<?php echo esc_attr($filter_color);?>" data-color-hover="<?php echo esc_attr($filter_color_hover);?>" data-group="<?php echo esc_attr('category-'.$term->slug);?>">
                            <?php echo esc_html($term->name);?>
                        </a>
                    </li>
                <?php endforeach;?>
            </ul>
        </div>
    <?php endif;?>
    
    <div class="<?php echo esc_attr($atts['grid_class'].' layout-'.$layout_mode);?>" style="margin-left:<?php echo esc_attr($item_space_padding*-1);?>px; margin-right:<?php echo esc_attr($item_space_padding*-1);?>px;">
        <?php
        while($posts->have_posts()){
            $count ++ ;
            $posts->the_post();
            $groups = array();
            $groups[] = '"all"';
            foreach(cmsGetCategoriesByPostID(get_the_ID(),$filter_source) as $category){
                $groups[] = '"category-'.$category->slug.'"';
            }
            /* get post type to add post type attribute */
            $post_type = get_post_type();
            $show_woo_attr = $show_portfolio_attr = false;
            switch ($post_type) {
                case 'product':
                    global $product;
                    $taxo = 'product_cat';
                    $taxo_tag = 'product_tag';
                    $show_woo_attr = true;
                    break;
                case 'zkportfolio':
                    $taxo = 'zkportfolio_cat';
                    $taxo_tag = 'zkportfolio_tag';
                    $show_portfolio_attr = true;
                    break;
                default:
                    $taxo = 'category';
                    $taxo_tag = 'post_tag';
                    break;
            }
            $post_format = get_post_format();
            /* get Post thumbnail size */
            switch ($layout_mode) {
                default:
                    $size =  $thumbnail_size;
                    break;
            }
            /* get Post Thumbnail */
            if(has_post_thumbnail() && !post_password_required() && !is_attachment() &&  wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false)){           
                $full_src = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false);
                $thumbnail_src = $full_src[0];
            } else {
                $thumbnail_src = get_template_directory_uri().'/assets/images/no-image.jpg';
            }
            ?>
            <div class="<?php echo esc_attr($item_class);?>" data-groups='[<?php echo implode(',', $groups);?>]' <?php echo wp_kses_post($style_item_space);?>>
                <?php
                    switch ($layout_mode) {
                        case '2':
                        ?>
                            <article <?php post_class('entry-archive entry-list overlay-wrap row'); ?> <?php echo wp_kses_post($item_bg_color);?> onclick="">
                                <div class="col-sm-5">
                                    <div class="entry-media">
                                        <?php spcharityplus_post_media($size, $placeholder_thumbnail,'',''); ?>
                                        <?php if($show_popup) : ?>
                                        <div class="overlay animated" data-animation-in="<?php echo esc_attr($animation_in); ?>" data-animation-out="<?php echo esc_attr($animation_out); ?>" <?php echo wp_kses_post($item_overlay_bg);?>>
                                            <div class="overlay-inner center-align">
                                                <div class="icon-list text-center">
                                                    <a href="<?php echo esc_url($thumbnail_src);?>" class="prettyphoto" data-gal="prettyPhoto[rel-<?php echo esc_attr($atts['html_id']);?>]" title="<?php the_title(); ?>"><i class="fa fa-search"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <div class="entry-info">
                                        <header class="archive-header" <?php echo wp_kses_post($title_style);?>>
                                            <?php spcharityplus_post_meta_list($show_author, $show_date, $show_category, $show_comment, $show_view, $show_like, $show_share); ?>
                                            <h4 class="archive-title" <?php echo wp_kses_post($title_style);?>>
                                                <a href="<?php the_permalink();?>" <?php echo wp_kses_post($title_style);?>><?php the_title();?></a>
                                            </h4>
                                        </header>
                                        <?php 
                                            if($show_excerpt)       spcharityplus_post_excerpt($excerpt_lenght);
                                            if($show_tags)          the_terms( get_the_ID(), $taxo_tag , '<div class="tag-links clearfix">', '','</div>' );
                                        ?>
                                        <?php if($show_readmore) :?>
                                        <footer class="archive-footer">
                                            <a class="archive-readmore" href="<?php the_permalink(); ?>"><?php esc_html_e('Read more', 'sp-charityplus') ?>&nbsp;&nbsp;&nbsp;<i class="zmdi zmdi-arrow-<?php echo is_rtl()?'left':'right';?>"></i></a>
                                        </footer>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </article>
                        <?php
                            break;
                        default:
                        ?>
                            <article <?php post_class('entry-archive entry-standard overlay-wrap'); ?> <?php echo wp_kses_post($item_bg_color);?> onclick="">
                                <div class="entry-media">
                                    <?php spcharityplus_post_media($size, $placeholder_thumbnail,'',''); ?>
                                    <?php if($show_popup) : ?>
                                    <div class="overlay animated" data-animation-in="<?php echo esc_attr($animation_in); ?>" data-animation-out="<?php echo esc_attr($animation_out); ?>" <?php echo wp_kses_post($item_overlay_bg);?>>
                                        <div class="overlay-inner center-align">
                                            <div class="icon-list text-center">
                                                <a href="<?php echo esc_url($thumbnail_src);?>" class="prettyphoto" data-gal="prettyPhoto[rel-<?php echo esc_attr($atts['html_id']);?>]" title="<?php the_title(); ?>"><i class="fa fa-search"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                </div>
                                <div class="entry-info">
                                    <header class="archive-header" <?php echo wp_kses_post($title_style);?>>
                                        <?php spcharityplus_post_meta_list($show_author, $show_date, $show_category, $show_comment, $show_view, $show_like, $show_share); ?>
                                        <h3 class="archive-title" <?php echo wp_kses_post($title_style);?>>
                                            <a href="<?php the_permalink();?>" <?php echo wp_kses_post($title_style);?>><?php the_title();?></a>
                                        </h3>
                                    </header>
                                    <?php 
                                        if($show_excerpt)       spcharityplus_post_excerpt($excerpt_lenght);
                                        if($show_tags)          the_terms( get_the_ID(), $taxo_tag , '<div class="tag-links clearfix">', '','</div>' );
                                    ?>
                                    <?php if($show_readmore ) :?>
                                    <footer class="archive-footer">
                                        <a class="archive-readmore" href="<?php the_permalink(); ?>"><?php esc_html_e('Read more', 'sp-charityplus') ?>&nbsp;&nbsp;&nbsp;<i class="zmdi zmdi-arrow-<?php echo is_rtl()?'left':'right';?>"></i></a>
                                    </footer>
                                    <?php endif; ?>
                                </div>
                            </article>
                        <?php 
                            break;
                    }
                ?>
            </div>
            <?php
        }
        ?>
    </div>
    
    <?php if($paging_mode){
        switch ($paging_mode) {
            case '2':
                spcharityplus_paging_nav('paging-dots'); 
                break;
            case '3':
                echo '<div class="cms_pagination clearfix"></div>';
                break;
            default:
                 spcharityplus_paging_nav($content_align); 
                break;
        }   
    }
    ?>
    <?php if($use_link) { ?>
        <div class="cms-grid-view-all  text-center">
            <a class="<?php echo esc_attr($btn_type);?>" href="<?php echo esc_url( $a_href ); ?>" title="<?php echo esc_attr( $a_title ); ?>" target="<?php echo trim( esc_attr( $a_target ) ); ?>"><?php echo esc_attr( $a_title ); ?></a>
        </div>
    <?php } ?>
</div>