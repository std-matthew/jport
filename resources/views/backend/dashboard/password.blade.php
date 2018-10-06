@extends('backend.master')

@section('title', 'Change Password | ' . $self->renderFullname())

@section('content')
<main class="container">
	<div class="row">

		<form action="{{ route('user.password.update') }}" method="POST" class="col s12">
			@csrf
			
			@include('backend.partials.alerts')

			<div class="row">
				<div class="input-field col s12">
					<input name="password" id="password" type="password" class="validate">
					<label for="password">Current Password</label>
				</div>
				<div class="input-field col s12">
					<input name="new_password" id="new_password" type="password" class="validate">
					<label for="new_password">New Password</label>
				</div>
				<div class="input-field col s12">
					<input name="new_password_confirmation" id="new_password_confirmation" type="password" class="validate">
					<label for="new_password_confirmation">Confirm Password</label>
				</div>
			</div>

			<div class="row">
				<button type="submit" class="waves-effect waves-light btn right">Change Password</button>
			</div>
		</form>

	</div>
</main>
@endsection