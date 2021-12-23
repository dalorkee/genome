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
				<li class="nav-item menu-open">
					<a href="#" class="nav-link active">
						<i class="fas fa-external-link-alt"></i>
						<p>&nbsp;GISAID<i class="fas fa-angle-left right"></i></p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="{{ route('gisaid.index') }}" class="nav-link active">&nbsp;&nbsp;<i class="fas fa-angle-right fa-sm"></i>&nbsp;&nbsp;รายการข้อมูล</a>
						</li>
						<li class="nav-item">
							<a href="" title="Import" class="nav-link">&nbsp;&nbsp;<i class="fas fa-angle-right fa-sm"></i>&nbsp;&nbsp;ส่งออก</a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link">&nbsp;&nbsp;<i class="fas fa-angle-right fa-sm"></i>&nbsp;&nbsp;Dashboard</a>
						</li>
					</ul>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link">
						<i class="fas fa-virus"></i>
						<p>&nbsp;Omicron<i class="fas fa-angle-left right"></i></p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="#" class="nav-link"><i class="fas fa-table fa-sm"></i>&nbsp;&nbsp;รายการข้อมูล</a>
						</li>
						<li class="nav-item">
							<a href="" title="Import" class="nav-link"><i class="fas fa-download fa-sm"></i>&nbsp;&nbsp;ส่งออก</a>
						</li>
					</ul>
				</li>
			</ul>
		</nav>
	</div>
</aside>
