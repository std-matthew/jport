<header class="mb-3">
	<nav>
		<div class="nav-wrapper container">
			<a href="{{ url('/') }}" class="brand-logo">{{ config('app.name') }}</a>
			<ul id="nav-mobile" class="right hide-on-med-and-down">
				@guest
					<li><a href="{{ route('login') }}">Login</a></li>
					<li><a href="{{ route('register') }}">Register</a></li>
				@else
					<li>
						<a href="{{ route('user.notifications.index') }}">
							Notifications
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
