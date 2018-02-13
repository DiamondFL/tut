
<?php
/**
 * Created by PhpStorm.
 * User: JK
 * Date: 2/12/2018
 * Time: 11:09 PM
 */

Route::get('/about', function () {
    return view('edu::about');
});
Route::get('/blog', function () {
    return view('edu::blog');
});
Route::get('/blog-post', function () {
    return view('edu::blog-post');
});
Route::get('/contact', function () {
    return view('edu::contact');
});
Route::get('/gallery', function () {
    return view('edu::gallery');
});
Route::get('/index', function () {
    return view('edu::index');
});
Route::get('/portfolio', function () {
    return view('edu::portfolio');
});
Route::get('/portfolio-single', function () {
    return view('edu::portfolio-single');
});