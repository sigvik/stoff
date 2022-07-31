<?php

// SAK -- (English: Content) Articles that appear on the front page grid


// Set up template-part arguments
$argument_defaults = ['size' => 'three-split']; 
$args = wp_parse_args($args, $argument_defaults);
$size = $args['size'];
$cover = $size == 'cover';

// Variables
$link = get_permalink();

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


// Hardcoded default image sizes (Ignore wordpress defualts)
$img_sizes = [
  'cover' => 'full',
  'one-split' => [1200, 600],
  'two-split' => [580,410],
  'three-split' => [380, 290],
];

?>



<div class="sak <?php echo $size . ' ' . $orientation ?>"><?php

  if (!$cover): 
    ?><a class="innhold" href="<?php echo $link ?>"><?php
  endif; ?>

    <div class="bilde-wrapper">
      <?php echo the_post_thumbnail($img_sizes[$size]) ?>
    </div>

    <div class="tekstdel">

      <?php 
      if ($cover) get_template_part('template-parts/tags');  
      ?>

      <div class="overskrift">
        <?php echo get_the_title(); ?>
      </div>

      <?php
      // Don't show excerpt preview inside articles
      if ( !($size == 'cover' and !has_excerpt()) ): ?>
        <div class="ingress">
          <?php echo get_the_excerpt() ?>
        </div><?php
      endif; 
      
      if ($size == 'cover') {?>
        <div class="byline">
          <b>Tekst </b>Ingrid Borvik<br>
          <b>Foto </b>Nina Thuestad<br>
          <b>Illustrasjon </b>Marie Haugen
        </div><?php

        echo get_the_date('j. F Y');
      }
      ?>

    </div><?php
    
  if (!$cover): 
    ?></a><?php
  endif; ?>

  <?php 
  if (!$cover) get_template_part('template-parts/tags'); 
  ?>

</div>
