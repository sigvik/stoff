<?php
require get_template_directory() . '/inc/directories.php';
require_once get_template_directory() . '/inc/helpers.php';

get_header();

get_template_part('template-parts/header-part', false, 
[
    'classes' => 'dark pattern-bg', 
    'big' => true,
]);


//------------------ The loop -----------------------------------

$row_types = [
  ['r'=> 'cover', 'len' => 1], // 0 - Full width & info, for the top of articles
  ['r'=> 'one-split', 'len' => 1], // 1 - One big on a line
  ['r'=> 'two-split', 'len' => 2], // 2 - Two share a line
  ['r'=> 'three-split', 'len' => 3], // 3 - Three share a line
  ['r'=> 'three-split-alt', 'len' => 3], // 4 - One big, two small
];

if ( have_posts() ){

  $posts_left = $wp_query->post_count;
  $i = 1; //
  $s = 1;
  $row = (is_front_page()) ? $row_types[4] : $row_types[3];

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
  }?>



  
  <?php
  /*

  LEGACY CODE

  function rad($r_type, $r_length){

      $s = 0;
      $three_split_alt = ($r_type == 'three-split-alt');

      // Don't build if not enough content
      //if ($posts_left < $r_length) return;

      while ($s < $r_length) {

          the_post();
          if (is_sticky() and $i > 1) continue; // Skip sticky posts for now

          // Start row on first
          if ($s == 1) echo '<div class="rad '. $r_type .'">';

          // Column for three-split-alt
          if ($three_split_alt and $s == 2) echo '<div class="kolonne">';

          // Build content
          $sak_type = ($three_split_alt) ? (($s == 1) ? 'one-split' : 'three-split') : $r_type;
          sak([
              'size' => $sak_type,
              'img' => ($sak_type == 'one-split') ? get_img('large') : get_img('small'),
              'title' => get_the_title(),
              'ingress' => ($three_split_alt and $s > 1) ? '' : get_the_excerpt(),
              'link' => get_permalink(),
          ]);

          // Increment
          $i++; $r++; $posts_left--;

      }   

      if ($three_split_alt) echo '</div>';
      echo '</div>';
      
  }

  function single_rad_gruppe($r_type, $r_length){
      echo'<div class="rad-gruppe">';
      rad($r_type, $r_length);
      echo'</div>';
  }

  /*
  if (is_front_page()) {
      single_rad_gruppe('three-split-alt', 3);

      echo'<div class="rad-gruppe">';
      ad();
      echo'</div>';
  
      single_rad_gruppe('one-split', 1);
  
      single_rad_gruppe('two-split', 2);
  
      echo'<div class="rad-gruppe">';
      echo'<div class="rad-overskrift"><span class="samfunn">Samfunns</span>stoff</div>';
      rad('three-split', 3);
      //rad('three-split-alt', 3);
      //rad('three-split', 3);
      echo'</div>';

  } else {

      echo'<div class="rad-gruppe">';
      echo'<div class="rad-overskrift">';
      single_cat_title();
      echo'</div>';

      while( have_posts() ){

          if ($posts_left > 3) {
              rad('three-split', 3);
          } else {
              echo'</div>';
              return;
          }
  
      }

      echo'</div>';

  }
  

  while( have_posts() ){

      single_rad_gruppe('three-split-alt', 3);

      echo'<div class="rad-gruppe">';
      ad();
      echo'</div>';
  
      single_rad_gruppe('one-split', 1);
  
      single_rad_gruppe('two-split', 2);
  
      echo'<div class="rad-gruppe">';
      echo'<div class="rad-overskrift"><span class="samfunn">Samfunns</span>stoff</div>';
      rad('three-split', 3);
      //rad('three-split-alt', 3);
      //rad('three-split', 3);
      echo'</div>';

      break;
  }

  */
    

}


get_footer(); 

?>

