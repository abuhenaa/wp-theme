<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Saiful
 */

?>

<div class="single_blog_main">
    <article id="post-<?php the_ID(); ?>" <?php post_class("post_main_content"); ?>>
            <header class="entry-header">
                <div class="post_meta">
                    <a href="<?php echo get_month_link( false,true );?>" class="date"><i class="fas fa-calendar-alt"></i><?php the_date(); ?></a>
                    <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" class="user"><i class="fas fa-user"></i><?php the_author(); ?></a>
                    <?php
                        $categories = get_the_category();
                        if ( ! empty( $categories ) ) {
                            echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '"><i class="fas fa-folder"></i>' . esc_html( $categories[0]->name ) . '</a>';
                        }

                    ?>
                </div>
                <h3 class="post-title"><?php the_title();?></h3>
            </header><!-- .entry-header -->

            <?php echo get_the_post_thumbnail( get_the_ID(),'full',array('class' => 'img-fluid') );?>

            <div class="entry-content">
                    <?php
                    the_content( sprintf(
                            wp_kses(
                                    /* translators: %s: Name of current post. Only visible to screen readers */
                                    __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'saiful' ),
                                    array(
                                            'span' => array(
                                                    'class' => array(),
                                            ),
                                    )
                            ),
                            get_the_title()
                    ) );

                    wp_link_pages( array(
                            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'saiful' ),
                            'after'  => '</div>',
                    ) );
                    ?>
            </div><!-- .entry-content -->

            <footer class="entry-footer">
                    <?php saiful_entry_footer(); ?>
            </footer><!-- .entry-footer -->
    </article><!-- #post-<?php the_ID(); ?> -->
</div>