<?php
require_once get_template_directory() . '/inc/helpers.php'; // filtered_tags

/**
 * SAK (English: Content)
 * Articles that appear on the front page grid, or at the top of articles
 */



// Template-part arguments
$argument_defaults = ['size' => 'three-split']; 
$args = wp_parse_args($args, $argument_defaults);
$size = $args['size'];
$cover = $size == 'cover';

// Variables
$title = get_the_title();
$excerpt = get_the_excerpt();
$link = get_permalink();
$tags = filtered_tags();
$hasImg = has_post_thumbnail();

// Color to give the headline, using first tag
$headline_class = '';
if (sizeof($tags) > 0){ $headline_class = $tags[0]['css_class']; }

// Image orientation (landscape til proven otherwise)
$orientation = 'landscape';
$post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
$imgmeta = wp_get_attachment_metadata( $post_thumbnail_id );
if ($imgmeta) {
  if ( 
    $imgmeta['width'] > $imgmeta['height'] and 
    $imgmeta['height'] / $imgmeta['width'] < 0.8
  ){ 
    $orientation = 'landscape'; 
  } else {
    $orientation = ''; 
  }
}

// Hardcoded default image sizes (Ignore wordpress sizes)
$img_sizes = [
  'cover' => 'full',
  'one-split' => [1200, 600],
  'two-split' => [580,410],
  'three-split' => [380, 290],
];

// Don't render if there's nothing to render
if (!$title && !$excerpt && !$hasImg) return;

// Give dynamic layout to certain category pages, such as 'Utgave 22'
$page_category = $wp_query->get_queried_object();
$utgaveside = false;
if ($page_category) {
  $cat_name = mb_strtolower($page_category->name, 'UTF-8');
  $utgaveside = str_contains($cat_name, 'utgave');  
}
$dynamic_layout = is_front_page() || $utgaveside;


?>



<!------------------------  HTML  ---------------------------->

<div class="sak <?php echo $size . ' ' . $orientation ?>"><?php

  // Create link if not inside article
  if (!is_single() && !is_page()):
    ?><a class="innhold" href="<?php echo $link ?>"><?php
  endif; ?>

    <!-- Image -->
    <div class="bilde-wrapper">
        <?php echo the_post_thumbnail($img_sizes[$size]) ?>
    </div>

    <div class="tekstdel">

      <!-- Tags, at top inside articles -->
      <?php if ($cover && is_single()) build_tags($tags); ?>

      <!-- Title -->
      <div class="overskrift <?php if ($cover || (!get_theme_mod('dark_header') && !get_theme_mod('header_bg'))) echo $headline_class ?>">
        <?php echo $title ?>
      </div>

      <?php
      // Excerpt, but not a preview of it inside articles
      if ( !($size == 'cover' and !has_excerpt()) ): ?>
        <div class="ingress">
          <?php echo $excerpt ?>
        </div><?php
      endif; 
      
      // Credits & date inside articles
      if ($size == 'cover' && is_single()) {?>

        <div class="byline"><?php
          if (get_field('journalist')): ?>
            <div class="credit">
              <b>Tekst </b><?php the_field('journalist') ?>
            </div><?php
          endif;
          if (get_field('foto')): ?>
            <div class="credit">
              <b>Foto </b><?php the_field('foto') ?>
            </div><?php
          endif;
          if (get_field('illustrasjon')): ?>
            <div class="credit">
              <b>Illustrasjon </b><?php the_field('illustrasjon') ?>
            </div><?php
          endif; ?>
        </div><?php

        echo get_the_date('j. F Y');
      }
      ?>

    </div><?php
    
  if (!is_single() && !is_page()): 
    ?></a><?php
  endif;

  // Tags, at bottom on front page
  if ($dynamic_layout) build_tags($tags);
  ?>

</div>
