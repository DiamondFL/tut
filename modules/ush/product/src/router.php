<?php
/**
 * Created by PhpStorm.
 * User: cuongpm
 * Date: 1/15/18
 * Time: 2:51 PM
 */

Route::group(['middleware' => ['auth', 'web', 'role:admin' ], 'namespace' => 'Ush\Http\Controllers'], function () {
    Route::resource('ush-group' , 'UshGroupController');
    Route::resource('ush-category' , 'UshCategoryController');
    Route::resource('ush-sub-category' , 'UshSubCategoryController');

    Route::get('sub-category-list', 'UshSubCategoryController@lists')->name('ush.sub-category.list');
});

