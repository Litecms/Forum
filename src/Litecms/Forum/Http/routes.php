<?php

// Admin web routes  for forum
Route::group(['prefix' => trans_setlocale() . '/admin/forum'], function () {
    Route::post('forum/status/{forum}', 'Litecms\Forum\Http\Controllers\ForumAdminController@update');
    Route::resource('forum', 'Litecms\Forum\Http\Controllers\ForumAdminController');
    Route::resource('category', 'Litecms\Forum\Http\Controllers\CategoryAdminController');
});

// Admin API routes  for forum
Route::group(['prefix' => trans_setlocale() . 'api/v1/admin/forum'], function () {
    Route::resource('forum', 'Litecms\Forum\Http\Controllers\ForumAdminApiController');
    Route::resource('category', 'Litecms\Forum\Http\Controllers\CategoryAdminApiController');
});

// User web routes for forum
Route::group(['prefix' => trans_setlocale() . '/user/forum'], function () {
    Route::resource('forum', 'Litecms\Forum\Http\Controllers\ForumUserController');
    Route::resource('category', 'Litecms\Forum\Http\Controllers\CategoryUserController');
    Route::post('forum/status/{forum}', 'Litecms\Forum\Http\Controllers\ForumUserController@publish');
    Route::get('forum/best/answer/{forum}', 'Litecms\Forum\Http\Controllers\ForumUserController@bestAnswer');
});

// User API routes for forum
Route::group(['prefix' => trans_setlocale() . 'api/v1/user/forum'], function () {
    Route::resource('forum', 'Litecms\Forum\Http\Controllers\ForumUserApiController');
    Route::resource('category', 'Litecms\Forum\Http\Controllers\CategoryUserApiController');
});

//  web routes for forum
Route::group(['prefix' => trans_setlocale() . '/forums'], function () {
    Route::get('/', 'Litecms\Forum\Http\Controllers\ForumController@index');
    Route::get('/forums/{slug?}', 'Litecms\Forum\Http\Controllers\ForumController@show');
    Route::get('/category/{category?}', 'Litecms\Forum\Http\Controllers\ForumController@category');
    Route::get('/categories', 'Litecms\Forum\Http\Controllers\CategoryController@index');
    Route::get('/categories/{slug?}', 'Litecms\Forum\Http\Controllers\CategoryController@show');
});

//  API routes for forum
Route::group(['prefix' => trans_setlocale() . 'api/v1/forums'], function () {
    Route::get('/forums', 'Litecms\Forum\Http\Controllers\ForumApiController@index');
    Route::get('/forums/{slug?}', 'Litecms\Forum\Http\Controllers\ForumApiController@show');
    Route::get('/categories', 'Litecms\Forum\Http\Controllers\CategoryApiController@index');
    Route::get('/categories/{slug?}', 'Litecms\Forum\Http\Controllers\CategoryApiController@show');
});
