<nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand main_logo" href="<?php echo get_option("Home"); ?>"> <img src="<?php echo get_template_directory_uri();?>/img/logo-text.svg" alt="logo"> </a>
    <a class="navbar-brand single_page_logo" href="<?php echo get_option("Home"); ?>"> <img src="<?php echo get_template_directory_uri();?>/img/logo-text.svg" alt="logo"> </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse"
        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="menu_icon"></span>
    </button>
    <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo get_option("Home"); ?>">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo get_option("Home"); ?>#whyus">why choose us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo get_option("Home"); ?>#faqs">Faqs</a>
            </li>                                
            <li class="nav-item">
                <a class="nav-link" href="<?php echo get_option("Home"); ?>#contact">Contact</a>
            </li>
            <?php
            if(is_user_logged_in()) {
            ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo get_page_link(get_page_by_title('UserAccessPoints')->ID);?>">Access Points</a>
                </li>
            <?php
            }
            ?>
        </ul>
    <?php echo do_shortcode('[gtranslate]'); ?>
    </div>
    <?php
        if(is_user_logged_in()) {
            if(is_technical_laravel() || is_admin_laravel()) {
            ?>
                <a href="<?php echo get_page_link(get_page_by_title('AdminPanelIndex')->ID);?>" class="d-sm-block btn_1 btn_1-noborde home_page_btn">Admin</a>
            <?php
            }
            ?>
            <a href="<?php echo get_home_url(); ?>/../logout" class="d-sm-block btn_1 home_page_btn">Log out</a>
        <?php
        } else {
        ?>
            <a href="<?php echo get_home_url() . '/wp-login.php'; ?>" class="d-sm-block btn_1 btn_1-noborde home_page_btn">login</a>
            <a href="<?php echo get_page_link(get_page_by_title('Register')->ID);?>" class="d-sm-block btn_1 home_page_btn">Register</a>
        <?php
        }
    ?>
</nav>