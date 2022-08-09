<?php
require get_template_directory() . '/inc/directories.php';
require_once get_template_directory() . '/inc/helpers.php';

get_header();


//------------------ The loop -----------------------------------

$row_types = [
  ['r'=> 'cover', 'len' => 1], // 0 - Full width & info, for the top of articles
  ['r'=> 'one-split', 'len' => 1], // 1 - One big on a line
  ['r'=> 'two-split', 'len' => 2], // 2 - Two share a line
  ['r'=> 'three-split', 'len' => 3], // 3 - Three share a line
  ['r'=> 'three-split-alt', 'len' => 3], // 4 - One big, two small
];

$row_order = [
  $row_types[4],
  $row_types[2],
  $row_types[3],
  $row_types[1],
];

// Get ad from Advanced Ads plugin
function ad() {
  if( function_exists('the_ad_placement') ) { the_ad_placement('forside'); }
}

// Give dynamic layout to certain category pages, such as 'Utgave 22'
$page_category = $wp_query->get_queried_object();
$utgaveside = false;
if ($page_category) {
  $cat_name = mb_strtolower($page_category->name, 'UTF-8');
  $utgaveside = str_contains($cat_name, 'utgave');  
}
$dynamic_layout = is_front_page() || $utgaveside;


if ( have_posts() ){

  $posts_left = $wp_query->post_count;
  $i = 1; //
  $s = 1;
  $row = ($dynamic_layout) ? $row_order[0] : $row_types[3];

  while( have_posts() ){ the_post();

    // Start row
    if ($s == 1) { ?>
      <div class="rad-gruppe"> <?php
      // Category page title
      if ($i == 1) { 
        $headline_css = single_cat_title(false, false);
        if ($page_category) $headline_css = topmost_category_name($page_category);
        $page_title = single_cat_title(false, false);
        if (is_search()) {
          $page_title = esc_html__($posts_left . ' resultater for ') . '<span>"' . get_search_query() . '"</span>';
        }
      ?>
        <div class="rad-overskrift <?php echo $headline_css ?>"><?php echo $page_title ?></div><?php
      }?>
        <div class="rad <?php echo $row['r'] ?>"><?php
    }

    $size = $row['r'];
    // Variable sizing for three-split-alt
    if ($row == $row_types[4]) {
      if ($s == 1) {
        $size = $row_types[1]['r']; 
      } else {
        $size = $row_types[3]['r'];
        if ($s == 2) {?>
          <div class="kolonne"><?php
        }
      }
    }

    sak(['size' => $size]);
    $i++; $s++;

    // End row
    if ($s > $row['len']) { 
      if ($s == 1) echo '</div>';
      echo '</div></div>'; 
      $s = 1;

      // Alternate row types on front page
      if ($dynamic_layout) {
        if ($row === $row_types[4]) { ad(); $row = $row_types[2]; }
        else if ($row === $row_types[2]) $row = $row_types[3]; 
        else if ($row === $row_types[3]) $row = $row_types[1];
        else if ($row === $row_types[1]) $row = $row_types[4];
      }
    }
  }

} else { 
  // 0 posts found ?>
  <div class="rad-gruppe"> <?php

  if (is_search()){
    echo '<div class="rad-overskrift">' . esc_html__('0 resultater for ') . '<span>"' . get_search_query() . '"</span></div>';
  } else { ?>
    <div class="rad-overskrift">Fant ingen saker!</div> <?php
  } ?>
      
    <a href="<?php echo home_url(); ?>"><p>< Tilbake til forsiden</p></a>
  </div> <?php
}

get_footer(); 

?>

