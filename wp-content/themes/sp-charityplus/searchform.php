<?php 
	/* Custon search query on single page */
	$post_type = get_post_type();
	switch ($post_type) {
		case 'zkportfolio':
			$search_query = '<input type="hidden" name="post_type" value="zkportfolio" />';
			break;
		case 'zkevent':
			$search_query = '<input type="hidden" name="post_type" value="zkevent" />';
			break;
		case 'zodonations':
			$search_query = '<input type="hidden" name="post_type" value="zodonations" />';
			break;
		case 'product':
			$search_query = '<input type="hidden" name="post_type" value="product" />';
			break;
		default:
			$search_query = '';
			break;
	}
?>
<form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="cms-searchform" method="get">
	<input type="text" class="s" name="s" value="" placeholder="<?php esc_html_e('Search...','sp-charityplus');?>">
	<?php echo wp_kses_post($search_query); ?>
	<button type="submit" value="<?php esc_html_e('Search','sp-charityplus');?>" class="searchsubmit"><i class="zmdi zmdi-search"></i></button>
</form>