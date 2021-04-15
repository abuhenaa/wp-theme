<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Saiful
 */

?>
<div class="col-lg-6 masonry_blog">
    <div class="grid_item">
    <div class="grid_inner_item">
        <article id="post-<?php the_ID(); ?>" <?php post_class( ); ?>>
            <header class="entry-header">
                <div class="saiful_img">
                    <?php 
                        if( has_post_thumbnail() ){
                        echo get_the_post_thumbnail( get_the_ID(),array( 370,290 ),array( 'class' => 'img-fluid' )); 
                        }
                    ?>
                    <div class="overlay_content">
                        <a href="<?php the_permalink(); ?>" class="blog_btn"><?php echo esc_html__( "Read more","saiful" );?></a>
                    </div>
                </div>
            </header><!-- .entry-header -->
                <div class="entry-meta saiful_info">
                    <div class="post_meta">
                        <div class="tags">
                            <?php the_category(',','',''); ?>
                        </div>
                        <a href="<?php echo get_month_link( true, false ); ?>" class="date"><?php echo get_the_date(); ?></a>
                    </div>
                    <div class="post_title">
                        <h3><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title();?></a></h3>
                    </div>
                </div>

        </article><!-- #post-<?php the_ID(); ?> -->
        </div>
    </div>
</div>