<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/admin', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth', 'remember.url', 'role:admin']], function () {
    Route::resource('permissions', 'PermissionController');
    Route::resource('questions', 'QuestionController');
    Route::resource('multi_choices', 'MultiChoiceController');
    Route::resource('news', 'NewsController');
    Route::resource('scores', 'ScoreController');
    Route::resource('subjects', 'SubjectController');
    Route::resource('tags', 'TagController');
    Route::resource('vocabularies', 'VocabularyController');
});

Route::get('/redirect/{social}', 'SocialAuthController@redirect');
Route::get('/callback/{social}', 'SocialAuthController@callback');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/laravel-filemanager', '\Unisharp\Laravelfilemanager\controllers\LfmController@show');
    Route::post('/laravel-filemanager/upload', '\Unisharp\Laravelfilemanager\controllers\UploadController@upload');
    // list all lfm routes here...
});

Route::group(['namespace' => 'API', 'middleware' => ['web']], function () {
    Route::resource('lesson-comment-api', 'LessonCommentController');
//    Route::resource('lesson-comment-api', 'LessonCommentApiController');
});
