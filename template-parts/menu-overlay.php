<?php 
require get_template_directory() . '/inc/directories.php'; 

function dropdown_category() {
  echo '<a href="/samfunn" class="category Samfunn extends"> Samfunn </a>';
}

function dropdown_item($link, $name) {
  echo '<a href="'.$link.'" class="menu-item">'.$name.'</a>';
}

function all_cat_children($id) {
  $children = get_categories(['parent' => $id, 'orderby' => 'count']);

  foreach ($children as $child) {
    // Skip minor categories with few entries
    if ($child->count < 11){ continue; }
    dropdown_item(
      get_category_link($child->term_id), 
      $child->name
    );
  }
}

// Get top level categories
$top_categories = get_terms( 
  'category', 
  array('parent' => 0)
);
//var_dump($top_categories);


$utgaver = get_terms( 'category', ['name__like' => 'Utgave']);

// IDs = samfunn 31, kultur 15, debatt 10

?>

<div id="menu-overlay" class="">
  
  <div class="menu dark">

    <div class="icons">
      <?php 
      get_search_form();
      if (get_theme_mod('ui_toggle')): echo get_theme_mod('ui_toggle'); ?>  
        <button id="ui-mode-toggle" class="icon">&#xe51c;</button><?php
      endif; ?>
      <button id="menu-exit" class="icon">&#xe5cd;</button>
    </div>


    <?php 
    // Big categories menu
    if ( has_nav_menu( 'big-categories' ) ) {
      wp_nav_menu( [
        'theme_location' => 'big-categories',
        'depth' => 2,
        'items_wrap' => '<div class="large-categories">%3$s</div>',
        'colors' => true,
        'expands' => true,
        'walker' => new Custom_Walker,
      ]);
    } else { ?>
      
      <div class="large-categories">
      <a href="/samfunn" class="menu-item Samfunn extends"> Samfunn </a> <!-- <div class="icon">&#xe5c5;</div> -->
        <div class="sub-menu Samfunn"> 
          <?php all_cat_children(31)?>
        </div>
      <a href="/kultur" class="menu-item Kultur extends"> Kultur </a>
        <div class="sub-menu Kultur">
          <?php all_cat_children(15)?>
        </div>
      <a href="/debatt" class="menu-item Debatt extends"> Debatt </a>
        <div class="sub-menu Debatt">
          <?php all_cat_children(10)?>
        </div>
      <button class="menu-item extends"> Arkiv </button>
        <div class="sub-menu"> <?php
          foreach ($utgaver as $utgave) {
            dropdown_item(
              get_category_link($utgave->term_id), 
              preg_replace('/[^0-9]/', '', $utgave->name)
            );
          }?>
        </div>
    </div>

    <?php
    } ?>


    <?php 
    // Small categories menu
    if ( has_nav_menu( 'small-categories' ) ) {
      wp_nav_menu( [
        'theme_location' => 'small-categories',
        'depth' => 1,
        'items_wrap' => '<div class="small-menu-items">%3$s</div>',
        'walker' => new Custom_Walker,
      ]);
    } else { ?>
      <div class="small-menu-items">
        <a href="/bergensguide" class="menu-item">Bergensguiden</a>
        <a class="menu-item" href="https://issuu.com/stoffmagasin">Papirutgaven</a>
        <a href="/om-oss" class="menu-item">Om oss</a>
      </div><?php
    } 
    ?>

    <div class="menu-footer">

      <div class="social-icons">
        <a class="icon facebook" href="https://www.facebook.com/STOFFmagasin/">
          
        </a>
        <a class="icon insta" href="https://www.instagram.com/stoffmagasin/">
          
        </a>
      </div>
      
      <div class="row">

        <div class="text">
          <?php echo get_theme_mod('footer_txt'); ?>
          
          <p><a href="https://goodshit.no">Utviklet av Sigurd Vikene</a></p>
          
          <p>© <?php echo bloginfo('title') .' '. date("Y"); ?></p>
        </div>

        <div class="wrapper">
          <a class="vt-logo" href="https://vtvest.no/">
            <?php echo file_get_contents( $imgDir . "/vt-logo.svg"); ?>
          </a>
        </div>

      </div>

    </div>

  </div>

  <div id="menu-overlay-bg"></div>

</div>
