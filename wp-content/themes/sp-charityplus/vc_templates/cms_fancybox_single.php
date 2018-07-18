<?php 
    extract(shortcode_atts(array(
        'title'                 => '',
        'description'           => '',
        'price'                 => '',
        'content_align'         => '',
        'image'                 => '',
        'image_icon'            => false,
        'thumbnail_size'        => 'medium',
        'thumbnail_size_custom' => '',
        'icon_type'             => '',
        'icon_size'             => '27',
        'button_link'           => '',
        'layout_mode'           => '1',
        'color_mode'            => '',
        'css'                   => '',
        'icon_color'            => ''
    ), $atts));
    /* Icon */
    $icon_name = "icon_" . $atts['icon_type'];
    $iconClass = isset($atts[$icon_name]) ? $atts[$icon_name]: '';
    $iconsize_css = $content_css = '';
    if(!empty($icon_size)) {
        $iconsize = explode('x', $icon_size);
        $icon_size_w = $iconsize[0];
        $icon_size_h = isset($iconsize[1]) ? $iconsize[1] : $iconsize[0];
        $iconsize_css = 'width:'.$icon_size_w.'px; height:'.$icon_size_h.'px; line-height:'.$icon_size_h.'px;';
        if(is_rtl() && $content_align != 'text-center') {
            if($content_align == 'text-right'){
                $iconsize_css .= 'float: left;';
                $content_css = 'padding-left:'.($icon_size_w + 11 ).'px;';
            } else {
                $iconsize_css .= 'float: right;';
                $content_css = 'padding-right:'.($icon_size_w + 11 ).'px;';
            }
        } else {
            if($content_align == '' || $content_align == 'text-left'){
                $iconsize_css .= 'float: left;';
                $content_css = 'padding-left:'.($icon_size_w + 11 ).'px;';
            } elseif($content_align == 'text-right'){
                $iconsize_css .= 'float: right;';
                $content_css = 'padding-right:'.($icon_size_w + 11 ).'px;';
            }
        }
    }
    /* parse button link */
    $use_link = false;
    if(!empty($atts['button_link'])){
        $button_link = vc_build_link( $atts['button_link'] );
        $button_link = ( $button_link == '||' ) ? '' : $button_link;
        if ( strlen( $button_link['url'] ) > 0 ) {
            $use_link = true; 
            $a_href = $button_link['url'];
            $a_title = strlen($button_link['title']) > 0 ? $button_link['title'] : esc_html__('Read more','sp-charityplus') ;
            $a_target = strlen( $button_link['target'] ) > 0 ? $button_link['target'] : '_self';
        }
    }
    /* Image Size */
    $custom_size = false;
    if ($thumbnail_size === 'custom'){
        $custom_size = true;
        $thumbnail_size = $thumbnail_size_custom;
    }
    if(!empty($icon_size) && $image_icon) $thumbnail_size  = $icon_size;
    if($image){
        $img_cls = '';
        if($image_icon) $img_cls = 'img-circle';
        $img_id = $atts['image'];
        $img = wpb_getImageBySize( array(
            'attach_id' => $img_id,
            'thumb_size' => $thumbnail_size,
            'class' => 'cms-single-fancybox-img '.$img_cls,
        ));
        $thumbnail = $img['thumbnail'];
        $_image = wp_get_attachment_image_src(  $img_id  );
        $image_url = $_image[0];
    }
    /* get value for Design Tab */
    $css_classes = array(
        vc_shortcode_custom_css_class( $css ),
    );

    $css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( $css_classes ) ), $this->settings['base'], $atts ) );

    switch ($layout_mode) {
        case '6':
            if(empty($content_align)) $content_align = 'text-center';
            break;
        case '5':
            if(empty($content_align)) $content_align = 'text-center';
            break;
    }

    $atts['template'] .= ' layout-'.$layout_mode.' '.$content_align.' '.$color_mode;
?>

<?php switch ($layout_mode) {
    case '6':
?>
<div id="<?php echo esc_attr($atts['html_id']);?>" class="cms-single-fancybox <?php echo esc_attr($atts['template'].' '.trim($css_class));?> accent-bg clearfix">
    <?php if($image) echo '<img class="img-fit" src="'.esc_url($image_url).'" alt="" />';  ?>
    <div class="cms-single-fancybox-inner">
    <?php if(!empty($iconClass) || !empty($image)) :?>
        <div class="cms-fancybox-icon">
            <?php if(!$image_icon) { ?>
                <i class="<?php echo esc_attr($iconClass);?> text-center"></i>
            <?php } else {?>
                <?php echo wp_kses_post($thumbnail);  ?>
            <?php } ?>
        </div>
    <?php endif;?>
    <div class="cms-fancy-content">
        <?php if(!empty($title)):?>
            <h2 class="cms-fancybox-title color-white"><?php echo esc_html($title);?></h2>
        <?php endif;?>
        <?php if(!empty($description)) :?>
        <div class="cms-fancybox-desc"><?php echo wp_kses($description,array('br'=>array(),'b'=>array(),'strong'=>array()));?></div>
        <?php endif;?>
        <?php if($price): ?>
        <div class="cms-fancybox-price"><?php echo esc_html__('Price','sp-charityplus') ?>: <?php echo esc_html($price) ?></div>
        <?php endif; ?>
        <?php if($use_link) { ?>
            <a class="cms-fancybox-link btn" href="<?php echo esc_url( $a_href ); ?>" title="<?php echo esc_attr( $a_title ); ?>" target="<?php echo trim( esc_attr( $a_target ) ); ?>"><?php echo esc_attr( $a_title ); ?></a>
        <?php } ?>
    </div>
    </div>
</div>
<?php
    break;
    case '5':
?>
<div id="<?php echo esc_attr($atts['html_id']);?>" class="cms-single-fancybox <?php echo esc_attr($atts['template'].' '.trim($css_class));?> accent-bg clearfix">
    <div class="cms-single-fancybox-inner">
    <?php if(!empty($iconClass) || !empty($image)) :?>
        <div class="cms-fancybox-icon">
            <?php if(!$image_icon) { ?>
                <i class="<?php echo esc_attr($iconClass);?> img-circle white-bg text-center accent-color" style="<?php echo esc_attr('width:'.$icon_size_w.'px; height:'.$icon_size_h.'px; line-height:'.$icon_size_h.'px; display: inline-block; color:'.$icon_color.''); ?>"></i>
            <?php } else {?>
                <?php echo wp_kses_post($thumbnail);  ?>
            <?php } ?>
        </div>
    <?php endif;?>
    <div class="cms-fancy-content">
        <?php if($image && !$image_icon) : ?>
        <div class="cms-fancybox-media"><?php echo wp_kses_post($thumbnail);  ?></div>
        <?php endif; ?>
        <?php if(!empty($title)):?>
            <h2 class="cms-fancybox-title"><?php echo esc_html($title);?></h2>
        <?php endif;?>
        <?php if(!empty($description)) :?>
        <div class="cms-fancybox-desc"><?php echo wp_kses($description,array('br'=>array(),'b'=>array(),'strong'=>array()));?></div>
        <?php endif;?>
        <?php if($price): ?>
        <div class="cms-fancybox-price"><?php echo esc_html__('Price','sp-charityplus') ?>: <?php echo esc_html($price) ?></div>
        <?php endif; ?>
        <?php if($use_link) { ?>
            <a class="cms-fancybox-link btn" href="<?php echo esc_url( $a_href ); ?>" title="<?php echo esc_attr( $a_title ); ?>" target="<?php echo trim( esc_attr( $a_target ) ); ?>"><?php echo esc_attr( $a_title ); ?></a>
        <?php } ?>
    </div>
    </div>
</div>
<?php
    break;
    case '4':
?>
<div id="<?php echo esc_attr($atts['html_id']);?>" class="cms-single-fancybox <?php echo esc_attr($atts['template'].' '.trim($css_class));?> clearfix">
    <div class="cms-single-fancybox-inner">
    <?php if(!empty($iconClass) || !empty($image)) :?>
        <div class="cms-fancybox-icon">
            <?php if(!$image_icon) { ?>
                <i class="<?php echo esc_attr($iconClass);?> img-circle accent-bg text-center" style="<?php echo esc_attr('width:'.$icon_size_w.'px; height:'.$icon_size_h.'px; line-height:'.$icon_size_h.'px; display: inline-block;'); ?>"></i>
            <?php } else {?>
                <?php echo wp_kses_post($thumbnail);  ?>
            <?php } ?>
        </div>
    <?php endif;?>
    <div class="cms-fancy-content">
        <?php if($image && !$image_icon) : ?>
        <div class="cms-fancybox-media"><?php echo wp_kses_post($thumbnail);  ?></div>
        <?php endif; ?>
        <?php if(!empty($title)):?>
            <h4 class="cms-fancybox-title"><?php echo esc_html($title);?></h4>
        <?php endif;?>
        <?php if(!empty($description)) :?>
        <div class="cms-fancybox-desc"><?php echo wp_kses($description,array('br'=>array(),'b'=>array(),'strong'=>array()));?></div>
        <?php endif;?>
        <?php if($price): ?>
        <div class="cms-fancybox-price"><?php echo esc_html__('Price','sp-charityplus') ?>: <?php echo esc_html($price) ?></div>
        <?php endif; ?>
        <?php if($use_link) { ?>
            <a class="cms-fancybox-link" href="<?php echo esc_url( $a_href ); ?>" title="<?php echo esc_attr( $a_title ); ?>" target="<?php echo trim( esc_attr( $a_target ) ); ?>"><?php echo esc_attr( $a_title ); ?></a>
        <?php } ?>
    </div>
    </div>
</div>
<?php
    break;
    case '3':
?>
<div id="<?php echo esc_attr($atts['html_id']);?>" class="cms-single-fancybox <?php echo esc_attr($atts['template'].' '.trim($css_class));?> clearfix">
    <div class="cms-single-fancybox-inner">
    <?php if(!empty($iconClass) || !empty($image)) :?>
        <div class="cms-fancybox-icon accent-color" style="<?php echo wp_kses_post($iconsize_css);?>">
            <?php if(!$image_icon) { ?>
                <i class="<?php echo esc_attr($iconClass);?>"></i>
            <?php } else {?>
                <?php echo wp_kses_post($thumbnail);  ?>
            <?php } ?>
        </div>
    <?php endif;?>
    <div class="cms-fancy-content" style="<?php echo wp_kses_post($content_css);?>">
        <?php if($image && !$image_icon) : ?>
        <div class="cms-fancybox-media"><?php echo wp_kses_post($thumbnail);  ?></div>
        <?php endif; ?>
        <?php if(!empty($title)):?>
            <h4 class="cms-fancybox-title"><?php echo esc_html($title);?></h4>
        <?php endif;?>
        <?php if(!empty($description)) :?>
        <div class="cms-fancybox-desc"><?php echo esc_html($description);?></div>
        <?php endif;?>
        <?php if($price): ?>
        <div class="cms-fancybox-price"><?php echo esc_html__('Price','sp-charityplus') ?>: <?php echo esc_html($price) ?></div>
        <?php endif; ?>
        <?php if($use_link) { ?>
            <a class="cms-fancybox-link" href="<?php echo esc_url( $a_href ); ?>" title="<?php echo esc_attr( $a_title ); ?>" target="<?php echo trim( esc_attr( $a_target ) ); ?>"><?php echo esc_attr( $a_title ); ?></a>
        <?php } ?>
    </div>
    </div>
</div>
<?php
    break;
    case '2':
?>
<div id="<?php echo esc_attr($atts['html_id']);?>" class="cms-single-fancybox <?php echo esc_attr($atts['template'].' '.trim($css_class));?> clearfix" style="margin-top: <?php echo esc_attr($icon_size_h / 2); ?>px;">
    <div class="cms-single-fancybox-inner">
    <?php if(!empty($iconClass) || !empty($image)) :?>
        <div class="cms-fancybox-icon img-circle text-center" style="<?php echo esc_attr('margin-top:-'. ($icon_size_h / 2).'px;width:'.$icon_size_w.'px; height:'.$icon_size_h.'px; line-height:'.$icon_size_h.'px;'); ?>">
            <?php if(!$image_icon) { ?>
                <i class="<?php echo esc_attr($iconClass);?> accent-color" style="line-height: <?php echo esc_attr($icon_size_h - 10); ?>px;"></i>
            <?php } else {?>
                <?php echo wp_kses_post($thumbnail);  ?>
            <?php } ?>
        </div>
    <?php endif;?>
    <div class="cms-fancy-content">
        <?php if($image && !$image_icon) : ?>
        <div class="cms-fancybox-media"><?php echo wp_kses_post($thumbnail);  ?></div>
        <?php endif; ?>
        <?php if(!empty($title)):?>
            <h4 class="cms-fancybox-title"><?php echo esc_html($title);?></h4>
        <?php endif;?>
        <?php if(!empty($description)) :?>
        <div class="cms-fancybox-desc"><?php echo wp_kses($description,array('br'=>array(),'b'=>array(),'strong'=>array()));?></div>
        <?php endif;?>
        <?php if($price): ?>
        <div class="cms-fancybox-price"><?php echo esc_html__('Price','sp-charityplus') ?>: <?php echo esc_html($price) ?></div>
        <?php endif; ?>
        <?php if($use_link) { ?>
            <a class="cms-fancybox-link" href="<?php echo esc_url( $a_href ); ?>" title="<?php echo esc_attr( $a_title ); ?>" target="<?php echo trim( esc_attr( $a_target ) ); ?>"><?php echo esc_attr( $a_title ); ?></a>
        <?php } ?>
    </div>
    </div>
</div>
<?php
    break;
    default:
?>
<div id="<?php echo esc_attr($atts['html_id']);?>" class="cms-single-fancybox <?php echo esc_attr($atts['template'].' '.trim($css_class));?> clearfix">
    <div class="cms-single-fancybox-inner">
    <?php if(!empty($iconClass) || !empty($image)) :?>
        <div class="cms-fancybox-icon" style="<?php echo wp_kses_post($iconsize_css);?>">
            <?php if(!$image_icon) { ?>
                <i class="<?php echo esc_attr($iconClass);?>"></i>
            <?php } else {?>
                <?php echo wp_kses_post($thumbnail);  ?>
            <?php } ?>
        </div>
    <?php endif;?>
    <div class="cms-fancy-content" style="<?php echo wp_kses_post($content_css);?>">
        <?php if($image && !$image_icon) : ?>
        <div class="cms-fancybox-media"><?php echo wp_kses_post($thumbnail);  ?></div>
        <?php endif; ?>
        <?php if(!empty($title)):?>
            <h4 class="cms-fancybox-title"><?php echo esc_html($title);?></h4>
        <?php endif;?>
        <?php if(!empty($description)) :?>
        <div class="cms-fancybox-desc"><?php echo esc_html($description);?></div>
        <?php endif;?>
        <?php if($price): ?>
        <div class="cms-fancybox-price"><?php echo esc_html__('Price','sp-charityplus') ?>: <?php echo esc_html($price) ?></div>
        <?php endif; ?>
        <?php if($use_link) { ?>
            <a class="cms-fancybox-link" href="<?php echo esc_url( $a_href ); ?>" title="<?php echo esc_attr( $a_title ); ?>" target="<?php echo trim( esc_attr( $a_target ) ); ?>"><?php echo esc_attr( $a_title ); ?></a>
        <?php } ?>
    </div>
    </div>
</div>
<?php 
    break;
} ?>
        