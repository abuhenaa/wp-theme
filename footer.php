<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Saiful
 */
global $s_options;
?>

	</div><!-- #content -->
    </div>
         <!-- Start saiful_footer area -->
        <footer class="saiful_footer dark_bg">
            <div class="container">
                <div class="footer_top">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="footer_logo">
                               <?php 
                               the_custom_logo();
                               ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="social_link">
                                <ul>
                                    <?php 
                                    if( !empty( $s_options['social_profile'] )){
                                        foreach( $s_options['social_profile'] as $social ){
                                           ?>
                                    
                                        <li><a href="<?php echo esc_url( $social['link'] ); ?>"><i class="<?php echo esc_attr( $social['icon'] ); ?>"></i></a></li>
                                    <?php
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="footer_top_content text-center">
                                <?php 
                                    $args = array(
                                        'theme_location' => 'footer-menu',
                                        'menu_class' => 'footer_menu',
                                        'depth' => 1,
                                    );
                                    wp_nav_menu($args);
                                
                                ?>
                                <?php
                                if( isset( $s_options['address'] ) && !empty( $s_options['address'] )){
                                    echo wpautop( $s_options['address'] );
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer_copyright footer_copyright">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="copyright_text text-center">
                                <?php
                                if( isset( $s_options['copywright'] ) && !empty( $s_options['copywright'] )){
                                    echo wpautop( $s_options['copywright'] );
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
