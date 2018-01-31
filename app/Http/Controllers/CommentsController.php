<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tweet;
use App\Comment;

class CommentsController extends Controller
{
	
    public function store($tweetId){

    	$tweet_id = (int)$tweetId;

    	Comment::create([

    		'user_id' => auth()->id(),

    		'tweet_id' => $tweet_id,

    		'content' => request('content')

    	]);
        
    	return back();
    }

}
