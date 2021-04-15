<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Saiful
 */
// Get options
global $s_options;
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>
<?php
    isset( $s_options['sticky'] ) && $s_options['sticky'] == 1 ? $sticky = 'sticky_control' : $sticky = ''; 
    isset( $s_options['sticky_logo']['url'] ) && !empty( $s_options['sticky_logo']['url'] ) ? $sticky_logo = ' sticky_logo' : $sticky_logo = ''; 
    isset( $s_options['header-transparent'] ) && $s_options['header-transparent'] == 1 ? $transparent = 'header_transparent ' : $transparent = ''; 
?>

<body <?php body_class( $transparent . $sticky . $sticky_logo ); ?>>
    <?php
    wp_body_open();
    if( isset( $s_options['preloader'] ) && $s_options['preloader'] == 1 ){
        ?>
    <!-- Start preloader area -->
    <div class="preloader_area">
        <div class="spinner">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
            <div class="line4"></div>
            <div class="line5"></div>
            <div class="line6"></div>
            <div class="line7"></div>
        </div>
    </div>
    <!-- End preloader area -->  
    <?php
    }
    ?>

    <?php 
       $s_options['header-transparent'] == 1 ? $header_version = 'header_area_1 transparent_header' : $header_version = 'header_area_2';
       
       ?>
    
    <div id="page" class="site">
        <!-- Start header_area -->
        <header class="site-header header_area <?php echo esc_attr( $header_version );?>">
            <div class="container">
                <div class="site_menu">
                    <div class="row align-items-center">
                        <?php
                        if( ! has_custom_logo() ){
                            echo ' <div class="col-lg-3">';
                        }else{
                            echo ' <div class="col-lg-2">';
                        }
                        ?>
                            <div class="site-branding">
                                <div class="brand_logo">
                                <?php
                                if( $s_options['sticky'] == 1 && !empty( $s_options['sticky_logo']['url'] ) ){
                                   echo '<a href="'. home_url().'" class="header_logo"><img src="'.esc_url( $s_options['sticky_logo']['url'] ).'" class="img-fluid" alt="'.esc_attr( $s_options['sticky_logo']['alt'] ).'"></a>'; 
                                
                                   the_custom_logo();
                                }else{
                                   the_custom_logo();
                                   if( ! has_custom_logo() ){
                                        ?>
                                        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                                        <?php
                                    
                                   }
                                }
                                ?>
                                </div>
                            </div><!-- .site-branding -->
                        </div>
                         <?php
                        if( ! has_custom_logo() ){
                            echo ' <div class="col-lg-9">';
                        }else{
                            echo ' <div class="col-lg-10">';
                        }
                        ?>
                            <div class="saiful_menu">
                                <?php 
                                    $args = array(
                                        'theme_location' => 'main-menu',
                                        'container' => 'nav',
                                        'container_class' => 'main_menu',
                                        'depth' => 2,
                                    ); 
                                    wp_nav_menu($args); 
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- mobile menu -->
                <div class="mobile_wrapper">
                    <div class="row align-items-center mobile_header">
                        <div class="col-lg-3 col-md-4 col-6">
                            <div class="brand_logo site-branding">
                                 <?php
                                if( isset( $s_options['sticky_logo'] ) &&  !empty( $s_options['sticky_logo']['url'] ) ){
                                   echo '<a href="'. home_url().'" class="header_logo"><img src="'.esc_url( $s_options['sticky_logo']['url'] ).'" class="img-fluid" alt="'.esc_attr( $s_options['sticky_logo']['alt'] ).'"></a>'; 
                                     the_custom_logo();
                                   
                                }else{
                                    the_custom_logo();
                                }
                                    if( ! has_custom_logo() ){
                                        ?>
                                        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                                        <?php
                                   }
                                 ?>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-8 col-6">
                            <div class="menu_button">
                                <div class="menu_icon">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sidenav_menu">
                        <div class="close_icon">
                            <a href="#" class="close_btn"><i class="fas fa-times"></i></a>
                        </div>
                        <?php 
                            $args = array(
                                'theme_location' => 'main-menu',
                                'menu_class' => 'sidebar-menu',
                                'depth' => 2,
                            ); 
                            wp_nav_menu($args); 
                        ?>
                    </div>
                </div>
                <!-- mobile menu -->
            </div>
        </header><!-- End header_area -->
	<div id="content" class="site-content">
