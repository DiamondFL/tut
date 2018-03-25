<?php
/**
 * Created by PhpStorm.
 * User: cuongpm
 * Date: 1/15/18
 * Time: 2:51 PM
 */

Route::group(['middleware' => 'web', 'namespace' => 'Test\Http\Controllers'], function () {
    Route::resource('rg-answer' , 'RgAnswerController');
    Route::resource('rg-question' , 'RgQuestionController');
    Route::resource('rg-reply' , 'RgReplyController');
    Route::resource('rg-result' , 'RgResultController');
    Route::resource('rg-test' , 'RgTestController');
});

