<?php
/**
 * Created by PhpStorm.
 * User: JK
 * Date: 2/12/2018
 * Time: 11:09 PM
 */
Route::group(['middleware' => ['web']], function () {
    Route::get('/about', function () {
        return view('edu::about');
    });
    Route::get('/blog', function () {
        return view('edu::blog');
    });
    Route::get('/blog-post', function () {
        return view('edu::blog-post');
    });
    Route::get('/contact', function () {
        return view('edu::contact');
    })->name('contact');
    Route::get('/gallery', function () {
        return view('edu::gallery');
    });
    Route::get('/index', function () {
        return view('edu::index');
    });
    Route::get('/portfolio', function () {
        return view('edu::portfolio');
    });
    Route::get('/portfolio-single', function () {
        return view('edu::portfolio-single');
    });

    Route::group(['namespace' => 'Edubeanz\Http\Controllers'], function () {
        Route::get('/', 'TestController@getList')->name('edu.test.list');
        Route::get('doing', 'TestController@doing')->name('edu.test.doing');
        Route::post('marking', 'TestController@marking')->name('edu.test.marking');
    });
    Route::group(['namespace' => 'Edubeanz\Http\Controllers', 'prefix' => 'lang'], function () {
        Route::get('list', 'LanguageController@getList')->name('edu.language.list');
    });
    Route::group(['namespace' => 'Edubeanz\Http\Controllers', 'prefix' => 'ex'], function () {
        Route::get('list', 'ExampleController@getList')->name('edu.example.list');
        Route::get('detail/{id}', 'ExampleController@getDetail')->name('edu.example.detail');
    });
});