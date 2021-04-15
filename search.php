<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Saiful
 */

get_header();
?>
<?php get_saiful_breadcrumb(); ?>
<section id="primary" class="content-area section_padding saiful_blog_2 ">
        <main id="main" class="site-main">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="row">
                        <?php if ( have_posts() ) : ?>
                                <header class="page-header">
                                    <h1 class="page-title">
                                        <?php
                                        /* translators: %s: search query. */
                                        printf( esc_html__( 'Search Results for: %s', 'saiful' ), '<span>' . get_search_query() . '</span>' );
                                        ?>
                                    </h1>
                                </header><!-- .page-header -->

                                <?php
                                /* Start the Loop */
                                while ( have_posts() ) :
                                        the_post();

                                        /**
                                         * Run the loop for the search to output the results.
                                         * If you want to overload this in a child theme then include a file
                                         * called content-search.php and that will be used instead.
                                         */
                                        get_template_part( 'template-parts/content', 'search' );

                                endwhile;
                                ?>

                            <div class="col-lg-12">
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
                    <?php get_sidebar(); ?>
                </div>
             </div>
        </main><!-- #main -->
</section><!-- #primary -->

<?php
get_footer();
