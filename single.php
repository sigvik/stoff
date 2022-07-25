<?php
get_header();
?>

Dette er ei artikkelside!

<?php

if ( have_posts() ){

    while( have_posts() ){

        the_post();
        the_content();

    }

}


get_footer();
?>