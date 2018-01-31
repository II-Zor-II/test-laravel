<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

use App\Tweet;

class TweetController extends Controller
{



    public function __construct(){

        $this->middleware('auth')->except(['destroy']);

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($userId)
    {

        return view('layouts.profile.tweet',compact('userId'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$userId)
    {

        $this->validate(request(),[

            'tweet_post_content' => 'required'

        ]);

        if($request->hasFile('tweet-image')){
            $tweet_image_path = request()->file('tweet-image')->store('public/TweetImages');
            $tweet_image_path = str_replace('public/', '', $tweet_image_path);
            Tweet::create([
                'content'   => request('tweet_post_content'),
                'image_path'=> $tweet_image_path,
                'user_id'   => $userId,
                'created_at'=> date('Y-m-d H:i:s')]
            );
        }else{
            Tweet::create([
                'content'=> request('tweet_post_content'),
                'user_id'=>$userId,
                'created_at'=> date('Y-m-d H:i:s')
            ]);
        }

        return redirect('/profile'.'/'.$userId);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {         

        $tweets = Tweet::where('user_id',$id)->orderBy('created_at','desc')->get();
        $followedTweets = auth()->following($id);
        return view('layouts.profile',compact('tweets','followedTweets'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tweetImagePath = Tweet::find($id)->image_path;
        Storage::delete($tweetImagePath);
        $tweet = Tweet::destroy($id);
       return $tweet;
    }

    
}
