<?php
require get_template_directory() . '/inc/helpers.php';

// SINGLE - Default page for articles

get_header();

get_template_part('template-parts/header-part');

?>

<?php 

if ( have_posts() ){

  while( have_posts() ){

    the_post();
    echo '<div class="rad-gruppe">';
    sak([ 'size' => 'cover' ]);
    echo '</div>';

    echo '<div class="rad-gruppe article-wrap"><article>';
    the_content(null,false);
    '</article></div>';

  }

}
?>


<div class="rad-gruppe">

    <div class="rad-overskrift">Les også</div>

    <div class="rad three-split">
        <?php 
            sak(['img' => "https://www.stoffmagasin.no/wp-content/uploads/2022/05/makt-quiz-uten-bakgrunn-scaled.jpg"]);
            sak(['img' => "https://www.stoffmagasin.no/wp-content/uploads/2022/02/endre.png"]);
            sak(['img' => "https://www.stoffmagasin.no/wp-content/uploads/2022/06/trekule_55.jpg"]);
        ?>
    </div>

</div>

<?php
get_footer();
?>
