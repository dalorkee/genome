@extends('layout.index')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">แดชบอร์ด</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
					<li class="breadcrumb-item active">แดชบอร์ด</li>
				</ol>
			</div>
		</div>
	</div>
</div>
<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-3 col-6">
				<div class="small-box bg-info">
					<div class="inner">
						<h3>{{ number_format($total_row) }}</h3>
						<p>ข้อมูลทั้งหมด</p>
					</div>
					<div class="icon">
						<i class="fas fa-database"></i>
					</div>
					{{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
				</div>
			</div>
			<div class="col-lg-3 col-6">
				<div class="small-box bg-success">
					<div class="inner">
						<h3>{{ number_format($gender_male) }}</h3>
						<p>เพศ ชาย</p>
					</div>
					<div class="icon">
						<i class="fas fa-male"></i>
					</div>
					{{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
				</div>
			</div>
			<div class="col-lg-3 col-6">
				<div class="small-box bg-warning">
					<div class="inner">
						<h3>{{ number_format($gender_female) }}</h3>
						<p>เพศ หญิง</p>
					</div>
					<div class="icon">
						<i class="fas fa-female"></i>
					</div>
					{{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
				</div>
			</div>
			<div class="col-lg-3 col-6">
				<div class="small-box bg-danger">
					<div class="inner">
						<h3>{{ number_format($gender_unknown) }}</h3>
						<p>เพศ ไม่ระบุ</p>
					</div>
					<div class="icon">
						<i class="fas fa-question-circle"></i>
					</div>
					{{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
