<?php

// SAK -- Articles that appear on the front page grid


// Set up template-part arguments
$argument_defaults = [
    'img' => 'https://engineroom.ie/images/Sean-Kingston3.jpg',
    'size' => 'three-split',
    'link' => "/2022/06/30/testsak/",
    'overskrift' => "Nei, Helle-Valle; vi er en arbeids&shy;plass",
    'ingress' => "Kristin Helle-Valle, som leder Litteraturhuset i Bergen, vil ikke stille seg bak de overordnede retningslinjene som skal motvirke seksuell trakassering og overgrep i jobbsammenheng.",
    'tags' => ['debatt', 'forsidestoff'],
]; 
$args = wp_parse_args($args, $argument_defaults);
$link = $args['link'];

// Variables
list($width, $height) = getimagesize($args['img']); /* Might break accessing images on a remote server */
$orientation = ($width > $height and $height / $width < 0.8) ? 'landscape' : '';


// HTML
echo <<<HTML
        <div class="sak {$args['size']}">

            <a href="$link" class="bilde-wrapper $orientation">
                <img class="bilde" src="{$args['img']}">
            </a>

            <div class="tekstdel">

                <a href="$link" class="overskrift">
                    {$args['overskrift']}
                </a>
                <a href="$link" class="ingress">
                    {$args['ingress']}
                </a>
                <div class="tags">
HTML;
                    foreach ($args['tags'] as &$tag) {
                        get_template_part('template-parts/tag', false, ['name' => $tag]);
                    };
echo <<<HTML
                </div>

            </div>

        </div>
HTML;
?>