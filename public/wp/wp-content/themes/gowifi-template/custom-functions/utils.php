<?php

//Ocultar admin bar a todos los suscriptores, 
function bld_ocultar_admin_bar() {
    if (current_user_can('subscriber')) {
        add_filter( 'show_admin_bar', '__return_false' );
    }
}
add_action('after_setup_theme', 'bld_ocultar_admin_bar');

function custom_login_error_message() {
    return "Yikes, that wasn't quite right. Please try again.";
}

add_filter('login_errors', 'custom_login_error_message');

?>