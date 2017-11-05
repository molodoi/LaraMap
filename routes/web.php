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
use App\Mail\ContactFormCreated;



Route::group(['namespace'=> 'Front'], function(){

    Route::get('/',[
        'as' => 'home',
        'uses' => 'PagesController@home'
    ]);
    //équivaut à :
    //Route::get('/', 'PagesController@home')->name('home');
    //Route::name('home')->get('/', 'PagesController@home');

    //Route::resource('posts', 'PostController');
    //Exemple only action

    Route::resource('posts', 'PostController', ['only' => ['index, show']]);

    Route::get('/posts/{id}', 'PostController@show')->name('posts.show')->where('id', '[0-9]+');
    Route::get('/posts', 'PostController@index')->name('posts.index');

    Route::get('/categories/{id}', [
        'as' => 'categories.show',
        'uses' => 'CategoryController@show'
    ])->where('id', '[0-9]+');

    Route::get('/about', [
        'as' => 'about',
        'uses' => 'PagesController@about'
    ]);

    Route::get('/contact', [
        'as' => 'contact.create',
        'uses' => 'ContactController@create'
    ]);
});


Route::group(['namespace'=> 'Admin', 'prefix' => 'admin'], function(){
    Route::get('/home', 'HomeController@index')->name('dashboard');
    Route::resource('backposts', 'PostController');
    Route::resource('backtags', 'TagController');
    Route::resource('backcategories', 'CategoryController');
});

Auth::routes();
