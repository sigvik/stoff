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
$link = get_permalink();
$tags = filtered_tags();

// Color to give the headline, using first tag
$headlie_css = '';
if (count($tags) > 0) $headline_css = $tags[0]['css_class'];

// Image orientation
$orientation = '';
$post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
$imgmeta = wp_get_attachment_metadata( $post_thumbnail_id );
if ($imgmeta) {
  if ( 
    $imgmeta['width'] > $imgmeta['height'] and 
    $imgmeta['height'] / $imgmeta['width'] < 0.8
  ){ 
    $orientation = 'landscape'; 
  }
}

// Hardcoded default image sizes (Ignore wordpress sizes)
$img_sizes = [
  'cover' => 'full',
  'one-split' => [1200, 600],
  'two-split' => [580,410],
  'three-split' => [380, 290],
];

?>



<!------------------------  HTML  ---------------------------->

<div class="sak <?php echo $size . ' ' . $orientation ?>"><?php

  // Create link if not inside article
  if (!$cover): 
    ?><a class="innhold" href="<?php echo $link ?>"><?php
  endif; ?>

    <!-- Image -->
    <div class="bilde-wrapper">
      <?php echo the_post_thumbnail($img_sizes[$size]) ?>
    </div>

    <div class="tekstdel">

      <!-- Tags, at top inside articles -->
      <?php if ($cover) build_tags($tags); ?>

      <!-- Title -->
      <div class="overskrift <?php if ($cover) echo $headline_css ?>">
        <?php echo get_the_title(); ?>
      </div>

      <?php
      // Excerpt, but not a preview of it inside articles
      if ( !($size == 'cover' and !has_excerpt()) ): ?>
        <div class="ingress">
          <?php echo get_the_excerpt() ?>
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
    
  if (!$cover): 
    ?></a><?php
  endif;

  // Tags, at bottom on front page
  if (is_front_page()) build_tags($tags);
  ?>

</div>
