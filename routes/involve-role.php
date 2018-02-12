<?php
Route::group(['prefix' => 'involve/role', 'namespace' => 'Involve'], function () {
    Route::post('sync-permission', 'RoleController@syncPermission')->name('involve.role.syncPermission');
    Route::get('roles', 'RoleController@roles')->name('involve.role.roles');
    Route::get('get-assigned-permission', 'RoleController@getAssignedPermission')->name('involve.role.assignedPermission');
});