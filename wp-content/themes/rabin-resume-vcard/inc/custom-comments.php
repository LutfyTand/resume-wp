<?php
/**
 * Custom comments template
 *
 * @package rabin-resume-vcard
 */
function rabin_resume_vcard_comments( $comment, $args, $depth ) {
	global $post;
	$author_id = $post->post_author;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments. ?>
		<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
		<div class="pingback-entry"><span class="pingback-heading"><?php esc_html_e( 'Pingback:', 'rabin-resume-vcard' ); ?></span> <?php comment_author_link(); ?></div>
	<?php
		break;
		default :
			// Proceed with normal comments. ?>
			<li id="li-comment-<?php comment_ID(); ?>">
	            <div class="comment-avatar">
	                <?php echo get_avatar( $comment, 40 ); ?>
	            </div>
	            <div class="comment-content">
	                <span class="comment-meta">
	                	<?php comment_author_link(); ?>, 
	                	<?php
                            /* translators: 1: date, 2: time */
                            printf( esc_html__('%1$s at %2$s', 'rabin-resume-vcard' ), get_comment_date(),  get_comment_time() ); 
                        ?>
						<?php comment_reply_link( array_merge( $args, array(
							'reply_text' => esc_html__( 'Reply', 'rabin-resume-vcard' ),
							'class' => 'reply ',
							'depth'      => $depth,
							'max_depth'	 => $args['max_depth'] )
						) ); ?>
	                </span>
					<?php if ( '0' == $comment->comment_approved ) : ?>
						<p class="comment-awaiting-moderation"><?php echo esc_html__( 'Your comment is awaiting moderation.', 'rabin-resume-vcard' ); ?></p>
					<?php endif; ?>
					<?php comment_text(); ?>
	            </div>
	            <ul>
	                <li>
	                    <div class="comment-avatar">
	                        <?php echo get_avatar( $comment, 40 ); ?>
	                    </div>
	                    <div class="comment-content">
			                <span class="comment-meta">
			                	<?php comment_author_link(); ?>, 
			                	<?php  comment_time('F j, Y \a\t h:i A');?> 
								<?php comment_reply_link( array_merge( $args, array(
									'reply_text' => esc_html__( 'Reply', 'rabin-resume-vcard' ),
									'class' => 'reply ',
									'depth'      => $depth,
									'max_depth'	 => $args['max_depth'] )
								) ); ?>
			                </span>
							<?php if ( '0' == $comment->comment_approved ) : ?>
								<p class="comment-awaiting-moderation"><?php echo esc_html__( 'Your comment is awaiting moderation.', 'rabin-resume-vcard' ); ?></p>
							<?php endif; ?>
							<?php comment_text(); ?>
			            </div>
	                </li>
	            </ul>
			
	<?php
		break;
	endswitch; // End comment_type check.
}

// Unset default input field from comment form
if ( ! function_exists( 'rabin_resume_vcard__comment_form_below' ) ){
	function rabin_resume_vcard__comment_form_below( $fields ) { 
	    $comment_field = $fields['comment']; 
	    unset( $fields['comment'] ); 
	    $fields['comment'] = ''; 
	    return $fields; 
	} 
	add_filter( 'comment_form_fields', 'rabin_resume_vcard__comment_form_below' ); 
}

// Add placeholder for Name and Email
if ( ! function_exists( 'rabin_resume_vcard_modify_comment_form_fields' ) ){
	function rabin_resume_vcard_modify_comment_form_fields($fields){
		$req = get_option('require_name_email');
		$commenter = wp_get_current_commenter();
		$aria_req = ( $req ? " aria-required='true'" : '' );
		
	    $fields['author'] = '<div class="form-group">
            <input type="text" class="form-control" name="author" value="' . esc_attr( $commenter['comment_author'] ) . '" ' . $aria_req . ' placeholder="' . esc_attr__( 'Your Name *', 'rabin-resume-vcard' ) . '">
            <label for="comment"></label>
        </div>';
	    $fields['email'] = '<div class="form-group">
            <input type="email" class="form-control" name="email"  placeholder="' . esc_attr__( 'Your Email *', 'rabin-resume-vcard' ) . '"  value="' . esc_attr(  $commenter['comment_author_email'] ) .'" ' . $aria_req . '>
            <label for="comment"></label>
        </div>';
        $fields['url'] = '<div class="form-group">
            <input name="url" type="text" class="form-control" placeholder="' . esc_attr__( 'http://example.com', 'rabin-resume-vcard' ) . '" value="' . esc_attr( $commenter['comment_author_url'] ) . '">
            <label for="comment"></label>
        </div>';
		$fields['comment_field'] = '<div class="form-group">
            <textarea name="comment" rows="6" class="form-control" placeholder="' . esc_attr__( 'Comment *', 'rabin-resume-vcard' ) . '" required></textarea>
        </div>';

	    return $fields;
	}
	add_filter('comment_form_default_fields','rabin_resume_vcard_modify_comment_form_fields');
}

/**
* Remove the original comment button
*/
if ( ! function_exists( 'rabin_resume_vcard__comment_form_submit_button' ) ){
	function rabin_resume_vcard__comment_form_submit_button($button) {
		$arg['class_submit'] = 'btn btn-light mb-5';
    	return $arg;
	}
	add_filter('comment_form_defaults', 'rabin_resume_vcard__comment_form_submit_button');
}