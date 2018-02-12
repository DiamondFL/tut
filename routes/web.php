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
Route::group(['middleware' => ['auth', 'remember.url']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('permissions', 'PermissionController');
    Route::resource('questions', 'QuestionController');
    Route::resource('multi_choices', 'MultiChoiceController');
    Route::resource('news', 'NewsController');
    Route::resource('roles', 'RoleController');
//    Route::group(['middleware'=> 'role:admin'], function () {
    Route::resource('scores', 'ScoreController');
//    });
    Route::resource('subjects', 'SubjectController');
    Route::resource('tags', 'TagController');
    Route::resource('users', 'UserController');
    Route::resource('vocabularies', 'VocabularyController');
});

Route::get('/redirect/{social}', 'SocialAuthController@redirect');
Route::get('/callback/{social}', 'SocialAuthController@callback');

Route::get('/pro-pdf', function () {
    echo 123;
    $pdf = new \mikehaertl\wkhtmlto\Pdf();
//    $pdf->addPage('/path/to/page.html');
    $pdf->addPage('<html>23232423432424</html>');
//    $pdf->addPage('http://localhost:8000/projects/dashboard/24');

// Add a cover (same sources as above are possible)
//    $pdf->addCover('/path/to/mycover.html');
//
//// Add a Table of contents
//    $pdf->addToc();

// Save the PDF
    $pdf->saveAs('/report.pdf');
    $pdf->send('report.pdf');
});
Route::get('/pro-img', function () {
    $image = new \mikehaertl\wkhtmlto\Image('<html>23232423432424</html>');
    $image->saveAs('/page.png');

// ... or send to client for inline display
    $image->send();

// ... or send to client as file download
    $image->send('page.png');

});
Route::get('export-chart', function () {
//    $conv = new \Anam\PhantomMagick\Converter();
//    $a = $conv->source('http://google.com');
//    $d = $a->toPdf();
//   // dd($d);
//    $c = $d->save(public_path('google.pdf'));
//    dd($c);

//    $conv = new \Anam\PhantomMagick\Converter();
//    $a = $conv->source('http://google.com');
//    $d = $a->toPng();
//   // dd($d);
//    $c = $d->save(public_path('google.png'));
//    dd($c);

    \Anam\PhantomMagick\Facades\Converter::make('http://yahoo.com')
        ->toPng()
        ->download(public_path('yahoo.png', true));
});