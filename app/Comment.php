<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
	protected $guarded = ['id'];
	protected $fillable = ['content','tweet_id','user_id'];
    public function tweet(){

    	return $this->belongsTo(Tweet::class);

    }

    public function user(){

    	return $this->belongsTo(User::class);
    	
    }

}
