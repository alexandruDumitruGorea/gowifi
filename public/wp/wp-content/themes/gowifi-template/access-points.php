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
		'technicalCreate' => 'Se ha creado un técnico.'
	];
	var_dump();
?>
<div id="layoutSidenav">
	<div id="layoutSidenav_content">
	    <main>
	        <div class="col-md-8 col-sm-12 col-centered">
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