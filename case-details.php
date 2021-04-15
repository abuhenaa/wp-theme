<?php
/*
 * Template Name: Case Details
 */
get_header();
?>
<?php get_saiful_breadcrumb(); ?>
<!-- Start single_case section -->
<section class="saiful_single_case_wrapper section_padding">
    <div class="container">
        <?php 
        while ( have_posts() ) :
            the_post();
            $meta = get_post_meta( get_the_ID(), 'case_options', true );
        ?>
        <div class="case_stroy">
            <div class="content_title text-center">
                <h2><?php echo get_the_title(); ?></h2>
            </div>
            <div class="row">
                <div class="col-lg-9">
                    <div class="story_text">
                        <?php echo get_the_content(); ?>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="stroy_categories text-center">
                        <h4><?php echo esc_html__('Category','saiful');?></h4>
                        <?php the_category(); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="study_wrapper">
            <div class="row">
                <div class="col-lg-6">
                    <div class="grid_item">
                        <div class="grid_inner_item">
                            <div class="saiful_img">
                                <img src="<?php echo esc_url( $meta['details-one-image']['url'] ); ?>" class="img-fluid" alt="<?php echo esc_attr( $meta['details-one-image']['alt'] ); ?>">
                            </div>
                            <div class="saiful_info text-center">
                                <h4><?php echo esc_html__( $meta['details-one-title'],'saiful' ); ?></h4>
                                 <?php echo wpautop( esc_html__( $meta['details-one-description'] ,'saiful' ) ); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="grid_item">
                        <div class="grid_inner_item">
                            <div class="saiful_img">
                                 <img src="<?php echo esc_url( $meta['details-two-image']['url'] ); ?>" class="img-fluid" alt="<?php echo esc_attr( $meta['details-two-image']['alt'] ); ?>">
                            </div>
                            <div class="saiful_info text-center">
                                <h4><?php echo esc_html__( $meta['details-two-title'],'saiful' ); ?></h4>
                                <?php echo wpautop( esc_html__( $meta['details-two-description'],'saiful' ) ); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="project_details_wrapper">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="single_project_details">
                        <h4><?php echo esc_html__('Client','saiful');?></h4>
                        <p><?php echo esc_html__( $meta['client'],'saiful' ); ?></p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="single_project_details">
                        <h4><?php echo esc_html__('Date & Time','saiful');?></h4>
                        <p><?php echo esc_html__( $meta['date'],'saiful' ); ?></p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="single_project_details">
                        <h4><?php echo esc_html__('Categories','saiful');?></h4>
                        <?php the_category(',');?>
                    </div>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</section>
<!-- End single_case section -->

<?php get_footer();?>