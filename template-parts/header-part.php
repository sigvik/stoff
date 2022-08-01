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
$big = $args['big'];
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
                <?php echo $logo ?>
            </a> 

            <button id="hamburger">&#xe5d2;</button>

        </div>
    </div>

<?php if ($big) echo <<<HTML

    <div id="header-big"> 

        <a class="logo" href="$home_url">
            {$logo}
        </a> 

        <div class="header-menu-wrapper">
            <div class="header-menu">
                <a href="/samfunn" class="menu-item">Samfunn</a>
                <a href="/kultur" class="menu-item">Kultur</a>
                <a href="/debatt" class="menu-item">Debatt</a>
                <a href="/bergensguide" class="menu-item">Bergensguiden</a>
                <a href="/om-oss" class="menu-item">Om oss</a>
            </div>
        </div>

    </div>

HTML;?>

</div>
