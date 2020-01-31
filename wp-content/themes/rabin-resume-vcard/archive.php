<?php
/**
 * The template for displaying archive pages
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
					the_archive_title( '<h3 class="page-title">', '</h3>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
				?>
				<hr>
                <div class="clearfix"></div>

                <?php
                if ( have_posts() ){
                    /* Start the Loop */
                    while ( have_posts() ){
                        the_post();
                        /*
                         * Include the Post-Type-specific template for the content.
                         * If you want to override this in a child theme, then include a file
                         * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                         */
                        get_template_part( 'template-parts/content', get_post_type() );
                        
                    }
                    the_posts_pagination();
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
