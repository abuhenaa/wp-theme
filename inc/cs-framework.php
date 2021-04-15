<?php

//CS Framework options include
if (class_exists('CSF')) {
    // Set a unique slug-like ID
    $prefix = 'saiful_options';
    // Create options
    CSF::createOptions($prefix, array(
        'menu_title' => esc_html__( 'Theme Options','saiful' ),
        'menu_slug' => 'saiful-options',
        'menu_position' => 58,
        'framework_title' => esc_html__( 'Saiful Options','saiful' ),
    ));
    // Create a section
    CSF::createSection($prefix, array(
        'title' => 'General',
        'fields' => array(
            // A text field
             array(
                'id' => 'preloader',
                'type' => 'switcher',
                'title' => esc_html__( 'Website Preloader','saiful' ),
                'subtitle' => esc_html__('Enable/Disable Preloader of your website','saiful'),
            ),
            array(
                'id' => 'sticky',
                'type' => 'switcher',
                'title' => 'Sticky Header',
                'subtitle' => esc_html__('Enable if you want sticky header','saiful'),
            ),
            array(
                'id' => 'sticky_logo',
                'type' => 'media',
                'title' => 'Sticky Header Logo',
                'dependency' => array( 'sticky', '==', true ),
                'subtitle' => esc_html__( 'Upload your sticky header logo','saiful' ),
            ),
            array(
                'id' => 'header-transparent',
                'type' => 'switcher',
                'title' => 'Header Transparent',
                'subtitle' => esc_html__('Make the header transparent','saiful'),
            ),
           
        ),
    ));
    // Create a section
    CSF::createSection($prefix, array(
        'title' => 'Typography',
        'fields' => array(
            // A typography field
             array(
                'id' => 'body_font',
                'type' => 'typography',
                'title' => 'Body Font',
                'subtitle' => esc_html__('Change Body Font','saiful'),
                'font_family' => 'Rubik, sans-serif',
                'output' => 'body',
                'line-height' => 26,
            ),
           
        )
    ));
     // Create a section
    CSF::createSection($prefix, array(
        'title' => esc_html__( 'Blog', 'saiful' ),
        'fields' => array(
            // A typography field
             array(
                'id' => 'blog',
                'type' => 'switcher',
                'title' => esc_html__('Show Author Box in Single Post','saiful'),
                 'default' => 'no',
                 
            ),
           
        )
    ));

    // Create a section
    CSF::createSection($prefix, array(
        'title' => 'Social',
        'fields' => array(
            array(
                'id' => 'social_profile',
                'type' => 'repeater',
                'title' => esc_html__('Social Icons','saiful'),
                'fields' => array(
                    array(
                        'id' => 'social_name',
                        'type' => 'text',
                        'title' => esc_html__('Social Name','saiful'),
                    ),
                    array(
                        'id' => 'link',
                        'type' => 'text',
                        'title' => esc_html__('Profile Link','saiful'),
                    ),
                    array(
                        'id' => 'icon',
                        'type' => 'icon',
                        'title' => esc_html__('Icon','saiful'),
                    ),
                ),
            ),
        )
    ));
    // Footer section
    CSF::createSection($prefix, array(
        'title' => 'Footer',
        'fields' => array(
            // A textarea field
            array(
                'id' => 'address',
                'type' => 'textarea',
                'title' => esc_html__('Footer Address','saiful'),
            ),
            array(
                'id' => 'copywright',
                'type' => 'textarea',
                'title' => esc_html__('Footer Copy Wright Information','saiful'),
            ),
            array(
                'id' => 'footer_bg',
                'type' => 'background',
                'background_color' => true,
                'title' => esc_html__('Footer Background','saiful'),
                'output' => '.saiful_footer.dark_bg',
            ),
        )
    ));

    // Create a section
    CSF::createSection($prefix, array(
        'title' => 'Advanced',
        'fields' => array(
            array(
                'id' => 'custom_css',
                'type' => 'code_editor',
                'title' => esc_html__('Write Custom CSS Code','saiful'),
                'subtitle' => esc_html__('No need to add style tag','saiful'),
                'settings' => array(
                'mode' => 'css',
                'theme' => 'ambiance',
                 ),
            ),
            array(
                'id' => 'custom_js',
                'type' => 'code_editor',
                'title' => esc_html__('Write Custom JavaScript Code','saiful'),
                'subtitle' => esc_html__('No need to add script tag','saiful'),
                 'settings' => array(
                'mode' => 'js',
                'theme' => 'monokai',
                     ),
            ),
        ),
    ));
    CSF::createSection($prefix, array(
        'title' => esc_html__('Export/Import','saiful' ),
        'fields' => array(
            // A textarea field
            array(
                'id' => 'export-import',
                'type' => 'backup',
                'title' => esc_html__('Export or Import all the settings','saiful'),
            ),
        )
    ));
}
$s_options = get_option('saiful_options');

// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

  //
  // Set a unique slug-like ID
  $prefix = 'case_options';

  //
  // Create a metabox
  CSF::createMetabox( $prefix, array(
    'title'     => 'Case Details Options',
    'post_type' => 'page',
    'page_templates' => 'case-details.php',
  ) );

  // Create a section
  CSF::createSection( $prefix, array(
    'title'  => esc_html__( 'Topic One Details( For The Left Section )','saiful' ),
    'fields' => array(
      array(
        'id'    => 'details-one-image',
        'type'  => 'media',
        'title' => esc_html__( 'Topic One Image','saiful' ),
      ),
      array(
        'id'    => 'details-one-title',
        'type'  => 'text',
        'title' => esc_html__( 'Topic One Title','saiful' ),
      ),
      array(
        'id'    => 'details-one-description',
        'type'  => 'textarea',
        'title' => esc_html__( 'Topic One Description','saiful' ),
      ),
    )
  ) );
  // Create a section
  CSF::createSection( $prefix, array(
    'title'  => esc_html__( 'Topic Two Details( For The Right Section )','saiful' ),
    'fields' => array(
      array(
        'id'    => 'details-two-image',
        'type'  => 'media',
        'title' => esc_html__( 'Topic Two Image','saiful' ),
      ),
      array(
        'id'    => 'details-two-title',
        'type'  => 'text',
        'title' => esc_html__( 'Topic Two Title','saiful' ),
      ), 
      array(
        'id'    => 'details-two-description',
        'type'  => 'textarea',
        'title' => esc_html__( 'Topic Two Description','saiful' ),
      ),
    )
  ) );
  // Create a section
  CSF::createSection( $prefix, array(
    'title'  => esc_html__( 'Others','saiful' ),
    'fields' => array(
      array(
        'id'    => 'client',
        'type'  => 'text',
        'title' => esc_html__( 'Client','saiful' ),
      ),
      array(
        'id'    => 'date',
        'type'  => 'date',
        'title' => esc_html__( 'Date','saiful' ),
      ),
    )
  ) );

 add_filter( 'csf_welcome_page', '__return_false' ); 
}
