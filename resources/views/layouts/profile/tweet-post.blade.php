
<div class="col-md-12 tweet-container">
<div class="row">
	<div class="tweet-user-image col-md-2">
		<img class="img-fluid img-thumbnail" src="http://via.placeholder.com/100x100">
	</div>
	<div class="col-md-10">
		<div class="row">
			<div class="col-md-12">
				{{$tweet->user->username}}
				<br><small class="text-muted">@php
				$date = new DateTime($tweet->created_at);
				echo date_format($date,'F d Y');
				@endphp
				</small>
				@auth
				@if($tweet->user->id==auth()->id())
				<button type="button" class="close pull-right deleteTweetButton" aria-label="Delete" data-tweet-id="{{$tweet->id}}">
		          <span aria-hidden="true">&times;</span>
		        </button>
		        @endif
		        @endauth
				<hr>
			</div>

			<div class="col-md-12">
				<p>
					{{$tweet->content}}
				</p>
			</div>
			@if(!empty($tweet->image_path))
			<div class="col-md-12 tweet-image">
				<img class="img-fluid img-thumbnail" src="<?php echo asset("storage/$tweet->image_path"); ?>"></img>
			</div>
			@endif
			<div class="col-md-12">
				<div class="d-inline-flex p-2">
					<button class="btn btn-outline-primary mx-3" data-toggle="modal" data-target="#commentModal{{$tweet->id}}">
						<span class="fa fa-comment-o"></span>
					</button>
					<button class="btn btn-outline-primary mx-3">
						<span class="fa fa-retweet"></span>
					</button>
					<button class="btn btn-outline-primary mx-3">
						<span class="fa fa-heart-o"></span>
					</button>
				</div>
			</div>
			@if(count($tweet->comments))
			<div class="col-md-12 comments">
			<ul class="list-group">	
 				@foreach ($tweet->comments as $comment)
 				<li class="list-group-item">
 					<b>{{$comment->user->username}}</b>
 					<hr>		
					{{$comment->content}}
				<small class="text-muted">
					{{$comment->created_at->diffForHumans()}}
				</small>
 				</li>
				@endforeach 
			</ul>
			</div>
			@endif
		</div>
	</div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="commentModal{{$tweet->id}}" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="commentModalLabel">Comment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="/tweet/{{$tweet->id}}/comment">
			{{csrf_field()}}
	      <div class="modal-body form-group">
	       <textarea name="content" placeholder="Your comment here." class="form-control" rows="3" required></textarea>
	      </div>

	      <div class="modal-footer">
	        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-outline-primary">Send</button>
	      </div>
      </form>
    </div>
  </div>
</div>
