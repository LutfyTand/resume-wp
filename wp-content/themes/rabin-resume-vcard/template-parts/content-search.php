<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Rabin_Resume_Vcard
 */

$is_thumbnail = (has_post_thumbnail())?'':'post-without-thumbnail';
?>

<!-- Post Entry -->
<article id="post-<?php the_ID(); ?>" <?php post_class('post entry '.$is_thumbnail); ?>>
    <div class="post-thumbnail">
        <?php rabin_resume_vcard_post_thumbnail(); ?>
        <div class="post-heading">
			<?php
				if ( is_singular() ) :
					the_title( '<h4 class="post-title">', '</h4>' );
				else :
					the_title( '<h4 class="post-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' );
				endif;

				rabin_resume_vcard_posted_on();
			?>
        </div>
    </div>
    <div class="post-content">
		<?php
			if( !is_singular() ){
				the_excerpt();
			}else{
				the_content( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'rabin-resume-vcard' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'rabin-resume-vcard' ),
					'after'  => '</div>',
				) );
			}
		?>
    </div>
</article>
<!-- Post Entry end -->