@extends('backend.master')

@section('content')
<main class="container">
	<div class="row">
		<form action="{{ route('settings.update') }}" method="POST" class="col s12" enctype="multipart/form-data">
			@csrf
			
			@include('backend.partials.alerts')

			<div class="row">
				<div class="input-field col s12">
					<input value="{{ $settings->og_title }}" name="og_title" id="og_title" type="text" class="validate">
					<label for="og_title">OG Title</label>
				</div>
				<div class="input-field col s12">
					<input value="{{ $settings->og_description }}" name="og_description" id="og_description" type="text" class="validate">
					<label for="og_description">OG Description</label>
				</div>
			</div>
			@if ($settings->og_image)
				<div class="row">
					<img class="materialboxed responsive-img" src="{{ $settings->renderImage('og_image') }}">
				</div>
			@endif
			<div class="file-field input-field">
				<div class="btn">
					<span>Upload</span>
					<input name="og_image" type="file">
				</div>
				<div class="file-path-wrapper">
					<input class="file-path validate" type="text" placeholder="OG Image">
				</div>
			</div>
			@if ($settings->favicon)
				<div class="row">
					<img class="materialboxed responsive-img" src="{{ $settings->renderImage('favicon') }}">
				</div>
			@endif
			<div class="file-field input-field">
				<div class="btn">
					<span>Upload</span>
					<input name="favicon" type="file">
				</div>
				<div class="file-path-wrapper">
					<input class="file-path validate" type="text" placeholder="Favicon">
				</div>
			</div>
			<div class="row">
				<button type="submit" class="waves-effect waves-light btn right">Save Changes</button>
			</div>
		</form>
	</div>
</main>
@endsection