<?php 
Route::group(['prefix'=> 'involve/vocabulary'], function () {
   Route::post('import', 'Involve\VocabularyController@import')->name('involve.vocabulary.import');
   Route::get('search', 'Involve\VocabularyController@search')->name('involve.vocabulary.search');
});