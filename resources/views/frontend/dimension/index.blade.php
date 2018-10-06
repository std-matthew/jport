@extends('frontend.dimension.master')

@section('title', $user->renderPageTitle())

@section('content')

@include('frontend.dimension.main')

<!-- Main -->
<div id="main">

	<!-- Intro -->
	<article id="intro">
		<h2 class="major">{{ $intro->header }}</h2>
		<span class="image main"><img src="{{ $intro->renderImage() }}" alt="" /></span>
		<div>
			{!! $intro->content !!}
		</div>
	</article>

	<!-- Work -->
	<article id="work">
		<h2 class="major">{{ $work->header }}</h2>
		<span class="image main"><img src="{{ $work->renderImage() }}" alt="" /></span>
		<div>
			{!! $work->content !!}
		</div>
	</article>

	<!-- About -->
	<article id="about">
		<h2 class="major">{{ $about->header }}</h2>
		<span class="image main"><img src="{{ $about->renderImage() }}" alt="" /></span>
		<div>
			{!! $about->content !!}
		</div>
	</article>

	<!-- Contact -->
	<article id="contact">
		<h2 class="major">{{ $contact->header }}</h2>
		<form method="post" action="#">
			<div class="fields">
				<div class="field half">
					<label for="name">Name</label>
					<input type="text" name="name" id="name" />
				</div>
				<div class="field half">
					<label for="email">Email</label>
					<input type="text" name="email" id="email" />
				</div>
				<div class="field">
					<label for="message">Message</label>
					<textarea name="message" id="message" rows="4"></textarea>
				</div>
			</div>
			<ul class="actions">
				<li><input type="submit" value="Send Message" class="primary" /></li>
				<li><input type="reset" value="Reset" /></li>
			</ul>
		</form>
		@if ($socials)
		<ul class="icons">
			@foreach ($socials as $social)
				<li><a href="{{ $social->url }}" class="icon {{ $social->renderIcon() }}"><span class="label">{{ $social->renderLabel() }}</span></a></li>
			@endforeach
		</ul>
		@endif
	</article>
</div>

@endsection