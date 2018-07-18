<?php 
	/** 
	* SP CharityPlus will make some custom option for default VC Element 
	* @author Chinh Duong Manh
	* @since 1.0.0
	**/
  /* VC Separator */
  add_action( 'vc_after_init', 'spcharityplus_add_vc_separator_width' ); 
  function spcharityplus_add_vc_separator_width() {
      $param = WPBMap::getParam( 'vc_separator', 'el_width' );
      $param['value'][esc_html__( '100px', 'sp-charityplus' )] = '100px';
      $param['value'][esc_html__( '90px', 'sp-charityplus' )] = '90px';
      $param['value'][esc_html__( '80px', 'sp-charityplus' )] = '80px';
      $param['value'][esc_html__( '70px', 'sp-charityplus' )] = '70px';
      $param['value'][esc_html__( '60px', 'sp-charityplus' )] = '60px';
      $param['value'][esc_html__( '50px', 'sp-charityplus' )] = '50px';
      $param['value'][esc_html__( '40px', 'sp-charityplus' )] = '40px';
      $param['value'][esc_html__( '30px', 'sp-charityplus' )] = '30px';
      $param['value'][esc_html__( '20px', 'sp-charityplus' )] = '20px';
      $param['value'][esc_html__( '10px', 'sp-charityplus' )] = '10px';
      $param['std'] = '100px';
      vc_update_shortcode_param( 'vc_separator', $param);
  }
  /* VC Call to Actions */
  add_action( 'vc_after_init', 'spcharityplus_add_vc_cta_params' ); 
  function spcharityplus_add_vc_cta_params() {
    $shape = WPBMap::getParam( 'vc_cta', 'shape' );
    $shape['value'][esc_html__( 'Theme Style', 'sp-charityplus' )] = 'theme';
    $shape['std'] = 'theme';
    vc_update_shortcode_param( 'vc_cta', $shape);

    $style = WPBMap::getParam( 'vc_cta', 'style' );
    $style['value'][esc_html__( 'Theme Style', 'sp-charityplus' )] = 'theme';
    $style['std'] = 'theme';
    vc_update_shortcode_param( 'vc_cta', $style);

    $color = WPBMap::getParam( 'vc_cta', 'color' );
    $color['value'][esc_html__( 'Theme Style', 'sp-charityplus' )] = 'theme';
    $color['std'] = 'theme';
    vc_update_shortcode_param( 'vc_cta', $color);

    $btn_style = WPBMap::getParam( 'vc_cta', 'btn_style' );
    $btn_style['value'][esc_html__( 'Default Button', 'sp-charityplus' )] = ' btn';
    $btn_style['value'][esc_html__( 'Primary Button', 'sp-charityplus' )] = ' btn btn-primary';
    $btn_style['std'] = ' btn btn-primary';
    vc_update_shortcode_param( 'vc_cta', $btn_style);

    $btn_shape = WPBMap::getParam( 'vc_cta', 'btn_shape' );
    $btn_shape['value'][esc_html__( 'Theme Style', 'sp-charityplus' )] = 'theme';
    $btn_shape['std'] = 'theme';
    vc_update_shortcode_param( 'vc_cta', $btn_shape);

    $btn_color = WPBMap::getParam( 'vc_cta', 'btn_color' );
    $btn_color['value'][esc_html__( 'Theme Style', 'sp-charityplus' )] = 'theme';
    $btn_color['std'] = 'theme';
    vc_update_shortcode_param( 'vc_cta', $btn_color); 

    $btn_size = WPBMap::getParam( 'vc_cta', 'btn_size' );
    $btn_size['value'][esc_html__( 'Theme Style', 'sp-charityplus' )] = 'theme';
    $btn_size['std'] = 'theme';
    vc_update_shortcode_param( 'vc_cta', $btn_size);
  }
?>