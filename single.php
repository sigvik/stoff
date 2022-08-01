<?php
require get_template_directory() . '/inc/helpers.php';

// SINGLE - Default page for articles

get_header();

get_template_part('template-parts/header-part');

?>

<?php 

if ( have_posts() ){

  while( have_posts() ){

    the_post();?>
    <div class="rad-gruppe"><?php
      sak([ 'size' => 'cover' ]); ?>
    </div>

    <div class="share-icons">
      <div class="social-icons">
        <div class="icon facebook"></div>
        <div class="icon twitter"></div>
        <div class="icon copy"><?php echo m_symbol('e14d') ?></div>
      </div>
    </div>

    <div class="rad-gruppe article-wrap">
      <article><?php
        the_content(null,false); ?>
      </article>
    </div><?php

  }

}
?>


<div class="rad-gruppe">
  <div class="rad-overskrift">Les også</div>
  <div class="rad three-split"><?php 
    sak(['img' => "https://www.stoffmagasin.no/wp-content/uploads/2022/05/makt-quiz-uten-bakgrunn-scaled.jpg"]);
    sak(['img' => "https://www.stoffmagasin.no/wp-content/uploads/2022/02/endre.png"]);
    sak(['img' => "https://www.stoffmagasin.no/wp-content/uploads/2022/06/trekule_55.jpg"]);
  ?></div>
</div>

<?php //KORLEIS CLOSE ARTICLE TAG
get_footer();
?>
