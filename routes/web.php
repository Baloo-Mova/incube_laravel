<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Auth::routes();


Route::get('/{name}/image/{id}/{height}x{width}',['uses'=>'ImagesShowController@index', 'as'=>'images.show']);
Route::get('/get/cities/{id}', ['uses'=>'MainApiController@getCities', 'as'=>'get.city']);
Route::post('/create/offer', ['uses'=>'MainApiController@createOffer', 'as' => 'create.offer']);

Route::group(['namespace' => 'Frontend'], function () {

    Route::get('/', ['uses' => 'SiteController@index', 'as' => 'site.index']);
    Route::get('/about', ['uses' => 'SiteController@about', 'as' => 'site.about']);
    Route::get('/contacts', ['uses' => 'SiteController@contacts', 'as' => 'site.contacts']);
    Route::get('/rules', ['uses' => 'SiteController@ourrules', 'as' => 'site.ourrules']);

    Route::group(['prefix'=>'materials'],function(){
        Route::get('/', ['uses'=>'MaterialsViewerController@index', 'as'=>'material.index']);
        Route::post('/search', ['uses'=>'MaterialsViewerController@search', 'as'=>'material.search']);
    });

    Route::group(['prefix' => 'investor'], function () {
        Route::get('/', ['uses' => 'InvestorController@index', 'as' => 'investor.index']);
        Route::get('/create', ['uses' => 'InvestorController@create', 'as' => 'investor.create']);
        Route::post('/create', ['uses'=> 'InvestorController@store', 'as' => 'investor.store']);
        Route::get('/edit/{investor}',['uses'=> 'InvestorController@edit', 'as' => 'investor.edit']);
        Route::post('/edit/{investor}',['uses'=> 'InvestorController@update', 'as' => 'investor.update']);
        Route::get('/show/{investor}',['uses'=>'InvestorController@show', 'as'=>'investor.show']);
        Route::get('/delete/{investor}', ['uses'=>'InvestorController@delete', 'as'=>'investor.delete']);
    });

    Route::group(['prefix' => 'customer'], function () {
        Route::get('/', ['uses' => 'ProblemController@index', 'as' => 'customer.index']);
        Route::get('/create', ['uses' => 'ProblemController@create', 'as' => 'customer.create']);
        Route::post('/create', ['uses'=> 'ProblemController@store', 'as' => 'customer.store']);
        Route::get('/edit/{problem}',['uses'=> 'ProblemController@edit', 'as' => 'customer.edit']);
        Route::post('/edit/{problem}',['uses'=> 'ProblemController@update', 'as' => 'customer.update']);
        Route::get('/show/{problem}',['uses'=> 'ProblemController@show', 'as'=>'customer.show']);
        Route::get('/delete/{problem}', ['uses'=>'ProblemController@delete', 'as'=>'customer.delete']);
    });

    Route::group(['prefix' => 'executor'], function () {
        Route::get('/', ['uses' => 'ExecutorController@index', 'as' => 'executor.index']);
        Route::get('/create', ['uses' => 'ExecutorController@create', 'as' => 'executor.create']);
        Route::post('/create', ['uses'=> 'ExecutorController@store', 'as' => 'executor.store']);
        Route::get('/edit/{executor}',['uses'=> 'ExecutorController@edit', 'as' => 'executor.edit']);
        Route::post('/edit/{executor}',['uses'=> 'ExecutorController@update', 'as' => 'executor.update']);
        Route::get('/show/{executor}',['uses'=>'ExecutorController@show', 'as'=>'executor.show']);
        Route::get('/delete/{executor}', ['uses'=>'ExecutorController@delete', 'as'=>'executor.delete']);
    });

    Route::group(['prefix' => 'designer'], function () {
        Route::get('/', ['uses' => 'DesignerController@index', 'as' => 'designer.index']);
        Route::get('/create', ['uses' => 'DesignerController@create', 'as' => 'designer.create']);
        Route::post('/create', ['uses'=> 'DesignerController@store', 'as' => 'designer.store']);
        Route::get('/edit/{designer}',['uses'=> 'DesignerController@edit', 'as' => 'designer.edit']);
        Route::post('/edit/{designer}',['uses'=> 'DesignerController@update', 'as' => 'designer.update']);
        Route::get('/show/{designer}',['uses'=>'DesignerController@show', 'as'=>'designer.show']);
        Route::get('/delete/{designer}', ['uses'=>'DesignerController@delete', 'as'=>'designer.delete']);
    });
    Route::group(['prefix' => 'employer'], function () {
        Route::get('/', ['uses' => 'EmployerController@index', 'as' => 'employer.index']);
        Route::get('/create', ['uses' => 'EmployerController@create', 'as' => 'employer.create']);
        Route::post('/create', ['uses'=> 'EmployerController@store', 'as' => 'employer.store']);
        Route::get('/edit/{employer}',['uses'=> 'EmployerController@edit', 'as' => 'employer.edit']);
        Route::post('/edit/{employer}',['uses'=> 'EmployerController@update', 'as' => 'employer.update']);
        Route::get('/show/{employer}',['uses'=>'EmployerController@show', 'as'=>'employer.show']);
        Route::get('/delete/{employer}', ['uses'=>'EmployerController@delete', 'as'=>'employer.delete']);
    });

    Route::group(['prefix'=>'personal-area'], function (){
        Route::get('/',['uses'=>'PersonalAreaController@index', 'as'=>'personal_area.index']);
        Route::get('/edit',['uses'=> 'PersonalAreaController@edit', 'as' => 'personal_area.edit']);
        Route::post('/edit',['uses'=> 'PersonalAreaController@update', 'as' => 'personal_area.update']);
        Route::get('/security',['uses'=> 'PersonalAreaController@security', 'as' => 'personal_area.security']);

    });
    Route::group(['prefix'=>'project-viewer'], function (){
        Route::get('/',['uses'=>'ProjectViewerController@index', 'as'=>'project_viewer.index']);
        Route::get('/show/{material}',['uses'=>'ProjectViewerController@show', 'as'=>'project_viewer.show']);

    });
});

