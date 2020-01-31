<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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
                if ( have_posts() ){
                	while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
                }else{
                    get_template_part( 'template-parts/content', 'none' );
                }
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

