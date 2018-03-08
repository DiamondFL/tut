<?php
/**
 * Created by PhpStorm.
 * User: JK
 * Date: 3/8/2018
 * Time: 7:45 PM
 */

Route::group(['namespace' => 'ACL\Http\Controllers', 'middleware' => ['web', 'auth']], function () {
    Route::resource('permissions' , 'PermissionController');
});
