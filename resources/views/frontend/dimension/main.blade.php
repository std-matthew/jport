<!-- Header -->
<header id="header">
	<div class="logo">
		<span class="icon fa-diamond"></span>
	</div>
	<div class="content">
		<div class="inner">
			<h1>{{ $main->header }}</h1>
			<div>
				{!! $main->content !!}
			</div>
		</div>
	</div>
	<nav>
		<ul>
			<li><a href="#intro">{{ $intro->tab_label }}</a></li>
			<li><a href="#work">{{ $work->tab_label }}</a></li>
			<li><a href="#about">{{ $about->tab_label }}</a></li>
			<li><a href="#contact">{{ $contact->tab_label }}</a></li>
			<!--<li><a href="#elements">Elements</a></li>-->
		</ul>
	</nav>
</header>