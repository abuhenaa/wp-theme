<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Saiful
 */

get_header();
global $s_options;
?>
<?php get_saiful_breadcrumb(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
                    <!-- Start saiful_blog_main section -->
                    <section class="saiful_blog_wrapper section_padding">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-8">
                                <?php
                                while ( have_posts() ) :
                                        the_post();

                                        get_template_part( 'template-parts/content', 'single' );

                                        the_post_navigation();
                                        if( isset( $s_options['blog'] ) && $s_options['blog'] == '1' ){
                                            
                                        ?>
                                    
                                        <div class="blog_post_author">
                                            <div class="author_img">
                                               <?php echo get_avatar( get_the_author_meta( 'ID' ), 150,'','Author Image' ); ?>
                                            </div>
                                            <div class="author_info">
                                                <h4><?php the_author(); ?></h4>
                                                <p><?php echo get_the_author_meta('description'); ?></p>
                                            </div>
                                        </div>
                                        <?php
                                        }
                                        // If comments are open or we have at least one comment, load up the comment template.
                                        if ( comments_open() || get_comments_number() ) :
                                                comments_template();
                                        endif;

                                endwhile; // End of the loop.
                                ?>
                                </div>
                                <?php get_sidebar(); ?>
                            </div>
                        </div>
                    </section>
		</main><!-- #main -->
	</div><!-- #primary -->
       
<?php
get_footer();
