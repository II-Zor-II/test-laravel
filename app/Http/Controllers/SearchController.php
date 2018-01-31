<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;


class SearchController extends Controller
{
    //

    public function show(){
    	$usernames = DB::table('users')->select('id','username')->get();
    	return $usernames->toArray();
    }

    public function redirectTo($userId){
        return redirect('/profile'.'/'.$userId);    
    }
}
