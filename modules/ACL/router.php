<?php
/**
 * Created by PhpStorm.
 * User: JK
 * Date: 3/8/2018
 * Time: 7:45 PM
 */

Route::group(['namespace' => 'ACL\Http\Controllers', 'middleware' => ['web', 'auth']], function () {
    Route::resource('permissions' , 'PermissionController');
    Route::resource('roles', 'RoleController');
    Route::resource('users', 'UserController');

    Route::resource('users', 'UserController');
    Route::get('profile', 'UserController@profile')->name('profile');
    Route::put('profile/{id}', 'UserController@updateProfile')->name('profile.update');
    Route::put('change-password', 'UserController@changePassword')->name('change-password');
    Route::put('renew-password/{id}', 'UserController@renewPassword')->name('renew-password');
    Route::put('ban/{id}', 'UserController@ban')->name('users.ban');
});
