<?php 
    /* get Shortcode custom value */
    extract(shortcode_atts(array(
        'posts_per_page'    => 9,
        'layout_mode'   => 1,
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
        'post_type'      => 'zodonations',
        'paged'          => $paged,
    );
    $posts = spcharityplus_get_posts($args);

    $filter_source_x = 'zodonationcategory';
    $terms = get_terms($filter_source_x);
    $_category = array();
    foreach ($terms as $cat){
        $_category[] = $cat->term_id;
    }
    $atts['categories'] = $_category;

    wp_enqueue_script('modernizr', get_template_directory_uri().'/assets/js/modernizr.min.js', array('jquery'));
    wp_enqueue_script('waypoints', get_template_directory_uri().'/assets/js/waypoints.min.js', array('jquery'));
    wp_enqueue_script('jquery-shuffle', get_template_directory_uri().'/assets/js/jquery.shuffle.js', array('jquery','modernizr','imagesloaded'));
    wp_enqueue_script('cms-jquery-shuffle', get_template_directory_uri().'/assets/js/jquery.shuffle.cms.js', array('jquery-shuffle'));
?>
<div id="<?php echo esc_attr($atts['html_id']);?>" class="cms-grid-wraper layout-<?php echo esc_attr($layout_mode);?>">

    <div class="cms-grid-filter text-center">
        <ul class="cms-filter-category list-unstyled list-inline">
            <li><a class="active" href="#" data-group="all"><?php echo esc_html__('Show all','sp-charityplus'); ?></a></li>
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
    
    <div class="cms-donations cms-grid cms-grid-masonry row">
        <?php
        while($posts->have_posts()){
            $posts->the_post();
            $groups = array();
            $groups[] = '"all"';
            foreach(cmsGetCategoriesByPostID(get_the_ID(),$filter_source_x) as $category){
                $groups[] = '"category-'.$category->slug.'"';
            }
            $id= get_the_ID();
            $donation_info = apply_filters('zk_get_donation_info', $id);
            extract(wp_parse_args($donation_info, array(
                "currency"        => "USD",
                "symbol"          => "$",
                "symbol_position" => 0,
                "remaining"       => "",
                "raised_percent"  => 50,
                "raised"          => "$0",
                "goal"            => "$20,000",
                "donors"          => 0
            )));
            if($raised_percent > 100){
                $progress = 100;
            } else {
                $progress = round($raised_percent);
            }

            switch ($layout_mode) {
                case '3':
                ?>
                    <div class="cms-grid-item col-xs-12" data-groups='[<?php echo implode(',', $groups);?>]'>
                        <article <?php post_class('archive-donate'); ?>>
                            <div class="archive-inner list">
                            <div class="row">
                                <div class="col-sm-4">
                                    <?php 
                                        spcharityplus_post_thumbnail('330x230', true);
                                    ?>
                                    <div class="raided text-center">
                                        <div class="pie-wrapper progress-<?php echo esc_attr($progress);?>">
                                            <span class="percent-label"><?php echo esc_attr($raised_percent.'%');?></span>
                                            <div class="pie">
                                              <div class="left-side half-circle"></div>
                                              <div class="right-side half-circle"></div>
                                            </div>
                                            <div class="shadow"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <?php
                                        the_title('<h4><a href="'.get_the_permalink().'">','</a></h4>'); 
                                        spcharityplus_post_excerpt('165', true);
                                    ?>
                                    
                                    <div class="donation-info">
                                        <div> <?php echo do_shortcode('[zodonations_form el_class="btn btn-default" label_btn="'.esc_html__('Donate Now','sp-charityplus').'" donation_id="'.get_the_ID().'"]') ?> <?php echo esc_attr('&nbsp;&nbsp;&nbsp;&nbsp;'.$remaining) ?> </div>
                                        <div class="donation-meta">
                                            <span class="accent-color"><?php echo esc_attr($raised); ?></span> <?php esc_html_e('Raised of', 'sp-charityplus'); ?>
                                            <span class="green-color"><?php  echo esc_attr($goal); ?></span> <?php esc_html_e('Goal', 'sp-charityplus'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </article>
                    </div>
                <?php
                    break;
                case '2' :
                ?>
                    <div class="cms-grid-item col-md-4 col-sm-6" data-groups='[<?php echo implode(',', $groups);?>]'>
                        <article <?php post_class('archive-donate'); ?>>
                            
                            <?php 
                                spcharityplus_post_thumbnail('330x230', true);
                            ?>
                            <div class="archive-inner">
                                <div class="raided text-center">
                                    <div class="pie-wrapper progress-<?php echo esc_attr($progress);?>">
                                        <span class="percent-label"><?php echo esc_attr($raised_percent.'%');?></span>
                                        <div class="pie">
                                          <div class="left-side half-circle"></div>
                                          <div class="right-side half-circle"></div>
                                        </div>
                                        <div class="shadow"></div>
                                    </div>
                                </div>
                                <?php
                                    the_title('<h4><a href="'.get_the_permalink().'">','</a></h4>'); 
                                    spcharityplus_post_excerpt('76', true);
                                ?>
                                
                                <div class="donation-info">
                                    <div> <?php echo do_shortcode('[zodonations_form el_class="btn btn-primary" label_btn="'.esc_html__('Donate Now','sp-charityplus').'" donation_id="'.get_the_ID().'"]') ?> <?php echo esc_attr('&nbsp;&nbsp;&nbsp;&nbsp;'.$remaining) ?> </div>
                                    <div class="donation-meta">
                                        <span class="light-blue-color"><?php echo esc_attr($raised); ?></span> <?php esc_html_e('Raised of', 'sp-charityplus'); ?>
                                        <span class="accent-color"><?php  echo esc_attr($goal); ?></span> <?php esc_html_e('Goal', 'sp-charityplus'); ?>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                <?php
                    break;
                default:
                ?>
                    <div class="cms-grid-item col-md-4 col-sm-6" data-groups='[<?php echo implode(',', $groups);?>]'>
                        <article <?php post_class('archive-donate'); ?>>
                            <div class="archive-inner">
                            <?php 
                                spcharityplus_post_thumbnail('330x230', true);
                            ?>
                            <div class="raided text-center">
                                <div class="pie-wrapper progress-<?php echo esc_attr($progress);?>">
                                    <span class="percent-label"><?php echo esc_attr($raised_percent.'%');?></span>
                                    <div class="pie">
                                      <div class="left-side half-circle"></div>
                                      <div class="right-side half-circle"></div>
                                    </div>
                                    <div class="shadow"></div>
                                </div>
                            </div>
                            <?php
                                the_title('<h4><a href="'.get_the_permalink().'">','</a></h4>'); 
                                spcharityplus_post_excerpt('76', true);
                            ?>
                            
                            <div class="donation-info">
                                <div> <?php echo do_shortcode('[zodonations_form el_class="btn btn-default" label_btn="'.esc_html__('Donate Now','sp-charityplus').'" donation_id="'.get_the_ID().'"]') ?> <?php echo esc_attr('&nbsp;&nbsp;&nbsp;&nbsp;'.$remaining) ?> </div>
                                <div class="donation-meta">
                                    <span class="accent-color"><?php echo esc_attr($raised); ?></span> <?php esc_html_e('Raised of', 'sp-charityplus'); ?>
                                    <span class="green-color"><?php  echo esc_attr($goal); ?></span> <?php esc_html_e('Goal', 'sp-charityplus'); ?>
                                </div>
                            </div>
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
        spcharityplus_paging_nav();

        /* Restore original Post Data */
        wp_reset_postdata();
    ?>
</div>