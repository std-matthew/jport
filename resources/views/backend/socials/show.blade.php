@extends('backend.master')

@section('content')
<main class="container">
	<div class="row">
		<form action="{{ route('social.store') }}" method="POST" class="col s12">
			@csrf
			
			@include('backend.partials.alerts')

			<div class="row">
				<div class="input-field col s12">
					<input value="{{ old('url') }}" name="url" id="tab_label" type="text" class="validate">
					<label for="tab_label">Social URL</label>
				</div>
				<div class="input-field col s12">
					<select name="type">
						<option value="" disabled selected>Choose your option</option>
						@foreach ($types as $type)
							<option value="{{ $type['value'] }}">{{ $type['label'] }}</option>
						@endforeach
					</select>
					<label>Social Type</label>
				</div>
			</div>
			<div class="row">
				<button type="submit" class="waves-effect waves-light btn right"><i class="material-icons left">add</i>Add</button>
			</div>
		</form>
		@if ($socials)
			<div class="row">
				<div class="col s12">
					@foreach ($socials as $social)
						<div class="card-panel">
							<a href="#!" class="right" onclick="event.preventDefault();
			                    document.getElementById('social{{ $social->id }}').submit();">
			                    <i class="material-icons">close</i>
			                </a>
							<span class="card-title"><strong>{{ $social->renderLabel() }}</strong></span>
							<div class="card-content">
					          <p>{{ $social->url }}</p>
					        </div>
							<form id="social{{ $social->id }}" action="{{ route('social.destroy', $social->id) }}" method="POST" style="display: none;">
							    @csrf
							</form>
						</div>
					@endforeach
				</div>
			</div>
		@endif
	</div>
</main>
@endsection