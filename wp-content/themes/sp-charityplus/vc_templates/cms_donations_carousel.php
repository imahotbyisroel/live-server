<?php 
    /* get Shortcode custom value */
    extract(shortcode_atts(array(
        'posts_per_page' => 9,
        'layout_mode'    => 1,
        'number_row'     => 1,
    ), $atts));
    /* Post Query */
    $args = array(
        'posts_per_page' => $posts_per_page,
        'post_type'      => 'zodonations',
    );
    $posts = spcharityplus_get_posts($args);
    $count=$posts->post_count;
    $i=1;
    $j=0;
?>
<div id="cms-donations-wrap" class="cms-grid-wraper layout-<?php echo esc_attr($layout_mode);?>">
    <div id="<?php echo esc_attr($atts['html_id']);?>" class="cms-donations cms-carousel owl-carousel">
        <?php
        while($posts->have_posts()){
            $j++; 
            $posts->the_post();
            if($i > $number_row) $i=1;
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
            if($i==1):
                ?>
                <div class="cms-donation-item">
            <?php
            endif;
            switch ($layout_mode) {
                case '6' :
                ?>
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
                                <div> <?php echo do_shortcode('[zodonations_form el_class="btn btn-primary btn-alt" label_btn="'.esc_html__('Donate Now','sp-charityplus').'" donation_id="'.get_the_ID().'"]') ?> <?php echo esc_attr('&nbsp;&nbsp;&nbsp;&nbsp;'.$remaining) ?> </div>
                                <div class="donation-meta">
                                    <span class="light-blue-color"><?php echo esc_attr($raised); ?></span> <?php esc_html_e('Raised of', 'sp-charityplus'); ?>
                                    <span class="accent-color"><?php  echo esc_attr($goal); ?></span> <?php esc_html_e('Goal', 'sp-charityplus'); ?>
                                </div>
                            </div>
                        </div>
                    </article>
                <?php
                    break;
                case '5' :
                ?>
                    <article <?php post_class('archive-donate'); ?>>
                        <div class="entry-media">
                            <?php 
                                spcharityplus_post_thumbnail('330x230', true, '', '');
                            ?>
                            <div class="raised raised-progress-bar" data-progress="<?php echo esc_attr($raised_percent);?>">
                                <div class="raised-progress-bar-bg accent-bg" style="width: <?php echo esc_attr($raised_percent.'%');?>;"></div>

                                <div class="raised-progress-bar-value accent-bg primary-color" style="<?php echo is_rtl()?'right':'left';?>:<?php echo esc_attr($progress.'%');?>;"><?php echo esc_attr($raised_percent.'%'); ?></div>
                            </div>
                        </div>
                        <div class="archive-inner">
                            
                            <?php
                                the_title('<h4><a href="'.get_the_permalink().'">','</a></h4>'); 
                                spcharityplus_post_excerpt('76', true);
                            ?>
                            
                            <div class="donation-info">
                                <div> <?php echo do_shortcode('[zodonations_form el_class="btn btn-primary" label_btn="'.esc_html__('Donate Now','sp-charityplus').'" donation_id="'.get_the_ID().'"]') ?> <?php echo esc_attr('&nbsp;&nbsp;&nbsp;&nbsp;'.$remaining) ?> </div>
                                <div class="donation-meta">
                                    <span class="accent-color"><?php echo esc_attr($raised); ?></span> <?php esc_html_e('Raised of', 'sp-charityplus'); ?>
                                    <span class="green-color"><?php  echo esc_attr($goal); ?></span> <?php esc_html_e('Goal', 'sp-charityplus'); ?>
                                </div>
                            </div>
                        </div>
                    </article>
                <?php
                    break;
                case '4' :
                ?>
                    <article <?php post_class('archive-donate'); ?>>
                        <div class="entry-media">
                            <?php 
                                spcharityplus_post_thumbnail('330x230', true, '', '');
                            ?>
                            <div class="raided center-align">
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
                        <div class="archive-inner">
                            <?php
                                the_title('<h4><a href="'.get_the_permalink().'">','</a></h4>'); 
                                spcharityplus_post_excerpt('76', true);
                            ?>
                            
                            <div class="donation-info">
                                
                                <div class="donation-meta">
                                    <span class="red-color"><?php echo esc_attr($raised); ?></span> <?php esc_html_e('Raised of', 'sp-charityplus'); ?>
                                    <span class="accent-color"><?php  echo esc_attr($goal); ?></span> <?php esc_html_e('Goal', 'sp-charityplus'); ?>
                                </div>
                            </div>
                        </div>
                        <div><?php echo do_shortcode('[zodonations_form el_class="btn-donate accent-bg text-center" label_btn="'.esc_html__('Donate Now','sp-charityplus').'" donation_id="'.get_the_ID().'" icon="fa fa-heart-o"]') ?></div>
                    </article>
                <?php
                    break;
                case '3':
                ?>
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
                <?php
                    break;
                case '2' :
                ?>
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
                <?php
                    break;
                default:
                ?>
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
                <?php
                    break;
            }
            ?>
            <?php  if($i == $number_row || $j==$count): ?>
                </div>
            <?php endif; 
            $i ++; 
        }     
        ?>
    </div>
    <?php 
        /* Restore original Post Data */
        wp_reset_postdata();
    ?>
</div>