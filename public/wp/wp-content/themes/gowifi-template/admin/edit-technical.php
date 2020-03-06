<?php
	if(is_user_logged_in() === false || (is_user_logged_in() && !is_admin_laravel())) {
    	wp_redirect( get_page_link(get_page_by_title('AdminPanelIndex')->ID) . '?nopermision=true' );
	}
    /*
        Template name: EditTechnical
    */
?>
<?php
    get_header('change');
?>
<?php
	$messages = [
		'errorEdit' => 'There was an error.'
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
	            	if ( isset($_GET['errorEdit']) && isset($messages['errorEdit'])) {
	            ?>
		            	<div class="col-xl-12 col-md-12 mt-4" id="custom-message">
		                    <div class="card bg-danger text-white mb-4">
		                        <div class="card-body"><?php echo $messages['errorEdit']; ?></div>
		                    </div>
		                </div>
	            <?php
	            	}
	            ?>
	            <div class="col-md-6 col-centered">
    	            <h1 class="mt-4">
    	                Editing Technical
                    </h1>
    	            <div class="card mb-4">
    	                <div class="card-body">
    	                    <form method="POST" action="<?php echo get_home_url(); ?>/../technical/<?php echo $_GET['id']; ?>">
    	                    	<input type="hidden" name="_method" value="PUT">
    	                    	<input id="id" type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
        
                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
        
                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control <?php if(isset($_GET['oldemail'])) echo 'is-invalid'; ?>" name="email" value="<?php if(isset($_GET['oldemail'])) { echo $_GET['oldemail']; } ?>" required autocomplete="email">
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Edit Technical
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