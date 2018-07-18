<?php 
    /* get Shortcode custom value */
    extract(shortcode_atts(array(
        'name'   => 'charityplus',
        'num'    => 5,
        'cols'   => 5,
        'el_class'    => ''
    ), $atts));
    if(!function_exists('display_instagram')) return;
?>


<div class="cms-instagram-feed">
    <h2 class="text-center">
        <?php 
           echo sprintf( esc_html__( 'Follow us on Instagram %s', 'sp-charityplus' ), '<a class="accent-color" target="_blank" href="http://instagram.com/'.esc_attr($name).'">@' . esc_attr( $name) . '</a>' );
        ?>
    </h2>
    <?php echo do_shortcode('[instagram-feed num='.$num.' cols='.$cols.' imagepadding=0 class='.$el_class.']'); ?>
</div>