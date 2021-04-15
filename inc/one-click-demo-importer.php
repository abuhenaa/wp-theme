<?php

/*Code for one click demo importer*/
if ( ! function_exists( 'saiful_import_files' ) ) :
function saiful_import_files() {
    return array(
        array(
            'import_file_name'             => 'Home One',
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'demo/home1/contents.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'demo/home1/widgets.wie',
            'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'demo/home1/customizer.dat',
            'local_import_json' => array(
				array(
                                        'file_path'     => trailingslashit( get_template_directory() ) . 'demo/home1/codestar-options.json',
					'option_name'   => 'saiful_options',
				),
			),
            'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) .'demo/home1/screenshot.png',
            'import_notice'                => esc_html__( 'Please waiting for a few minutes, do not close the window or refresh the page until the data is imported.', 'saiful' ),
        ),
        array(
            'import_file_name'             => 'Home Two',
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'demo/home2/contents.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'demo/home2/widgets.wie',
            'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'demo/home2/customizer.dat',
            'local_import_json' => array(
				array(
                                        'file_path'     => trailingslashit( get_template_directory() ) . 'demo/home2/codestar-options.json',
					'option_name'   => 'saiful_options',
				),
			),
            'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) .'demo/home2/screenshot.png',
            'import_notice'                => esc_html__( 'Please waiting for a few minutes, do not close the window or refresh the page until the data is imported.', 'saiful' ),
        )
        );
}
add_filter( 'pt-ocdi/import_files', 'saiful_import_files' );
endif;

if ( ! function_exists( 'saiful_after_import' ) ) :
function saiful_after_import( $selected_import ) {

    if ( 'Home One' === $selected_import['import_file_name'] ) {
        //Set Menu
        $main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );
        $footer_menu = get_term_by( 'name', 'Footer Menu', 'nav_menu' );
        set_theme_mod( 'nav_menu_locations' , array( 
              'main-menu' => $main_menu->term_id,
              'footer-menu' => $footer_menu->term_id,
             ) 
        );

       //Set Front page
       $page = get_page_by_title( 'Home One' );
       if ( isset( $page->ID ) ) {
        update_option( 'page_on_front', $page->ID );
        update_option( 'show_on_front', 'page' );
       }
    }else if ( 'Home Two' === $selected_import['import_file_name'] ) {
        //Set Menu
        $main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );
        $footer_menu = get_term_by( 'name', 'Footer Menu', 'nav_menu' );
        set_theme_mod( 'nav_menu_locations' , array( 
              'main-menu' => $main_menu->term_id,
              'footer-menu' => $footer_menu->term_id,
             ) 
        );
       //Set Front page
       $page = get_page_by_title( 'Home Two' );
       if ( isset( $page->ID ) ) {
        update_option( 'page_on_front', $page->ID );
        update_option( 'show_on_front', 'page' );
       }
    }
    
    $blog = get_page_by_title( 'Blog' );
    if( isset( $blog->ID ) ){
        update_option( 'page_for_posts', $blog->ID );
    }
    
}
add_action( 'pt-ocdi/after_import', 'saiful_after_import' );
endif;

/**
 * Adding local_import_json and import_json param supports.
 */
if ( ! function_exists( 'saiful_after_content_import_execution' ) ) {
  function saiful_after_content_import_execution( $selected_import_files, $import_files, $selected_index ) {

    $downloader = new OCDI\Downloader();

    if( ! empty( $import_files[$selected_index]['import_json'] ) ) {

      foreach( $import_files[$selected_index]['import_json'] as $index => $import ) {
        $file_path = $downloader->download_file( $import['file_url'], 'demo-import-file-'. $index .'-'. date( 'Y-m-d__H-i-s' ) .'.json' );
        $file_raw  = OCDI\Helpers::data_from_file( $file_path );
        update_option( $import['option_name'], json_decode( $file_raw, true ) );
      }

    } else if( ! empty( $import_files[$selected_index]['local_import_json'] ) ) {

      foreach( $import_files[$selected_index]['local_import_json'] as $index => $import ) {
        $file_path = $import['file_path'];
        $file_raw  = OCDI\Helpers::data_from_file( $file_path );
        update_option( $import['option_name'], json_decode( $file_raw, true ) );
      }

    }

  }
  add_action('pt-ocdi/after_content_import_execution', 'saiful_after_content_import_execution', 3, 99 );
}