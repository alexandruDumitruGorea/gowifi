    <?php
		wp_head();
	?>
	<head>
	    <title>GoWifi</title>
        <link rel="icon" href="<?php echo get_template_directory_uri();?>/img/logo.png">
    </head>
    <!--::header part start::-->
    <header class="main_menu main_menu-laravel main_menu-wp">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <?php get_template_part('nav-change'); ?>
                </div>
            </div>
        </div>
    </header>
    <!--::Header part end::-->