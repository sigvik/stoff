<?php

function remove_wp_css() {
	remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
	remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );
}
add_action('init', 'remove_wp_css');


function stoff_enqueue() {
  // Update stylesheet ver number here to update on live site

  // Currently cheats by setting the version number to the datetime of css file creation
  $csspath = get_template_directory_uri() . '/assets/css/stoff.css';
  wp_enqueue_style( 'style', $csspath, array (), filemtime( get_template_directory() . '/assets/css/stoff.css' ) );
  wp_enqueue_script( 'script', get_template_directory_uri() . '/assets/js/script.js', array (), 1.6, true);

}
add_action('wp_enqueue_scripts', 'stoff_enqueue');


function stoff_setup(){

  $features = [
      ['title-tag'], 
      ['post-thumbnails'],
      ['featured-content'],
      ['automatic-feed-links'],
      ['html5', 
          [
              'search-form',
              'comment-form',
              'comment-list',
              'gallery',
              'caption',
              'style',
              'script',
          ]
      ],
      ['post-formats', 
          [
              'standard', 
              'aside', 
              'chat', 
              'gallery', 
              'image',
          ]
      ],
  ];

  foreach ($features as &$args) {
      call_user_func_array('add_theme_support', $args);
  }

}
add_action('after_setup_theme', 'stoff_setup');


	
function stoff_customize_register( $wp_customize ) {
  // https://developer.wordpress.org/themes/customize-api/customizer-objects/#controls

  // Add Section
  $wp_customize->add_section('header', array(
    'title'     => __('Header', 'name-theme'), 
    'priority'  => 70,
  )); 

  /**
   * Add Settings
   * https://developer.wordpress.org/reference/classes/wp_customize_setting/__construct/#parameters
   */
  $settings = [
    [ 'dark_header', ['default'  => true] ], 
    [ 'header_bg', ['default'  => false] ], 
    [ 'start_dark', ['default'  => false] ], 
    [ 'ui_toggle', ['default'  => true] ], 
    [ 'big_header', ['default'  => true] ], 
    [ 'ad_setting_two', [] ], 
  ];
 
  foreach ($settings as &$args) {
    // For all settings, call $wp_customize->add_setting('dark_header', array())
    call_user_func_array(array($wp_customize,'add_setting'), $args);
  }

  /**
   * Add Controls
   * https://developer.wordpress.org/reference/classes/WP_Customize_Control/__construct/
   */
  $controls = [
    [ 'dark_header', [
      'label' => __( 'Mørk header' ),
      'type' => 'checkbox',
      'section' => 'header',
      'settings'  => 'dark_header',  
    ]], 
    [ 'header_bg', [
      'label' => __( 'Header-bakgrunn' ),
      'type' => 'checkbox',
      'section' => 'header',
      'settings'  => 'header_bg',  
    ]], 
    [ 'start_dark', [
      'label' => __( 'Start i mørk modus' ),
      'type' => 'checkbox',
      'section' => 'header',
      'settings'  => 'start_dark',  
    ]], 
    [ 'ui_toggle', [
      'label' => __( 'Tillat å endre mørk/lys modus' ),
      'type' => 'checkbox',
      'section' => 'header',
      'settings'  => 'ui_toggle', 
    ]], 
    [ 'big_header', [
      'label' => __( 'Bruk stor header' ),
      'type' => 'checkbox',
      'section' => 'header',
      'settings'  => 'big_header',  
    ]], 
    [ 'ad_setting_two', [
      'label' => __( 'Accent Color', 'theme_textdomain' ),
      'type' => 'color',
      'section' => 'header',
      'settings'  => 'ad_setting_two',  
    ]], 
  ];

  foreach ($controls as &$args) {
    // For all controls, call $wp_customize->add_control('dark_header', array())
    call_user_func_array(array($wp_customize,'add_control'), $args);
  }

} 
add_action( 'customize_register', 'stoff_customize_register' );



// Don't put sticky posts before others
function ea_remove_sticky_from_main_loop( $query ) {
	$query->set( 'ignore_sticky_posts', true );
}
add_action( 'pre_get_posts', 'ea_remove_sticky_from_main_loop' );

// Allow importing media/posts from same domain, etc from test to www
add_filter( 'http_request_host_is_external', '__return_true' );

// Custom excerpt length
add_filter( 'excerpt_length', function( $length ) { return 21; } );

// Custom excerpt more style
add_filter('excerpt_more', function( $more ) { return '...'; });


// Remove width & height attributes from images
function remove_img_attr ($html) {
  return preg_replace('/(width|height)="\d+"\s/', "", $html);
}
add_filter( 'post_thumbnail_html', 'remove_img_attr' );


?>
