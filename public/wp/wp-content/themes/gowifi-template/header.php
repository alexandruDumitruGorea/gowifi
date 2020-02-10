<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ecobit</title>
    <link rel="icon" href="<?php echo get_template_directory_uri();?>/img/favicon.png">
    <?php
		wp_head();
	?>
</head>
<body>
    <!--::header part start::-->
    <header class="main_menu">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand main_logo" href="index.html"> <img src="<?php echo get_template_directory_uri();?>/img/logo-text.svg" alt="logo"> </a>
                        <a class="navbar-brand single_page_logo" href="index.html"> <img src="<?php echo get_template_directory_uri();?>/img/logo-text-negro.svg" alt="logo"> </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="menu_icon"></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo get_home_url() . '/../nini'; ?>">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="features.html">features</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pricing.html">pricing</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="blog.html">Blog</a>
                                </li>                                
                                <li class="nav-item">
                                    <a class="nav-link" href="contact.html">Contact</a>
                                </li>
                            </ul>
                        </div>
                        <a href="#" class="d-none d-sm-block btn_1 home_page_btn">sing up</a>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!--::Header part end::-->