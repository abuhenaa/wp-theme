<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Saiful
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function saiful_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-main' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'saiful_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function saiful_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'saiful_pingback_header' );

function saiful_page_settings() {  
    // Add category metabox to page
    register_taxonomy_for_object_type('category', 'page');  
}
add_action( 'init', 'saiful_page_settings' );

/*
 * The Post navigation
 */
function saiful_numeric_posts_nav() {
 
    if( is_singular() )
        return;
 
    global $wp_query;
 
    /* Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;
 
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );
 
    /* Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;
 
    /* Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
 
    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }
 
    echo '<div class="saiful_pagination text-center"><ul>' . "\n";
 
    /* Previous Post Link */
    if ( get_previous_posts_link() )
        printf( '<li>%s</li>' . "\n", get_previous_posts_link('&laquo;') );
 
    /* Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active"' : '';
 
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
 
        if ( ! in_array( 2, $links ) )
            echo '<li>…</li>';
    }
 
    /* Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }
 
    /* Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li>…</li>' . "\n";
 
        $class = $paged == $max ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }
 
    /* Next Post Link */
    if ( get_next_posts_link() )
        printf( '<li>%s</li>' . "\n", get_next_posts_link('&raquo;') );
 
    echo '</ul></div>' . "\n";
 
}


/**
 * Generate Breadcrumbs
 * @author Saiful
 */
function get_saiful_breadcrumb() {
    ?>
    <!-- Start saiful_breadcrumb section -->
    <section class="saiful_breadcrumb bg_image" style="background-image: url(<?php echo get_the_post_thumbnail_url( get_the_ID(),'full' );?>);">
        <div class="saiful_overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_content text-center">
                        <h2>
                            <?php
                            if(is_front_page()){
                                echo get_the_title();
                            }else{
                                wp_title('');
                            }
                            
                            ?>
                        </h2>
                        <ul>
                        <?php
                            echo '<li><a href="'.home_url().'" rel="nofollow">'.esc_html__( 'Home','saiful' ).'</a></li>';
                            if ( is_category() || is_single() ) {
                                echo "<li>";
                                the_category(' &bull; ');
                                echo "</li>";
                                    if ( is_single() ) {
                                        echo "<li>";
                                        echo get_the_title();
                                        echo "</li>";
                                    }
                            } elseif ( is_page() || is_home() ) {
                                echo "<li>";
                                echo get_the_title();
                                echo "</li>";
                            } elseif ( is_search() ) {
                                echo "<li>";
                                echo "&nbsp;&nbsp;".esc_html__( 'Search Results for...','saiful' )."";
                                
                                    echo '"<em>';
                                    echo the_search_query();
                                    echo '</em>"';
                                echo "</li>";
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End saiful_breadcrumb section -->                             
   <?php 
}

