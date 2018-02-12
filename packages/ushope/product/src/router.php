<?php
/**
 * Created by PhpStorm.
 * User: cuongpm
 * Date: 1/15/18
 * Time: 2:51 PM
 */

Route::group(['middleware' => 'web', 'namespace' => 'Ush\Product\Http\Controllers'], function () {
    Route::resource('ush-product' , 'UshProductController');
    Route::resource('ush-group' , 'UshGroupController');
    Route::resource('ush-color-product' , 'UshColorProductController');
    Route::resource('ush-category' , 'UshCategoryController');
    Route::resource('ush-season' , 'UshSeasonController');
    Route::resource('ush-feature' , 'UshFeatureController');
    Route::resource('ush-material' , 'UshMaterialController');
    Route::resource('ush-brand' , 'UshBrandController');
    Route::resource('ush-sub-category' , 'UshSubCategoryController');
    Route::resource('ush-weight' , 'UshWeightController');
    Route::resource('ush-price' , 'UshPriceController');
    Route::resource('ush-fit' , 'UshFitController');
    Route::resource('ush-specialty-size' , 'UshSpecialtySizeController');
    Route::resource('ush-color' , 'UshColorController');
});

