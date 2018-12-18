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
use Illuminate\Support\Facades\Input;
use App\Profile;

Route::get('/', function () {
    return view('welcome');
});

Route::get('social/index', function () {
    return view('social.index');
})->middleware('auth');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('social/admin', function () {
    //
})->middleware('admin');

Route::post('social/user', 'PostController@submit_post')->name('post')->middleware('auth');

Route::post('social/reaction', 'ReactionController@reaction')->name('like')->middleware('auth');

Route::get('social/comment/{id}', 'CommentController@showComment')->name('comment')->middleware('auth');

Route::post('social/comment', 'CommentController@submit_comment')->name('comments.store')->middleware('auth');
//the above was used to post to the database

Route::get('social/user/', 'PostController@showPost')->name('show')->middleware('auth');
//->middleware('redirect')


Route::get('social/chat/{id}', 'MessageController@showChat')->name('chat')->middleware('auth');
Route::post('social/chat/{id}', 'MessageController@store')->name('storeChat')->middleware('auth');
Route::get('social/friends', 'MessageController@friends')->name('friends')->middleware('auth');
/*
====================================================
route for profileconfigure begins here

====================================================

*/

Route::get('profile/create', 'ProfileController@create')->middleware('auth')->name('create');
// because am storing that is why i used post storing dat into the database
Route::post('profile/create', 'ProfileController@store')->middleware('auth');

Route::get('profile/index','ProfileController@index')->name('index');

Route::get('profile/edit/{id}', 'ProfileController@edit')->name('edit');

Route::post('profile/edit/{id}', 'ProfileController@update')->name('update');
Route::get('profile/view/{id}', 'ProfileController@view')->name('view');
// Route::post('profile/search', 'ProfileController@search')->middleware('auth');

Route::any('/profile/search', function(){
 $search=input::get('search');
 if($search != ''){
     $profiles = Profile::where('name','LIKE', '%' .$search.'%')
                                ->orwhere('email','LIKE', '%' .$search.'%')
                                ->paginate(5)
                                ->setpath('');
 }
});
