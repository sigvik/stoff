<?php

// SAK -- (English: Content) Articles that appear on the front page grid


// Set up template-part arguments
$argument_defaults = [
    'size' => 'three-split',
    'tags' => ['debatt', 'forsidestoff'],
]; 
$args = wp_parse_args($args, $argument_defaults);

// Variables
$title = get_the_title();
$low_title = mb_strtolower($title, 'UTF-8');
$title_words = explode(' ', $low_title);
$link = get_permalink();
$orientation = '';
//if ($args['img']) {
//    list($width, $height) = getimagesize($args['img']); /* Might break accessing images on a remote server */
//    $orientation = ($width > $height and $height / $width < 0.8) ? 'landscape' : '';
//}

?>



<div class="sak <?php echo $args['size'] ?>">

    <a href="<?php echo $link ?>" class="bilde-wrapper <?php echo $orientation ?>">
        <img class="bilde" src="<?php echo get_img('small') ?>">
    </a>

    <div class="tekstdel">

        <a href="<?php echo $link ?>" class="overskrift">
            <?php echo $title ?>
        </a>
        <a href="<?php echo $link ?>" class="ingress">
            <?php echo get_the_excerpt() ?>
        </a>
        <div class="tags">

            <?php
            // Category tags
            $categories = get_the_category();

            $i = 1;
            foreach ($categories as $category) {
                $name = mb_strtolower($category->name, 'UTF-8');
                $name_words = explode(' ', $name);
                $link = esc_url( get_category_link( $category->term_id ));

                // Categories not to display
                if ( preg_match('~[0-9]+~', $name)
                || $name == 'nyheter'
                || strlen($name) > 15
                || ($name_words[0] == $title_words[0] and $name_words[1] == $title_words[1])
                ) continue;

                echo "<a href='$link' class='tag $name'>$name</a>";

                // Max 2 categories
                $i++; 
                if ($i > 2) break;
            };
            ?>

        </div>

    </div>

</div>
