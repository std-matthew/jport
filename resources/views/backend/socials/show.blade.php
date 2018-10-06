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
					<ul class="collection">
						@foreach ($socials as $social)
							<li class="collection-item">
								<div>
									<strong>{{ $social->renderLabel() }}</strong>
									<small>({{ $social->url }})</small>
									<a href="#!" class="secondary-content" onclick="event.preventDefault();
					                    document.getElementById('social{{ $social->id }}').submit();">
					                    <i class="material-icons">close</i>
					                </a>
								</div>
							</li>
							<form id="social{{ $social->id }}" action="{{ route('social.destroy', $social->id) }}" method="POST" style="display: none;">
							    @csrf
							</form>
						@endforeach
					</ul>
				</div>
			</div>
		@endif
	</div>
</main>
@endsection