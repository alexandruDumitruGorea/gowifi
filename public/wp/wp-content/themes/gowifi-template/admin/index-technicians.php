<?php
	if(is_user_logged_in() === false || (is_user_logged_in() && !is_admin_laravel())) {
    	wp_redirect( get_page_link(get_page_by_title('AdminPanelIndex')->ID) . '?nopermision=true' );
	}
    /*
        Template name: IndexTechnicians
    */
?>
<?php
    get_header('change');
?>
<?php
	$messages = [
		'nopermision' => 'No tienes permiso para acceder.',
		'technicalCreate' => 'Se ha creado un técnico.'
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
	            	if ( isset($_GET['technicalCreate']) && isset($messages['technicalCreate'])) {
	            ?>
		            	<div class="col-xl-12 col-md-12 mt-4" id="custom-message">
		                    <div class="card bg-success text-white mb-4">
		                        <div class="card-body"><?php echo $messages['technicalCreate']; ?></div>
		                    </div>
		                </div>
	            <?php
	            	}
	            ?>
	            <h1 class="mt-4">
	                Technicians
	                <a href="<?php echo get_page_link(get_page_by_title('CreateTechnical')->ID);?>" class="btn btn-primary ml-2">Add Technical</a>
                </h1>
	            <!--<div class="row">-->
	            <!--    <div class="col-xl-3 col-md-6">-->
	            <!--        <div class="card bg-primary text-white mb-4">-->
	            <!--            <div class="card-body">Primary Card</div>-->
	            <!--            <div class="card-footer d-flex align-items-center justify-content-between">-->
	            <!--                <a class="small text-white stretched-link" href="#">View Details</a>-->
	            <!--                <div class="small text-white"><i class="fas fa-angle-right"></i></div>-->
	            <!--            </div>-->
	            <!--        </div>-->
	            <!--    </div>-->
	            <!--    <div class="col-xl-3 col-md-6">-->
	            <!--        <div class="card bg-warning text-white mb-4">-->
	            <!--            <div class="card-body">Warning Card</div>-->
	            <!--            <div class="card-footer d-flex align-items-center justify-content-between">-->
	            <!--                <a class="small text-white stretched-link" href="#">View Details</a>-->
	            <!--                <div class="small text-white"><i class="fas fa-angle-right"></i></div>-->
	            <!--            </div>-->
	            <!--        </div>-->
	            <!--    </div>-->
	            <!--    <div class="col-xl-3 col-md-6">-->
	            <!--        <div class="card bg-success text-white mb-4">-->
	            <!--            <div class="card-body">Success Card</div>-->
	            <!--            <div class="card-footer d-flex align-items-center justify-content-between">-->
	            <!--                <a class="small text-white stretched-link" href="#">View Details</a>-->
	            <!--                <div class="small text-white"><i class="fas fa-angle-right"></i></div>-->
	            <!--            </div>-->
	            <!--        </div>-->
	            <!--    </div>-->
	            <!--    <div class="col-xl-3 col-md-6">-->
	            <!--        <div class="card bg-danger text-white mb-4">-->
	            <!--            <div class="card-body">Danger Card</div>-->
	            <!--            <div class="card-footer d-flex align-items-center justify-content-between">-->
	            <!--                <a class="small text-white stretched-link" href="#">View Details</a>-->
	            <!--                <div class="small text-white"><i class="fas fa-angle-right"></i></div>-->
	            <!--            </div>-->
	            <!--        </div>-->
	            <!--    </div>-->
	            <!--</div>-->
	            <div class="card mb-4">
	                <div class="card-body">
	                    <div class="table-responsive">
	                        <table class="table table-bordered" id="dataTableTechnicians" width="100%" cellspacing="0">
	                            <thead>
	                                <tr>
	                                    <th>#</th>
	                                    <th>Name</th>
	                                    <th>Email</th>
	                                    <th>Active</th>
	                                    <th>Edit</th>
	                                    <th>Delete</th>
	                                </tr>
	                            </thead>
	                            <tfoot>
	                                <tr>
	                                    <th>#</th>
	                                    <th>Name</th>
	                                    <th>Email</th>
	                                    <th>View</th>
	                                    <th>Active</th>
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
	get_footer('change');
?>