<?php
require_once get_template_directory() . '/inc/helpers.php';

/**
 * PAGE
 * 
 * Similar to single (article), but has big header and just displays content
 * written in page - such as the about us page
 */

get_header();


if ( have_posts() ){
  while( have_posts() ){ the_post();?>

    <div class="rad-gruppe"><div class="rad"><?php
      sak([ 'size' => 'cover' ]); ?>
    </div></div><?php

    // get_template_part('template-parts/share-icons'); ?>

    <div class="rad-gruppe article-wrap">
      <article><?php
        the_content(null,false); ?>
      </article>
    </div><?php
    
  }
} ?>

<?php get_footer(); ?>
