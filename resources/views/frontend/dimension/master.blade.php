<!DOCTYPE HTML>
<html>
	<head>
		<title>@yield('title', 'Stateless Portfolio')</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="apple-touch-icon" href="{{ $settings->renderFavicon() }}">
        <link rel="shortcut icon" href="{{ $settings->renderFavicon() }}" type="image/x-icon" />
		<meta property="og:image" content="{{ $settings->renderOgImage() }}">
	    <meta property="og:title" content="{{ $settings->og_title }}">
	    <meta property="og:description" content="{{ $settings->og_description }}">
	    <meta property="og:url" content="{{ url()->current() }}">
	    <meta property="og:site_name" content="@yield('title', 'Stateless Portfolio')">
	    <meta property="og:type" content="website">
		<link rel="stylesheet" href="/dimension/css/main.css" />
		<noscript><link rel="stylesheet" href="/dimension/css/noscript.css" /></noscript>
	</head>

	<body class="is-preload">
		<div id="wrapper">
			@yield('content')
			@include('frontend.dimension.partials.footer')
		</div>

		<!-- BG -->
		<div id="bg" style="background-image: url('{{ $main->renderImage() }}');"></div>

		<!-- Scripts -->
		<script src="/dimension/js/jquery.min.js"></script>
		<script src="/dimension/js/browser.min.js"></script>
		<script src="/dimension/js/breakpoints.min.js"></script>
		<script src="/dimension/js/util.js"></script>
		<script src="/dimension/js/main.js"></script>

	</body>
</html>