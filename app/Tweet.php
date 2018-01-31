<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tweet extends Model
{
	public $timestamps = false;
	protected $guarded = ['id'];
	protected $fillable = ['user_id','content','created_at','image_path'];

    public function comments(){

    	return $this->hasMany(Comment::class);

    }

    public function user(){

    	return $this->belongsTo(User::class);
    	
    }


}
