<?php

// SINGLE - Default page for articles

get_header();

get_template_part('template-parts/header-part');

/*if ( have_posts() ){

    while( have_posts() ){

        the_post(); */

        echo '<div class="rad-gruppe">';

        echo '<h1>Nei Helle-Valle; vi er en arbeidsplass</h1>';
        get_template_part('template-parts/test-content', false, ['big' => true]);

        echo '</div>';
/*
    }

}
*/

get_footer();
?>