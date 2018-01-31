<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\User;

class FollowController extends Controller
{

	public function __construct(){

        $this->middleware('auth');

    }

    public function store($authId,$userId){   	

    	DB::table('follow')->insert(
    		[
    			'user_id'=>$userId,
    			'follower_id'=>$authId
    		]
    	);
    	return back();

    }

    public function show(){
		
    	// $usertweets = \App\Tweet::where('user_id',auth()->id())->orderBy('created_at','desc')->get();
    	$usertweets = DB::table('tweets')->leftJoin('users','users.id','=','tweets.user_id')->where('tweets.user_id',auth()->id())->select('tweets.*','users.username')->get();

    	$followingarray = DB::table('follow')->select('user_id')->where('follower_id',auth()->id())->pluck('user_id');

     	$followingtweets = DB::table('tweets')->leftJoin('users','users.id','=','tweets.user_id')->whereIn('user_id',$followingarray)->select('tweets.*','users.username')->get();

        return compact('usertweets','followingtweets');
    }

}
