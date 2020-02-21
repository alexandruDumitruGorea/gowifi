<?php

function my_theme_styles_admin() {
    wp_register_style('style_admin', get_template_directory_uri() . '/css/style-admin.css');
    wp_enqueue_style('style_admin');
    wp_register_style('datatables_boostrap4', get_template_directory_uri() . '/css/datatables-boostrap4.css');
    wp_enqueue_style('datatables_boostrap4');
}

add_action('wp_enqueue_scripts', 'my_theme_styles_admin');

?>