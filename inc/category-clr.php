<style>
  /* Custom category colors */
  <?php 
  /**
   * !! NOTE: DEPRICATED 
   * Unimplemented this as I think it slowed down the site slightly
   * 
   * Goes trough wordpress categories, checks them for a custom colors field,
   * and creates a css style from it. Colors tags and category headlines.
   * Requires the Advanced Custom Fields plugin being set up for this.
   * 
   * get_categories() crashes when doing this in its own proper css-generating php file,
   * so I'm cheating and requiring this in the header on every page.
  */

  $categories = get_categories();
  foreach ($categories as $category) {

    $color = get_field('color', $category);

    if ($color) : ?>
    .<?php echo $category->name ?>{ color: <?php echo $color ?>; }
    <?php
    endif;
  }
  ?>
</style>
