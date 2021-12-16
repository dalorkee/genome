<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<a href="index3.html" class="brand-link">
		<img src="{{ URL::asset('theme/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
		<span class="brand-text font-weight-light">DOE Genome</span>
	</a>
	<!-- Sidebar -->
	<div class="sidebar">
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<img src="{{ URL::asset('theme/dist/img/d3.jpg') }}" class="img-circle elevation-2" alt="User Image">
			</div>
			<div class="info">
				<a href="#" class="d-block">PJ.X10</a>
			</div>
		</div>
		<!-- SidebarSearch Form -->
		<div class="form-inline">
			<div class="input-group" data-widget="sidebar-search">
				<input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
				<div class="input-group-append">
					<button class="btn btn-sidebar">
						<i class="fas fa-search fa-fw"></i>
					</button>
				</div>
			</div>
		</div>
		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<li class="nav-header">NAVIGATION</li>
				<li class="nav-item">
					<a href="pages/calendar.html" class="nav-link active">
						<i class="nav-icon fa fa-chart-bar"></i>
						<p>แดชบอร์ด<span class="badge badge-info right">2</span></p>
					</a>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link">
						<i class="nav-icon far fa-address-card"></i>
						<p>ข้อมูล<i class="fas fa-angle-left right"></i></p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="{{ route('gisaid.index') }}" class="nav-link"><i class="far fa-circle nav-icon"></i><p>GisAid</p></a>
						</li>
						<li class="nav-item">
							<a href="" title="Import" class="nav-link"><i class="far fa-circle nav-icon"></i><p>นำเข้าข้อมูล</p></a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link"><i class="far fa-circle nav-icon"></i><p>ส่งออกข้อมูล</p></a>
						</li>
					</ul>
				</li>
			</ul>
		</nav>
	</div>
</aside>
