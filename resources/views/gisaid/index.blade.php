@extends('layout.index')
@section('token')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@push('style')
<style>
.dataTables_filter label {margin-top: 8px;}
.dataTables_filter input:first-child {margin-top: -8px;}
.buttons-create {float:left;margin-left:12px;}
.buttons-create:after {content:'';clear:both;}
.dt-btn {margin:0;padding:0;}
</style>
@endpush
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">รายการข้อมูล</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
					<li class="breadcrumb-item active">รายการข้อมูล</li>
				</ol>
			</div>
		</div>
	</div>
</div>
<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				{{$dataTable->table()}}
			</div>
		</div>
	</div>
</section>
@endsection
@push('scripts')
	{{$dataTable->scripts()}}
	<script>
	$(document).ready(function() {
		$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
	});
	</script>
@endpush
