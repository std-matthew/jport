@extends('backend.master')

@section('content')
<main class="container">
	<div class="row">
		<div class="col s12">
			@if ($self->notifications()->count())
			<ul class="collection">
				@foreach ($self->notifications as $notification)
					<li class="collection-item avatar">
						<span class="title">Message: {{ $notification->data['message'] }}</span>
						<p>From: <strong>{{ $notification->data['name'] }}</strong> ({{ $notification->data['email'] }})</p>
						<small>Date Received: {{ $notification->created_at }}</small>
					</li>
				@endforeach
			</ul>
			@else
				<p>No notifications found.</p>
			@endif
		</div>
	</div>
</main>
@endsection