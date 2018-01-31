
<div class="nav-container fixed-top">
  <nav class="navbar ">
  	<ul class="navbar-nav d-inline-flex flex-row">
  		<li>
  			<span class="fa fa-2x fa-twitter"></span>
  		</li>
	    <li>
	    	<a class="nav-link mx-sm-3" href="
	    	@guest
	    	{{route('home')}}
	    	@endguest
	    	@auth
	    	{{
	    		route('profile',['userId' => auth()->id()])
	    	}}
	    	@endauth">Home</a>
	    </li>
	    <li>
	    	<h3 class="nav-link-separator mx-sm-3">|</h3>
	    </li>
	    <li>
	    	<a class="nav-link mx-sm-3" href="#">About</a>
	    </li>
	</ul>
  
	<ul class="navbar-nav navbar-right ">
		<div class="form-inline my-2 my-lg-0">
		<form id="searchForm" method="GET">
			  <input class="form-control mr-sm-2" type="text" placeholder="Search" id="searchInputBox">
			  <button class="btn btn-outline-primary my-2 my-sm-0" type="submit" id="searchButton">Search</button>
		</form>
	    @auth
		@if(auth()->id()==$userId)
			<form class="" action="{{route("logout")}}" method="POST">
				{{ csrf_field() }}
			  	<button class="btn btn-outline-danger my-2" type="submit" name="logout">Logout</button>
			</form>
		@endif
		@endauth
		</div>
	</ul>
  </nav>
  <div class="clear-both"></div>
</div>