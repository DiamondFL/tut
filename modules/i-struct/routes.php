<?php
const VIEW_PATH = 'modules/i-struct/views';

Route::group(['namespace' => 'Istruct\Controllers', 'middleware' => 'web'], function () {
    Route::get('/dbmagic/{table?}', 'MagicController@produce')->name('dbmagic.produce');
    Route::get('render/create', 'MagicController@create')->name('dbmagic.create');
    Route::post('render-curl', 'MagicController@store')->name('dbmagic.store');

    Route::get('form/{table?}', 'FormController@produce')->name('form.produce');

    Route::get('mutator/{table?}', 'MutatorController@produce')->name('mutator.produce');
    Route::get('accessor/{table?}', 'AccessorController@produce')->name('accessor.produce');
    Route::get('model/{table?}', 'ModelController@produce')->name('model.produce');
    Route::get('ng-form/{table?}', 'FormBuilderController@produce')->name('ng-form.produce');
    Route::get('constant/{database?}', 'ConstantController@produce')->name('database.produce');
    Route::get('observer/{table?}', 'ObserverController@produce')->name('observer.produce');

    Route::get('ctrl/{table?}', 'CtrlController@produce')->name('ctrl.produce');
    Route::get('repository/{table?}', 'RepositoryController@produce')->name('repository.produce');
    Route::get('policy/{table?}', 'PolicyController@produce')->name('policy.produce');
    Route::get('request/{table?}', 'RequestController@produce')->name('request.produce');
});
