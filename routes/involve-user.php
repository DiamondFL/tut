<?php 
Route::group(['prefix'=> 'involve/user'], function () {
   Route::post('sync-role', 'Involve\UserController@syncRole')->name('involve.user.syncRole');
   Route::get('roles', 'Involve\UserController@roles')->name('involve.user.roles');
});