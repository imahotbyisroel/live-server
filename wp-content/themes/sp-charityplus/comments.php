<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package ZookaStudio
 * @subpackage ZK Katana
 * @author Chinh Duong Manh
 * @since 1.0.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
$class = '';
$comment_count = get_comments_number();
if(empty($comment_count)) $class= 'no-comment';
?>
<div id="comments" class="comments-area <?php echo esc_attr($class); ?>">
	<?php if(!empty($comment_count)) :?>
	<h4 class="comment-number">
		<?php
			printf( _n( 'Comment (%1$s)', 'Comments (%1$s)', get_comments_number(), 'sp-charityplus' ),
				number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
		?>
	</h4>
	<?php endif; ?>
	<ol class="comment-list"><?php
			$args = array(
				'avatar_size'       => 70,
				'callback'			=> 'spcharityplus_comment_list'
			);
			wp_list_comments($args);
		?></ol><!-- .comment-list -->
	<div class="cms-comment-pagination loop-pagination text-right"><?php 
			$args = array(
				'prev_text' => '&laquo;',
				'next_text' => '&raquo;',
			);
			paginate_comments_links($args); ?></div>
	
	<?php
		$commenter = wp_get_current_commenter();
		$req = get_option( 'require_name_email' );
		$aria_req = ( $req ? 'aria-required=true' : '' );
		$args    = array(
			'id_form'              => 'commentform',
			'id_submit'            => 'submit',
			'title_reply_before'   => '<h4 id="reply-title" class="reply-title"><span>',
			'title_reply'          => esc_html__( 'Leave a Comment','sp-charityplus'),
			'title_reply_after'    => '</span></h4>',
			'title_reply_to'       => esc_html__( 'Leave A Reply To %s','sp-charityplus'),
			'cancel_reply_link'    => esc_html__( 'Cancel Reply','sp-charityplus'),
			'label_submit'         => esc_html__( 'Post Comment','sp-charityplus'),
			'class_submit'         => 'btn',
			'comment_notes_before' => '',
			'fields'               => apply_filters( 'comment_form_default_fields', array(
				'author' =>
				'<div class="comment-field comment-form-author col-md-6">'.
				'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
				'" size="30"' . esc_attr($aria_req) . ' placeholder="'.esc_html__('* Name','sp-charityplus').'"/></div>',

				'email' =>
				'<div class="comment-field  comment-form-email col-md-6">'.
				'<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
				'" size="30"' . esc_attr($aria_req) . ' placeholder="'.esc_html__('* Email','sp-charityplus').'"/></div>',

				'url' => '',
				)
			),
			'comment_field' =>  '<div class="comment-field comment-form-comment col-md-12"><textarea id="comment" name="comment" cols="45" rows="5" placeholder="'.esc_html__('* Your Comment','sp-charityplus').'" aria-required="true">' .
			'</textarea></div>',
		);
		comment_form($args);
	?>
</div><!-- .comments-area -->
