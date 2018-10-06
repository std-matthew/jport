@extends('backend.master')

@section('title', 'Dashboard | ' . $self->renderFullname())

@section('content')
<main class="container">
	<div class="row">
		<a href="{{ route('user.password.show') }}" class="waves-effect waves-light btn right"><i class="material-icons left">security</i>Change Password</a>
	</div>
	<div class="row">
		<form action="{{ route('user.update') }}" method="POST" class="col s12" enctype="multipart/form-data">
			@csrf
			
			@include('backend.partials.alerts')

			<div class="row">
				<div class="input-field col s6">
					<input value="{{ $self->first_name }}" name="first_name" id="first_name" type="text" class="validate">
					<label for="first_name">First Name</label>
				</div>
				<div class="input-field col s6">
					<input value="{{ $self->last_name }}" name="last_name" id="last_name" type="text" class="validate">
					<label for="last_name">Last Name</label>
				</div>

				<div class="input-field col s6">
					<input value="{{ $self->username }}" name="username" id="username" type="text" class="validate">
					<label for="username">Username</label>
				</div>

				<div class="input-field col s6">
					<input value="{{ $self->email }}" name="email" id="email" type="text" class="validate">
					<label for="email">Email</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12">
					<input value="{{ $self->avatar_url }}" name="avatar_url" id="avatar_url" type="text" class="validate">
					<label for="avatar_url">Avatar URL</label>
				</div>
			</div>
			@if ($self->avatar_path)
				<div class="row">
					<img class="materialboxed responsive-img" src="{{ $self->renderAvatar() }}">
				</div>
			@endif
			<div class="file-field input-field">
				<div class="btn">
					<span>Upload</span>
					<input name="avatar_path" type="file">
				</div>
				<div class="file-path-wrapper">
					<input class="file-path validate" type="text" placeholder="Avatar">
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12">
					<input value="{{ $self->background_url }}" name="background_url" id="background_url" type="text" class="validate">
					<label for="background_url">Background URL</label>
				</div>
			</div>
			@if ($self->background_path)
				<div class="row">
					<img class="materialboxed responsive-img" src="{{ $self->renderBackground() }}">
				</div>
			@endif
			<div class="file-field input-field">
				<div class="btn">
					<span>Upload</span>
					<input name="background_path" type="file">
				</div>
				<div class="file-path-wrapper">
					<input class="file-path validate" type="text" placeholder="Background">
				</div>
			</div>
			<div class="row">
				<button type="submit" class="waves-effect waves-light btn right">Save Changes</button>
			</div>
		</form>
	</div>
</main>
@endsection