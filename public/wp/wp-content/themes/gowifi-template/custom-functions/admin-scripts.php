<?php

function my_theme_scripts_admin() {
    wp_register_script('datatables_demo', get_template_directory_uri() . '/js/datatables-demo.js', array('jquery'), null, true);
    wp_enqueue_script('datatables_demo');
    wp_register_script('datatables_jquery', get_template_directory_uri() . '/js/datatables-jquery.js', array('jquery'), null, true);
    wp_enqueue_script('datatables_jquery');
    wp_register_script('datatables_bootstrap', get_template_directory_uri() . '/js/datatables-boostrap.js', array('jquery'), null, true);
    wp_enqueue_script('datatables_bootstrap');
    wp_register_script('chart', get_template_directory_uri() . '/js/chart.min.js', array('jquery'), null, true);
    wp_enqueue_script('chart');
    wp_register_script('charts_demo', get_template_directory_uri() . '/js/charts-demo.js', array('jquery'), null, true);
    wp_enqueue_script('charts_demo');
    wp_register_script('scripts_admin', get_template_directory_uri() . '/js/scripts-admin.js', array('jquery'), null, true);
    wp_enqueue_script('scripts_admin');
}

add_action('wp_enqueue_scripts', 'my_theme_scripts_admin');

?>