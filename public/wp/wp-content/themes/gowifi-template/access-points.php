<?php
	if(is_user_logged_in() === false) {
    	wp_redirect( home_url() );
	}
    /*
        Template name: UserAccessPoints
    */
?>
<?php
    get_header('change');
?>
<?php
	$messages = [
		'connection' => 'Te has conectado.',
		'connectionError' => 'Ha habido un error en la conexión',
	];
?>
<div id="layoutSidenav" class="sin-m">
	<div id="layoutSidenav_content">
	    <main>
	        <div class="col-lg-8 col-md-12 col-sm-12 col-centered">
	    	<?php
            	if ( isset($_GET['connection']) && isset($messages['connection'])) {
            ?>
	            	<div class="col-xl-12 col-md-12 mt-4" id="custom-message">
	                    <div class="card bg-success text-white mb-4">
	                        <div class="card-body"><?php echo $messages['connection']; ?></div>
	                    </div>
	                </div>
            <?php
            	}
            	if ( isset($_GET['connectionError']) && isset($messages['connectionError'])) {
            ?>
	            	<div class="col-xl-12 col-md-12 mt-4" id="custom-message">
	                    <div class="card bg-danger text-white mb-4">
	                        <div class="card-body"><?php echo $messages['connectionError']; ?></div>
	                    </div>
	                </div>
            <?php
            	}
            ?>
	            <h1 class="mt-4">
	                Connect To Access Points
                </h1>
	            <div class="card mb-4">
	                <div class="card-body">
	                    <div class="table-responsive">
	                        <table class="table table-bordered" id="dataTableUserAccessPoints" width="100%" cellspacing="0">
	                            <thead>
	                                <tr>
	                                	<th>#</th>
	                                    <th>Location</th>
	                                    <th>Latitude</th>
	                                    <th>Longitude</th>
	                                    <th>Connection</th>
	                                </tr>
	                            </thead>
	                            <tfoot>
	                                <tr>
	                                	<th>#</th>
	                                    <th>Location</th>
	                                    <th>Latitude</th>
	                                    <th>Longitude</th>
	                                    <th>Connection</th>
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
	get_footer();
?>