<?php

require('custom-functions/styles.php');

require('custom-functions/scripts.php');

// API custom endpoints for WP-REST API
function register_api_hooks() {

    register_rest_route(
        'custom-plugin', '/login/',
        array(
            'methods'  => array('GET', 'POST'),
            'callback' => 'login',
        )
    );
    
    function login($request){
        $creds = array();
        $creds['user_login'] = $request["username"];
        $creds['user_password'] =  $request["password"];
        $creds['remember'] = true;
        $user = wp_signon( $creds, false );
    
        if (is_wp_error($user)) {
          $user = "fuck";
        }
        return $user;
    }
}
add_action( 'rest_api_init', 'register_api_hooks' );

// http://informatica.ieszaidinvergeles.org:9028/gowifi/public/wp/wp-json/custom-plugin/login
// http://informatica.ieszaidinvergeles.org:9028/gowifi/public/wp/wp-json/custom-plugin/login?username=gowifiadmin&password=gowifi-WP-2020

?>