<?php

function my_theme_styles() {
    wp_register_style('normalize', get_template_directory_uri() . '/css/normalize.min.css');
    wp_enqueue_style('normalize');
    wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_style('bootstrap');
    wp_register_style('animate', get_template_directory_uri() . '/css/animate.css');
    wp_enqueue_style('animate');
    wp_register_style('owl_carousel', get_template_directory_uri() . '/css/owl.carousel.min.css');
    wp_enqueue_style('owl_carousel');
    wp_register_style('all', get_template_directory_uri() . '/css/all.css');
    wp_enqueue_style('all');
    wp_register_style('flaticon', get_template_directory_uri() . '/css/flaticon.css');
    wp_enqueue_style('flaticon');
    wp_register_style('themify_icons', get_template_directory_uri() . '/css/themify-icons.css');
    wp_enqueue_style('themify_icons');
    wp_register_style('magnific_popup', get_template_directory_uri() . '/css/magnific-popup.css');
    wp_enqueue_style('magnific_popup');
    wp_register_style('slick', get_template_directory_uri() . '/css/slick.css');
    wp_enqueue_style('slick');
    wp_register_style('style', get_template_directory_uri() . '/css/style.css');
    wp_enqueue_style('style');
}

add_action('wp_enqueue_scripts', 'my_theme_styles');

?>