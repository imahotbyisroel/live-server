<?php
class CMS_Social_Widget extends WP_Widget {

    function __construct() {
        parent::__construct(
            'cms_social_widget', // Base ID
            esc_html__('CMS Social', 'sp-charityplus'), // Name
            array('description' => esc_html__('Social Widget', 'sp-charityplus'),) // Args
        );
    }

    function widget($args, $instance) {
        extract($args);
		if (!empty($instance['title'])) {
            $title = apply_filters('widget_title', empty($instance['title']) ? esc_html__('Social', 'sp-charityplus' ) : $instance['title'], $instance, $this->id_base);
        }

        $align = '';
        if(!empty($instance['align'])){
            $align = $instance['align'];
        }
        $style = 'horizontal';
        if(!empty($instance['style'])){
            $style = $instance['style'];
        }
        $color_mode = '';
        if(!empty($instance['color_mode'])){
            $color_mode = $instance['color_mode'];
        }
        $title_facebook = $title_twitter = $title_gplus = $title_youtube = $title_rss = $title_skype = $title_yahoo = $title_dribbble = $title_flickr = $title_linkedin = $title_pinterest = $title_vimeo = $title_github = $title_instagram = $title_tumblr = $title_soundcloud = '';
        $space = '&nbsp;&nbsp;&nbsp;';
        if( $style == "icon-text-vertical" || $style == "icon-text-horizontal" || $style == "icon-circle-text-horizontal" || $style == "icon-circle-text-vertical"){
            $title_facebook   = $space.esc_html__('Facebook','sp-charityplus');
            $title_twitter    = $space.esc_html__('Twitter','sp-charityplus');
            $title_gplus      = $space.esc_html__('Google +','sp-charityplus');
            $title_youtube    = $space.esc_html__('Youtube','sp-charityplus');
            $title_rss        = $space.esc_html__('Rss','sp-charityplus');
            $title_skype      = $space.esc_html__('Skype','sp-charityplus');
            $title_yahoo      = $space.esc_html__('Yahoo','sp-charityplus');
            $title_dribbble   = $space.esc_html__('Dribbble','sp-charityplus');
            $title_flickr     = $space.esc_html__('Flickr','sp-charityplus');
            $title_linkedin   = $space.esc_html__('Linkedin','sp-charityplus');
            $title_pinterest  = $space.esc_html__('Pinterest','sp-charityplus');
            $title_vimeo      = $space.esc_html__('Vimeo','sp-charityplus');
            $title_github     = $space.esc_html__('Github','sp-charityplus');
            $title_instagram  = $space.esc_html__('Instagram','sp-charityplus');
            $title_tumblr     = $space.esc_html__('Tumblr','sp-charityplus');
            $title_soundcloud = $space.esc_html__('SoundCloud','sp-charityplus');
        }

        $icon_facebook = isset($instance['icon_facebook']) ? (!empty($instance['icon_facebook']) ? $instance['icon_facebook']: 'fa fa-facebook') : 'fa fa-facebook';
        $link_facebook = isset($instance['link_facebook']) ? $instance['link_facebook'] : 'https://facebook.com';

        $icon_twitter = isset($instance['icon_twitter']) ? (!empty($instance['icon_twitter']) ? $instance['icon_twitter']: 'fa fa-twitter') : 'fa fa-twitter';
        $link_twitter = isset($instance['link_twitter']) ? $instance['link_twitter'] : '';
        
        $icon_google = isset($instance['icon_google']) ? (!empty($instance['icon_google']) ? $instance['icon_google']: 'fa fa-google-plus') : 'fa fa-google-plus';
        $link_google = isset($instance['link_google']) ? $instance['link_google'] : '';

        $icon_youtube = isset($instance['icon_youtube']) ? (!empty($instance['icon_youtube']) ? $instance['icon_youtube']: 'fa fa-youtube') : 'fa fa-youtube';
        $link_youtube = isset($instance['link_youtube']) ? $instance['link_youtube'] : '';
        
        $icon_rss = isset($instance['icon_rss']) ? (!empty($instance['icon_rss']) ? $instance['icon_rss']: 'fa fa-rss') : 'fa fa-rss';
        $link_rss = isset($instance['link_rss']) ? $instance['link_rss'] : '';
        
        $icon_skype = isset($instance['icon_skype']) ? (!empty($instance['icon_skype']) ? $instance['icon_skype']: 'fa fa-skype') : 'fa fa-skype';
        $link_skype = isset($instance['link_skype']) ? $instance['link_skype'] : '';

        $icon_yahoo = isset($instance['icon_yahoo']) ? (!empty($instance['icon_yahoo']) ? $instance['icon_yahoo']: 'fa fa-smile-o') : 'fa fa fa-smile-o';
        $link_yahoo = isset($instance['link_yahoo']) ? $instance['link_yahoo'] : '';

        $icon_dribbble = isset($instance['icon_dribbble']) ? (!empty($instance['icon_dribbble']) ? $instance['icon_dribbble']: 'fa fa-dribbble') : 'fa fa-dribbble';
        $link_dribbble = isset($instance['link_dribbble']) ? $instance['link_dribbble'] : '';

        $icon_flickr = isset($instance['icon_flickr']) ? (!empty($instance['icon_flickr']) ? $instance['icon_flickr']: 'fa fa-flickr') : 'fa fa-flickr';
        $link_flickr = isset($instance['link_flickr']) ? $instance['link_flickr'] : '';

        $icon_linkedin = isset($instance['icon_linkedin']) ? (!empty($instance['icon_linkedin']) ? $instance['icon_linkedin']: 'fa fa-linkedin') : 'fa fa-linkedin';
        $link_linkedin = isset($instance['link_linkedin']) ? $instance['link_linkedin'] : '';

        $icon_vimeo = isset($instance['icon_vimeo']) ? (!empty($instance['icon_vimeo']) ? $instance['icon_vimeo']: 'fa fa-vimeo-square') : 'fa fa-vimeo-square';
        $link_vimeo = isset($instance['link_vimeo']) ? $instance['link_vimeo'] : '';

        $icon_pinterest = isset($instance['icon_pinterest']) ? (!empty($instance['icon_pinterest']) ? $instance['icon_pinterest']: 'fa fa-pinterest') : 'fa fa-pinterest';
        $link_pinterest = isset($instance['link_pinterest']) ? $instance['link_pinterest'] : '';

        $icon_github = isset($instance['icon_github']) ? (!empty($instance['icon_github']) ? $instance['icon_github']: 'fa fa-github') : 'fa fa-github';
        $link_github = isset($instance['link_github']) ? $instance['link_github'] : '';

        $icon_instagram = isset($instance['icon_instagram']) ? (!empty($instance['icon_instagram']) ? $instance['icon_instagram']: 'fa fa-instagram') : 'fa fa-instagram';
        $link_instagram = isset($instance['link_instagram']) ? $instance['link_instagram'] : '';

        $icon_tumblr = isset($instance['icon_tumblr']) ? (!empty($instance['icon_tumblr']) ? $instance['icon_tumblr']: 'fa fa-tumblr') : 'fa fa-tumblr';
        $link_tumblr = isset($instance['link_tumblr']) ? $instance['link_tumblr'] : '';

        $icon_soundcloud = isset($instance['icon_soundcloud']) ? (!empty($instance['icon_soundcloud']) ? $instance['icon_soundcloud']: 'fa fa-soundcloud') : 'fa fa-soundcloud';
        $link_soundcloud = isset($instance['link_soundcloud']) ? $instance['link_soundcloud'] : '';

        $extra_class = !empty($instance['extra_class']) ? $instance['extra_class'] : "";
        if(is_rtl()){
            $extra_class .= ' rtl';
        }
        // no 'class' attribute - add one with the value of width
        if( strpos($before_widget, 'class') === false ) {
            $before_widget = str_replace('>', 'class="'. $extra_class . '"', $before_widget);
        }
        // there is 'class' attribute - append width value to it
        else {
            $before_widget = str_replace('class="', 'class="'. $extra_class . ' ', $before_widget);
        }
        echo wp_kses_post($before_widget);
            if (!empty($title))
                echo wp_kses_post($before_title . $title . $after_title);
                
            echo '<ul class="cms-social '.$style.' '.$align.' '.$color_mode.' list-unstyled clearfix">';
            if ($link_facebook != '') {
                echo '<li><a class="icon-sprite facebook" target="_blank" data-rel="tooltip" title="'.esc_html__('Facebook','sp-charityplus').'" href="'.esc_url($link_facebook).'"><i class="'.$icon_facebook.'"></i>'.$title_facebook.'</a></li>';
            }
            if ($link_twitter != '') {
                echo '<li><a class="icon-sprite twitter" target="_blank" data-rel="tooltip" title="'.esc_html__('Twitter','sp-charityplus').'" href="'.esc_url($link_twitter).'"><i class="'.$icon_twitter.'"></i>'.$title_twitter.'</a></li>';
            }
            if ($link_google != '') {
                echo '<li><a class="icon-sprite google" target="_blank" data-rel="tooltip" title="'.esc_html__('Google','sp-charityplus').'" href="'.esc_url($link_google).'"><i class="'.$icon_google.'"></i>'.$title_gplus.'</a></li>';
            }
            if ($link_youtube != '') {
                echo '<li><a class="icon-sprite youtube" target="_blank" data-rel="tooltip" title="'.esc_html__('YouTube','sp-charityplus').'" href="'.esc_url($link_youtube).'"><i class="'.$icon_youtube.'"></i>'.$title_youtube.'</a></li>';
            }
            if ($link_linkedin != '') {
                echo '<li><a class="icon-sprite linkedin" target="_blank" data-rel="tooltip" title="'.esc_html__('Linkedin','sp-charityplus').'" href="'.esc_url($link_linkedin).'"><i class="'.$icon_linkedin.'"></i>'.$title_linkedin.'/a></li>';
            }

            if ($link_vimeo != '') {
                echo '<li><a class="icon-sprite vimeo" target="_blank" data-rel="tooltip" title="'.esc_html__('Vimeo','sp-charityplus').'" href="'.esc_url($link_vimeo).'"><i class="'.$icon_vimeo.'"></i>'.$title_vimeo.'</a></li>';
            }
            if ($link_pinterest != '') {
                echo '<li><a class="icon-sprite pinterest" target="_blank" data-rel="tooltip" title="'.esc_html__('Pinterest','sp-charityplus').'" href="'.esc_url($link_pinterest).'"><i class="'.$icon_pinterest.'"></i>'.$title_pinterest.'</a></li>';
            }
            if ($link_instagram != '') {
                echo '<li><a class="icon-sprite instagram" target="_blank" data-rel="tooltip" title="'.esc_html__('Instagram','sp-charityplus').'" href="'.esc_url($link_instagram).'"><i class="'.$icon_instagram.'"></i>'.$title_instagram.'</a></li>';
            }
            if ($link_dribbble != '') {
                echo '<li><a class="icon-sprite dribbble" target="_blank" data-rel="tooltip" title="'.esc_html__('Dribbble','sp-charityplus').'" href="'.esc_url($link_dribbble).'"><i class="'.$icon_dribbble.'"></i>'.$title_dribbble.'</a></li>';
            }
            if ($link_tumblr != '') {
                echo '<li><a class="icon-sprite tumblr" target="_blank" data-rel="tooltip" title="'.esc_html__('Tumblr','sp-charityplus').'" href="'.esc_url($link_tumblr).'"><i class="'.$icon_tumblr.'"></i>'.$title_tumblr.'</a></li>';
            }
            if ($link_skype != '') {
                echo '<li><a class="icon-sprite skype" target="_blank" data-rel="tooltip" title="'.esc_html__('Skype','sp-charityplus').'" href="'.esc_url($link_skype).'"><i class="'.$icon_skype.'"></i>'.$title_skype.'</a></li>';
            }
            if ($link_yahoo != '') {
                echo '<li><a class="icon-sprite yahoo" target="_blank" data-rel="tooltip" title="'.esc_html__('Yahoo','sp-charityplus').'" href="'.esc_url($link_yahoo).'"><i class="'.$icon_yahoo.'"></i>'.$title_yahoo.'</a></li>';
            }
            if ($link_flickr != '') {
                echo '<li><a class="icon-sprite flickr" target="_blank" data-rel="tooltip" title="'.esc_html__('Flickr','sp-charityplus').'" href="'.esc_url($link_flickr).'"><i class="'.$icon_flickr.'"></i>'.$title_flickr.'</a></li>';
            }
            if ($link_github != '') {
                echo '<li><a class="icon-sprite github" target="_blank" data-rel="tooltip" title="'.esc_html__('Github','sp-charityplus').'" href="'.esc_url($link_github).'"><i class="'.$icon_github.'"></i>'.$title_github.'</a></li>';
            }
            if ($link_soundcloud != '') {
                echo '<li><a class="icon-sprite tumblr" target="_blank" data-rel="tooltip" title="'.esc_html__('SoundCloud','sp-charityplus').'" href="'.esc_url($link_soundcloud).'"><i class="'.$icon_soundcloud.'"></i>'.$title_soundcloud.'</a></li>';
            }
            if ($link_rss != '') {
                echo '<li><a class="icon-sprite rss" target="_blank" data-rel="tooltip" title="'.esc_html__('Rss','sp-charityplus').'" href="'.esc_url($link_rss).'"><i class="'.$icon_rss.'"></i>'.$title_rss.'</a></li>';
            }
            echo "</ul>";
        echo wp_kses_post($after_widget);
    }

    function update( $new_instance, $old_instance ) {
         $instance = $old_instance;
         $instance['title'] = strip_tags($new_instance['title']);

         $instance['style'] = strip_tags($new_instance['style']);
         $instance['color_mode'] = strip_tags($new_instance['color_mode']);
         $instance['align'] = strip_tags($new_instance['align']);

         $instance['icon_facebook'] = strip_tags($new_instance['icon_facebook']);
         $instance['link_facebook'] = strip_tags($new_instance['link_facebook']);

         $instance['icon_rss'] = strip_tags($new_instance['icon_rss']);
         $instance['link_rss'] = strip_tags($new_instance['link_rss']);

         $instance['icon_youtube'] = strip_tags($new_instance['icon_youtube']);
         $instance['link_youtube'] = strip_tags($new_instance['link_youtube']);

         $instance['icon_twitter'] = strip_tags($new_instance['icon_twitter']);
         $instance['link_twitter'] = strip_tags($new_instance['link_twitter']);

         $instance['icon_google'] = strip_tags($new_instance['icon_google']);
         $instance['link_google'] = strip_tags($new_instance['link_google']);

         $instance['icon_skype'] = strip_tags($new_instance['icon_skype']);
         $instance['link_skype'] = strip_tags($new_instance['link_skype']);

         $instance['icon_yahoo'] = strip_tags($new_instance['icon_yahoo']);
         $instance['link_yahoo'] = strip_tags($new_instance['link_yahoo']);

         $instance['icon_dribbble'] = strip_tags($new_instance['icon_dribbble']);
         $instance['link_dribbble'] = strip_tags($new_instance['link_dribbble']);

         $instance['icon_flickr'] = strip_tags($new_instance['icon_flickr']);
         $instance['link_flickr'] = strip_tags($new_instance['link_flickr']);

         $instance['icon_linkedin'] = strip_tags($new_instance['icon_linkedin']);
         $instance['link_linkedin'] = strip_tags($new_instance['link_linkedin']);

         $instance['icon_vimeo'] = strip_tags($new_instance['icon_vimeo']);
         $instance['link_vimeo'] = strip_tags($new_instance['link_vimeo']);

         $instance['icon_pinterest'] = strip_tags($new_instance['icon_pinterest']);
         $instance['link_pinterest'] = strip_tags($new_instance['link_pinterest']);

         $instance['icon_github'] = strip_tags($new_instance['icon_github']);
         $instance['link_github'] = strip_tags($new_instance['link_github']);

         $instance['icon_instagram'] = strip_tags($new_instance['icon_instagram']);
         $instance['link_instagram'] = strip_tags($new_instance['link_instagram']);

         $instance['icon_tumblr'] = strip_tags($new_instance['icon_tumblr']);
         $instance['link_tumblr'] = strip_tags($new_instance['link_tumblr']);

         $instance['icon_soundcloud'] = strip_tags($new_instance['icon_soundcloud']);
         $instance['link_soundcloud'] = strip_tags($new_instance['link_soundcloud']);

         $instance['extra_class'] = $new_instance['extra_class'];

         return $instance;
    }

    function form( $instance ) {
         $title = isset($instance['title']) ? esc_attr($instance['title']) : '';

         $style = isset($instance['style']) ? esc_attr($instance['style']) : '';
         $color_mode = isset($instance['color_mode']) ? esc_attr($instance['color_mode']) : '';

         $align = isset($instance['align']) ? esc_attr($instance['align']) : '';

         $icon_facebook = isset($instance['icon_facebook']) ? esc_attr($instance['icon_facebook']) : 'fa fa-facebook';
         $link_facebook = isset($instance['link_facebook']) ? esc_attr($instance['link_facebook']) : 'https://facebook.com';

         $icon_rss = isset($instance['icon_rss']) ? esc_attr($instance['icon_rss']) : '';
         $link_rss = isset($instance['link_rss']) ? esc_attr($instance['link_rss']) : '';

         $icon_youtube = isset($instance['icon_youtube']) ? esc_attr($instance['icon_youtube']) : '';
         $link_youtube = isset($instance['link_youtube']) ? esc_attr($instance['link_youtube']) : '';

         $icon_twitter = isset($instance['icon_twitter']) ? esc_attr($instance['icon_twitter']) : '';
         $link_twitter = isset($instance['link_twitter']) ? esc_attr($instance['link_twitter']) : '';

         $icon_google = isset($instance['icon_google']) ? esc_attr($instance['icon_google']) : '';
         $link_google = isset($instance['link_google']) ? esc_attr($instance['link_google']) : '';

         $icon_skype = isset($instance['icon_skype']) ? esc_attr($instance['icon_skype']) : '';
         $link_skype = isset($instance['link_skype']) ? esc_attr($instance['link_skype']) : '';

         $icon_yahoo = isset($instance['icon_yahoo']) ? esc_attr($instance['icon_yahoo']) : '';
         $link_yahoo = isset($instance['link_yahoo']) ? esc_attr($instance['link_yahoo']) : '';

         $icon_dribbble = isset($instance['icon_dribbble']) ? esc_attr($instance['icon_dribbble']) : '';
         $link_dribbble = isset($instance['link_dribbble']) ? esc_attr($instance['link_dribbble']) : '';

         $icon_flickr = isset($instance['icon_flickr']) ? esc_attr($instance['icon_flickr']) : '';
         $link_flickr = isset($instance['link_flickr']) ? esc_attr($instance['link_flickr']) : '';

         $icon_linkedin = isset($instance['icon_linkedin']) ? esc_attr($instance['icon_linkedin']) : '';
         $link_linkedin = isset($instance['link_linkedin']) ? esc_attr($instance['link_linkedin']) : '';

         $icon_vimeo = isset($instance['icon_vimeo']) ? esc_attr($instance['icon_vimeo']) : '';
         $link_vimeo = isset($instance['link_vimeo']) ? esc_attr($instance['link_vimeo']) : '';

         $icon_pinterest = isset($instance['icon_pinterest']) ? esc_attr($instance['icon_pinterest']) : '';
         $link_pinterest = isset($instance['link_pinterest']) ? esc_attr($instance['link_pinterest']) : '';

         $icon_github = isset($instance['icon_github']) ? esc_attr($instance['icon_github']) : '';
         $link_github = isset($instance['link_github']) ? esc_attr($instance['link_github']) : '';

         $icon_instagram = isset($instance['icon_instagram']) ? esc_attr($instance['icon_instagram']) : '';
         $link_instagram = isset($instance['link_instagram']) ? esc_attr($instance['link_instagram']) : '';

         $icon_tumblr = isset($instance['icon_tumblr']) ? esc_attr($instance['icon_tumblr']) : '';
         $link_tumblr = isset($instance['link_tumblr']) ? esc_attr($instance['link_tumblr']) : ''; 

         $icon_soundcloud = isset($instance['icon_soundcloud']) ? esc_attr($instance['icon_soundcloud']) : '';
         $link_soundcloud = isset($instance['link_soundcloud']) ? esc_attr($instance['link_soundcloud']) : '';

		 $extra_class = isset($instance['extra_class']) ? esc_attr($instance['extra_class']) : '';
         ?>
         <p><label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e( 'Title:', 'sp-charityplus' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" /></p>

         <p><label for="<?php echo esc_attr($this->get_field_id('style')); ?>"><?php esc_html_e( 'Layout Mode:', 'sp-charityplus' ); ?></label>
         <select class="widefat" id="<?php echo esc_attr( $this->get_field_id('style') ); ?>" name="<?php echo esc_attr( $this->get_field_name('style') ); ?>">
            <option value="horizontal"<?php if( $style == 'horizontal' ){ echo 'selected="selected"';} ?>><?php esc_html_e('Icon Horizontal', 'sp-charityplus'); ?></option>
            <option value="vertical"<?php if( $style == 'vertical' ){ echo 'selected="selected"';} ?>><?php esc_html_e('Icon Vertical', 'sp-charityplus'); ?></option>
            <option value="icon-text-horizontal"<?php if( $style == 'icon-text-horizontal' ){ echo 'selected="selected"';} ?>><?php esc_html_e('Icon with Text Horizontal', 'sp-charityplus'); ?></option>
            <option value="icon-text-vertical"<?php if( $style == 'icon-text-vertical' ){ echo 'selected="selected"';} ?>><?php esc_html_e('Icon with Text Vertical', 'sp-charityplus'); ?></option>
            <option value="icon-circle-text-horizontal"<?php if( $style == 'icon-circle-text-horizontal' ){ echo 'selected="selected"';} ?>><?php esc_html_e('Icon Circle with Text Horizontal', 'sp-charityplus'); ?></option>
            <option value="icon-circle-text-vertical"<?php if( $style == 'icon-circle-text-vertical' ){ echo 'selected="selected"';} ?>><?php esc_html_e('Icon Circle with Text Vertical', 'sp-charityplus'); ?></option>
         </select>
         </p>

         <p><label for="<?php echo esc_attr($this->get_field_id('style')); ?>"><?php esc_html_e( 'Color Mode:', 'sp-charityplus' ); ?></label>
         <select class="widefat" id="<?php echo esc_attr( $this->get_field_id('color_mode') ); ?>" name="<?php echo esc_attr( $this->get_field_name('color_mode') ); ?>">
            <option value=""<?php if( $color_mode == '' ){ echo 'selected="selected"';} ?>><?php esc_html_e('Default', 'sp-charityplus'); ?></option>
            <option value="colored"<?php if( $color_mode == 'colored' ){ echo 'selected="selected"';} ?>><?php esc_html_e('Colored', 'sp-charityplus'); ?></option>
         </select>
         </p>

         <p><label for="<?php echo esc_attr($this->get_field_id('align')); ?>"><?php esc_html_e( 'Content Align:', 'sp-charityplus' ); ?></label>
         <select class="widefat" id="<?php echo esc_attr( $this->get_field_id('align') ); ?>" name="<?php echo esc_attr( $this->get_field_name('align') ); ?>">
            <option value=""<?php if( $align == '' ){ echo 'selected="selected"';} ?>><?php esc_html_e('Default', 'sp-charityplus'); ?></option>
            <option value="text-left"<?php if( $align == 'text-left' ){ echo 'selected="selected"';} ?>><?php esc_html_e('Left', 'sp-charityplus'); ?></option>
            <option value="text-center"<?php if( $align == 'text-center' ){ echo 'selected="selected"';} ?>><?php esc_html_e('Center', 'sp-charityplus'); ?></option>
            <option value="text-right"<?php if( $align == 'text-right' ){ echo 'selected="selected"';} ?>><?php esc_html_e('Right', 'sp-charityplus'); ?></option>
         </select>
         </p>

         <p><label for="<?php echo esc_attr($this->get_field_id('icon_facebook')); ?>"><?php esc_html_e( 'Icon Facebook:', 'sp-charityplus' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('icon_facebook') ); ?>" name="<?php echo esc_attr( $this->get_field_name('icon_facebook') ); ?>" type="text" value="<?php echo esc_attr( $icon_facebook ); ?>" placeholder="fa fa-facebook" /></p>
         <p><label for="<?php echo esc_attr($this->get_field_id('link_facebook')); ?>"><?php esc_html_e( 'Link Facebook:', 'sp-charityplus' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_facebook') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_facebook') ); ?>" type="text" value="<?php echo esc_attr( $link_facebook ); ?>"  placeholder="https://facebook.com"/></p>
         
         <p><label for="<?php echo esc_attr($this->get_field_id('icon_twitter')); ?>"><?php esc_html_e( 'Icon twitter:', 'sp-charityplus' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('icon_twitter') ); ?>" name="<?php echo esc_attr( $this->get_field_name('icon_twitter') ); ?>" type="text" value="<?php echo esc_attr( $icon_twitter ); ?>"  placeholder="fa fa-twitter" /></p>
         <p><label for="<?php echo esc_attr($this->get_field_id('link_twitter')); ?>"><?php esc_html_e( 'Link twitter:', 'sp-charityplus' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_twitter') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_twitter') ); ?>" type="text" value="<?php echo esc_attr( $link_twitter ); ?>"  placeholder="https://twitter.com"/></p>


         <p><label for="<?php echo esc_attr($this->get_field_id('icon_youtube')); ?>"><?php esc_html_e( 'Icon youtube:', 'sp-charityplus' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('icon_youtube') ); ?>" name="<?php echo esc_attr( $this->get_field_name('icon_youtube') ); ?>" type="text" value="<?php echo esc_attr( $icon_youtube ); ?>"  placeholder="fa fa-youtube" /></p>
         <p><label for="<?php echo esc_attr($this->get_field_id('link_youtube')); ?>"><?php esc_html_e( 'Link youtube:', 'sp-charityplus' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_youtube') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_youtube') ); ?>" type="text" value="<?php echo esc_attr( $link_youtube ); ?>"  placeholder="https://youtube.com" /></p>

         <p><label for="<?php echo esc_attr($this->get_field_id('icon_google')); ?>"><?php esc_html_e( 'Icon google plus:', 'sp-charityplus' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('icon_google') ); ?>" name="<?php echo esc_attr( $this->get_field_name('icon_google') ); ?>" type="text" value="<?php echo esc_attr( $icon_google ); ?>"  placeholder="fa fa-google-plus" /></p>
         <p><label for="<?php echo esc_attr($this->get_field_id('link_google')); ?>"><?php esc_html_e( 'Link google:', 'sp-charityplus' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_google') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_google') ); ?>" type="text" value="<?php echo esc_attr( $link_google ); ?>"  placeholder="https://plus.google.com" /></p>

         <p><label for="<?php echo esc_attr($this->get_field_id('icon_linkedin')); ?>"><?php esc_html_e( 'Icon linkedin:', 'sp-charityplus' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('icon_linkedin') ); ?>" name="<?php echo esc_attr( $this->get_field_name('icon_linkedin') ); ?>" type="text" value="<?php echo esc_attr( $icon_linkedin ); ?>"  placeholder="fa fa-linkedin" /></p>
         <p><label for="<?php echo esc_attr($this->get_field_id('link_linkedin')); ?>"><?php esc_html_e( 'Link linkedin:', 'sp-charityplus' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_linkedin') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_linkedin') ); ?>" type="text" value="<?php echo esc_attr( $link_linkedin ); ?>"  placeholder="https://linkedin.com" /></p>

         <p><label for="<?php echo esc_attr($this->get_field_id('icon_dribbble')); ?>"><?php esc_html_e( 'Icon dribbble:', 'sp-charityplus' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('icon_dribbble') ); ?>" name="<?php echo esc_attr( $this->get_field_name('icon_dribbble') ); ?>" type="text" value="<?php echo esc_attr( $icon_dribbble ); ?>"  placeholder="fa fa-dribbble" /></p>
         <p><label for="<?php echo esc_attr($this->get_field_id('link_dribbble')); ?>"><?php esc_html_e( 'Link dribbble:', 'sp-charityplus' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_dribbble') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_dribbble') ); ?>" type="text" value="<?php echo esc_attr( $link_dribbble ); ?>"  placeholder="https://dribbble.com" /></p>

         <p><label for="<?php echo esc_attr($this->get_field_id('icon_vimeo')); ?>"><?php esc_html_e( 'Icon vimeo:', 'sp-charityplus' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('icon_vimeo') ); ?>" name="<?php echo esc_attr( $this->get_field_name('icon_vimeo') ); ?>" type="text" value="<?php echo esc_attr( $icon_vimeo ); ?>"  placeholder="fa fa-vimeo-square" /></p>
         <p><label for="<?php echo esc_attr($this->get_field_id('link_vimeo')); ?>"><?php esc_html_e( 'Link vimeo:', 'sp-charityplus' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_vimeo') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_vimeo') ); ?>" type="text" value="<?php echo esc_attr( $link_vimeo ); ?>"  placeholder="https://vimeo.com" /></p>

         <p><label for="<?php echo esc_attr($this->get_field_id('icon_pinterest')); ?>"><?php esc_html_e( 'Icon pinterest:', 'sp-charityplus' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('icon_pinterest') ); ?>" name="<?php echo esc_attr( $this->get_field_name('icon_pinterest') ); ?>" type="text" value="<?php echo esc_attr( $icon_pinterest ); ?>" /></p>
         <p><label for="<?php echo esc_attr($this->get_field_id('link_pinterest')); ?>"><?php esc_html_e( 'Link pinterest:', 'sp-charityplus' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_pinterest') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_pinterest') ); ?>" type="text" value="<?php echo esc_attr( $link_pinterest ); ?>" /></p>

         <p><label for="<?php echo esc_attr($this->get_field_id('icon_rss')); ?>"><?php esc_html_e( 'Icon rss:', 'sp-charityplus' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('icon_rss') ); ?>" name="<?php echo esc_attr( $this->get_field_name('icon_rss') ); ?>" type="text" value="<?php echo esc_attr( $icon_rss ); ?>" /></p>
         <p><label for="<?php echo esc_attr($this->get_field_id('link_rss')); ?>"><?php esc_html_e( 'Link rss:', 'sp-charityplus' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_rss') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_rss') ); ?>" type="text" value="<?php echo esc_attr( $link_rss ); ?>" /></p>

         <p><label for="<?php echo esc_attr($this->get_field_id('icon_skype')); ?>"><?php esc_html_e( 'Icon skype:', 'sp-charityplus' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('icon_skype') ); ?>" name="<?php echo esc_attr( $this->get_field_name('icon_skype') ); ?>" type="text" value="<?php echo esc_attr( $icon_skype ); ?>" /></p>
         <p><label for="<?php echo esc_attr($this->get_field_id('link_skype')); ?>"><?php esc_html_e( 'Link skype:', 'sp-charityplus' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_skype') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_skype') ); ?>" type="text" value="<?php echo esc_attr( $link_skype ); ?>" /></p>

         <p><label for="<?php echo esc_attr($this->get_field_id('icon_yahoo')); ?>"><?php esc_html_e( 'Icon yahoo:', 'sp-charityplus' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('icon_yahoo') ); ?>" name="<?php echo esc_attr( $this->get_field_name('icon_yahoo') ); ?>" type="text" value="<?php echo esc_attr( $icon_yahoo ); ?>" /></p>
         <p><label for="<?php echo esc_attr($this->get_field_id('link_yahoo')); ?>"><?php esc_html_e( 'Link yahoo:', 'sp-charityplus' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_yahoo') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_yahoo') ); ?>" type="text" value="<?php echo esc_attr( $link_yahoo ); ?>" /></p>

         <p><label for="<?php echo esc_attr($this->get_field_id('icon_flickr')); ?>"><?php esc_html_e( 'Icon flickr:', 'sp-charityplus' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('icon_flickr') ); ?>" name="<?php echo esc_attr( $this->get_field_name('icon_flickr') ); ?>" type="text" value="<?php echo esc_attr( $icon_flickr ); ?>" /></p>
         <p><label for="<?php echo esc_attr($this->get_field_id('link_flickr')); ?>"><?php esc_html_e( 'Link flickr:', 'sp-charityplus' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_flickr') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_flickr') ); ?>" type="text" value="<?php echo esc_attr( $link_flickr ); ?>" /></p>

         <p><label for="<?php echo esc_attr($this->get_field_id('icon_github')); ?>"><?php esc_html_e( 'Icon github:', 'sp-charityplus' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('icon_github') ); ?>" name="<?php echo esc_attr( $this->get_field_name('icon_github') ); ?>" type="text" value="<?php echo esc_attr( $icon_github ); ?>" /></p>
         <p><label for="<?php echo esc_attr($this->get_field_id('link_github')); ?>"><?php esc_html_e( 'Link github:', 'sp-charityplus' ); ?></label>
         <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_github') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_github') ); ?>" type="text" value="<?php echo esc_attr( $link_github ); ?>" /></p>

         <p>
            <label for="<?php echo esc_attr($this->get_field_id('icon_instagram')); ?>"><?php esc_html_e( 'Icon instagram:', 'sp-charityplus' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('icon_instagram') ); ?>" name="<?php echo esc_attr( $this->get_field_name('icon_instagram') ); ?>" type="text" value="<?php echo esc_attr( $icon_instagram ); ?>" />
        </p>
         <p>
            <label for="<?php echo esc_attr($this->get_field_id('link_instagram')); ?>"><?php esc_html_e( 'Link instagram:', 'sp-charityplus' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_instagram') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_instagram') ); ?>" type="text" value="<?php echo esc_attr( $link_instagram ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('icon_tumblr')); ?>"><?php esc_html_e( 'Icon Tumblr:', 'sp-charityplus' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('icon_tumblr') ); ?>" name="<?php echo esc_attr( $this->get_field_name('icon_tumblr') ); ?>" type="text" value="<?php echo esc_attr( $icon_tumblr ); ?>" />
        </p>
         <p>
            <label for="<?php echo esc_attr($this->get_field_id('link_tumblr')); ?>"><?php esc_html_e( 'Link Tumblr:', 'sp-charityplus' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_tumblr') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_tumblr') ); ?>" type="text" value="<?php echo esc_attr( $link_tumblr ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('icon_soundcloud')); ?>"><?php esc_html_e( 'Icon SoundCloud:', 'sp-charityplus' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('icon_soundcloud') ); ?>" name="<?php echo esc_attr( $this->get_field_name('icon_soundcloud') ); ?>" type="text" value="<?php echo esc_attr( $icon_soundcloud ); ?>" />
        </p>
         <p>
            <label for="<?php echo esc_attr($this->get_field_id('link_soundcloud')); ?>"><?php esc_html_e( 'Link SoundCloud:', 'sp-charityplus' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_soundcloud') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_soundcloud') ); ?>" type="text" value="<?php echo esc_attr( $link_soundcloud ); ?>" />
        </p>

         <p>
            <label for="<?php echo esc_attr($this->get_field_id('extra_class')); ?>">Extra Class:</label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('extra_class')); ?>" name="<?php echo esc_attr($this->get_field_name('extra_class')); ?>" value="<?php echo esc_attr($extra_class); ?>" />
        </p>

    <?php
    }

}

/**
* Class CS_Social_Widget
*/

function register_social_widget() {
    register_widget('CMS_Social_Widget');
}

add_action('widgets_init', 'register_social_widget');
?>