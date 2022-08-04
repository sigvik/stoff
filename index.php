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

if ( have_posts() ){

  $posts_left = $wp_query->post_count;
  $i = 1; //
  $s = 1;
  $row = (is_front_page()) ? $row_order[0] : $row_types[3];

  while( have_posts() ){ the_post();

    // Start row
    if ($s == 1) { ?>
      <div class="rad-gruppe"> <?php
      // Category page title
      if ($i == 1) { 
        $headline_css = single_cat_title(false, false);
        $page_category = $wp_query->get_queried_object();
        if ($page_category) $headline_css = topmost_category_name($page_category);
      ?>
        <div class="rad-overskrift <?php echo $headline_css ?>"><?php single_cat_title() ?></div><?php
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

      //Alternate row types on front page
      if (is_front_page()) {
        if ($row === $row_types[4]) { get_template_part('template-parts/ad'); $row = $row_types[2]; }
        else if ($row === $row_types[2]) $row = $row_types[3]; 
        else if ($row === $row_types[3]) $row = $row_types[1];
        else if ($row === $row_types[1]) $row = $row_types[4];
      }
    }
  }
}

get_footer(); 

?>

