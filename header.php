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

	<?php wp_head(); ?>

</head>

<body <?php body_class(""); ?>>

<?php
wp_body_open();
?>

<div id="page">