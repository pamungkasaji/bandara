<?php 
if(!empty($level[0]['level']))
{
	$level= $level[0]['level'];
}
elseif(!empty($session[0]['level']))
{
	$level= $session[0]['level'];
}
?>

<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Sidebar -->
		<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

			<!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
				<div class="sidebar-brand-icon rotate-n-15">
					<i class="fas fa-laugh-wink"></i>
				</div>
				<div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>

			</a>

			<!-- Divider -->
			<hr class="sidebar-divider">

			<?php
				//Jika Karyawan Login sebagai Admin
			if($level=='ADM')
			{
				?>

				<!-- Heading -->
				<div class="sidebar-heading">
					ADMIN
				</div>

				<!-- Nav Item - Pages Collapse Menu -->
				<li class="nav-item active">
					<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
						<i class="fas fa-fw fa-folder"></i>
						<span>Pengolahan Data</span>
					</a>
					<div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
						<div class="bg-white py-2 collapse-inner rounded">
							<h6 class="collapse-header">Pengolahan</h6>

							<a class="collapse-item" href="<?php echo site_url('Karyawan'); ?>"><i class="icon-angle-right"></i> Karyawan </a>
							<a class="collapse-item" href="<?php echo site_url('Area'); ?>"><i class="icon-angle-right"></i> Area </a>
							<a class="collapse-item" href="<?php echo site_url('Subarea'); ?>"><i class="icon-angle-right"></i> Subarea </a>
							<a class="collapse-item" href="<?php echo site_url('Kodeqr'); ?>"><i class="icon-angle-right"></i> Kodeqr </a>

						</div>
					</div>
				</li>

				<?php
			}
				//Jika  Login sebagai Owner
			elseif($level=='SPV')
			{
				?>

				<!-- Heading -->
				<div class="sidebar-heading">
					SUPERVISOR
				</div>

				<!-- Nav Item - Pages Collapse Menu -->
				<li class="nav-item active">
					<a class="nav-link" href="<?php echo site_url('Dashboard'); ?>"> <i class="fas fa-fw fa-table"></i> <span>Tables</span></a>
					<a class="nav-link" href="<?php echo site_url('DashboardBulanan'); ?>"> <i class="fas fa-fw fa-table"></i> <span>Tables</span></a>
				</li>
				<?php
			}
			?>
			<!-- Nav Item - Tables -->
			<li class="nav-item active">
				<a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
					<i class="fas fa-sign-out-alt"></i>
					<span>Logout</span></a>
				</li>

				<!-- Divider -->
				<hr class="sidebar-divider d-none d-md-block">

				<!-- Sidebar Toggler (Sidebar) -->
				<div class="text-center d-none d-md-inline">
					<button class="rounded-circle border-0" id="sidebarToggle"></button>
				</div>

			</ul>
			<!-- End of Sidebar -->

			<!-- Content Wrapper -->
			<div id="content-wrapper" class="d-flex flex-column">

				<!-- Main Content -->
				<div id="content">

					<!-- Topbar -->
					<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

						<!-- Sidebar Toggle (Topbar) -->
						<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
							<i class="fa fa-bars"></i>
						</button>


						<!-- Topbar Navbar -->
						<ul class="navbar-nav ml-auto">

							<!-- Nav Item - User Information -->

							<!-- Dropdown - User Information -->
						</li>

					</ul>

				</nav>
				<!-- End of Topbar -->

				<!-- Logout Modal-->
				<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Keluar Dari Aplikasi</h5>
								<button class="close" type="button" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">×</span>
								</button>
							</div>
							<div class="modal-body">Tekan Tombol "Logout" untuk mengakhiri sesi</div>
							<div class="modal-footer">
								<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
								<a class="btn btn-primary" href="<?php echo base_url('Login/keluar'); ?>">Logout</a>
							</div>
						</div>
					</div>
				</div>