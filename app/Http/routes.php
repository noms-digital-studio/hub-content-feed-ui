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

Route::get('/', 'HubLinksController@showHubPage');

Route::get('/hub/{tid}', 'HubLinksController@showHubSubPage');

Route::group(['prefix' => LaravelLocalization::setLocale()], function() {
    Route::get('/video', ['as' => 'video.landing', 'uses' => 'VideosController@showVideoLandingPage']);
    Route::get('/video/{nid}', ['as' => 'video.detail', 'uses' => 'VideosController@show']);
});
