@if ($errors->any())
	<div class="card-panel red mb-3">
	    <ul class="text-white m-0">
	        @foreach ($errors->all() as $error)
	            <li>{{ $error }}</li>
	        @endforeach
	    </ul>
	</div>
@endif


@if (session('success'))
	<div class="card-panel 
	@switch(session('status_message.type'))
	    @case('success')
	        	green
	        @break

	     @case('error')
	        	red
	        @break
	
	    @default
	       green
	@endswitch
	mb-3 text-white">
		<p class="m-0">{{ session('status_message.message') }}</p>
	</div>
@endif