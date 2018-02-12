<?php 
Route::group(['prefix'=> 'involve/multi-choice'], function () {
   Route::get('get-list-test', 'Involve\MultiChoiceController@getListTest')->name('involve.multi-choice.getListTest');
   Route::get('test', 'Involve\MultiChoiceController@test')->name('involve.multi-choice.test');
   Route::post('marking', 'Involve\MultiChoiceController@marking')->name('involve.multi-choice.marking');
   Route::post('import', 'Involve\MultiChoiceController@import')->name('involve.multi-choice.import');
});
