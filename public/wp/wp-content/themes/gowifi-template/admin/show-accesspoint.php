<?php
	if(!(is_user_logged_in() || (is_user_logged_in() && is_admin_laravel()) || (is_user_logged_in() && is_technical_laravel()))) {
    	wp_redirect( get_page_link(get_page_by_title('AdminPanelIndex')->ID) . '?nopermision=true' );
	}
    /*
        Template name: ShowAccessPoints
    */
?>
<?php
    get_header('change');
?>
<?php
	$messages = [
		'accesspointCreate' => 'Se ha creado un punto de acceso.'
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
	            <div class="col-md-6 col-centered">
    	            <h1 class="mt-4">
    	                Access Point <?php echo $_GET['id']; ?>
                    </h1>
    	            <div class="card mb-4">
    	                <div class="card-body">
                                <div class="form-group row">
                                    <label for="model" class="col-md-4 col-form-label text-md-right">Model</label>
                                    <div class="col-md-6">
                                        <?php echo $_GET['model']; ?>
                                    </div>
                                </div>
        
                                <div class="form-group row">
                                    <label for="location" class="col-md-4 col-form-label text-md-right">Location Address</label>
        
                                    <div class="col-md-6">
                                        <?php echo $_GET['location']; ?>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="latitude" class="col-md-4 col-form-label text-md-right">Latitude Address</label>
        
                                    <div class="col-md-6">
                                        <?php echo $_GET['latitude']; ?>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="longitude" class="col-md-4 col-form-label text-md-right">Longitude Address</label>
        
                                    <div class="col-md-6">
                                        <?php echo $_GET['longitude']; ?>
                                    </div>
                                </div>
    	                </div>
    	            </div>
    	            <div class="col-md-4 col-centered text-center">
    	                <a href="<?php echo get_page_link(get_page_by_title('IndexAccessPoints')->ID);?>" class="btn btn-primary">Go Back</a>
    	            </div>
	        </div>
	    </main>
	</div>
</div>

<?php
	get_footer('change');
?>