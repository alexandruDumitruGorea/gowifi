<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Core</div>
            <a class="nav-link" href="<?php echo get_page_link(get_page_by_title('AdminPanelIndex')->ID);?>">
            	<div class="sb-nav-link-icon">
            		<i class="fas fa-tachometer-alt"></i>
            	</div>
                Dashboard
            </a>
            <?php if(is_admin_laravel()) { ?>
                <a class="nav-link" href="<?php echo get_page_link(get_page_by_title('IndexTechnicians')->ID);?>"  data-target="#collapseTechnical" aria-expanded="true" aria-controls="collapseTechnical">
                	<div class="sb-nav-link-icon">
                		<i class="fas fa-users-cog"></i>
                	</div>
                    Technicians
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse show" id="collapseTechnical" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                    	<a class="nav-link" href="<?php echo get_page_link(get_page_by_title('CreateTechnical')->ID);?>"><i class="fas fa-user-plus"></i>&nbsp;Add Technical</a>
                    </nav>
                </div>
            <?php } ?>
			<a class="nav-link" href="<?php echo get_page_link(get_page_by_title('IndexAccessPoints')->ID);?>"  data-target="#collapseAccessPoint" aria-expanded="true" aria-controls="collapseAccessPoint">
            	<div class="sb-nav-link-icon">
            		<i class="fas fa-network-wired"></i>
            	</div>
                Access Points
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse show" id="collapseAccessPoint" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                	<a class="nav-link" href="<?php echo get_page_link(get_page_by_title('CreateAccessPoint')->ID);?>"><i class="fas fa-wifi"></i>&nbsp;Add Access Point</a>
                </nav>
            </div>
            <a class="nav-link" href="charts.html">
            	<div class="sb-nav-link-icon">
            		<i class="fas fa-chart-area"></i>
            	</div>
                Charts
            </a>
            <a class="nav-link" href="<?php echo get_page_link(get_page_by_title('IndexActiveHours')->ID);?>" data-target="#collapseActiveHours" aria-expanded="true" aria-controls="collapseActiveHours">
            	<div class="sb-nav-link-icon"><i class="fas fa-calendar-check"></i></div>
                Active Hours
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse show" id="collapseActiveHours" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                	<a class="nav-link" href="<?php echo get_page_link(get_page_by_title('CreateActiveHour')->ID);?>"><i class="far fa-calendar-plus"></i>&nbsp;Add Active Hour</a>
                </nav>
            </div>
        </div>
    </div>
</nav>