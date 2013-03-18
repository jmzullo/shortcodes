<?php
function recent_posts_function($atts, $content = null) {
    extract(shortcode_atts(array(
        'num' => 1,
        'cat' => ''
    ), $atts));
    global $post;
    
    $myposts = get_posts('numberposts='.$num.'&order=DESC&orderby=post_date&category_name='.$cat);
    $retour='<ul>';
    foreach($myposts as $post) : setup_postdata($post);
    $retour.='<li><a href="'.get_permalink().'">'.the_title("", "", false).'</a></li>';
endforeach;
$retour.='</ul>';
return $retour;
}

function register_shortcodes(){
    add_shortcode( 'recent-posts', 'recent_posts_function' );
}
add_action( 'init', 'register_shortcodes' );
?>