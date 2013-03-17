<?php
function recent_posts_function($atts, $content = null) {
    extract(shortcode_atts(array(
        'posts' => 1,
    ), $atts));
        
    $return_string = '<h3>'.$content.'</h3>';
    $return_string .= '<ul>';
    
    query_posts(array('orderby' => 'date', 'order' => 'DESC' , 'showposts' => $posts ));
    if (have_posts()) : while (have_posts()) : the_post();
        $return_string .= '<li><a href="'.get_permalink().'">' .get_the_title().'</a></li>';
        endwhile;
    endif;
    $return_string .= '</ul>';
    
    wp_reset_query();
    return $return_string;
}

function register_shortcodes(){
    add_shortcode( 'recent-posts', 'recent_posts_function' );
}
add_action( 'init', 'register_shortcodes' );
?>