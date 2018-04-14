<?php
//Route::get('/account/sign-in', 'AccountController@postSignIn')->name('account-sign-in-post');
Route::group(['prefix' => 'eco', 'middleware' => ['web'], 'namespace' => 'ECommerce\Http\Controllers'], function () {
//    Route::post('/account/forgot-password', 'AccountController@postForgotPassword')->name('password.request-post');
    Route::get('/', array(
            'as' => 'eco',
            'uses' => "HomeController@home"
        )
    );
    /*Authenticated group*/
    Route::group(['prefix' => 'product'], function () {
        Route::get('show', 'ProductController@getShowProduct')->name('eco.product.show');
    });
    Route::resource('product', 'ProductController');
    Route::group(['middleware' => ['auth']], function () {
        Route::resource('us', 'UserController');
        Route::resource('group', 'GroupController');
        Route::resource('style', 'StyleController');
        Route::resource('news', 'NewsController');
        Route::resource('order', 'OrderController');
        Route::resource('cart', 'CartController');
        Route::resource('comment', 'CommentController');        /*
         | Change password (POST)
        */
//        Route::post('/account/change-password', array(
//            'as' => 'account-change-password-post',
//            'uses' => 'AccountController@postChangePassword'
//        ));
//        /*
//         | Change password (GET)
//        */
//        Route::get('/account/change-password', array(
//            'as' => 'account-change-password',
//            'uses' => 'AccountController@getChangePassword'
//        ));
//        //------------Sign out (get)
//        Route::get('account/sign-out', array(
//            'as' => 'logout',
//            'uses' => 'AccountController@getSignOut'
//        ));
    });
//    Route::resource('auth', 'HomeController');
    //---------------create accout post
//    Route::post('/account/create', array(
//        'as' => 'account-create-post',
//        'uses' => 'AccountController@postCreate'
//    ));
//    /*
//     * Forgot password (Get)
//     */
//    Route::get('/account/forgot-password', array(
//        'as' => 'password.request',
//        'uses' => 'AccountController@getForgotPassword'
//    ));
//    //------------ Forgot password(Get)------------
//    Route::get('/account/recover/{code}', array(
//        'as' => 'account-recover',
//        'uses' => 'AccountController@getRecover'
//    ));
//    //----------Sign in get------------------------
//    Route::get('/account/sign-in', array(
//        'as' => 'account-sign-in',
//        'uses' => 'AccountController@getSignIn'
//    ));
//    //========= Create account(get)
//
//    Route::get('/account/activate/{code}', array(
//        'as' => 'account-activate',
//        'uses' => 'AccountController@getActivate'
//    ));
//    Route::resource('account', 'AccountController');
});
//Route::get('/account/create', 'AccountController@getCreate')->name('account-create');

