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

Route::get('foo','FooController@foo');

Route::get('/', 'WelcomeController@index');

Route::get('home', 'WelcomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::resource('articles','ArticlesController');

Route::resource('portfolio','PortfolioController');

//Route::get('foo',['middleware' => 'manager', function(){
//return 'this page may only be viewed by managers only';
//}]);



Route::get('contact','ContactController@index');
Route::get('contact/thank-you','ContactController@thankYou');
Route::post('contact','ContactController@store');



Route::get('tags/{tags}','TagController@show');