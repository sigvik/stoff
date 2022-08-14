<?php
// HELPER FUNCTIONS - Remember to require_once as this is used in multiple files


// Add material symbol syntax to their code points
function m_symbol($code) { return '<span>&#x'.$code.';&#xFE0E;</span>'; }

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



// TAG FUNCTIONS (should be refactored, they're not helpers) --------------

// Filter out what tags to display, with css class. (Must happen in the loop)
function filtered_tags(){
  $tags = [];
  $title_words = explode(' ', get_the_title());

  $i = 1;
  $categories = get_the_category();

  foreach ($categories as $category) {
    
    $name = $category->name;
    $name_words = explode(' ', $name);

    // Filter categories not to display
    if ( preg_match('~[0-9]+~', $name)
    || $name == 'Nyheter'
    || strlen($name) > 15
    //|| ($name_words[0] == $title_words[0] and $name_words[1] == $title_words[1])
    ) continue;

    // Add tag
    $link = esc_url( get_category_link( $category->term_id ));
    $css_class = topmost_category_name($category);
    array_push($tags, [
      'link' => $link, 
      'css_class' => $css_class, 
      'name' => $name, 
    ]);

    // Max 2 tags
    $i++; 
    if ($i > 2) break;
    
  };

  return $tags;
}

// Build tags from filtered_tags()
function build_tags($tags){
  echo'<div class="tags">';
    foreach ($tags as $tag){ 

      echo '
      <a 
        href= '. $tag['link'] .'
        class="tag '. $tag['css_class'] .'"
      >
        '. $tag['name'] .'
      </a>
      ';

    }
  echo'</div>';
}

?>
