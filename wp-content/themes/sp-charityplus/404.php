<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package SpyroPress
 * @subpackage CharityPlus
 * @since 1.0.0
 */

get_header(); ?>

<div id="content-area" class="content-area col-md-12">
	<div class="row">
	<div class="col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
		<header class="text-center">
			<h1 class="page-title"><?php esc_html_e( '404', 'sp-charityplus' ); ?></h1>
			<h2 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'sp-charityplus' ); ?></h2>
			<p>
				<?php esc_html_e( 'Sorry but the page you are looking for does not exist, have been removed, name changed or is temporarity unavailable.', 'sp-charityplus' ); ?>
			</p>
		</header><!-- .page-header -->
		<div class="page-content">
			<?php get_search_form(); ?>
			<div class="text-center"><a class="btn btn-primary" href="<?php echo esc_url(home_url('/'));?>"><?php esc_html_e('Back to Home','sp-charityplus'); ?></a></div>
		</div>
	</div>
	</div>
</div>

<?php get_footer(); ?>
