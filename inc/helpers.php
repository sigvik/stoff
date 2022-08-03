<?php
// HELPER FUNCTIONS - Remember to require_once as this is used in multiple files


// Add material symbol syntax to their code points
function m_symbol($code) { return '<span>&#x'.$code.';</span>'; }

// Shorter function for rendering an article preview, as it is done often
function sak($args) { get_template_part('template-parts/sak', false, $args); }

// Shorter img func
function get_img($size){ return get_the_post_thumbnail_url(false, $size); }

/**
 * Return category name, or name of it's parent if it has one.
 * Used for css classes on category tags and headlines.
 */
function topmost_category_name($category){ 
  $output = $category->name;
  $parent_ctgrys = get_ancestors( $category->term_id, 'category');
  if (count($parent_ctgrys) > 0) {
    $output = get_category($parent_ctgrys[0])->name;
  }
  return $output;
}

?>
