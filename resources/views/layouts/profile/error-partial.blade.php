	@if(count($errors))
	<ul class="d-flex-row">			
		@foreach($errors->all() as $error)
		<li>
			<div class="alert alert-danger">
				{{$error}}
			</div>
		</li>
		@endforeach
	</ul>
	@endif