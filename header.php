<?php 
require get_template_directory() . '/inc/directories.php'; 
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="pingback" href="<?php echo $templURI . "/xmlrpc.php" ?>"  />


  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-62250971-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-62250971-1');
  </script>

  <!-- Google Analytics -->
  <script>
    window.ga=window.ga||function(){(ga.q=ga.q||[]).push(arguments)};ga.l=+new Date;
    ga('create', 'UA-XXXXX-Y', 'auto');
    ga('send', 'pageview');
  </script>
  <script async src="https://www.google-analytics.com/analytics.js"></script>
  <!-- <script async src="path/to/autotrack.js"></script> -->
  <!-- End Google Analytics -->


	<?php wp_head(); ?>

  <?php // require $templDir . '/inc/category-clr.php' ?>

</head>

<body <?php if (get_theme_mod('start_dark')) body_class("dark-mode"); ?>>

<?php
wp_body_open();
?>

<div id="page">

<?php get_template_part('template-parts/header-part'); ?>
