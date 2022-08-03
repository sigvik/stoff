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

  // Add Settings
  $wp_customize->add_setting('dark_header', array(
    'transport' => 'refresh',
    'height'    => 325,
  ));
    $wp_customize->add_setting('header_bg', array(
    'transport' => 'refresh',
    'height'    => 325,
  ));
  $wp_customize->add_setting('ad_setting_two', array(
    'transport' => 'refresh',
    'height'    => 325,
  ));

  // Add Controls
  $wp_customize->add_control( 'dark_header', array(
    'label' => __( 'Mørk header' ),
    'type' => 'checkbox',
    'section' => 'header',
    'settings'  => 'dark_header',  
  ) );
  $wp_customize->add_control( 'header_bg', array(
    'label' => __( 'Header-bakgrunn' ),
    'type' => 'checkbox',
    'section' => 'header',
    'settings'  => 'header_bg',  
  ) );
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'color_control', array(
    'label' => __( 'Accent Color', 'theme_textdomain' ),
    'section' => 'header',
    'settings'  => 'ad_setting_two',  
  )));

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
