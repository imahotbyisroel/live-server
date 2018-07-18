<?php 
    /* get Shortcode custom value */
    extract(shortcode_atts(array(
        'layout_mode'    => 1,
    ), $atts));

    /* get categories */
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
    /* item class */
    $atts['item_class'] .= ' col-md-6';
?>
<div class="cms-grid-wraper cms-news-wraper <?php echo esc_attr($atts['template'].' layout-'.$layout_mode);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <div class="row <?php echo esc_attr($atts['grid_class']);?>">
        <?php
        $posts = $atts['posts'];
        $size = 'medium';
        $count = 0;
        while($posts->have_posts()){
            $posts->the_post();
            $post_type = get_post_type();
            $taxo = '';
            switch ($post_type) {
                case 'zkportfolio':
                    $taxo = 'zkportfolio_cat';
                    break;
                case 'zkevent':
                    $taxo = 'zkevent_cat';
                    break;
                case 'zkcharixyemail':
                    $taxo = '';
                    break;
                case 'zodonations':
                    $taxo = 'zodonationcategory';
                    break;
                case 'product':
                    $taxo = 'product_cat';
                    break;
                default:
                    $taxo = 'category';
                    break;
            }

            $count ++ ;
            switch ($layout_mode) {
                case '2':
                    switch ($count) {
                        case '1':
                        ?>
                            <div class="<?php echo esc_attr($atts['item_class']);?> large-item">
                                <?php 
                                    spcharityplus_post_media('560x420',true);
                                ?>
                                <?php the_terms( get_the_ID(), $taxo , '<div class="post-categories">', ' ','</div>' ); ?>
                                <?php the_title('<h3 class="cms-news-title"><a href="'. get_the_permalink() .'">','</a></h3>');?>
                                <div class="hidden-md hidden-lg">
                                    <a class="archive-readmore" href="<?php the_permalink(); ?>"><?php esc_html_e('Read more', 'sp-charityplus') ?>&nbsp;&nbsp;&nbsp;<i class="zmdi zmdi-arrow-<?php echo is_rtl()?'left':'right';?>"></i></a>
                                </div>
                            </div>
                        <?php
                            break;
                        
                        default:
                        ?>
                            <div class="<?php echo esc_attr($atts['item_class']);?> small-item">
                                <div class="small-item-inner">
                                    <div class="row">
                                        <?php 
                                            spcharityplus_post_media('320x240',true,'<div class="entry-thumbnail col-xs-4 col-sm-5">');
                                        ?>
                                        <div class="col-xs-8 col-sm-7">
                                            <?php the_terms( get_the_ID(), $taxo , '<div class="post-categories">', ' ','</div>' ); ?>
                                            <?php the_title('<h4 class="cms-news-title"><a href="'. get_the_permalink() .'">','</a></h4>');?>
                                            <div class="hidden-md hidden-lg">
                                                <a class="archive-readmore" href="<?php the_permalink(); ?>"><?php esc_html_e('Read more', 'sp-charityplus') ?>&nbsp;&nbsp;&nbsp;<i class="zmdi zmdi-arrow-<?php echo is_rtl()?'left':'right';?>"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        break;
                    }
                    break;
                
                default:
                    switch ($count) {
                        case '1':
                        ?>
                            <div class="<?php echo esc_attr($atts['item_class']);?> large-item">
                                <?php 
                                    spcharityplus_post_media('560x420',true);
                                ?>
                                <?php the_title('<h3 class="cms-news-title">','</h3>');?>
                                <div class="cms-news-excerpt">
                                    <?php spcharityplus_post_excerpt('234'); ?>
                                </div>
                                <div class="">
                                    <a class="archive-readmore" href="<?php the_permalink(); ?>"><?php esc_html_e('Read more', 'sp-charityplus') ?>&nbsp;&nbsp;&nbsp;<i class="zmdi zmdi-arrow-<?php echo is_rtl()?'left':'right';?>"></i></a>
                                </div>
                            </div>
                        <?php
                            break;
                        
                        default:
                        ?>
                            <div class="<?php echo esc_attr($atts['item_class']);?> small-item">
                                <div class="small-item-inner">
                                    <div class="row">
                                        <?php 
                                            spcharityplus_post_media('320x240',true,'<div class="entry-thumbnail col-xs-4 col-sm-5">');
                                        ?>
                                        <div class="col-xs-8 col-sm-7">
                                            <h4 class="cms-news-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php spcharityplus_max_charlength(get_the_title(), 50, true); ?></a></h4>
                                            <div class="cms-news-excerpt">
                                                <?php spcharityplus_post_excerpt('120'); ?>
                                            </div>
                                            <div class="hidden-md hidden-lg">
                                                <a class="archive-readmore" href="<?php the_permalink(); ?>"><?php esc_html_e('Read more', 'sp-charityplus') ?>&nbsp;&nbsp;&nbsp;<i class="zmdi zmdi-arrow-<?php echo is_rtl()?'left':'right';?>"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        break;
                    }
                break;
            }
        }
        ?>
    </div>
    <?php
        //spcharityplus_paging_nav();
    ?>
</div>