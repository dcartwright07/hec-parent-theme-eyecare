<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. 
 */

if ( post_password_required() )
	return;

if ( have_comments() || comments_open() ) {
	?>
    <div class="row">
	<div class="medium-12 columns comments_wrap">
	<?php
	if ( have_comments() ) {
	?>
		<div id="comments" class="comments_list_wrap">
			<h3 class="section_title comments_list_title"><?php $post_comments = get_comments_number(); echo esc_attr($post_comments); ?> <?php echo esc_attr($post_comments==1 ? esc_html__('Comment', 'eyecare') : esc_html__('Comment(s)', 'eyecare')); ?></h3>
			<ul class="comments_list">
				<?php
					wp_list_comments( array('callback'=>'wc_output_single_comment'));
				?>
			</ul><!-- .comments_list -->
			<?php if ( !comments_open() && get_comments_number()!=0 && post_type_supports(get_post_type(), 'comments' ) ) { ?>
				<p class="comments_closed"><?php esc_html__('Comments are closed.', 'eyecare' ); ?></p>
			<?php }	?>
			<div class="comments_pagination"><?php paginate_comments_links(); ?></div>
		</div><!-- .comments_list_wrap -->
	<?php 
	}

	if ( comments_open() ) {
	?>
		<div class="comments_form_wrap">
			<div class="comments_form">
				<?php
					$commenter	= wp_get_current_commenter();
					$req 		= get_option( 'require_name__mail' );
					$aria_req 	= ( $req ? ' aria-required="true"' : '' );
					$comments_args = array(
						// change the id of send button 
						'id_submit'=>'send_comment',
						'class_submit'=>'button primary',
						'class_form' => 'row',
						// change the title of send button 
						'label_submit'		 => esc_html__('Post Comment', 'eyecare'),
						'title_reply'        => esc_html__( 'Leave a Reply', 'eyecare'),
	  					'title_reply_to'     => esc_html__( 'Leave a Reply to %s', 'eyecare'),
  						'cancel_reply_link'  => esc_html__( 'Cancel Reply', 'eyecare'),
  						'label_submit'       => esc_html__( 'Post Comment', 'eyecare'),
						'title_reply_before' => '<h3 id="reply-title" class="comment-reply-title">',
						// remove "Logged in as"
						'logged_in_as' => '',
						// remove text before textarea
						'comment_notes_before' => '<div class="medium-12 columns"><p class="comments_notes">'.esc_html__('Your email address will not be published. Required fields are marked *', 'eyecare').'</p></div>',
						// remove text after textarea
						'comment_notes_after' => '',
						// redefine your own textarea (the comment body)
						'comment_field' => '<div class="medium-12 columns">'
											. '<label for="comment" class="required">' . esc_html__('Your Comment', 'eyecare') . '</label>'
											. '<textarea id="comment" rows="5" name="comment" placeholder="' . esc_html__( 'Comment', 'eyecare' ) . '" aria-required="true"></textarea>'
										. '</div>',
						'fields' => apply_filters( 'comment_form_default_fields', array(
							'author' => '<div class="medium-6 columns">'
									. '<label for="author"' . ( $req ? ' class="required"' : '' ). '>' . esc_html__( 'Name', 'eyecare' ) . '</label>'
									. '<input id="author" name="author" type="text" placeholder="' . esc_html__( 'Name', 'eyecare' ) . ( $req ? ' *' : '') . '" value="' . esc_attr( isset($commenter['comment_author']) ? $commenter['comment_author'] : '' ) . '" size="30"' . ($aria_req) . ' />'
									. '</div>',
							'email' => '<div class="medium-6 columns">'
									. '<label for="email"' . ( $req ? ' class="required"' : '' ) . '>' . esc_html__( 'Email', 'eyecare' ) . '</label>'
									. '<input id="email" name="email" type="text" placeholder="' . esc_html__( 'Email', 'eyecare' ) . ( $req ? ' *' : '') . '" value="' . esc_attr(  isset($commenter['comment_author__mail']) ? $commenter['comment_author__mail'] : '' ) . '" size="30"' . ($aria_req) . ' />'
									. '</div>',

						) )
				);
			
				comment_form($comments_args);
				?>
			</div>
		</div><!-- /.comments_form_wrap -->
	<?php 
	}
	?>
	</div><!-- /.comments_wrap -->
    </div><!-- row /-->
<?php 
}