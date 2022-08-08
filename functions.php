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
      ['menus'],
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

  // Dynamic menu locations
  register_nav_menus( array(
    'header-menu' => "Under stor header, anbefaler ikke mer en 5 punkt",
    'big-categories' => "Sidemeny - Stor del med dropdowns",
    'small-categories' => "Sidemeny - Liten del uten dropdowns",
  ));

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
    [ 'footer_txt', ['default'  => 'STOFF arbeider etter Vær Varsom-plakatens regler for god presseskikk, og får støtte fra Velferdstinget Vest.'] ], 
    [ 'ad_setting_two', [] ], 
  ];
  foreach ($settings as &$args) {
    // For all settings, call $wp_customize->add_setting('name', array(args))
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
    [ 'footer_txt', [
      'label' => __( 'Tekst i meny-footer' ),
      'type' => 'textarea',
      'section' => 'header',
      'settings'  => 'footer_txt',  
    ]], 
    [ 'ad_setting_two', [
      'label' => __( 'Accent Color', 'theme_textdomain' ),
      'type' => 'color',
      'section' => 'header',
      'settings'  => 'ad_setting_two',  
    ]], 
  ];
  foreach ($controls as &$args) {
    // For all controls, call $wp_customize->add_control('name', array(args))
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


// Walker for removing li tags from menus (jesus wordpress)
class Custom_Walker extends Walker_Nav_Menu {
  // https://developer.wordpress.org/reference/classes/walker_nav_menu/

  function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 )
  {
    global $currentID;
    $currentID = $item->ID;

    $classes = empty($item->classes) ? array () : (array) $item->classes;
    $class_names = join(' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );

    // Could add some hacky customs support for color classes here
    global $clrClass;
    $clrClass = '';
    if ( isset($args->colors) ) {
      if ($args->colors && $depth == 0) {
        // Make clrClass global for submenu to reach it
        $clrClass = filter_var($item->title, FILTER_SANITIZE_STRING);
      }
    }
    !empty ( $class_names ) and $class_names = ' class=" '. $clrClass .' '. esc_attr( $class_names ) . '"';
    
    $output .= "<div id='menu-item-$item->ID' $class_names>";
    $attributes  = '';
    !empty( $item->attr_title ) and $attributes .= ' title="'  . esc_attr( $item->attr_title ) .'"';
    !empty( $item->target ) and $attributes .= ' target="' . esc_attr( $item->target     ) .'"';
    !empty( $item->xfn ) and $attributes .= ' rel="'    . esc_attr( $item->xfn        ) .'"';
    !empty( $item->url ) and $attributes .= ' href="'   . esc_attr( $item->url        ) .'"';
    $title = apply_filters( 'the_title', $item->title, $item->ID );

    $expandBtn = '';
    if ( isset($args->expands) ) {
      if ($args->expands && $depth == 0) {
        $expandBtn = "<button id='expand-$item->ID' class='dropdown-btn'>+</button>";
      }
    }

    $item_output = $args->before
    . "<a $attributes>"
    . $args->link_before
    . $title
    . '</a>'
    . $expandBtn
    . '</div>'
    . $args->link_after
    . $args->after;
    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
  }

  function start_lvl( &$output, $depth = 0, $args = null ) {

    if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
        $t = '';
        $n = '';
    } else {
        $t = "\t";
        $n = "\n";
    }
    $indent = str_repeat( $t, $depth );
 
    // Default class.
    global $clrClass;
    $classes = array( 'sub-menu', 'hidden', $clrClass );
    $clrClass = '';
 
    /**
     * Filters the CSS class(es) applied to a menu list element.
     */
    $class_names = implode( ' ', apply_filters( 'nav_menu_submenu_css_class', $classes, $args, $depth ) );
    $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
 
    $parentID = '';
    global $currentID;
    if ( isset($currentID) ) {
      $parentID = "id='submenu-". $currentID ."'";
    }
    $output .= "{$n}{$indent}<ul $parentID $class_names>{$n}";
  }
}

?>
