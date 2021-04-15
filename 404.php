<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Saiful
 */

get_header();
?>
<?php get_saiful_breadcrumb(); ?>
<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <section class="error-404 not-found section_padding">
             <div class="container">
                <div class="row text-center">
                    <div class="col-lg-12">
                        <header class="page-header">
                                <h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'saiful' ); ?></h1>
                        </header><!-- .page-header -->

                        <div class="page-content">
                            <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'saiful' ); ?></p>
                            <div class="error-404-not-found">
                                <?php
                                get_search_form();
                                ?>
                            </div>  
                        </div><!-- .page-content -->
                    </div>
                </div>
             </div>
        </section><!-- .error-404 -->
    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
