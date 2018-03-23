<?php
/**
 * Created by PhpStorm.
 * User: cuongpm
 * Date: 1/15/18
 * Time: 2:51 PM
 */

Route::group(['middleware' => ['web', 'auth', 'role:admin' ], 'namespace' => '\Http\Controllers'], function () {
    Route::resource('group' , 'GroupController');
    Route::resource('category' , 'CategoryController');
    Route::resource('sub-category' , 'SubCategoryController');
    Route::get('sub-category-list', 'SubCategoryController@lists')->name('sub-category.list');
});

