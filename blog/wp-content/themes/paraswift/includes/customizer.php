<?php
/**
 * Paraswift Theme Customizer
 *
 * @package Paraswift
 */

/**
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
if ( ! function_exists( 'paraswift_customize_register' ) ) :
function paraswift_customize_register( $wp_customize ) {
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';


  //Panel for Section
  $wp_customize->add_panel( 'theme_section', array(
    'priority'       => 4,
    'capability'     => 'edit_theme_options',
    'title'      => __('Theme Sections', 'paraswift'),
  ) );



  //Panel for Typography
  $wp_customize->add_panel( 'theme_typography', array(
    'priority'       => 5,
    'capability'     => 'edit_theme_options',
    'title'      => __('Typography', 'paraswift'),
  ) );


   // Small text for top bar
   $wp_customize->add_section('paraswift_topbar', array(
      'title' => __('Topbar Setting', 'paraswift'),
      'panel' => 'theme_section',
      'priority' => 1
  ));

  // topbar status
  $wp_customize->add_setting( 'topbar_status', array(
      'default'        => '',
      'sanitize_callback' => 'paraswift_sanitize_checkbox'
  ) );
  $wp_customize->add_control( 'topbar_status', array(
      'label'   => __( 'Enable Topbar', 'paraswift' ),
      'section' => 'paraswift_topbar',
      'settings' => 'topbar_status',
      'type'    => 'checkbox',
          'choices' => array( '1' => __( 'Enable', 'paraswift' )
      ),
     'priority'       => 1,
  ));
  $wp_customize->add_setting('topbar_info', array(
      'default' => __('Call Us: 12388303098 | info@yourtheme.com ', 'paraswift'),
      'sanitize_callback' => 'paraswift_sanitize_text'
  ));
   $wp_customize->add_control( 'topbar_info', array(
      'label'   => __( 'Topbar Small Information', 'paraswift' ),
      'section' => 'paraswift_topbar',
      'settings'   => 'topbar_info',
      'type'     => 'text',
      'priority' => 2    
  ));
  $wp_customize->add_panel( 'theme_social', array(
      'priority'       => 3,
      'capability'     => 'edit_theme_options',
      'title'      => __('Social Media', 'paraswift'),
  ) );



  //Add Section for Typography 
  $wp_customize->add_section('paraswift_font_size', array(
      'title' => __('Font Size Setting', 'paraswift'),
      'panel' =>'theme_typography',
      'priority' => 3
  ));


  // font size for body
  $wp_customize->add_setting('body_font_size', array(
      'default' => 15,
      'sanitize_callback' => 'paraswift_sanitize_text'
  ));
   $wp_customize->add_control( 'body_font_size', array(
      'label'   => __( 'Body Text Size', 'paraswift' ),
      'section' => 'paraswift_font_size',
      'settings'   => 'body_font_size',
      'type'     => 'text',
      'priority' => 1     
  ));



  // font size for h1
  $wp_customize->add_setting('h1_font_size', array(
      'default' => 40,
      'sanitize_callback' => 'paraswift_sanitize_text'
  ));
   $wp_customize->add_control( 'h1_font_size', array(
      'label'   => __( 'H1 Text Size', 'paraswift' ),
      'section' => 'paraswift_font_size',
      'settings'   => 'h1_font_size',
      'type'     => 'text',
      'priority' => 2
  ));



   // font size for h2
  $wp_customize->add_setting('h2_font_size', array(
      'default' => 32,
      'sanitize_callback' => 'paraswift_sanitize_text'
  ));
   $wp_customize->add_control( 'h2_font_size', array(
      'label'   => __( 'H2 Text Size', 'paraswift' ),
      'section' => 'paraswift_font_size',
      'settings'   => 'h2_font_size',
      'type'     => 'text',
      'priority' => 3
  ));



    // font size for h3
  $wp_customize->add_setting('h3_font_size', array(
      'default' => 25,
      'sanitize_callback' => 'paraswift_sanitize_text'
  ));
   $wp_customize->add_control( 'h3_font_size', array(
      'label'   => __( 'H3 Text Size', 'paraswift' ),
      'section' => 'paraswift_font_size',
      'settings'   => 'h3_font_size',
      'type'     => 'text',
      'priority' => 4
  ));



  // font size for foter widget titile
  $wp_customize->add_setting('pfwt_font_size', array(
      'default' => 25,
      'sanitize_callback' => 'paraswift_sanitize_text'
  ));
   $wp_customize->add_control( 'pfwt_font_size', array(
      'label'   => __( 'Footer Widget Title Text Size', 'paraswift' ),
      'section' => 'paraswift_font_size',
      'settings'   => 'pfwt_font_size',
      'type'     => 'text',
      'priority' => 5
  ));



   // font size for sidebar widget titile
  $wp_customize->add_setting('pswt_font_size', array(
      'default' => 25,
      'sanitize_callback' => 'paraswift_sanitize_text'
  ));
   $wp_customize->add_control( 'pswt_font_size', array(
      'label'   => __( 'Sidebar Widget Title Text Size', 'paraswift' ),
      'section' => 'paraswift_font_size',
      'settings'   => 'pswt_font_size',
      'type'     => 'text',
      'priority' => 5
  ));



   //Panel for Colors
  $wp_customize->add_panel( 'theme_color_setting', array(
      'priority'       => 3,
      'capability'     => 'edit_theme_options',
      'title'      => __('Theme Colors', 'paraswift'),
  ) );



  //Add Section for Backgrounds Colors 
  $wp_customize->add_section('paraswift_bg', array(
      'title' => __('Primary Color for theme', 'paraswift'),
      'panel' => 'theme_color_setting',
      'priority' => 5
  ));


  // Theme Primary Colors 
  $wp_customize->add_setting( 'theme_primary_color', array(
      'default'        => '#3cb5d0',
      'sanitize_callback' => 'paraswift_sanitize_hex_color',
  ) );

  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'theme_primary_color', array(
      'label'   => __( 'Choose Primary Color', 'paraswift' ),
      'section' => 'paraswift_bg',
      'settings'   => 'theme_primary_color',
      'priority' => 1
  ) ) );



  // Theme Primary Colors 
  $wp_customize->add_setting( 'theme_primary_hover_color', array(
      'default'        => '#29a9c6',
      'sanitize_callback' => 'paraswift_sanitize_hex_color'
  ) );

  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'theme_primary_hover_color', array(
      'label'   => __( 'Choose Primary Hove Color', 'paraswift' ),
      'section' => 'paraswift_bg',
      'settings'   => 'theme_primary_hover_color',
      'priority' => 1,      
  ) ) );



  //Add Section for Front About  Section
  $wp_customize->add_section('paraswift_about', array(
      'title' => __('About Section', 'paraswift'),
      'panel' => 'theme_section',
      'priority' => 2
  ));


  // topbar status
  $wp_customize->add_setting( 'about_status', array(
      'default'        => '',
      'sanitize_callback' => 'paraswift_sanitize_checkbox'
  ) );
  $wp_customize->add_control( 'about_status', array(
      'label'   => __( 'Enable About Section', 'paraswift' ),
      'section' => 'paraswift_about',
      'settings' => 'about_status',
      'type'    => 'checkbox',
          'choices' => array( '1' => __( 'Enable', 'paraswift' )
      ),
     'priority'       => 1,  
  ));

  $wp_customize->add_setting( 'about_page', array(
        'default' => '',
        'sanitize_callback' =>'absint'
        ));
      $wp_customize->add_control( 'about_page', array(
          'label'    => __( 'Select Page ', 'paraswift' ),
          'section'  => 'paraswift_about',
          'type'     => 'dropdown-pages',
          'setting' => 'about_page'
      ) );
  

   // About button text
  $wp_customize->add_setting( 'about_button_text', array(
      'default'        => __('Read More', 'paraswift'),
      'sanitize_callback' => 'paraswift_sanitize_textarea'
  ) );
  $wp_customize->add_control( 'about_button_text', array(
      'label'   => __( 'About Button Text', 'paraswift' ),
      'section' => 'paraswift_about',
      'settings'   => 'about_button_text',
      'type'     => 'text',
      'priority' => 4
  ));



  // CTA button link
  $wp_customize->add_setting( 'about_button_link', array(
      'default'        =>'#',
      'sanitize_callback' => 'paraswift_sanitize_url'
  ) );
  $wp_customize->add_control( 'about_button_link', array(
      'label'   => __( 'About Button Link', 'paraswift' ),
      'description' => __('Example: www.something.com', 'paraswift'),
      'section' => 'paraswift_about',
      'settings'   => 'about_button_link',
      'type'     => 'text',
      'priority' => 5
  ));



  //Add Section for Front Page CTA Section
  $wp_customize->add_section('paraswift_cta', array(
      'title' => __('Announcement CTA', 'paraswift'),
      'panel' =>'theme_section',
      'priority' => 1
  ));



   // CTA status
  $wp_customize->add_setting( 'cta_status', array(
      'default'        => '',
      'sanitize_callback' => 'paraswift_sanitize_checkbox'
  ) );
  $wp_customize->add_control( 'cta_status', array(
        'label'   => __( 'Enable CTA', 'paraswift' ),
        'section' => 'paraswift_cta',
        'settings' => 'cta_status',
        'type'    => 'checkbox',
            'choices' => array( '1' => __( 'Enable', 'paraswift' )
        ),
       'priority'       => 1
  ));
  $wp_customize->add_control( 'cta_title', array(
      'label'   => __( 'CTA Title', 'paraswift' ),
      'section' => 'paraswift_cta',
      'settings'   => 'cta_title',
      'type'     => 'text',
      'priority' => 2
  ));



  // CTA Title
  $wp_customize->add_setting( 'cta_title', array(
      'default'        => __('CTA Title', 'paraswift'),
      'sanitize_callback' => 'paraswift_sanitize_textarea'
  ) );
  $wp_customize->add_control( 'cta_title', array(
      'label'   => __( 'CTA Title', 'paraswift' ),
      'section' => 'paraswift_cta',
      'settings'   => 'cta_title',
      'type'     => 'text',
      'priority' => 2
  ));


  //CTA Description
  $wp_customize->add_setting( 'cta_content', array(
      'default'        => __('Insert  Short Description here', 'paraswift'),
      'sanitize_callback' => 'paraswift_sanitize_textarea'
  ) );
  $wp_customize->add_control( 'cta_content', array(
      'label'   => __( 'Short Description', 'paraswift' ),
      'section' => 'paraswift_cta',
      'settings'   => 'cta_content',
      'type'     => 'textarea',
      'priority' => 3
  ));


  // CTA button text
  $wp_customize->add_setting( 'cta_button_text', array(
      'default'        => __('Sign Up', 'paraswift'),
      'sanitize_callback' => 'paraswift_sanitize_textarea'
  ) );
  $wp_customize->add_control( 'cta_button_text', array(
      'label'   => __( 'CTA Description', 'paraswift' ),
      'section' => 'paraswift_cta',
      'settings'   => 'cta_button_text',
      'type'     => 'text',
      'priority' => 4
  ));


  // CTA button link
  $wp_customize->add_setting( 'cta_button_link', array(
      'default'        =>'#',
      'sanitize_callback' => 'paraswift_sanitize_url'
  ) );
  $wp_customize->add_control( 'cta_button_link', array(
      'label'   => __( 'CTA Button Link', 'paraswift' ),
      'description' => __('Example: www.something.com', 'paraswift'),
      'section' => 'paraswift_cta',
      'settings'   => 'cta_button_link',
      'type'     => 'text',
      'priority' => 5
  ));



  //Add Section for Social Icons
  $wp_customize->add_section('paraswift_social', array(
      'title' => __('Social Icons', 'paraswift'),
      'panel' => 'theme_social',
      'priority' => 1
  ));
  //Facebook Link
  $wp_customize->add_setting( 'facebook_link', array(
      'default'        => '',
      'sanitize_callback' => 'paraswift_sanitize_url'
  ) );
  $wp_customize->add_control( 'facebook_link', array(
      'label'   => __( 'Facebook Link URL', 'paraswift' ),
      'section' => 'paraswift_social',
      'settings'   => 'facebook_link',
      'type'     => 'text',
      'priority' => 1
  ));



  // Twitter Link
  $wp_customize->add_setting( 'twitter_link', array(
      'default'        => '',
      'sanitize_callback' => 'paraswift_sanitize_url'
  ) );
  $wp_customize->add_control( 'twitter_link', array(
      'label'   => __( 'Twitter Link URL', 'paraswift' ),
      'section' => 'paraswift_social',
      'settings'   => 'twitter_link',
      'type'     => 'text',
      'priority' => 2
  ));


  // Linkedin Link
  $wp_customize->add_setting( 'linkedin_link', array(
      'default'        => '',
      'sanitize_callback' => 'paraswift_sanitize_url'
  ) );
  $wp_customize->add_control( 'linkedin_link', array(
      'label'   => __( 'Linkedin Link URL', 'paraswift' ),
      'section' => 'paraswift_social',
      'settings'   => 'linkedin_link',
      'type'     => 'text',
      'priority' => 3
  ));



  // Google Plus Link
  $wp_customize->add_setting( 'gplus_link', array(
      'default'        => '',
      'sanitize_callback' => 'paraswift_sanitize_url'
  ) );
  $wp_customize->add_control( 'gplus_link', array(
        'label'   => __( 'Google+ Link URL', 'paraswift' ),
        'section' => 'paraswift_social',
        'settings'   => 'gplus_link',
        'type'     => 'text',
        'priority' => 4
  ));



  // Pinterest Link
  $wp_customize->add_setting( 'pinterest_link', array(
      'default'        => '',
      'sanitize_callback' => 'paraswift_sanitize_url'
  ) );
  $wp_customize->add_control( 'pinterest_link', array(
      'label'   => __( 'Pinterest Link URL', 'paraswift' ),
      'section' => 'paraswift_social',
      'settings'   => 'pinterest_link',
      'type'     => 'text',
      'priority' => 5
  ));


  // Youtube Link
  $wp_customize->add_setting( 'ytube_link', array(
      'default'        => '',
      'sanitize_callback' => 'paraswift_sanitize_url'
  ) );
  $wp_customize->add_control( 'ytube_link', array(
      'label'   => __( 'Youtube Link URL', 'paraswift' ),
      'section' => 'paraswift_social',
      'settings'   => 'ytube_link',
      'type'     => 'text',
      'priority' => 6
  ));


  // Flickr Link
  $wp_customize->add_setting( 'flickr_link', array(
      'default'        => '',
      'sanitize_callback' => 'paraswift_sanitize_url'
  ) );
  $wp_customize->add_control( 'flickr_link', array(
      'label'   => __( 'Flickr Link URL', 'paraswift' ),
      'section' => 'paraswift_social',
      'settings'   => 'flickr_link',
      'type'     => 'text',
      'priority' => 7
  ));


  // Tumblr Link
  $wp_customize->add_setting( 'tumblr_link', array(
      'default'        => '',
      'sanitize_callback' => 'paraswift_sanitize_url'
  ) );
  $wp_customize->add_control( 'tumblr_link', array(
      'label'   => __( 'Tumblr Link URL', 'paraswift' ),
      'section' => 'paraswift_social',
      'settings'   => 'tumblr_link',
      'type'     => 'text',
      'priority' => 8
  ));


  // Instagram Link
  $wp_customize->add_setting( 'instagram_link', array(
      'default'        => '',
      'sanitize_callback' => 'paraswift_sanitize_url'
  ) );
  $wp_customize->add_control( 'instagram_link', array(
      'label'   => __( 'Instagram Link URL', 'paraswift' ),
      'section' => 'paraswift_social',
      'settings'   => 'instagram_link',
      'type'     => 'text',
      'priority' => 9
  ));


  // Dribbble Link
  $wp_customize->add_setting( 'dribbble_link', array(
      'default'        => '',
      'sanitize_callback' => 'paraswift_sanitize_url'
  ) );
  $wp_customize->add_control( 'dribbble_link', array(
      'label'   => __( 'Dribbble Link URL', 'paraswift' ),
      'section' => 'paraswift_social',
      'settings'   => 'dribbble_link',
      'type'     => 'text',
      'priority' => 10
  ));


  // Reddit Link
  $wp_customize->add_setting( 'reddit_link', array(
      'default'        => '',
      'sanitize_callback' => 'paraswift_sanitize_url'
  ) );
  $wp_customize->add_control( 'reddit_link', array(
      'label'   => __( 'Reddit Link URL', 'paraswift' ),
      'section' => 'paraswift_social',
      'settings'   => 'reddit_link',
      'type'     => 'text',
      'priority' => 11
  ));



  // Github Link
  $wp_customize->add_setting( 'git_link', array(
      'default'        => '',
      'sanitize_callback' => 'paraswift_sanitize_url'
  ) );
  $wp_customize->add_control( 'git_link', array(
      'label'   => __( 'Github Link URL', 'paraswift' ),
      'section' => 'paraswift_social',
      'settings'   => 'git_link',
      'type'     => 'text',
      'priority' => 12
  ));


  // Stumbleupon Link
  $wp_customize->add_setting( 'stumble_link', array(
      'default'        => '',
      'sanitize_callback' => 'paraswift_sanitize_url'
  ) );
  $wp_customize->add_control( 'stumble_link', array(
      'label'   => __( 'StumbleUpon Link URL', 'paraswift' ),
      'section' => 'paraswift_social',
      'settings'   => 'stumble_link',
      'type'     => 'text',
      'priority' => 13
  ));



  //Add Section for service  Section
  $wp_customize->add_section('paraswift_service', array(
      'title' => __('Service Section', 'paraswift'),
      'panel' => 'theme_section',
      'priority' => 2
  ));
  // Service status
  $wp_customize->add_setting( 'service_status', array(
      'default'        => '',
      'sanitize_callback' => 'paraswift_sanitize_checkbox'
  ) );
  $wp_customize->add_control( 'service_status', array(
      'label'   => __( 'Enable Service', 'paraswift' ),
      'section' => 'paraswift_service',
      'settings' => 'service_status',
      'type'    => 'checkbox',
          'choices' => array( '1' => __( 'Enable', 'paraswift' )
      ),
     'priority'       => 1
  ));



  // Service Heading
  $wp_customize->add_setting( 'service_header_text', array(
      'default'        => '',
      'sanitize_callback' => 'paraswift_sanitize_text'
  ) );
  $wp_customize->add_control( 'service_header_text', array(
      'label'   => __( 'Service Header Text', 'paraswift' ),
      'section' => 'paraswift_service',
      'settings'   => 'service_header_text',
      'type'     => 'text',
      'priority' => 1
  ));



  // Service Heading
  $wp_customize->add_setting( 'service_header_short', array(
      'default'        => '',
      'sanitize_callback' => 'paraswift_sanitize_text'
  ) );
  $wp_customize->add_control( 'service_header_short', array(
      'label'   => __( 'Service Header Short Description', 'paraswift' ),
      'section' => 'paraswift_service',
      'settings'   => 'service_header_short',
      'type'     => 'textarea',
      'priority' => 2
  ));

  for($count = 1; $count <=3; $count++) {
      $wp_customize->add_setting( 'service_page'.$count, array(
        'default' => '',
        'sanitize_callback' =>'absint'
        ));
      $wp_customize->add_control( 'service_page'.$count, array(
          'label'    => __( 'Select Page ', 'paraswift' ),
          'section'  => 'paraswift_service',
          'type'     => 'dropdown-pages',
          'setting' => 'service_page'.$count
        ) );
    }


  //Add Section for Front About  Section
  $wp_customize->add_section('paraswift_blog', array(
      'title' => __('Blog Section', 'paraswift'),
      'panel' => 'theme_section',
      'priority' => 5
  ));


  // About Title
  $wp_customize->add_setting( 'blog_title', array(
      'default'        => '',
      'sanitize_callback' => 'paraswift_sanitize_text'
  ) );
  $wp_customize->add_control( 'blog_title', array(
      'label'   => __( 'Blog Title', 'paraswift' ),
      'section' => 'paraswift_blog',
      'settings'   => 'blog_title',
      'type'     => 'text',
      'priority' => 1  
  ));



  //About Description
  $wp_customize->add_setting( 'blog_short_desctiption', array(
      'default'        => '',
      'sanitize_callback' => 'paraswift_sanitize_textarea'
  ) );

  $wp_customize->add_control( 'blog_short_desctiption',array(
      'label' =>  __( 'Short Description for Blog Section', 'paraswift' ),
      'section' => 'paraswift_blog',
      'settings' => 'blog_short_desctiption',
      'priority' => 2,
      'type' => 'textarea'
  ));


  //Add Section for Footer Text 
  $wp_customize->add_section('paraswift_footer', array(
      'title' => __('Footer Text', 'paraswift'),
      'panel' => 'theme_section',
      'priority' => 6
  ));


  //Copyright
  $wp_customize->add_setting( 'copyright_text', array(
      'default'        => __('[Copyright] Your Site Name', 'paraswift'),
      'sanitize_callback' => 'paraswift_sanitize_textarea'
  ) );

  $wp_customize->add_control( 'copyright_text',array(
      'label' =>  __( 'Footer Copyright Text', 'paraswift' ),
      'section' => 'paraswift_footer',
      'settings' => 'copyright_text',
      'priority' => 1,
      'type' => 'textarea'
  ));
}endif;
add_action( 'customize_register', 'paraswift_customize_register' );


  /**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */

  

if ( ! function_exists( 'paraswift_customize_preview_js' ) ) :
    function paraswift_customize_preview_js() {
      wp_enqueue_script( 'paraswift_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '', true );
    }
endif;
add_action( 'customize_preview_init', 'paraswift_customize_preview_js' );


if ( ! function_exists( 'paraswift_sanitize_textarea' ) ) :
    function paraswift_sanitize_textarea( $html ) {
        return wp_filter_post_kses( $html );
    }
endif;

if ( ! function_exists( 'paraswift_sanitize_text' ) ) :
    function paraswift_sanitize_text( $input ) {
        return wp_kses_post( force_balance_tags( $input ) );
}
endif;

if ( ! function_exists( 'paraswift_sanitize_url' ) ) :
  function paraswift_sanitize_url( $text) {
    $text = esc_url_raw( $text);
    return $text;
  }
  endif;


if ( ! function_exists( 'paraswift_sanitize_checkbox' ) ) :
function paraswift_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return 0;
    }
}
endif;

if ( ! function_exists( 'paraswift_sanitize_hex_color' ) ) :
function paraswift_sanitize_hex_color( $color ) {
  if ( $unhashed = sanitize_hex_color_no_hash( $color ) )
    return '#' . $unhashed;

  return $color;
}
endif;