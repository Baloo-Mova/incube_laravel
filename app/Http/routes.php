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
Route::group(['namespace' => 'Frontend'], function () {
    Route::get('/', ['uses' => 'SiteController@index', 'as' => 'site.index']);
    Route::get('site/about', ['uses' => 'AboutController@index', 'as' => 'about.index']);
    Route::get('site/contacts', ['uses' => 'ContactsController@index', 'as' => 'contacts.index']);
    Route::get('site/rules', ['uses' => 'OurRulesController@index', 'as' => 'ourrules.index']);

    Route::group(['prefix' => 'investor'], function () {
        Route::get('/', ['uses' => 'InvestorController@index', 'as' => 'investor.index']);
        Route::get('/create', ['uses' => 'InvestorController@create', 'as' => 'investor.create']);
        Route::post('/create', ['uses'=> 'InvestorController@store', 'as' => 'investor.store']);
        Route::get('/edit/{id}',['uses'=> 'InvestorController@edit', 'as' => 'investor.edit']);
        Route::post('/edit/{id}',['uses'=> 'InvestorController@update', 'as' => 'investor.update']);
    });
});

Route::auth();
