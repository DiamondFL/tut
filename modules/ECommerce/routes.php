<?php
Route::get('/', array(
        'as' => 'home',
        'uses' => "HomeController@home"
    )
);
Route::get('/admin', array(
        'as' => 'home',
        'uses' => "HomeController@getAdmin"
    )
);
Route::get('/user/{username}', array(
    'as' => 'profile-user',
    'uses' => 'ProfileController@user'
));

Route::get('contact', array(
    'as' => 'contact',
    'uses' => 'HomeController@getContact'
));

Route::get('intro', array(
    'as' => 'intro',
    'uses' => 'HomeController@getIntro'
));

Route::get('baogia', array(
    'as' => 'baogia',
    'uses' => 'HomeController@getIntro'
));


/*Authenticated group*/
Route::controller('product', 'ProductController', [
    'getProductDetails' => 'product.details',
    'getShowProduct' => 'product.show',
    'getProductByStyle' => 'product.style'
]);

Route::controller('news', 'NewsController', [
    'getNewsShow' => 'news',
    'getNewsDetails' => 'news.details',
]);

Route::group(array('before' => 'auth'), function () {
    Route::controller('us', 'UserController');
    Route::controller('group', 'GroupController');
    Route::controller('style', 'StyleController');


    Route::controller('order', 'OrderController');
    Route::controller('cart', 'CartController');
    /*
     * CSRF protection group
     */
    Route::group(array('before' => 'csrf'), function () {
        /*
         | Change password (POST)
        */
        Route::post('/account/change-password', array(
            'as' => 'account-change-password-post',
            'uses' => 'AccountController@postChangePassword'
        ));
    });
    /*
     | Change password (GET)
    */
    Route::get('/account/change-password', array(
        'as' => 'account-change-password',
        'uses' => 'AccountController@getChangePassword'
    ));
    //------------Sign out (get)
    Route::get('account/sign-out', array(
        'as' => 'account-sign-out',
        'uses' => 'AccountController@getSignOut'
    ));
});
Route::controller('auth', 'HomeController');
//===========Unauthenticalted group
Route::group(array('before' => 'guest'), function () {

    //=========csrf protected group
    Route::group(array('before' => 'csrf'), function () {
        //---------------create accout post
        Route::post('/account/create', array(
            'as' => 'account-create-post',
            'uses' => 'AccountController@postCreate'
        ));
        Route::get('/account/sign-in', array(
            'as' => 'account-sign-in-post',
            'uses' => 'AccountController@postSignIn'
        ));
        Route::post('/account/forgot-password', array(
            'as' => 'account-forgot-password-post',
            'uses' => 'AccountController@postForgotPassword'
        ));
    });
    /*
     * Forgot password (Get)
     */
    Route::get('/account/forgot-password', array(
        'as' => 'account-forgot-password',
        'uses' => 'AccountController@getForgotPassword'
    ));
    //------------ Forgot password(Get)------------
    Route::get('/account/recover/{code}', array(
        'as' => 'account-recover',
        'uses' => 'AccountController@getRecover'
    ));
    //----------Sign in get------------------------
    Route::get('/account/sign-in', array(
        'as' => 'account-sign-in',
        'uses' => 'AccountController@getSignIn'
    ));
    //========= Create account(get)
    Route::get('/account/create', array(
        'as' => 'account-create',
        'uses' => 'AccountController@getCreate'
    ));
    Route::get('/account/activate/{code}', array(
        'as' => 'account-activate',
        'uses' => 'AccountController@getActivate'
    ));
    Route::controller('account', 'AccountController');
});
