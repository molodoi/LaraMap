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

Route::get('/',[
	'as' => 'home',
	'uses' => 'PagesController@home'
]);
//équivaut à :
//Route::get('/', 'PagesController@home')->name('home');
//Route::name('home')->get('/', 'PagesController@home');

Route::resource('posts', 'PostController');
//Exemple only action
//Route::resource('posts', 'PostController', ['only' => ['create, store']]);

Route::get('/about', [
	'as' => 'about',
	'uses' => 'PagesController@about'
]);

Route::get('/contact', [
	'as' => 'contact.create',
	'uses' => 'ContactController@create'
]);

Route::post('/contact', [
	'as' => 'contact.store',
	'uses' => 'ContactController@store'
]);
