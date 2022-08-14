<?php 
require get_template_directory() . '/inc/directories.php';

/*
HEADER

Arguments = ['big' => bool]
*/

$argument_defaults = [
    'big' => false,
    'tags' => ['debatt', 'forsidestoff'],
]; 
$args = wp_parse_args($args, $argument_defaults);

$logo = file_get_contents( $imgDir . "/stoff.svg");
$home_url = get_home_url();
$big = false;
if (!is_single() && get_theme_mod('big_header')) $big = true;
$classes = ''; //pattern-bg
if (get_theme_mod('dark_header')) $classes = $classes . ' dark';
if (get_theme_mod('header_bg')) $classes = $classes . ' pattern-bg';

// The menu overlay comes with the header, as you need the header to open it
get_template_part('template-parts/menu-overlay');

?>


<div class="header-wrapper <?php echo $classes ?>">

  <div id="header-bar" class="<?php if ($big) echo 'hidden' ?>">
    <div class="content">

      <a class="logo" href="<?php echo $home_url ?>">
        <?php echo $logo ?>oioi
      </a> 

      <button id="hamburger">&#xe5d2;</button>

    </div>
  </div>

  <?php 
  if ($big): ?>
    <div id="header-big"> 

      <a class="logo" href="<?php echo $home_url ?>">
        <?php echo $logo ?>
      </a> 

      <div class="header-menu-wrapper">
        <?php
        if ( has_nav_menu( 'header-menu' ) ) {

          wp_nav_menu( [
            'theme_location' => 'header-menu',
            'depth' => 1,
            'items_wrap' => '<div class="header-menu">%3$s</div>',
            'walker' => new Custom_Walker,
          ]);

        } else { ?>

          <div class="header-menu">
            <a href="/samfunn" class="menu-item">Samfunn</a>
            <a href="/kultur" class="menu-item">Kultur</a>
            <a href="/debatt" class="menu-item">Debatt</a>
            <a href="/bergensguide" class="menu-item">Bergensguiden</a>
            <a href="/om-oss" class="menu-item">Om oss</a>
          </div><?php

        } ?>
      </div>

    </div><?php
  endif;?>

</div>


