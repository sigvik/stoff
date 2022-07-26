<?php

require get_template_directory() . '/inc/directories.php';

get_header();

/*

if ( have_posts() ){

    while( have_posts() ){

        the_post();
        the_post_thumbnail("small");
        the_title("<h3>","</h3>");
        the_excerpt();

        echo("<br><br>");

    }

}
*/



//------------------ PHP elements -----------------------------------

function sak ($size="three-split", $img="https://engineroom.ie/images/Sean-Kingston3.jpg") {
    
    list($width, $height) = getimagesize($img); /* Might break accessing images on a remote server */
    $orientation = ($width > $height and $height / $width < 0.8) ? 'landscape' : '';

    $link = "/2022/06/30/testsak/";

    echo <<<HTML
        <div class="sak $size">

            <a href="$link" class="bilde-wrapper $orientation">
                <img class="bilde" src="$img">
            </a>

            <div class="tekstdel">

                <a href="$link" class="overskrift">
                    Nei, Helle-Valle; vi er en arbeids&shy;plass
                </a>
                <a href="$link" class="ingress">
                    Kristin Helle-Valle, som leder Litteraturhuset i Bergen, vil ikke stille seg bak de overordnede retningslinjene som skal motvirke seksuell trakassering og overgrep i jobbsammenheng.
                </a>
                <div class="tags">
                    <a href="/debatt" class="tag debatt">Kommentarstoff</a>
                </div>

            </div>
            
        </div>
HTML;

}

function ad ($size="three-split", $img="https://engineroom.ie/images/Sean-Kingston3.jpg") {

    $url = "https://subjekt.no/wp-content/uploads/2022/07/NM_Takeover_Flagg_2400x680-kopi.png";

    echo <<<HTML
         <div class="annonse-tag">Annonse</div>
         <img class="ad" src="$url">
HTML;

}

?>




<!---------------------- HTML -------------------------------------------->

<?php 

get_template_part('template-parts/header-part', false, 
[
    'classes' => 'dark pattern-bg', 
    'big' => true,
]);

?>


<div class="rad-gruppe">

    <div class="rad-overskrift"><span class="kultur">Kultur</span>stoff</div>

    <div class="rad three-split-alt">

        <?php 

            get_template_part('template-parts/sak', false, 
            [
                'size' => 'one-split',
                'img' => 'https://www.stoffmagasin.no/wp-content/uploads/2019/05/DePresno_MaikenLarsenSolholmvikogCamillaLouadahHermansen-16.jpg',
            ]);
        
        ?>

        <div class="kolonne">

            <?php 
                sak(false,"https://www.stoffmagasin.no/wp-content/uploads/2022/06/fb_header-1-scaled.jpg");
                sak(false,"https://www.stoffmagasin.no/wp-content/uploads/2022/05/140522_fs_mektigstekake-4-1-scaled.jpg");
            ?>

        </div>

    </div>

</div>

<div class="rad-gruppe"> 
    <?php ad() ?> 
</div>

<div class="rad-gruppe">

    <div class="rad one-split">
        <?php 
            sak(false,"https://www.stoffmagasin.no/wp-content/uploads/2022/06/trekule_55.jpg");
        ?>
    </div>

</div>

<div class="rad-gruppe">

    <div class="rad two-split">
        <?php 
            sak(false,"https://www.stoffmagasin.no/wp-content/uploads/2022/06/innleggthvbilde.jpg");
            sak(false,"https://www.stoffmagasin.no/wp-content/uploads/2022/05/kommentar_saskia-scaled.jpg");
        ?>
    </div>

</div>


<div class="rad-gruppe">

    <div class="rad-overskrift"><span class="debatt">Kommentar</span>stoff</div>

    <div class="rad three-split">
        <?php 
            sak(false,"https://www.stoffmagasin.no/wp-content/uploads/2022/05/makt-quiz-uten-bakgrunn-scaled.jpg");
            sak(false,"https://www.stoffmagasin.no/wp-content/uploads/2022/02/endre.png");
            sak(false,"https://www.stoffmagasin.no/wp-content/uploads/2022/06/trekule_55.jpg");
        ?>
    </div>

    <div class="rad three-split-alt">

        <?php 
            sak("one-split","https://www.stoffmagasin.no/wp-content/uploads/2021/12/211130_bb_niilas_002-scaled.jpg");
        ?>

        <div class="kolonne">

            <?php 
                sak(false,"https://www.stoffmagasin.no/wp-content/uploads/2022/06/220519_ntf_sohhon_ingridborvik_001.jpg");
                sak(false,"https://www.stoffmagasin.no/wp-content/uploads/2022/05/140522_fs_mektigstekake-4-1-scaled.jpg");
            ?>

        </div>

    </div>

    <div class="rad three-split">
        <?php 
            sak(false,"https://www.stoffmagasin.no/wp-content/uploads/2022/05/nadja.jpeg");
            sak(false,"https://cdn-icons-png.flaticon.com/128/5229/5229460.png");
            sak(false, "https://www.stoffmagasin.no/wp-content/uploads/2022/05/211103_pmhw_sosialemedierhvordanpacc8avirkerdeoss_hannahjohansson_0031-1.jpg");
        ?>
    </div>

</div>


<?php get_footer(); ?>