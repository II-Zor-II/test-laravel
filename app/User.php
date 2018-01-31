<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Support\Facades\DB;
use App\Tweet;


class User extends Authenticatable implements CanResetPassword
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'username', 'email', 'password',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

        'password', 'remember_token',
        
    ];


    public function posts(){

        return $this->hasMany(Tweet::class);

    }

    public function tweet(Tweet $tweet){

        $this->tweet()->save($tweet);

    }

    public function followers(){
        
        $response = DB::table('follow')->select('follower_id')->where('user_id',$this->id);

        return $response->toJson();
        
    }

}
