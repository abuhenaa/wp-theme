<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Saiful
 */

?>
<?php  if( is_sticky() ){
    echo '<div class="col-lg-12 masonry_blog">';
}else{
    echo '<div class="col-lg-6 masonry_blog">';
}
?>
    <div class="grid_item">
    <div class="grid_inner_item">
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">
                <div class="saiful_img">
                    <?php
                        if( is_sticky()&& has_post_thumbnail() ){
                            echo '<span class="featured-badge">'.esc_html__('Featured','saiful').'</span>';
                        }
                        if( ! is_sticky() && has_post_thumbnail() ){
                            echo get_the_post_thumbnail( get_the_ID(),array( 370,290 ),array( 'class' => 'img-fluid' ));
                        }
                        if( is_sticky() && has_post_thumbnail() ){
                            echo get_the_post_thumbnail( get_the_ID(),array( 800,300 ),array( 'class' => 'img-fluid' ));
                        }
                    ?>
                    
                    <div class="overlay_content">
                        <a href="<?php the_permalink(); ?>" class="blog_btn"><?php echo esc_html__( "Read more","saiful" );?></a>
                    </div>
                </div>
            </header><!-- .entry-header -->
                <div class="entry-meta saiful_info">
                    <div class="post_meta">
                        <div class="tags cats">
                            <?php
                                $categories = get_the_category();
                                if ( ! empty( $categories ) ) {
                                    echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
                                }
                            
                            ?>
                        </div>
                        <a href="<?php echo get_the_permalink();?>" class="date"><?php echo get_the_date(); ?></a>
                    </div>
                    <div class="post_title">
                        <h3><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title();?></a></h3>
                        <?php 
                         if( is_sticky() ){
                             ?>
                        <div class="pinned">
                            <i class="fas fa-thumbtack"></i>
                        </div>
                        <?php 
                         }
                        ?>
                        
                    </div>
                   
                </div>

        </article><!-- #post-<?php the_ID(); ?> -->
        </div>
    </div>
</div>