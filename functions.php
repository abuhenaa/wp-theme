<?php
/**
 * Saiful functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Saiful
 */
if ( ! function_exists( 'saiful_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function saiful_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Saiful, use a find and replace
		 * to change 'saiful' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'saiful', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
                set_post_thumbnail_size( 370, 290, array( 'center', 'center')  );
                
		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'main-menu' => esc_html__( 'Main Menu', 'saiful' ),
			'footer-menu' => esc_html__( 'Footer Menu', 'saiful' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'saiful_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 220,
			'width'       => 50,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'saiful_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function saiful_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'saiful_content_width', 640 );
}
add_action( 'after_setup_theme', 'saiful_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function saiful_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'saiful' ),
		'id'            => 'sidebar-main',
		'description'   => esc_html__( 'Add widgets here.', 'saiful' ),
		'before_widget' => '<section id="%1$s" class="sidebar_widget_box widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'saiful_widgets_init' );
/**
 * Registers an editor stylesheet for the theme.
 */
function saiful_theme_add_editor_styles() {
    add_editor_style( 'assets/css/custom-editor-style.css' );
}
add_action( 'admin_init', 'saiful_theme_add_editor_styles' );

/**
 * Enqueue scripts and styles.
 */
function saiful_scripts() {
        /*Enqueue Styles*/
        wp_enqueue_style( 'google-fonts',"https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,800|Rubik:400,500,700&display=swap",array(), '1.0', 'all' );
        wp_enqueue_style( 'bootstrap', get_template_directory_uri() . "/assets/plugin/bootstrap/css/bootstrap.min.css",array(), '4.0.4', 'all' );
        wp_enqueue_style( 'fontawesome', get_template_directory_uri() . "/assets/fonts/fontawesome/css/all.css",array(), '5.0', 'all' );
        wp_enqueue_style( 'flaticon', get_template_directory_uri() . "/assets/fonts/flaticon/flaticon.css",array(), '1.0', 'all' );
        wp_enqueue_style( 'slick', get_template_directory_uri() . "/assets/plugin/slick/slick.css",array(), '1.0', 'all' );
        wp_enqueue_style( 'slick-theme', get_template_directory_uri() . "/assets/plugin/slick/slick-theme.css",array(), '1.0', 'all' );
        wp_enqueue_style( 'magnific-popup', get_template_directory_uri() . "/assets/plugin/magnific/magnific-popup.css",array(), '1.0', 'all' );
        wp_enqueue_style( 'sidebar-menu', get_template_directory_uri() . "/assets/plugin/sidebar-menu/sidebar-menu.css",array(), '1.0', 'all' );
        wp_enqueue_style( 'animate', get_template_directory_uri() . "/assets/css/animate.css",array(), '1.0', 'all' );
        wp_enqueue_style( 'saiful-style', get_stylesheet_uri() );
        wp_enqueue_style( 'main-style', get_template_directory_uri() . "/assets/css/style.css",array(), '1.0', 'all' );
        wp_enqueue_style( 'saiful-responsive', get_template_directory_uri() . "/assets/css/responsive.css",array(), '1.0', 'all' );
        
        /*Enqueue Scripts*/
        wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/assets/js/vendor/modernizr-3.6.0.min.js', array( 'jquery' ), '3.6.0', true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/plugin/bootstrap/js/bootstrap.min.js', array( 'jquery' ), '3.6.0', true );
	wp_enqueue_script( 'popper', get_template_directory_uri() . '/assets/plugin/bootstrap/js/popper.min.js', array( 'jquery' ), '3.6.0', true );
	wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/plugin/slick/slick.min.js', array( 'jquery' ), '3.6.0', true );
	wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/assets/plugin/magnific/jquery.magnific-popup.min.js', array( 'jquery' ), '3.6.0', true );
	wp_enqueue_script( 'isotope', get_template_directory_uri() . '/assets/plugin/isotope/isotope.min.js', array( 'jquery' ), '3.6.0', true );
	wp_enqueue_script( 'imagesloaded', get_template_directory_uri() . '/assets/plugin/imagesloaded/imagesloaded.min.js', array( 'jquery' ), '3.6.0', true );
	wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/assets/plugin/counterup/jquery.waypoints.min.js', array( 'jquery' ), '3.6.0', true );
	wp_enqueue_script( 'counterup', get_template_directory_uri() . '/assets/plugin/counterup/jquery.counterup.min.js', array( 'jquery' ), '3.6.0', true );
	wp_enqueue_script( 'sidebar-menu', get_template_directory_uri() . '/assets/plugin/sidebar-menu/sidebar-menu.js', array( 'jquery' ), '3.6.0', true );
	wp_enqueue_script( 'wow', get_template_directory_uri() . '/assets/js/wow.min.js', array( 'jquery' ), '3.6.0', true );
	wp_enqueue_script( 'custom', get_template_directory_uri() . '/assets/js/custom.js', array( 'jquery' ), '1.0.0', true );
	wp_enqueue_script( 'saiful-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'saiful-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
        
        //adding custom js code from theme options       
        global $s_options;
        $custom_js = $s_options['custom_js'];
        wp_add_inline_script('custom', $custom_js, 'after');
}
add_action( 'wp_enqueue_scripts', 'saiful_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/*
 * Including One Click Demo Import Functions one-click-demo-importer
 */
require get_template_directory() . '/inc/one-click-demo-importer.php';

/*
 * FA5 Integrate
 */
require get_template_directory() . '/inc/fa5-integrate.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

//TGM integration
require_once get_template_directory() . '/tgm/saiful-required-plugin.php';
/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

//define excerpt length
function saiful_custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'saiful_custom_excerpt_length', 999 );

// Include saiful comments template
require_once get_parent_theme_file_path( '/inc/saiful-comments.php' );

include_once get_parent_theme_file_path( '/inc/cs-framework.php' );

//add custom style from the theme option
add_action('wp_head', 'saiful_custom_styles', 100);
function saiful_custom_styles()
{
    global $s_options;
    echo "<style>".esc_html( $s_options['custom_css'] )."</style>";
}
