<?php
	if(!(is_user_logged_in() || (is_user_logged_in() && is_admin_laravel()) || (is_user_logged_in() && is_technical_laravel()))) {
    	wp_redirect( get_page_link(get_page_by_title('AdminPanelIndex')->ID) . '?nopermision=true' );
	}
    /*
        Template name: CreateAccessPoint
    */
?>
<?php
    get_header('change');
?>
<?php
	$messages = [
		'technicalCreateError' => 'An error has occured. Check the data. <strong> Try again </strong>.'
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
    	                Adding Access Point
                    </h1>
    	            <div class="card mb-4">
    	                <div class="card-body">
    	                    <form method="POST" action="<?php echo get_home_url(); ?>/../accesspoint">
    	                    	<!--<input type="hidden" name="_token" id="token" value="<?php echo get_csrf_token_laravel(); ?>">-->
    	                    	<?php $_POST['csrf'] = get_csrf_token_laravel(); ?>
                                <div class="form-group row">
                                    <label for="model" class="col-md-4 col-form-label text-md-right">Model</label>
        
                                    <div class="col-md-6">
                                        <input id="model" type="text" class="form-control <?php if(isset($_GET['model'])) echo 'is-invalid'; ?>" name="model" value="<?php if(isset($_GET['model'])) { echo $_GET['model']; } ?>" required autocomplete="model" autofocus>
                                    </div>
                                </div>
        
                                <div class="form-group row">
                                    <label for="location" class="col-md-4 col-form-label text-md-right">Location Address</label>
        
                                    <div class="col-md-6">
                                        <input id="location" type="string" class="form-control <?php if(isset($_GET['location'])) echo 'is-invalid'; ?>" name="location" value="<?php if(isset($_GET['location'])) { echo $_GET['location']; } ?>" required autocomplete="location">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="latitude" class="col-md-4 col-form-label text-md-right">Latitude Address</label>
        
                                    <div class="col-md-6">
                                        <input id="latitude" type="string" class="form-control <?php if(isset($_GET['latitude'])) echo 'is-invalid'; ?>" name="latitude" value="<?php if(isset($_GET['latitude'])) { echo $_GET['latitude']; } ?>" required autocomplete="latitude">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="longitude" class="col-md-4 col-form-label text-md-right">Longitude Address</label>
        
                                    <div class="col-md-6">
                                        <input id="longitude" type="string" class="form-control <?php if(isset($_GET['longitude'])) echo 'is-invalid'; ?>" name="longitude" value="<?php if(isset($_GET['longitude'])) { echo $_GET['longitude']; } ?>" required autocomplete="longitude">
                                    </div>
                                </div>
                                
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Add AccessPoint
                                        </button>
                                    </div>
                                </div>
                            </form>
    	                </div>
    	            </div>
       	            <div class="col-md-4 col-centered text-center">
    	            	<a href="<?php echo get_page_link(get_page_by_title('IndexAccessPoints')->ID);?>" class="btn btn-primary">Go Back</a>
    	            </div>
	            </div>
	        </div>
	    </main>
	</div>
</div>
<?php
	get_footer('change');
?>