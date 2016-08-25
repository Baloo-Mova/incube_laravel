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

use App\User;

Route::group(['namespace' => 'Frontend'], function () {
    Route::get('/', ['uses' => 'SiteController@index', 'as' => 'site.index']);
    Route::get('/about', ['uses' => 'SiteController@about', 'as' => 'site.about']);
    Route::get('/contacts', ['uses' => 'SiteController@contacts', 'as' => 'site.contacts']);
    Route::get('/rules', ['uses' => 'SiteController@ourrules', 'as' => 'site.ourrules']);

    Route::group(['prefix' => 'investor'], function () {
        Route::get('/', ['uses' => 'InvestorController@index', 'as' => 'investor.index']);
        Route::get('/create', ['uses' => 'InvestorController@create', 'as' => 'investor.create']);
        Route::post('/create', ['uses'=> 'InvestorController@store', 'as' => 'investor.store']);
        Route::get('/edit/{investor}',['uses'=> 'InvestorController@edit', 'as' => 'investor.edit']);
        Route::post('/edit/{investor}',['uses'=> 'InvestorController@update', 'as' => 'investor.update']);
        Route::get('/show/{investor}',['uses'=>'InvestorController@show', 'as'=>'investor.show']);
    });
    
    Route::group(['prefix' => 'customer'], function () {
        Route::get('/', ['uses' => 'CustomerController@index', 'as' => 'customer.index']);
        Route::get('/create', ['uses' => 'CustomerController@create', 'as' => 'customer.create']);
        Route::post('/create', ['uses'=> 'CustomerController@store', 'as' => 'customer.store']);
        Route::get('/edit/{id}',['uses'=> 'CustomerController@edit', 'as' => 'customer.edit']);
        Route::post('/edit/{id}',['uses'=> 'CustomerController@update', 'as' => 'customer.update']);
        Route::get('/show/{id}',['uses'=>'CustomerController@show', 'as'=>'customer.show']);
    });

    Route::group(['prefix'=>'personal-area'], function (){
        Route::get('/',['uses'=>'PersonalAreaController@index', 'as'=>'personal_area.index']);
    });
});

Route::get('/investor/image/{filename}', function($filename)
{
    $img = Image::make(storage_path('app/investor/images/'.$filename))->resize(300, 300);
    return $img->response('jpg');
});
Route::get('/customer/image/{filename}', function($filename)
{
    $img = Image::make(storage_path('app/customer/images/'.$filename))->resize(300, 300);
    return $img->response('jpg');
});
Route::auth();
