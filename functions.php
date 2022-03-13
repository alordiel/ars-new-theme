<?php
/**
 * Child-Theme functions and definitions
 */
include_once 'functions/shortcodes.php';


function impacto_patronus_child_scripts() {
    wp_enqueue_style( 'impacto-patronus-parent-style', get_template_directory_uri(). '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'impacto_patronus_child_scripts' );
