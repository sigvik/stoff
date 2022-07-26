<?php


function remove_wp_css() {
	remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
	remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );
}
add_action('init', 'remove_wp_css');



function stoff_enqueue() {
    // Update stylesheet ver number here to update on live site
    wp_enqueue_style( 'style', get_template_directory_uri() . '/assets/css/stoff.css', array (), 2.3 );
    wp_enqueue_script( 'script', get_template_directory_uri() . '/assets/js/script.js', array (), 1.3, true);
}
add_action('wp_enqueue_scripts', 'stoff_enqueue');



function stoff_theme_support(){

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
add_action('after_theme_setup', 'stoff_theme_support');


?>