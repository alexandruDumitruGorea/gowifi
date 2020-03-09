<?php
	if(!(is_user_logged_in() || (is_user_logged_in() && is_admin_laravel()) || (is_user_logged_in() && is_technical_laravel()))) {
    	wp_redirect( get_page_link(get_page_by_title('AdminPanelIndex')->ID) . '?nopermision=true' );
	}
    /*
        Template name: IndexActiveHours
    */
?>
<?php
    get_header('change');
?>
<?php
	$messages = [
		'activeHourCreate' => 'An active time has been created.',
		'activeHourDelete' => 'An active time has been deleted.'
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
	            	if ( isset($_GET['activeHourCreate']) && isset($messages['activeHourCreate'])) {
	            ?>
		            	<div class="col-xl-12 col-md-12 mt-4" id="custom-message">
		                    <div class="card bg-success text-white mb-4">
		                        <div class="card-body"><?php echo $messages['activeHourCreate']; ?></div>
		                    </div>
		                </div>
	            <?php
	            	}
	            	
	            	if ( isset($_GET['activeHourDelete']) && isset($messages['activeHourDelete'])) {
	            ?>
		            	<div class="col-xl-12 col-md-12 mt-4" id="custom-message">
		                    <div class="card bg-success text-white mb-4">
		                        <div class="card-body"><?php echo $messages['activeHourDelete']; ?></div>
		                    </div>
		                </div>
	            <?php
	            	}
	            ?>
	            <h1 class="mt-4">
	                Active Hours
	                <a href="<?php echo get_page_link(get_page_by_title('CreateActiveHour')->ID);?>" class="btn btn-primary ml-2">Add Active Hour</a>
                </h1>
	            <div class="card mb-4">
	                <div class="card-body">
	                    <div class="table-responsive">
	                        <table class="table table-bordered" id="dataTableActiveHours" width="100%" cellspacing="0">
	                            <thead>
	                                <tr>
	                                	<th>#</th>
	                                    <th>Start Date</th>
	                                    <th>End Date</th>
	                                    <th>Start Hour</th>
	                                    <th>End Hour</th>
	                                    <th>Minium Period</th>
	                                    <th>Delete</th>
	                                </tr>
	                            </thead>
	                            <tfoot>
	                                <tr>
	                                	<th>#</th>
	                                    <th>Start Date</th>
	                                    <th>End Date</th>
	                                    <th>Start Hour</th>
	                                    <th>End Hour</th>
	                                    <th>Minium Period</th>
	                                    <th>Delete</th>
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
	echo "<p style='display:none' id='apiToken'>".get_api_token_laravel()."</p>";
	get_footer('change');
?>