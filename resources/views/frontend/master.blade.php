<!DOCTYPE html>
<html>
<head>
	<title>JPort</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
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