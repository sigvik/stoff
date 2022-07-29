<?php

// SAK -- (English: Content) Articles that appear on the front page grid


// Set up template-part arguments
$argument_defaults = ['size' => 'three-split']; 
$args = wp_parse_args($args, $argument_defaults);

// Variables
$link = get_permalink();

$orientation = '';
$post_thumbnail_id = get_post_thumbnail_id( $post_id );
$imgmeta = wp_get_attachment_metadata( $post_thumbnail_id );
if (
  $imgmeta['width'] > $imgmeta['height'] and 
  $imgmeta['height'] / $imgmeta['width'] < 0.8
) 
$orientation = 'landscape';

?>



<div class="sak <?php echo $args['size'] ?>">

  <a class="innhold" href="<?php echo $link ?>">

    <div class="bilde-wrapper <?php echo $orientation ?>">
      <img class="bilde" src="<?php echo get_img('small') ?>">
    </div>

    <div class="tekstdel">

      <div class="overskrift">
        <?php echo get_the_title(); ?>
      </div>
      <div class="ingress">
        <?php echo get_the_excerpt() ?>
      </div>

    </div>
  </a>

  <?php 
  get_template_part('template-parts/tags'); 

  if ($args['size'] == 'cover') echo get_the_date('j. F Y');
  ?>

</div>
