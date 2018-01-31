
@extends('layouts.layout')

@section('content')

@include('layouts.nav')
<div class="container-fluid">
	<div class="row canopy">

		@include('layouts.profile.canopy')

	</div>
	<div class="row grid-3x1">
		<div class="col-sm-3 left-sidebar">

		@include('layouts.profile.left-sidebar')

		</div>
		<div class="col-sm-6">
			
		@include('layouts.profile.stream')

		</div>
		<div class="col-sm-3">
			
		@include('layouts.profile.right-sidebar')

		</div>
	</div>
</div>


@endsection