<?php
	if(!(is_user_logged_in() || (is_user_logged_in() && is_admin_laravel()) || (is_user_logged_in() && is_technical_laravel()))) {
    	wp_redirect( get_page_link(get_page_by_title('AdminPanelIndex')->ID) . '?nopermision=true' );
	}
    /*
        Template name: DisabledAccessPoints
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
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Borrar</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        	<input id="id" type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        ¿Está seguro de que quiere borrar?
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
	        <form id="formBorrar" action="../../accesspoint/" method="post">
	          <input type="hidden" name="_method" value="DELETE">
	          <input type="submit" value="Si" class="btn btn-danger">
	        </form>
	      </div>
	    </div>
	  </div>
	</div>
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
	            	if ( isset($_GET['disabledAccesspointCreate']) && isset($messages['disabledAccesspointCreate'])) {
	            ?>
		            	<div class="col-xl-12 col-md-12 mt-4" id="custom-message">
		                    <div class="card bg-success text-white mb-4">
		                        <div class="card-body"><?php echo $messages['disabledAccesspointCreate']; ?></div>
		                    </div>
		                </div>
	            <?php
	            	}
	            ?>
	            <h1 class="mt-4">
	                Disabled Access Points
                </h1>
	            <div class="card mb-4">
	                <div class="card-body">
	                    <div class="table-responsive">
	                        <table class="table table-bordered" id="dataTableDisabledAccessPoints" width="100%" cellspacing="0">
	                            <thead>
	                                <tr>
	                                	<th>#</th>
	                                    <th>Id Technical</th>
	                                    <th>Model</th>
	                                    <th>Location</th>
	                                    <th>Enable</th>
	                                </tr>
	                            </thead>
	                            <tfoot>
	                                <tr>
	                                	<th>#</th>
	                                    <th>Id Technical</th>
	                                    <th>Model</th>
	                                    <th>Location</th>
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