<?php 
    /* get Shortcode custom value */
    extract(shortcode_atts(array(
        'posts_per_page'    => 4,
        'layout_mode'       => 1,
    ), $atts));
    /* Post Query */
    if ( get_query_var('paged') ) {
        $paged = get_query_var('paged');
    } elseif ( get_query_var('page') ) { // 'page' is used instead of 'paged' on Static Front Page
        $paged = get_query_var('page');
    } else {
        $paged = 1;
    }

    $args = array(
        'posts_per_page' => $posts_per_page,
        'post_type'      => 'zkevent',
        'paged'          => $paged,
    );
    $posts = spcharityplus_get_posts($args);

    $filter_source_x = 'event_cat';
    $terms = get_terms($filter_source_x);
    $_category = array();
    foreach ($terms as $cat){
        $_category[] = $cat->term_id;
    }
    $atts['categories'] = $_category;
    switch ($layout_mode){
        case '2':
        break;
        default :
            wp_enqueue_script('modernizr', get_template_directory_uri().'/assets/js/modernizr.min.js', array('jquery'));
            wp_enqueue_script('waypoints', get_template_directory_uri().'/assets/js/waypoints.min.js', array('jquery'));
            wp_enqueue_script('jquery-shuffle', get_template_directory_uri().'/assets/js/jquery.shuffle.js', array('jquery','modernizr','imagesloaded'));
            wp_enqueue_script('cms-jquery-shuffle', get_template_directory_uri().'/assets/js/jquery.shuffle.cms.js', array('jquery-shuffle'));
        break;
    }
?>
<div id="<?php echo esc_attr($atts['html_id']);?>" class="cms-grid-wraper">
    <?php switch ($layout_mode){
        case '2':
        break;
        default :
    ?>
        <div class="cms-grid-filter text-center">
            <ul class="cms-filter-category list-unstyled list-inline">
                <li><a class="active" href="#" data-group="all"><?php echo esc_html__('All Events','sp-charityplus'); ?></a></li>
                <?php 
                if(is_array($atts['categories']))
                foreach($atts['categories'] as $category):?>
                    <?php $term = get_term( $category, $filter_source_x );?>
                    <li><a href="#" data-group="<?php echo esc_attr('category-'.$term->slug);?>">
                            <?php echo esc_html($term->name);?>
                        </a>
                    </li>
                <?php endforeach;?>
            </ul>
        </div>
    <?php
            break;
        } ?>
    
    
    <div class="cms-events cms-grid cms-grid-masonry row layout-<?php echo esc_attr($layout_mode) ?>" data-equal=".equal">
        <?php
        while($posts->have_posts()){
            $posts->the_post();
            $groups = array();
            $groups[] = '"all"';
            foreach(cmsGetCategoriesByPostID(get_the_ID(),$filter_source_x) as $category){
                $groups[] = '"category-'.$category->slug.'"';
            }
            switch ($layout_mode) {
                case '2':
                ?>
                    <div class="cms-grid-item col-sm-12">
                        <article <?php post_class('archive-event'); ?>>
                            <?php
                                spcharityplus_event_meta2(); 
                                the_title('<h4><a href="'.get_the_permalink().'">','</a></h4>'); 
                                spcharityplus_post_excerpt('74', false);
                            ?>
                        </article>
                    </div>
                <?php
                    break;
                default:
                ?>
                    <div class="cms-grid-item col-md-6" data-groups='[<?php echo implode(',', $groups);?>]'>
                        <article <?php post_class('archive-event'); ?>>
                            <?php 
                                spcharityplus_post_thumbnail('570x397', true);
                            ?>
                            <div class="archive-inner <?php echo is_rtl()?'right':'left';?>">
                            <?php
                                the_title('<h4><a href="'.get_the_permalink().'">','</a></h4>'); 
                                spcharityplus_post_excerpt('240', true);
                            ?>
                            <footer class="archive-footer">
                                <a class="archive-readmore" href="<?php the_permalink(); ?>"><?php esc_html_e('Read more', 'sp-charityplus') ?>&nbsp;&nbsp;&nbsp;<i class="zmdi zmdi-arrow-<?php echo is_rtl()?'left':'right';?>"></i></a>
                            </footer>
                            <?php spcharityplus_event_meta(); ?>
                            </div>
                        </article>
                    </div>
                <?php
                    break;
            }
            ?>
            
            <?php
        }     
        ?>
    </div>
    <?php 

        /* pagination */
        switch ($layout_mode) {
            case '2':
                echo '<a class="btn btn-primary" href="'.esc_url(get_post_type_archive_link('zkevent')).'">'.esc_html__('See all Events','sp-charityplus').'&nbsp;<i class="fa fa-angle-right"></i></a>';
                break;
            default:
                spcharityplus_paging_nav();
                break;
        }

        /* Restore original Post Data */
        wp_reset_postdata();
    ?>
</div>