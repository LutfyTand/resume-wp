<?php
/**
* The template for displaying comments
*
* This is the template that displays the area of the page that contains both the current comments
* and the comment form.
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package Rabin_Resume_Vcard
*/

/*
* If the current post is protected by a password and
* the visitor has not yet entered the password we will
* return early without loading the comments.
*/
if ( post_password_required() ) {
return;
}
?>

<?php if ( have_comments() ){?>
<!-- Comments Area -->
<div class="comments-area">
    <h4 class="comments-title">
		<?php
			$rabin_resume_vcard_comment_count = get_comments_number();
			if ( '1' === $rabin_resume_vcard_comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'rabin-resume-vcard' ),
					'<span>' . get_the_title() . '</span>'
				);
			} else {
				printf( // WPCS: XSS OK.
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $rabin_resume_vcard_comment_count, 'comments title', 'rabin-resume-vcard' ) ),
					number_format_i18n( $rabin_resume_vcard_comment_count ),
					'<span>' . get_the_title() . '</span>'
				);
			}
			?>
    </h4>
    <ul class="comments">
		<?php
			wp_list_comments( array(
				'style'      => 'ul',
				'short_ping' => true,
				'callback' => 'rabin_resume_vcard_comments'
			) );
		?>
    </ul>
</div>
<?php }?>

<!-- Comments Respond -->
<div class="comment-respond">
    <h4 class="respond-title"><?php echo esc_html__('Write a comment','rabin-resume-vcard');?></h4>
		<?php
			the_comments_navigation();

			// If comments are closed and there are comments, let's leave a little note, shall we?
			if ( ! comments_open() ) :
				?>
				<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'rabin-resume-vcard' ); ?></p>
				<?php
			endif;
			comment_form();
		?>
</div>