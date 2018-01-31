<div class="row right-sidebar">
	@guest
	<div class="col-md-12 signup-card">
		<b>
			<h4>
				New to Twitter?
			</h4>
		</b>
		<h6>
			Sign up now to get your own personalized profile
		</h6>
		<button class="btn-outline-primary btn" id="signupButton">Sign up</button>
	</div>
	@endguest
	@auth
	@if(auth()->id()==$userId)
	<div class="col-md-12 signup-card">		
		<button class="btn btn-outline-primary mx-3" data-toggle="modal" data-target="#tweetModal">
			<span class="fa fa-twitter"></span>
		</button>
	</div>
	@endif
	@endauth
</div>



<!-- Modal -->
<div class="modal fade" id="tweetModal" tabindex="-1" role="dialog" aria-labelledby="tweetModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tweetModalLabel">Compose Tweet</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="/profile/{{$userId}}/tweet"  enctype="multipart/form-data">
			{{csrf_field()}}
	      <div class="modal-body form-group">
	      	<div class="row">
	  		<div class="col-sm-3 tweet-user-image">
				<img class="img-fluid img-thumbnail" src="http://via.placeholder.com/75x75">
			</div>
			<div class="col-sm-9">
	 	      <textarea name="tweet_post_content" placeholder="What's happening?" class="form-control" rows="3" required></textarea>
	 		</div>
	 		</div>
	      </div>

	      <div class="modal-footer">
	      	<input type="file" style="display:none" name="tweet-image" accept="image/*" id="tweetImageUploadInput">
	         <button class="btn btn-outline-primary" id="tweetImageUploadBtn" type="button"><span class="fa fa-picture-o fa-sm"></span></button>
	        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-outline-primary">Send</button>
	      </div>
      </form>
    </div>
  </div>
</div>