<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'PagesController@index');
Route::get('/index','PagesController@main');
Route::get('/auth/reset',function(){
    return view('auth.reset');
});
Route::get('/auth/login',function(){
    return view('auth.login');
});
Route::get('/auth/register',function(){
    return view('auth.register');
});