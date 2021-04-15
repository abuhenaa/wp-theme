<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Saiful
 */

get_header();
?>
<?php get_saiful_breadcrumb(); ?>
<section class="saiful_blog saiful_blog_2 saiful_blog_sidebar_wrapper section_padding">
    <div class="container">
        <div class="row">
            <div id="primary" class="content-area col-lg-8">
		<main id="main" class="site-main blog-archive">
                    <div class="row masonry-div">
		<?php if ( have_posts() ) : ?>

			<header class="page-header col-lg-12 masonry_blog">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content','archive');

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
