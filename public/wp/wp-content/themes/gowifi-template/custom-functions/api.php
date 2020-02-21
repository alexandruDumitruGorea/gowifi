<?php

function logout() {
    wp_logout();
    wp_redirect( home_url() ); exit;
}

// API custom endpoints for WP-REST API
function register_api_hooks() {

    register_rest_route(
        'custom-api', '/login/',
        array(
            'methods'  => array('GET', 'POST'),
            'callback' => 'login',
        )
    );
    
    register_rest_route(
        'custom-api', '/register/',
        array(
            'methods'  => array('GET', 'POST'),
            'callback' => 'register',
        )
    );
    
    register_rest_route(
        'custom-api', '/logout/',
        array(
            'methods'  => 'GET',
            'callback' => 'logout',
        )
    );
    
    register_rest_route(
        'custom-api', '/resetpassword/',
        array(
            'methods'  => array('GET', 'POST'),
            'callback' => 'resetpassword',
        )
    );
    
    function login($request){
        $userLaravel = get_user_by( 'email', $request['email'] );
        $creds = array();
        $creds['user_login'] = $userLaravel->user_login;
        $creds['user_password'] =  $request["password"];
        $creds['remember'] = true;
        $user = wp_signon( $creds, false );
    
        if (is_wp_error($user)) {
          $user = "Se ha producido un error al iniciar sesión";
        }
        wp_redirect( home_url() ); exit;
    }
    
    function register($request) {
        $user = wp_create_user($request['username'], $request['password'], $request['email']);
        if (is_wp_error($user)) {
          $user = "Se ha producido un error al registrar un usuario";
        }
        return $user;
    }
    
    function resetpassword($request) {
        $userLaravel = get_user_by( 'email', $request['email'] );
        $pass = $request['password'];
        wp_set_password($pass, $userLaravel->ID);
        wp_redirect( home_url() ); exit;
    }
}
add_action( 'rest_api_init', 'register_api_hooks' );

// http://informatica.ieszaidinvergeles.org:9028/gowifi/public/wp/wp-json/custom-api/login
// http://informatica.ieszaidinvergeles.org:9028/gowifi/public/wp/wp-json/custom-api/login?username=gowifiadmin&password=gowifi-WP-2020

?>