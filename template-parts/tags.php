<?php
// Variables
$title = get_the_title();
$title_words = explode(' ', $title);
?>

<div class="tags">

  <?php
  // Category tags
  $categories = get_the_category();

  $i = 1;
  foreach ($categories as $category) {
    
    $name = $category->name;
    $name_words = explode(' ', $name);
    $link = esc_url( get_category_link( $category->term_id ));

    // Categories not to display
    if ( preg_match('~[0-9]+~', $name)
    || $name == 'Nyheter'
    || strlen($name) > 15
    || ($name_words[0] == $title_words[0] and $name_words[1] == $title_words[1])
    ) continue;

    // If category has a parent category, give this matching color
    $parent_ctgrys = get_ancestors( $category->term_id, 'category');
    $parent_ctgry = false;
    if (count($parent_ctgrys) > 0) {
      $parent_ctgry = get_category($parent_ctgrys[0])->name;
    }

    ($parent_ctgry) ? $css_class = $parent_ctgry : $css_class = $name;

    echo "<a href='$link' class='tag $css_class'>$name</a>";

    // Max 2 categories
    $i++; 
    if ($i > 2) break;
    
  };
  ?>

</div>
