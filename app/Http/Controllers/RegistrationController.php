<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;

class RegistrationController extends Controller
{

    public function store(){

    	// Validate the form

    	$this->validate(request(),[

    			'username' => 'required',

    			'email' => 'required|email', // should be email type

    			'password' => 'required|confirmed' // ensure password_confirmation and password are the same

    	]);

    	//Create and save the user.


    	$user = User::create([

            'username' => request('username'), 

            'email' => request('email'), 

            'password' => bcrypt(request('password'))

        ]);

    	//Sign them in

    	auth()->login($user);

    	// Redirect to the profile.

    	return redirect()->route('profile',['userId' => auth()->id()]);

    }

}
