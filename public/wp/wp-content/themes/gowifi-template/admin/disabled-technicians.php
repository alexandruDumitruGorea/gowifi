<?php
	if(is_user_logged_in() === false || (is_user_logged_in() && !is_admin_laravel())) {
    	wp_redirect( get_page_link(get_page_by_title('AdminPanelIndex')->ID) . '?nopermision=true' );
	}
    /*
        Template name: DisabledTechnicians
    */
?>
<?php
    get_header('change');
?>
<?php
	$messages = [
		'nopermision' => 'You do not have permission to access.',
		'enabled' => 'A technician has been enabled.'
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
	            	if ( isset($_GET['nopermision']) && isset($messages['nopermision'])) {
	            ?>
		            	<div class="col-xl-12 col-md-12 mt-4" id="custom-message">
		                    <div class="card bg-danger text-white mb-4">
		                        <div class="card-body"><?php echo $messages['nopermision']; ?></div>
		                    </div>
		                </div>
	            <?php
	            	}
	            	if ( isset($_GET['enabled']) && isset($messages['enabled'])) {
	            ?>
		            	<div class="col-xl-12 col-md-12 mt-4" id="custom-message">
		                    <div class="card bg-success text-white mb-4">
		                        <div class="card-body"><?php echo $messages['enabled']; ?></div>
		                    </div>
		                </div>
	            <?php
	            	}
	            ?>
	            <h1 class="mt-4">
	                Disabled Technicians
                </h1>
	            <div class="card mb-4">
	                <div class="card-body">
	                    <div class="table-responsive">
	                        <table class="table table-bordered" id="dataTableDisabledTechnicians" width="100%" cellspacing="0">
	                            <thead>
	                                <tr>
	                                    <th>#</th>
	                                    <th>Name</th>
	                                    <th>Email</th>
	                                    <th>Active</th>
	                                    <th>Enable</th>
	                                </tr>
	                            </thead>
	                            <tfoot>
	                                <tr>
	                                    <th>#</th>
	                                    <th>Name</th>
	                                    <th>Email</th>
	                                    <th>View</th>
	                                    <th>Enable</th>
	                                </tr>
	                            </tfoot>
	                        </table>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </main>
	</div>
</div>
<?php
	get_footer('change');
?>