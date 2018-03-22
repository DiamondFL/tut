<?php
/**
 * Created by PhpStorm.
 * User: JK
 * Date: 2/23/2018
 * Time: 8:07 PM
 */

Route::group(['middleware' => ['web', 'auth'], 'namespace' => 'Games\Http\Controllers'], function () {
    Route::get('game', 'GameController@index')->name('game.index');

    Route::get('parity', 'ParityController@index')->name('parity.index');
    Route::post('parity', 'ParityController@play')->name('parity.play');

    Route::get('guess', 'GuessController@index')->name('guess.index');
    Route::post('guess', 'GuessController@play')->name('guess.play');

    Route::get('lott', 'LottController@index')->name('lott.index');
    Route::post('lott', 'LottController@play')->name('lott.play');
});