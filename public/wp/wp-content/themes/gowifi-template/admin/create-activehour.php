<?php
	if(!(is_user_logged_in() || (is_user_logged_in() && is_admin_laravel()) || (is_user_logged_in() && is_technical_laravel()))) {
    	wp_redirect( get_page_link(get_page_by_title('AdminPanelIndex')->ID) . '?nopermision=true' );
	}
    /*
        Template name: CreateActiveHour
    */
?>
<?php
    get_header('change');
?>
<?php
	$messages = [
		'errorCreateActiveHour' => 'Creation failed. <strong> Review the data</strong>.',
		'starDateProblem' => "The start date must be equal to or greater than today's date.",
		'endHourProblem' => 'The end time must be greater than the start time.',
		'dateExists' => 'This date range already exists.',
		'hourExistsInDate' => 'That time already exists in a range of dates.',
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
	            	if ( isset($_GET['errorCreateActiveHour']) && isset($messages['errorCreateActiveHour'])) {
	            ?>
		            	<div class="col-xl-12 col-md-12 mt-4" id="custom-message">
		                    <div class="card bg-danger text-white mb-4">
		                        <div class="card-body"><?php echo $messages['errorCreateActiveHour']; ?></div>
		                    </div>
		                </div>
	            <?php
	            	}
	            	if ( isset($_GET['starDateProblem']) && isset($messages['starDateProblem'])) {
	            ?>
		            	<div class="col-xl-12 col-md-12 mt-4" id="custom-message">
		                    <div class="card bg-danger text-white mb-4">
		                        <div class="card-body"><?php echo $messages['starDateProblem']; ?></div>
		                    </div>
		                </div>
	            <?php
	            	}
	            	if ( isset($_GET['endHourProblem']) && isset($messages['endHourProblem'])) {
	            ?>
		            	<div class="col-xl-12 col-md-12 mt-4" id="custom-message">
		                    <div class="card bg-danger text-white mb-4">
		                        <div class="card-body"><?php echo $messages['endHourProblem']; ?></div>
		                    </div>
		                </div>
	            <?php
	            	}
	            	if ( isset($_GET['dateExists']) && isset($messages['dateExists'])) {
	            ?>
		            	<div class="col-xl-12 col-md-12 mt-4" id="custom-message">
		                    <div class="card bg-danger text-white mb-4">
		                        <div class="card-body"><?php echo $messages['dateExists']; ?></div>
		                    </div>
		                </div>
	            <?php
	            	}
	            	if ( isset($_GET['hourExistsInDate']) && isset($messages['hourExistsInDate'])) {
	            ?>
		            	<div class="col-xl-12 col-md-12 mt-4" id="custom-message">
		                    <div class="card bg-danger text-white mb-4">
		                        <div class="card-body"><?php echo $messages['hourExistsInDate']; ?></div>
		                    </div>
		                </div>
	            <?php
	            	}
	            ?>
	            <div class="col-md-6 col-centered">
    	            <h1 class="mt-4">
    	                Adding Active Hour
                    </h1>
    	            <div class="card mb-4">
    	                <div class="card-body">
    	                    <form method="POST" action="<?php echo get_home_url(); ?>/../activehour">
                                <div class="form-group row">
                                    <label for="start_date" class="col-md-4 col-form-label text-md-right">Start Date</label>
        
                                    <div class="col-md-6">
                                        <input id="start_date" type="date" class="form-control <?php if(isset($_GET['start_date'])) echo 'is-invalid'; ?>" name="start_date" value="<?php if(isset($_GET['start_date'])) { echo $_GET['start_date']; } ?>" required autocomplete="start_date" autofocus>
                                    </div>
                                </div>
        
                                <div class="form-group row">
                                    <label for="end_date" class="col-md-4 col-form-label text-md-right">End Date</label>
        
                                    <div class="col-md-6">
                                        <input id="end_date" type="date" class="form-control <?php if(isset($_GET['end_date'])) echo 'is-invalid'; ?>" name="end_date" value="<?php if(isset($_GET['end_date'])) { echo $_GET['end_date']; } ?>" required autocomplete="end_date">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="start_hour" class="col-md-4 col-form-label text-md-right">Start Hour</label>
        
                                    <div class="col-md-6">
                                        <input id="start_hour" type="time" class="form-control <?php if(isset($_GET['start_hour'])) echo 'is-invalid'; ?>" name="start_hour" value="<?php if(isset($_GET['start_hour'])) { echo $_GET['start_hour']; } ?>" required autocomplete="start_hour">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="end_hour" class="col-md-4 col-form-label text-md-right">End Hour</label>
        
                                    <div class="col-md-6">
                                        <input id="end_hour" type="time" class="form-control <?php if(isset($_GET['end_hour'])) echo 'is-invalid'; ?>" name="end_hour" value="<?php if(isset($_GET['end_hour'])) { echo $_GET['end_hour']; } ?>" required autocomplete="end_hour">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="minium_period" class="col-md-4 col-form-label text-md-right">Minimum Period</label>
        
                                    <div class="col-md-6">
                                        <input id="minium_period" type="time" class="form-control <?php if(isset($_GET['minium_period'])) echo 'is-invalid'; ?>" name="minium_period" value="<?php if(isset($_GET['minium_period'])) { echo $_GET['minium_period']; } ?>" required autocomplete="minium_period">
                                    </div>
                                </div>
                                
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Add Active Hour
                                        </button>
                                    </div>
                                </div>
                            </form>
    	                </div>
    	            </div>
       	            <div class="col-md-4 col-centered text-center">
    	            	<a href="<?php echo get_page_link(get_page_by_title('IndexActiveHours')->ID);?>" class="btn btn-primary">Go Back</a>
    	            </div>
	            </div>
	        </div>
	    </main>
	</div>
</div>
<?php
	get_footer('change');
?>