<header class="mb-3">
	<nav class="{{ $colorTheme }}">
		<div class="nav-wrapper container">
			<a href="{{ url('/') }}" class="brand-logo">{{ config('app.name') }}</a>
			<a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
			<ul id="nav-mobile" class="right">
				@guest
					<li><a href="{{ route('login') }}">Login</a></li>
					<li><a href="{{ route('register') }}">Register</a></li>
				@else
					<li>
						<a href="{{ route('user.notifications.index') }}" class="valign-wrapper">
							<i class="material-icons">notifications</i>
							@if ($self->unreadNotifications()->count())
								<span class="new badge">{{ $self->unreadNotifications()->count() }}</span>
							@endif
						</a>
					</li>
				@endguest
			</ul>
		</div>
	</nav>
</header>
