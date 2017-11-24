<?php
use App\site;
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

Route::get('/', function () {
    return redirect('home');
});

Route::auth();

Route::get('/home', 'HomeController@index');



Route::get('/sites', 'SitesController@index');
Route::get('/sites/create', 'SitesController@create');


Route::post('/pages', 'PagesController@store');



Route::post('/sites','SitesController@store');

Route::get('/{site_slug}/create', 'PagesController@create');
Route::post('/{site_slug}/{page_slug}/edit', 'PagesController@update');

Route::get('/{site_slug}/{page_slug}/edit', 'PagesController@edit');
Route::get('/{site_slug}/{page_slug}', 'PagesController@show');



Route::get('/{slug}', 'SitesController@show');


