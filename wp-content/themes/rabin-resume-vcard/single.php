<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Rabin_Resume_Vcard
 */

get_header();
?>

<div class="bb-custom-side">
    <div class="bb-custom-side-inner">
        <div class="bb-custom-side-content">

            <!-- Pricing -->
            <div id="home-page-article" class="section-block">
                <div class="clearfix"></div>
				<?php
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content', get_post_type() );

					the_post_navigation();

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>
            </div>
            <!-- Pricing end -->

        </div>
    </div>
</div>

</div>
<!-- Home end -->

<?php
get_footer();
