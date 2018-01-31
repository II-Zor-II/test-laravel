

<div class="col-md-12">
	<div class="cover-image">
	</div>
</div>
	<div class="col-md-12 canopy-menu-bar text-center">
		 <div class="navbar-nav d-inline-flex justify-content-center flex-row">
	      <button class="nav-item btn btn-outline-primary">Tweets</button>
	      <button class="nav-item btn btn-outline-primary" id="showFollowingTweetsBtn">Following</button>
	      <a class="nav-item nav-link" href="#">Followers</a>
	      <a class="nav-item nav-link" href="#">Likes</a>
	      @if(auth()->id()!=$userId)

	      <button class="nav-item btn btn-success move-right" id="followButton" data-auth-id="{{auth()->id()}}" data-user-id="{{$userId}}"> Follow </button>
	    
		  @endif
	    </div>
	</div>
<div class="profile-image">
	<img class="img-fluid img-thumbnail" src="http://via.placeholder.com/400x400">
</div>

