<?php
function adapt_header_for_wpadminbar() {
    echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                document.querySelector('.main_menu-wp').classList.add('wpadminbaractive');
            })
            window.addEventListener('scroll', function(){
                document.querySelector('.menu_fixed').classList.add('wpadminbaractive');
            });
        </script>";
}

//Ocultar admin bar a todos los suscriptores, 
function bld_ocultar_admin_bar() {
    if (current_user_can('subscriber')) {
        add_filter( 'show_admin_bar', '__return_false' );
    } else {
        if(is_user_logged_in()) {
            add_action('init', 'adapt_header_for_wpadminbar');
        }
    }
}
add_action('after_setup_theme', 'bld_ocultar_admin_bar');

function custom_login_error_message() {
    return "Yikes, that wasn't quite right. Please try again.";
}

add_filter('login_errors', 'custom_login_error_message');

function get_laravel_user() {
    $url = 'http://informatica.ieszaidinvergeles.org:9028/gowifi/public/role';
    $ch = curl_init($url);
    $datawp = array(
        'email' => wp_get_current_user()->user_email
    );
    $payload = json_encode($datawp);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);
    $users = json_decode($result);
    foreach($users as $u) {
        $user = $u[0];
    }
    return $user;
}

function is_technical_laravel() {
    $rol = get_laravel_user()->rol_id;
    return $rol == 2;
}

function is_admin_laravel() {
    $rol = get_laravel_user()->rol_id;
    return $rol == 1;
}

function get_api_token_laravel() {
    return get_laravel_user()->api_token;
}

function get_csrf_token_laravel() {
    $url = 'http://informatica.ieszaidinvergeles.org:9028/gowifi/public/csrfToken';
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);
    $result = json_decode($result); 
    return $result->csrf;
}
?>