<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/','SessionsController@index')->name('home')->middleware('guest');

/*--------------------------------------------------------*/

Route::get('/profile/{userId}/tweet','TweetController@create');

Route::post('/profile/{userId}/tweet','TweetController@store');

Route::post('/tweet/{id}/delete','TweetController@destroy');

Route::post('/tweet/{tweetId}/comment','CommentsController@store');

Route::post('/follow/{authId}/{userId}','FollowController@store')->middleware('auth');;

Route::post('/register','RegistrationController@store')->name('register');

Route::post('/login','SessionsController@store')->name('login');

Route::post('/logout','SessionsController@destroy')->name('logout');

Route::get('/profile/{userId}','SessionsController@show')->name('profile');

Route::post('/followed','FollowController@show');

Route::get('/usernames','SearchController@show');

Route::get('/username/{userId}','SearchController@redirectTo');