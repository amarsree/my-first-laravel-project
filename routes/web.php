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
use Illuminate\Http\Request;

Route::get('/', function () {
	//auth::logout();
    return view('welcome');
});


Route::resource('guest', 'GuestController');


Route::resource('chat', 'ShowUsersController');
Route::resource('messages', 'MessagesController');







 Route::get('register', function () {
    return view('auth.register');
});



Route::get('chat', function () {
    return view('home');
});
/*->middleware('auth');*/

Route::get('settings', function () {
    return view('settings');
});

/*Route::get('/loadl', 'LoadPanels@left');
Route::get('/loadr', 'LoadPanels@right');*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
