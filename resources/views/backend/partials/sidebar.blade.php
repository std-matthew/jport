<ul id="slide-out" class="sidenav sidenav-fixed">
	<li>
		<div class="user-view">
			<div class="background">
				<img src="{{ $self->renderBackground() }}">
			</div>
			<a href="{{ route('user.show') }}"><img class="circle" src="{{ $self->renderAvatar() }}"></a>
			<a href="{{ route('user.show') }}"><span class="white-text name">{{ $self->renderFullname() }}</span></a>
			<a href="{{ route('user.show') }}"><span class="white-text email">{{ $self->email }}</span></a>
		</div>
	</li>

	<li><a class="subheader">Main</a></li>

	<li class="{{ $helpers->inRoute('main.show') ? 'active' : '' }}">
		<a href="{{ route('main.show') }}">
			<i class="material-icons">home</i>
			Home
		</a>
	</li>

	<li class="{{ $helpers->inRoute('intro.show') ? 'active' : '' }}">
		<a href="{{ route('intro.show') }}">
			<i class="material-icons">format_align_justify</i>
			Intro
		</a>
	</li>
	<li class="{{ $helpers->inRoute('work.show') ? 'active' : '' }}">
		<a href="{{ route('work.show') }}">
			<i class="material-icons">work</i>
			Work
		</a>
	</li>
	<li class="{{ $helpers->inRoute('about.show') ? 'active' : '' }}">
		<a href="{{ route('about.show') }}">
			<i class="material-icons">info_outline</i>
			About
		</a>
	</li>
	<li class="{{ $helpers->inRoute('contact.show') ? 'active' : '' }}">
		<a href="{{ route('contact.show') }}">
			<i class="material-icons">contacts</i>
			Contact
		</a>
	</li>
	<li class="{{ $helpers->inRoute('social.show') ? 'active' : '' }}">
		<a href="{{ route('social.show') }}">
			<i class="material-icons">people</i>
			Social
		</a>
	</li>
	<li><div class="divider"></div></li>
	<li><a class="subheader">Settings</a></li>
	<li>
		<a href="{{ route('settings.show') }}">
			<i class="material-icons">settings</i>
			Settings
		</a>
	</li>
	<li>
		<a href="{{ route('logout') }}" onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();"
        {{ __('Logout') }}><i class="material-icons">exit_to_app</i>Logout
	    </a>
    </li>
</ul>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
