<div class="row" id="stream-container">

	<div class="col-md-12 stream-menu-bar text-center">
		 <div class="navbar-nav d-inline-flex justify-content-center flex-row">
	      <button class="nav-item btn btn-outline-primary" class="Tweets_Link">Tweets</button>
	      <button class="nav-item btn btn-outline-primary" id="Tweets_and_Replies_Link">Tweets&replies</button>
	      <button class="nav-item btn btn-outline-primary" href="#">Media</button>
	    </div>
	</div>

	<div class="tweets-wrapper">
		@foreach($tweets as $tweet)
			@include('layouts.profile.tweet-post')
		@endforeach
	</div>
</div>
