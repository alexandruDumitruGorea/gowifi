<?php
	if(is_user_logged_in() === false || (is_user_logged_in() && !is_admin_laravel())) {
    	wp_redirect( get_page_link(get_page_by_title('AdminPanelIndex')->ID) . '?nopermision=true' );
	}
    /*
        Template name: CreateTechnical
    */
?>
<?php
    get_header('change');
?>
<?php
	$messages = [
		'technicalCreateError' => 'Creation failed. <strong> Review the data</strong>.'
	];
?>
<div id="layoutSidenav">
	<div id="layoutSidenav_nav">
	    <?php get_template_part('nav-admin'); ?>
	</div>
	<div id="layoutSidenav_content">
		<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
		    <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button><!-- Navbar Search-->
		</nav>
	    <main>
	        <div class="container-fluid">
	            <?php
	            	if ( isset($_GET['technicalCreateError']) && isset($messages['technicalCreateError'])) {
	            ?>
		            	<div class="col-xl-12 col-md-12 mt-4" id="custom-message">
		                    <div class="card bg-danger text-white mb-4">
		                        <div class="card-body"><?php echo $messages['technicalCreateError']; ?></div>
		                    </div>
		                </div>
	            <?php
	            	}
	            ?>
	            <div class="col-md-6 col-centered">
    	            <h1 class="mt-4">
    	                Adding Technical
                    </h1>
    	            <div class="card mb-4">
    	                <div class="card-body">
    	                    <form method="POST" action="<?php echo get_home_url(); ?>/../technical">
    	                    	<!--<input type="hidden" name="_token" id="token" value="<?php echo get_csrf_token_laravel(); ?>">-->
    	                    	<?php $_POST['csrf'] = get_csrf_token_laravel(); ?>
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
        
                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control <?php if(isset($_GET['oldname'])) echo 'is-invalid'; ?>" name="name" value="<?php if(isset($_GET['oldname'])) { echo $_GET['oldname']; } ?>" required autocomplete="name" autofocus>
                                    </div>
                                </div>
        
                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
        
                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control <?php if(isset($_GET['oldemail'])) echo 'is-invalid'; ?>" name="email" value="<?php if(isset($_GET['oldemail'])) { echo $_GET['oldemail']; } ?>" required autocomplete="email">
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Add Technical
                                        </button>
                                    </div>
                                </div>
                            </form>
    	                </div>
    	            </div>
    	            <div class="col-md-4 col-centered text-center">
    	            	<a href="<?php echo get_page_link(get_page_by_title('IndexTechnicians')->ID);?>" class="btn btn-primary">Go Back</a>
    	            </div>
	            </div>
	        </div>
	    </main>
	</div>
</div>
<?php
	get_footer('change');
?>