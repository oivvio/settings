<?php

function show ($data) {
  echo '<pre style="box-sizing: border-box; height: 50vh; resize: vertical;
        outline: 2px solid; background: #fff; font: 13px/1.3 monospace">';
  print_r($data);
  echo '</pre>';
}


function show_category () {
    global $post;
    $postcat = get_the_category( $post->ID );

    // try print_r($postcat) ;  

    if ( ! empty( $postcat ) ) {
        echo esc_html( $postcat[0]->name );   
    }
}


// Return True if page is not part of the normal settings.se site
// but rather 
function is_mam_page() {
    $result = False;
    $postcat = get_the_category( $post->ID );
    
    if  (is_single() && $postcat[0]->slug == "raoulwallenberg2020") {
        $result = True;
    }

    if (is_page(981)){
        $result = True;
    }
    return $result;

}


function show_navigation () {

    $result = True;
    if (is_mam_page()){
        $result = False;
    }
    return $result;
}



require get_template_directory() . '/inc/setup.php';
require get_template_directory() . '/inc/navigation.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/blog.php';
require get_template_directory() . '/inc/calendar.php';
require get_template_directory() . '/inc/post-list.php';
require get_template_directory() . '/inc/large-post-list.php';
require get_template_directory() . '/inc/shortcode.php';
require get_template_directory() . '/inc/knowledge-test-fields.php';
require get_template_directory() . '/inc/knowledge-test.php';
