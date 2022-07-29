<?php

// Add material symbol syntax to their code points
function m_symbol($code) { return '<span>&#x'.$code.';</span>'; }

// Shorter function for rendering an article preview, as it is done often
function sak($args) { get_template_part('template-parts/sak', false, $args); }

function get_img($size){ return get_the_post_thumbnail_url(false, $size); }

?>
