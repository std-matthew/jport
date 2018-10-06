<header class="mb-3">
	<nav>
		<div class="nav-wrapper container">
			<a href="{{ url('/') }}" class="brand-logo">{{ config('app.name') }}</a>
			<ul id="nav-mobile" class="right hide-on-med-and-down">
				@guest
					<li><a href="{{ route('login') }}">Login</a></li>
					<li><a href="{{ route('register') }}">Register</a></li>
				@endguest
			</ul>
		</div>
	</nav>
</header>
