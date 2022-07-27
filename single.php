<?php
require get_template_directory() . '/inc/helpers.php';

// SINGLE - Default page for articles

get_header();

get_template_part('template-parts/header-part');

?>



<div class="rad-gruppe">

    <?php 

    if ( have_posts() ){
        while( have_posts() ){

            the_post();
    
            sak([
                'size' => 'one-split',
                'img' => get_the_post_thumbnail_url(),
                'title' => get_the_title(),
                'ingress' => get_the_excerpt(),
            ]);
            
            echo '<article>' . the_content() . '</article';
        }
    }
    ?>

</div>


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