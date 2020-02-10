<?php

require('custom-functions/styles.php');

require('custom-functions/scripts.php');

// API custom endpoints for WP-REST API
function register_api_hooks() {

    register_rest_route(
        'custom-plugin', '/login/',
        array(
            'methods'  => 'GET',
            'callback' => 'login',
        )
    );

    function login() {

        $output = array(get_home_url());

        // Your logic goes here.
        return $output;

    }
}
add_action( 'rest_api_init', 'register_api_hooks' );

// http://informatica.ieszaidinvergeles.org:9028/gowifi/public/wp/wp-json/custom-plugin/login?fuck=%22jaja

?>