<?php
add_action('widgets_init', 'cms_recent_post_widgets');       

function cms_recent_post_widgets() {
    register_widget('CMS_Recent_Post_Widget');
}

class CMS_Recent_Post_Widget extends WP_Widget {

    function __construct() {
        parent::__construct(
            'cms_widget_recent_post', 
            esc_html__('CMS Recent Posts','sp-charityplus'), 
            array('description' => esc_html__('Recent Posts Widget.', 'sp-charityplus'),)
        );
    }

    function widget($args, $instance) {
        global $post;
        extract($args);
        $title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);

        $layout = $instance['layout_wg'];
        $categories = $instance['categories'];
        $post_type = $instance['post_type'];
        $sort_by = $instance['sort_by'];
        $show_cat = (int) $instance['show_cat'];
        $show_author = (int) $instance['show_author'];
        $show_date = (int) $instance['show_date'];
        $show_comment = (int) $instance['show_comment'];
        $show_decs = (int) $instance['show_decs'];
        $number = (int) $instance['number'];

        if(!empty($categories)){
            $cat_name = implode(',',$categories); 
        } else {
            $cat_name = '';
        }
        

        $sticky = get_option('sticky_posts');
        
        $extra_class = !empty($instance['extra_class']) ? $instance['extra_class'] : "";

        // no 'class' attribute - add one with the value of width
        if( strpos($before_widget, 'class') === false ) {
            $before_widget = str_replace('>', 'class="'. $extra_class . '"', $before_widget);
        }
        // there is 'class' attribute - append width value to it
        else {
            $before_widget = str_replace('class="', 'class="'. $extra_class . ' ', $before_widget);
        }
        echo wp_kses_post($before_widget);
        $style = '';
        if($layout) $style = ' style'.$layout;
        if(is_singular()){
            $post__not_in = array($sticky, $post->ID);
            $post__not_in2 = array($post->ID);
        } else {
            $post__not_in = array($sticky);
            $post__not_in2 = '';
        }
        switch ($sort_by) {
            case 'most_viewed':
                $args = array(
                    'posts_per_page' => $number,
                    'post_type'      => $post_type,
                    'post_status'    => 'publish',
                    'post__not_in'   => $post__not_in,
                    'meta_key'       => 'spcharityplus_post_views_count',
                    'orderby'        => 'meta_value_num',
                    'order'          => 'DESC',
                    'paged'          => 1,
                    'category_name'  => $cat_name
                );
                break;
            case 'sticky_posts':
                $args = array(
                    'posts_per_page' => $number,
                    'post_type'      => $post_type,
                    'post_status'    => 'publish',
                    'post__in'       => $sticky,
                    'post__not_in'   => $post__not_in2,
                    'order'          => 'DESC',
                    'paged'          => 1,
                    'category_name'  => $cat_name
                );
                break;
            default:
                $args = array(
                    'posts_per_page' => $number,
                    'post_type'      => $post_type,
                    'post_status'    => 'publish',
                    'post__not_in'   => $post__not_in,
                    'orderby'        => 'rand',
                    'order'          => 'DESC',
                    'paged'          => 1,
                    'category_name'  => $cat_name
                );
        }
        $recent_post = new WP_Query($args);       
        ?>
        <?php
            switch ($layout) {
                default:
                    if ($recent_post->have_posts()){ ?>
                    <div class="cms-recent-post<?php echo esc_attr($style);?>">
                        <?php if($title) echo wp_kses_post($before_title.$title.$after_title); ?>
                        <?php 
                        while ($recent_post->have_posts()): $recent_post->the_post(); ?>
                            <div class="cms-recent-item <?php if(has_post_thumbnail() == '') {echo 'no-image';} ?> clearfix"> 
                                <?php if(has_post_thumbnail()){ ?>
                                <div class="entry-media pull-left">
                                    <?php the_post_thumbnail('thumbnail'); ?>
                                </div>
                                <?php } ?>
                                <div class="item-content">
                                    <h5 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo get_the_title();?>"><?php the_title(); ?></a></h5>
                                    <?php spcharityplus_post_meta_list($show_author, $show_date, $show_comment, '', '', $show_cat); ?>
                                    <?php if ($show_decs) echo spcharityplus_post_excerpt(80); ?>
                                </div>
                            </div>
                        <?php endwhile; wp_reset_postdata();?>
                    </div>
                    <?php } else { ?>
                        <div class="cms-recent-post<?php echo esc_attr($style);?>">
                            <?php if($title) echo wp_kses_post($before_title.$title.$after_title); ?>
                            <span class="notfound error-msg"><?php esc_html_e('No post found!','sp-charityplus') ?></span>
                        </div>
                    <?php
                    }  
                break;
            }
                
         ?>
        <?php 
        echo wp_kses_post($after_widget);
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['layout_wg'] = $new_instance['layout_wg'];
        $instance['categories'] = $new_instance['categories'];
        $instance['title'] = $new_instance['title'];
        $instance['post_type'] = $new_instance['post_type'];
        $instance['sort_by'] = $new_instance['sort_by'];
        $instance['show_cat'] = $new_instance['show_cat'];
        $instance['show_author'] = $new_instance['show_author'];
        $instance['show_date'] = $new_instance['show_date'];
        $instance['show_comment'] = $new_instance['show_comment'];
        $instance['show_decs'] = $new_instance['show_decs'];
        $instance['number'] = (int) $new_instance['number'];
        $instance['extra_class'] = $new_instance['extra_class'];

        return $instance;
    }

    function form($instance) {
        $layout = isset($instance['layout_wg']) ? $instance['layout_wg'] : '0';
        $categories = isset($instance['categories']) ? $instance['categories'] : array();
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $post_type = isset($instance['post_type']) ? esc_attr($instance['post_type']) : 'post';
        $sort_by = isset($instance['sort_by']) ? esc_attr($instance['sort_by']) : '';
        $show_cat = isset($instance['show_cat']) ? esc_attr($instance['show_cat']) : '';
        $show_author = isset($instance['show_author']) ? esc_attr($instance['show_author']) : '';
        $show_date = isset($instance['show_date']) ? esc_attr($instance['show_date']) : '';
        $show_comment = isset($instance['show_comment']) ? esc_attr($instance['show_comment']) : '';
        $show_decs = isset($instance['show_decs']) ? esc_attr($instance['show_decs']) : '';
        if ( !isset($instance['number']) || !$number = (int) $instance['number'] )
                     $number = 5;
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e( 'Title:', 'sp-charityplus' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p><label for="<?php echo esc_attr($this->get_field_id('layout_wg')); ?>"><?php esc_html_e( 'Layout:', 'sp-charityplus' ); ?></label>
         <select class="widefat" id="<?php echo esc_attr( $this->get_field_id('layout_wg') ); ?>" name="<?php echo esc_attr( $this->get_field_name('layout_wg') ); ?>">
            <option value="0"<?php if( $layout == '0' ){ echo 'selected="selected"';} ?>><?php esc_html_e('Default', 'sp-charityplus'); ?></option>
         </select>
         </p>
        <p><label for="<?php echo esc_attr($this->get_field_id('post_type')); ?>"><?php esc_html_e( 'Post Type:', 'sp-charityplus' ); ?></label>
         <select class="widefat" id="<?php echo esc_attr( $this->get_field_id('post_type') ); ?>" name="<?php echo esc_attr( $this->get_field_name('post_type') ); ?>">
            <option value="post"<?php if( $post_type == 'post' ){ echo 'selected="selected"';} ?>><?php esc_html_e('Post', 'sp-charityplus'); ?></option>
            <?php if(function_exists('cptui_loaded')) { ?>
                <option value="zkportfolio"<?php if( $post_type == 'zkportfolio' ){ echo 'selected="selected"';} ?>><?php esc_html_e('Portfolio', 'sp-charityplus'); ?></option>
            <?php } ?>
         </select>
         </p>
         <p><label for="<?php echo esc_attr($this->get_field_id('sort_by')); ?>"><?php esc_html_e( 'Sort by:', 'sp-charityplus' ); ?></label>
         <select class="widefat" id="<?php echo esc_attr( $this->get_field_id('sort_by') ); ?>" name="<?php echo esc_attr( $this->get_field_name('sort_by') ); ?>">
            <option value=""<?php if( $sort_by == '' ){ echo 'selected="selected"';} ?>><?php esc_html_e('Recent', 'sp-charityplus'); ?></option>
            <option value="most_viewed"<?php if( $sort_by == 'most_viewed' ){ echo 'selected="selected"';} ?>><?php esc_html_e('Most Viewed', 'sp-charityplus'); ?></option>
            <option value="sticky_posts"<?php if( $sort_by == 'sticky_posts' ){ echo 'selected="selected"';} ?>><?php esc_html_e('Sticky post', 'sp-charityplus'); ?></option>
         </select>
         </p>

        <p>
            <label for="rpjc_widget_cat_recent_posts_category"><?php esc_html_e( 'Choose Category','sp-charityplus' ); ?>:   </label>
            <?php
            $categories_check = get_categories();
            foreach($categories_check as $category){
                $checked = (in_array($category->slug, $categories)) ?' checked="checked" ':'';
                echo '<label for="'.$category->slug.'"><input '.$checked.' type="checkbox" id="'.$this->get_field_id('categories'.$category->slug).'" name="'.$this->get_field_name('categories[]').'" value="'.$category->slug.'" /> '.$category->name.'</label>&nbsp;&nbsp;';
            }
            ?>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('show_cat')); ?>"><?php esc_html_e( 'Show Category:', 'sp-charityplus' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('show_cat') ); ?>" name="<?php echo esc_attr( $this->get_field_name('show_cat') ); ?>" <?php if($show_cat!='') echo 'checked="checked"'; ?> type="checkbox" value="1"  />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('show_author')); ?>"><?php esc_html_e( 'Show Author:', 'sp-charityplus' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('show_author') ); ?>" name="<?php echo esc_attr( $this->get_field_name('show_author') ); ?>" <?php if($show_author!='') echo 'checked="checked"'; ?> type="checkbox" value="1"  />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('show_date')); ?>"><?php esc_html_e( 'Show date:', 'sp-charityplus' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('show_date') ); ?>" name="<?php echo esc_attr( $this->get_field_name('show_date') ); ?>" <?php if($show_date!='') echo 'checked="checked";' ?> type="checkbox" value="1"  />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('show_comment')); ?>"><?php esc_html_e( 'Show Comment:', 'sp-charityplus' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('show_comment') ); ?>" name="<?php echo esc_attr( $this->get_field_name('show_comment') ); ?>" <?php if($show_comment!='') echo 'checked="checked";' ?> type="checkbox" value="1"  />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('show_decs')); ?>"><?php esc_html_e( 'Show Description:', 'sp-charityplus' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('show_decs') ); ?>" name="<?php echo esc_attr( $this->get_field_name('show_decs') ); ?>" <?php if($show_decs!='') echo 'checked="checked";' ?> type="checkbox" value="1" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e( 'Number of items to show:', 'sp-charityplus' ); ?></label>
            <input id="<?php echo esc_attr( $this->get_field_id('number') ); ?>" name="<?php echo esc_attr( $this->get_field_name('number') ); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" size="3" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('extra_class')); ?>"><?php esc_html_e( 'Extra Class:', 'sp-charityplus' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('extra_class')); ?>" name="<?php echo esc_attr($this->get_field_name('extra_class')); ?>" value="<?php if(isset($instance['extra_class'])){echo esc_attr($instance['extra_class']);} ?>" />
        </p>
        <?php
    }
}
?>