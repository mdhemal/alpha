<?php 
function after_setup_theme(){
    wp_enqueue_style("parent-style",get_parent_theme_file_uri("/style.css"));
    // wp_dequeue_script("alpha-style");
    // wp_deregister_style("alpha-style");
    wp_enqueue_style( 'alpha-style', get_theme_file_uri("/style.css"), array(), time(), false );
}
add_action("wp_enqueue_scripts","after_setup_theme", 11);
