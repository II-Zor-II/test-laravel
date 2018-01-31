<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use App\User;

class SessionsController extends Controller
{

    public function __construct(){

        $this->middleware('guest')->except(['destroy','show']);

    }

	public function index(){

		return view('layouts.index');

	}

    public function show($userId){

        $tweets = \App\Tweet::where('user_id',$userId)->orderBy('created_at','desc')->get();

        $username = DB::table('users')->where('id',$userId)->value('username');

        return view('layouts.profile',compact('tweets','userId','username'));

    }

    public function store(){


        if(auth()->attempt(request(['email','password']))){

            $userId = (int) auth()->id();

           return redirect('/profile'.'/'.$userId);    


        }

        return redirect()->home()->withErrors([

            'message' => 'Please check your credentials.'

        ]);

    }

    public function destroy(){

    	auth()->logout();

    	return redirect()->home();

    }

}
