<?php
/**
 * Created by PhpStorm.
 * User: JK
 * Date: 1/25/2018
 * Time: 8:02 PM
 */
Route::group(['namespace' => 'Docs\Http\Controllers', 'middleware' => ['web', 'auth', 'role:admin']], function () {
    Route::resource('doc-project' , 'DocProjectController');
    Route::resource('doc-package' , 'DocPackageController');
    Route::resource('doc-tag' , 'DocTagController');
    Route::resource('doc-example' , 'DocExampleController');
    Route::resource('doc-language' , 'DocLanguageController');
    Route::resource('doc-example-tag' , 'DocExampleTagController');
    Route::resource('doc-lesson' , 'DocLessonController');
});

Route::group(['namespace' => 'Docs\Http\Controllers\Attractive', 'middleware' => ['web']], function () {
    Route::get('example-list' , 'ExampleController@getByTags');
});

