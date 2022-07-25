<?php

$templDir = get_template_directory();
$imgDir = $templDir . "/assets/images";

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

    echo <<<HTML
        <div class="sak $size">

            <div class="bilde-wrapper $orientation">
                <img class="bilde" src="$img">
            </div>

            <div class="tekstdel">

                <div class="overskrift">
                    Nei, Helle-Valle; vi er en arbeids&shy;plass
                </div>
                <div class="ingress">
                    Kristin Helle-Valle, som leder Litteraturhuset i Bergen, vil ikke stille seg bak de overordnede retningslinjene som skal motvirke seksuell trakassering og overgrep i jobbsammenheng.
                </div>
                <div class="tags">
                    <div class="tag debatt">Kommentarstoff</div>
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

<div id="menu-overlay" class="">
    
    <div class="menu dark">

        <div class="icons">
            <button id="search-btn" class="icon">&#xe8b6;</button>
            <input id="search-input" type="text" placeholder="Søk.."></input>
            <button id="ui-mode-toggle" class="icon">&#xe51c;</button>
            <button id="menu-exit" class="icon">&#xe5cd;</button>
        </div>

        <div class="large-categories">
            <div class="category samfunn extends">Samfunn</div>
            <div class="category kultur extends">Kultur</div>
            <div class="category debatt extends">Debatt</div>
            <div class="category extends">Arkiv</div>
        </div>

        <div class="small-menu-items">
            <div class="menu-item">Bergensguiden</div>
            <a class="menu-item" href="https://issuu.com/stoffmagasin">
                Papirutgaven
            </a>
            <div class="menu-item">Om oss</div>
        </div>

        <div class="menu-footer">

            <div class="social-icons">
                <a class="icon facebook" href="https://www.facebook.com/STOFFmagasin/">
                    
                </a>
                <a class="icon insta" href="https://www.instagram.com/stoffmagasin/">
                    
                </a>
            </div>
            
            <div class="row">

                <div class="text">
                    STOFF arbeider etter Vær Varsom-plakatens regler for god presseskikk, og får støtte fra Velferdstinget Vest.
                    
                    <p><a href="https://goodshit.no">Utviklet av Sigurd Vikene</a></p>
                    
                    <p>© STOFF <?php echo date("Y"); ?></p>
                </div>

                <div class="wrapper">
                    <a class="vt-logo" href="https://vtvest.no/">
                        <?php echo file_get_contents( $imgDir . "/vt-logo.svg"); ?>
                    </a>
                </div>

            </div>

        </div>

    </div>

    <div id="menu-overlay-bg"></div>

</div>



<div class="header-wrapper dark pattern-bg">

    <div id="header-bar" class="hidden">
        <div class="content">

            <a class="logo" href="<?php echo get_home_url() ?>">
                <?php echo file_get_contents( $imgDir . "/stoff.svg"); ?>
            </a> 

            <button id="hamburger">&#xe5d2;</button>

        </div>
    </div>

    <div id="header-big"> 

        <a class="logo" href="<?php echo get_home_url() ?>">
            <?php echo file_get_contents( $imgDir . "/stoff.svg"); ?>
        </a> 

        <div class="header-menu-wrapper">
            <div class="header-menu">
                <div class="menu-item">Samfunn</div>
                <div class="menu-item">Kultur</div>
                <div class="menu-item">Debatt</div>
                <div class="menu-item">Bergensguiden</div>
                <div class="menu-item">Om oss</div>
            </div>
        </div>

    </div>

</div>




<div class="rad-gruppe">

    <div class="rad-overskrift"><span class="kultur">Kultur</span>stoff</div>

    <div class="rad three-split-alt">

        <?php 
            sak("one-split","https://www.stoffmagasin.no/wp-content/uploads/2019/05/DePresno_MaikenLarsenSolholmvikogCamillaLouadahHermansen-16.jpg"); 
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