<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	@yield('token')
	<title>{{ config('app.name', 'pj.x10') }}</title>
	@include('layout.style')
	@stack('style')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
	<!-- Preloader -->
	<div class="preloader flex-column justify-content-center align-items-center">
		<img class="animation__shake" src="{{ URL::asset('theme/dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
	</div>
	@include('layout.topNav')
	@include('layout.mainSidebar')
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		@yield('content')
	</div>
	@include('layout.footer')
	@include('layout.controlSidebar')
</div>
@include('layout.script')
<script src="{{ URL::asset('vendor/datatables/buttons.server-side.js') }}"></script>
@stack('scripts')
</body>
</html>
