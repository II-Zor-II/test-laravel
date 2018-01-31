@extends('layouts.layout')

@section('content')

<div class="row tweetform-container">
	<div class="col-md-12">
		<form class="tweet-form" method="POST" action="/profile/{{$userId}}/tweet">
			{{csrf_field()}}
			<div class="row">
				<div class="col-sm-12 text-center tweet-form-header">
					<h6><b>Compose Tweet</b></h6>
					<hr>
				</div>
				<div class="col-sm-3 tweet-user-image">
					<img class="img-fluid img-thumbnail" src="http://via.placeholder.com/100x100">
				</div>
				<div class="col-sm-9">
					<textarea class="form-control" id="exampleTextarea" rows="3" placeholder="What's happening?" name="tweet_post_content" required></textarea>
				</div>
				<div class="col-sm-3">
				{{-- blank grid --}}
				</div>
				<div class="col-sm-9 d-flex my-3">
					<button class="btn btn-outline-primary"><span class="fa fa-picture-o fa-sm"></span></button>
					<button class="btn btn-outline-primary ml-auto mx-2">Tweet</button>
				</div>
			</div>
		</form>
	</div>
</div>
	@include('layouts.profile.error-partial')
@endsection