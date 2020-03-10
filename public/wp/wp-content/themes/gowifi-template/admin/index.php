<?php
	if(!(is_user_logged_in() || (is_user_logged_in() && is_admin_laravel()) || (is_user_logged_in() && is_technical_laravel()))) {
    	wp_redirect( home_url() );
	}
    /*
        Template name: AdminPanelIndex
    */
?>
<?php
    get_header('change');
?>
<?php
	$messages = [
		'nopermision' => 'You do not have permission to access.'
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
	            ?>
	            <h1 class="mt-4">Dashboard</h1>
	            <div class="row">
		            <div class="col-xl-6 col-lg-6 col-md-6 col-xs-12">
	                    <div class="card mb-4">
	                        <div class="card-header"><i class="fas fa-chart-bar mr-1"></i>Nº Connections By Month</div>
	                        <div class="card-body"><canvas id="numConnectionsByMonth" width="100%" height="40"></canvas></div>
	                    </div>
	                </div>
		            <div class="col-xl-6 col-lg-6 col-md-6 col-xs-12">
	                    <div class="card mb-4">
	                        <div class="card-header"><i class="fas fa-chart-bar mr-1"></i>Nº Access Point Installation By Technical</div>
	                        <div class="card-body"><canvas id="numAccessPointByTechnical" width="100%" height="40"></canvas></div>
	                    </div>
	                </div>
	            </div>
	            <div class="row" id="chartsConnectionByLocationContainer">
		            <div class="col-xl-4 col-lg-4 col-md-4 col-xs-12">
	                    <div class="card mb-4">
	                        <div class="card-header"><i class="fas fa-chart-bar mr-1"></i>Nº Connections By Location</div>
	                        <div class="card-body"><canvas id="numConnectionsByLocation" width="100%" height="40"></canvas></div>
	                    </div>
	                </div>
	            </div>
	            <div class="row">
		            <div class="col-xl-6 col-lg-6 col-md-6 col-xs-12">
	                    <div class="card mb-4">
	                        <div class="card-header"><i class="fas fa-chart-bar mr-1"></i>Nº Connections By Model</div>
	                        <div class="card-body"><canvas id="numConnectionsByModel" width="100%" height="40"></canvas></div>
	                    </div>
	                </div>
		            <div class="col-xl-6 col-lg-6 col-md-6 col-xs-12">
	                    <div class="card mb-4">
	                        <div class="card-header"><i class="fas fa-chart-bar mr-1"></i>Nº Connections By Location</div>
	                        <div class="card-body"><canvas id="numAccessPointByLocation" width="100%" height="40"></canvas></div>
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