<?php

require get_template_directory() . '/inc/directories.php';
require get_template_directory() . '/inc/helpers.php';

get_header();

/*

if ( have_posts() ){

    $count = wp_count_posts();
    $i = 0;
    while( have_posts() ){

        $i++;
        the_post();
        the_post_thumbnail("small");
        the_title("<h3>","</h3>");
        the_excerpt();

        echo("<br><br>");

    }

}
*/



//------------------ PHP elements -----------------------------------

function ad() {
    $url = "https://subjekt.no/wp-content/uploads/2022/07/NM_Takeover_Flagg_2400x680-kopi.png";
    echo '<div class="annonse-tag">Annonse '. m_symbol('e5c5') .'</div>
         <img class="ad" src="'. $url .'">';
}


get_template_part('template-parts/header-part', false, 
[
    'classes' => 'dark pattern-bg', 
    'big' => true,
]);


//------------------ The loop -----------------------------------

if ( have_posts() ){

    $posts_left = wp_count_posts();
    $i = 0;
   
    function rad($r_type, $r_length){

        $r = 0;
        $three_split_alt = ($r_type == 'three-split-alt');

        // Don't build if not enough content
        //if ($posts_left < $r_length) return;

        while ($r < $r_length) {

            the_post();
            if (is_sticky() and $i > 1) continue; // Skip some sticky posts for now
        
            // Increment
            $i++; $r++; $posts_left--;

            // Start row
            if ($r == 1) echo '<div class="rad '. $r_type .'">';

            if ($three_split_alt and $r == 2) echo '<div class="kolonne">';

            // Build content
            $sak_type = ($three_split_alt) ? (($r == 1) ? 'one-split' : 'three-split') : $r_type;
            sak([
                'size' => $sak_type,
                'img' => ($sak_type == 'one-split') ? get_img('large') : get_img('small'),
                'title' => get_the_title(),
                'ingress' => ($three_split_alt and $r > 1) ? '' : get_the_excerpt(),
                'link' => get_permalink(),
            ]);

        }   

        if ($three_split_alt) echo '</div>';
        echo '</div>';
        
    }

    function single_rad_gruppe($r_type, $r_length){
        echo'<div class="rad-gruppe">';
        rad($r_type, $r_length);
        echo'</div>';
    }

    while( have_posts() ){

        single_rad_gruppe('three-split-alt', 3);

        echo'<div class="rad-gruppe">';
        ad();
        echo'</div>';
    
        single_rad_gruppe('one-split', 1);
    
        single_rad_gruppe('two-split', 2);
    
        echo'<div class="rad-gruppe">';
        echo'<div class="rad-overskrift"><span class="samfunn">Samfunns</span>stoff</div>';
        rad('three-split', 3);
        //rad('three-split-alt', 3);
        //rad('three-split', 3);
        echo'</div>';

        break;
    }
    

}


get_footer(); 

?>