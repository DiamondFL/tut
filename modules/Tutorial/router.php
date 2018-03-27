<?php
/**
 * Created by PhpStorm.
 * User: JK
 * Date: 3/25/2018
 * Time: 11:33 PM
 */

Route::resource('tutorial' , 'TutorialController');
Route::resource('tutorial-test' , 'TutorialTestController');
Route::resource('tutorial-result' , 'TutorialResultController');

Route::resource('section' , 'SectionController');
Route::resource('section-result' , 'SectionResultController');
Route::resource('section-test' , 'SectionTestController');

Route::resource('lesson' , 'LessonController');
Route::resource('lesson-test' , 'LessonTestController');
Route::resource('lesson-result' , 'LessonResultController');
Route::resource('lesson-feed-back' , 'LessonFeedBackController');
Route::resource('lesson-sub-comment' , 'LessonSubCommentController');
Route::resource('lesson-comment' , 'LessonCommentController');


