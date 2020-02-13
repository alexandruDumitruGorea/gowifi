<?php

function my_theme_scripts() {
    // <!--<script src="js/jquery-1.12.1.min.js"></script>-->
    // wp_register_script('jquery', get_template_directory_uri() . '/js/jquery.js', array(''), null, true);
    wp_enqueue_script('jquery');
    wp_register_script('popper', get_template_directory_uri() . '/js/popper.min.js', array('jquery'), null, true);
    wp_enqueue_script('popper');
    wp_register_script('bootstrap_js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), null, true);
    wp_enqueue_script('bootstrap_js');
    wp_register_script('jquery_magnific_popup', get_template_directory_uri() . '/js/jquery.magnific-popup.js', array('jquery'), null, true);
    wp_enqueue_script('jquery_magnific_popup');
    wp_register_script('swiper', get_template_directory_uri() . '/js/swiper.min.js', array('jquery'), null, true);
    wp_enqueue_script('swiper');
    wp_register_script('masonry_theme', get_template_directory_uri() . '/js/masonry.pkgd.js', array('jquery'), null, true);
    wp_enqueue_script('masonry_theme');
    wp_register_script('owl_carousel_min', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), null, true);
    wp_enqueue_script('owl_carousel_min');
    wp_register_script('jquery_nice_select', get_template_directory_uri() . '/js/jquery.nice-select.min.js', array('jquery'), null, true);
    wp_enqueue_script('jquery_nice_select');
    wp_register_script('slick', get_template_directory_uri() . '/js/slick.min.js', array('jquery'), null, true);
    wp_enqueue_script('slick');
    wp_register_script('jquery_counterup', get_template_directory_uri() . '/js/jquery.counterup.min.js', array('jquery'), null, true);
    wp_enqueue_script('jquery_counterup');
    wp_register_script('waypoints', get_template_directory_uri() . '/js/waypoints.min.js', array('jquery'), null, true);
    wp_enqueue_script('waypoints');
    // wp_register_script('contact', get_template_directory_uri() . '/js/contact.js', array('jquery'), null, true);
    // wp_enqueue_script('contact');
    // wp_register_script('jquery_ajaxchimp', get_template_directory_uri() . '/js/jquery.ajaxchimp.min.js', array('jquery'), null, true);
    // wp_enqueue_script('jquery_ajaxchimp');
    // wp_register_script('jquery_form', get_template_directory_uri() . '/js/jquery.form.js', array('jquery'), null, true);
    // wp_enqueue_script('jquery_form');
    // wp_register_script('jquery_validate', get_template_directory_uri() . '/js/jquery.validate.min.js', array('jquery'), null, true);
    // wp_enqueue_script('jquery_validate');
    // wp_register_script('mail_script', get_template_directory_uri() . '/js/mail-script.js', array('jquery'), null, true);
    // wp_enqueue_script('mail_script');
    wp_register_script('custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), null, true);
    wp_enqueue_script('custom');
}

add_action('wp_enqueue_scripts', 'my_theme_scripts');

?>