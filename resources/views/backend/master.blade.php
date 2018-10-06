<!DOCTYPE html>
<html>
<head>
	<title>@yield('title', 'Stateless Portfolio')</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<link rel="stylesheet" type="text/css" href="{{ mix('css/vendors.css') }}">

	@if (\Auth::check())
		<link rel="stylesheet" type="text/css" href="{{ mix('css/backend/auth.css') }}">
	@endif

	<link rel="stylesheet" type="text/css" href="{{ mix('css/app.css') }}">
</head>
<body class="hold-transition skin-blue sidebar-collapse sidebar-mini">

	<div id="app">

		@include('backend.partials.header')
		
		@if (\Auth::check())
			@include('backend.partials.sidebar')
		@endif

		@yield('content')

		@include('backend.partials.footer')

	</div>

	<script src="{{ mix('js/manifest.js') }}"></script>
    <script src="{{ mix('js/vendor.js') }}"></script>
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="{{ mix('js/backend/app.js') }}"></script>

</body>
</html>