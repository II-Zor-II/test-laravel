@extends('layouts.layout')

@section('content')

	<div class="container-fluid welcome-content row">

		<div class="welcome-text col-sm-6">
			<h1> Welcome to Twitter.</h1>
			<h3>
				Connect with your friends — and other fascinating people. Get in-the-moment updates on the things that interest you. And watch events unfold, in real time, from every angle.
			</h3>
		</div>

		<div class="forms col-sm-6">
			<form method="POST" action="{{route('login')}}">
			{{ csrf_field() }}
			<div class="login-form row p-lg-5">
				 <input type="text" class="form-control row m-sm-1" placeholder="Email" name="email" value="{{ old('email') }}" autofocus required>
				 <div class="row m-sm-1">
				 	 <input type="password" class="form-control col-sm-6" placeholder="Password" name="password" required>
				 	  <button type="submit" class="btn btn-primary col-sm-3 ml-sm-1">Log in</button>
				 	  <a href="#" class="col-sm-12">Forgot Password</a>
	 	               <div class="checkbox col-sm-12">
	                        <label>
	                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
	                        </label>
                    	</div>
				 </div>		
			</div>
			</form>
			<form method="POST" action="{{route('register')}}">

				{{ csrf_field() }}

				<div class="signup-form row">

					<input type="text" class="form-control row m-sm-1" placeholder="Full name" value="{{ old('username') }}" name="username" required >

					<input type="email" class="form-control row m-sm-1" placeholder="Email" value="{{ old('email') }}" name="email" required >

					<input type="password" class="form-control row m-sm-1" placeholder="Password" name="password" required >

					<input type="password" name="password_confirmation" id="password_confirmation" class="form-control row m-sm-1" placeholder="Confirm Password" required >

					<button type="submit" class="btn btn-primary col-sm-3 ml-sm-1">Sign-up</button>
					
				</div>
				@include('layouts.profile.error-partial')
			</form>
		</div>
	</div>
@endsection
