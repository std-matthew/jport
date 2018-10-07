<!DOCTYPE html>
<html>
<head>
	<title>{{ config('app.name') }}</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="apple-touch-icon" href="/images/logo.png">
    <link rel="shortcut icon" href="/images/logo.png" type="image/x-icon" />
</head>
<body>

	<link rel="stylesheet" type="text/css" href="{{ mix('css/app.css') }}">

	<div id="app">
		
		@yield('content')

	</div>

	<script src="{{ mix('js/manifest.js') }}"></script>
    <script src="{{ mix('js/vendor.js') }}"></script>
    <script src="{{ mix('js/app.js') }}"></script>

</body>
</html>