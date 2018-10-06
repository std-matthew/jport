@extends('backend.master')

@section('content')
<main class="container">
	<div class="row">
		<form action="{{ route('user.notifications.read') }}" method="POST">
			@csrf
			<button type="submit" class="waves-effect waves-light btn right">Mark as Read</button>
		</form>
	</div>
	<div class="row">
		<div class="col s12">
			@if ($self->notifications()->count())
				@foreach ($self->notifications as $notification)
				<div class="card-panel">
					@if (!$notification->read_at)
						<span class="new badge right"></span>
					@endif
					<span class="card-title"><strong>{{ $notification->data['name'] }}</strong> ({{ $notification->data['email'] }})</span>
					<div class="card-content">
			          <p>{{ $notification->data['message'] }}</p>
			        </div>
					<small class="right">{{ $notification->created_at }}</small>
				</div>
				@endforeach
			@else
				<h6 class="center-align">No notifications found.</h6>
			@endif
		</div>
	</div>
</main>
@endsection