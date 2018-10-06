@extends('backend.master')

@section('title', ucwords($label) .  ' | ' . $self->renderFullname())

@section('content')

<main class="container">
	<div class="row">
		<form action="{{ $updateurl }}" method="POST" class="col s12" enctype="multipart/form-data">
			@csrf
			
			@include('backend.partials.alerts')

			<div class="row">
				@if (!in_array('tab_label', $excepts))
					<div class="input-field col {{ in_array('header', $excepts) ? 's12' : 's6' }}">
						<input value="{{ $page->tab_label }}" name="tab_label" id="tab_label" type="text" class="validate">
						<label for="tab_label">Tab Label</label>
					</div>
				@endif

				@if (!in_array('header', $excepts))
					<div class="input-field col {{ in_array('tab_label', $excepts) ? 's12' : 's6' }}">
						<input value="{{ $page->header }}" name="header" id="header" type="text" class="validate">
						<label for="header">Header</label>
					</div>
				@endif
				
				@if (!in_array('content', $excepts))
					<div class="input-field col s12">
						<textarea name="content" id="content" class="materialize-textarea">{{ $page->content }}</textarea>
						<label for="content">Content</label>
					</div>
				@endif
				
				@if (!in_array('image_path', $excepts))
					@if ($page->image_path)
						<img class="materialboxed responsive-img" src="{{ $page->renderImage() }}">
					@endif
				@endif
			</div>

			@if (!in_array('image_path', $excepts))
				<div class="file-field input-field">
					<div class="btn">
						<span>Upload</span>
						<input name="image_path" type="file">
					</div>
					<div class="file-path-wrapper">
						<input class="file-path validate" type="text" placeholder="Image">
					</div>
				</div>
			@endif
			<div class="row">
				<button type="submit" class="waves-effect waves-light btn right">Save Changes</button>
			</div>
		</form>
	</div>
</main>
@endsection