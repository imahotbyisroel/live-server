<?php 
    /* get Shortcode custom value */
    extract(shortcode_atts(array(
        'nav'                   => true,
        'dots'                  => true,
        'dot_style'              => '',
        'layout_mode'           => 1,
        'content_align'         => '',
        'number_row'            => '1',
        'item_bg'               => '',
        'title_color'           => '',
        'text_color'            => '',
        'show_media'            => true,
        'overlay_bg'            => '',
        'animation_in'          => '',
        'animation_out'         => '',
        'thumbnail_size'        => 'medium',
        'thumbnail_size_custom' => '',
        'thumbnail_size_auto'   => true,
        'show_date'             => true,
        'show_author'           => false,
        'show_view'             => false,
        'show_like'             => false,
        'show_comment'          => false,
        'show_tags'             => false,
        'show_category'         => false,
        'show_excerpt'          => false,
        'show_popup'            => true,
        'show_readmore'         => true,
        'show_attr'             => true,
        'paging_mode'           => '1',
        'excerpt_lenght'        => '183',
        'show_all_link'         => '',
        'btn_type'              => 'btn',
        'filter'                => false,
        'filter_align'          => 'text-center',
        'all_text'              => 'All',
        'filter_color'          => '',
        'filter_color_hover'    => '',
    ), $atts));
    if($nav)  $atts['template'] .= ' has-nav'; 
    if($dots)  $atts['template'] .= ' has-dots'; 
    if($dot_style == 'dots-thumbnail')  $atts['template'] .= ' dots-thumbnail';
    if($dot_style == 'dots-progress')  $atts['template'] .= ' dots-progress';
    $atts['template'] .= ' layout-'.$layout_mode;

    $taxo = 'category';
    $_category = array();
    if(!isset($atts['cat']) || $atts['cat']==''){
        $terms = get_terms($taxo);
        foreach ($terms as $cat){
            $_category[] = $cat->term_id;
        }
    } else {
        $_category  = explode(',', $atts['cat']);
    }
    $atts['categories'] = $_category;
    /* Item Background */
    $item_overlay_bg = $item_bg_color = $content_padding = $title_style = '' ;
    if(!empty($item_bg)){
        $atts['template'] .= ' has-custom-bg';
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
    
    /* Show All Link */
    $use_link = false; 
    if(!empty($show_all_link)){
        $button_link = vc_build_link( $show_all_link );
        $button_link = ( $button_link == '||' ) ? '' : $button_link;
        if ( strlen( $button_link['url'] ) > 0 ) {
            $use_link = true; 
            $a_href = $button_link['url'] ? $button_link['url'] : '';
            $a_title = $button_link['title'] ? $button_link['title'] : '' ;
            $a_target = strlen( $button_link['target'] ) > 0 ? $button_link['target'] : '_self';
        }
    }
    $placeholder_thumbnail = true;
    wp_enqueue_script('prettyphoto');
    wp_enqueue_style('prettyphoto');
?>
<div class="cms-carousel-wraper">
<?php if($filter):?>
    <div class="cms-grid-filter <?php echo esc_attr($filter_align);?>">
        <ul class="cms-filter-category list-unstyled list-inline extra-font <?php echo esc_attr('layout-'.$layout_mode);?>">
            <li><a class="active" data-color="<?php echo esc_attr($filter_color);?>" data-color-hover="<?php echo esc_attr($filter_color_hover);?>" href="#" data-group="all"><?php echo esc_attr($all_text); ?></a></li>
            <?php 
            if(is_array($atts['categories']))
            foreach($atts['categories'] as $category):?>
                <?php $term = get_term( $category, $taxo );?>
                <li><a href="#" data-color="<?php echo esc_attr($filter_color);?>" data-color-hover="<?php echo esc_attr($filter_color_hover);?>" data-group="<?php echo esc_attr('category-'.$term->slug);?>">
                        <?php echo esc_html($term->name);?>
                    </a>
                </li>
            <?php endforeach;?>
        </ul>
    </div>
<?php endif;?>
<div class="cms-carousel owl-carousel cms-grid <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <?php
    $posts = $atts['posts'];
    $count=$posts->post_count;
    $i=1;
    $j=0;
    while($posts->have_posts()){
        /* get data for filter */
        $groups = array();
        $groups[] = 'all';
        foreach(cmsGetCategoriesByPostID(get_the_ID(),$taxo) as $category){
            $groups[] = 'filter-'.$category->slug.'';
        }
        $groups_cls = implode(' ', $groups);

        $j++; 
        $even = $j%2;
        if ($even == 0) {
                $media_cls = 'pull-right';
        } else {
            $media_cls = '';
        }
        if($i > $number_row) $i=1;
        $posts->the_post();
        $post_type = get_post_type();
        $post_format = get_post_format();
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
            case 'zkgallery':
                $taxo = 'zkgallery_cat';
                $taxo_tag = 'zkgallery_tag';
                $show_gallery_attr = true;
                break;
            default:
                $taxo = 'category';
                $taxo_tag = 'post_tag';
                break;
        }
        
        /* get Post Thumbnail */
        if(has_post_thumbnail() &&  wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false)){
            $full_src = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false);
            $thumbnail_src = $full_src[0];
            $img = wpb_getImageBySize( array(
                'attach_id'  => get_post_thumbnail_id(get_the_ID()),
                'thumb_size' => '210x140',
                'class'      => 'dots-thumb',
            ));
            if($dot_style == 'dots-thumbnail'){
                $dot_image = $img['thumbnail'];
            }
        } else {
            $thumbnail_src = get_template_directory_uri().'/assets/images/no-image.jpg';
            if ($dot_style == 'dots-thumbnail') {
                $dot_image = '<img src="'.$thumbnail_src.'" />';
            }
        }
        
        if($i==1): 
        ?>
        <div class="cms-carousel-item" data-dot="">
        <?php endif ;
        switch ($layout_mode) {
            case '3':
        ?>
            <article <?php post_class('row'); ?>>
                <div class="col-md-9 nopadding">
                <?php 
                    spcharityplus_post_media('900x650');  
                ?>
                </div>
                <div class="entry-info col-md-5 accent-bg">
                    <h2 class="color-white"><?php spcharityplus_max_charlength(get_the_title(), 35, true); ?></h2>
                    <div class="archive-summary">
                        <?php spcharityplus_post_excerpt('150', false); ?>
                    </div>
                    <div class="entry-footer"><a class="btn" href="<?php the_permalink();?>"><?php esc_html_e('Read more','sp-charityplus');?></a></div>
                </div>
            </article>
        <?php
            break;
            case '2':
        ?>
            <article <?php post_class('row accent-bg full-width-left equare-height'); ?>>
                <div class="col-md-6 nopadding">
                <?php 
                    spcharityplus_post_media('960x660');  
                ?>
                </div>
                <div class="entry-info col-md-6 col-lg-5">
                    <h3 class="color-white"><?php spcharityplus_max_charlength(get_the_title(), 50, true); ?></h3>
                    <div class="archive-summary">
                        <?php spcharityplus_post_excerpt('200', true); ?>
                    </div>
                    <div class="entry-footer"><a class="btn" href="<?php the_permalink();?>"><?php esc_html_e('Read more','sp-charityplus');?></a></div>
                    <div class="navContainer owl-nav"></div>
                </div>
            </article>
        <?php
            break;
            default:
        ?>
            <article <?php post_class('entry-archive entry-standard'); ?>>
                <?php 
                    spcharityplus_post_media();  
                ?>
                <div class="entry-info">
                    <?php spcharityplus_archive_header(); ?>
                    <div class="archive-summary">
                        <?php
                        /* translators: %s: Name of current post */
                        the_excerpt();

                        wp_link_pages( array(
                            'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'sp-charityplus' ) . '</span>',
                            'after'       => '</div>',
                            'link_before' => '<span>',
                            'link_after'  => '</span>',
                        ) );
                        ?>
                    </div>
                    <?php spcharityplus_archive_footer(); ?>
                </div>
            </article>
        <?php
            break;
            }
        ?>
        
        <?php  if($i == $number_row || $j==$count): ?>
            </div>
        <?php endif; 
        $i ++; }
    ?>
</div>
<?php if($use_link) { ?>
    <div class="cms-grid-view-all  text-center">
        <a class="<?php echo esc_attr($btn_type);?>" href="<?php echo esc_url( $a_href ); ?>" title="<?php echo esc_attr( $a_title ); ?>" target="<?php echo trim( esc_attr( $a_target ) ); ?>"><?php echo esc_attr( $a_title ); ?></a>
    </div>
<?php } ?>
</div>