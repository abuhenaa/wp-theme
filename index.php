<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Saiful
 */

get_header();
    if( !is_front_page() ){
        get_saiful_breadcrumb();
    }
?>
<section class="saiful_blog saiful_blog_2 saiful_blog_sidebar_wrapper section_padding">
    <div class="container">
        <div class="row">
            <div id="primary" class="content-area col-lg-8">
                <main id="main" class="site-main">
                    <div class="blog_main_wrapper">
                        <div class="row masonry-div">
                            <?php
                            if ( have_posts() ) :

                                    if ( is_home() && ! is_front_page() ) :
                                            ?>
                                            <header>
                                                    <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                                            </header>
                                            <?php
                                    endif;

                                    /* Start the Loop */
                                    while ( have_posts() ) :
                                            the_post();

                                            /*
                                                 * Include the Post-Type-specific template for the content.
                                                 * If you want to override this in a child theme, then include a file
                                                 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                                                 */
                                                get_template_part( 'template-parts/content', get_post_type() );

                                        endwhile;
                                        ?>
                                    <div class="col-lg-12 masonry_blog">
                                        <?php
                                            saiful_numeric_posts_nav();
                                        ?>
                                    </div>
                            <?php

                                else :

                                        get_template_part( 'template-parts/content', 'none' );

                                endif;
                                ?>
                            </div>
                        </div>

                    </main><!-- #main -->
            </div><!-- #primary -->

    <?php
    get_sidebar();
    ?>
        </div>
    </div>
</section>
<?php 
get_footer();
