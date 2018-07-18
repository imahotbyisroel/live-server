<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="cms-page">
 *
 * @package SpyroPress
 * @subpackage CharityPlus
 * @since 1.0.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ): ?>
<link rel="shortcut icon" type="image/x-icon" href="<?php echo esc_url(get_template_directory_uri() . '/favicon.ico'); ?>" />
<?php endif; ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<?php spcharityplus_page_loading();?>
	<div id="cms-page" class="<?php spcharityplus_page_class(); ?>">
		<?php 	
			spcharityplus_header_rev_slider();
			spcharityplus_header_layout();
			spcharityplus_page_title();
		?>
		<main id="cms-main" class="<?php spcharityplus_main_class(); ?>">
			<div class="row">