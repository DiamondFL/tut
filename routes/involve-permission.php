<?php 
Route::group(['prefix'=> 'involve/permission'], function () {
   Route::post('sync-role', 'Involve\PermissionController@syncRole')->name('involve.permission.syncRole');
   Route::get('roles', 'Involve\PermissionController@roles')->name('involve.permission.roles');
});