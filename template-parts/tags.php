<?php
require_once get_template_directory() . '/inc/helpers.php'; // topmost_category_name

// Variables
$title = get_the_title();
$title_words = explode(' ', $title); ?>

<div class="tags">

  <?php
  // Category tags
  $i = 1;
  $categories = get_the_category();
  foreach ($categories as $category) {
    
    $name = $category->name;
    $name_words = explode(' ', $name);

    // Categories not to display
    if ( preg_match('~[0-9]+~', $name)
    || $name == 'Nyheter'
    || strlen($name) > 15
    || ($name_words[0] == $title_words[0] and $name_words[1] == $title_words[1])
    ) continue;

    // Create tag
    $link = esc_url( get_category_link( $category->term_id ));
    $css_class = topmost_category_name($category);
    echo "<a href='$link' class='tag $css_class'>$name</a>";

    // Max 2 tags
    $i++; 
    if ($i > 2) break;
    
  };
  ?>

</div>
